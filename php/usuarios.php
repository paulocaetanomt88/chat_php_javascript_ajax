<?php
// Habilitando uso de sessões
session_start();

// Incluindo o arquivo de conexão com o banco de dados
include_once "config.php";

$id_emissor = $_SESSION["unique_id"];

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE NOT unique_id = {$id_emissor}");

$output = "";

if (mysqli_num_rows($sql) == 0) {
    $output .= "Nenhum usuário online.";
} elseif (mysqli_num_rows($sql) > 0) {
    include "data.php";
}

echo $output;
