<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$result_public = "INSERT INTO `Publicadoras` (`nome`) VALUES ('$nome')";
$resultado_public = mysqli_query($conn, $result_public);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg_cadastro'] = "<h4 style='color: forestgreen'><b>Publicadora cadastrada com sucesso!</b></h4>";
    header("Location: cadastro_publicadora.php");

} else {
    $_SESSION['msg_cadastro'] = "<h4 style='color: red'><b>A publicadora não foi cadastrada!</b></h4>";
    header("Location: cadastro_publicadora.php");
}
