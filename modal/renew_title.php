<h3 class="cent">更新網站標題圖片</h3>
<hr>
<div>
    <form action="./api/renew.php" method="post" enctype="multipart/form-data" class="cent">
        <table >
            <tr>
                <td> 標題區圖片 : </td>
                <td>
                    <input type="file" name="img">
                </td>
            </tr>
      
        </table>
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="hidden" name="table" value="Title">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </form>
</div>