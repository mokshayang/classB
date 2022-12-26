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
        $sql = "select * from $this->table";
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
        $sql = "select * from $this->table";
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
            $sql .= "where `id` =$id";
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
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function min($col, ...$arg)
    {
        $sql = $this->mathSql("min", $col, ...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col, ...$arg)
    {
        $sql = $this->mathSql("max", $col, ...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col, ...$arg)
    {
        $sql = $this->mathSql("sum", $col, ...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function avg($col, ...$arg)
    {
        $sql = $this->mathSql("avg", $col, ...$arg);
        dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
}
// $test = new DB('bottom');
// // $math = $test->avg('id', ['id'=>2]," order by id" );
// $math = $test->max('id',['bottom' => 'test'], "in(2,3)");
// dd($math);
$Bottom=new DB('bottom');
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
