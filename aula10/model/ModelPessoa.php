<?php

class ModelPessoa{

    private $_conn;

    private $_codPessoa;

    public function __construct($conn){

        //Permite receber dados json através da requisição
        $json = file_get_contents("php://input");
        $dadosPessoa = json_decode($json);

        $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
        
        $this->_conn = $conn; 

    }

    public function findAll(){

        $sql = "SELECT * FROM tbl_pessoa";

        //Prepara o processo de execução de instrução sql
        $stm = $this->_conn->prepare($sql);

        //Executa a instrução sql
        $stm->execute();

        //Devolve os valores da select para serem utilizados
        return $stm->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function findById(){

        $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";

        $stm = $this->_conn->prepare($sql);

        $stm->bindValue(1, $this->_codPessoa);

        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);

    }

}