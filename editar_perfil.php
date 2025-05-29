<?php
session_start();
require_once 'conexao.php';


$id = $_SESSION['admin'];
$stmt = $conexao->prepare("SELECT nome_admin, email_admin, senha_admin, foto_admin FROM administrador WHERE id_admin=?");
$stmt->bind_param("i", $id); // "i" para inteiro
$stmt->execute();
$resultado = $stmt->get_result();
$admin = $stmt->fetch() ;

if (!$admin || !is_array($admin)) {
    $admin = [
        'nome_admin' => '',
        'email_admin' => '',
        'senha_admin' => '',
        'foto_admin' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<title>Editar perfil</title>

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="./css/perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .form-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
            padding: 30px 30px 20px;
            max-width: 400px;
            width: 100%;
            margin: 40px auto 0 auto;
            text-align: left;
        }

        .form-container img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            border: 3px solid #F18800;
            background: #f3f4f6;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container label {
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            font-size: 1em;
        }

        .form-container button {
            background: #F18800;
            color: #fff;
            border: none;
            border-radius: 22px;
            padding: 10px 28px;
            font-weight: 600;
            font-size: 1em;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        .form-container button:hover {
            background: #d97706;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Editar Perfil</h2>
        <form method="post" action="salvar_edicao.php" enctype="multipart/form-data">
            <label for="foto">Foto de Perfil</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($admin['nome_admin']); ?>"
                required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email_admin']); ?>"
                required>

            <label for="senha">Nova senha</label>
            <input type="password" id="senha" name="senha" placeholder="Deixe em branco para não alterar">

            <button type="submit">Salvar alterações</button>
        </form>
        <a href="perfil.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>
    </div>
    <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
        <script>
            Swal.fire({
                title: "Informações salvas!",
                icon: "success",
                draggable: true
            }).then(() => {
                window.location.href = "perfil.php";
            });
        </script>
    <?php endif; ?>
</body>

</html>;