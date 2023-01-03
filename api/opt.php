<?php include_once "base.php";
dd($_POST);
if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $row =$Menu->find($id);
            $row['name']=$_POST['name'][$idx];
            $row['href']=$_POST['href'][$idx];
            $Mivm=$Menu->save($row);
        }
    }
}
if(isset($_POST['addname'])){
    foreach($_POST['addname'] as $idx =>$name){
        if(!empty($name)){
            $Menu->save([
                'name'=>$_POST['addname'][$idx],
                'href'=>$_POST['addhref'][$idx],
                'parent'=>$_POST['parent'],
                'sh'=>1
            ]);
        }
    }
}
to("../admin.php?do=menu");
?>