<?php  include_once "base.php";
$table=$_POST['table'];
$row=$$table->find($_POST['id']);
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $row['img']=$_FILES['img']['_name'];
}
if(isset($_POST['del']) && )