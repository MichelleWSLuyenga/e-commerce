<?
include('../../connect.php');

$forget_email = $_POST["forget_email"];

$sql =	" SELECT reseller_email FROM admin_reseller WHERE reseller_email LIKE '".$forget_email."' ";
$query = mysql_db_query($dbname, $sql) or die("Can't Query");
$row = mysql_fetch_array($query);

if($row['reseller_email'] != "") {
	
	echo " <script language='javascript'> window.location='../mail/mail_forget.php?reseller_email=".$row['reseller_email']."'; </script> ";

} else {
	echo " <script language='javascript'> window.location='../index.php?forget=forget'; </script>";
}	

mysql_close();
?>