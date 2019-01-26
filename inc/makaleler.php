<div class="clear"></div>
<?php  
	$gelen=isset($url[1]) ? $url[1] : 1; 
	
?>
<div class="main-container"><div class="blog_header" style='background-image: url("<?php echo Site_url;?>/upload/makaleler_ust.jpg");  background-size: cover;'><?php echo $makaleler;?></div></div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="breadcrumbs"><a href="<?php echo Site_url; ?>">Home</a><span class="separator">&gt;</span><span> <?php echo $makaleler;?></span> <?php if(!is_numeric($gelen)){ $detay_yaz=mysql_fetch_object(mysql_query("select * from makaleler where url='$gelen'"));?><span class="separator">&gt;</span> <span><?php if($_SESSION["dil"]=="tr"){echo $detay_yaz->baslik_tr;}else{echo $detay_yaz->baslik_en;} ?></span>  <?php } ?>    </div>
		</div>
	</div>
	 
	<div class="row">  
	
	<?php 
		if(!is_numeric($gelen)){
			 $detay_yaz=mysql_fetch_object(mysql_query("select * from makaleler where url='$gelen'"));
			 
				if($_SESSION["dil"]=="tr"){
					$baslik=$detay_yaz->baslik_tr;
					$icerik=$detay_yaz->icerik_tr;
					$makale_kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$detay_yaz->kategori'"));
					$kat=$makale_kat->baslik_tr; 
				}
				if($_SESSION["dil"]=="en"){
					$baslik=$detay_yaz->baslik_en;
					$icerik=$detay_yaz->icerik_en; 
					$makale_kat=mysql_fetch_object(mysql_query("select * from makaleler_kategori where url='$detay_yaz->kategori'"));
					$kat=$makale_kat->baslik_en;
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
			  <div class="col-md-12"> 
					<div class="single-blog post blog-fullwidth">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="post-thumbnail">
									<div class="post-meta ontop">
										<span class="entry-date"><span class="day"><?php echo $tarih[0];?></span><span class="month"><?php echo $ay;?></span></span>	
										<div class="entry-comment"><a href=""><span>3</span> comments</a></div>
									</div>
									<a href="<?php echo Site_url;?>/makaleler/<?php echo  $detay_yaz->url; ?>"><img src="<?php echo Site_url;?>/upload/makaleler/<?php echo  $detay_yaz->resim; ?>" alt="blog post image" /></a>
								</div> 
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="postinfo-wrapper">
									<div class="post-date"><span class="day">10</span><span class="month">Mar</span></div>
									<div class="post-info">
										<h1 class="blog-post-title"><a ><?php echo $baslik; ?></a></h1>
										<div class="entry-meta-small"><span class="author vcard"> <a title="<?php echo $kat;?>" href="<?php echo Site_url;?>/kategori/<?php echo $makale_kat->url;?>" class="url fn n"><?php echo $kat;?></a>  /  <a title="<?php echo $kat;?>" href="<?php echo Site_url;?>/yazar/<?php echo $detay_yaz->yazar;?>" class="url fn n"><?php echo $detay_yaz->yazar;?></a></span>  </div>
										<div class="entry-summary"><p style="text-align: justify;"><?php echo $icerik; ?></p></div>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
			   
	<?php 
		}else{  
		?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
					<div class="single-blog post">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="post-thumbnail">
									<div class="post-meta ontop">
										<span class="entry-date"><span class="day"><?php echo $tarih[0];?></span><span class="month"><?php echo $ay;?></span></span>	
										<div class="entry-comment"><a href=""><span>3</span> comments</a></div>
									</div>
									<a href="<?php echo Site_url;?>/makaleler/<?php echo  $yaz->url; ?>"><img src="<?php echo Site_url;?>/upload/makaleler/<?php echo  $yaz->resim; ?>" alt="blog post image" /></a>
								</div> 
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="postinfo-wrapper">
									<div class="post-info">
										<h1 class="blog-post-title"><a href="<?php echo Site_url;?>/makaleler/<?php echo $yaz->url;?>"><?php echo $baslik; ?></a></h1>
										<div class="entry-meta-small"><span class="author vcard"><a title="<?php echo $kat;?>" href="<?php echo Site_url;?>/makaleler" class="url fn n"><?php echo $kat;?></a></span></div>
										<div class="entry-summary"><p style="text-align: justify;"><?php echo $icerik; ?></p></div>
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