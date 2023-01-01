<?php include_once  "base.php";
$table=$_POST['table'];
$row['id']=$_POST['id'];

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $row['img'] = $_FILES['img']['name'];
    $$table->save($row);
}
to("../admin.php?do=".lcfirst($table));
