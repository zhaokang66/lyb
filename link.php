<?php


//ϵͳ����

$se_name = "localhost"; 	         // ���ݿ�������
$sedb_name = "root"; 		        // ���ݿ��û���
$db_pwd = "root"; 		       // ���ݿ�����
$db_name = "test"; 	      // ���ݿ���

//���ݿ�����

$conn = mysql_connect($se_name,$sedb_name,$db_pwd) or die("�޷��������ݿ⣬������");

mysql_select_db($db_name,$conn);  //ѡ�����ݿ�

mysql_query("SET NAMES 'utf8'");/*�������*/

date_default_timezone_set('PRC');

error_reporting(0);

//��ע�뺯�� ��Ҫ��Ϊ�˷�ֹ����д���̨���ݿ�
function input_check($sql_str) {
   $check=eregi('select|order by|from|and|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|system_user|user|current_user|database|version', $sql_str);     // ���й���
   if($check){
       echo "�Ƿ�ע�����ݣ�";
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
