<div class="row container">
    <div class="col s12">
        <h4 class="light">Cadastro de Cargos</h4>
    </div>

    <div class="col s12">
        <form action="?router=Site/cadastro_cargo" method="post">
            <div class="input-field col s12">
                <input type="text" name="cargo" id="cargo" required>
                <label for="cargo">Digite o cargo</label>
            </div>


            <div class="input-field col s12">
                <input type="text" name="salario" id="salario" required>
                <label for="salario">Digite o salário</label>
            </div>

            <div class="input-field col s12">
                <input type="submit" value="enviar" class="btn-small">
                <input type="reset" value="limpar" class="btn-small red">
            </div>
        </form>
    </div>
</div>