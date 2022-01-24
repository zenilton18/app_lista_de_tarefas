<?php


 class Conexao{
    private $host='localhost';
    private $dbname='app_lista_tarefas';
    private $user ='root';
    private $senha='';

    public function conectar(){

        try{

            $conexao = new pdo(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->senha"

            );
            
            return $conexao;

        }catch(PDOException $e){

            echo'<p>'. $e->getMessage().'</P>';

        }
    }

 }






?>