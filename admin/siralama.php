<?php
include('../config.php');

//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['p']=='kurumsal'){
	if(is_array($_POST['item'])){		
		foreach ($_POST['item'] as $key=>$value){
			mysql_query("UPDATE kurumsal SET siralama = '$key' WHERE id ='$value'");				
		}
		$kurumsalSiralaMsg = array( 'islemSonuc' => true , 'kurumsalSiralaIslemMsj' => 'İçeriklerin sıralama işlemi güncellendi' );
	}else{
		$kurumsalSiralaMsg = array( 'islemSonuc' => false ,'kurumsalSiralaIslemMsj' => 'İçeriklerin sıralama işleminde hata oluştu' );
	}
} 
if ( isset($kurumsalSiralaMsg) ){
	echo json_encode($kurumsalSiralaMsg);
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['p']=='hizmetlerimiz'){
	if(is_array($_POST['item'])){
		foreach ($_POST['item'] as $key=>$value){
			mysql_query("UPDATE hizmetlerimiz SET siralama = '$key' WHERE id ='$value'");				
		}
		$hizmetlerimizSiralaMsg = array( 'islemSonuc' => true , 'hizmetlerimizSiralaIslemMsj' => 'İçeriklerin sıralama işlemi güncellendi' );
	}else{
		$hizmetlerimizSiralaMsg = array( 'islemSonuc' => false ,'hizmetlerimizSiralaIslemMsj' => 'İçeriklerin sıralama işleminde hata oluştu' );
	}
} 
if ( isset($hizmetlerimizSiralaMsg) ){
	echo json_encode($hizmetlerimizSiralaMsg);
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['p']=='hizmetlerimiz_kategori'){
	if(is_array($_POST['item'])){
		foreach ($_POST['item'] as $key=>$value){
			mysql_query("UPDATE hizmetlerimiz_kategori SET siralama = '$key' WHERE id ='$value'");				
		}
		$hizmetlerimiz_kategoriSiralaMsg = array( 'islemSonuc' => true , 'hizmetlerimiz_kategoriSiralaIslemMsj' => 'İçeriklerin sıralama işlemi güncellendi' );
	}else{
		$hizmetlerimiz_kategoriSiralaMsg = array( 'islemSonuc' => false ,'hizmetlerimiz_kategoriSiralaIslemMsj' => 'İçeriklerin sıralama işleminde hata oluştu' );
	}
} 
if (isset($hizmetlerimiz_kategoriSiralaMsg)){
	echo json_encode($hizmetlerimiz_kategoriSiralaMsg);
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['p']=='donanimlarimiz'){
	if(is_array($_POST['item'])){
		foreach ($_POST['item'] as $key=>$value){
			mysql_query("UPDATE donanimlarimiz SET siralama = '$key' WHERE id ='$value'");				
		}
		$donanimlarimizSiralaMsg = array( 'islemSonuc' => true , 'donanimlarimizSiralaIslemMsj' => 'İçeriklerin sıralama işlemi güncellendi' );
	}else{
		$donanimlarimizSiralaMsg = array( 'islemSonuc' => false ,'donanimlarimizSiralaIslemMsj' => 'İçeriklerin sıralama işleminde hata oluştu' );
	}
} 
if (isset($donanimlarimizSiralaMsg)){
	echo json_encode($donanimlarimizSiralaMsg);
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['p']=='operasyonlar'){
	if(is_array($_POST['item'])){
		foreach ($_POST['item'] as $key=>$value){
			mysql_query("UPDATE operasyonlar SET siralama = '$key' WHERE id ='$value'");				
		}
		$operasyonlarSiralaMsg = array( 'islemSonuc' => true , 'operasyonlarSiralaIslemMsj' => 'İçeriklerin sıralama işlemi güncellendi' );
	}else{
		$operasyonlarSiralaMsg = array( 'islemSonuc' => false ,'operasyonlarSiralaIslemMsj' => 'İçeriklerin sıralama işleminde hata oluştu' );
	}
} 
if (isset($operasyonlarSiralaMsg)){
	echo json_encode($operasyonlarSiralaMsg);
}
//////////////////////////////////////////////////////////////////////////////////////////
?>