<?php
include "base_test.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
}
// echo $_FILES['img']['tmp_name'];//C:\xampp\tmp\php6EFC.tmp
// echo "<br>";
// echo $_FILES['img']['name'];//01B02.jpg
$text=$_POST['text'];

$Title->save(['img'=>$img,'text'=>$text,'sh'=>0]);
to("../back.php?do=title");
?>