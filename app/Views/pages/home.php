<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <section class="container" id="principal">
        <h1 class="title">O Padrão MVC (Model-View-Controller)</h1>
    <p> 
        O MVC é utilizado em muitos projetos devido a arquitetura que possui, o que possibilita a 
        divisão do projeto em camadas muito bem definidas. Cada uma delas, o Model, o Controller 
        e a View, executa o que lhe é definido e nada mais do que isso.<br>
        Uma das características de um padrão de projeto é poder aplicá-lo em sistemas distintos.
        O padrão MVC pode ser utilizado em vários tipos de projetos como, por exemplo, desktop, web e mobile.<br><br>
        
        Imagine uma aplicação que realiza pesquisas em diversas tabelas. Você insere valores nos campos e adiciona filtros de pesquisa. 
        Isto tudo é feito pela interface gráfica, que para o modelo MVC é conhecida como <strong>View</strong>. No entanto, o sistema precisa saber que
        você está requisitando uma pesquisa nas tabelas da base de dados, e para isso, terá um botão no sistema que quando clicado gera um evento.
        <br><br>
        Esse evento é um pedido ao <strong>Controller</strong> que prepara todos os dados inseridos para enviar ao <strong>Modelo</strong> para fazerem
        a pesquisa de fato na base de dados, após isso os dados retornam ao <strong>Modelo</strong> e novamente ao <strong>Controller</strong>, que por fim é
        renderizado na <strong>View</strong>, que é onde o usuário tem acesso.

    </p>

    <img src="<?=URL?>/public/img/mvcarchitecture.jpg" alt="Arquitetura MVC IMG" id="mvc">

    </section>

</body>
</html>