<?php

    class Contato extends BancoDados{
        
        private $idcontato;
        private $telefone;
        private $email;
        private $idcidadao;
        
        public function __construct($idcontato,$telefone,$email, $idcidadao){
            $this->setIdcontato($idcontato);
            $this->settelefone($telefone);
            $this->setemail($email);
            $this->setidcidadao($idcidadao);
        }

        public function setIdcontato($idcontato){if($idcontato > 0){$this->idcontato = $idcontato;}}
        public function getIdcontato(){return $this->idcontato;}

        public function settelefone($telefone){if(strlen($telefone) > 0){$this->telefone = $telefone;}}
        public function gettelefone(){return $this->telefone;}

        public function setemail($email){if($email != ""){$this->email = $email;}}
        public function getemail(){return $this->email;}

        public function setidcidadao($idcidadao){if($idcidadao != ""){$this->idcidadao = $idcidadao;}}
        public function getidcidadao(){return $this->idcidadao;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `ibge`.`contato` (`telefone`, `email`, `idcidadao`) VALUES (:telefone,:email, :idcidadao)";
                $param = array( ":telefone" => $this->gettelefone()
                                ,":email" => $this->getemail()
                                ,":idcidadao" => $this->getidcidadao()
                            );
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        
        public static function Listagem($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM ibge.contato";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE idcontato = :info"; break;
                        case '2': $sql .= " WHERE idcidadao = :info"; break;
                        
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
                $sql = "UPDATE ibge.contato SET telefone = :telefone, email = :email WHERE idcontato = :idcontato";
                $param = array( ":telefone" => $this->gettelefone(),
                                ":email" => $this->getemail(),
                                ":idcontato" => $this->getIdcontato());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM `ibge`.`contato` WHERE `idcontato` = :idcontato";
                $param = array( ":idcontato" => $this->getIdcontato());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }
    
    

?>
