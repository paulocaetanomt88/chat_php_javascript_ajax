<?php

while ($registro = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * FROM mensagens WHERE (id_usuario_destino = {$registro['unique_id']}
                OR id_usuario_emissor = {$registro['unique_id']}) AND (id_usuario_emissor = {$id_emissor}
                OR id_usuario_emissor = {$id_emissor}) ORDER BY id_mensagem DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $registro2 = mysqli_fetch_assoc($query2);

    if (mysqli_num_rows($query2) > 0) {
        $resultado = $registro2['mensagem'];
    } else {
        $resultado = "nenhuma mensagem disponível.";
    }

    // cortando a mensagem se a palavra for maior que 28
    (strlen($resultado) > 28) ? $mensagem = substr($resultado, 0, 28) . '...' : $mensagem = $resultado;

    // adicionando 'você:' antes da mensagem do usuario que estiver logado
    ($id_emissor == $registro2['id_usuario_emissor']) ? $voce = "Você: " : $voce = "";

    // verificando se o usuario está online ou offline
    ($registro['status'] == "offline") ? $offline = "offline" : $offline = '';

    $output .= '<a href="chat.php?user_id=' . $registro['unique_id'] . '">
            <div class="conteudo">
                <img src="php/imagens/' . $registro['img'] . '" alt="Avatar de ' . $registro['nome'] . " " . $registro['sobrenome'] . '">
                <div class="detalhes">
                    <span>' . $registro['nome'] . " " . $registro['sobrenome'] . '</span>
                    <p>' . $voce . $mensagem . '</p>
                </div>
            </div>
            <div class="status-dot ' . $offline . '" ><i class="fas fa-circle"></i></div>
        </a>';
}
