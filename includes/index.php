<?php
include 'db.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <a href="create.php" class="button">Adicionar Nova Tarefa</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="button edit">Editar</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="button delete">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
