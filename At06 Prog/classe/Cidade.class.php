<?php

    class Cidade extends BancoDados{
        private $id;
        private $nomeCid;
        private $estado;

        
        public function __construct($id,$nomeCid,$estado){
            $this->setIdCid($id); 
            $this->setNome($nomeCid);
            $this->setEstado($estado);
        }

        public function setIdCid($id){if($id > 0){$this->id = $id;}}
        public function getIdCid(){return $this->id;}

        public function setNome($nomeCid){if(strlen($nomeCid) > 0){$this->nomeCid = $nomeCid;}}
        public function getNome(){return $this->nomeCid;}

        public function setEstado($estado){if($estado != ""){$this->estado = $estado;}}
        public function getEstado(){return $this->estado;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `ibge`.`cidade` (`nome_cidade`, `estado`) VALUES (:nome_cidade,:estado)";
                $param = array( ":nome_cidade" => $this->getNome()
                                ,":estado" => $this->getEstado());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        
        public static function Listagem($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM ibge.cidade";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE idcidade = :info"; break;
                        case '2': $sql .= " ORDER BY idcidade"; break;
                    }
                    $param = array();
                        if($tipo > 0)
                            $param = array(":info" => $info);   
                return parent::Listar($sql,$param);
            }catch(Exception $e){
                echo "Erro ao listar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Editar(){
            try{
                $sql = "UPDATE ibge.cidade SET nome_cidade = :nome_cidade, estado = :estado WHERE idcidade = :idcidade";
                $param = array( ":nome_cidade" => $this->getNome(),
                                ":estado" => $this->getEstado(),
                                ":idcidade" => $this->getIdCid());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM `ibge`.`cidade` WHERE `idcidade` = :idcidade";
                $param = array( ":idcidade" => $this->getIdCid());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }      
    
?>