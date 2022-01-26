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

      $query=' SELECT t.id, s.status,t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id)';
      $stmt= $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
     
        
    }
    public function atualizar(){

      $queri ='UPDATE tb_tarefas SET tarefa = :tarefa WHERE id = :id';
      $stmt=$this->conexao->prepare($queri);
      $stmt->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
      $stmt->bindValue(':id',$this->tarefa->__get('id'));
      return $stmt->execute();


    } 

    public function remover(){
     
      $queri='DELETE from tb_tarefas where id = :id ';
      $stmt = $this->conexao->prepare($queri);
      $stmt->bindValue('id',$this->tarefa->__get('id'));
      return $stmt->execute();

    

    }
  }



?>