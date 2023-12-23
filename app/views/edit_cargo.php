<div class="row container">
    <div class="col s12">
        <h3 class="light">Editar Cargo</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/alterar_cargo/" method="post">
            <?php foreach ($editarCargo as $registro) : ?>
                <input type="hidden" name="id_cargo" id="id_cargo" value="<?php echo $registro['id_cargo']; ?>">

                <div class="input-field col s12">
                    <input type="text" name="cargo" id="cargo" value="<?php echo $registro['cargo']; ?>" required>
                    <label for="cargo">Cargo</label>
                </div>

                <div class="input-field col s12 m6">
                    <input type="text" name="salario" id="salario" value="<?php echo $registro['salario']; ?>" required>
                    <label for="salario">Salário</label>
                </div>

                <div class="input-field col s12">
                    <input type="submit" value="Salvar Alterações" class="btn-small">
                </div>
            <?php endforeach; ?>

        </form>

    </div>
</div>