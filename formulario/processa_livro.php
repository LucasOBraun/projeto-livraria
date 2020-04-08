<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$autor = filter_input(INPUT_POST, 'autor_id', FILTER_SANITIZE_STRING);
$publicadora = filter_input(INPUT_POST, 'publicadora_id', FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_NUMBER_INT);
$pagina = filter_input(INPUT_POST, 'numero_pg', FILTER_SANITIZE_NUMBER_INT);


$result_livro = "INSERT INTO `Livros` (`nome`, `autor_id`, `publicadora_id`, `isbn`, `numero_pg`) VALUES ('$nome', '$autor', '$publicadora', '$isbn', '$pagina')";
$resultado_livro = mysqli_query($conn, $result_livro);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg_cadastro'] = "<h4 style='color: forestgreen'><b>O livro foi cadastrado com sucesso!</b></h4>";
    header("Location: cadastro_livro.php");

}else{

    ($_SESSION['msg_cadastro'] = "<h4 style='color: red'><b>O livro não foi cadastrado!</b></h4>");
    header("Location: cadastro_livro.php");
}
