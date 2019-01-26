<?php
$hostname = "localhost"; //Mysql Hostname
$db_username = "root"; //Database Username
$db_password = "usbw"; //Database Password
$db_name = "petical.com.tr"; //Database Name

if (!@mysql_connect($hostname,$db_username, $db_password)) die(mysql_error());
if (!@mysql_select_db($db_name)) die(mysql_error());

mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_connection = 'UTF8'");
mysql_query("SET character_set_client = 'UTF8'");
mysql_query("SET character_set_results = 'UTF8'");

$ayarlar=mysql_fetch_object(mysql_query("select * from ayarlar"));
define("Site_url","$ayarlar->site_url") ; 
 
 
$_SESSION['dil'] = isset($_SESSION['dil']) ? $_SESSION['dil'] : "tr"; 
if($_SESSION['dil']==""){
	$_SESSION['dil']="tr";
}

if($_SESSION['dil']=="tr"){
	include("tr.php");	
}else{
	include("en.php");
}	
  

function url_duzenle($text){ 
	$search = array(' ','ö','ü','ı','ğ','ç','ş','/','?','Ö','Ü','I','Ğ','Ç','Ş','&');
	$replace = array('_','o','u','i','g','c','s','_','_','o','u','i','g','c','s','_');
	$new_text = str_replace($search,$replace,trim($text));
	return $new_text;
}

function kucuk($text2){ 
	$search2 = array('A','B','C','Ç','D','E','F','G','Ğ','H','I','İ','J','K','L','M','N','O','Ö','P','R','S','Ş','T','U','Ü','V','Y','Z','X','W');
	$replace2 = array('a','b','c','ç','d','e','f','g','g','h','ı','i','j','k','l','m','n','o','ö','p','r','s','ş','t','u','ü','v','y','z','x','w');
	$new_text2 = str_replace($search2,$replace2,trim($text2));
	return $new_text2;
}

function buyuk($text2){ 
	$search2 = array('a','b','c','ç','d','e','f','g','ğ','h','ı','i','j','k','l','m','n','o','ö','p','r','s','ş','t','u','ü','v','y','z','x','w');
	$replace2 =array('A','B','C','Ç','D','E','F','G','Ğ','H','I','İ','J','K','L','M','N','O','Ö','P','R','S','Ş','T','U','Ü','V','Y','Z','X','W');
	$new_text2 = str_replace($search2,$replace2,trim($text2));
	return $new_text2;
}
?>