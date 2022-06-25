<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $saida_id = mysqli_real_escape_string($conn, $_POST['id_saida']);
    $entrada_id = mysqli_real_escape_string($conn, $_POST['id_entrada']);
    $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);

    if (!empty($mensagem)) {
        $sql = mysqli_query($conn, "INSERT INTO mensagens (id_usuario_destino, id_usuario_emissor, mensagem) 
                                    VALUES ({$entrada_id}, {$saida_id}, '{$mensagem}')")
            or die("Erro ao gravar mensagem no banco de dados");
    }
} else {
    header("../login.php");
}
