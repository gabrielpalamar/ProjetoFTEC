<?php
include('/conexao.php');

$email_destinatario = $_GET['email_destinatario'];

$stmt = $pdo->prepare("SELECT nome FROM usuarios WHERE tipo = 'professor'");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>