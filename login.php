<?php
session_start();

/* LOGOUT */
if (isset($_GET['acao']) && $_GET['acao'] == 'logout') {
    session_destroy();
    header("Location: login.html");
    exit();
}
\
/* LOGIN */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['email'];
    $senha = $_POST['senha'];

    // Credenciais pré-definidas
    $usuarioCorreto = "admin@email.com";
    $senhaCorreta = "123456";

    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {

        $_SESSION['usuario_logado'] = $usuario;

        header("Location: forum.html");
        exit();

    } else {

        echo "Usuário ou senha incorretos.";
        exit();
    }
}

/* SEGURANÇA */
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.html");
    exit();
}
?>
