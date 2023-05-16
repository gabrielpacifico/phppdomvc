<?php

class Usuario{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function armazenar($dados){
        $this->db->query("INSERT INTO posts.users(nome, email, senha) VALUES (:nome, :email, :senha)");
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function verifyEmail($email){
        $this->db->query("SELECT email FROM posts.users WHERE email = :email");
        $this->db->bind("email", $email);

        if($this->db->result()){
            return true;
        }else{
            return false;
        }
    }

    public function fazerLogin($email, $senha){
        
        $this->db->query("SELECT * FROM posts.users WHERE email = :email");
        $this->db->bind("email", $email);

        if($this->db->result()){
            
            $resultado = $this->db->result();
            if(password_verify($senha, $resultado->senha)){
                return $resultado;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function readUserPorId($id){
        $this->db->query("SELECT * FROM posts.users WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->result();
    }
}