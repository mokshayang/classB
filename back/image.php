<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園印象資料管理</p>
    <form method="post"  action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園印象資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $tt = $Image->count();
                $num = 3;
                $pages = ceil($tt / $num);
                $now = $_GET['p']??1;
                $start = ($now - 1) * $num;
                $rows = $Image->all("limit $start,$num");
                
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                ?>
                    <tr>
                        <td>
                            <img src="./upload/<?= $row['img'] ?>" alt="" style="width: 100px;height: 68px;">
                        </td>

                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $checked ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
                            <input type="button" value="更新圖片" onclick="op('#cover','#cvr','./modal/renew_image.php?id=<?= $row['id'] ?>')">
                            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <style>
            .cent a{
                text-decoration: none;
            }
        </style>
        <div class="cent">
            <?php
            if(($now-1)>0){
                echo "<a href='?do=$do&p=($now-1)'> < </a>";
            }
            for($i=1;$i<=$pages;$i++){
                $size = ($now == $i )?"24px":"20px";
                echo "<a href='?do=$do&p=$i'> &nbsp; $i &nbsp; </a>";
            }
            if(($now+1)<=$pages){
                echo "<a href='?do=$do&p=($now+1)'> > </a>";
            }
            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/image.php')" value="新增校園印象圖片">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="Image">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>