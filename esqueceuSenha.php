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
    <link rel="stylesheet" href="./css/senha.css" />
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
                        <div class="input-group">
                            <input type="password" name="senha" id="senha" required placeholder="Digite sua nova senha" />
                            <span class="toggle-password" data-target="senha">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path class="eye-slash" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" style="display: none;" />
                                </svg>
                            </span>
                        </div>

                        <label for="confirmar_senha">Confirmar senha</label>
                        <div class="input-group">
                            <input type="password" name="confirmar_senha" id="confirmar_senha" required placeholder="Confirme sua nova senha" />
                            <span class="toggle-password" data-target="confirmar_senha">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path class="eye-slash" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" style="display: none;" />
                                </svg>
                            </span>
                        </div>

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

    <script>
        document.querySelectorAll('.toggle-password').forEach(function (element) {
            element.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const eyeSlash = this.querySelector('.eye-slash');

                if (input.type === "password") {
                    input.type = "text";
                    eyeSlash.style.display = "block";
                } else {
                    input.type = "password";
                    eyeSlash.style.display = "none";
                }
            }); 
        });
    </script>
</body>

</html>
