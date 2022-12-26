<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15";
    protected $pdo;
    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn,'root','');
        $this->table = $table;
    }

    private function arrayToSqlArray($array){
        foreach ($array as $key => $value) {
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function mathSql($math,$col,...$arg){
        $sql ="select $math($col) from $this->table";
        if(isset($arg[0])){
            $tmp=$this->arrayToSqlArray($arg[0]);
            $sql .= " where " .join(" && " ,$tmp);
        }
        return $sql;
    }

    function all(){
        
    }
    function find(){

    }
    function del(){

    }
    function save(){

    }

    function count(...$arg){
        $sql = $this->mathSql("count","*",...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function min($col,...$arg){
        $sql = $this->mathSql("min",$col,...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col,...$arg){
        $sql = $this->mathSql("max",$col,...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();    }
    function sum($col,...$arg){
        $sql = $this->mathSql("sum",$col,...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();    }
    function avg($col,...$arg){
        $sql = $this->mathSql("avg",$col,...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();    }
}
$test = new DB('bottom');
$math = $test->avg('id');
dd($math);
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
?>