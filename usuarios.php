<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");;
}
?>

<?php include_once "header.php" ?>

<body>
    <div class="wrapper">
        <section class="usuarios">
            <header>
                <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="conteudo">
                    <img src="./php/imagens/<?php echo $row['img']; ?>" alt="<?php echo $row['nome'] . " " . $row['sobrenome']; ?>">
                    <div class="detalhes">
                        <span><?php echo $row['nome'] . " " . $row['sobrenome']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="sair">Sair</a>
            </header>
            <div class="pesquisa_usuario">
                <span class="text">Selecione um usuário para conversar</span>
                <input type="text" placeholder="Digite o nome para procurar...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="lista_usuarios">

            </div>
        </section>
    </div>
    <script src="js/usuarios.js"></script>
</body>

</html>