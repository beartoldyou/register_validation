document.addEventListener('DOMContentLoaded', function () {
    const elems = document.querySelectorAll('select');
    const instances = M.FormSelect.init(elems);
});

function pesquisarFuncionarios() {
    const searchTerm = document.getElementById('search').value;
    const resultadoPesquisaDiv = document.getElementById('resultadoPesquisa');

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            resultadoPesquisaDiv.innerHTML = xhr.responseText;
            resultadoPesquisaDiv.style.display = 'block';
        }
    };

    xhr.open('GET', '?router=Site/pesquisarFuncionarios&searchTerm=' + searchTerm, true);
    xhr.send();
}

function pesquisarCargo() {
    const searchTerm = document.getElementById('search').value;
    const resultadoPesquisaCargoDiv = document.getElementById('resultadoPesquisaCargo');

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            resultadoPesquisaCargoDiv.innerHTML = xhr.responseText;
            resultadoPesquisaCargoDiv.style.display = 'block'; // Exibe a div após a pesquisa
        }
    };

    xhr.open('GET', '?router=Site/pesquisarCargo&searchTerm=' + searchTerm, true);
    xhr.send();
}


function exibirMensagemErro(campoId, mensagem) {
    const campo = document.getElementById(campoId);
    campo.classList.add("error");
    alert(mensagem);
}

function validarFormulario() {
    const cpf = document.getElementById("cpf").value;

    document.getElementById("mensagemErroCPF").innerHTML = "";

    if (cpfExiste(cpf)) {
        exibirMensagemErro("CPF informado já existe em nosso sistema.", "mensagemErroCPF");
        return false;
    }

    if (!isValidCPF(cpf)) {
        exibirMensagemErro("CPF Inválido. Por favor, insira um CPF válido.", "mensagemErroCPF");
        return false;
    }


    return true;
    document.getElementById(elementoId).innerHTML = mensagem;
}

function cpfExiste(cpf) {
    return false;
}

function isValidCPF(cpf) {
    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    const elems = document.querySelectorAll('select');
    const instances = M.FormSelect.init(elems);
});

function alternarPaginaCadastroFunc() {
    const paginaCadastroFunc = document.getElementById('paginaCadastroFunc');
    if (paginaCadastroFunc.style.display === 'none') {
        // Se a página estiver oculta, carregue dinamicamente e mostre
        carregarPaginaCadastroFunc();
        paginaCadastroFunc.style.display = 'block';
    } else {
        // Se a página estiver visível, simplesmente esconda
        paginaCadastroFunc.style.display = 'none';
    }
}

function carregarPaginaCadastroFunc() {
    // Use AJAX para carregar dinamicamente a página de cadastro
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            paginaCadastroFunc.innerHTML = xhr.responseText;
            // Após carregar a página, inicialize novamente os componentes do Materialize
            const elems = document.querySelectorAll('select');
            const instances = M.FormSelect.init(elems);
        }
    };

    xhr.open('GET', '?router=Site/cadastro_funcionario/', true);
    xhr.send();
}
function alternarPaginaCadastroCargo() {
    const paginaCadastroCargo = document.getElementById('paginaCadastroCargo');
    if (paginaCadastroCargo.style.display === 'none') {
        // Se a página estiver oculta, carregue dinamicamente e mostre
        carregarPaginaCadastroCargo();
        paginaCadastroCargo.style.display = 'block';
    } else {
        // Se a página estiver visível, simplesmente esconda
        paginaCadastroCargo.style.display = 'none';
    }
}

function carregarPaginaCadastroCargo() {
    // Use AJAX para carregar dinamicamente a página de cadastro de cargo
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            paginaCadastroCargo.innerHTML = xhr.responseText;
            // Após carregar a página, inicialize novamente os componentes do Materialize
            const elems = document.querySelectorAll('select');
            const instances = M.FormSelect.init(elems);
        }
    };

    xhr.open('GET', '?router=Site/cadastro_cargo/', true);
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = M.Modal.init(document.getElementById('modalCadastroFunc'));

    window.abrirModalCadastroFunc = function () {
        carregarPaginaCadastroFunc(); // Certifique-se de ter a função carregarPaginaCadastroFunc() definida
        modal.open();
    }

    window.fecharModalCadastroFunc = function () {
        modal.close();
    }

});

document.addEventListener('DOMContentLoaded', function () {
    const modalCargo = M.Modal.init(document.getElementById('modalCadastroCargo'));

    window.abrirModalCadastroCargo = function () {
        carregarPaginaCadastroCargo();
        modalCargo.open();
    }

    window.fecharModalCadastroCargo = function () {
        modalCargo.close();
    }
});

function abrirModal(idModal) {
    const modal = M.Modal.init(document.getElementById(idModal));

    if (typeof window['carregarPagina' + idModal] === 'function') {
        window['carregarPagina' + idModal]();
    }

    modal.open();
}

function fecharModal(idModal) {
    const modal = M.Modal.init(document.getElementById(idModal));
    modal.close();
}

function alternarPaginaCadastroCargo() {
    abrirModal('modalCadastroCargo');
}

document.addEventListener('DOMContentLoaded', function () {


    const modalCargo = M.Modal.init(document.getElementById('modalCadastroCargo'));

    window.abrirModalCadastroCargo = function () {
        carregarPaginaCadastroCargo();
        modalCargo.open();
    }

    window.fecharModalCadastroCargo = function () {
        modalCargo.close();
    }

    function carregarPaginaCadastroCargo() {
        // Use AJAX para carregar dinamicamente a página de cadastro de cargo
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('paginaCadastroCargo').innerHTML = xhr.responseText;
                // Após carregar a página, inicialize novamente os componentes do Materialize
                const elems = document.querySelectorAll('select');
                const instances = M.FormSelect.init(elems);
            }
        };

        xhr.open('GET', '?router=Site/cadastro_cargo/', true);
        xhr.send();
    }
});

function formatarCPF(cpfInput) {
    let cpf = cpfInput.value.replace(/\D/g, '');

    cpf = cpf.slice(0, 11);


    cpfInput.value = cpf;
}

function pesquisarFuncionariosReport() {
    const searchTerm = document.getElementById('search').value;
    const filterTypeRadio = document.querySelector('input[name="filterType"]:checked');
    const resultadoPesquisaDiv = document.getElementById('resultadoPesquisaReport');

    const filterType = filterTypeRadio ? filterTypeRadio.value : 'nome';

    console.log('searchTerm:', searchTerm);
    console.log('filterType:', filterType);

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            resultadoPesquisaDiv.innerHTML = xhr.responseText;
            resultadoPesquisaDiv.style.display = 'block';
        }
    };

    // Adiciona o valor do radio button aos parâmetros da URL
    const url = `?router=Site/pesquisarFuncionariosReport&searchTerm=${searchTerm}&filterType=${filterType}`;

    console.log('URL:', url);

    xhr.open('GET', url, true);
    xhr.send();
}

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });


    





