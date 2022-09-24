<?php
    abstract class Funcao extends BancoDados{ 
        private $id;
        
        public function __construct($id){
            $this->setId($id);
        }

        public function setId($id){if($id > 0){$this->id = $id;}}
        public function getId(){return $this->id;}

        public abstract function Salvar();

        public abstract static function Listagem($tipo = 0, $info = "");

        public abstract function Editar();

        public abstract function Excluir();
    }
    
?>