<div class="clear"></div>
<?php  
	$gelen=isset($url[1]) ? $url[1] : 1; 
	
?>
<div class="main-container"><div class="blog_header"><?php echo $makaleler;?></div></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="breadcrumbs"><a href="<?php echo Site_url; ?>">Home</a><span class="separator">&gt;</span><span> <?php echo $makaleler;?></span></div>
		</div>
	</div>
	<div class="row">
		<!-- left sidebar start -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="left-sidebar-area">
				<!-- widget-categories start -->
				<aside class="widget widget-search">
					<h3 class="sidebar-title blog"><?php echo $ara;?></h3>
					<form >
						<div class="widget-form">
							<input type="text" placeholder="search">
							<button type="submit"><i class="fa fa-search"></i></button>					
						</div>
					</form>
				</aside>
				<!-- widget-categories end -->
				<!-- widget-categories start -->
				<aside class="widget widget-categories">
					<h3 class="sidebar-title blog"><?php echo $kategori;?></h3>
					<ul class="sidebar-menu">
						<?php   
							$makaleler_kategori_sorgu=mysql_query("select * from makaleler_kategori");
							while($makaleler_kategori_yaz=mysql_fetch_object($makaleler_kategori_sorgu)){
								if($_SESSION["dil"]=="tr"){
									$baslik=$makaleler_kategori_yaz->baslik_tr; 
								}
								if($_SESSION["dil"]=="en"){
									$baslik=$makaleler_kategori_yaz->baslik_en; 
								}
								$toplam=mysql_num_rows(mysql_query("select * from makaleler where kategori='$makaleler_kategori_yaz->url'"));
								echo "<li><a href=''>$baslik</a> <span class='count'>($toplam)</span></li>";
							}
						?>
					</ul>
				</aside>
				<!-- widget-categories end -->
				<!-- widget-recents-post start -->
				<aside class="widget widget-recents">
					<h3 class="sidebar-title blog"><?php echo $son_yazi;?></h3>
					<div class="recent-posts">
						<ul>
							<?php 
								$recent_sorgu=mysql_query("select * from makaleler order by id desc limit 0,5");
								while($recent_yaz=mysql_fetch_object($recent_sorgu)){
									if($_SESSION["dil"]=="tr"){
										$baslik=$recent_yaz->baslik_tr;
									}
									if($_SESSION["dil"]=="en"){
										$baslik=$recent_yaz->baslik_en;
									}
									 
									echo '
											<li>
												<div class="post-wrapper">
													<div class="post-thumb"><a href="#"><img src="'.Site_url.'/upload/makaleler/'.$recent_yaz->resim.'" alt="" ></a></div>
													<div class="post-info">
														<h3 class="post-title recent-post-s"><a href="#">'.$baslik.'</a></h3>
														<div class="post-date recent-post-s">'.$recent_yaz->tarih.'</div>
													</div>
												</div>
											</li>';
								}
							
							?>
							 
						</ul>
					</div>
				</aside>
				<!-- widget-recents-post end -->
				<!-- widget-comments start -->
				<aside class="widget widget-comments">
					<h3 class="sidebar-title blog"><?php echo $yorum;?></h3>
					<div class="recent-comments">
						<ul> 
							<?php 
								$yorum_sorgu=mysql_query("select * from yorumlar order by id desc limit 0,5");
								while($yorum_yaz=mysql_fetch_object($yorum_sorgu)){
									$makale_url=mysql_fetch_object(mysql_query("select * from makaleler where id='$yorum_yaz->makale_id'"))->url;
									echo '
											<li>
												<div class="post-wrapper">
													<div class="post-thumb"><a href="'.Site_url.'/makaleler/'.$makale_url.'"><img src="http://png.clipart.me/graphics/thumbs/549/cute-cat-vector_54993094.jpg" alt="" ></a></div>
													<div class="post-info"><h5 class="athour-name comments-s"><a href="'.Site_url.'/makaleler/'.$makale_url.'">'.$yorum_yaz->ad_soyad.'</a></h5><div class="comments"> '.substr($yorum_yaz->icerik,0,50).'... </div></div>
												</div>
											</li>';
								}
							?>
						</ul>
					</div>
				</aside>
				<!-- widget-comments end -->
				<!-- Popular Tags start -->
				<aside class="widget tagcloud-list">
					<h3 class="sidebar-title blog">Popular Tags</h3>          
					<div class="sidebar-menu tagcloud">
						<a href="#">blouse</a>
						<a href="#">camera</a>
						<a href="#">clothes</a>
						<a href="#">electronic</a>
						<a href="#">fashion</a>
						<a href="#">handbag</a>
						<a href="#">hat</a>
						<a href="#">laptop</a>
						<a href="#">phone</a>
						<a href="#">tablet</a>
						<a href="#">television</a>
					</div>	
				</aside>
				<!-- Popular Tags end -->
				<!-- widget-Blog-Archives start -->
				<aside class="widget widget-archives">
					<h3 class="sidebar-title blog">Blog Archives</h3>
					<ul class="sidebar-menu">
						<li><a href="#">March 2015</a> <span class="count">(9)</span></li>
						<li><a href="#">December 2014</a> <span class="count">(7)</span></li>
						<li><a href="#">November 2014</a> <span class="count">(2)</span></li>
						<li><a href="#">September 2014</a> <span class="count">(2)</span></li>
						<li><a href="#">August 2014</a> <span class="count">(2)</span></li>
					</ul>
				</aside>
				<!-- widget-Blog-Archives end -->
			</div>
		</div>
		<!-- left sidebar end -->
		<?php 
		if(!is_numeric($gelen)){
			 $detay_yaz=mysql_fetch_object(mysql_query("select * from makaleler where url='$gelen'"));
			 
				if($_SESSION["dil"]=="tr"){
					$baslik=$detay_yaz->baslik_tr;
					$icerik=$detay_yaz->icerik_tr;
					$kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$detay_yaz->kategori'"))->baslik_tr;
				}
				if($_SESSION["dil"]=="en"){
					$baslik=$detay_yaz->baslik_en;
					$icerik=$detay_yaz->icerik_en;
					$kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$detay_yaz->kategori'"))->baslik_en;
				} 
				$tarih=$detay_yaz->tarih;  
				 if($tarih != null){
					$tarih = rtrim($tarih, "/");
					$tarih = explode("/", $tarih);
				}else{
				   unset($tarih); 
				}
				if($_SESSION["dil"]=="tr"){
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
				}else{
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
				
 
			 ?>
			 
			 <title> <?php echo $baslik; ?> </title>
			 <div class="col-xs-12 col-sm-12 col-md-9">  
				 <div class="single-blog post blog-fullwidth">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="post-thumbnail">
								 
								<a href="<?php echo Site_url;?>/makaleler/<?php echo  $detay_yaz->url; ?>"><img src="<?php echo Site_url;?>/upload/makaleler/<?php echo  $detay_yaz->resim; ?>" alt="blog post image" /></a>
							</div> 
						</div> 
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="postinfo-wrapper">
								<div class="post-date"><span class="day"><?php echo $tarih[0];?></span><span class="month"><?php echo $ay;?></span></div>
								<div class="post-info">
									<h1 class="blog-post-title"><a href="#"><?php echo $baslik; ?></a></h1>
									<div class="entry-meta-small"> <span class="author vcard"><a title="<?php echo $kat;?>" href="<?php echo Site_url;?>/makaleler" class="url fn n"><?php echo $kat;?></a></span>  </div>
									<div class="entry-summary"><p><?php echo $icerik; ?></p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			  
			 <?php 
		}else{  
		?>
			 <title> <?php echo $baslik; ?> </title>
		<div class="col-xs-12 col-sm-12 col-md-9">  
				<?php
				$limit = 10;
				$sira=1;
				//$page = @$_GET["page"];
				$page =$gelen;  
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
						if($page > $toplamsayfa){ 
							echo '<script language="javascript">location.href="'.Site_url.'/makaleler";</script>';
						}
					}
				}else{
					while ($yaz = mysql_fetch_object($yazdir_sorgu)){
						if($_SESSION["dil"]=="tr"){
							$baslik=$yaz->baslik_tr;
							$icerik=$yaz->icerik_tr;
							$kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$yaz->kategori'"))->baslik_tr;
						}
						if($_SESSION["dil"]=="en"){
							$baslik=$yaz->baslik_en;
							$icerik=$yaz->icerik_en;
							$kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$yaz->kategori'"))->baslik_en;
						}
						$karakter=700;
						if(strlen($icerik)>=$karakter){
							if(preg_match('/(.*?)\s/i',substr($icerik,$karakter),$dizi))$icerik=substr($icerik,0,$karakter+strlen($dizi[0]))."...";  
						}else{
							$icerik .="";
						}
						
						$tarih=$yaz->tarih;  
						 if($tarih != null){
							$tarih = rtrim($tarih, "/");
							$tarih = explode("/", $tarih);
						}else{
						   unset($tarih); 
						}
						if($_SESSION["dil"]=="tr"){
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
						}else{
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
					?> 
						<div class="single-blog post blog-fullwidth">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="post-thumbnail">
										<div class="post-meta ontop">
											<span class="entry-date"><span class="day">10</span><span class="month">March</span></span>	
											<div class="entry-comment"><a href=""><span>3</span> comments</a></div>
										</div>
										<a href="<?php echo Site_url;?>/makaleler/<?php echo  $yaz->url; ?>"><img src="<?php echo Site_url;?>/upload/makaleler/<?php echo  $yaz->resim; ?>" alt="blog post image" /></a>
									</div> 
								</div> 
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="postinfo-wrapper">
										<div class="post-date"><span class="day"><?php echo $tarih[0];?></span><span class="month"><?php echo $ay;?></span></div>
										<div class="post-info">
											<h1 class="blog-post-title"><a href="#"><?php echo $baslik; ?></a></h1>
											<div class="entry-meta-small"> <span class="author vcard"><a title="<?php echo $kat;?>" href="<?php echo Site_url;?>/makaleler" class="url fn n"><?php echo $kat;?></a></span>  </div>
											<div class="entry-summary"><p><?php echo $icerik; ?></p></div>
											<a href="<?php echo Site_url;?>/makaleler/<?php echo $yaz->url;?>" class="readmore"><?php echo $devam;?><i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php 
					}  
				}
				?> 
			 
			<div class="clear"></div>
			<!-- pagination start -->
			<div class="blog-pagination">
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<nav class="projects-pagination">
						<ul class="page-numbers"> 
							<?php
							if($page<=$toplamsayfa){
								if($count > $limit) :
								$x = 2;
								$lastP = ceil($count/$limit);
								if($page > 1){
									$onceki = $page-1;
									echo "<li><a  class='previous page-numbers' href='".Site_url."/makaleler/$onceki'> &#171; </a></li>";
								}
								if($page==1) echo '<li><span class="page-numbers current">1</span></li>';
								else echo "<li><a href='".Site_url."/makaleler' > 1 </a></li>";
								if($page-$x > 2) {
									echo "<li><a > ... </a></li> ";
									$i = $page-$x;
								} else {
									$i = 2;
								}
								for($i; $i<=$page+$x; $i++) {
									if($i==$page) echo '<li><span class="page-numbers current">'.$i.'</span></li>';
									else echo "<li><a href='".Site_url."/makaleler/$i' >$i</a></li>";
									if($i==$lastP) break;
								}
								if($page+$x < $lastP-1) {
									echo "<li><a > ... </a></li>";
									echo "<li><a href='".Site_url."/makaleler/$lastP' >$lastP</a></li>";
								} elseif($page+$x == $lastP-1) {
									echo "<li><a href='".Site_url."/makaleler/$lastP' >$lastP</a></li>";
								}
								if($page < $lastP){
									$sonraki = $page+1;
									echo "<li><a  class='next page-numbers'  href='".Site_url."/makaleler/$sonraki'> &#187; </a></li>";
								}
								endif;
							}
							?>
							
							
						</ul>
					</nav>
				</div>
			</div>
			<!-- pagination end --> 
			
			
			<?php
				}
			?>
 
			
		</div>
	</div>
</div>