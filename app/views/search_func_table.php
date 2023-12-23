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
                <a href="?router=Site/editar_funcionario/&id_funcionario=<?php echo base64_encode($registro['id_funcionario']); ?>">Editar</a> |
                <a href="?router=Site/confirmarDelete_funcionario/&id_funcionario=<?php echo base64_encode($registro['id_funcionario']); ?>" class="red-text">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>