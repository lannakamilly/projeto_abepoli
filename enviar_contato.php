<?php
// Dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Destinatário
$para = "silvareginmr@gmail.com";
$assunto = "Formulário de Contato - Instituto Abepoli";

// Corpo do email
$corpo = "
    <h2>Nova mensagem do site</h2>
    <b>Nome:</b> $nome<br>
    <b>Email:</b> $email<br>
    <b>Mensagem:</b><br>
    $mensagem
";

// Cabeçalhos
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $nome <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root"; // ou outro usuário do seu phpMyAdmin
$senha = ""; // senha do phpMyAdmin
$banco = "abepoli";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Inserir no banco de dados
$sql = "INSERT INTO contato (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
$conn->query($sql);

// Enviar o email
if(mail($para, $assunto, $corpo, $headers)){
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='contato.php';</script>";
} else {
    echo "<script>alert('Erro ao enviar mensagem. Tente novamente mais tarde.'); window.location.href='contato.php';</script>";
}

// Fechar conexão
$conn->close();
?>
