<?php
session_start();
require ("link.php");
$head=make_safe($_POST["head"]);
$email=make_safe($_POST["email"]);
$user=make_safe($_POST["user"]);
$content=make_safe($_POST["content"]);
$yzm=make_safe($_POST["yzm"]);
$modi_date=date("Y-m-d H:i:s");
$sql = "insert into ly(head,user,email,content,modi_date) values('$head','$user','$email','$content','$modi_date')";
// $sql = "INSERT INTO `test`.`ly` (`head`, `user`, `eamil`, `content`, `modi_date`) VALUES ('$head', '$user', '$email', '$content', '$modi_date')";
if($_POST['btn_ly']!=''){
  if (empty($user)){
        echo "<script>alert('昵称不能为空！');</script>";
				echo "<script>window.history.back(-1); </script>";
    }else{
        if (!preg_match("/^[a-zA-Z\x{4e00}-\x{9fa5}]{3,6}$/u",$user)){
						  echo "<script>alert('对不起，昵称只允许英文、数字、下划线3-6位字符');</script>";
							echo "<script>window.history.back(-1); </script>";
        }else {
					if (empty($email)){
						echo "<script>alert('邮箱不能为空！');</script>";
						echo "<script>window.history.back(-1); </script>";
			    }else{
							if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
								echo "<script>alert('对不起，邮箱格式不正确，请重试！');</script>";
								echo "<script>window.history.back(-1); </script>";
							}else {
								if (empty($content)) {
									echo "<script>alert('留言内容不能为空！');</script>";
									echo "<script>window.history.back(-1); </script>";
								}else {
								if ($yzm==$_SESSION["Checknum"]) {
									if ($result=mysql_query($sql)) {
										echo "<script>alert('留言成功！');window.location.href='index.php';</script>";
									}else {
										echo "<script>alert('留言失败！');window.history.back(-1); </script>";
									}
								}else {
									echo "<script>alert('验证码错误，请重试！');window.history.back(-1); </script>";
								}

			        }
			        }
			    }
        }
    }
	}
