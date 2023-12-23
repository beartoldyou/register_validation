<div class="row container">
    <h3 class="light">Cadastro de Funcionários</h3>

    <form onsubmit="" method="POST" action="?router=Site/cadastro_funcionario/">

        <div class="input-field col s12">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="date" name="data_nasc" id="data_nasc">
            <label for="data_nasc">Data de Nascimento</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="text" name="cep" id="cep" maxlength="8">
            <label for="cep">CEP</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="logradouro" id="logradouro">
            <label for="logradouro">Logradouro</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="text" name="numero" id="numero">
            <label for="numero">Número</label>
        </div>

        <div class="input-field col s12 m6">
            <input type="text" name="bairro" id="bairro">
            <label for="bairro">Bairro</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="cidade" id="cidade">
            <label for="cidade">Cidade</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="uf" id="uf">
            <label for="uf">UF</label>
        </div>

        <div class="input-field col s12 m6">
            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="cpf" required maxlength="11" oninput="formatarCPF(cpfInput)">
        </div>

        <div class="input-field col s12 m6">
            <input type="email" name="email" id="email">
            <label for="email">E-mail</label>
        </div>

        <div class="input-field col s12">
            <input type="tel" name="telefone" id="telefone">
            <label for="telefone">Telefone</label>
        </div>

        <input type="hidden" name="id_cargo" value="" required>

        <div class="input-field col s12">
            <select name="id_cargo" required>
                <option value="" disabled selected>Escolha um cargo</option>
                <?php foreach ($cargos as $cargo) : ?>
                    <option value="<?php echo $cargo['id_cargo']; ?>">
                        <?php echo $cargo['cargo']; ?> - R$ <?php echo $cargo['salario']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Cargo</label>
        </div>

        <div class="input-field col s12">
            <input type="submit" value="Enviar" class="btn-small">
            <input type="reset" value="Limpar" class="btn-small red">
        </div>
    </form>
</div>