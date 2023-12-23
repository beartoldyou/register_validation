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
                <a href="?router=Site/confirmarDelete_cargo/&id_cargo=<?php echo base64_encode($registro['id_cargo']); ?>" class="red-text">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>