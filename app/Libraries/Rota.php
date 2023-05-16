<?php

class Rota {

    private $controlador = 'Paginas';
    private $metodo = "index";
    private $parametros = [];

    public function __construct()
    {
        // Se a URL existir joga a função url na variável $url
       $url = $this->url() ? $this->url() : [0];

       // Verifica se o controlador existe
        if(file_exists('../app/Controllers/'. ucwords($url[0]).'.php')){

            // Se existir seta como controlador
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }

        // Requere o controlador
        require_once '../app/Controllers/'. $this->controlador . '.php';
        // Instancia o controlador
        $this->controlador = new $this->controlador;

        // Checa se o método existe
        if(isset($url[1])){
            if(method_exists($this->controlador, $url[1])){
                $this->metodo  = $url[1];
                unset($url[1]);
            }
        }

        // Se existir retorna um array com os valores, se não retorna um array vazio
        $this->parametros = $url ? array_values($url) : [];

        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

    }

    // Retorna a URL em um array
    public function url(){
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if(isset($url)){
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);
            return $url;
        }
    }
}