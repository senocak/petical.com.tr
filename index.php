<!DOCTYPE html>
<html class="no-js" lang="tr">
<?php
session_start(); 
include("config.php"); 

$sayfa="";
$sayfa= isset($_GET['sayfa']) ? $_GET['sayfa'] : "anasayfa";
$url=$sayfa;
 if($url != null){
	$url = rtrim($url, "/");
	$url = explode("/", $url);
}else{
   unset($url); 
}

if($url[0]=="tr") {
	echo '<script type="text/javascript">history.go(-1)</script>';
	$_SESSION['dil']="tr";
}
if($url[0]=="en") {
	echo '<script type="text/javascript">history.go(-1)</script>';
	$_SESSION['dil']="en";
}  
 
?>
   <?php include "inc/head.php";?>
    <body class="home-2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- Add your site or application content here -->
        <?php include "inc/header.php"; ?>
        <!--/ Header -->
		<div class="clear"></div>
<?php if($url[0]=="anasayfa")  include "inc/slider.php";?>
        <!-- home banners area Start-->
		
		
	<?php // include "inc/reklam.php";?>
		
		
		<!--/ home banners area End-->
		<?php 
		if($url[0]=="anasayfa"){
		?>
		<!--DONANIMLARIMIZ start-->
		<div class="new-product-area">
			<div class="container">
				<div class="row">
					<div class="section-title">
						<div class="col-md-12">
							<h3><span>DONANIMLARIMIZ</span>
								<i class="cross-icon"><i></i></i>
							</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="new-product-list"> 
						<div class="clear"></div>
						<div class="product-list tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="clothings">
								<div  class="product-owl-active  indicator-style">
									<!-- single group start --> 
									<?php 
									$donanim_sorgu=mysql_query("select * from donanimlarimiz order by siralama asc");
									while($donanim_yaz=mysql_fetch_object($donanim_sorgu)){
										if($_SESSION["dil"]=="tr"){
											$baslik= $donanim_yaz->baslik_tr;
										}else{
											$baslik= $donanim_yaz->baslik_en;
										}
									?>
									<div class="product-group">
										<div class="row">
											<div class="col-md-3 col-sm-6">
												<div class="single-item">
													<div class="s-product-img"> 
														<a href="<?php echo Site_url."/donanimlarimiz/".$donanim_yaz->url;?>">
															<img alt="" src="<?php echo Site_url."/upload/donanimlarimiz/".$donanim_yaz->resim;?>" class="primary-image" >
															<img alt="" src="<?php echo Site_url."/upload/donanimlarimiz/".$donanim_yaz->resim;?>" class="secondary-image"  >
														</a>
														<div class="price-rate"> 
															<div class="global-table">
																<div class="global-row">
																	<div class="global-cell">
																		<div class="hover-view-content">  
																		</div>
																	</div>
																</div>
															</div>
														</div> 
													</div>
													<div class="product-title"><a href="<?php echo Site_url."/donanimlarimiz/".$donanim_yaz->url;?>"><?php echo $baslik;?></a></div>
												</div>
											</div>
										</div>  
									</div>

									<?php }?>
									<!-- single group end -->
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--DONANIMLARIMIZ End-->
		<!--MAKALELER start-->
		<div class="blog-1-area">
			<div class="container">
				<div class="row"><div class="section-title"><div class="col-md-12"><h3><span>SON MAKALELER</span></h3></div></div></div>
				<div class="row"><div class="blog-list-2 indicator-style-2">
					<?php 
					$makale_sorgu=mysql_query("select * from makaleler order by id desc");
					while($makale_yaz=mysql_fetch_object($makale_sorgu)){
						
								
						$tarih=$makale_yaz->tarih;  
						 if($tarih != null){
							$tarih = rtrim($tarih, "/");
							$tarih = explode("/", $tarih);
						}else{
						   unset($tarih); 
						}
						
						
						if($_SESSION["dil"]=="tr"){
							$baslik=$makale_yaz->baslik_tr;
							$icerik=strip_tags($makale_yaz->icerik_tr);
							
							if($tarih[1]==1)$ay="Ocak";
							if($tarih[1]==2)$ay="Şubat";
							if($tarih[1]==3)$ay="Mart";
							if($tarih[1]==4)$ay="Nisan";
							if($tarih[1]==5)$ay="Mayıs";
							if($tarih[1]==6)$ay="Haziran";
							if($tarih[1]==7)$ay="Temmuz";
							if($tarih[1]==8)$ay="Agustos";
							if($tarih[1]==9)$ay="Eylül";
							if($tarih[1]==10)$ay="Ekim";
							if($tarih[1]==11)$ay="Kasım";
							if($tarih[1]==12)$ay="Aralık";
						}
						if($_SESSION["dil"]=="en"){
							$baslik=$makale_yaz->baslik_en;
							$icerik=strip_tags($makale_yaz->icerik_en);

							if($tarih[1]==1)$ay="January";
							if($tarih[1]==2)$ay="February";
							if($tarih[1]==3)$ay="March";
							if($tarih[1]==4)$ay="April";
							if($tarih[1]==5)$ay="May";
							if($tarih[1]==6)$ay="June";
							if($tarih[1]==7)$ay="July";
							if($tarih[1]==8)$ay="August";
							if($tarih[1]==9)$ay="September";
							if($tarih[1]==10)$ay="October";
							if($tarih[1]==11)$ay="November";
							if($tarih[1]==12)$ay="December";
							
						}
						
						
						
 
						$karakter=110;
						if(strlen($icerik)>=$karakter){
							if(preg_match('/(.*?)\s/i',substr($icerik,$karakter),$dizi))$icerik=substr($icerik,0,$karakter+strlen($dizi[0]))."...";  
						}else{
							$icerik.="";
						} 
						echo 	'<div class="col-md-4">
									<div class="single-blog">
										<div class="item-inner"> 
											<div class="images-container">
												<a ><img src="'.Site_url.'/upload/makaleler/'.$makale_yaz->resim.'" alt=""></a>
												<div class="post-date"><span class="day">'.$tarih[0].'</span><span class="month">'.$ay.'</span></div>	
												<div class="post-info">
													<h3 class="post-title"><a href="'.Site_url.'/makaleler/'.$makale_yaz->url.'">'.$baslik.'</a> </h3>
													<div class="post-excerpt"><p>'.$icerik.'</p>	</div> 	
													<a  href="'.Site_url.'/makaleler/'.$makale_yaz->url.'" class="readmore">Devamını Oku <i class="fa fa-arrow-right"></i></a>
												</div>	 <br>
											</div>
										</div>
									</div>
								</div>';
					}
					?>
				<br></div></div>
			</div>
		</div>
		<!-- / MAKALELER end-->
		<?php 
		}elseif($url[0]=="kurumsal"){ 
			include "inc/kurumsal.php";  
		}elseif($url[0]=="ekibimiz"){ 
			include "inc/ekibimiz.php";  
		}elseif($url[0]=="makaleler"){ 
			include "inc/makaleler.php";   
		}elseif($url[0]=="hizmetlerimiz"){ 
			include "inc/hizmetlerimiz.php";  
		}elseif($url[0]=="donanimlarimiz"){ 
			include "inc/donanimlarimiz.php";  
		}elseif($url[0]=="operasyonlar"){ 
			include "inc/operasyonlar.php";  
		}elseif($url[0]=="iletisim"){ 
			include "inc/iletisim.php";  
		}elseif($url[0]=="galeri"){ 
			include "inc/galeri.php";  
		}else{ 
			include "inc/404.php";  
		} 
		
		
		?>
<style> 
#lightbox {
	position:fixed; /* keeps the lightbox window in the current viewport */
	top:0; 
	left:0; 
	width:100%; 
	height:100%; 
	background:url(overlay.png) repeat; 
	text-align:center;
}
#lightbox p {
	text-align:right; 
	color:#fff; 
	margin-right:20px; 
	font-size:12px; 
}
#lightbox img {
	box-shadow:0 0 25px #111;
	-webkit-box-shadow:0 0 25px #111;
	-moz-box-shadow:0 0 25px #111;
	max-width:940px;
}
</style>

		<!-- brand area start-->
		<div class="home-brands-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="brands-list">
							<div class="single-brand"> <a href="#"><img src="<?php echo Site_url."/"; ?>img/brand/1.png" alt="brand image" /></a></div>
							 
						<?php 
						$brand_sorgu=mysql_query("select * from galeri ");
						while($brand_yaz=mysql_fetch_object($brand_sorgu)){
							echo '<div class="single-brand"><a class="lightbox_trigger"  href="'.Site_url.'/upload/galeri/'.$brand_yaz->resim.'"><img src="'.Site_url.'/upload/galeri/'.$brand_yaz->resim.'" alt="brand image" style="width:170px; " /></a></div>';
						}
						?>
						</div>
					</div>
				</div>
			</div> 
		</div>
		<!-- / brand area end-->
		 
		 
		 
		 
<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
<script>
jQuery(document).ready(function($) { 
	$('.lightbox_trigger').click(function(e) { 
		e.preventDefault(); 
		var image_href = $(this).attr("href"); 
		if ($('#lightbox').length > 0) { 
			$('#content').html('<img src="' + image_href + '" />'); 
			$('#lightbox').show();
		}else{ 
			var lightbox =  '<div id="lightbox">' + '<p>Click to close</p>' + '<div id="content">' +  '<img src="' + image_href +'" />' + '</div>' + '</div>';  
			$('body').append(lightbox);
		} 
	});  
	$('#lightbox').live('click', function() { 
		$('#lightbox').hide();
	}); 
});
</script>
		 
		 
		 
		<!-- Footer area-->
		<?php include "inc/footer.php";?>
		<!-- Footer area-->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
			<!-- Modal -->
			<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								<div class="product-images">
									<div class="main-image images">
										<img alt="" src="<?php echo Site_url."/"; ?>img/product/50.jpg">
									</div>
								</div><!-- .product-images -->
								
								<div class="product-info">
									<h1>Aenean eu tristique</h1>
									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">£160.00</span>
											<span class="old-price">£190.00</span>
										</div>
									</div>
									<a href="shop.html" class="see-all">See all features</a>
									<div class="quick-add-to-cart">
										<form method="post" class="cart">
											<div class="numbers-row"><input type="number" id="french-hens" value="3"></div>
											<button class="single_add_to_cart_button" type="submit">İNCELE</button>
										</form>
									</div>
									<div class="quick-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
									</div>
									<div class="social-sharing">
										<div class="widget widget_socialsharing_widget">
											<h3 class="widget-title-modal">Share this product</h3>
											<ul class="social-icons">
												<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
												<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
												<li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
												<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
												<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</div>
									</div>
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
				</div><!-- .modal-dialog -->
			</div>
			<!-- END Modal -->
		</div>
		<!-- END QUICKVIEW PRODUCT -->	
		
		<!-- jquery
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/wow.min.js"></script>
		<!-- price-slider JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/jquery-price-slider.js"></script>
		<!-- collapse JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/jquery.collapse.js"></script>	
		<!-- mixitup JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/jquery.mixitup.js"></script>	
		<!-- meanmenu JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/jquery.scrollUp.min.js"></script>
		<!-- social-likes JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/social-likes.min.js"></script>
		<!-- venobox JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/venobox.js"></script>
		
		<!-- Nivo slider js
		============================================ --> 		
		<script src="<?php echo Site_url."/"; ?>lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="<?php echo Site_url."/"; ?>lib/home.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="<?php echo Site_url."/"; ?>js/main.js"></script> 
    </body>
</html>