<?php
session_start();
if (isset($_POST['mensagem'])) {
    echo '<script>alert("' . $_POST['mensagem'] . '");</script>';
}

include('../../php/lista_materias_prof.php')
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/prof.css">
    <link rel="stylesheet" href="../../css/geral.css">
    <link rel="stylesheet" href="../../css/textEditor.css">
    <title>
        <?php echo $_SESSION['usuario']; ?>
    </title>
</head>

<body>
    <header>
        <h1>
            <?php echo 'Bem-vindo, ' . $_SESSION['usuario'] . '!'; ?>
        </h1>

        <form action="/php/logout.php" method="post">
            <input type="submit" class="logout-bt" value="Logout">
        </form>

    </header>
    <main>
        <section class="section">
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
                <div id="container">
                    <textarea id="editor" name="conteudo">
                    </textarea>
                </div>

                <input type="submit" value="Cadastrar Conteúdo" class="cadConteudo">
            </form>
        </section>
        <section class="section">
            <form action="../../php/criar_evento.php" method="post">
                <label for="dataDoEvento">Data:</label>
                <input type="date" id="data" name="dataDoEvento">

                <label for="tituloDoEvento">Titulo do Evento</label>
                <input type="text" name="tituloDoEvento">

                <label for="descricaoDoEvento">Descrição do Evento</label>
                <textarea name="descricaoDoEvento"></textarea>

                <input type="submit" value="Cadastrar Evento" class="cadEvento">
            </form>
        </section>
    </main>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>
    <script src="../../js/textEditor.js"></script>
    <script>
    // Obtém o conteúdo formatado do CKEditor 5
    var editor = ClassicEditor.create(document.querySelector('#editor'));
    var conteudoInput = document.querySelector('#conteudo'); // Campo de entrada escondido para o conteúdo

    // Função para atribuir o conteúdo formatado ao campo de entrada escondido antes de enviar o formulário
    function atribuirConteudo() {
        conteudoInput.value = editor.getData();
    }

    // Adiciona um evento ao botão de envio do formulário para chamar a função atribuirConteudo() antes do envio do formulário
    document.querySelector('form').addEventListener('submit', atribuirConteudo);
</script>
</body>

</html>