<?php
include_once "conexao.php";
require_once "../sistema_jose/valida.php";
$consulta_publicadoras = "SELECT * FROM Publicadoras";
$publicadoras = $conn->query($consulta_publicadoras) or die("Não foi possível listar a publicadora.");
$consulta_autores = "SELECT * FROM Autores";
$autores = $conn->query($consulta_autores) or die("Não foi possível listar o autor.");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Cadastro Livros</title>
        <link rel="icon" href="/livraria/sistema_jose/icon.png" type="image/x-icon">
        <link href="/livraria/sistema_jose/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/livraria/sistema_jose/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/livraria/sistema_jose/js/bootstrap.min.js"></script>
    </head>
        <body>
        <body background="/livraria/sistema_jose/fundo.jpg"></body>
        <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-warning">

            <div class="container">

                <a class="navbar-brand" href="/livraria/sistema_jose/inicio.php">Livraria</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSistema">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSistema">

                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/sistema_jose/inicio.php" data-toggle="dropdown" id="navLivros">Livros</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/livraria/formulario/tabela_livro.php">Ver</a>
                                <a class="dropdown-item" href="/livraria/formulario/cadastro_livro.php">Adicionar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/sistema_jose/inicio.php" data-toggle="dropdown" id="navAutores">Autores</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/livraria/formulario/tabela_autor.php">Ver</a>
                                <a class="dropdown-item" href="/livraria/formulario/cadastro_autor.php">Adicionar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/sistema_jose/inicio.php" data-toggle="dropdown" id="navPublicadoras">Publicadoras</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/livraria/formulario/tabela_publicadora.php">Ver</a>
                                <a class="dropdown-item" href="/livraria/formulario/cadastro_publicadora.php">Adicionar</a>
                            </div>
                        </li>
                    </ul>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li><a class="dropdown-item" href="/livraria/sistema_jose/sair.php">Sair</a> </li>
                    </ul>
                </div>
            </div>
        </nav>

            <br><h1 align="center">Cadastrar Livro</h1>

            <form align="center" method="post" action="processa_livro.php">
                <br><label><b>Nome: </b></label>
                <input type="text" name="nome" placeholder="Digite o nome do livro ">
                <br><br>
                <label><b>Autor: </b></label>
                <select name="autor_id">
                    <?php while ($dados = $autores->fetch_array()){ ?>
                    <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"]; ?></option>
                    <?php } ?>
                </select>
                <br><br>
                <label><b>Publicadora: </b></label>
                <select name="publicadora_id">
                    <?php while ($dados = $publicadoras->fetch_array()){ ?>
                    <option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"]; ?></option>
                    <?php } ?>
                </select>
                <br><br>
                <label><b>Código (ISBN): </b></label>
                <input type="text" name="isbn" placeholder="Digite o número do código ">
                <br><br>
                <label><b>Número de páginas: </b></label>
                <input type="text" name="numero_pg" placeholder="Digite o número de páginas ">
                <br><br>

                <input type="submit" value="Cadastrar">
                <br>
                <br>
                <?php
                if (isset($_SESSION['msg_cadastro'])) {
                    echo $_SESSION['msg_cadastro'];
                    unset($_SESSION['msg_cadastro']);
                }
                ?>
            </form>
        </body>
</html>
