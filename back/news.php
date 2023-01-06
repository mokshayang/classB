<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息管理</p>
    <form method="post"  action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $tt = $News->count();
                $num = 3;
                $pages = ceil($tt / $num);
                $now = $_GET['p']??1;
                $start = ($now - 1) * $num;
                $rows = $News->all("limit $start,$num");
                
                foreach ($rows as $row) {
                    $checked = ($row['sh'] == 1) ? "checked" : "";
                ?>
                    <tr>
                        <td>
                            <textarea type="text" name="text[]" style="width:95%;height: 62px;"><?= $row['text'] ?></textarea>
                        </td>

                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $checked ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
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
                echo "<a href='?do=$do&p=$i' style='font-size:$size;'> &nbsp; $i &nbsp; </a>";
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
                        <input type="button" onclick="op('#cover','#cvr','./modal/news.php')" value="新增最新消息">
                    </td>
                    <td class="cent">
                        <input type="hidden" name="table" value="News">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>