<table id="report-table">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Cargo</th>
        <th>Salário</th>
    </tr>
    <?php foreach ($consulta as $registro) : ?>
        <tr>
            <td><?php echo $registro['id_funcionario']; ?></td>
            <td><?php echo $registro['nome']; ?></td>
            <td><?php echo $registro['telefone']; ?></td>
            <td><?php echo $registro['cargo']; ?></td>
            <td><?php echo $registro['salario']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>