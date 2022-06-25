<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("location: usuarios.php");
    }
?>
<?php include_once "header.php" ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Home - Chat em tempo real com PHP, MySQL e Javascript</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="mensagem_erro"></div>
                <div class="detalhes_do_nome">
                    <div class="campo input">
                        <label>Nome</label>
                        <input class="input" name="nome" type="text" placeholder="Primeiro nome" required>
                    </div>
                    <div class="campo input">
                        <label>Sobrenome</label>
                        <input class="input" name="sobrenome" type="text" placeholder="Sobrenome" required>
                    </div>
                </div>
                <div class="campo input">
                    <label>Email</label>
                    <input class="input" name="email" type="email" placeholder="Digite seu email" required>
                </div>
                <div class="campo input">
                    <label>Senha</label>
                    <input class="input" name="senha" type="password" placeholder="Crie uma senha" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="campo avatar">
                    <label>Avatar</label>
                    <input class="input" name="imagem" type="file" required>
                </div>
                <div class="campo button">
                    <input class="input" type="submit" value="Acessar chat">
                </div>
            </form>
            <div class="link">Já se inscreveu? <a href="login.php">Login</a></div>
        </section>
    </div>
    <script src="js/senha-mostrar-esconder.js"></script>
    <script src="js/inscricao.js"></script>
</body>

</html>