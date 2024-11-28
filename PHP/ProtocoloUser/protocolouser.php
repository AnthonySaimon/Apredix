<?php

class Conexao
{
    public static $instance;

    public static function get_instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=aprendix",
                "root",
                "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4')
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

class protocoloUser extends Conexao
{

    public function list_client()
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM comentarios ";
        $statement = $pdo->query($sql);
        return $statement->fetchAll();
    }


    public function add_comentario($data)
    {
        $coment = $_POST['comentario'];
        $iduser = $_POST['iduser'];

        $sql = "INSERT INTO  comentarios ( id, iduser, comentario) VALUES (null,'$coment')";
        $pdo = parent::get_instance();
        if ($pdo->query($sql) === TRUE) {
            header("Location: ../modelo_cusos/index.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $pdo->error;
        }
    }
}
