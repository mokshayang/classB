<h3 class="cent">新增最新消息</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息 : </td>
            <td>
                <input type="text" name="text" >
            </td>
        </tr>
    </table>
    <input type="hidden" name="table" value="News">
    <input type="submit" value="新增確認">
    <input type="reset" value="重置">
</form>