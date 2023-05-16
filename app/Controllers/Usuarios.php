<?php
class Usuarios extends Controller
{

    public $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {

        $form = filter_input_array(INPUT_POST);
        if (isset($form)) {

            $dados = [
                'nome' => trim($form['nome']),
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'confirm_password' => trim($form['confirm_password']),
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

            if (in_array("", $form)) {

                if (empty($form['nome'])) {
                    $dados['nome_erro'] = 'Preencha o campo nome';
                }

                if (empty($form['email'])) {
                    $dados['email_erro'] = 'Preencha o campo email';
                }

                if (empty($form['password'])) {
                    $dados['senha_erro'] = 'Preencha o campo senha';
                }

                if (empty($form['confirm_password'])) {
                    $dados['confirma_senha_erro'] = 'Preencha o campo confirmar senha';
                }
            } else {

                if(Check::verificarNome($form['nome'])){
                    $dados['nome_erro'] = 'O nome informado é inválido'; // Verifica se o nome é valido
                }
                elseif(Check::verificarEmail($form['email'])){
                    $dados['email_erro'] = 'O email informado é inválido'; // Verifica se o email tem formato de email
                }
                elseif($this->usuarioModel->verifyEmail($form['email'])){
                    $dados['email_erro'] = 'O email informado já está cadastrado'; // Verifica se o email já está cadastrado
                }

                elseif (strlen($form['password']) < 6) {
                    $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracteres';
                } elseif ($form['password'] != $form['confirm_password']) {
                    $dados['confirma_senha_erro'] = 'As senhas não conferem';
                }
                else{
                    $dados['password'] = password_hash($form['password'], PASSWORD_DEFAULT);

                    if($this->usuarioModel->armazenar($dados)){ // Se a função retornar true, realiza o cadastro
                        Session::mensagem('cadastrado', 'Cadastro realizado com sucesso');
                        Url::redirect('usuarios/login');
                    }else{
                        die("Erro ao cadastrar usuário.");
                    }
                }
            }

        } else {
            $dados = [
                'nome' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];
        }

        $this->view('users/cadastrar', $dados);
    }

    public function login()
    {

        $form = filter_input_array(INPUT_POST);
        if (isset($form)) {

            $dados = [
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'email_erro' => '',
                'senha_erro' => '',
            ];

            if (in_array("", $form)) {

                if (empty($form['email'])) {
                    $dados['email_erro'] = 'Preencha o campo email';
                }

                if (empty($form['password'])) {
                    $dados['senha_erro'] = 'Preencha o campo senha';
                }

            } else {

                if(Check::verificarEmail($form['email'])){
                    $dados['email_erro'] = 'O email informado é inválido'; // Verifica se o email tem formato de email
                }
                else{
                    $user = $this->usuarioModel->fazerLogin($form['email'], $form['password']);

                    if($user){
                        $this->criarSessao($user);
                    }
                    else{
                        Session::mensagem('usuario', 'Usuário ou senha inválidos', 'alert alert-danger');
                    }
                }
            }


        } else {
            $dados = [
                'email' => '',
                'password' => '',
                'email_erro' => '',
                'senha_erro' => '',
            ];
        }

        $this->view('users/login', $dados);
    }

    private function criarSessao($user){
        $_SESSION['id'] = $user->id;
        $_SESSION['nome'] = $user->nome;
        $_SESSION['email'] = $user->email;

        Url::redirect('posts');
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        
        session_destroy();
        Url::redirect('usuarios/login');
    }
}



