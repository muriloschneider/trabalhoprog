<?php

    require_once('autoload.class.php');

    class Cidadao extends BancoDados{
        private $id;
        private $nome;
        private $cpf;
        private $profissao;
        private $renda;
        private $raca;
        private $nascimento;
        private $entrevistador;
        private $cidade;

        
        public function __construct($id, $nome, $cpf, $profissao, $renda, $raca, $nascimento, Entrevistador $entrevistador, Cidade $cidade){
            $this->setId($id);
            $this->setNome($nome);
            $this->setCpf($cpf);
            $this->setProfissao($profissao);
            $this->setRenda($renda);
            $this->setRaca($raca);
            $this->setNascimento($nascimento);
            $this->setEntrevistador($entrevistador);
            $this->setCidade($cidade);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public function setNome($nome){if(strlen($nome) > 0){$this->nome = $nome;}}
        public function getNome(){return $this->nome;}

        public function setCpf($cpf){if($cpf != ""){$this->cpf = $cpf;}}
        public function getCpf(){return $this->cpf;}

        public function setProfissao($profissao){if($profissao != ""){$this->profissao = $profissao;}}
        public function getProfissao(){return $this->profissao;}

        public function setRaca($raca){if($raca != ""){$this->raca = $raca;}}
        public function getRaca(){return $this->raca;}

        public function setRenda($renda){if($renda != ""){$this->renda = $renda;}}
        public function getRenda(){return $this->renda;}
        
        public function setNascimento($nascimento){if($nascimento != ""){$this->nascimento = $nascimento;}}
        public function getNascimento(){return $this->nascimento;}

        public function setEntrevistador($entrevistador){$this->entrevistador = $entrevistador;}
        public function getEntrevistador(){return $this->entrevistador;}

        public function setCidade($cidade){$this->cidade = $cidade;}
        public function getCidade(){return $this->cidade;}

        public function Salvar(){
            try{
                $sql = "INSERT INTO `ibge`.`cidadao` (`nome`, `cpf`, `profissao`, `renda`, `raca`, `nascimento`, `entrevistador`, `cidade`) VALUES (:nome, :cpf, :profissao, :renda, :raca, :nascimento, :entrevistador, :cidade)";
                $param = array( ":nome" => $this->getNome(),
                                ":cpf" => $this->getCpf(),
                                ":profissao" => $this->getCpf(),
                                ":renda" => $this->getRenda(),
                                ":raca" => $this->getRaca(),
                                ":nascimento" => $this->getNascimento(),
                                ":entrevistador" => $this->getEntrevistador()->getIdEnt(),
                                ":cidade" => $this->getCidade()->getIdCid());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao salvar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        
        public static function Listar($tipo = 0, $info = ""){
            try{
                $sql = "SELECT * FROM ibge.cidadao";
                if($tipo > 0)
                    switch ($tipo) {
                        case '1': $sql .= " WHERE idcidadao = :info"; break;
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
                $sql = "UPDATE `ibge`.`cidadao`  SET nome = :nome, cpf = :cpf, profissao = :profissao, renda = renda, raca = raca, nascimento = nascimento, entrevistador = entrevistador, cidade = cidade WHERE idcidadao = :idcidadao";
                $param = array( ":nome" => $this->getNome(),
                                ":cpf" => $this->getCpf(),
                                ":profissao" => $this->getCpf(),
                                ":renda" => $this->getRenda(),
                                ":raca" => $this->getRaca(),
                                ":nascimento" => $this->getNascimento(),
                                ":idcidadao" => $this->getId(),
                                ":entrevistador" => $this->getEntrevistador()->getId(),
                                ":cidade" => $this->getCidade()->getId());
                return parent::Execute($sql,$param);
            }catch(Exception $e){
                echo "Erro ao editar: ('{$e->getMessage()}')\n{$e}\n";
            }
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM `ibge`.`cidadao` WHERE `idcidadao` = :idcidadao";
                $param = array( ":idcidadao" => $this->getId());
                $row = parent::Execute($sql,$param);
                return $row;
            }catch(Exception $e){
                echo "Erro ao excluir: ('{$e->getMessage()}')\n{$e}\n";
            }
        }
    }

    // $cidade = new Cidade(2, 'Agronomica', 'SC');

    // $cidade->Salvar();

    // $entrevistador = new Entrevistador(1,'Pedro' , '123.123.122-14', $cidade);

    // $entrevistador->Salvar();

    // $var = new Cidadao( 1, 'Pedro', '123.123.123-21', 'Engenheiro', 'R$ 2000', 
    //                     'Branco', '21/10/2000', $entrevistador, $cidade);

    // $final = $var->Salvar();

    // echo "<pre>";
    // var_dump($var);
    // echo "</pre>";

?>