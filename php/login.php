<?php
// Habilitando uso de sessões
session_start();

// Incluindo o arquivo de conexão com o banco de dados
include_once "config.php";

// recebendo os dados do usuário e armazenando nas variáveis correspondentes
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

// verificando se os campos recebidos do formulário não estão vazios
if (!empty($email) && !empty($senha)) {
    // verificando se o email e senha informados existe na base de dados
    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senha}'");
    if (mysqli_num_rows($sql) > 0) { // se as credenciais estiverem corretas
        $row = mysqli_fetch_assoc($sql);
        $status = "online";
        $sql2 = mysqli_query($conn, "UPDATE usuarios SET status = '{$status}' WHERE unique_id = '{$row['unique_id']}'");
        if ($sql2) {
            $_SESSION['unique_id'] = $row['unique_id'];
            echo 'Sucesso';
        }
    } else {
        echo "Email ou senha não correspondem.";
    }
} else {
    echo "Todos os campos são necessários!";
}
