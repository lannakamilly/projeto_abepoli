<?php
session_start();
require_once 'conexao.php';

$usuario = null;
$tipo = null;

if (isset($_SESSION['admin'])) {
    $id = $_SESSION['admin'];
    $tipo = 'admin';
    $stmt = $conexao->prepare("SELECT nome_admin AS nome, email_admin AS email, senha_admin AS senha, foto_admin AS foto FROM administrador WHERE id_admin = ?");
} elseif (isset($_SESSION['funcionario'])) {
    $id = $_SESSION['funcionario'];
    $tipo = 'funcionario';
    $stmt = $conexao->prepare("SELECT nome_funcionario AS nome, email_funcionario AS email, senha_funcionario AS senha, foto_funcionario AS foto FROM funcionario WHERE id_funcionario = ?");
} else {
    header("Location: login.php");
    exit;
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario || !is_array($usuario)) {
    $usuario = [
        'nome' => '',
        'email' => '',
        'senha' => '',
        'foto' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="./css/perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
        * {
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --primary-color: #e4af00;
            --terciary-color: rgb(228, 201, 0);
        }

        .form-container {
            justify-content: center;
            align-items: center;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 500px;
            height: 550px;
            margin: 70px auto 0;
        }

        .foto_perfil {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 18px;
            display: block;
            border: 3px solid var(--primary-color);
        }

        label {
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 22px;
            padding: 10px 28px;
            font-weight: 600;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background: var(--terciary-color);
        }

        .voltar {
            position: absolute;
            top: 40px;
            left: 50px;
        }

        .voltar img {
            width: 45px;
        }
    </style>
</head>

<body>
    <div class="voltar">
        <a href="perfil.php"><img src="./img/arrow-left.png" alt="Voltar"></a>
    </div>

    <div class="form-container">
        <h2>Editar Perfil</h2>
        <form method="post" action="salvar_edicao.php" enctype="multipart/form-data">
            <label for="foto" class="title-foto-perfil">Foto de Perfil</label>
            <img id="preview-foto" class="foto_perfil" src="<?php
            echo !empty($usuario['foto']) ? 'data:image/jpeg;base64,' . base64_encode($usuario['foto']) : './img/avatar.png';
            ?>" alt="Foto de perfil">

            <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImagem(event)">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>

            <label for="email">Novo E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

           

            <input type="hidden" name="tipo" value="<?= $tipo ?>">

            <button type="submit">Salvar alterações</button>
        </form>
    </div>

    <script>
        function previewImagem(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preview-foto').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <?php if (isset($_GET['sucesso'])): ?>
<script>
    Swal.fire({
        title: 'Perfil atualizado!',
        text: 'Suas informações foram salvas com sucesso.',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#e4af00'
    });
</script>
<?php endif; ?>

</body>
</html>
