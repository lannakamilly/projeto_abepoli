<?php
include('conexao.php');

$mensagem = "";
$tipoAlerta = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $novaSenha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmar_senha"];

    if ($novaSenha !== $confirmarSenha) {
        $mensagem = "As senhas não coincidem.";
        $tipoAlerta = "error";
    } else {
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        $stmt = $conexao->prepare("SELECT id_admin FROM administrador WHERE email_admin = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->close();

            $stmt = $conexao->prepare("UPDATE administrador SET senha_admin = ? WHERE email_admin = ?");
            $stmt->bind_param("ss", $novaSenhaHash, $email);
            if ($stmt->execute()) {
                $mensagem = "Senha atualizada com sucesso!";
                $tipoAlerta = "success";
            } else {
                $mensagem = "Erro ao atualizar a senha.";
                $tipoAlerta = "error";
            }
        } else {
            $mensagem = "Email não encontrado.";
            $tipoAlerta = "error";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Esqueceu a Senha - Instituto Abepoli</title>
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="tela-login">
        <a href="./login.php" class="voltar">
            <img src="./img/botao_voltar.png" alt="Voltar">
        </a>

        <div class="conteudo">
            <div class="lado-esquerdo"></div>

            <div class="lado-direito">
                <div class="card-login">
                    <h1 class="esqueceuSenhaTitulo">Esqueceu sua senha?</h1>
                    <hr class="linha-titulo-esqueceu">

                    <form method="POST" action="">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required placeholder="Digite seu email" />

                        <label for="senha">Nova senha</label>
                        <input type="password" name="senha" id="senha" required placeholder="Digite sua nova senha" />

                        <label for="confirmar_senha">Confirmar senha</label>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" required placeholder="Confirme sua nova senha" />

                        <button type="submit" class="botao-entrar">ENTRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($mensagem)) : ?>
        <script>
            Swal.fire({
                icon: '<?= $tipoAlerta ?>',
                title: '<?= $tipoAlerta === "success" ? "Sucesso!" : "Erro!" ?>',
                text: '<?= $mensagem ?>'
            });
        </script>
    <?php endif; ?>
</body>

</html>
