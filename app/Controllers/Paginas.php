<?php
class Paginas extends Controller{

    public function index(){

        if(Session::userLogged()){
            Url::redirect('posts');
        }

        $dados = [
            'tituloPagina' => 'Página Inicial',
        ];

        $this->view('pages/home', $dados);
    }


}