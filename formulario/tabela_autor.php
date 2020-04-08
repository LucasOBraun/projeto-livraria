<?php
include ("conexao.php");
require_once "../sistema_jose/valida.php";
$consulta = "SELECT * FROM Autores";
$con = $conn->query($consulta) or die("Não foi possivel listar os Autores.");
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Autores Cadastrados</title>
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
<br><br>
<h1 align="center">Lista de Autores</h1>
<br>
<div class="container">
<table style="background-color: rgba(255,185,0,0.89)" class="table table-bordered" align="center">
        <tr class="table">
            <th scope="col"><b>Id </b></th>
            <th scope="col"><b>Nome </b></th>
            <th scope="col"><b>Acão </b></th>
        </tr>
    <?php while ($dados = $con->fetch_array()){ ?>
        <tr class="table">
            <td><?php echo $dados["id"]; ?></td>
            <td><?php echo $dados["nome"]; ?></td>
            <td><a type="submit" href="edita_autor.php?id=<?php echo $dados["id"]; ?>">Editar </a>
                <a type="submit"  href="processa_deleta_autor.php?id=<?php echo $dados["id"]; ?>">Deletar </a></td>
        </tr>
    <?php } ?>

</table>
</div>
</body>
</html>
