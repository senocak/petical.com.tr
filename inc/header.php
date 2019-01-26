<script src='//assets.codepen.io/assets/editor/live/console_runner-ba402f0a8d1d2ce5a72889b81a71a979.js'></script> 
<style>    
.btn-close {
  color: #aaa;
  font-size: 30px;
  text-decoration: none;
  position: absolute;
  right: 5px;
  top: 0;
}
.btn-close:hover {
  color: #919191;
}

.modal:before {
  content: "";
  /*display: none;*/
  background: transparent;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
}
.modal:target:before {
  -webkit-transition: -webkit-transform 0.9s ease-out;
  -moz-transition: -moz-transform 0.9s ease-out;
  -o-transition: -o-transform 0.9s ease-out;
  transition: transform 0.9s ease-out;
  z-index: 10;
  background: rgba(0, 0, 0, 0.6);
  /*display: block;*/
}

.modal:target + .modal-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 20%;
}

.modal-dialog {
  background: #fefefe;
  border: #333 solid 1px;
  border-radius: 5px;
  margin-left: -200px;
  position: fixed;
  left: 50%;
  top: -100%;
  z-index: 11;
  width: 360px;
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
}

.modal-body {
  padding: 20px;
}

.modal-header,
.modal-footer {
  padding: 10px 20px;
}

.modal-header {
  border-bottom: #eee solid 1px;
}
.modal-header h2 {
  font-size: 20px;
}

.modal-footer {
  border-top: #eee solid 1px;
  text-align: right;
}
</style>    
<a href="#" class="modal" id="siparis" aria-hidden="true"></a>
<div class="modal-dialog">
	<div class="modal-header"> Modal in CSS? <a href="#" class="btn-close" aria-hidden="true">×</a></div>
	<div class="modal-body"><p>One modal example here! :D</p></div>
	<div class="modal-footer"><a href="#" class="btn">Kapat!</a></div>
</div>


<header>
	<div class="header-container">
		<!--header top start-->
		<div class="header-top-area">
			<div class="container">
				<div class="top-bar">
					<div class="topbar-content">
						<div class="header-email widget hidden-xs"><i class="fa fa-envelope"></i><strong><?php echo $posta;?>:</strong> <a href="mailto:<?php echo $ayarlar->eposta;?> "><?php echo $ayarlar->eposta;?></a></div>
						<div class="header-phone widget hidden-xs" ><i class="fa  fa-phone"></i><strong><?php echo $telefon;?>:</strong> <a href="tel:<?php echo $ayarlar->telefon;?>"><?php echo $ayarlar->telefon;?> (pbx)</a></div>
						<div class="lang_sel_list_horizontal hidden-xs hidden-sm" id="lang_sel_list">
							<?php if($_SESSION['dil']=="tr"){ ?><ul><li class="icl-en"><a class="lang_sel_sel" href="<?php echo Site_url;?>/en"><img title="English" alt="en" src="<?php echo Site_url;?>/admin/images/dil/en.png" class="iclflag">&nbsp;</a></li></ul><?php }?>
							<?php if($_SESSION['dil']=="en"){ ?><ul><li class="icl-en"><a class="lang_sel_sel" href="<?php echo Site_url;?>/tr"><img title="Türkçe" alt="en" src="<?php echo Site_url;?>/admin/images/dil/tr.png"  class="iclflag">&nbsp;</a></li></ul><?php }?>
 						</div>
						<div class="cart-total">
							<ul><li><a  href="#siparis"  class="cart-toggler"><span class="cart-no"><i class="fa fa-plus"></i><?php echo $randevu;?></span></a></li></ul>
							<!--<div class="mini_cart_inner">
								<ul class="cart_list">
									<li>
										<a class="product-image" href="#"><img src="<?php echo Site_url."/"; ?>img/product/44.jpg" alt="cart-pro-img"><span class="quantity">2</span></a>
										<div class="product-details">
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-times-circle"></i></a>
											<a class="product-name" href="#">Muayene</a>
											<span class="cart-price-box"><span class="amount">Saat 15:00</span></span>	
										</div>
									</li>
								</ul> 
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header top end-->
		<!--header middle start-->
		<div class="header-middle-area">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 text-center fix">
						<div class="global-table">
							<div class="global-row">
								<div class="global-cell">
									<div class="logo">
										<a rel="home" title="Assyrian" href="<?php echo Site_url;?>"><img alt="" src="<?php echo Site_url;?>/upload/<?php echo $ayarlar->logo;?>"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--header middle end-->
	   <?php include "inc/menu_normal.php"; ?>
	</div>
</header>