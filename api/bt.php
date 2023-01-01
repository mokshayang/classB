<?php include_once   "base.php";
$table=$_POST['table'];
$row = $$table->find(1);
$row[lcfirst($table)]=$_POST[lcfirst($table)];
$$table->save($row);
to("../admin.php?do=".lcfirst($table));