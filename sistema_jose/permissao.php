<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//var_dump($_SESSION['usuario']['permissao_user']); exit();
if ($_SESSION['usuario']['permissao_user'] == 'user') {

    header("Location: ../sistema_jose/inicio.php");
    $_SESSION['msg'] = "<h4 style='color: red'><b>Você não tem permissão para acessar este comando!</b></h4>";
    return;
}
