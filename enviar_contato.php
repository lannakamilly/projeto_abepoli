<?php
// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Verificação simples
if(empty($nome) || empty($email) || empty($mensagem)){
    echo "<script>alert('Por favor, preencha todos os campos.'); window.history.back();</script>";
    exit;
}

// Email de destino
$para = "miguelborgess2016@gmail.com";

// Assunto do email
$assunto = "Nova mensagem do site - Instituto Abepoli";

// Corpo do email
$corpo = "
    <html>
    <body>
        <h2>Nova mensagem do formulário de contato</h2>
        <p><strong>Nome:</strong> {$nome}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Mensagem:</strong><br>{$mensagem}</p>
    </body>
    </html>
";

// Cabeçalhos do email
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Instituto Abepoli <contato@seudominio.com>\r\n"; // Use um email válido do seu domínio
$headers .= "Reply-To: {$email}\r\n";

// Envio do email
if(mail($para, $assunto, $corpo, $headers)){
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='contato.php';</script>";
} else {
    echo "<script>alert('Erro ao enviar mensagem. Verifique seu servidor.'); window.history.back();</script>";
}
?>
