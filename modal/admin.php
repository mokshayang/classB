<h3 class="cent">新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>新增帳號</td>
            <td>
                <input type="text" name="acc">
            </td>
        </tr>
        <tr>
            <td>新增密碼</td>
            <td>
                <input type="password" name="pw">
            </td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td>
                <input type="password" name="pw2">
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="Menu">
    <input type="reset" value="新增">
    <input type="submit" value="重置">
</form>