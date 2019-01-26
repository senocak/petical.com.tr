<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=996541283730156";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="footer">
	<!-- Footer top start-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="footer-top-left"> 
						<div class="subscribe-form-area">
							<form action="#" method="post" class="subscribe-form">
								<input type="text" placeholder="<?php echo $abone_ol;?>..." title="<?php echo $abone_ol;?>..." name="text-field" id="text-field" />
								<input type="submit" value="<?php echo $gonder;?>" />
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="footer-top-right">
						<div class="social-icon-area">
							<h2 class="widget-title"><?php echo $takip;?></h2>
							<ul class="social-icons">
								<li><a href="<?php echo $ayarlar->facebook;?>" data-placement="top" data-toggle="tooltip" data-original-title="Facebook" class="facebook social-icon" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo $ayarlar->twitter;?>" data-placement="top" data-toggle="tooltip" data-original-title="Twitter" class="twitter social-icon" target="_blank" ><i class="fa fa-twitter"></i></a></li> 
								<li><a href="#" data-placement="top" data-toggle="tooltip" data-original-title="Google-plus" class="google-plus social-icon" target="_blank" ><i class="fa fa-google-plus"></i></a></li> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer top end-->
	<!-- Footer middle start-->
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-middle-menu">
						<h3 class="widget-title"></h3>
						<div class="menu-our-services-container"><img src="<?php echo Site_url."/"; ?>img/Peticall.jpg"/></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-middle-menu">
						<h3 class="widget-title"></h3>
						<div class="menu-my-account-container"  style=" height:193px;" ><div class="fb-page" data-href="https://www.facebook.com/Petical-Hayvan-Hastanesi-205144622868880" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-middle-menu">
						<h3 class="widget-title"></h3>
						<div class="menu-infomation-container"><img style="background-color: white; height:193px;" src="<?php echo Site_url."/"; ?>admin/images/footer3.png"/></div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- Footer middle end-->
	<!-- Footer bottom start-->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12 fix">
					<div class="bottom_menu">
						<div class="menu-customer-care-container">
							<nav>
								<ul class="nav_menu">
									<li class="menu-item"><a href="<?php echo Site_url;?>/iletisim">İletişim</a></li>
									<li class="menu-item"><a href="<?php echo Site_url;?>">Site Haritası</a></li>
									<li class="menu-item"><a href="<?php echo Site_url;?>">Gizlilik Politikası</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="copyright-info">Copyright &copy; <?php echo date("Y");?> <a href="http://bilgimedya.com.tr/">BilgiMedya</a> <?php echo $footer;?></div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12"><div class="bottom-right"></div></div>
			</div>
		</div>
	</div>
	<!-- Footer bottom end-->
</div>