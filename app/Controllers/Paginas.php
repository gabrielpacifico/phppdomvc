<?php
class Paginas extends Controller{

    public function index(){

        if(Session::userLogged()){
            Url::redirect('posts');
        }

        $this->view('pages/home');
    }


}