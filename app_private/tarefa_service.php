<?php

  class TarefaService{
   
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
      $this->conexao=$conexao->conectar();
      $this->tarefa=$tarefa;
      
    }



    public function inserir(){

      $queri ='INSERT INTO tb_tarefas(tarefa)VALUES(:tarefa)';
      $stmt= $this->conexao->prepare($queri);
      $stmt->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
      $stmt->execute();

    }
    public function recuperar(){

      $query=' SELECT id, id_status,tarefa from tb_tarefas';
      $stmt= $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
     
        
    }
    public function atualizar(){

    }

    public function deletar(){

    }
  }



?>