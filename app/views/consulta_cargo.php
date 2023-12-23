<div class="row container">
    <div class="col s12">
        <h3 class="light">Cargos Cadastrados</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/pesquisarCargo" method="GET" onsubmit="return false">
            <div class="input-field">
                <input id="search" name="searchTerm" type="search" class="icon_prefix" required>
                <label class="" for="search"><i class="material-icons">Busque por um Cargo</i></label>
            </div>
            <button class="btn blue darken-3 fixed
" type="button" onclick="pesquisarCargo()">Pesquisar</button>
        </form>

        <div id="resultadoPesquisaCargo" style="display: none;">
            <table id="cargo-table">
                <tr>
                    <th>ID</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($consulta as $registro) : ?>
                    <tr>
                        <td><?php echo $registro['id_cargo']; ?></td>
                        <td><?php echo $registro['cargo']; ?></td>
                        <td><?php echo $registro['salario']; ?></td>
                        <td>
                            <a href="?router=Site/editar_cargo/&id_cargo=<?php echo base64_encode($registro['id_cargo']); ?>">Editar</a> |
                            <a href="?router=Site/confirmarDelete_Cargo/&id_cargo=<?php echo base64_encode($registro['id_cargo']); ?>" class="red-text">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <button class="btn-small teal lighten-4 right" onclick="abrirModalCadastroCargo()">Adicionar</button>

    <div id="modalCadastroCargo" class="modal">
        <div class="modal-content">
            <span class="modal-close right" onclick="fecharModalCadastroCargo()">&times;</span>
            <div id="paginaCadastroCargo"></div>
        </div>
    </div>
</div>

</body>

</html>