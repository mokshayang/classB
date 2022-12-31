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
        $this->pdo = new PDO($this->dsn, 'root', '');
        $this->table = $table;
    }

    private function arrayToSqlArray($array)
    {
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    function mathSql($math, $col, ...$args)
    {
        $sql = "select $math($col) from $this->table";
        if (isset($args[0])) {
            if (is_array($args[0])) {
                $tmp = $this->arrayToSqlArray($args[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $args[0];
            }
        }
        if (isset($args[1])) {
            $sql .= $args[1];
        }
        return $sql;
    }

    function all(...$args)
    {
        $sql = "select * from $this->table ";
        if (isset($args[0])) {
            if (is_array($args[0])) {
                $tmp = $this->arrayToSqlArray($args[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $args[0];
            }
        }
        if (isset($args[1])) {
            $sql .= $args[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($id)
    {
        $sql = "select * from $this->table ";
        if (is_array($id)) {
            $tmp = $this->arrayToSqlArray($id);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` =$id";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from $this->table";
        if (is_array($id)) {
            $tmp = $this->arrayToSqlArray($id);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id` =$id";
        }
        return $this->pdo->exec($sql);
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $id = $array['id'];
            unset($array['id']);
            $tmp = $this->arrayToSqlArray($array);
            $sql = "update $this->table set ";
            $sql .= join(",", $tmp);
            $sql .= " where `id` =$id";
        } else {
            $cols = array_keys($array);
            $sql = "insert into $this->table (`" . join("`,`", $cols) . "`)
            values ('" . join("','", $array) . "')";
        }
        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = $this->mathSql("count", "*", ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function min($col, ...$arg)
    {
        $sql = $this->mathSql("min", $col, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col, ...$arg)
    {
        $sql = $this->mathSql("max", $col, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col, ...$arg)
    {
        $sql = $this->mathSql("sum", $col, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function avg($col, ...$arg)
    {
        $sql = $this->mathSql("avg", $col, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
}
// $test = new DB('bottom');
// // $math = $test->avg('id', ['id'=>2]," order by id" );
// $math = $test->max('id',['bottom' => 'test'], "in(2,3)");
// dd($math);

// switch($_POST['table']){
//     case "Title";
//     $db=new DB("title");
//     break;
// }

// dd(${$_POST['table']});

$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$Admin=new DB('admin');
$News=new DB('news');
$Menu=new DB('menu');
$Total=new DB('total');
$total=$Total->find(1);
$bottom=$Bottom->find(1);
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
   header("location:".$url);
}
// if(!isset($_SESSION['visit']) && isset($_SESSION['login'])){
//     $_SESSION['visit']=1;
//     $total=$Total->find(1);
//     $total['total']++;
//     $Total->save($total);
// }
if(!isset($_SESSION['visit']) ){
    $_SESSION['visit']=1;
    $total=$Total->find(1);
    $total['total']++;
    $Total->save($total);
}
// $a=$Image->all("limit 0,10");
// dd($a);