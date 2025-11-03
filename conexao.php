<?php
$host = "127.0.0.1:3316";     // servidor do MySQL (XAMPP usa localhost)
$usuario = "root";       // usuário padrão do MySQL no XAMPP
$senha = "";             // senha padrão do XAMPP é vazia
$banco = "clinica_1";      // nome do database que você criou no phpMyAdmin

$conn = new mysqli($host, $usuario, $senha, $banco);

// Checa se houve erro na conexão
if ($conn->connect_error) {
    die("❌ Erro ao conectar: " . $conn->connect_error);
}

// Opcional: define charset UTF-8
$conn->set_charset("utf8");
?>