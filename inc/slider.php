<section class="slider-area">
	<div class="bend niceties preview-2">
		<div id="ensign-nivoslider" class="slides">	 
			<?php 
			$slider_sorgu=mysql_query("select * from slider order by siralama asc");
			while($slider_yaz=mysql_fetch_object($slider_sorgu)){
				echo "<img src='".Site_url."/upload/slider/$slider_yaz->resim' alt='' title='#slider-direction-$slider_yaz->id'  />";
			}
			?> 
		</div>
		<?php 
			$slider_sorgu=mysql_query("select * from slider order by siralama asc");
			while($slider_yaz=mysql_fetch_object($slider_sorgu)){
				
				if($_SESSION["dil"]=="tr"){
					$baslik=$slider_yaz->baslik_tr;
					$satir_1=$slider_yaz->satir_1_tr;
					$satir_2=$slider_yaz->satir_2_tr;
				}
				
				if($_SESSION["dil"]=="en"){
					$baslik=$slider_yaz->baslik_en;
					$satir_1=$slider_yaz->satir_1_en;
					$satir_2=$slider_yaz->satir_2_en;
				}
				 
				echo "<div id='slider-direction-$slider_yaz->id' class='t-cn slider-direction slider-one'> 
						<div class='layer-1-1'><h3 class='title1'>$baslik</h3></div> 
						<div class='layer-1-2'><h3 class='title2'>$satir_1</div> 
						<div class='layer-1-3'><p class='title3'>$satir_2</p></div>
						<div class='layer-1-4'><a href='$slider_yaz->url' class='title4'>Devamını Gör <i class='fa fa-arrow-right'></i></a></div>	";
					$slider_thumb_sorgu=mysql_query("select * from slider_thumb where slider_id='$slider_yaz->id' order by siralama asc");
					if(mysql_num_rows($slider_thumb_sorgu)>0){
						while($slider_thumb_yaz=mysql_fetch_object($slider_thumb_sorgu)){ 
						$slider_thumb_yaz->siralama=5+($slider_thumb_yaz->siralama);
							echo "<div class='layer-2-$slider_thumb_yaz->siralama'><img src='".Site_url."/upload/slider_thumb/$slider_thumb_yaz->resim'></div>";
						}
					}
					 echo "</div>";
			}
			?>
	</div>
</section>