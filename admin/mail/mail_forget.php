<?php
	include('../../connect.php');
	$reseller_email = $_GET["reseller_email"];
	$sql = " SELECT * FROM admin_reseller WHERE reseller_email = '".$reseller_email."' ";
	$query = mysql_db_query($dbname, $sql) or die("Can't Query");
	$row = mysql_fetch_array($query);
	
	$reseller_firstname = $row['reseller_firstname'];
	$reseller_lastname = $row['reseller_lastname'];
	$reseller_email = $row['reseller_email'];
	
	require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	//$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "mail.vgreseller.com"; // sets GMAIL as the SMTP server
	$mail->Port = 25; // set the SMTP port for the GMAIL server
	$mail->Username = "do-not-reply@vgreseller.com"; // GMAIL username
	$mail->Password = "demo166"; // GMAIL password
	$mail->From = "do-not-reply@vgreseller.com"; // "name@yourdomain.com";
	$mail->FromName = "Reseller Online";  // set from Name
	$mail->Subject = "Password Reset System";
	$mail->Body = "
	<p> Dear ".$reseller_firstname." ".$reseller_lastname." </p>
	<p> Reset Password </p>
	<p> <a href='http://www.vgreseller.com/admin-reseller/forgotten/index.php?reseller_email=".$reseller_email."'>Link Reset Password</a> </p>
	";
	$mail->AddAddress("do-not-reply@vgreseller.com", "Reseller Online");
	$mail->AddAddress($reseller_email, "Reseller Online");
	$mail->Send();
	if($mail) 
	{
		echo "	<script language='javascript'> window.location='http://www.vgreseller.com/admin-reseller/'; </script> ";}
		else 
	{
		echo "Email Can Not Send.";
	}
?>
