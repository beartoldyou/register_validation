<div class="row container">
    <div class="col s12">
        <h3 class="light">Funcionários Cadastrados</h3>
    </div>
    <div class="col s12">
        <form action="?router=Site/pesquisarFuncionarios" method="GET" onsubmit="return false">
            <div class="input-field">
                <input id="search" name="searchTerm" type="search" class="icon_prefix" required>
                <label class="" for="search"><i class="material-icons">Busque por CPF ou Nome</i></label>
            </div>
            <button class="btn blue darken-3 fixed
" type="button" onclick="pesquisarFuncionarios()">Pesquisar</button>
        </form>

        <div id="resultadoPesquisa" style="display: none;">
            <table id="funcionario-table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($consulta as $registro) : ?>
                    <tr>
                        <td><?php echo $registro['id_funcionario']; ?></td>
                        <td><?php echo $registro['nome']; ?></td>
                        <td><?php echo $registro['cpf']; ?></td>
                        <td><?php echo $registro['cargo']; ?></td>
                        <td><?php echo $registro['salario']; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="abrirModalEditarFuncionario(<?php echo $registro['id_funcionario']; ?>)">Editar</a> |
                            <a href="javascript:void(0);" onclick="abrirModalConfirmarDeleteFuncionario(<?php echo $registro['id_funcionario']; ?>)" class="red-text">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <button class="btn-small teal lighten-4 right" onclick="abrirModalCadastroFunc()">Adicionar</button>

    <div id="modalCadastroFunc" class="modal">
        <div class="modal-content">
            <span class="modal-close right" onclick="fecharModalCadastroFunc()">&times;</span>
            <div id="paginaCadastroFunc"></div>
        </div>
    </div>
</div>

</body>

</html>