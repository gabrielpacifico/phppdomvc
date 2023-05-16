<?php

class Database
{
    // Informações sobre o banco de dados
    private $host = 'localhost';
    private $db = 'projetophp';
    private $user = 'postgres';
    private $pass = 'G@br1el1703';
    private $pdo;
    private $stmt;

    public function __construct()
    {
        // Armazenando informações da conexão numa variável
        $connectionString = 'pgsql:host=' . $this->host . ';port=5432;dbname=' . $this->db;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ];

        try {
            // Conexão com o banco de dados
            $this->pdo = new PDO($connectionString, $this->user, $this->pass, $options);

            //echo "Conectado com sucesso ao banco de dados! <br>";
        } catch (PDOException $e) {
            echo "Erro ao conectar-se com o banco de dados! <br>";
            die($e->getMessage());
        }
    }

    public function query($sql){
        $this->stmt  = $this->pdo->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value);
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value);
                    $type = PDO::PARAM_BOOL;
                break;

                case is_null($value);
                    $type = PDO::PARAM_NULL;
                break;

                default;
                $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->BindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function results(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function numRows(){
        return $this->stmt->rowCount();
    }

    public function lastId(){
        return $this->pdo->lastInsertId();
    }
}
