<h3 class="cent">新增網站標題圖片</h3>
<hr>
<div>
    <form action="./api/add.php" method="post" enctype="multipart/form-data" class="cent">
        <table >
            <tr>
                <td> 標題區圖片 : </td>
                <td>
                    <input type="file" name="img">
                </td>
            </tr>
            <tr>
                <td>標題區替代文字</td>
                <td>
                    <input type="text" name="text">
                </td>
            </tr>
        </table>
        <input type="hidden" name="table" value="Title">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </form>
</div>