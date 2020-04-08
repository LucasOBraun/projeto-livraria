<?php
include_once ("conexao.php");

require_once "../sistema_jose/valida.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_publicadora = "DELETE FROM Publicadoras WHERE id='$id'";



if ($_SESSION['usuario']['permissao_user'] == 'user') {
    header("Location: ../sistema_jose/inicio.php");
    $_SESSION['msg'] = "<h4 style='color: red'><b>Você não tem permissão para acessar este comando!</b></h4>";
    return;

} else {
    $resultado_publicadora = mysqli_query($conn, $result_publicadora);
    header("Location: tabela_publicadora.php");
}