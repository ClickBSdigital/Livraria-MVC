<!-- app/views/books.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    <h2>Lista de Livros</h2>
    <ul>
        <?php while ($row = $livro->fetch(PDO::FETCH_ASSOC)) { ?>
            <li><?php echo $row['titulo'] . " by " . $row['autor']; ?></li>
        <?php } ?>
    </ul>

    <h2>Adicionar Novo Livro</h2>
    <form action="index.php?action=add" method="POST">
        <input type="text" name="titulo" placeholder="Título do livro" required>
        <input type="text" name="autor" placeholder="Autor do livro" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
