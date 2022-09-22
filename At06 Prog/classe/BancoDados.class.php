<?php

require_once('../conf/conf.inc.php');

class BancoDados{
    /* 
        ** Classe Banco de dados
        ** @acess public
        ** @return boolean
    */

    public static function Instancia(){ 
            require_once "Conexao.class.php";
        return Conexao::getInstance();
    }

    public static function Vincular($comando, $param=array()){     
            foreach($param as $chave => $valor){ 
                $comando->bindValue($chave, $valor); 
            }
        return $comando; 

    }

    public static function Execute($sql, $param=array()){ 
            $conexao = self::Instancia(); 
            $comando = $conexao->prepare($sql);
            $comando = self::Vincular($comando,$param); 
        try {
            return $comando->execute(); 
        } catch(Exception $e){
           throw new Exception("Erro na execução ". $e->getMessage()); 
        } 
    }

    public static function Listar($sql, $param=array()){ 
            $conexao = self::Instancia();
            $comando = $conexao->prepare($sql); 
            $comando = self::Vincular($comando,$param); 
            $comando->execute(); 
        try{
            return $comando->fetchAll(); 
        } catch(Exception $e){
            throw new Exception("Erro na execução ". $e->getMessage()); 
        } 
    }

    public static function EfetuaLogin($sql, $param=array()){
        $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare($sql);
                $stmt = self::Vincular($stmt,$param);
                $stmt->execute();
                $dado = $stmt->fetch();
            try{
                return $dado;
        } catch(Exception $e){
            throw new Exception("Erro na execução ". $e->getMessage()); 
        }
    }
}
?>