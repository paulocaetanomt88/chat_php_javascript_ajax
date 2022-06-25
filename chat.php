<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");;
}
?>

<?php include_once "header.php" ?>

<body>
    <div class="wrapper">
        <section class="chat_area">
            <header>
                <?php
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="usuarios.php" class="botao-voltar"><i class="fas fa-arrow-left"></i>
                </a>
                <img src="./php/imagens/<?php echo $row['img']; ?>" alt="Avatar de <?php echo $row['nome'] . " " . $row['sobrenome']; ?>">
                <div class="detalhes">
                    <span><?php echo $row['nome'] . " " . $row['sobrenome']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat_box">

            </div>
            <form action="#" class="area_digitacao" autocomplete="off">
                <input type="text" name="id_saida" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="id_entrada" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="mensagem" class="campo_entrada_mensagem" placeholder="Digite a mensagem aqui">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="js/chat.js"></script>
</body>

</html>
<!-- Continuar aula daqui https://youtu.be/VnvzxGWiK54?t=2727 -->