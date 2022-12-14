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
            if($comando->execute()){
                // echo $comando->errorInfo();
                return $conexao->lastInsertId();
            } 
            
                return false;
            
        } catch(Exception $e){
           throw new Exception("Erro na execução ". $e->getMessage()); 
        } 
    }

    public static function Listar($sql, $param=array()){ 
            $conexao = self::Instancia();
            $comando = $conexao->prepare($sql); 
            $comando = self::Vincular($comando,$param); 
        try{
            $comando->execute(); 
            return $comando->fetchAll(); 
        } catch(Exception $e){
            throw new Exception("Erro na execução ". $e->getMessage()); 
        } 
    }

    public static function Order($sql){ 
        $conexao = self::Instancia();
        $comando = $conexao->prepare($sql); 
    try{
        $comando->execute();
        return $comando->fetchAll(); 
    } catch(Exception $e){
        throw new Exception("Erro na execução ". $e->getMessage()); 
    } 
}
}
?>