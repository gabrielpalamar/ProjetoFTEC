<?php
include('.././php/conexao.php');

$stmt = $pdo->prepare('SELECT * FROM materias');
$stmt->execute();
$materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
