<h3 class="cent">更新校園映像圖片</h3>
<hr>
<form action="./api/renew.php" method="post" enctype="multipart/form-data">
    <table>
        <tr >
            <td>園映圖片</td>
            <td>
                <input type="file" name="img" >
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="Image">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</form>