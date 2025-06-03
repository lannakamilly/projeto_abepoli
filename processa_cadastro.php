<?php
require_once 'conexao.php';

$mensagem = '';
$tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_funcionario'];
    $email = $_POST['email_funcionario'];
    $telefone = $_POST['telefone_funcionario'];
    $cargo = $_POST['cargo_funcionario'];
    $senha = password_hash($_POST['senha_funcionario'], PASSWORD_DEFAULT);

    $foto = null;
    if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] == 0) {
        $foto = file_get_contents($_FILES['foto_funcionario']['tmp_name']);
        $foto = base64_encode($foto); 
    }

    $stmt = $conexao->prepare("INSERT INTO funcionarios 
        (nome_funcionario, telefone_funcionario, email_funcionario, cargo_funcionario, foto_funcionario, senha_funcionario)
        VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        $mensagem = "Erro ao preparar: " . $conexao->error;
        $tipo = "error";
    } else {
        $stmt->bind_param("sissss", $nome, $telefone, $email, $cargo, $foto, $senha);

        if ($stmt->execute()) {
            $mensagem = "Funcionário cadastrado com sucesso!";
            $tipo = "success";
        } else {
            $mensagem = "Erro ao cadastrar: " . $stmt->error;
            $tipo = "error";
        }

        $stmt->close();
    }

    $conexao->close();
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
                window.location.href = 'index.php';
            }
        });
    </script>
</body>
</html>
