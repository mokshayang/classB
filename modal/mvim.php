<h3 class="cent">新增校園映像圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>映像圖片 : </td>
            <td>
                <input type="file" name="img">
            </td>
        </tr>

    </table>
    <input type="hidden" name="table" value="Mvim">
    <input type="submit" value="新增確認">
    <input type="reset" value="重置">
</form>