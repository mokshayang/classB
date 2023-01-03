<?php include_once "base.php";
$table = $_POST['table'];
$tmp = [];
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/" . $_FILES['img']['name']);
    $tmp['img'] = $_FILES['img']['name'];
}
switch ($table) {
    case 'Admin';
        $tmp['acc'] = $_POST['acc'];
        $tmp['pw'] = $_POST['pw'];
        break;
    case 'Menu';
        $tmp['name'] = $_POST['name'];
        $tmp['href'] = $_POST['href'];
        $tmp['parent'] = 0;
        $tmp['sh'] = 1;
        break;
    default:
        if (isset($_POST['text']) && !empty($_POST['text'])) {
            $tmp['text'] = $_POST['text'];
        }
        $tmp['sh'] = ($table == "Title") ? 0 : 1;
}
$$table->save($tmp);
to("../admin.php?do=" . lcfirst($table));
