<?php

class database{

    private static $dbtype   = "mysql";
    private static $host     = "localhost";
    private static $port     = "3306";
    private static $user     = "root";
    private static $password = "";
    private static $db       = "crud-exame";

    public function __destruct() {
        $this->disconnect();
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }
     
    private function getDBType()  {
        return self::$dbtype;
    }
    private function getHost()    {
        return self::$host;
    }
    private function getPort()    {
        return self::$port;
    }
    private function getUser()    {
        return self::$user;
    }
    private function getPassword()
    {return self::$password;
    }
    private function getDB()      {
        return self::$db;
    }
     
    private function connect(){
        try
        {
            $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
        }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
         
        return ($this->conexao);
    }
     
    private function disconnect(){
        $this->conexao = null;
    }
}