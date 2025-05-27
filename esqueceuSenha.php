<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Instituto Abepoli</title>
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="tela-login">
        <a href="./login.php" class="voltar">
            <img src="./img/botao_voltar.png" alt="Voltar">
        </a>

        <div class="conteudo">
            <div class="lado-esquerdo">

            </div>

            <div class="lado-direito">
                <div class="card-login">
                    <h1 class="esqueceuSenhaTitulo">Esqueceu sua senha?</h1>
                    <hr class="linha-titulo-esqueceu">
                    <form>
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Digite seu email" />

                        <label for="senha">Nova senha</label>
                        <input type="password" id="senha" placeholder="Digite sua nova senha" />
                        <label for="senha">Confirmar senha</label>
                        <input type="password" id="senha" placeholder="Confirme sua nova senha" />


                        <a href="./perfil.php" class="botao-entrar">ENTRAR</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>