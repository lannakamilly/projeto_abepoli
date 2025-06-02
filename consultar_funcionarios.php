<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "abepoli");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$sql = "SELECT * FROM funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Funcionários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./css/funcionarios.css">
</head>
<body>
    <h2 class="titulo">Consultar funcionários cadastrados</h2>

    <div class="container-funcionarios">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card-funcionario">
                <img class="img-funcionario" src="https://via.placeholder.com/60x60.png?text=👤" alt="Foto">
                <div class="info-funcionario">
                    <strong><?php echo htmlspecialchars($row['nome_funcionario']); ?></strong><br>
                    Cargo: <?php echo htmlspecialchars($row['cargo_funcionario']); ?><br>
                    Telefone: <?php echo htmlspecialchars($row['telefone_funcionario']); ?><br>
                    Email: <?php echo htmlspecialchars($row['email_funcionario']); ?>
                </div>
                <div class="botoes">
                    <a href="perfil.php?id=<?php echo $row['id_funcionario']; ?>" class="btn editar">Editar</a>
                    <a href="remover_funcionario.php?id=<?php echo $row['id_funcionario']; ?>" class="btn remover">Remover</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <a href="adicionar_funcionario.php" class="btn-adicionar">
        <i class="fa-solid fa-circle-plus"></i> Adicionar funcionário
    </a>
</body>
</html>
