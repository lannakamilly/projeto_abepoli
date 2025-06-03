<?php
// Exibe mensagem de sucesso
$mensagem = "";
if (isset($_GET['sucesso']) && $_GET['sucesso'] == '1') {
    $mensagem = "Funcionário cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="./css/addFuncionario.css">
</head>
<body>
    <form action="processa_cadastro.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <img src="./img/logo.png" alt="Instituto Abepol" class="logo">
            <h2>Cadastrar funcionário</h2>
            <hr>

            <div class="form-foto">
                <img src="https://via.placeholder.com/100x100.png?text=Foto" class="avatar">
                <input type="file" name="foto_funcionario" accept="image/*">
            </div>

            <label>Nome completo</label>
            <input type="text" name="nome_funcionario" required>

            <label>Email</label>
            <input type="email" name="email_funcionario" required>

            <label>Telefone</label>
            <input type="text" name="telefone_funcionario" required>

            <label>Cargo</label>
            <select name="cargo_funcionario" required>
                <option value="">Selecione o cargo</option>
                <option value="Cargo 1">Cargo 1</option>
                <option value="Cargo 2">Cargo 2</option>
                <option value="Cargo 3">Cargo 3</option>
                <option value="Cargo 4">Cargo 4</option>
            </select>

            <label>Senha:</label>
            <input type="password" name="senha_funcionario" required>

            <button type="submit">CADASTRAR</button>

            <?php if ($mensagem): ?>
                <p class="sucesso"><?= $mensagem ?></p>
            <?php endif; ?>
        </div>
    </form>
</body>
</html>
