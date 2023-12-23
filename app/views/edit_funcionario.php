<div class="row container">
    <div class="col s12">
        <h3 class="light">Editar Funcionário</h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/alterar_funcionario/" method="post">
            <?php foreach ($editarFuncionario as $registro) : ?>
                <input type="hidden" name="id_funcionario" id="id_funcionario" value="<?php echo $registro['id_funcionario']; ?>">

                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value="<?php echo $registro['nome']; ?>" required>
                    <label for="nome">Nome</label>
                </div>

                <div class="input-field col s12 m6">
                    <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $registro['data_nasc']; ?>">
                    <label for="data_nasc">Data de Nascimento</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="cep" id="cep" value="<?php echo $registro['cep']; ?>">
                    <label for="cep">CEP</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="logradouro" id="logradouro" value="<?php echo $registro['logradouro']; ?>">
                    <label for="logradouro">Logradouro</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="numero" id="numero" value="<?php echo $registro['numero']; ?>">
                    <label for="numero">Número</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="bairro" id="bairro" value="<?php echo $registro['bairro']; ?>">
                    <label for="bairro">Bairro</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="cidade" id="cidade" value="<?php echo $registro['cidade']; ?>">
                    <label for="cidade">Cidade</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="uf" id="uf" value="<?php echo $registro['uf']; ?>">
                    <label for="uf">UF</label>
                </div>

                <div class="input-field col s12">
                    <input type="number" name="cpf" id="cpf" required maxlength="11" oninput="formatarCPF(cpfInput)" value="<?php echo $registro['cpf']; ?>">
                    <label for="cpf">CPF</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" name="email" id="email" value="<?php echo $registro['email']; ?>">
                    <label for="email">E-mail</label>
                </div>

                <div class="input-field col s12">
                    <input type="tel" name="telefone" id="telefone" value="<?php echo $registro['telefone']; ?>">
                    <label for="telefone">Telefone</label>
                </div>

                <div class="input-field col s12">
                    <select name="id_cargo" required>
                        <?php foreach ($cargos as $cargo) : ?>
                            <option value="<?php echo $cargo['id_cargo']; ?>" <?php echo ($cargo['id_cargo'] == $registro['id_cargo']) ? 'selected' : ''; ?>>
                                <?php echo $cargo['cargo'] . ' - R$ ' . number_format($cargo['salario'], 2, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Cargo</label>
                </div>

                <div class="input-field col s12">
                    <input type="submit" value="Salvar Alterações" class="btn-small">
                </div>

        </form>
    <?php endforeach; ?>

    </div>
</div>