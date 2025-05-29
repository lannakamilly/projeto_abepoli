<?php
session_start();
require_once 'conexao.php';


$id = $_SESSION['admin'];
$stmt = $conexao->prepare("SELECT nome_admin, email_admin, senha_admin, foto_admin FROM administrador WHERE id_admin=?");
$stmt->bind_param("i", $id); // "i" para inteiro
$stmt->execute();
$resultado = $stmt->get_result();
$admin = $resultado->fetch_assoc();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
        * {
            
            box-sizing: border-box;
            font-family: var(--header-font);
        }
        :root {
            --primary-color: #e4af00;
            --secondary-color: #a50303;
            --terciary-color: rgb(228, 201, 0);
            --text-dark: #000000;
            --text-light: #000000;
            --extra-light: #fafafa;
            --white: #ffffff;
            --max-width: 1200px;
            --header-font: "Poppins", sans-serif;
        }

        .form-container {
            justify-content: center;
            align-items: center;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
            padding: 30px 30px 20px;
            max-width: 400px;
            width: 100%;
            margin: 70px auto 0 auto;
            text-align: left;
            height: auto;
        }

        .form-container .foto_perfil {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
            border: 3px solid var(--primary-color);
            background: #f3f4f6;
            display: block;
            margin-left: 37%;
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
            background: var(--primary-color);
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
            background: var(--terciary-color);
            transition: background 0.2s;
        }

        .tela-login {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .voltar {
            position: absolute;
            top: 40px;
            left: 50px;
            z-index: 10;
        }

        .voltar img {
            width: 45px;
            height: 50px;

        }

        /* .foto_perfil img{
            border-color: var(--primary-color);
            border-width: 2px;
        } */

        .title-foto-perfil {
            font-weight: 400;
            font-size: large;
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="voltar">
        <a href="./perfil.php">
            <img src="./img/arrow-left.png" alt="Voltar">
        </a>
    </div>
    <div class="form-container">
        <h2>Editar Perfil</h2>
        <form method="post" action="salvar_edicao.php" enctype="multipart/form-data">
            <label for="foto" class="title-foto-perfil">Foto de Perfil</label>
            <img id="preview-foto" class="foto_perfil" src="<?php
            if (!empty($admin['foto_admin'])) {
                echo 'data:image/jpeg;base64,' . base64_encode($admin['foto_admin']);
            } else {
                echo './img/avatar.png';
            }
            ?>" alt="Foto de perfil" style="width:90px;height:90px;border-radius:50%;object-fit:cover;margin-bottom:18px;">
            <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImagem(event)">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($admin['nome_admin']); ?>"
                required>

            <label for="email">Novo E-mail</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email_admin']); ?>"
                required>

            <label for="senha">Nova Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Deixe em branco para não alterar">

            <button type="submit">Salvar alterações</button>
        </form>
        <!-- <a href="perfil.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a> -->
    </div>
    <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
        <script>
            function previewImagem(event) {
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('preview-foto').src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
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