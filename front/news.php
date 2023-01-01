<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php include_once "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<?php
	$tt = $News->count(['sh'=>1]);
	$num = 5;
	$pages = ceil($tt / $num);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $num;
	?>

	<ol start="<?= $start + 1 ?>">
		<?php
		$news = $News->all(['sh' => 1], "limit $start , $num");
		foreach ($news as $new) {
			echo "<li class='sswww'>";
			echo mb_substr($new['text'], 0, 25) . "...";
			echo "<div class='all' style='display:none;'>" . $new['text'] . "</div>";
			echo "</li>";
		}
		?>

	</ol>
	<!-- 分頁 -->
	<style>
		.cent a {
			text-decoration: none;
		}
	</style>
	<div class="cent">
		<?php
		if (($now - 1) > 0) {
			echo "<a href='?do=$do&p=" . ($now - 1) . "'>";
			echo " < </a>";
		}
		for ($i = 1; $i <= $pages; $i++) {
			$size = ($now == $i) ? "24px" : "20px";
			echo "<a href='?do=$do&p=$i' style='font-size:$size;'>";
			echo " &nbsp; $i &nbsp; </a>";
		}
		if (($now + 1) <= $pages) {
			echo "<a href='?do=$do&p=" . ($now + 1) . "'>";
			echo " > </a>";
		}
		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>