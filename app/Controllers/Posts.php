<?php

class Posts extends Controller
{

    public $postModel;
    public $usuarioModel;

    public function __construct()
    {
        if (!Session::userLogged()) {
            Url::redirect('usuarios/login');
        }

        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index()
    {

        $dados = [
            'posts' => $this->postModel->readPosts()

        ];

        $this->view('posts/index', $dados);
    }

    public function cadastrar()
    {

        $form = filter_input_array(INPUT_POST);
        if (isset($form)) {

            $dados = [
                'titulo' => trim($form['titulo']),
                'texto' => trim($form['texto']),
                'usuario_id' => trim($_SESSION['id']),
                'titulo_erro' => '',
                'texto_erro' => '',

            ];

            if (in_array("", $form)) {

                if (empty($form['titulo'])) {
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                }

                if (empty($form['texto'])) {
                    $dados['texto_erro'] = 'Preencha o campo texto';
                }
            } else {
                if ($this->postModel->armazenar($dados)) { // Se a função retornar true, realiza o cadastro
                    Session::mensagem('post', 'Postagem realizada com sucesso');
                    Url::redirect('posts');
                } else {
                    die("Erro ao fazer postagem.");
                }
            }
        } else {
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        }

        $this->view('posts/cadastrar', $dados);
    }

    public function editar($id)
    {

        $form = filter_input_array(INPUT_POST);
        if (isset($form)) {

            $dados = [
                'id' => $id,
                'titulo' => trim($form['titulo']),
                'texto' => trim($form['texto']),
                'titulo_erro' => '',
                'texto_erro' => '',

            ];

            if (in_array("", $form)) {

                if (empty($form['titulo'])) {
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                }

                if (empty($form['texto'])) {
                    $dados['texto_erro'] = 'Preencha o campo texto';
                }
            } else {
                if ($this->postModel->atualizar($dados)) { // Se a função retornar true, realiza o cadastro
                    Session::mensagem('post', 'Postagem atualizada com sucesso');
                    Url::redirect('posts');
                } else {
                    die("Erro ao atualizar a postagem.");
                }
            }
        } else {

            $post = $this->postModel->readPostPorId($id);

            if ($post->usuario_id != $_SESSION['id']) {
                Session::mensagem('post', 'Você não tem autorização para editar esse post', 'alert alert-danger');
                Url::redirect('posts');
            }

            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        }

        $this->view('posts/editar', $dados);
    }

    public function ver($id)
    {

        $post = $this->postModel->readPostPorId($id);
        $usuario = $this->usuarioModel->readUserPorId($post->usuario_id);

        $dados = [
            'post' => $post,
            'usuario' => $usuario
        ];

        $this->view('posts/ver', $dados);
    }

    public function excluir($id)
    {


        if (!$this->checarAutorizacao($id)) {

            $id = filter_var($id, FILTER_VALIDATE_INT);
            $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_URL);

            if ($id && $method == 'POST') {
                if ($this->postModel->excluir($id)) {
                    Session::mensagem('post', 'Postagem excluida com sucesso');
                    Url::redirect('posts');
                } else {
                    die('Erro ao tentar excluir a postagem');
                }
            }

        }else{
            Session::mensagem('post', 'Você não tem autorização para excluir essa postagem', 'alert alert-danger');
            Url::redirect('posts');
        }
    }

    private function checarAutorizacao($id)
    {
        $post = $this->postModel->readPostPorId($id);

        if ($post->usuario_id != $_SESSION['id']) {
            return true;
        } else {
            return false;
        }
    }
}
