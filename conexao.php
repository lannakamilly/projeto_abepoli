<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "abepoli";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
