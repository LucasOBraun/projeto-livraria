<?php
session_start();
include_once("conexao.php");
require_once "../sistema_jose/permissao.php";
require_once "../sistema_jose/valida.php";
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$result_autor = "INSERT INTO `Autores` (`nome`) VALUES ('$nome')";
$resultado_autor = mysqli_query($conn, $result_autor);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg_cadastro'] = "<h4 style='color: forestgreen'><b>Autor cadastrado com sucesso!</b></h4>";
    header("Location: cadastro_autor.php");

}else{
    $_SESSION['msg_cadastro'] = "<h4 style='color: red'><b>O autor não foi cadastrado!</b></h4>";
    header("Location: cadastro_autor.php");
}

