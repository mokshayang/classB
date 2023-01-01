<?php include_once "base.php";
$table = $_POST['table'];
dd($_POST);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $$table->del($id);
        } else {
            $row = $$table->find($id);
            $row['name'] = $_POST['name'][$idx];
            $row['href'] = $_POST['href'][$idx];
            $$table->save($row);
        }
    }
}

if (isset($_POST['add_name'])) {
    foreach ($_POST['add_name'] as $idx => $name) {
        if (!empty($name)) {
            $$table->save([
                'name' => $name,
                'href' => $_POST['add_href'][$idx],
                'sh' => 1,
                'parent' => $_POST['parent']
            ]);
        }
    }
}


