<h3 class="cent">更新動畫圖片</h3>
<hr>
<form action="./api/renew.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>更新圖片 : </td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="hidden" name="table" value="Mvim">
    <input type="submit" value="更新確認">
    <input type="reset" value="重置">
</form>