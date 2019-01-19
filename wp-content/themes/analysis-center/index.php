<?php
/**
 * Template Name: home page
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Analysis_Center
 */

get_header();

global $wpdb;
// get_voucher();
?>
	<div id="primary" class="content-area home-page">
		<main id="main" class="site-main">
			<div class="container">
				<div class="search-list">
				</div>
				<iframe width="100%" height="35" src="https://lap.lazada.com/searchbar/searchbar.php?aff_id=182393&country=vn" frameborder="0" scrolling="no"></iframe>
			</div>

			<div class="container">
				<h2> Flashsale Shopee Freeship</h2>
				<a href="https://shorten.asia/W4V8hNBT" target="_blank"> <img src="https://cf.shopee.vn/file/a44887606a8703255d56d15c249f03d2"/> </a>
				<h2>flashSale Sendo với hàng ngàn sản phẩm giá trị</h2>
				<a href="https://shorten.asia/bnjATUrB" target="_blank">
					<img src="http://mgghot.com/wp-content/uploads/2018/11/f5g9k9.png" alt="sendo">
				</a>
				<h2>Flashsale Lazada khung giờ 12:00 và 00:00</h2>
				<a href="https://pages.lazada.vn/wow/i/vn/LandingPage/flashsale?offer_id=8981&affiliate_id=182393&offer_name=VN+Desktop+Redirect_0&affiliate_name=nguyenduc&transaction_id=102f9854e28eeea61ddea19372a590&offer_ref=_xxvo0000000at0000&aff_source=" target="_blank">
					<img src="https://laz-img-cdn.alicdn.com/images/ims-web/TB1jpB7o3HqK1RjSZFkXXX.WFXa.jpg_2200x2200q90.jpg_.webp">
				</a>
				<h2>Tiki Sắm tết huyền thoại</h2>
				<a href="https://shorten.asia/RTa3Bfk1" target="_blank">
					<img src="https://salt.tikicdn.com/ts/lp/a3/1c/85/15db38bccda4a0486100fc397b28fe3b.png">
				</a>
				<h2>Các Sản Phẩm Lazada Giảm giá nhiều nhất trong 2h qua</h2>
				<div class="product-list">
					<div class="row">

					<?php
					    $results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products ORDER BY last_update) T WHERE percent > 79 AND id_web = 1 ORDER BY `T`.`last_update` DESC LIMIT 100" );
					//$results = [];
					    foreach ( $results as $product )   {
					     	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
							 $datetime2 = new DateTime($product->last_update);
							 $diff = $datetime1->diff($datetime2);

							 if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 2){
							    ?>
								<?php 
									$class_item = '';

									if ($product->status == 0) {
										$class_item = 'hidden-item';
									}

									if(is_user_logged_in() && $product->status == 0) {
										$class_item = 'admin-hidden-item';
									}
								?>
								<div class="col-md-3 <?php echo $class_item; ?>">
									<?php 
										if(is_user_logged_in()) {
											?>
											<select class="select-option" data-id="<?php echo $product->id; ?>">
												<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
												<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
											</select>
											<?php
										}
									?>
									<div class="item">
										<div class="images-product">
											<a target="_self" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><img src="<?php echo $product->image_product;?>"></a>
										</div>
										<h4 class="title-product">
											<a target="_self" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><?php echo $product->name_product;?></a>
										</h4>
										<div class="price-product">
											<div class="original-price"><?php echo $product->original_price;?> Đ</div>
											<div class="price"><?php echo $product->price;?> Đ</td></div>
										</div>
										<div class="percent"><?php echo $product->percent;?>%</div>
										<div class="last-update"><?php echo $product->last_update ;?></div>
									</div>
								</div>
							 <?php }
							 }
					  	?> 
					</div>
				</div>
				<div class="ads-gg-1" style="max-height: 80px">
					<!-- first ads -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-8663190089908401"
					     data-ad-slot="5657388695"
					     data-ad-format="auto"
					     data-full-width-responsive="true"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<h2>Các Sản Phẩm Tiki Giảm giá nhiều nhất trong 2h qua</h2>
				<div class="product-list">
					<div class="row">

					<?php
					    // $results = $wpdb->get_results ( "SELECT * FROM products WHERE `id_web`= 3 and `percent` > 80 ORDER BY `percent` DESC LIMIT 500" );
					$results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products ORDER BY last_update) T WHERE percent > 84 AND id_web = 3  ORDER BY `T`.`last_update` DESC LIMIT 100" );

					    foreach ( $results as $product )   {
					    	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
							$datetime2 = new DateTime($product->last_update);
							$diff = $datetime1->diff($datetime2);

							if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 2){
							    ?>
								<?php 
									$class_item = '';

									if ($product->status == 0) {
										$class_item = 'hidden-item';
									}

									if(is_user_logged_in() && $product->status == 0) {
										$class_item = 'admin-hidden-item';
									}
								?>
								<div class="col-md-3 <?php echo $class_item; ?>">
									<?php 
										if(is_user_logged_in()) {
											?>
											<select class="select-option" data-id="<?php echo $product->id; ?>">
												<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
												<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
											</select>
											<?php
										}
									?>
									<div class="item">
										<div class="images-product">
											<a target="_self" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><img src="<?php echo $product->image_product;?>"></a>
										</div>
										<h4 class="title-product">
											<a target="_self" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><?php echo $product->name_product;?></a>
										</h4>
										<div class="price-product">
											<div class="original-price"><?php echo $product->original_price;?> Đ</div>
											<div class="price"><?php echo $product->price;?> Đ</td></div>
										</div>
										<div class="percent"><?php echo $product->percent;?>%</div>
										<div class="last-update"><?php echo $product->last_update ;?></div>
									</div>
								</div>
							 <?php }
							 }
					  	?> 
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="sticky-banner">
		<a href="https://shorten.asia/S7G3uqkH" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/c9/a8/25/ff1bd60c6cdb77d4b248bb6ffed4d04f.png" alt="" width="60"></a>
	</div>
	<div class="sticky-banner left">
		<a href="https://shorten.asia/rCZQTeKa" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/25/fe/11/04b47b494b8df77e37e294d44322adc0.png" alt="" width="60"></a>
	</div>
	<div class="loading">
		<div class="wap-loader">
			<div class="loader"></div>
		</div>
	</div>
	<input type="hidden" id="ads-google" value="" name="ads-google">
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">
	
<?php
get_footer();
