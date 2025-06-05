<?php
session_start();
require_once('conexao.php');

$mensagem = "";
$tipo = "error";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados do formulário
    $nome = $_POST['nome_funcionario'] ?? '';
    $email = $_POST['email_funcionario'] ?? '';
    $telefone = $_POST['telefone_funcionario'] ?? '';
    $cargo = $_POST['cargo_funcionario'] ?? '';
    $senha = $_POST['senha_funcionario'] ?? '';

    // Validação
    if (empty($nome) || empty($email) || empty($telefone) || empty($cargo) || empty($senha)) {
        $mensagem = "Por favor, preencha todos os campos.";
    } else {
        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Tratamento da foto
        $foto_binaria = null;
        if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] === UPLOAD_ERR_OK) {
            $foto_binaria = file_get_contents($_FILES['foto_funcionario']['tmp_name']);
        }

        // Query
        $sql = "INSERT INTO funcionarios (nome_funcionario, email_funcionario, telefone_funcionario, cargo_funcionario, senha_funcionario, foto_funcionario) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        if ($stmt) {
            $null = null;
            $stmt->bind_param("sssssb", $nome, $email, $telefone, $cargo, $senha_hash, $null);

            if ($foto_binaria !== null) {
                $stmt->send_long_data(5, $foto_binaria);
            }

            if ($stmt->execute()) {
                $mensagem = "Funcionário cadastrado com sucesso!";
                $tipo = "success";
            } else {
                $mensagem = "Erro ao cadastrar funcionário: " . $stmt->error;
            }
        } else {
            $mensagem = "Erro na preparação da query: " . $conexao->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            title: '<?= $tipo === "success" ? "Sucesso!" : "Erro!" ?>',
            text: '<?= $mensagem ?>',
            icon: '<?= $tipo ?>',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'adicionar_funcionario.php';
            }
        });
    </script>
</body>
</html>
