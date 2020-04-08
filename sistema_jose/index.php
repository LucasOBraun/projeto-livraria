<?php
session_start();
require_once "usuario.php";
$u = new usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Login - Livraria</title>
        <style>
            body{
                margin: 0 auto;
                background-repeat: no-repeat;
            }

            .container{
                width: 500px;
                height: 450px;
                text-align: center;
                margin: 0 auto;
                margin-top: 160px;
            }

            .container img{
                width: 150px;
                height: 150px;
                margin-top: -60px;
            }

            .btn-login{
                padding: 15px 25px;
                border: none;
                background-color: #27ae60;
                color: #fff;
            }
        </style>
        <link rel="icon" href="/livraria/sistema_jose/icon.png" type="image/x-icon">
        <link href="/livraria/sistema_jose/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/livraria/sistema_jose/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/livraria/sistema_jose/js/bootstrap.min.js"></script>

    </head>
    <body>
    <body background="fundo.jpg"></body>

        <div class="container" id="corpo-form">
                <h2 class="">Livraria do José</h2><br>
                <form method="post">
                    <input type="email" placeholder="Email" name="email"><br><br>
                    <input type="password" placeholder="Senha" name="senha"><br><br>
                    <input type="submit" value="Entrar"><br>

                </form>



        <?php
if (isset($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)){

        $u->conectar("daniel22", "mysql07-farm1.kinghost.net", "daniel22", "c4t14u");

        if ($u->msgErro == ""){

            if ($u->logar($email, $senha)){
                header("Location: inicio.php");

            }else{
                ?>
            <div class="msg-error">Email ou Senha incorretos!</div>
            <?php
            }
        }else {
        ?>
            <div class="msg-error">Erro com a conexão com o Banco de Dados!</div>
            <?php
        }

    }else{
        ?>
            <div class="msg-error">Preencha todos os campos!</div>
            <?php
    }
}
        ?>
        </div>
    </body>
</html>