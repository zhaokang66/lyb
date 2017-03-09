<?php
include 'link.php';
$id = $_GET['id'];
// $query="delete from ly where id=".$id;
$query="DELETE FROM `test`.`ly` WHERE `ly`.`ly_id` = $id";
if (mysql_query($query)) {
  echo "<script>alert('删除成功!');</script>";
}else {
  echo "<script>alert('删除失败!');</script>";
}
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='index.php'";
echo "</script>";
?>
