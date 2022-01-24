<?php
    require'./app_private/tarefa_model.php';
    require'./app_private/tarefa_service.php';
    require'./app_private/conexao.php';

    print_r ($_POST);;

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa',$_POST['tarefa']);

    $conexao = new Conexao();

    $tarefa_service = new TarefaService($conexao,$tarefa);

    $tarefa_service->inserir();

    echo'<pre>';

    print_r($tarefa_service);



?>