<?php
require_once("../config.php"); 
if(isset($_GET['sayfa'])){ 
	$sayfa=$_GET['sayfa']; 
	if($sayfa){
		$dk=mysql_query("select * from $sayfa ");
		$list='{"0":"Yazı Seçiniz",';
		while($ilr=mysql_fetch_array($dk)){
			$list.='"'.$ilr['id'].'":"'.$ilr['baslik_tr'].'",';
		}
		$list=substr($list,0,-1);
		$list.="}"; 
		echo $list;
	}
}  
?>