<?php
session_start();
date_default_timezone_set("Asia/Taipei");
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:".$url);
}
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15";
    protected $pdo;
    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn,'root','');
        $this->table= $table;
    }
    private function arrayToSqlArray($array){
        foreach ($array as $key => $value) {
            $tmp[]="`$key`='$value'";
        }
        return $tmp ;
    }
    function math($math,$col,...$arg){
        $sql = "select $math($col) from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrayToSqlArray($arg[0]);
                $sql .= " where " . join( " && ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        return $sql;
    }
    function all(...$arg){
        $sql = "select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrayToSqlArray($arg[0]);
                $sql .= " where " . join( " && ",$tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($id){
        $sql = "select * from $this->table ";
            if(is_array($id)){
                $tmp = $this->arrayToSqlArray($id);
                $sql .= " where " . join( " && ",$tmp);
            }else{
                $sql .= " where `id` = $id";
            }
            // dd($sql);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql = "delete from $this->table ";
            if(is_array($id)){
                $tmp = $this->arrayToSqlArray($id);
                $sql .= " where " . join( " && ",$tmp);
            }else{
                $sql .= " where `id` = $id";
            }
        
        return $this->pdo->exec($sql);
    }
    
    function save($array){
        if(isset($array['id'])){
            $id = $array['id'];
            unset($array['id']);
            $tmp = $this->arrayToSqlArray($array);
            $sql = "update $this->table set ";
            $sql .= join( " , " , $tmp) ;
            $sql .= " where `id` = $id";
        }else{
            $col = array_keys($array);
            $sql = "insert into $this->table (`" . join("`,`",$col) . "`)
                                values ('" . join("','",$array) . "')";
        }
        return $this->pdo->exec($sql);
    }
    function count(...$arg){
        $sql = $this->math("count","*",...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col,...$arg){
        $sql = $this->math("sum",$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();        
    }
    function max($col,...$arg){
         $sql = $this->math("max",$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();       
    }
    function min($col,...$arg){
        $sql = $this->math("min",$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();        
    }
    function avg($col,...$arg){
         $sql = $this->math("avg",$col,...$arg);
        return $this->pdo->query($sql)->fetchColumn();       
    }






}

$Title = new DB('title');
$Ad = new DB('Ad');
$Bottom = new DB('bottom');
$Total = new DB('total');
$Mvim = new DB('mvim');
$Image = new DB('image');
$Admin = new DB('admin');
$Menu = new DB('menu');
$News = new DB ('news');
$total = $Total->find(1);
$bottom= $Bottom->find(1);
if(isset($_SESSION['visit'])){
    $_SESSION['visit']=1;
    $total['total']++;
    $Total->save($total);
}
