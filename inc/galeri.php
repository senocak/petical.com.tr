  
<div class="clear"></div> 
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
									<?php 
									$galeri_sorgu=mysql_query("select * from galeri_kategori");
									while($galeri_yaz=mysql_fetch_object($galeri_sorgu)){
										if($_SESSION["dil"]=="tr")$baslik=$galeri_yaz->baslik_tr;
										if($_SESSION["dil"]=="en")$baslik=$galeri_yaz->baslik_en;
										echo '<li class="filter" data-filter=".'.$galeri_yaz->id.'">'.$baslik.'</li>';
									}
									?>
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
										$sorgu=mysql_query("select * from galeri order by id desc");
										while($yaz=mysql_fetch_object($sorgu)){
										if($_SESSION["dil"]=="tr")$baslik=$yaz->baslik_tr;
										if($_SESSION["dil"]=="en")$baslik=$yaz->baslik_en;
											//Resim 680 X 400
											echo 	'<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 mix '.$yaz->galeri_id.'">
														<div class="single-project">
															<a href="'.Site_url.'/upload/galeri/'.$yaz->resim.'" class="lightbox_trigger" class="project-permalink" >
																<span class="project-img"><img src="'.Site_url.'/upload/galeri/'.$yaz->resim.'" alt="project image" /></span>
																<span class="project-info">
																	<span class="project-date">'.$baslik.'</span> 
																</span>
															</a>
														</div>
													</div>';
										} 
										?> 
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div> 
<br>

