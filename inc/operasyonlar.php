<?php 
	$gelen=isset($url[1]) ? $url[1] : "";  
	$sorgu=mysql_fetch_object(mysql_query("select * from operasyonlar where url='$gelen'"));
	if(mysql_num_rows(mysql_query("select * from operasyonlar where url='$gelen'"))){
		
	}else{
		$sorgu=mysql_fetch_object(mysql_query("select * from operasyonlar "));
	}
	if($_SESSION["dil"]=="tr"){
		$baslik=$sorgu->baslik_tr;
		$icerik=$sorgu->icerik_tr;
	}
	if($_SESSION["dil"]=="en"){
		$baslik=$sorgu->baslik_en;
		$icerik=$sorgu->icerik_en;
	}
?>
<div class="clear"></div>
<!-- main-container full-width -->
<div class="entry-header" style='height:50%; background-image: url("<?php echo Site_url;?>/upload/operasyonlarimiz_ust.jpg"); background-size: cover;'><h1 class="entry-title"><?php echo $baslik; ?></h1></div>
<!-- sample-page start -->
<div class="sample-page-area">
	<div class="container">
		<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="breadcrumbs"><a href="<?php echo Site_url; ?>"><?php echo $anasayfa;?></a><span class="separator">&gt;</span><span><?php echo $operasyonlar; ?></span><span class="separator">&gt;</span><span><?php echo $baslik; ?></span></div></div></div>
		<div class="row">
			<!-- left sidebar start --> 
			<div class="col-md-12"> 
					<div class="single-blog post blog-fullwidth">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="post-thumbnail">
									<div class="post-meta ontop">
										<span class="entry-date"><span class="day"><?php echo $tarih[0];?></span><span class="month"><?php echo $ay;?></span></span>	
										<div class="entry-comment"><a href=""><span>3</span> comments</a></div>
									</div>
									<div class="post-slider indicator-style"> 
									<?php  
										$slider_sorgu=mysql_query("select * from slider_yazi where kategori='operasyonlar' and kategori_id='$sorgu->id'");
										if(mysql_num_rows($slider_sorgu)){
											while($slider_yaz=mysql_fetch_object($slider_sorgu)){
												echo '<a href="#"><img src="'.Site_url.'/upload/yazi_slider/'.$slider_yaz->resim.'" alt=""></a> ';
											}
										}else{
											echo '<a ><img src="'.Site_url.'/upload/operasyonlar/'.$sorgu->resim.'" alt=""></a> ';
										}
									?> 
									</div> 
									 
									
								</div> 
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="postinfo-wrapper">
									<div class="post-date"><span class="day">10</span><span class="month">Mar</span></div>
									<div class="post-info">
										<h1 class="blog-post-title"><a ><?php echo $baslik; ?></a></h1> 
										<div class="entry-summary"><p style="text-align: justify;"><?php echo $icerik; ?></p></div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div> 
		</div>
	</div>
</div>  

<br><br>