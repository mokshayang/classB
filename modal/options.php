<?php  include_once "../api/base.php"; ?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/opt.php" method="post">
    <table id="sub">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
            $rows = $Menu->all(['parent'=>$_GET['id']]);
            // dd($rows);
            foreach($rows as $row){
        ?>
        <tr>
            <td>
                <input type="text" name="name[]" value="<?=$row['name']?>">
            </td>
            <td>
                <input type="text" name="href[]" value="<?=$row['href']?>">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id']?>">
            </td>
            <td>
                <input type="hidden" name="id[]" value="<?=$row['id']?>">
            </td>
        </tr>
        <?php } ?>
    </table>
    <input type="submit" value="確定修改">
    <input type="reset" value="重置">
    <input type="hidden" name="parent" value="<?=$_GET['id']?>">
    <input type="button" value="更多次選單" onclick="more()">
    <input type="hidden" name="table" value="Menu">
</form>
<script>
    function more(){
    let html = `
        <tr>
            <td><input type="text" name="add_name[]" ></td>
            <td><input type="text" name="add_href[]" ></td>
        </tr>`;
        $('#sub').append(html);
    }
</script>