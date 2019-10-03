<?php
$hostname = "localhost";//Might have to change name
$user = "vgresellerdb";
$password = "";//S0Q#}#5Pf%+m
$dbname = "reseller_online";

mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Server Performance Problems");
mysql_select_db($dbname) or die("Database Performance Problems");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
mysql_query("SET SESSION sql_mode = ''");
?>
