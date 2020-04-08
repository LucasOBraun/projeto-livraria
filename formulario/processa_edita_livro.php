<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor_id', FILTER_SANITIZE_STRING);
$publicadora = filter_input(INPUT_POST, 'publicadora_id', FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_NUMBER_INT);
$pagina = filter_input(INPUT_POST, 'numero_pg', FILTER_SANITIZE_NUMBER_INT);

$result_livro = "UPDATE Livros SET nome='$nome', autor_id='$autor', publicadora_id='$publicadora', isbn='$isbn', numero_pg='$pagina' WHERE id='$id'";
$resultado_livro = mysqli_query($conn, $result_livro);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: forestgreen'><b>O livro foi editado com sucesso!</b></h4>";
    header("Location: edita_livro.php?id={$id}");

}else{
    $_SESSION['msg'] = "<h4 style='color: red'><b>O livro não foi editado!</b></h4>";
    header("Location: edita_livro.php?id={$id}");
}
