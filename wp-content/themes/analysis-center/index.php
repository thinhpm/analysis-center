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
				
				<div class="row mt30 banner">
					<div class="col-md-8 banner-left">
						<div class="row">
							<div class="col-md-6">
								<a href="https://shorten.asia/PN1SH2xU" target="_blank">
									<img src="http://mgghot.com/wp-content/uploads/2019/03/tiki-bd.png">
								</a>
							</div>
							<div class="col-md-6">
								<a href="https://c.lazada.vn/t/c.ZiZs" target="_blank">
									<img src="http://mgghot.com/wp-content/uploads/2019/03/bd-lzd.jpg">
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 banner-right">
						<div>
							<a href="https://shorten.asia/W4V8hNBT" target="_blank"> <img src="http://mgghot.com/wp-content/uploads/2019/03/shopee-banner.png"/> </a>
						</div>
						<div class="mt30">
							<a href="https://shorten.asia/sNSbj3B4" target="_blank">
							<img src="https://bloggiamgia.vn/wp-content/uploads/2019/03/17027320184862-1.jpg" alt="adayroi">
						</a>
						</div>
					</div>
					<div class="col-md-12 mt30">
						<a href="https://shorten.asia/bnjATUrB" target="_blank">
							<img src="http://mgghot.com/wp-content/uploads/2018/11/f5g9k9.png" alt="sendo">
						</a>
					</div>
				</div>
				<h2 class="ttl-h2"> Các Sản phẩm giảm giá nhiều tại </h2>
				<div class="tabs">
					<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#lazada">Lazada</a></li>
					    <li><a data-toggle="tab" href="#tiki">Tiki</a></li>
					    <li><a data-toggle="tab" href="#sendo">Sendo</a></li>
					    <li><a data-toggle="tab" href="#shopee">Shopee</a></li>
					</ul>

				  <div class="tab-content">
				    <div id="lazada" class="tab-pane fade in active">
						<div class="product-list">
							<div class="row">

							<?php
							    $results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products ORDER BY last_update) T WHERE percent > 79 AND id_web = 1 AND status = 1 ORDER BY `T`.`last_update` DESC LIMIT 100" );
							//$results = [];
							    foreach ( $results as $product )   {
							     	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
									 $datetime2 = new DateTime($product->last_update);
									 $diff = $datetime1->diff($datetime2);

									 if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 5){
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
													<a target="_blank" href="<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
												</div>
												<h4 class="title-product">
													<a target="_blank" href="<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
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
				    <div id="tiki" class="tab-pane fade">
					<div class="product-list">
						<div class="row">

						<?php
						    // $results = $wpdb->get_results ( "SELECT * FROM products WHERE `id_web`= 3 and `percent` > 80 ORDER BY `percent` DESC LIMIT 500" );
						$results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products ORDER BY last_update) T WHERE percent > 80 AND id_web = 3 AND status = 1 ORDER BY `T`.`last_update` DESC LIMIT 100" );

						    foreach ( $results as $product )   {
						    	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
								$datetime2 = new DateTime($product->last_update);
								$diff = $datetime1->diff($datetime2);

								if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 4){
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
												<a target="_blank" href="https://fast.accesstrade.com.vn/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
											</div>
											<h4 class="title-product">
												<a target="_blank" href="https://fast.accesstrade.com.vn/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
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
				    <div id="sendo" class="tab-pane fade">
				      	<div class="product-list">
							<div class="row">
							<?php
							    // $results = $wpdb->get_results ( "SELECT * FROM products WHERE `id_web`= 3 and `percent` > 80 ORDER BY `percent` DESC LIMIT 500" );
								$results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products WHERE id_web = 4 AND status = 1 AND percent > 81 ORDER BY last_update DESC LIMIT 500) T ORDER BY `T`.`percent` DESC LIMIT 100" );

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
													<a target="_blank" href="https://fast.accesstrade.com.vn/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
												</div>
												<h4 class="title-product">
													<a target="_blank" href="https://fast.accesstrade.com.vn/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
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
				    <div id="shopee" class="tab-pane fade">
				      	<div class="product-list">
							<div class="row">

							<?php
							    // $results = $wpdb->get_results ( "SELECT * FROM products WHERE `id_web`= 3 and `percent` > 80 ORDER BY `percent` DESC LIMIT 500" );
							$results = $wpdb->get_results ( "SELECT * FROM (SELECT * FROM products WHERE id_web = 2 AND percent > 84 ORDER BY last_update DESC LIMIT 500) T ORDER BY `T`.`percent` DESC LIMIT 100" );
							
							    foreach ( $results as $product )   {
							    	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
									$datetime2 = new DateTime($product->last_update);
									$diff = $datetime1->diff($datetime2);

									if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 10){
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
													<a target="_blank" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
												</div>
												<h4 class="title-product">
													<a target="_blank" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><?php echo $product->name_product;?></a>
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
				  </div>
				</div>
			</div>
			<section class="my-blog">
				<div class="container">
					<h2 class="ttl-blog">my blog</h2>
					<?php echo do_shortcode('[get_post_blog]') ?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="sticky-banner left">
		<a href="https://shorten.asia/213KGCfx" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/7d/e3/ec/aa0db5bfdbe76ca4446a257ebdd46516.png" alt="" width="60"></a>
	</div>
	<div class="sticky-banner">
		<a href="https://shorten.asia/PN1SH2xU" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/b4/ad/a4/85ca5e4ca4df18ed9bfe787f0cc5a666.png" alt="" width="60"></a>
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
