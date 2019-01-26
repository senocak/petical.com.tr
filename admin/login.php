<!DOCTYPE html>
<?php
session_start();
include("../config.php"); 
$durum= isset($_SESSION['username']) ? $_SESSION['username'] : ""; 
if($durum !="") echo '<script language="javascript">location.href="index.php";</script>';
?>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    
    <title><?php echo $ayarlar->title;?> | Yönetim Paneli</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">Giriş Yap</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Kullanıcı Adı" autofocus name="kullanici">
		            <br>
		            <input type="password" class="form-control" placeholder="Şifre" name="parola">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.php#myModal">Parolamı Unuttum</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.php" name="giris" type="submit"><i class="fa fa-lock"></i> Giriş Yap</button>
		            <hr> 
				</form>	
		            
		            <div class="login-social-link centered"> 
		                <button class="btn btn-facebook" onclick="alert('Yakında');" ><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" onclick="alert('Yakında');"><i class="fa fa-twitter"></i> Twitter</button>
		            </div> 
		        </div>
		
				<form class="form-login" method="post">
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Parolamı Unuttum</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>E-Postanızı Giriniz</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">İptal</button>
		                          <button class="btn btn-theme" type="submit" name="parolamı_unuttum">Gönder</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
				</form>	



<?php
if(isset($_POST["giris"])){
	$kullanici = mysql_real_escape_string($_POST["kullanici"]);
	$parola    = mysql_real_escape_string(md5(sha1(md5($_POST["parola"]))));
	$kontrol = mysql_num_rows(mysql_query("SELECT * FROM admin WHERE kullanici_adi='$kullanici' and sifre='$parola' "));
	$yaz = mysql_fetch_object(mysql_query("SELECT * FROM admin WHERE kullanici_adi='$kullanici' and sifre='$parola' "));
	if($kullanici=="" or $parola==""){  
		echo "<script>alert('Alanları boş geçemezsiniz !'); </script>";
	}else{
		if($kontrol > 0){
		$_SESSION['username']="$kullanici";
		echo '<script language="javascript">location.href="index.php";</script>';  
		}else{
			echo "<script>alert('Kullanıcı adı veya Şifre Hatalı...'); </script>";
		}
	}
}

if(isset($_POST["parolamı_unuttum"])){
	echo "<script>alert('Kullanıcı adı veya Şifre Hatalı...'); </script>";
}
?>			  
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
