<ul class="mega_main_menu_ul" id="mega_main_menu_ul_first">
	<li class="menu-item active"><a class="item_link" href="<?php echo Site_url;?>"><span class="link_content"><span class="link_text"><?php echo $anasayfa;?></span></span></a></li>
	<li class="menu-item"><a class="item_link" href="#"><span class="link_content"><span class="link_text"><?php echo $kurumsal;?></span></span></a>
		<ul class="mega_dropdown"> 
			<?php 
			$kurumsal_sorgu=mysql_query("select * from kurumsal order by siralama asc");
			while($kurumsal_yaz=mysql_fetch_object($kurumsal_sorgu)){
				if($_SESSION["dil"]=="tr"){$baslik=$kurumsal_yaz->baslik_tr;}
				if($_SESSION["dil"]=="en"){$baslik=$kurumsal_yaz->baslik_en;}
				echo '<li class="menu-item"><a class="item_link" href="'.Site_url.'/kurumsal/'.$kurumsal_yaz->url.'"><span class="link_content"><span class="link_text">'.$baslik.'</span></span></a></li>';
			}
			?>
			<li class="menu-item"><a class="item_link" href="<?php echo Site_url;?>/ekibimiz"><span class="link_content"><span class="link_text"><?php echo $ekibimiz;?> </span></span></a></li>
			<li class="menu-item"><a class="item_link" href="<?php echo Site_url;?>/sanal_tur"><span class="link_content"><span class="link_text"><?php echo $sanal_tur;?></span></span></a></li>
		</ul>
	</li>
	<li class="menu-item">
		<a class="item_link" href="#"><span class="link_content"><span class="link_text"><?php echo $hizmetlerimiz;?> </span></span></a>
		<div class="megamenu_active">
			<ul class="mega_dropdown megamenu">
				<?php 
				$hizmet_sorgu=mysql_query("select * from hizmetlerimiz_kategori order by siralama asc");
				while($hizmet_yaz=mysql_fetch_object($hizmet_sorgu)){
					if($_SESSION["dil"]=="tr"){$k_baslik=$hizmet_yaz->kategori_ismi_tr;}
					if($_SESSION["dil"]=="en"){$k_baslik=$hizmet_yaz->kategori_ismi_en;}
					echo '	<li class="menu-item">
								<a class="item_link" ><span class="link_content"><span class="link_text">'.$k_baslik.'</span></span></a>
								<ul class="mega_dropdown megamenu">';
									$hizmet_sorgu2=mysql_query("select * from hizmetlerimiz where kategori_id='$hizmet_yaz->id' order by siralama asc");
									while($hizmet_yaz2=mysql_fetch_object($hizmet_sorgu2)){
										if($_SESSION["dil"]=="tr"){$h_baslik=$hizmet_yaz2->baslik_tr;}
										if($_SESSION["dil"]=="en"){$h_baslik=$hizmet_yaz2->baslik_en;}
										echo '<li class="menu-item"><a class="item_link" href="'.Site_url.'/hizmetlerimiz/'.$hizmet_yaz2->url.'"><span class="link_content"><span class="link_text">'.$h_baslik.'</span></span></a></li>';
									}
							echo '</ul>
							</li> ';
				}
				?>
			</ul>
		</div>
	</li>
	<li class="menu-item">
		<a class="item_link" href="#"><span class="link_content"><span class="link_text"><?php echo $donanımlarımız;?> </span></span></a>
		<ul class="mega_dropdown"> 
			<?php 
			$donanim_sorgu=mysql_query("select * from donanimlarimiz order by siralama asc");
			while($donanim_yaz=mysql_fetch_object($donanim_sorgu)){
				if($_SESSION["dil"]=="tr"){$baslik=$donanim_yaz->baslik_tr;}
				if($_SESSION["dil"]=="en"){$baslik=$donanim_yaz->baslik_en;}
				
				echo "<li class='menu-item'><a class='item_link' href='".Site_url."/donanimlarimiz/$donanim_yaz->url'><span class='link_content'><span class='link_text'>$baslik</span></span></a></li>";
			}
			?>
		</ul>
	</li>
	<li class="menu-item">
		<a class="item_link" href="#"><span class="link_content"><span class="link_text"><?php echo $operasyonlar;?> </span></span></a>
		<ul class="mega_dropdown"> 
			<?php 
			$operasyonlar_sorgu=mysql_query("select * from operasyonlar order by siralama asc");
			while($operasyonlar_yaz=mysql_fetch_object($operasyonlar_sorgu)){
				if($_SESSION["dil"]=="tr"){$baslik=$operasyonlar_yaz->baslik_tr;}
				if($_SESSION["dil"]=="en"){$baslik=$operasyonlar_yaz->baslik_en;}
				
				echo '<li class="menu-item"><a class="item_link" href="'.Site_url.'/operasyonlar/'.$operasyonlar_yaz->url.'"><span class="link_content"><span class="link_text">'.$baslik.'</span></span></a></li>';
			}
			?>
		</ul>
	</li>
	<li class="menu-item"><a class="item_link" href="<?php echo Site_url;?>/makaleler"><span class="link_content"><span class="link_text"><?php echo $makaleler;?> </span></span></a></li>
	<li class="menu-item"><a class="item_link" href="<?php echo Site_url;?>/iletisim"><span class="link_content"><span class="link_text"><?php echo $iletisim;?> </span></span></a></li>
</ul>