<?php

class Post{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function readPosts(){
        $this->db->query("SELECT *,
        post.id as postid,
        users.id as usuarioId
        FROM posts.post
        INNER JOIN posts.users ON
        post.usuario_id = users.id
        ORDER BY post.id DESC
        ");
        return $this->db->results();
        
    }

    public function armazenar($dados){
        $this->db->query("INSERT INTO posts.post(usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)");
        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function atualizar($dados){
        $this->db->query("UPDATE posts.post SET titulo = :titulo, texto = :texto WHERE id = :id");
        $this->db->bind("id", $dados['id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function excluir($id){
        $this->db->query("DELETE FROM posts.post WHERE id = :id");
        $this->db->bind("id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function readPostPorId($id){
        $this->db->query("SELECT * FROM posts.post WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->result();
    }

}