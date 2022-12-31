<h3 class="cent">新增網站標題圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>新增圖片 : </td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>
        <tr>
            <td>替代文字 : </td>
            <td>
                <input type="text" name="text" >
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="Title">
    <input type="submit" value="新增確認">
    <input type="reset" value="重置">
</form>