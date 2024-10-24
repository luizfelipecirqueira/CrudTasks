<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar tarefa: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="<?= $row['title']; ?>" required>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required><?= $row['description']; ?></textarea>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pendente" <?= $row['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="em andamento" <?= $row['status'] == 'em andamento' ? 'selected' : '' ?>>Em Andamento</option>
            <option value="concluída" <?= $row['status'] == 'concluída' ? 'selected' : '' ?>>Concluída</option>
        </select>

        <button type="submit" class="button">Atualizar</button>
    </form>
</body>
</html>
