<?php 
include_once "base.php";
$table = $_POST['table'];
dd($_POST);
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $$table->del($id);
    } else {
        $row = $$table->find($id);
        switch ($table) {
            case 'Title':
                $row['text'] = $_POST['text'][$idx];
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                break;
            case 'Admin':
                $row['acc'] = $_POST['acc'][$idx];
                $row['pw'] = $_POST['pw'][$idx];
                break;
            case 'Menu':
                $row['name'] = $_POST['name'][$idx];
                $row['href'] = $_POST['href'][$idx];
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            default:
                if (isset($_POST['text'])) {
                    $row['text'] = $_POST['text'][$idx];
                }
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }
        $$table->save($row);
    }
}
if(!empty($Title->find(['sh'=>0]))){
    if(empty($Title->find(['sh'=>1]))){
    $radio['id']=$Title->min('id');
    $radio['sh']=1;
    $Title->save($radio);
    }
}
to("../admin.php?do=".lcfirst($table));
