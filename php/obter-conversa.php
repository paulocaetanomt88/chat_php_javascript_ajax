<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $saida_id = mysqli_real_escape_string($conn, $_POST['id_saida']);
    $entrada_id = mysqli_real_escape_string($conn, $_POST['id_entrada']);
    $saida = "";

    $sql = "SELECT * FROM mensagens
            INNER JOIN usuarios ON usuarios.unique_id = mensagens.id_usuario_emissor
            WHERE (id_usuario_emissor = {$saida_id} AND id_usuario_destino = {$entrada_id})
            OR (id_usuario_emissor = {$entrada_id} AND id_usuario_destino = {$saida_id}) ORDER BY id_mensagem";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($registro = mysqli_fetch_assoc($query)) {
            if ($registro['id_usuario_emissor'] === $saida_id) {
                $saida .= '<div class="chat saida">
                <div class="detalhes">
                    <p>' . $registro['mensagem'] . '</p>
                    </div>
                </div>';
            } else {
                $saida .= '<div class="chat entrada">
                <img src="php/imagens/' . $registro['img'] . '">
                <div class="detalhes">
                    <p>' . $registro['mensagem'] . '</p>
                    </div>
                </div>';
            }
        }
        echo $saida;
    }
} else {
    header("../login.php");
}
