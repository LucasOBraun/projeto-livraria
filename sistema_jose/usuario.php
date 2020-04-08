<?php

class usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($db, $host, $usuario, $senha){
        global $pdo;
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db",$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function logar($email, $senha) : void
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM Usuarios WHERE email=:email AND senha=:senha");
        $sql->bindValue(":email",$email);
        $sql->bindValue(":senha",md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['usuario'] = $dado;
            header("Location: inicio.php");

        }

    }
    

}
