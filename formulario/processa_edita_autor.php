<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$result_autor = "UPDATE Autores SET nome='$nome' WHERE id='$id'";
$resultado_autor = mysqli_query($conn, $result_autor);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: forestgreen'><b>O autor foi editado com sucesso!</b></h4>";
    header("Location: edita_autor.php?id={$id}");

}else{
    $_SESSION['msg'] = "<h4 style='color: red'><b>O autor não foi editado!</b></h4>";
    header("Location: edita_autor.php?id={$id}");
}
