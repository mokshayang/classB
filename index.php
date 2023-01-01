<?php include_once "./api/base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<a title="<?= $Title->find(['sh' => 1])['text'] ?>" href="index.php">
			<div class="ti" style="background:url('upload/<?= $Title->find(['sh' => 1])['img'] ?>'); background-size:cover;"></div>
			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>

					<?php
					//主選單開始 :
					$main = $Menu->all(['sh' => 1, 'parent' => 0]);
					foreach ($main as $ma) {
						echo "<div class='mainmu cent'>";
						echo "<a href='{$ma['href']}'>{$ma['name']}</a>";
					//上方主選單完成

						$chk = $Menu->count(['parent' => $ma['id']]);
						if ($chk > 0) {
							$sub = $Menu->all(['parent' => $ma['id']]);

							echo "<div class='mw'>";
							foreach ($sub as $su) {
								echo "<div class='mainmu2 cent'>";
								echo "<a href='{$su['href']}'>{$su['name']}</a>";
								echo "</div>"; //maimnmu2 end
							}
							echo "</div>"; //mw end
						}
						echo "</div>"; //mainmu end
					}
					?>

				</div>

				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 : <?= $total['total'] ?></span>
					</span>
				</div>
			</div>
			<?php
			$do = $_GET['do'] ?? "home";
			$file = "./front/" . $do . ".php";
			if (file_exists($file)) {
				include_once $file;
			} else {
				include_once "./front/home.php";
			}
			?>
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
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php if (empty($_SESSION['login'])) { ?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<?php } else { ?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('admin.php')">返回管理</button>
				<?php } ?>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<!-- 映像開始 在 上下箭頭之間 -->
					<div class="cent" onclick="pp(1)" style="margin: top 5px;"><img src="icon/up.jpg"></div>
					<style>
						.cent .ii {
							width: 150px;
							height: 103px;
							border: 3px solid orange;
							margin:5px auto;
						}
					</style>

					<?php
					$img = $Image->all(['sh' => 1]);
					$hm = count($img); //共幾張 
					foreach ($img as $id => $v) {
					?>
						<div class="cent im" id="ssaa<?= $id ?>">
							<img src="upload/<?= $v['img'] ?>" class="ii" alt="">
						</div>

					<?php } ?>
					
					<div class="cent" onclick="pp(2)"><img src="icon/dn.jpg"></div>

					<script>
						var nowpage = 0,
							num = <?=$hm?>;
						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) <= num - 3 ) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?= $bottom['bottom'] ?></span>
		</div>
	</div>

</body>

</html>