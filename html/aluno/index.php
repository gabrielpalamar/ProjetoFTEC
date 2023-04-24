<?php
session_start();
include('../../php/lista_materias.php');

include('../../php/lista_conteudo.php');
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
        <h1>
            <?php echo 'Bem-vindo, ' . $_SESSION['usuario'] . '!'; ?>
        </h1>
        
        <form action="/php/logout.php" method="post">
        <input type="submit" class="logout-bt" value="Logout">
        </form>

        <section>
            <form action=# method="GET">
                <select name="materia" id="materia">
                <?php foreach ($materias as $materia): ?>
                    <option value="<?php echo $materia['materia']; ?>"><?php echo $materia['materia']; ?></option>
                <?php endforeach; ?>
                </select><br>
                <input type="submit" value="Buscar">
            </form>
        </section>
    </header>
    <main>
        <?php
        while ($conteudos = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<h3>' . $conteudos['titulo'] . '</h3>';
            echo '<p>Professor: ' . $conteudos['nome'] . ' | '  . $conteudos['materia'] . '</p>';
            echo '<p>Descrição: ' . $conteudos['conteudo'] . '</p>';
            echo '<hr>';
        }
        ?>
    </main>

    <section>
            <div class="agenda">
              <div class="dia">
                <h2>12/04/2023</h2>
                <ul>
                  <li>1º Periodo - Prova de História</li>
                  <li>3º Periodo - Trabalho de Física</li>
                </ul>
              </div>
              <div class="dia">
                <h2>18/04/2023</h2>
                <ul>
                  <li>Dia todo - Feira do livro</li>
                </ul>
              </div>
            </div>
    </section>

</body>

</html>


