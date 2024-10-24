<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao inserir tarefa: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Adicionar Nova Tarefa</h1>
    <form action="create.php" method="POST">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pendente">Pendente</option>
            <option value="em andamento">Em Andamento</option>
            <option value="concluída">Concluída</option>
        </select>

        <button type="submit" class="button">Salvar</button>
    </form>
</body>
</html>
