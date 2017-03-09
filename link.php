<?php


//系统配置

$se_name = "localhost"; 	         // 数据库主机名
$sedb_name = "root"; 		        // 数据库用户名
$db_pwd = "root"; 		       // 数据库密码
$db_name = "test"; 	      // 数据库名

//数据库配置

$conn = mysql_connect($se_name,$sedb_name,$db_pwd) or die("无法连接数据库，请重来");

mysql_select_db($db_name,$conn);  //选择数据库

mysql_query("SET NAMES 'utf8'");/*解决汉字*/

date_default_timezone_set('PRC');

error_reporting(0);

//防注入函数 主要是为了防止恶意写入后台数据库
function input_check($sql_str) {
   $check=eregi('select|order by|from|and|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|system_user|user|current_user|database|version', $sql_str);     // 进行过滤
   if($check){
       echo "非法注入内容！";
       exit();
   }else{
       return $sql_str;
   }

}

function make_safe($variable) {
$variable = addslashes(trim($variable));
$variable = trim($variable);
return $variable;
}


?>
