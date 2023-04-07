<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/prof.css">
    <link rel="stylesheet" href="../../css/geral.css">
    <title>Professor</title>
</head>

<body>
    <header>
        <h1>Bem-vindo Professor</h1>
    </header>
    <main class="form">
        <form action='../../php/criar_conteudo.php' method="post">
            <h2>Cadastrar um novo conteudo</h2><br>
            <select name="materia" id="materia" required>
                <?php foreach ($materias as $materia): ?>
                    <option value="<?php echo $materia['materia']; ?>"><?php echo $materia['materia']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="titulo">Titulo</label><br>
            <input type="text" name="titulo" value=""><br>
            <label for="conteudo">Conteúdo</label><br>
            <textarea name="conteudo"></textarea><br>
            <input type="submit" value="Cadastrar Conteúdo">
        </form>
    </main>
</body>

</html>