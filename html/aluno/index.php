<?php
session_start();
include('../../php/lista_professores.php');
include('../../php/lista_materias_aluno.php');
if (isset($_GET['materia'])) {
    include('../../php/lista_conteudo.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/aluno.css">
    <link rel="stylesheet" href="../../css/geral.css">

    <title>
        <?php echo $_SESSION['usuario']; ?>
    </title>
</head>

<body>
    <header>
        <div id="sessao-usuario">
            <h1>
                <?php echo 'Bem-vindo, ' . $_SESSION['usuario'] . '!'; ?>
            </h1>
            <form action="/php/busca.php" method="post" class="barra-pesquisa">
                <input type="text" name="search" placeholder="Digite sua pesquisa...">
                <button type="submit" class="buscaConteudo btn-search"><i class="material-icons">search</i></button>
            </form>

            <form action="/php/logout.php" method="post">
                <input type="submit" class="logout-bt" value="Logout">
            </form>
        </div>
    </header>
    <main>
        <section class="buscar-conteudos">
            <h3>Buscar conteudos:</h3>
            <div>
                <form action=# method="GET" class="form-selecao-materia">
                    <label>Buscar por matéria</label>
                    <select name="materia" id="materia">
                        <?php foreach ($materias as $materia): ?>
                            <option value="<?php echo $materia['materia']; ?>"><?php echo $materia['materia']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <input type="submit" value="Buscar" class="buscaConteudo">
                </form>
            </div>
        </section>
        <?php
        if (isset($_GET['materia'])) {
            while ($conteudos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<h3>' . $conteudos['titulo'] . '</h3>';
                echo '<p>Professor: ' . $conteudos['nome'] . ' | ' . $conteudos['materia'] . '</p>';
                echo '<p>Descrição: ' . $conteudos['conteudo'] . '</p>';
                echo '<hr>';
            }
        } else {
            echo 'Selecione uma matéria para exibir os conteúdos.';
        }
        ?>
    </main>

    <form action="../../php/enviaEmail.php" method="post" class="formEmail">
        <Label for="email_destinatario">Selecine o destinatario</Label>
        <select name="email_destinatario" id="email_destinatario">
            <?php foreach ($professores as $professor): ?>
                <option value="<?php echo $professor['email']; ?>"><?php echo $professor['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="mensagem">Mensagem</label><br>
        <textarea name="mensagem" placeholder="Digite aqui a sua mensagem ao professor"></textarea><br>
        <input type="submit" name="BTEnvia" value="Enviar" class="btnEmail">
        <input type="reset" name="BTApaga" value="Apagar" class="btnEmail">
    </form>


    <section class="eventos">
        <?php
        include('../../php/lista_eventos.php');
        ?>
    </section>
</body>

</html>