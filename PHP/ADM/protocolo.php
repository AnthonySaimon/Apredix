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

class protocolo extends Conexao
{

    public function list_client()
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM usuario ORDER BY id asc";
        $statement = $pdo->query($sql);
        return $statement->fetchAll();
    }

    public function list_client_by_id($id)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function update_client($data)
    {
        if (isset($data['id']) && isset($data['nome']) && isset($data['sobrenome']) && isset($data['email']) && isset($data['senha']) && isset($data['permissao'])) {
            $pdo = parent::get_instance();
            $sql = "UPDATE usuario 
                    SET nome = :nome, sobrenome = :sobrenome, email = :email, senha = :senha, permissao = :permissao
                    WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $data['id'], PDO::PARAM_STR);
            $statement->bindValue(":nome", $data['nome'], PDO::PARAM_STR);
            $statement->bindValue(":sobrenome", $data['sobrenome'], PDO::PARAM_STR);
            $statement->bindValue(":email", $data['email'], PDO::PARAM_STR);
            $statement->bindValue(":senha", $data['senha'], PDO::PARAM_STR);
            $statement->bindValue(":permissao", $data['permissao'], PDO::PARAM_STR);

            $statement->execute();
        }
    }
    public function Ban_client($data)
    {
        if (isset($data['id']) && isset($data['nome']) && isset($data['sobrenome']) && isset($data['email']) && isset($data['senha']) && isset($data['permissao'])) {
            $pdo = parent::get_instance();
            $sql = "UPDATE usuario 
                    SET nome = :nome, sobrenome = :sobrenome, email = :email, senha = :senha, permissao = :permissao
                    WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $data['id'], PDO::PARAM_STR);
            $statement->bindValue(":nome", $data['nome'], PDO::PARAM_STR);
            $statement->bindValue(":sobrenome", $data['sobrenome'], PDO::PARAM_STR);
            $statement->bindValue(":email", $data['email'], PDO::PARAM_STR);
            $statement->bindValue(":senha", $data['senha'], PDO::PARAM_STR);
            $statement->bindValue(":permissao", "Banido");

            $statement->execute();
        } else {
            header("Location: ../Gerenciar_user/index.php?erro2");
        }
    }
    public function delete_client($id)
    {


        $pdo = parent::get_instance();
        $sql = "DELETE FROM `usuario` WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
   
}
