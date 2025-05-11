<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("alzhiemerdisease",$connect);
$username=$_GET["username"];
$pass=$_GET["password"];
if($connect){
$sql= mysql_query("select * from userregister where username='$username' and password='$pass'");
$u_name=mysql_num_rows($sql);

if($u_name == 1){
  echo "Success";

}
else{
   echo "failed";
}

}else{
   echo "Connection Error";
 
}

?>