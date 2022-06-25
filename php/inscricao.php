<?php
// Habilitando uso de sessões
session_start();

// Incluindo o arquivo de conexão com o banco de dados
include_once "config.php";

// recebendo os dados do usuário e armazenando nas variáveis correspondentes
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

// verificando se os campos recebidos do formulário não estão vazios
if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // verificando se o email já existe na base de dados
        $sql = mysqli_query($conn, "SELECT email FROM usuarios WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email já está cadastrado";
        } else {
            // verificando se o arquivo de imagem foi recebido
            if (isset($_FILES['imagem'])) { // se o arquivo for enviado
                $img_name = $_FILES['imagem']['name']; // aqui pega o nome do arquivo no dispositivo do usuário
                $tmp_name = $_FILES['imagem']['tmp_name']; // este nome temporário é usado para mover o arquivo para nossa pasta no servidor

                // vamos usar a função explode() para pegar a extensão do arquivo
                $img_explode = explode('.', $img_name);
                $img_extension = end($img_explode); // aqui obtemos a extensão do arquivo de imagem

                $extensions = ['png', 'jpeg', 'jpg']; // estas são as extensões que definimos como válidas para imagens

                if (in_array($img_extension, $extensions) === true) { // verifica se a extensão do arquivo está na lista das extensões válidas
                    $time = time(); // armazena a hora atual para criar nome único para o arquivo recebido

                    // movendo o arquivo recebido para nossa pasta no servidor
                    $novo_nome_imagem = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "imagens/" . $novo_nome_imagem)) {
                        $status = "Active now"; // uma vez que o usuário se inscreveu, seu status estará ativo agora
                        $random_id = rand(time(), 10000000); // criando id único para o usuário

                        // Inserindo dados recebidos do usuário na tabela na base de dados
                        $sql2 = mysqli_query($conn, "INSERT INTO usuarios (unique_id, nome, sobrenome, email, senha, img, status)
                                            VALUES ({$random_id}, '{$nome}', '{$sobrenome}', '{$email}', '{$senha}', '{$novo_nome_imagem}', '{$status}')");
                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; // criando essa sessão nós usaremos em outro arquivo PHP
                                echo "Sucesso";
                            }
                        } else {
                            echo "Algo deu errado.";
                        }
                    }
                } else {
                    echo "Por favor selecione um tipo de imagem do tipo: jpg, jpeg ou png.";
                }
            } else {
                echo "Por favor, envie uma imagem para usar como seu avatar.";
            }
        }
    } else {
        echo $email . " não é um email válido";
    }
} else {
    echo "Todos os campos são necessários!";
}
