<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$upload_name = $_POST["upload_name"];
$upload_admin = $_POST["upload_admin"];
$imageType = $_POST["imageType"];
$upload_image = $_POST["upload_image"];
$upload_date = date("m/d/Y");
$upload_time = date("H:i:s");
$upload_ip = $_POST['ip'];
$upload_status = T;

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['upload_image']['tmp_name'])) {
  $imgData =addslashes(file_get_contents($_FILES['upload_image']['tmp_name']));
	$imageProperties = getimageSize($_FILES['upload_image']['tmp_name']);

	$sql = "INSERT INTO admin_upload(id,upload_name,upload_admin,imageType,upload_image,upload_date,upload_time,upload_ip,upload_status)
	VALUES('".$id."', '".$upload_name."', '".$upload_admin."', '".{$imageProperties['mime']}."', '".{$imgData}."', '".$upload_date."', '".$upload_time."', '".$upload_ip."', '".$upload_status."')";
	$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
	if(isset($current_id)) {
		echo " <script language='javascript'> window.location='../category/testing.php'; </script> ";
	}
}
}

mysql_close();
?>
