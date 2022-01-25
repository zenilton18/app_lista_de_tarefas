<?php
    require'./app_private/tarefa_model.php';
    require'./app_private/tarefa_service.php';
    require'./app_private/conexao.php';


    $acao= isset ($_GET['acao'] ) ? $_GET['acao'] :$acao;    

    if( $acao=='inserir' ){

        $tarefa = new Tarefa();
        $tarefa->__set('tarefa',$_POST['tarefa']);

        $conexao = new Conexao();

        $tarefa_service = new TarefaService($conexao,$tarefa);

        $tarefa_service->inserir();

        header('location: ./nova_tarefa.php?inclusao=1');

    }else if ($acao == 'recuperar'){
        $tarefa= new Tarefa();
        $conexao = new Conexao();

        $tarefa_service = new TarefaService($conexao,$tarefa);
        $tarefas = $tarefa_service->recuperar();
    }


?>