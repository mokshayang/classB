<h3 class="cent">新增動態文字</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>替代文字 : </td>
            <td>
                <input type="text" name="text" >
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="Ad">
    <input type="submit" value="新增確認">
    <input type="reset" value="重置">
</form>