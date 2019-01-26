<?php 
	$gelen=isset($url[1]) ? $url[1] : ""; 
	if($gelen==""){
?>
<div class="clear"></div>
<!-- main-container full-width -->
<div class="main-container">
	<div class="portfolio_header" style="background-image: url('<?php echo Site_url;?>/upload/ekibimiz/ekibimiz.jpg');"><?php echo $ekibimiz;?></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="breadcrumbs"><a href=" <?php echo Site_url; ?>">Home</a><span class="separator">&gt;</span><span> <?php echo $ekibimiz;?></span></div>
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							<div class="filter_menu">
								<ul>
									<li class="filter" data-filter="all">All</li>
									<li class="filter" data-filter=".fashion">Fashion</li>
									<li class="filter" data-filter=".web">Web Design</li>
									<li class="filter" data-filter=".photography">Photography</li>
									<li class="filter" data-filter=".sun-city">Sun City</li>
									<li class="filter" data-filter=".art-glass">Art Glass</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="project-list">
								<div class="row">
									<div class="project-list-filter-active"> 
										<?php  
										$sorgu=mysql_query("select * from ekibimiz order by siralama asc");
										while($yaz=mysql_fetch_object($sorgu)){
											//Resim 480 X 635
											echo 	'<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 mix glass">
														<div class="single-project">
															<a href="'.Site_url.'/ekibimiz/'.$yaz->url.'" class="project-permalink">
																<span class="project-img"><img src="'.Site_url.'/upload/ekibimiz/'.$yaz->resim.'" alt="project image" /></span>
																<span class="project-info">
																	<span class="project-date">'.$yaz->gorevi.'</span>
																	<span class="project-title">'.$yaz->ad_soyad.'</span>
																</span>
															</a>
														</div>
													</div>';
										}
										
										?>
										<!-- single product end -->
										 
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- pagination  
					<div class="row">
						<div class="col-md-12 text-center">
							<nav class="projects-pagination">
								<ul class="page-numbers">
									<li><span class="page-numbers current">1</span></li>
									<li><a href="#" class="page-numbers">2</a></li>
									<li><a href="#" class="next page-numbers"><i class="fa fa-chevron-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
					  pagination end-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}else{
		$say=mysql_fetch_object(mysql_query("select * from ekibimiz where url='$gelen'"));
		if(!$say){
			$say=mysql_fetch_object(mysql_query("select * from ekibimiz order by siralama asc limit 0,1"));
		}
		?>
		<div class="clear"></div>
		<!-- main-container full-width -->
		<div class="main-container">
			<div class="portfolio_header"><?php echo   $say->ad_soyad;?></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
						<div class="single-featured">
							<a class="venobox" data-gall="myGallery" href="<?php echo Site_url;?>/upload/ekibimiz/<?php echo   $say->resim;?>"><img src="<?php echo Site_url;?>/upload/ekibimiz/<?php echo   $say->resim;?>" alt="Portfolio image" /></a>
						</div>
					</div> 
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="project_date">
							
							<span class="day">28</span>
							<span class="separator">/</span>
							<span class="month">Jan</span>
							
							
							<div class="social-sharing">
								<ul class="social-icons">
									<li><a target="_blank" class="facebook social-icon" data-original-title="Facebook" data-toggle="tooltip" data-placement="top" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a target="_blank" class="twitter social-icon" data-original-title="Twitter" data-toggle="tooltip" data-placement="top" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a target="_blank" class="google-plus social-icon" data-original-title="Google-plus" data-toggle="tooltip" data-placement="top" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="summary fix">
							<h1 class="project_title"><?php echo   $say->ad_soyad;?></h1>
							<div class="single-project-description fix">
								<p><?php echo   $say->icerik;?> </p>
							</div>
							<!--<div class="project-meta">
								<div class="categories">
									<h3>Categories</h3>
									<ul class="single-project-categories">
										<li><a href="#">Art Glass</a></li>
										<li><a href="#">Sun City</a></li>
									</ul>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<!--
				<div class="related-product-area">
					<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 class="related-title"><?php echo $ilgili_projeler; ?></h3></div></div>
					<div class="project-list">
						<div class="row">
						
							<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
								<div class="single-project">
									<a href="#" class="project-permalink">
										<span class="project-img"><img src="img/product/25.jpg" alt="project image" /></span>
										<span class="project-info"><span class="project-date">January 28, 2015</span><span class="project-title">Augue lorem lacinia</span></span>
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				--> 
			</div>
		</div> 
<?php } ?>
<br>
<br>