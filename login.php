<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="login-container">  
    <a href="index.php" class="back-arrow">&#8592;</a> 
        <div class="login-box">
            <h2>Faça o seu login</h2>
            <hr class="divider"/>

            <form action="#" method="post">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>

                <a href="index.php" class="forgot-password">Esqueceu a senha?</a>

                <button id="loginButton" type="submit">ENTRAR</button>
            </form>
            <script>
                document.getElementById('loginButton').addEventListener('click', function(event) {
                event.preventDefault(); // Impede o envio imediato do formulário
        
                alert('Usuário logado com sucesso!');
        
        
                window.location.href = 'index.php';
                });
            </script>
        </div>
    </div>
</body>
</html>