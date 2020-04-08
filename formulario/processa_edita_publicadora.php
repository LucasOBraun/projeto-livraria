<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$result_autor = "UPDATE Publicadoras SET nome='$nome' WHERE id='$id'";
$resultado_autor = mysqli_query($conn, $result_autor);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: forestgreen'><b>A publicadora foi editada com sucesso!</b></h4>";
    header("Location: edita_publicadora.php?id={$id}");

}else{
    $_SESSION['msg'] = "<h4 style='color: red'><b>A publicadora não foi editada!</b></h4>";
    header("Location: edita_publicadora.php?id={$id}");
}
