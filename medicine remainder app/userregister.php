<?php 

$connect=mysql_connect("localhost","root","");
mysql_select_db("alzhiemerdisease",$connect);


 $ename = $_GET['pname'];
 $eemail = $_GET['pemail'];
 $econtact = $_GET["pcontact"];
 $gender = $_GET["gender"];
 
 $email = $_GET["email"];
 $edob = $_GET["edob"];


 $epassword = $_GET["epassword"];

 $lat = $_GET["lat"];
 
 $lang = $_GET["lang"];
if($connect)
{

				$sqlCheckUname = mysql_query("SELECT * FROM userregister WHERE username = '$eemail'");
				$u_name_query =  mysql_num_rows($sqlCheckUname);

				if($u_name_query > 0)
				{
					echo "User name allready used type another one";
				}
				else
				{
					

					$sql_register = mysql_query("INSERT INTO userregister VALUES ('','$ename','$eemail','$email','$econtact','$gender','$edob','$epassword','$lat','$lang','')");

					if($sql_register)
					{
						echo "successfully";
					}	
					else
					{
						echo "Failed to register you account";
					}
				}

}
else
{
echo "Connection Error";
}

?>
