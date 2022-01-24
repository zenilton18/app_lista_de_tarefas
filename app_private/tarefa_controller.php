<?php
    require'./app_private/tarefa_model.php';
    require'./app_private/tarefa_service.php';
    require'./app_private/conexao.php';

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa',$_POST['tarefa']);

    $conexao = new Conexao();

    $tarefa_service = new TarefaService($conexao,$tarefa);

    $tarefa_service->inserir();

    header('location: ./nova_tarefa.php?inclusao=1');


?>