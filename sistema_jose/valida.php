<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])){
    header("Location: ../sistema_jose/index.php");
    return;
}
