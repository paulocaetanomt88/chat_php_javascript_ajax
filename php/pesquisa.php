<?php
session_start();
include_once "config.php";
$id_emissor = $_SESSION["unique_id"];
$termoPesquisa = mysqli_real_escape_string($conn, $_POST['termoPesquisa']);

$output =  "";

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE NOT unique_id = {$id_emissor} AND (nome LIKE '%{$termoPesquisa}' OR sobrenome LIKE '%{$termoPesquisa}%')");

if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "Nenhum usuário encontrado com esse nome.";
}

echo $output;
