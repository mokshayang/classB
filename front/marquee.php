<marquee scrolldelay="120" scrollamount="15" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$ads = $Ad->all(['sh'=>1]);
foreach($ads as $ad){
    echo $ad['text'];
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
</marquee>