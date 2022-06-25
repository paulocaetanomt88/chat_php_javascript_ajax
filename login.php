<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: usuarios.php");
}
?>
<?php include_once "header.php" ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Login - Chat em tempo real com PHP, MySQL e Javascript</header>
            <form action="#" autocomplete="off">
                <div class="mensagem_erro"></div>
                <div class="campo input">
                    <label>Email</label>
                    <input class="input" name="email" type="email" placeholder="Digite seu email">
                </div>
                <div class="campo input">
                    <label>Senha</label>
                    <input class="input" name="senha" type="password" placeholder="Entre com sua senha">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="campo button">
                    <input class="input" type="submit" value="Acessar chat">
                </div>
            </form>
            <div class="link">Ainda não se inscreveu? <a href="index.php">Inscreva-se agora!</a></div>
        </section>
    </div>
    <script src="js/senha-mostrar-esconder.js"></script>
    <script src="js/login.js"></script>
</body>

</html>