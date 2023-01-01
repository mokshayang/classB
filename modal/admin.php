<h3 class="cent">新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號 : </td>
            <td>
                <input type="text" name="acc">
            </td>
        </tr>
        <tr>
            <td>密碼 : </td>
            <td>
                <input type="number" name="pw" >
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="Admin">
    <input type="submit" value="新增確認">
    <input type="reset" value="重置">
</form>