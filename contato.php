<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Portal Abepoli</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<header>
    <nav>
        <div class="logo">
            <img src="img/logo1.jpg" alt="img">
        </div>
        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="registros.php">Registros</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="acoes.php">Ações/Projetos</a></li>
            <li><a href="doacoes.php">Doações</a></li>
            <li><a href="contato.php" class="active">Contato</a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="" method="post">
            <label for="name">Nome</label>
            <input type="text" name="nome" placeholder="Escreva seu nome" required>
            
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Insira seu email" required>
            
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" placeholder="Escreva sua dúvida" required></textarea>
            
            <button class="contatobotao" type="submit">ENVIAR</button>
        </form>
    </div>
    <script src="main.js"></script>   
</header>
<body>
</body>
</html>