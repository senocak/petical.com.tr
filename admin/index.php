<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include("../config.php"); 
$durum="";
$durum = isset($_SESSION['username']) ? $_SESSION['username'] : ""; 
if($durum =="") echo '<script language="javascript">location.href="login.php";</script>';
$sayfa="";
$sayfa=isset($_GET["sayfa"]) ? $_GET["sayfa"] : ""; 

$ayarlar=mysql_fetch_object(mysql_query("select * from ayarlar"));

//echo $sayfa;

 
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="generator" content="Bilgimedya Yazılım | Sistem Geliştirme ve Destek Hizmetleri">
	<meta name="description" content="Mersin Güvenlik Yazılımları, Sunucu Hizmetleri, Hosting, Mail Serveri Alan Adı, Datacenter, Web Tasarımı, 
	Notebook Tamiri, Linux Servisi, 
	Elastix Sunucu, Çağrı Merkezi, Debian, Ubuntu, Voip, IP Santral, 
	Linux Server, Lync Server, Cloud Server, Bulut Yedekleme, Sql, Mikro, Logo, LKS, Logo Tiger, Centos, Asterisk, Elastix, Freepbx, Vtiger, CRM, 
	Adnroid, Otomasyon, Network, Ağ Kurulumu, Dosya Paylaşımı, Open Filer, HyperVM,
	Proxy Server, Firewall ve Dosya Sunucuları">

    <title><?php echo $ayarlar->title;?> | Yönetim Paneli</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<!-- Sortable JS -->
		<script src="js/jquery-1.11.2.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
	<!-- Sortable JS -->
	
	
	<link href="ckeditor/ckeditor.css" rel="stylesheet">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script>
        CKEDITOR.replace( 'editor', {
            //filebrowserUploadUrl: 'db.php?upload_img',
            extraPlugins: 'image2,imageuploader',
            language: 'tr'
        } );
    </script>
	
	<script type="text/javascript">
	function showimagepreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#imgview').attr('src', e.target.result);
				}
			reader.readAsDataURL(input.files[0]);
			}
	}
</script> 

<style>
 .paginationpagination {
	clear: both;
	overflow: hidden;
	float: left;
	width: 100%;
	padding: 0;
	margin-bottom: 20px;
}
.paginationpagination ul {
	list-style: none;
	margin: 0;
}
.paginationpagination ul li {
	float: left;
	margin-right: 8px;
}
.currenttext, .paginationpagination a:hover {
	margin: 0 1px 0 0;
	display: inline-block;
	float: left;
	line-height: 1.2em;
	text-decoration: none;
	padding: 10px 14px;
	border: 1px solid #ccc;
	background: #7CDCD9;
	color:red;
}
.paginationpagination a, .pagination2 {
	border: 1px solid #ccc;
	background: #fff;
	margin: 0 1px 0 0;
	display: inline-block;
	float: left;
	line-height: 1.2em;
	text-decoration: none;
	color: #555;
	padding: 10px 14px;
}
.paginationpagination a:hover { color: gray }

.sortable { cursor: move; }
</style> 
 
  </head> 
  <body> 
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Paneli Daralt"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b><?php echo $ayarlar->title;?></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">  
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
					<?php $okunmamış=mysql_num_rows(mysql_query("select * from mesaj where okundu=0 "));?>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-envelope-o"></i><span class="badge bg-theme"><?php echo $okunmamış;?></span></a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li><p class="green">Okunmamış <?php echo $okunmamış;?> mesajınız var.</p></li><?php 
								$m_sorgu=mysql_query("select * from mesaj where okundu=0 limit 0,3");
								while($m_yaz=mysql_fetch_object($m_sorgu)){
									
									$icerik=$m_yaz->message;
									$karakter=30;
									if(strlen($icerik)>=$karakter){ 
										if(preg_match('/(.*?)\s/i',substr($icerik,$karakter),$dizi))$icerik=substr($icerik,0,$karakter+strlen($dizi[0]))."...";  
									}else{
										$icerik .="";
									}
									echo '<li>
											<a href="index.php?sayfa=mesaj_oku&id='.$m_yaz->id.'">
												<span class="photo"><img alt="avatar" src="images/user.png"></span>
												<span class="subject"><span class="from">'.$m_yaz->name.'</span><span class="time">'.$m_yaz->tarih.'</span></span>
												<span class="message">'.$icerik.'</span>
											</a>
  										  </li>';
								}
							?> 
                            <li><a href="index.php?sayfa=mesajlar">Tüm Mesajlar</a></li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu"><li><a class="logout" onclick="return confirm('Çıkmak İstediğinize Emin Misiniz?');" href="index.php?sayfa=logout">Çıkış Yap</a></li></ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse ">
				<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion"> 
						<p class="centered"><a href="index.php?sayfa=profil"><img src="images/favicon.png" class="img-circle" width="60"></a></p>
						<h5 class="centered"><?php echo $durum;?></h5> 
						<li class="mt"><a <?php if($sayfa=="") echo ' class="active"';?> href="index.php"><i class="fa fa-dashboard"></i><span>Anasayfa</span></a></li>
						<li class="sub-menu">
							<a <?php if($sayfa=="slider" ||  $sayfa=="yeni_slider" || $sayfa=="slider_duzenle" || $sayfa=="slider_thumb" ) echo ' class="active"';?> href="javascript:;" ><i class="fa fa-desktop"></i><span>Slider</span></a>
							<ul class="sub">
								<li <?php if(  $sayfa=="slider_duzenle" || $sayfa=="slider"  || $sayfa=="slider_thumb" ) echo ' class="active"';?>><a  href="index.php?sayfa=slider">Slider</a></li>
								<li <?php if($sayfa=="yeni_slider" ) echo ' class="active"';?>><a  href="index.php?sayfa=yeni_slider">Yeni Ekle</a></li> 
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="makale" || $sayfa=="makale_ekle" || $sayfa=="makale_duzenle"  ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-th"></i><span>Makaleler</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="makale"|| $sayfa=="makale_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=makale">Makaleler</a></li> 
								<li <?php if($sayfa=="makale_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=makale_ekle">Yeni Ekle</a></li> 
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="makale_kategori" || $sayfa=="makale_kategori_ekle" || $sayfa=="makale_kategori_duzenle"  ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-tasks"></i><span>Makale Kategorileri</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="makale_kategori"|| $sayfa=="makale_kategori_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=makale_kategori">Kategoriler</a></li>
								<li <?php if($sayfa=="makale_kategori_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=makale_kategori_ekle">Kategori Ekle</a></li>
							</ul>
						</li> 
						<li class="sub-menu">
							<a  <?php if($sayfa=="ekibimiz" || $sayfa=="ekibimiz_ekle" || $sayfa=="ekibimiz_duzenle"  ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-tasks"></i><span>Ekibimiz</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="ekibimiz"|| $sayfa=="ekibimiz_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=ekibimiz">Ekibimiz</a></li>
								<li <?php if($sayfa=="ekibimiz_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=ekibimiz_ekle">Ekibimiz Ekle</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="donanimlarimiz" || $sayfa=="donanimlarimiz_ekle" || $sayfa=="donanimlarimiz_duzenle"  ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-tasks"></i><span>Donanımlarımız</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="donanimlarimiz"|| $sayfa=="donanimlarimiz_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=donanimlarimiz">Donanımlarımız</a></li>
								<li <?php if($sayfa=="donanimlarimiz_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=donanimlarimiz_ekle">Donanımlarımız Ekle</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="operasyonlar" || $sayfa=="operasyonlar_ekle" || $sayfa=="operasyonlar_duzenle"  ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-tasks"></i><span>Operasyonlar</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="operasyonlar"|| $sayfa=="operasyonlar_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=operasyonlar">Operasyonlar</a></li>
								<li <?php if($sayfa=="operasyonlar_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=operasyonlar_ekle">Operasyonlar Ekle</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="kurumsal" || $sayfa=="kurumsal_ekle" || $sayfa=="kurumsal_duzenle"  ) echo ' class="active"';?> href="javascript:;" ><i class="fa fa-book"></i><span>Kurumsal</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="kurumsal"|| $sayfa=="kurumsal_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=kurumsal">Kurumsal</a></li> 
								<li <?php if( $sayfa=="kurumsal_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=kurumsal_ekle">Yeni Ekle</a></li> 
							</ul>
						</li>
						<li class="sub-menu">
							<a  <?php if($sayfa=="hizmetlerimiz" || $sayfa=="hizmetlerimiz_ekle" || $sayfa=="hizmetlerimiz_duzenle"  || $sayfa=="hizmetlerimiz_kategori"  || $sayfa=="hizmetlerimiz_kategori_ekle"  ) echo ' class="active"';?> href="javascript:;" ><i class="fa fa-book"></i><span>Hizmetlerimiz</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="hizmetlerimiz"|| $sayfa=="hizmetlerimiz_duzenle" ) echo ' class="active"';?>><a  href="index.php?sayfa=hizmetlerimiz">Hizmetlerimiz</a></li> 
								<li <?php if( $sayfa=="hizmetlerimiz_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=hizmetlerimiz_ekle">Yeni Hizmetlerimiz Ekle</a></li> 
								<li>----------</li> 
								<li <?php if( $sayfa=="hizmetlerimiz_kategori" ) echo ' class="active"';?>><a  href="index.php?sayfa=hizmetlerimiz_kategori">Hizmetlerimiz Kategorileri</a></li> 
								<li <?php if( $sayfa=="hizmetlerimiz_kategori_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=hizmetlerimiz_kategori_ekle"> Kategoriler Ekle</a></li> 
							</ul>
						</li>
						<li class="sub-menu">
						<a <?php if($sayfa=="galeri" ||  $sayfa=="galeri_resim_ekle" || $sayfa=="galeri_resim_duzenle" || $sayfa=="galeri_kat" || $sayfa=="galeri_kat_ekle" ) echo ' class="active"';?> href="javascript:;" ><i class="fa fa-desktop"></i><span>Galeri</span></a>
							<ul class="sub">
								<li <?php if(  $sayfa=="galeri_resim_duzenle" || $sayfa=="galeri"  || $sayfa=="slider_thumb" ) echo ' class="active"';?>><a  href="index.php?sayfa=galeri">Tüm Resimler</a></li>
								<li <?php if($sayfa=="galeri_resim_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=galeri_resim_ekle">Yeni Ekle</a></li> 
								<li>------</a></li> 
								<li <?php if($sayfa=="galeri_kat" ) echo ' class="active"';?>><a  href="index.php?sayfa=galeri_kat">Galeri Kategorileri</a></li> 
								<li <?php if($sayfa=="galeri_kat_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=galeri_kat_ekle">Yeni Galeri Kategori Ekle</a></li> 
							</ul>
						</li> 
						<li class="sub-menu">
							<a  <?php if($sayfa=="slider_yazi" || $sayfa=="slider_yazi_ekle"    ) echo ' class="active"';?>href="javascript:;" ><i class="fa fa-th"></i><span>Yazılardaki Resimler</span></a>
							<ul class="sub">
								<li <?php if($sayfa=="slider_yazi" ) echo ' class="active"';?>><a  href="index.php?sayfa=slider_yazi">Tüm Resimler</a></li> 
								<li <?php if($sayfa=="slider_yazi_ekle" ) echo ' class="active"';?>><a  href="index.php?sayfa=slider_yazi_ekle">Yeni Ekle</a></li> 
							</ul>
						</li>
						<li><a <?php if( $sayfa=="mesajlar" || $sayfa=="mesaj_oku" ) echo ' class="active"';?>  href="index.php?sayfa=mesajlar" ><i class="fa fa-inbox"></i><span>Mesajlar</span></a></li>
						<li><a <?php if( $sayfa=="ayarlar"  ) echo ' class="active"';?>  href="index.php?sayfa=ayarlar" ><i class="fa fa-cogs"></i><span>Ayarlar</span></a></li>
					</ul>
				<!-- sidebar menu end-->
				</div>
			</aside>
      <!--sidebar end--> 
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i><?php echo $ayarlar->title;?> Yönetim Paneli</h3>
          	<div class="row mt">
          		<div class="col-lg-12"> 
					<div class="row">  
						<?php 
						if($sayfa=="slider"){
							$slider_sorgu=mysql_query("select * from slider order by id desc");
							while($slider_yaz=mysql_fetch_object($slider_sorgu)){
								echo  ' <div class="col-lg-4 col-md-4 col-sm-4 mb">
											<div class="content-panel pn">
												<div id="spotify" style="background:url(../upload/slider/'.$slider_yaz->resim.') no-repeat scroll center center / 100% auto;; ">
													<div class="sp-title"><h3 style="color: rgb(255, 215, 119); background-color: black;">'.$slider_yaz->baslik_tr.'</h3></div> 
													<div class="col-xs-4 col-xs-offset-8" ><a href="index.php?sayfa=slider_thumb&id='.$slider_yaz->id.'"><button class="btn btn-sm btn-success">Küçük Resim Ekle</button></a></div>
												</div>
												<p class="followers" style="text-align:center;">
													<a href="index.php?sayfa=slider_duzenle&id='.$slider_yaz->id.'"><i class="fa fa-edit"></i> Düzenle</a>
													<a href="index.php?sayfa=slider_sil&id='.$slider_yaz->id.'"  onclick="return confirm(\'Silmek İstediğinize Emin Misiniz?\');"><i class="fa fa-times"></i>  Sil</a></p>
											</div>
										</div>';
							}
						}
						if($sayfa=="yeni_slider"){ 
						?><div class="form-panel"> <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Slider Başlığı-TR" name="baslik_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Slider Başlığı-EN" name="baslik_en"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır1-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Satır1-TR" name="satir_1_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır1-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Satır1-EN" name="satir_1_en"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır2-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Satır2-TR" name="satir_2_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır2-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Satır2-EN" name="satir_2_en"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider İçeriği-TR</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="icerik_tr"> </textarea>
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider İçeriği-EN</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="icerik_en"> </textarea>
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input required  type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="slider_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10"><img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" /> </div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="slider_ekle_button">Gönder</button>								  
								  </div> 
							  </form>
						  </div><?php  if(isset($_POST["slider_ekle_button"])){
									
									$baslik_tr = $_POST['baslik_tr'];
									$baslik_en = $_POST['baslik_en'];
									
									$satir_1_tr = $_POST['satir_1_tr'];
									$satir_1_en = $_POST['satir_1_en'];
									
									$satir_2_en = $_POST['satir_2_en'];
									$satir_2_tr = $_POST['satir_2_tr']; 
									
									$icerik_tr = $_POST['icerik_tr'];
									$icerik_en = $_POST['icerik_en'];
									
									$toplam=mysql_num_rows(mysql_query("select * from slider"));
									
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['slider_resim']; // Form'dan yüklenen resim.
									
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/slider'; //Resmin Yükleneceği Klasör 
									$url=kucuk(url_duzenle($baslik_tr));

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 1920;
												$yukle->image_y               = 700;
											}
											$yukle->file_new_name_body = $url;
											$yukle->process($klasor);
											if($yukle->processed) { 
											$insert=mysql_query("insert into slider (baslik_tr,baslik_en,satir_1_tr,satir_1_en,satir_2_en,satir_2_tr,icerik_tr,icerik_en,url,resim,siralama) values	('$baslik_tr','$baslik_en','$satir_1_tr','$satir_1_en','$satir_2_en','$satir_2_tr','$icerik_tr','$icerik_en','$url','$yukle->file_dst_name','$toplam')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=slider';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=yeni_slider';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=yeni_slider';</script>";
											}
										}
										}else{
											echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=yeni_slider';</script>";
										}
								}
						}
						if($sayfa=="slider_duzenle"){
							$id=$_GET["id"];  
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from slider where id='$id'"));
							?><div class="form-panel">  
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır1-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->satir_1_tr;?>" name="satir_1_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır1-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->satir_1_en;?>" name="satir_1_en"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır2-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->satir_2_tr;?>" name="satir_2_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Satır2-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->satir_2_en;?>" name="satir_2_en"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider İçeriği-TR</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea>
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider İçeriği-EN</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea>
									  </div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="slider_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<img title="Yeni Resim" src="../upload/slider/<?php echo $duzenle_yaz->resim;?>"  width="100px" />  -> 
										<img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırpma</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="guncelle">Güncelle</button>								  
								  </div> 
							  </form>
							  
						  </div><?php  if(isset($_POST["guncelle"])){ 
							
								$baslik_tr = $_POST['baslik_tr'];
								$baslik_en = $_POST['baslik_en'];
								
								$satir_1_tr = $_POST['satir_1_tr'];
								$satir_1_en = $_POST['satir_1_en'];
								
								$satir_2_en = $_POST['satir_2_en'];
								$satir_2_tr = $_POST['satir_2_tr']; 
								
								$icerik_tr = $_POST['icerik_tr'];
								$icerik_en = $_POST['icerik_en'];
								
								$kırp = $_POST['kırp'];  
								
								$resim = $_FILES['slider_resim']; // Form'dan yüklenen resim.
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/slider'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr)); 
								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
									$yukle->file_new_name_body = $url;
									$yukle->process($klasor);
										if($yukle->processed) {
										unlink($klasor."/".$duzenle_yaz->resim);
										$update=mysql_query("UPDATE slider SET baslik_tr='$baslik_tr',baslik_en='$baslik_en',
																				satir_1_tr='$satir_1_tr',satir_1_en='$satir_1_en',
																				satir_2_en='$satir_2_en',satir_2_tr='$satir_2_tr',
																				icerik_tr='$icerik_tr',icerik_en='$icerik_en',
																				url='$url',resim='$yukle->file_dst_name'
																				where id='$id'"); 
										
											if($update){
												echo '<script>alert("Güncelleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=slider';</script>";
											}else{
												echo '<script>alert("Güncelleme Başarısız");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Güncelleme Başarısız.2 '.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>";
										}
									}
								}else{
									$update2=mysql_query("UPDATE slider SET baslik_tr='$baslik_tr',baslik_en='$baslik_en',
																				satir_1_tr='$satir_1_tr',satir_1_en='$satir_1_en',
																				satir_2_en='$satir_2_en',satir_2_tr='$satir_2_tr',
																				icerik_tr='$icerik_tr',icerik_en='$icerik_en',
																				url='$url' where id='$id'"); 
									if($update2){
										echo '<script>alert("Güncelleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=slider';</script>";
									}else{
										echo '<script>alert("Güncelleme Başarısız'.mysql_error().'");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>"; 
									}
								}
							}
						}
						if($sayfa=="slider_sil"){
							$id=$_GET["id"];
							$sil=mysql_fetch_object(mysql_query("select * from slider where id='$id'"));
							$del  = mysql_query("delete from slider where id='$id'");
							if($sil->resim!="bos.jpg"){ 
								unlink("../upload/slider/$sil->resim");
							}
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=slider";</script>'; 
						}
 						
						if($sayfa=="makale"){
						?><div class="content-panel"> 
							  <section id="unseen"> 
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM makaleler order by id desc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM makaleler ORDER BY id desc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=makale";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Makale Başlığı</th><th>Makale Resmi</th><th>Makale İçerik</th><th>İşlemler</th></tr></thead>
								<tbody> 
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
								if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
								$gelen['icerik_tr'] .="";
								}
								?>
									<tr>
									<td scope="row"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/makaleler/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=makale_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Okunmadı Olarak İşaretlemek İstediğinize Emin Misiniz?");' href='index.php?sayfa=makale_sil&id=<?php echo $gelen["id"];?>'  onclick='return confirm(\"Silmek İstediğinize Emin Misiniz?\");'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div><li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=makale&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=makale&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=makale&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=makale&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=makale&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=makale&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }
						if($sayfa=="makale_ekle"){  
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-TR" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-EN" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"></textarea></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori</label>
									  <div class="col-sm-10"> <select name="kategori"> 
										<hr><?php 
										$kat_sorgu=mysql_query("select * from makaleler_kategori order by id desc");
										while($kat_yaz=mysql_fetch_object($kat_sorgu)){
											echo "<option value=".$kat_yaz->url.">".buyuk($kat_yaz->baslik_tr)."</option>";
										}
										?>
										</select></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="makale_kategori_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["makale_kategori_ekle"])){
									$baslik_tr = buyuk($_POST['baslik_tr']); 
									$baslik_en = buyuk($_POST['baslik_en']); 
									$icerik_tr =  ($_POST['icerik_tr']); 
									$icerik_en =  ($_POST['icerik_en']); 
									$kategori =  ($_POST['kategori']); 
									$tarih=date("d/m/Y");
									$toplam=mysql_num_rows(mysql_query("select * from makaleler"));
									
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['resim']; // Form'dan yüklenen resim.
									
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/makaleler'; //Resmin Yükleneceği Klasör 
									$url=kucuk(url_duzenle($baslik_tr));

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 1920;
												$yukle->image_y               = 700;
											}
											$yukle->file_new_name_body = $url;
											$yukle->process($klasor);
											if($yukle->processed) { 
											//$durum = oturumdaki kullanıcı adı
											$insert=mysql_query("insert into makaleler  ( baslik_tr  ,baslik_en   ,icerik_tr   ,icerik_en   ,kategori   ,yazar   ,tarih   ,url   ,resim) 
																				 values ('$baslik_tr','$baslik_en','$icerik_tr','$icerik_en','$kategori','$durum','$tarih','$url','$yukle->file_dst_name')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=makale';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
											}
										}
									}else{
										echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
									}
								}
						}
						if($sayfa=="makale_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from makaleler where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori</label>
									  <div class="col-sm-10"> <select name="kategori"> 
										<hr><?php 
										$kat_sorgu=mysql_query("select * from makaleler_kategori order by id desc");
										while($kat_yaz=mysql_fetch_object($kat_sorgu)){ 
											if($kat_yaz->url == $duzenle_yaz->kategori)$select="selected"; else $select="";
											echo "<option value=".$kat_yaz->url." $select>".buyuk($kat_yaz->baslik_tr)."</option>";
										}
										?>
										</select></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim"  src="../upload/makaleler/<?php echo $duzenle_yaz->resim;?>"  width="100px" /> ->
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="makale_kategori_duzenle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["makale_kategori_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$kategori =  ($_POST['kategori']); 
								$tarih=date("d/m/Y");
								$toplam=mysql_num_rows(mysql_query("select * from makaleler"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/makaleler'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1400;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) { 
										//$durum = oturumdaki kullanıcı adı
										unlink($klasor."/".$duzenle_yaz->resim);
										$insert1=mysql_query("UPDATE makaleler set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',kategori='$kategori',yazar='$durum',tarih='$tarih',url='$url',resim='$yukle->file_dst_name'   where id='$id'"); 
											if($insert1){
												echo '<script>alert("Düzenleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=makale';</script>";
											}else{
												echo "<script>alert('Düzenleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Düzenleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
										}
									}
								}else{
									$insert2=mysql_query("UPDATE makaleler set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',kategori='$kategori',yazar='$durum',tarih='$tarih',url='$url' where id='$id'"); 
									if($insert2){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=makale';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız-');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_ekle';</script>";
										$yukle->clean();
									}
								}
							}
							 
							
						}
						if($sayfa=="makale_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from makaleler where id='$id'"));
							unlink("../upload/makaleler/".$sil_yaz->resim);
							$del  = mysql_query("delete from makaleler where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=makale";</script>'; 
						}
						
						if($sayfa=="makale_kategori"){
							?><div class="content-panel"> 
								  <section id="unseen"> 
								  <table class="table table-bordered table-striped table-condensed">
									<?php
									$limit = 10;
									$sira=1;
									$page = @$_GET["page"];
									if(empty($page) or !is_numeric($page)) { $page = 1; }
									if($page>1) $sira+=$limit*$page-$limit;
										$count			 = mysql_num_rows(mysql_query("SELECT id FROM makaleler_kategori order by id desc"));
										$toplamsayfa	 = ceil($count / $limit);
										$baslangic		 = ($page-1)*$limit;
									$yazdir_sorgu = mysql_query("SELECT * FROM makaleler_kategori ORDER BY id desc LIMIT $baslangic,$limit") or die(mysql_error());
									if(mysql_num_rows($yazdir_sorgu)=="0"){
										if($toplamsayfa == 0 ){ 
											echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
										}else{
											if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=makale_kategori";</script>';
										}
									}else{
									?>
									<thead><tr><th>Sıra</th><th>Makale Kategori Başlığı</th>  <th>İşlemler</th></tr></thead>
									<tbody> 
									<?php
									while ($gelen = mysql_fetch_array($yazdir_sorgu)){ 
									?>
										<tr>
										<td scope="row"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
										<td><?php echo $gelen['baslik_tr']; ?></td>    
										<td><a href='index.php?sayfa=makale_kategori_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=makale_kategori_sil&id=<?php echo $gelen["id"];?>'  onclick='return confirm(\"Silmek İstediğinize Emin Misiniz?\");'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
										</tr>
									<?php }  } 
									?> </tbody></table> 
								  </section>
							  </div><li class="paginationpagination"><ul>
								<?php
								if($page<=$toplamsayfa){
									if($count > $limit) :
										$x = 2;
										$lastP = ceil($count/$limit);
									if($page > 1){
										$onceki = $page-1;
										echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=makale_kategori&page=$onceki'> &#171; </a></li>";
									}
									if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
									else echo "<li><a href='index.php?sayfa=makale_kategori&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
									if($page-$x > 2) {
										echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
										$i = $page-$x;
									} else {
										$i = 2;
									}
									for($i; $i<=$page+$x; $i++) {
										if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
										else echo "<li><a href='index.php?sayfa=makale_kategori&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
										if($i==$lastP) break;
									}
									if($page+$x < $lastP-1) {
										echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
										echo "<li><a href='index.php?sayfa=makale_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
									} elseif($page+$x == $lastP-1) {
										echo "<li><a href='index.php?sayfa=makale_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
									}
									if($page < $lastP){
										$sonraki = $page+1;
										echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=makale_kategori&page=$sonraki'> &#187; </a></li>";
									}
									endif;
								}
								?>
								</ul></li> <?php  }
						if($sayfa=="makale_kategori_ekle"){  
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-TR" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-EN" name="baslik_en"></div>
								  </div>
								  
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="makale_kategori_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["makale_kategori_ekle"])){
									$baslik_tr = buyuk($_POST['baslik_tr']); 
									$baslik_en = buyuk($_POST['baslik_en']);
									$url=kucuk(url_duzenle($baslik_tr));
									$insert=mysql_query("insert into makaleler_kategori  ( baslik_tr,baslik_en,url)values ('$baslik_tr','$baslik_en','$url')"); 
									if($insert){
										echo '<script>alert("Ekleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_kategori';</script>";
									}else{
										echo "<script>alert('Ekleme Başarısız');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_kategori_ekle';</script>";
										$yukle->clean();
									}
								}
						}
						if($sayfa=="makale_kategori_sil"){
							$id=$_GET["id"]; 
							$del  = mysql_query("delete from makaleler_kategori where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=makale_kategori";</script>'; 
						}						
						if($sayfa=="makale_kategori_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from makaleler_kategori where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="makale_kategori_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["makale_kategori_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']);  
								$url=kucuk(url_duzenle($baslik_tr));

								$insert1=mysql_query("UPDATE makaleler_kategori set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',url='$url'  where id='$id'"); 
									if($insert1){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_kategori';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=makale_kategori_duzenle&id=".$id."';</script>";
										$yukle->clean();
									}
							}
							 
							
						}
						
						if($sayfa=="ekibimiz"){
							$slider_sorgu=mysql_query("select * from ekibimiz order by id desc");
							while($slider_yaz=mysql_fetch_object($slider_sorgu)){
								echo  ' <div class="col-lg-4 col-md-4 col-sm-4 mb">
											<div class="content-panel pn">
												<div id="spotify" style="background:url(../upload/ekibimiz/'.$slider_yaz->resim.') no-repeat scroll center center / 100% auto;; ">
													<div class="sp-title"><h3 style="color: rgb(255, 215, 119); background-color: black;">'.$slider_yaz->ad_soyad.'</h3></div> 
												</div>
												<p class="followers" style="text-align:center;">
													<a href="index.php?sayfa=ekibimiz_duzenle&id='.$slider_yaz->id.'"><i class="fa fa-edit"></i> Düzenle</a>
													<a href="index.php?sayfa=ekibimiz_sil&id='.$slider_yaz->id.'"  onclick="return confirm(\'Silmek İstediğinize Emin Misiniz?\');"><i class="fa fa-times"></i>  Sil</a></p>
											</div>
										</div>';
							}
						}
						if($sayfa=="ekibimiz_duzenle"){
							$id=$_GET["id"];  
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from ekibimiz where id='$id'"));
							?><div class="form-panel">  
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Ad Soyad</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->ad_soyad;?>" name="ekibimiz_ad_soyad"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Görevi</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->gorevi;?>" name="ekibimiz_gorevi"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hakkında</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="ekibimiz_icerik"> <?php echo $duzenle_yaz->icerik;?></textarea>
									  </div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="ekibimiz_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<img title="Yeni Resim" src="../upload/ekibimiz/<?php echo $duzenle_yaz->resim;?>"  width="100px" />  -> 
										<img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırpma</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="guncelle">Güncelle</button>								  
								  </div> 
							  </form>
							  
						  </div><?php  if(isset($_POST["guncelle"])){ 
							
								$ekibimiz_ad_soyad = $_POST['ekibimiz_ad_soyad'];
								$ekibimiz_gorevi = $_POST['ekibimiz_gorevi']; 								
								$ekibimiz_icerik = $_POST['ekibimiz_icerik'];  
								$kırp = $_POST['kırp'];   
								$resim = $_FILES['ekibimiz_resim']; // Form'dan yüklenen resim.
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/ekibimiz'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($ekibimiz_ad_soyad)); 
								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 480;
											$yukle->image_y               = 635;
										}
									$yukle->file_new_name_body = $url;
									$yukle->process($klasor);
										if($yukle->processed) {
										unlink($klasor."/".$duzenle_yaz->resim);
										$update=mysql_query("UPDATE ekibimiz SET ad_soyad='$ekibimiz_ad_soyad',gorevi='$ekibimiz_gorevi',icerik='$ekibimiz_icerik',url='$url',resim='$yukle->file_dst_name' where id='$id'"); 
											if($update){
												echo '<script>alert("Güncelleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz';</script>";
											}else{
												echo '<script>alert("Güncelleme Başarısız");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Güncelleme Başarısız.2 '.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>";
										}
									}
								}else{
									$update2=mysql_query("UPDATE ekibimiz SET ad_soyad='$ekibimiz_ad_soyad',gorevi='$ekibimiz_gorevi',icerik='$ekibimiz_icerik',url='$url'  where id='$id'"); 
									if($update2){
										echo '<script>alert("Güncelleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz';</script>";
									}else{
										echo '<script>alert("Güncelleme Başarısız'.mysql_error().'");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=slider_duzenle&id=".$id."';</script>"; 
									}
								}
							}
						}
						if($sayfa=="ekibimiz_ekle"){  
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Ad Soyad</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Ad Soyad" name="ekibimiz_ad_soyad"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Görevi</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Görevi" name="ekibimiz_gorevi"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hakkında</label>
									  <div class="col-sm-10">
										  <textarea class="ckeditor" required  name="ekibimiz_icerik"> </textarea>
									  </div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="ekibimiz_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırpma</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="ekibimiz_ekle_button">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["ekibimiz_ekle_button"])){
									$ekibimiz_ad_soyad = ($_POST['ekibimiz_ad_soyad']); 
									$ekibimiz_gorevi =  ($_POST['ekibimiz_gorevi']); 
									$ekibimiz_icerik =  ($_POST['ekibimiz_icerik']); 
									$toplam=mysql_num_rows(mysql_query("select * from ekibimiz")); 
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['ekibimiz_resim']; // Form'dan yüklenen resim.
									
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/ekibimiz'; //Resmin Yükleneceği Klasör 
									$url=kucuk(url_duzenle($ekibimiz_ad_soyad));

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 1920;
												$yukle->image_y               = 700;
											}
											$yukle->file_new_name_body = $url;
											$yukle->process($klasor);
											if($yukle->processed) { 
											//$durum = oturumdaki kullanıcı adı
											$insert=mysql_query("insert into ekibimiz  ( ad_soyad,gorevi,icerik,url,resim)values ('$ekibimiz_ad_soyad','$ekibimiz_gorevi','$ekibimiz_icerik','$url','$yukle->file_dst_name')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz_ekle';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz_ekle';</script>";
											}
										}
									}else{
										echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=ekibimiz_ekle';</script>";
									}
								}
						}
						if($sayfa=="ekibimiz_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from ekibimiz where id='$id'"));
							unlink("../upload/ekibimiz/".$sil_yaz->resim);
							$del  = mysql_query("delete from ekibimiz where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=ekibimiz";</script>'; 
						}
						
						if($sayfa=="donanimlarimiz"){
						?><div class="content-panel"> 
							  <section id="unseen"> 
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM donanimlarimiz order by siralama asc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM donanimlarimiz ORDER BY siralama asc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=donanimlarimiz";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Donanımlarımız Başlığı</th><th>Donanımlarımız Resmi</th><th>Donanımlarımız İçerik</th><th>İşlemler</th></tr></thead>
								<tbody id="sortable">
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
									if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
									$gelen['icerik_tr'] .="";
								}
								?>
									<tr id="item-<?php echo $gelen['id']?>">
									<td class="sortable"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/donanimlarimiz/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=donanimlarimiz_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=donanimlarimiz_sil&id=<?php echo $gelen["id"];?>'   ><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div> <script type="text/javascript">
							$(function() {
								$( "#sortable" ).sortable({
									revert: true,
									handle: ".sortable",
									stop: function (event, ui) {
										var data = $(this).sortable('serialize'); 
										$.ajax({
											type: "POST",
											dataType: "json",
											data: data,
											url: "siralama.php?p=donanimlarimiz",
											success: function(msg){
												alert( msg.donanimlarimizSiralaIslemMsj );
											}
										});	                      				
									}
								});
								$( "#sortable" ).disableSelection();	                      		
							});	                      	
							</script>	 <li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=donanimlarimiz&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=donanimlarimiz&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=donanimlarimiz&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=donanimlarimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=donanimlarimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=donanimlarimiz&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }
						if($sayfa=="donanimlarimiz_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from donanimlarimiz where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Donanımlarımız Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Donanımlarımız Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim"  src="../upload/donanimlarimiz/<?php echo $duzenle_yaz->resim;?>"  width="100px" />
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="donanimlarimiz_kategori_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["donanimlarimiz_kategori_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from donanimlarimiz"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/donanimlarimiz'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) { 
										//$durum = oturumdaki kullanıcı adı
										unlink($klasor."/".$duzenle_yaz->resim);
										$insert1=mysql_query("UPDATE donanimlarimiz set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url',resim='$yukle->file_dst_name'   where id='$id'"); 
											if($insert1){
												echo '<script>alert("Düzenleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz';</script>";
											}else{
												echo "<script>alert('Düzenleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Düzenleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
										}
									}
								}else{
									$insert2=mysql_query("UPDATE donanimlarimiz set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url'   where id='$id'"); 
									if($insert2){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız-');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
										$yukle->clean();
									}
								}
							}
							 
							
						}
						if($sayfa=="donanimlarimiz_ekle"){ 
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Donanımlarımız Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" required name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Donanımlarımız Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  required name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr" required>  </textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en" required> </textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="donanimlarimiz_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["donanimlarimiz_ekle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from donanimlarimiz"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/donanimlarimiz'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) {  
										$insert=mysql_query("insert into donanimlarimiz  (baslik_tr,baslik_en,icerik_tr,icerik_en,url,resim,siralama) values ('$baslik_tr', '$baslik_en','$icerik_tr','$icerik_en','$url','$yukle->file_dst_name','$toplam') "); 
											if($insert){
												echo '<script>alert("Ekleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz';</script>";
											}else{
												echo "<script>alert('Ekleme Başarısız');</script>";
												//echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
												echo mysql_error();
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Ekleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
										}
									}
								}else{
									echo "<script>alert('Resim Eklemek Zorundasınız.');</script>";
									echo "<script language='javascript'>location.href='index.php?sayfa=donanimlarimiz_ekle';</script>";
								}
							}
							 
							
						}
						if($sayfa=="donanimlarimiz_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from donanimlarimiz where id='$id'"));
							unlink("../upload/donanimlarimiz/".$sil_yaz->resim);
							$del  = mysql_query("delete from donanimlarimiz where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=donanimlarimiz";</script>'; 
						}

						if($sayfa=="operasyonlar"){
						?><div class="content-panel"> 
							  <section id="unseen"> 
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM operasyonlar order by siralama asc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM operasyonlar ORDER BY siralama asc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=operasyonlar";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Donanımlarımız Başlığı</th><th>Donanımlarımız Resmi</th><th>Donanımlarımız İçerik</th><th>İşlemler</th></tr></thead>
								<tbody id="sortable">
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
								if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
								$gelen['icerik_tr'] .="";
								}
								?>
									<tr id="item-<?php echo $gelen['id']?>">
									<td class="sortable"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/operasyonlar/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=operasyonlar_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=operasyonlar_sil&id=<?php echo $gelen["id"];?>'   ><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div> <script type="text/javascript">
							$(function() {
								$( "#sortable" ).sortable({
									revert: true,
									handle: ".sortable",
									stop: function (event, ui) {
										var data = $(this).sortable('serialize'); 
										$.ajax({
											type: "POST",
											dataType: "json",
											data: data,
											url: "siralama.php?p=operasyonlar",
											success: function(msg){
												alert( msg.operasyonlarSiralaIslemMsj );
											}
										});	                      				
									}
								});
								$( "#sortable" ).disableSelection();	                      		
							});	                      	
							</script>	  <li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=operasyonlar&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=operasyonlar&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=operasyonlar&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=operasyonlar&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=operasyonlar&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=operasyonlar&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }
						if($sayfa=="operasyonlar_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from operasyonlar where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Operasyonlar Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Operasyonlar Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim"  src="../upload/operasyonlar/<?php echo $duzenle_yaz->resim;?>"  width="100px" />
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="operasyonlar_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["operasyonlar_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from operasyonlar"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/operasyonlar'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) { 
										//$durum = oturumdaki kullanıcı adı
										unlink($klasor."/".$duzenle_yaz->resim);
										$insert1=mysql_query("UPDATE operasyonlar set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url',resim='$yukle->file_dst_name'   where id='$id'"); 
											if($insert1){
												echo '<script>alert("Düzenleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar';</script>";
											}else{
												echo "<script>alert('Düzenleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Düzenleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
										}
									}
								}else{
									$insert2=mysql_query("UPDATE operasyonlar set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url'   where id='$id'"); 
									if($insert2){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız-');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
										$yukle->clean();
									}
								}
							}
							 
							
						}
						if($sayfa=="operasyonlar_ekle"){ 
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Operasyonlar Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" required name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Operasyonlar Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  required name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr" required>  </textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en" required> </textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
								  </div> 
									  <button type="submit" class="btn btn-theme" name="operasyonlar_ekle">Ekle</button>								  
							  </form>
						  </div><?php   if(isset($_POST["operasyonlar_ekle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from operasyonlar"));
								$tarih=date("d/m/Y");
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/operasyonlar'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) {  
										$insert=mysql_query("insert into operasyonlar  (baslik_tr,baslik_en,icerik_tr,icerik_en,url,resim,siralama,tarih) values ('$baslik_tr', '$baslik_en','$icerik_tr','$icerik_en','$url','$yukle->file_dst_name','$toplam','$tarih') "); 
											if($insert){
												echo '<script>alert("Ekleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar';</script>";
											}else{
												echo "<script>alert('Ekleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Ekleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
										}
									}
								}else{
									echo "<script>alert('Resim Eklemek Zorundasınız.');</script>";
									echo "<script language='javascript'>location.href='index.php?sayfa=operasyonlar_ekle';</script>";
								}
							}
						}
						if($sayfa=="operasyonlar_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from operasyonlar where id='$id'"));
							unlink("../upload/operasyonlar/".$sil_yaz->resim);
							$del  = mysql_query("delete from operasyonlar where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=operasyonlar";</script>'; 
						}
						
						if($sayfa=="kurumsal"){  
						?> <div class="content-panel"> 
							  <section id="unseen"> 
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM kurumsal order by siralama asc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM kurumsal ORDER BY siralama asc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=kurumsal";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Kurumsal Başlığı</th><th>Kurumsal  Resmi</th><th>Kurumsal İçerik</th><th>İşlemler</th></tr></thead>
								<tbody id="sortable">
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
								if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
								$gelen['icerik_tr'] .="";
								}
								?>
									<tr id="item-<?php echo $gelen['id']?>">
									<td class="sortable"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/kurumsal/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=kurumsal_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=kurumsal_sil&id=<?php echo $gelen["id"];?>'   ><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div> <script type="text/javascript">
							$(function() {
								$( "#sortable" ).sortable({
									revert: true,
									handle: ".sortable",
									stop: function (event, ui) {
										var data = $(this).sortable('serialize'); 
										$.ajax({
											type: "POST",
											dataType: "json",
											data: data,
											url: "siralama.php?p=kurumsal",
											success: function(msg){
												alert( msg.kurumsalSiralaIslemMsj );
											}
										});	                      				
									}
								});
								$( "#sortable" ).disableSelection();	                      		
							});	                      	
							</script>	  <li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=kurumsal&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=kurumsal&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=kurumsal&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=kurumsal&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=kurumsal&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=kurumsal&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }
						if($sayfa=="kurumsal_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from kurumsal where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kurumsal Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kurumsal Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim"  src="../upload/kurumsal/<?php echo $duzenle_yaz->resim;?>"  width="100px" />
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="kurumsal_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["kurumsal_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from kurumsal"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/kurumsal'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) { 
										//$durum = oturumdaki kullanıcı adı
										unlink($klasor."/".$duzenle_yaz->resim);
										$insert1=mysql_query("UPDATE kurumsal set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url',resim='$yukle->file_dst_name'   where id='$id'"); 
											if($insert1){
												echo '<script>alert("Düzenleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal';</script>";
											}else{
												echo "<script>alert('Düzenleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Düzenleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
										}
									}
								}else{
									$insert2=mysql_query("UPDATE kurumsal set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',url='$url'   where id='$id'"); 
									if($insert2){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız-');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
										$yukle->clean();
									}
								}
							}
							 
							
						}
						if($sayfa=="kurumsal_ekle"){ 
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kurumsal Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" required name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kurumsal Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  required name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr" required>  </textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en" required> </textarea></div>
								  </div>  
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
								  </div> 
									  <button type="submit" class="btn btn-theme" name="kurumsal_ekle">Ekle</button>								  
							  </form>
						  </div><?php   if(isset($_POST["kurumsal_ekle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$toplam=mysql_num_rows(mysql_query("select * from kurumsal"));
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/kurumsal'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) {  
										$insert=mysql_query("insert into kurumsal  (baslik_tr,baslik_en,icerik_tr,icerik_en,url,resim,siralama) values ('$baslik_tr', '$baslik_en','$icerik_tr','$icerik_en','$url','$yukle->file_dst_name','$toplam') "); 
											if($insert){
												echo '<script>alert("Ekleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal';</script>";
											}else{
												echo "<script>alert('Ekleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Ekleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
										}
									}
								}else{
									echo "<script>alert('Resim Eklemek Zorundasınız.');</script>";
									echo "<script language='javascript'>location.href='index.php?sayfa=kurumsal_ekle';</script>";
								}
							}
						}
						if($sayfa=="kurumsal_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from kurumsal where id='$id'"));
							unlink("../upload/kurumsal/".$sil_yaz->resim);
							$del  = mysql_query("delete from kurumsal where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=kurumsal";</script>'; 
						}
						
						if($sayfa=="hizmetlerimiz"){
							$sirala_kat=isset($_GET["sirala_kat"]) ? $_GET["sirala_kat"]:"";
						?><select ONCHANGE="location=this.options[this.selectedIndex].value;">
						<option value="index.php?sayfa=hizmetlerimiz">Kategoriye Göre Kısıtlayın</option>
						<?php 
								$kat_sorgu=mysql_query("select * from hizmetlerimiz_kategori ");
								while($kat_yaz=mysql_fetch_object($kat_sorgu)){
									if($sirala_kat == $kat_yaz->id)$select="selected"; else $select="";
									echo "<option value='index.php?sayfa=hizmetlerimiz&sirala_kat=$kat_yaz->id'   $select>$kat_yaz->kategori_ismi_tr</option>";
								}
							?> </select><?php  
								if(!$sirala_kat){?>
						<div class="content-panel"> 
							  <section id="unseen">
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM hizmetlerimiz order by id desc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM hizmetlerimiz ORDER BY id desc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=hizmetlerimiz";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Hizmetlerimiz Başlığı</th><th>Hizmetlerimiz Resmi</th><th>Hizmetlerimiz İçerik</th><th>İşlemler</th></tr></thead>
								<tbody> 
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
								if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
								$gelen['icerik_tr'] .="";
								}
								?>
									<tr>
									<td scope="row"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/hizmetlerimiz/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=hizmetlerimiz_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=hizmetlerimiz_sil&id=<?php echo $gelen["id"];?>'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div><li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=hizmetlerimiz&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=hizmetlerimiz&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }else{
								echo "<h1>".mysql_fetch_object(mysql_query("select * from hizmetlerimiz_kategori where id='$sirala_kat'"))->kategori_ismi_tr."</h1>";
								?>
							<div class="content-panel"> 
							  <section id="unseen">
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM hizmetlerimiz where kategori_id='$sirala_kat' order by siralama asc "));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM hizmetlerimiz where kategori_id='$sirala_kat' ORDER BY siralama asc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=hizmetlerimiz";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Hizmetlerimiz Başlığı</th><th>Hizmetlerimiz Resmi</th><th>Hizmetlerimiz İçerik</th><th>İşlemler</th></tr></thead>
								<tbody id="sortable">
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){
									$gelen['icerik_tr']=strip_tags($gelen['icerik_tr']);
								if(strlen($gelen['icerik_tr'])>=50){
								if(preg_match('/(.*?)\s/i',substr($gelen['icerik_tr'],50),$dizi))$gelen['icerik_tr']=substr($gelen['icerik_tr'],0,50+strlen($dizi[0]))."...";  
								}else{
								$gelen['icerik_tr'] .="";
								}
								?>
									<tr id="item-<?php echo $gelen['id']?>">
									<td class="sortable"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['baslik_tr']; ?></td>
									<td><img src="../upload/hizmetlerimiz/<?php echo $gelen['resim']; ?>" width="40%"></td>  
									<td><?php echo $gelen['icerik_tr']; ?>...</td>
									<td><a href='index.php?sayfa=hizmetlerimiz_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=hizmetlerimiz_sil&id=<?php echo $gelen["id"];?>'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div>
						  
						  <script type="text/javascript">
							$(function() {
								$( "#sortable" ).sortable({
									revert: true,
									handle: ".sortable",
									stop: function (event, ui) {
										var data = $(this).sortable('serialize'); 
										$.ajax({
											type: "POST",
											dataType: "json",
											data: data,
											url: "siralama.php?p=hizmetlerimiz",
											success: function(msg){
												alert( msg.hizmetlerimizSiralaIslemMsj );
											}
										});	                      				
									}
								});
								$( "#sortable" ).disableSelection();	                      		
							});	                      	
							</script> 
						  <li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=hizmetlerimiz&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=hizmetlerimiz&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=hizmetlerimiz&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php
								}
							
							}
						if($sayfa=="hizmetlerimiz_ekle"){  
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hizmetlerimiz Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-TR" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hizmetlerimiz Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Proje Başlığı-EN" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"></textarea></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Makale Kategori</label>
									  <div class="col-sm-10"> <select name="kategori"> 
										<hr><?php 
										$kat_sorgu=mysql_query("select * from hizmetlerimiz_kategori order by id desc");
										while($kat_yaz=mysql_fetch_object($kat_sorgu)){
											echo "<option value=".$kat_yaz->id.">".buyuk($kat_yaz->kategori_ismi_tr)."</option>";
										}
										?>
										</select></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="hizmetlerimiz_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["hizmetlerimiz_ekle"])){
									$baslik_tr = buyuk($_POST['baslik_tr']); 
									$baslik_en = buyuk($_POST['baslik_en']); 
									$icerik_tr =  ($_POST['icerik_tr']); 
									$icerik_en =  ($_POST['icerik_en']); 
									$kategori =  ($_POST['kategori']); 
									$tarih=date("d/m/Y");
									$toplam=mysql_num_rows(mysql_query("select * from hizmetlerimiz"));
									
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['resim']; // Form'dan yüklenen resim.
									
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/hizmetlerimiz'; //Resmin Yükleneceği Klasör 
									$url=kucuk(url_duzenle($baslik_tr));

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 1920;
												$yukle->image_y               = 700;
											}
											$yukle->file_new_name_body = $url;
											$yukle->process($klasor);
											if($yukle->processed) { 
											//$durum = oturumdaki kullanıcı adı
											$insert=mysql_query("insert into hizmetlerimiz  ( baslik_tr  ,baslik_en   ,icerik_tr   ,icerik_en   ,kategori_id      ,tarih   ,url   ,resim,siralama) 
																				 values ('$baslik_tr','$baslik_en','$icerik_tr','$icerik_en','$kategori','$tarih','$url','$yukle->file_dst_name','$toplam')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_ekle';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_ekle';</script>";
											}
										}
									}else{
										echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_ekle';</script>";
									}
								}
						}
						if($sayfa=="hizmetlerimiz_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from hizmetlerimiz where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-TR</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_tr"> <?php echo $duzenle_yaz->icerik_tr;?></textarea></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">İçerik-EN</label>
									  <div class="col-sm-10"><textarea class="ckeditor" required type="text" name="icerik_en"> <?php echo $duzenle_yaz->icerik_en;?></textarea></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hizmetlerimiz Kategori</label>
									  <div class="col-sm-10"> <select name="kategori"> 
										<hr> 
										<?php 
										$kat_sorgu=mysql_query("select * from hizmetlerimiz_kategori order by id desc");
										while($kat_yaz=mysql_fetch_object($kat_sorgu)){
											if($kat_yaz->id == $duzenle_yaz->kategori_id)$select="selected"; else $select="";
											echo "<option value=".$kat_yaz->id."  $select>".buyuk($kat_yaz->kategori_ismi_tr)."</option>";
										}
										?>
										</select></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim"  src="../upload/hizmetlerimiz/<?php echo $duzenle_yaz->resim;?>"  width="100px" /> -> 
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="hizmetlerimiz_duzenle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["hizmetlerimiz_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']); 
								$icerik_tr =  ($_POST['icerik_tr']); 
								$icerik_en =  ($_POST['icerik_en']); 
								$kategori =  ($_POST['kategori']); 
								$tarih=date("d/m/Y");
								$toplam=mysql_num_rows(mysql_query("select * from hizmetlerimiz"));
								
								$kırp = $_POST['kırp'];  
								$resim = $_FILES['resim']; // Form'dan yüklenen resim.
								
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/hizmetlerimiz'; //Resmin Yükleneceği Klasör 
								$url=kucuk(url_duzenle($baslik_tr));

								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 1920;
											$yukle->image_y               = 700;
										}
										$yukle->file_new_name_body = $url;
										$yukle->process($klasor);
										if($yukle->processed) { 
										//$durum = oturumdaki kullanıcı adı
										unlink($klasor."/".$duzenle_yaz->resim);
										$insert1=mysql_query("UPDATE hizmetlerimiz set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',kategori_id='$kategori',tarih='$tarih',url='$url',resim='$yukle->file_dst_name'   where id='$id'"); 
											if($insert1){
												echo '<script>alert("Düzenleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz';</script>";
											}else{
												echo "<script>alert('Düzenleme Başarısız');</script>";
												echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_duzenle&id=".$id."';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Düzenleme Başarısız.'.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_duzenle&id=".$id."';</script>";
										}
									}
								}else{
									$insert2=mysql_query("UPDATE hizmetlerimiz set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',kategori_id='$kategori',tarih='$tarih',url='$url' where id='$id'");  
									if($insert2){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız-');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_duzenle&id=".$id."';</script>";
										$yukle->clean();
									}
								}
							}
							 
							
						}
						if($sayfa=="hizmetlerimiz_sil"){
							$id=$_GET["id"];
							$sil_yaz=mysql_fetch_object(mysql_query("select * from hizmetlerimiz where id='$id'"));
							unlink("../upload/hizmetlerimiz/".$sil_yaz->resim);
							$del  = mysql_query("delete from hizmetlerimiz where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=hizmetlerimiz";</script>'; 
						}
						
						if($sayfa=="hizmetlerimiz_kategori"){
						?><div class="content-panel"> 
							  <section id="unseen"> 
							  <table class="table table-bordered table-striped table-condensed">
								<?php
								$limit = 10;
								$sira=1;
								$page = @$_GET["page"];
								if(empty($page) or !is_numeric($page)) { $page = 1; }
								if($page>1) $sira+=$limit*$page-$limit;
									$count			 = mysql_num_rows(mysql_query("SELECT id FROM hizmetlerimiz_kategori order by siralama asc"));
									$toplamsayfa	 = ceil($count / $limit);
									$baslangic		 = ($page-1)*$limit;
								$yazdir_sorgu = mysql_query("SELECT * FROM hizmetlerimiz_kategori ORDER BY siralama asc LIMIT $baslangic,$limit") or die(mysql_error());
								if(mysql_num_rows($yazdir_sorgu)=="0"){
									if($toplamsayfa == 0 ){ 
										echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
									}else{
										if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=hizmetlerimiz_kategori";</script>';
									}
								}else{
								?>
								<thead><tr><th>Sıra</th><th>Kategori Başlığı</th> <th>İşlemler</th></tr></thead>
								<tbody id="sortable">
								<?php
								while ($gelen = mysql_fetch_array($yazdir_sorgu)){ 
								?>
									<tr id="item-<?php echo $gelen['id']?>">
									<td class="sortable"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
									<td><?php echo $gelen['kategori_ismi_tr']; ?></td> 
									<td><a href='index.php?sayfa=hizmetlerimiz_kategori_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a><a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=hizmetlerimiz_kategori_sil&id=<?php echo $gelen["id"];?>'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a></td> 
									</tr>
								<?php }  } 
								?> </tbody></table> 
							  </section>
						  </div> <script type="text/javascript">
							$(function() {
								$( "#sortable" ).sortable({
									revert: true,
									handle: ".sortable",
									stop: function (event, ui) {
										var data = $(this).sortable('serialize'); 
										$.ajax({
											type: "POST",
											dataType: "json",
											data: data,
											url: "siralama.php?p=hizmetlerimiz_kategori",
											success: function(msg){
												alert( msg.hizmetlerimiz_kategoriSiralaIslemMsj );
											}
										});	                      				
									}
								});
								$( "#sortable" ).disableSelection();	                      		
							});	                      	
							</script>	  <li class="paginationpagination"><ul>
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
									$x = 2;
									$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=hizmetlerimiz_kategori&page=$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
								else echo "<li><a href='index.php?sayfa=hizmetlerimiz_kategori&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
									else echo "<li><a href='index.php?sayfa=hizmetlerimiz_kategori&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
									echo "<li><a href='index.php?sayfa=hizmetlerimiz_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='index.php?sayfa=hizmetlerimiz_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=hizmetlerimiz_kategori&page=$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							</ul></li> <?php  }
						if($sayfa=="hizmetlerimiz_kategori_ekle"){  
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hizmetlerimiz Kategori Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Başlık-TR" name="baslik_tr"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Hizmetlerimiz Kategori Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Başlık-EN" name="baslik_en"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="hizmetlerimiz_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["hizmetlerimiz_ekle"])){
									$baslik_tr = buyuk($_POST['baslik_tr']); 
									$baslik_en = buyuk($_POST['baslik_en']); 
									$toplam=mysql_num_rows(mysql_query("select * from hizmetlerimiz_kategori"));
									$url=kucuk(url_duzenle($baslik_tr));
									$insert=mysql_query("insert into hizmetlerimiz_kategori (kategori_ismi_tr,kategori_ismi_en,url,siralama)values ('$baslik_tr','$baslik_en','$url','$toplam')"); 
										if($insert){
											echo '<script>alert("Ekleme Başarılı");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_kategori';</script>";
										}else{
											echo "<script>alert('Ekleme Başarısız');</script>";
											echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_kategori_ekle';</script>";
											$yukle->clean();
										}
								}
						}
						if($sayfa=="hizmetlerimiz_kategori_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from hizmetlerimiz_kategori where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->kategori_ismi_tr;?>" name="kategori_ismi_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Proje Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->kategori_ismi_en;?>" name="kategori_ismi_en"></div>
								  </div> 
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="hizmetlerimiz_kategori_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["hizmetlerimiz_kategori_duzenle"])){
								$kategori_ismi_tr = buyuk($_POST['kategori_ismi_tr']); 
								$kategori_ismi_en = buyuk($_POST['kategori_ismi_en']); 
								
								$url=kucuk(url_duzenle($kategori_ismi_tr));

								$insert1=mysql_query("UPDATE hizmetlerimiz_kategori set  kategori_ismi_tr='$kategori_ismi_tr',kategori_ismi_en='$kategori_ismi_en',url='$url'   where id='$id'"); 
									if($insert1){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_kategori';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=hizmetlerimiz_kategori_duzenle&id=".$id."';</script>";
										$yukle->clean();
									}
							}
							 
							
						}
						if($sayfa=="hizmetlerimiz_kategori_sil"){
							$id=$_GET["id"]; 
							$del  = mysql_query("delete from hizmetlerimiz_kategori where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=hizmetlerimiz_kategori";</script>'; 
						}
						
						if($sayfa=="slider_thumb"){
							$id=isset($_GET["id"])?$_GET["id"]: ""; 
							$resim_ekle=isset($_GET["resim_ekle"])?$_GET["resim_ekle"]:"";
							
							echo '<a href="index.php?sayfa=slider_thumb&id='.$id.'&resim_ekle=1" >Yeni Resim Ekle</a><br>';
							
							if($id and !$resim_ekle){
								$slider_sorgu=mysql_query("select * from slider_thumb where slider_id='$id' order by id desc");
								while($slider_yaz=mysql_fetch_object($slider_sorgu)){ 
									echo  '<div class="col-lg-4 col-md-4 col-sm-4 mb">
												<div class="content-panel pn">
													<div id="spotify" style="background:url(../upload/slider_thumb/'.$slider_yaz->resim.') no-repeat scroll center center / 100% auto;; "></div>
													<p class="followers" style="text-align:center;">
														<a href="index.php?sayfa=slider_thumb&id='.$id.'&resim_sil='.$slider_yaz->id.'"  onclick="return confirm(\'Silmek İstediğinize Emin Misiniz?\');"><i class="fa fa-times"></i>  Sil</a></p>
												</div>
											</div>';
								}
							}
							
							
							if($resim_ekle){ 
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post"> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Ekle</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="resim" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										 <img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 	
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırp</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="slider_thumb_ekle">Ekle</button>								  
								  </div> 
							  </form>
							</div><?php }  if(isset($_POST["slider_thumb_ekle"])){
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['resim']; // Form'dan yüklenen resim.
									$toplam=mysql_num_rows(mysql_query("select * from slider_thumb where slider_id='$id'"));
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/slider_thumb'; //Resmin Yükleneceği Klasör  

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 316;
												$yukle->image_y               = 227;
											}
											//$yukle->file_new_name_body = $url;
											$yukle->process($klasor);
											if($yukle->processed) { 
											//$durum = oturumdaki kullanıcı adı
											$insert=mysql_query("insert into slider_thumb (resim,siralama,slider_id)values ('$yukle->file_dst_name','$toplam','$id')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>'; 
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>"; 
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>'; 
											}
										}
									}else{
										echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
									}
									
										echo "<script language='javascript'>location.href='index.php?sayfa=slider_thumb&id=$id';</script>";
								}
						 
						

							
							$resim_sil=isset($_GET["resim_sil"])?$_GET["resim_sil"]:"";
							if($resim_sil){ 
								$sil_yaz=mysql_fetch_object(mysql_query("select * from slider_thumb where id='$resim_sil'"));
								unlink("../upload/slider_thumb/".$sil_yaz->resim);
								$del  = mysql_query("delete from slider_thumb where id='$resim_sil'");
								echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
								echo '<script type="text/javascript">location.href="index.php?sayfa=slider_thumb&id='.$id.'";</script>'; 
							}
						
						}
						
						if($sayfa=="galeri"){ 
							$galeri_kat_select=isset($_POST["galeri_kat_select"])?$_POST["galeri_kat_select"]:"";
							$galeri_kat=isset($_GET["galeri_kat"])?$_GET["galeri_kat"]:"";
							?><select ONCHANGE="location=this.options[this.selectedIndex].value;" name="galeri_kat_select">
								<option value="index.php?sayfa=galeri">Kategoriye Göre Kısıtlayın</option><?php 
								$galeri_kat_sorgu=mysql_query("select * from galeri_kategori ");
								while($galeri_kat_yaz=mysql_fetch_object($galeri_kat_sorgu)){
									if($galeri_kat == $galeri_kat_yaz->id)$select="selected"; else $select="";
									echo "<option value='index.php?sayfa=galeri&galeri_kat=$galeri_kat_yaz->id'   $select>$galeri_kat_yaz->baslik_tr</option>";
								}
							?> </select><br><br><?php
							if($galeri_kat){
								echo "<a href='?sayfa=galeri_resim_ekle&id=$galeri_kat'>Kategoriye Resim Ekle</a><br><br>";
								$slider_sorgu=mysql_query("select * from galeri where galeri_id='$galeri_kat' order by id desc");
							}else{
								$slider_sorgu=mysql_query("select * from galeri order by id desc"); 
							}
							while($slider_yaz=mysql_fetch_object($slider_sorgu)){ 
								$galeri_kat=mysql_fetch_object(mysql_query("select * from galeri_kategori where id='$slider_yaz->galeri_id'"));
								echo  ' <div class="col-lg-4 col-md-4 col-sm-4 mb">
											<div class="content-panel pn">
												<div id="spotify" style="background:url(../upload/galeri/'.$slider_yaz->resim.') no-repeat scroll center center / 100% auto;; ">
													<div class="sp-title"><h3 style="color: rgb(255, 215, 119); background-color: black;">'.$galeri_kat->baslik_tr.'</h3></div> 
												</div>
												<p class="followers" style="text-align:center;">
													<a href="index.php?sayfa=galeri_resim_duzenle&id='.$slider_yaz->id.'"><i class="fa fa-edit"></i> Düzenle</a>
													<a href="index.php?sayfa=galeri_resim_sil&id='.$slider_yaz->id.'"  onclick="return confirm(\'Silmek İstediğinize Emin Misiniz?\');"><i class="fa fa-times"></i>  Sil</a></p>
											</div>
										</div>';
							}
						}
						if($sayfa=="galeri_resim_ekle"){
							$id=isset($_GET["id"])?$_GET["id"]:"";
							$yaz=mysql_fetch_object(mysql_query("select * from galeri_kategori where id='$id'"));
						?><div class="form-panel"> <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								<?php if($id){?>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kategori  </label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $yaz->baslik_tr;?>" disabled></div>
								  </div> 
								<?php }else{?>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kategori  </label>
									  <div class="col-sm-10">
										  <select  class="form-control"  name="galeri_kat_id" id="galeri_kat_id">
											<?php 
												$sorgu=mysql_query("select * from galeri_kategori");
												while($yaz=mysql_fetch_object($sorgu)){
													echo "<option value='$yaz->id'>$yaz->baslik_tr</option>";
												}
											?>
										  </select> 
										</div> 									
								  </div> 									
								<?php } ?>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Başlık-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" name="baslik_tr" placeholder="Resim Başlık-TR"></div>
								  </div> 
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Başlık-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" name="baslik_en" placeholder="Resim Başlık-EN"></div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input required  type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="galeri_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10"><img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" /> </div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="galeri_ekle_button">Gönder</button>								  
								  </div> 
							  </form>
						  </div><?php  if(isset($_POST["galeri_ekle_button"])){ 
									$baslik_tr = $_POST['baslik_tr'];  
									$baslik_en = $_POST['baslik_en'];  
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['galeri_resim']; // Form'dan yüklenen resim.
									if(!$id){ 
										$id=$_POST['galeri_kat_id'];
									}
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/galeri'; //Resmin Yükleneceği Klasör  

									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 680;
												$yukle->image_y               = 400;
											} 
											$yukle->file_new_name_body = kucuk(url_duzenle($baslik_tr));
											$yukle->process($klasor);
											if($yukle->processed){
											$insert=mysql_query("insert into galeri (resim,galeri_id,baslik_tr,baslik_en)values('$yukle->file_dst_name','$id','$baslik_tr','$baslik_en')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=galeri';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_ekle&id=".$id."';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_ekle&id=".$id."';</script>";
											}
										}
									}else{
										echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_ekle&id=".$id."';</script>";
									}
								}
						}
						if($sayfa=="galeri_resim_duzenle"){
							$id=$_GET["id"];  
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from galeri where id='$id'"));
							?><div class="form-panel">  
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Başlığı-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="galeri_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<img title="Yeni Resim" src="../upload/galeri/<?php echo $duzenle_yaz->resim;?>"  width="100px" />  -> 
										<img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Kırpma</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="guncelle">Güncelle</button>								  
								  </div> 
							  </form>
							  
						  </div><?php  if(isset($_POST["guncelle"])){ 
							
								$baslik_tr = $_POST['baslik_tr'];
								$baslik_en = $_POST['baslik_en'];
								$kırp = $_POST['kırp'];  
								
								$resim = $_FILES['galeri_resim']; // Form'dan yüklenen resim.
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload/galeri'; //Resmin Yükleneceği Klasör  
								if($resim["name"]!=""){
									if ($yukle->uploaded){
										if($kırp==1){
											$yukle->image_resize          = true;
											$yukle->image_ratio_fill      = true;
											$yukle->image_x               = 680;
											$yukle->image_y               = 400;
										}
									$yukle->file_new_name_body = kucuk(url_duzenle($baslik_tr));
									$yukle->process($klasor);
										if($yukle->processed) {
										unlink($klasor."/".$duzenle_yaz->resim);
										$update=mysql_query("UPDATE galeri SET baslik_tr='$baslik_tr',baslik_en='$baslik_en',resim='$yukle->file_dst_name' where id='$id'"); 
										
											if($update){
												echo '<script>alert("Güncelleme Başarılı");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=galeri';</script>";
											}else{
												echo '<script>alert("Güncelleme Başarısız");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_duzenle&id=".$id."';</script>";
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Güncelleme Başarısız.2 '.$yukle->error().'");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_duzenle&id=".$id."';</script>";
										}
									}
								}else{
									$update2=mysql_query("UPDATE galeri SET baslik_tr='$baslik_tr',baslik_en='$baslik_en'  where id='$id'"); 
									if($update2){
										echo '<script>alert("Güncelleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri';</script>";
									}else{
										echo '<script>alert("Güncelleme Başarısız'.mysql_error().'");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_resim_duzenle&id=".$id."';</script>"; 
									}
								}
							}
						}
						if($sayfa=="galeri_resim_sil"){
							$id=$_GET["id"];
							$sil=mysql_fetch_object(mysql_query("select * from galeri where id='$id'"));
							$del  = mysql_query("delete from galeri where id='$id'");
							if($sil->resim!="bos.jpg"){ 
								unlink("../upload/galeri/$sil->resim");
							}
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=galeri";</script>'; 
						}
						
						if($sayfa=="galeri_kat"){
							?><div class="content-panel"> 
								  <section id="unseen"> 
								  <table class="table table-bordered table-striped table-condensed">
									<?php
									$limit = 10;
									$sira=1;
									$page = @$_GET["page"];
									if(empty($page) or !is_numeric($page)) { $page = 1; }
									if($page>1) $sira+=$limit*$page-$limit;
										$count			 = mysql_num_rows(mysql_query("SELECT id FROM galeri_kategori order by id desc"));
										$toplamsayfa	 = ceil($count / $limit);
										$baslangic		 = ($page-1)*$limit;
									$yazdir_sorgu = mysql_query("SELECT * FROM galeri_kategori ORDER BY id desc LIMIT $baslangic,$limit") or die(mysql_error());
									if(mysql_num_rows($yazdir_sorgu)=="0"){
										if($toplamsayfa == 0 ){ 
											echo '<br><br><br><br><center><h1>Kayıt Bulunamadı...  <div class="fa fa-warning-sign"></div></h1></center><br><br><br><br>'; 
										}else{
											if($page > $toplamsayfa) echo '<script language="javascript">location.href="index.php?sayfa=makale_kategori";</script>';
										}
									}else{
									?>
									<thead><tr><th>Sıra</th><th>Galeri Kategori Başlığı</th>  <th>İşlemler</th></tr></thead>
									<tbody> 
									<?php
									while ($gelen = mysql_fetch_array($yazdir_sorgu)){ 
									?>
										<tr>
										<td scope="row"><?php echo "<b>".$sira."<b>"; $sira++; ?></td>
										<td><?php echo $gelen['baslik_tr']; ?></td>    
										<td>
											<a href='index.php?sayfa=galeri_kategori_duzenle&id=<?php echo $gelen["id"];?>'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a>
											<a  onclick='return confirm("Silmek İstediğinize Emin Misiniz?");' href='index.php?sayfa=galeri_kategori_sil&id=<?php echo $gelen["id"];?>'  onclick='return confirm(\"Silmek İstediğinize Emin Misiniz?\");'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a>
											<a  href='index.php?sayfa=galeri_resim_ekle&id=<?php echo $gelen["id"];?>'  alt="Kategoriye Resim Ekle"><button class='btn btn-important  btn-xs'><i class='fa fa-plus'></i></button></a>
										</td> 
										</tr>
									<?php }  } 
									?> </tbody></table> 
								  </section>
							  </div><li class="paginationpagination"><ul>
								<?php
								if($page<=$toplamsayfa){
									if($count > $limit) :
										$x = 2;
										$lastP = ceil($count/$limit);
									if($page > 1){
										$onceki = $page-1;
										echo "<li><a  style='background:#8F8F8F; color:white;' href='index.php?sayfa=makale_kategori&page=$onceki'> &#171; </a></li>";
									}
									if($page==1) echo '<li class="current"><span class="currenttext" style="background:#7CDCD9  ; color:white;">1</span></li>';
									else echo "<li><a href='index.php?sayfa=makale_kategori&page=1'   style='background:#ECECEC ; color:#8F8F8F;'> 1 </a></li>";
									if($page-$x > 2) {
										echo "<li><a   style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li> ";
										$i = $page-$x;
									} else {
										$i = 2;
									}
									for($i; $i<=$page+$x; $i++) {
										if($i==$page) echo '<li class="current"><span class="currenttext"  style="background:#7CDCD9  ; color:white;">'.$i.'</span></li>';
										else echo "<li><a href='index.php?sayfa=makale_kategori&page=$i'   style='background:#ECECEC ; color:#8F8F8F;'>$i</a></li>";
										if($i==$lastP) break;
									}
									if($page+$x < $lastP-1) {
										echo "<li><a style='background:#ECECEC ; color:#8F8F8F;'> ... </a></li>";
										echo "<li><a href='index.php?sayfa=makale_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
									} elseif($page+$x == $lastP-1) {
										echo "<li><a href='index.php?sayfa=makale_kategori&page=$lastP'   style='background:#ECECEC ; color:#8F8F8F;'>$lastP</a></li>";
									}
									if($page < $lastP){
										$sonraki = $page+1;
										echo "<li><a  style='background:#8F8F8F; color:white;'  href='index.php?sayfa=makale_kategori&page=$sonraki'> &#187; </a></li>";
									}
									endif;
								}
								?>
								</ul></li> <?php  }
						if($sayfa=="galeri_kat_ekle"){
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Galeri Kategori-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Galeri Başlığı-TR" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Galeri Kategori-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Galeri Başlığı-EN" name="baslik_en"></div>
								  </div>
								  
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="galeri_kategori_ekle">Ekle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["galeri_kategori_ekle"])){
									$baslik_tr = buyuk($_POST['baslik_tr']); 
									$baslik_en = buyuk($_POST['baslik_en']);
									$url=kucuk(url_duzenle($baslik_tr));
									$insert=mysql_query("insert into galeri_kategori  ( baslik_tr,baslik_en,url)values ('$baslik_tr','$baslik_en','$url')"); 
									if($insert){
										echo '<script>alert("Ekleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_kat';</script>";
									}else{
										echo "<script>alert('Ekleme Başarısız');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_kat_ekle';</script>";
										$yukle->clean();
									}
								}
						}
						if($sayfa=="galeri_kategori_sil"){
							$id=$_GET["id"]; 
							$del  = mysql_query("delete from galeri_kategori where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=galeri_kat";</script>'; 
						}		 
						if($sayfa=="galeri_kategori_duzenle"){
							$id=$_GET["id"];
							$duzenle_yaz=mysql_fetch_object(mysql_query("select * from galeri_kategori where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Galeri Kategori-TR</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $duzenle_yaz->baslik_tr;?>" name="baslik_tr"></div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Galeri Kategori-EN</label>
									  <div class="col-sm-10"><input class="form-control" required type="text"  value="<?php echo $duzenle_yaz->baslik_en;?>" name="baslik_en"></div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="makale_kategori_duzenle">Düzenle</button>								  
								  </div> 
							  </form>
						  </div><?php   if(isset($_POST["makale_kategori_duzenle"])){
								$baslik_tr = buyuk($_POST['baslik_tr']); 
								$baslik_en = buyuk($_POST['baslik_en']);  
								$url=kucuk(url_duzenle($baslik_tr));

								$insert1=mysql_query("UPDATE galeri_kategori set  baslik_tr='$baslik_tr',baslik_en='$baslik_en',url='$url'  where id='$id'"); 
									if($insert1){
										echo '<script>alert("Düzenleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_kat';</script>";
									}else{
										echo "<script>alert('Düzenleme Başarısız');</script>";
										echo "<script language='javascript'>location.href='index.php?sayfa=galeri_kat_duzenle&id=".$id."';</script>";
										$yukle->clean();
									}
							}
							 
							
						}
						
						
						
						
						
						
						if($sayfa=="" ){
							$ayarlar_yaz=mysql_fetch_object(mysql_query("select * from ayarlar"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Site Başlığı</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->title;?>" name="title"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Alt Başlık</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->footer;?>" name="footer"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Site Url</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->site_url;?>" name="site_url"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">E-Posta</label>
									  <div class="col-sm-10"><input class="form-control" required type="email" value="<?php echo $ayarlar_yaz->eposta;?>" name="eposta"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Telefon</label>
									  <div class="col-sm-10"><input class="form-control" required type="tel" value="<?php echo $ayarlar_yaz->telefon;?>" name="telefon"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Adres</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->adres;?>" name="adres"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Facebook</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->facebook;?>" name="facebook"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Twitter</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" value="<?php echo $ayarlar_yaz->twitter;?>" name="twitter"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Logo</label>
									  <div class="col-sm-10"><input type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="logo" id="resim"></div>
								  </div>
								   
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Logo Önizleme</label>
									  <div class="col-sm-10">
										<img title="Yeni Resim" src="../upload/<?php echo $ayarlar_yaz->logo;?>"  width="100px" />  -> 
										<img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" />
									  </div>
								  </div> 								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="ayarlar_guncelle">Güncelle</button>								  
								  </div> 
							  </form>
						  </div><?php 
							if(isset($_POST["ayarlar_guncelle"])){ 
								$title = $_POST['title'];
								$footer = $_POST['footer'];
								$site_url = $_POST['site_url'];
								$eposta = $_POST['eposta'];
								$telefon = $_POST['telefon'];
								$adres = $_POST['adres']; 
								$facebook = $_POST['facebook'];
								$twitter = $_POST['twitter'];
								$resim = $_FILES['logo']; // Form'dan yüklenen resim.
								require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
								$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
								$klasor = '../upload'; //Resmin Yükleneceği Klasör  
								if($resim["name"]!=""){
									if ($yukle->uploaded){
									$yukle->file_new_name_body = "logo";
									$yukle->process($klasor);
										if($yukle->processed) {
										unlink($klasor."/".$ayarlar_yaz->logo);
										$update=mysql_query("UPDATE ayarlar SET title='$title',footer='$footer', site_url='$site_url',eposta='$eposta',telefon='$telefon', adres='$adres',facebook='$facebook',twitter='$twitter',logo='$yukle->file_dst_name'");
											if($update){
												echo '<script>alert("Güncelleme Başarılı");</script>';
											}else{
												echo '<script>alert("Güncelleme Başarısız.");</script>'; 
												$yukle->clean();
											}
										}else{
											echo '<script>alert("Güncelleme Başarısız.");</script>'; 
										}
									} 
								}else{
									$update2=mysql_query("UPDATE ayarlar SET title='$title' ,footer='$footer',site_url='$site_url',eposta='$eposta',telefon='$telefon', adres='$adres',facebook='$facebook',twitter='$twitter'");
									if($update2){
										echo '<script>alert("Güncelleme Başarılı");</script>'; 
									}else{
										echo '<script>alert("Güncelleme Başarısız.'.mysql_error().'");</script>';
									}
								}
								
										echo "<script language='javascript'>location.href='index.php';</script>"; 
							}
						}
						
						if($sayfa=="profil"){
							$olay=mysql_fetch_object(mysql_query("select * from admin where kullanici_adi='$durum'")); 
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post">
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Kullanıcı Adı</label>
									  <div class="col-sm-10"><input class="form-control" required READONLY  type="text" value="<?php echo $durum;?>" name="kullanici_adi"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Yetki</label>
									  <div class="col-sm-10"><input class="form-control" required READONLY  type="text" value="<?php echo mysql_fetch_object(mysql_query("select * from yetki where derece='$olay->yetki_id'"))->yetki_ismi;?>" name="yetki"></div>
								  </div>
								    <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Eski Şifre</label>
									  <div class="col-sm-10"><input class="form-control" required   type="text" placeholder="Eski Şifrenizi Giriniz." name="eski_sifre"></div>
								  </div>
								   <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Şifre</label>
									  <div class="col-sm-10"><input class="form-control" required type="text" placeholder="Yeni Şifrenizi Giriniz." name="yeni_sifre"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="profil_guncelle">Güncelle</button>								  
								  </div> 
							  </form>
						  </div> <?php 
							if(isset($_POST["profil_guncelle"])){
								$kullanici_adi = $_POST['kullanici_adi']; 
								$eski_sifre = md5(sha1(md5($_POST['eski_sifre'])));
								$yeni_sifre = md5(sha1(md5($_POST['yeni_sifre'])));
								if($olay->sifre == $eski_sifre){
									$update=mysql_query("UPDATE admin SET kullanici_adi='$kullanici_adi',sifre='$yeni_sifre' where kullanici_adi='$durum'");
									if($update){
										session_destroy();
										echo '<script>alert("Güncelleme Başarılı");</script>';
										echo "<script language='javascript'>location.href='index.php';</script>";
									}else{
										echo '<script>alert("Güncelleme Başarısız.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=profil';</script>"; 
									}
								}else{
										echo '<script>alert("Lütfen Aktif Şifrenizi Giriniz.");</script>';
										echo "<script language='javascript'>location.href='index.php?sayfa=profil';</script>"; 
								}
								
							}
						}
						
						if($sayfa=="slider_yazi"){
						 	$slider_sayfa_sirala=isset($_POST["slider_sayfa_sirala"])?$_POST["slider_sayfa_sirala"]:""; 
							$slider_yazi_sirala=isset($_POST["slider_yazi_sirala"])?$_POST["slider_yazi_sirala"]:"";  
							$kat=isset($_POST["kat"])?$_POST["kat"]:""; 
							$kat_id=isset($_POST["kat_id"])?$_POST["kat_id"]:""; 
							  

							if($slider_yazi_sirala){
								$slider_sorgu=mysql_query("select * from slider_yazi where kategori='$kat' and kategori_id='$kat_id' order by id desc"); 
							}else{
								if($slider_sayfa_sirala){
									if($kat=="")$ifade="";else $ifade="where kategori='$kat'";
									$slider_sorgu=mysql_query("select * from slider_yazi $ifade order by id desc");  
								}else{
									$slider_sorgu=mysql_query("select * from slider_yazi order by id desc");  
								}
							}
						  $kat=isset($kat)?$kat:""; 
						  ?> <form method="post">
								<select id="kat" name="kat">
									<option value="">Kategori Seçiniz</option>
									<option value="donanimlarimiz" <?php if( $kat=="donanimlarimiz") echo " selected";?>>Donanımlarımız</option>
									<option value="hizmetlerimiz" <?php if($kat=="hizmetlerimiz") echo " selected";?> > Hizmetlerimiz</option>
									<option value="kurumsal" <?php if($kat=="kurumsal") echo " selected";?> >Kurumsal</option>
									<option value="makaleler"  <?php if($kat=="makaleler") echo " selected";?>>Makaleler</option>
									<option value="operasyonlar"  <?php if($kat=="operasyonlar") echo " selected";?>>Operasyonlar</option>
								</select>
								<input type="submit" name="slider_sayfa_sirala" value="'e Göre Sırala">  
							 </form><br> <?php
							 if($slider_sayfa_sirala or $slider_yazi_sirala){ ?>
							 <form method="post">
									<input type="hidden" name="kat" value="<?php echo $kat;?>">  
									<input type="hidden" name="kat2" value="<?php echo $kat_id;?>">  
									<select id="kat_id" name="kat_id">
										<option value="0">Yazi Seçiniz</option>
										<?php 
											$sorgu=mysql_query("select * from $kat");
											while($yaz=mysql_fetch_object($sorgu)){
												echo "<option value='$yaz->id'>$yaz->baslik_tr</option>";
											}
										?>
									</select> 
									<input type="submit" name="slider_yazi_sirala" value="'e Göre Sırala"> 
									<?php if($slider_yazi_sirala){?><input type="submit" name="slider_yazi_resim_ekle" formaction="?sayfa=slider_yazi_ekle" value="'e Resim Ekle"><?php } ?>
								 </form>
							<?php }  
							while($slider_yaz=mysql_fetch_object($slider_sorgu)){
								$k=$slider_yaz->kategori."";
								$yazi=mysql_fetch_object(mysql_query("select * from ($k) where id='$slider_yaz->kategori_id'"))->baslik_tr;
								echo  ' <div class="col-lg-4 col-md-4 col-sm-4 mb">
											<div class="content-panel pn">
												<div id="spotify" style="background:url(../upload/yazi_slider/'.$slider_yaz->resim.') no-repeat scroll center center / 100% auto;; ">
													<div class="sp-title"><h3 style="color: rgb(255, 215, 119); background-color: black;">'.buyuk($slider_yaz->kategori).'</h3>  <h5 style="color: rgb(255, 215, 119); background-color: black;">'.$yazi.'</h5></div> 
												</div>
												<p class="followers" style="text-align:center;">
													<a href="index.php?sayfa=slider_yazi_sil&id='.$slider_yaz->id.'"  onclick="return confirm(\'Silmek İstediğinize Emin Misiniz?\');"><i class="fa fa-times"></i>  Sil</a></p>
											</div>
										</div>';
							}  
						}
						if($sayfa=="slider_yazi_ekle"){
							$kat=isset($_POST["kat"])?$_POST["kat"]:"";
							$kk=isset($_POST["kat2"])?$_POST["kat2"]:""; 
							if(!$kat or !$kk){
								$disabled="";
							}else{
								$yaz=mysql_fetch_object(mysql_query("select * from $kat where id='$kk'"));
								$disabled="disabled";
							}
						?><div class="form-panel"> <form class="form-horizontal style-form"  enctype="multipart/form-data"   method="post"> 
								 <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Slider Başlığı-TR</label>
									  <div class="col-sm-10"> 
											<select id="sayfa" name="sayfa"  <?php echo $disabled;?>>
												<option value="0" >Kategori Seçiniz</option>
												<option value="donanimlarimiz" <?php if( $kat=="donanimlarimiz") echo " selected";?>>Donanımlarımız</option>
												<option value="hizmetlerimiz" <?php if($kat=="hizmetlerimiz") echo " selected";?> > Hizmetlerimiz</option>
												<option value="kurumsal" <?php if($kat=="kurumsal") echo " selected";?> >Kurumsal</option>
												<option value="makaleler"  <?php if($kat=="makaleler") echo " selected";?>>Makaleler</option>
												<option value="operasyonlar"  <?php if($kat=="operasyonlar") echo " selected";?>>Operasyonlar</option>
											</select> 
											<select <?php if(!$kat or !$kk){?> name="yazi" id="yazi" <?php }else{?> name="kategori_id" id="kategori_id" <?php } ?> <?php echo $disabled;?>>
												<option value="<?php echo $yaz->id;?>"><?php echo $yaz->baslik_tr;?></option>
											</select>   
										</div>
								  </div> 
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim</label>
									  <div class="col-sm-10"><input required  type="file" onChange="showimagepreview(this);" id="exampleInputFile1" class="form-control"  name="slider_resim" id="resim"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10"><img title="Yeni Resim" id="imgview" src="images/bos.jpg"  width="100px" /> </div>
								  </div> 
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Resim Önizleme</label>
									  <div class="col-sm-10">
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="1" type="radio" > Evet</label>
										<label class="checkbox-inline"><input name="kırp" id="kırp" value="0" type="radio" checked> Hayır</label>
									  </div>
								  </div>
								  
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label"></label>
									  <button type="submit" class="btn btn-theme" name="slider_ekle_button">Gönder</button>								  
								  </div> 
							  </form>
						  </div><?php  if(isset($_POST["slider_ekle_button"])){
									
									$sayfa = $_POST['sayfa'];
									$kategori_id = $_POST['kategori_id']; 
									
									$kırp = $_POST['kırp'];  
									$resim = $_FILES['slider_resim']; // Form'dan yüklenen resim. 
									require_once ('class.upload.php'); // Class ' ımızı dahil ediyoruz.
									$yukle = new upload($resim); //Sınıfımızı Başlatıyoruz.
									$klasor = '../upload/yazi_slider'; //Resmin Yükleneceği Klasör 
									 
									if($resim["name"]!=""){
										if ($yukle->uploaded){
											if($kırp==1){
												$yukle->image_resize          = true;
												$yukle->image_ratio_fill      = true;
												$yukle->image_x               = 1144;
												$yukle->image_y               = 510;
											} 
											$yukle->process($klasor);
											if($yukle->processed) { 
											$insert=mysql_query("insert into slider_yazi (resim,kategori,kategori_id) values('$yukle->file_dst_name','$sayfa','$kategori_id')"); 
												if($insert){
													echo '<script>alert("Ekleme Başarılı");</script>';
													echo "<script language='javascript'>location.href='index.php?sayfa=slider_yazi';</script>";
												}else{
													echo "<script>alert('Ekleme Başarısız');</script>";
													echo "<script language='javascript'>location.href='index.php?sayfa=yeni_slider_yazi';</script>";
													$yukle->clean();
												}
											}else{
												echo '<script>alert("Ekleme Başarısız. '.$yukle->error().'");</script>';
												echo "<script language='javascript'>location.href='index.php?sayfa=slider_yazi';</script>";
											}
										}
										}else{
											echo '<script>alert("Resim Eklemek Zorundasınız.");</script>';
											echo "<script language='javascript'>location.href='index.php?sayfa=yeni_slider_yazi';</script>";
										} 
								}
						}
						if($sayfa=="slider_yazi_sil"){
							$id=$_GET["id"];
							$sil=mysql_fetch_object(mysql_query("select * from slider_yazi where id='$id'"));
							$del  = mysql_query("delete from slider_yazi where id='$id'");
							if($sil->resim!="bos.jpg"){ 
								unlink("../upload/yazi_slider/$sil->resim");
							}
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=slider_yazi";</script>'; 
						}
						
						if($sayfa=="logout"){
							session_destroy();
							echo '<meta http-equiv="refresh" content="0;URL=login.php">';
							echo "<script language='javascript'>location.href='login.php';</script>";
						}
						
						if($sayfa=="mesajlar"){
							?><div class="content-panel"> 
							  <section id="unseen">
								<table class="table table-bordered table-striped table-condensed">
								  <thead><tr><th>Sıra</th><th>Gönderen İsmi</th><th>Email</th><th>Okundu</th><th>İşlemler</th></tr></thead>
								  <tbody>
								  <?php 
									$m_sorgu=mysql_query("select * from mesaj order by id desc");
									$i=0;
									while($m_yaz=mysql_fetch_object($m_sorgu)){
										$i++;
										if($m_yaz->okundu==0) $durum="<td><a onclick='return confirm(\"Okundu Olarak İşaretlemek İstediğinize Emin Misiniz?\");' href='index.php?sayfa=mesaj_okunma&id=$m_yaz->id' title='Okunmadı'><i class='fa fa-times'></i></a></td> ";
										if($m_yaz->okundu==1) $durum="<td><a onclick='return confirm(\"Okunmadı Olarak İşaretlemek İstediğinize Emin Misiniz?\");' href='index.php?sayfa=mesaj_okunma&id=$m_yaz->id' title='Okundu'><i class='fa fa-check'></i></a></td> ";
										echo "<tr>
												  <td>$i</td>
												  <td>$m_yaz->name</td> 
												  <td>$m_yaz->email</td> 
												  $durum
												  <td>
												  <a href='index.php?sayfa=mesaj_oku&id=$m_yaz->id'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a>
												  <a href='index.php?sayfa=mesaj_sil&id=$m_yaz->id'  onclick='return confirm(\"Silmek İstediğinize Emin Misiniz?\");'><button class='btn btn-danger  btn-xs'><i class='fa fa-trash-o'></i></button></a>
												  </td> 
											  </tr> ";
									}
								  ?>
								  </tbody>
							  </table>
							  </section>
						  </div><?php 
						}
						
						if($sayfa=="mesaj_oku"){  
							$id=$_GET["id"];
							$mesaj=mysql_fetch_object(mysql_query("select * from mesaj where id='$id'"));
							?><div class="form-panel"> 
							  <form class="form-horizontal style-form" >
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Gönderen İsmi</label>
									  <div class="col-sm-10"><input class="form-control" readonly type="text" value="<?php echo $mesaj->name; ?>"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Gönderen Maili</label>
									  <div class="col-sm-10"><input class="form-control"  readonly type="text" value="<?php echo $mesaj->email; ?>"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Mesaj Konusu</label>
									  <div class="col-sm-10"><input class="form-control"  readonly type="text" value="<?php echo $mesaj->subject; ?>"></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Mesaj Konusu</label>
									  <div class="col-sm-10"><textarea class="ckeditor" disabled name="ckeditor"><?php echo $mesaj->message;?></textarea></div>
								  </div>
								  <div class="form-group">
									  <label class="col-sm-2 col-sm-2 control-label">Gönderim Tarihi</label>
									  <div class="col-sm-10"><input class="form-control"  readonly type="text" value="<?php echo $mesaj->tarih; ?>"></div>
								  </div>
								  
							  </form>
						  </div><?php
						}
						if($sayfa=="mesaj_sil"){
							$id=$_GET["id"];
							$del  = mysql_query("delete from mesaj where id='$id'");
							echo '<script type="text/javascript">alert("Silme İşlemi Başarılı.")</script>'; 
							echo '<script type="text/javascript">location.href="index.php?sayfa=mesajlar";</script>'; 
						}
						if($sayfa=="mesaj_okunma"){
							$id=$_GET["id"];
							$sec  = mysql_fetch_object(mysql_query("select * from mesaj where id='$id'"));
							if($sec->okundu==1) $okundu=0; else $okundu=1;
							$del  = mysql_query("update mesaj set okundu='$okundu' where id='$id'"); 
							echo '<script type="text/javascript">location.href="index.php?sayfa=mesajlar";</script>'; 
						}
						?> 
					</div>  
          		</div>
          	</div> 
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT --> 
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer"><div class="text-center"><?php echo date("Y");?> © <a href="http://bilgimedya.com.tr">Bilgimedya.com.tr</a><a href="#" class="go-top"><i class="fa fa-angle-up"></i></a></div></footer>
      <!--footer end-->
  </section> 
    <!-- js placed at the end of the document so the pages load faster 
    <script src="assets/js/jquery.js"></script>       Sortable yaptık çalışmadı sildik çalıştı-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script> 
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script> 
    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>   
	<script src="assets/js/form-component.js"></script>    
	<script src="assets/js/bootstrap-switch.js"></script> 
	  <script>
		  //custom select box
		  $(function(){
			  $('select.styled').customSelect();
		  });

	  </script> 
	  <!-- Dinamik JS -->
	<script src="selectchained.js" type="text/javascript"></script>
	<script>$("#yazi").remoteChained("#sayfa", "dinamik.php");</script>
	<!-- Dinamik JS -->
  </body>
</html>