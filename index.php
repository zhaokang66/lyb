<?php require ("head-title.php");?>
<link href="css/guestbook.css" rel="stylesheet" type="text/css" />
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
		<p> <a href="index.php">首页</a> > 本站留言</p>
	</div>
</div>

<div class="news_content_canvas">
	<a href="inputbook.php" class="add_guest"></a>

	<!--留言列表-->
<?php
include 'link.php';
// $page='';
if ($page=="") {$page=1;};
// $db=mysql_connect($se_name,$sedb_name,$db_pass) or die ("数据库连接失败");
// mysql_select_db($db_name,$db);
$pagesize=5;  //定义每页显示多少条记录
$page=isset($_GET["page"])?intval($_GET["page"]):1;   //定义page的初始值,如果get 传过来的page为空,则page=1,
$total=mysql_num_rows(mysql_query("select * from ly  order by ly_id "));  //执行查询获取总记录数
$pagecount=ceil($total/$pagesize);  //计算出总页数
if ($page>$pagecount){
    $page=$pagecount;  // 对提交过来的page做一些检查
}
if ($page<=0){
    $page=1;                   // 对提交过来的page做一些检查
}
$offset=($page-1)*$pagesize;   //偏移量
$pre=$page-1;           //上一页
$next=$page+1;         //下一页
$first=1;                       //第一页
$last=$pagecount;    //末页
$exec="select * from ly order by ly_id desc limit $offset,$pagesize"; //执行查询
$result=mysql_query($exec);
while ($ly_data=mysql_fetch_array($result)){
   ?>
	<div class="guest_canvas">
		<div class="gu_list">
			<img src="<?php echo $ly_data['head'];?>" />
			<p style="text-align:center;font-size:20px;">昵称：<span style="color:red;"><?php echo $ly_data['user']; ?></span></p>
		</div>
		<div class="gu_list1">
			<div class="ly_date">发表于 <?php echo $ly_data['modi_date'];?> | 邮箱：<?php echo $ly_data['email'];?>
				<p class="ly_data" style="float:right;line-height:20px;"><a href="preEdit.php?id=<?php echo $ly_data['ly_id']?>">编辑</a>  |  <a href="delete.php?id=<?php echo $ly_data['ly_id'];?>">删除</a></p>
			</div>

			<p class="ly_content"><?php echo $ly_data['content'];?></p>

		</div>
	</div>
	<div class="guest_xian"></div>
<?php
}
?>
	<div class="ly_feyelist">页<?php echo $page."/".$pagecount?>总页&nbsp;<a href="?page=1">首页</a> <a href="?page=<?php echo $pre?>">上一页</a> <a href="?page=<?php echo $next?>">下一页</a> <a href="?page=<?php echo $last?>">尾页</a></div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require('bottom.php'); ?>
</body>
</html>
