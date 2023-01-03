<h3 class="cent">新增主選單</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>主選單</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>連結網址</td>
            <td>
                <input type="text" name="href">
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="Menu">
    <input type="reset" value="新增">
    <input type="submit" value="重置">
</form>