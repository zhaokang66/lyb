<?php require ("head-title.php");
require("link.php");
$id = $_GET['id'];
if (!empty($_GET['id'])) {
$sql = "SELECT * FROM `test`.`ly` WHERE `ly`.`ly_id` = $id";
	$query=mysql_query($sql);
	$rs=mysql_fetch_array($query);
}
?>
<link href="css/inputbook.css" rel="stylesheet" type="text/css" />
<body>
<div class="index_top_canvas">
	<!--首页logo-->
	<div class="index_top1_canvas">
		<h1>在线留言板 <span>V1.0</span></h1>
	</div>
	<!--首页导航-->
	<ul class="navi_bj">
		<li class="navi_t1"><a href="index.php" >首页</a></li>
		<li class='menu_line'></li>
		<!--如果需要填加导航栏，直接去掉备注可以正常使用-->
		<!--<li><a href="news.php">导航栏位</a></li>
		<!--<li class='menu_line'></li>-->
	</ul>
</div>
<!--首页子导航-->
<div class="news_top_canvas">
	<div class="news_top_content">
		<p> <a href="index.php">首页</a> > 修改留言</p>
	</div>
</div>
<!--内容框架-->
<div class="news_content_canvas">
	<form class="input_form_canvas" method="post" action="postEdit.php">
	 	<ul class="input_fr_list">
			<p><img id="image1" name="image1" src="<?php echo $rs['head'];?>"></p>
			<li><label>头像选择:</label>
				<select name="head"  id="image"  onchange="image1.src=this.value" >
					<option value="head/001.gif">男1</option>
					<option value="head/002.gif">男2</option>
					<option value="head/003.gif">男3</option>
					<option value="head/004.gif">男4</option>
					<option value="head/005.gif">男5</option>
					<option value="head/006.gif">男6</option>
					<option value="head/007.gif">男7</option>
					<option value="head/008.gif">男8</option>
					<option value="head/009.gif">女1</option>
					<option value="head/010.gif">女2</option>
					<option value="head/011.gif">女3</option>
					<option value="head/012.gif">女4</option>
					<option value="head/013.gif">女5</option>
					<option value="head/014.gif">女6</option>
					<option value="head/015.gif">女7</option>
					<option value="head/016.gif">女8</option>
				</select>
			</li>
			<li><label>昵称:</label><input  type="text" name="user" id="user" value="<?php echo $rs['user']; ?>"></input> </li>
			<li><label>电子邮箱:</label><input  type="email" name="email" id="email" value="<?php echo $rs['email']; ?>"></input></li>
			<li><label>留言内容:</label>
				<textarea name="content" id="content" style="width:500px;height:200px;" ><?php echo $rs['content']; ?></textarea>
			</li>
      <li><input type="hidden" name="id" value="<?php echo $id; ?>"></li>
			<li><label>验证码: &nbsp;</label>
				<input  type="text" name="yzm" id="yzm"></input>
				<div class="yzdimg">
				<img src="yzt.php" id="codeimg" style="cursor:pointer;" title="点击更换图片" onclick="this.src = this.src+'?'+Math.random();" >&nbsp;<span onClick="document.getElementById('codeimg').src+='?'+Math.random()" style="cursor:pointer; color:#3F79CB; text-decoration:underline;"><span >看不清</span>？</span>
				</div>
			</li>
			<li><input class="ly_btn" name="btn_ly" id="btn_ly" type="submit" value="修改留言" /></li>
		</ul>
	</form>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("bottom.php");?>

</body>
</html>
