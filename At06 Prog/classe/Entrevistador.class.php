<?php
    require_once('autoload.class.php');

    class Entrevistador extends BancoDados{

        private $id;
        private $nomeEnt;
        private $cpfEnt;
        private $cidadeEnt;
        
        public function __construct($id,$nomeEnt,$cpfEnt, Cidade $cidadeEnt){
            $this->setIdEnt($id);
            $this->setNomeEnt($nomeEnt);
            $this->setCpfEnt($cpfEnt);
            $this->setCidEnt($cidadeEnt);
        }

        public function setIdEnt($id){if($id > 0){$this->id = $id;}}
        public function getIdEnt(){return $this->id;}

        public function setNomeEnt($nomeEnt){if(strlen($nomeEnt) > 0){$this->nomeEnt = $nomeEnt;}}
        public function getNomeEnt(){return $this->nomeEnt;}

        public function setCpfEnt($CpfEnt){if($CpfEnt != ""){$this->CpfEnt = $CpfEnt;}}
        public function getCpfEnt(){return $this->CpfEnt;}

        public function setCidEnt($cidadeEnt){if($cidadeEnt != ""){$this->CidEnt = $cidadeEnt;}}
        public function getCidEnt(){return $this->CidEnt;}

        public function Salvar(){
            try{
                $sql =  "INSERT INTO `ibge`.`entrevistador` (`nome_entrevistador`, `cpf`, `cidade`) 
                        VALUES (:nome_entrevistador,:cpf, :cidade)";
                $param = array( ":nome_entrevistador" => $this->getNomeEnt()
                                ,":cpf" => $this->getCpfEnt()
                                ,":cidade" => $this->getCidEnt()->getIdCid());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        
        public static function Listagem($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM ibge.entrevistador";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE identrevistador = :info"; break;
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
                $sql =  "UPDATE ibge.entrevistador SET nome_entrevistador = :nome_entrevistador, 
                        cpf = :cpf WHERE identrevistador = :identrevistador";
                $param = array( ":nome_entrevistador" => $this->getNomeEnt(),
                                ":cpf" => $this->getCpfEnt(),
                                ":cidade" => $this->getCidEnt()->getIdCid());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM `ibge`.`entrevistador` WHERE `identrevistador` = :identrevistador";
                $param = array( ":identrevistador" => $this->getIdEnt());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
    
?>  