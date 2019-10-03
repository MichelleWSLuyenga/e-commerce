<?
if(empty($_POST['ip'])){
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
}
require('./phpip2country.class.php');

include('../../connect.php');

$id = $_POST["id"];
$fabrics_product = $_POST["fabrics_product"];
$fabrics_type = $_POST["fabrics_type"];
$fabrics_brand = $_POST["fabrics_brand"];
$fabrics_number = $_POST["fabrics_number"];
$fabrics_color = $_POST["fabrics_color"];
$fabrics_pattern = $_POST["fabrics_pattern"];
$fabrics_image = $_POST["fabrics_image"];
$fabrics_admin = $_POST["fabrics_admin"];
$fabrics_date = date("m/d/Y");
$fabrics_time = date("H:i:s");
$fabrics_ip = $_POST['ip'];
$fabrics_status = T;

if($fabrics_product == "Suit") {

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				
				$sql2 =	" UPDATE admin_fabrics_jacket SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				
				$sql3 =	" UPDATE admin_fabrics_pants SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
				
				$sql4 =	" UPDATE admin_fabrics_suits SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
				
				$sql5 =	" UPDATE admin_fabrics_suits_with_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
				
				$sql6 =	" UPDATE admin_fabrics_tuxedo_jacket SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
				
				$sql7 =	" UPDATE admin_fabrics_tuxedo_suits SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
				
				$sql8 =	" UPDATE admin_fabrics_tuxedo_with_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
				
				$sql9 =	" UPDATE admin_fabrics_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
				
				echo " <script language='javascript'> window.location='../fabrics/suit.php'; </script> ";
				}
       } else {
		   
           $sql2 =	" UPDATE admin_fabrics_jacket SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   
		   $sql3 =	" UPDATE admin_fabrics_pants SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
		   
		   $sql4 =	" UPDATE admin_fabrics_suits SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
		   
		   $sql5 =	" UPDATE admin_fabrics_suits_with_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
		   
		   $sql6 =	" UPDATE admin_fabrics_tuxedo_jacket SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
		   
		   $sql7 =	" UPDATE admin_fabrics_tuxedo_suits SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
		   
		   $sql8 =	" UPDATE admin_fabrics_tuxedo_with_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
		   
		   $sql9 =	" UPDATE admin_fabrics_vest SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
		   
		   echo " <script language='javascript'> window.location='../fabrics/suit.php'; </script> ";
       }
}

} else if($fabrics_product == "Shirt") {

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" UPDATE admin_fabrics_shirt SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/shirt.php'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_fabrics_shirt SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/shirt.php'; </script> ";
       }
}	

} else if($fabrics_product == "Overcoat") {

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" UPDATE admin_fabrics_overcoat SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/overcoat.php'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_fabrics_overcoat SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/overcoat.php'; </script> ";
       }
}

} else if($fabrics_product == "Jeans") {

$path = "../../images/fabrics/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['fabrics_image']['name'];
	$tmp = $_FILES['fabrics_image']['tmp_name'];
	if(strlen($name)){
			list($txt, $ext) = explode(".", $name);
			$fabrics_image_pic = time().substr(str_replace(" ", "_", $txt), 255).".".$ext;
			if(move_uploaded_file($tmp, $path.$fabrics_image_pic)){
				$sql2 =	" UPDATE admin_fabrics_jeans SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image_pic."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
				$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
				echo " <script language='javascript'> window.location='../fabrics/jeans.php'; </script> ";
				}
       } else {
           $sql2 =	" UPDATE admin_fabrics_jeans SET type = '".$fabrics_type."', brand = '".$fabrics_brand."', fabricno = '".$fabrics_number."', color = '".$fabrics_color."', pattern = '".$fabrics_pattern."', image = '".$fabrics_image."', fabrics_admin = '".$fabrics_admin."', fabrics_date = '".$fabrics_date."', fabrics_time = '".$fabrics_time."', fabrics_ip = '".$fabrics_ip."', fabrics_status = '".$fabrics_status."' WHERE id = '".$id."' ";
		   $query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
		   echo " <script language='javascript'> window.location='../fabrics/jeans.php'; </script> ";
       }
}

}

mysql_close();
?>