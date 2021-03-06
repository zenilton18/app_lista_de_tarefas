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

    }else if($acao=='atualizar'){
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_POST['id']);
        $tarefa->__set('tarefa',$_POST['tarefa']);

        $conexao= new Conexao();

        $tarefa_service =new TarefaService($conexao, $tarefa);

       if( $tarefa_service->atualizar()){ //0 == false se houve uma atualizaçao no banco retorna 1 ou N atualizaçao 1 ou+ == true
            if(isset($_GET['pag'])&& $_GET['pag']== 'index'){
                header('location: index.php');
            }else{
                header('location: todas_tarefas.php');

            }
       };

    }else if($acao=='remover'){
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_GET['id']);

        $conexao = new Conexao();

        $tarefa_service = new TarefaService($conexao,$tarefa);

        $tarefa_service->remover();

        if(isset($_GET['pag'])&& $_GET['pag']== 'index'){
            header('location: index.php');
        }else{
            header('location: todas_tarefas.php');

        }

    }else if ($acao =='marcarRealizada'){
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_GET['id']);
        $tarefa->__set('id_status',2);

        $conexao= new Conexao();

        $tarefa_service = new TarefaService($conexao,$tarefa);

        $tarefa_service->marcarRealizada();
        if(isset($_GET['pag'])&& $_GET['pag']== 'index'){
            header('location: index.php');
        }else{
            header('location: todas_tarefas.php');

        }


    } else if ($acao='pendentes'){

        $tarefa= new Tarefa();
        $tarefa->__set('id_status',1);

        $conexao= new Conexao();

        $tarefa_service= new TarefaService($conexao,$tarefa);

        $tarefas= $tarefa_service->pendentes();
        
    }


?>