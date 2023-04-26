<?php
if (isset($_POST['BTEnvia'])) {

    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $mensagem = $_POST['mensagem'];

    $email_remetente = "$email";

    //Configurações do email
    $email_destinatario = $_POST['email_destinatario']; // email que receberá as mensagens //fazer uma combobox com os professores e buscar o email do banco
    $email_reply = $email;
    $email_assunto = "Contato Plataforma SPEC";

    //Monta Mensagem
    $email_conteudo = "Nome = $nome \n";
    $email_conteudo .= "Email = $email \n";
    $email_conteudo .= "Mensagem = $mensagem \n";

    $email_headers = implode("\n", array("From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

    //Enviando o email 
    if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
        echo "</b>E-Mail enviado com sucesso!</b>";
    } else {
        echo "</b>Falha no envio do E-Mail!</b>";
    }
}
?>