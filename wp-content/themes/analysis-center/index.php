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

// $isClose = !is_user_logged_in();
$isClose = false;
global $wpdb;
// get_voucher();


?>
<div id="primary" class="content-area home-page">
	<main id="main" class="site-main">
		<div class="container">
			<div class="voucher_home row">
			<div class="col-md-3">
				<a target="_blank" href="/lazada">
					<img src="http://mgghot.com/wp-content/uploads/2020/02/lzd.jpg">
				</a>
			</div>
			<div class="col-md-3">
				<a target="_blank" href="/tiki">
					<img src="http://mgghot.com/wp-content/uploads/2020/02/tiki.jpg">
				</a>
			</div>
			<div class="col-md-3">
				<a target="_blank" href="/sendo">
					<img src="http://mgghot.com/wp-content/uploads/2020/02/sendo.jpg">
				</a>
			</div>
			<div class="col-md-3">
				<a target="_blank" href="/shopee">
					<img src="http://mgghot.com/wp-content/uploads/2020/02/shopee.jpg">
				</a>
			</div>
		</div>
		</div>
		<div class="container">
			
			<div class="row mt30 banner">
				<div class="col-md-4">
					<a href="https://shorten.asia/9CJ9nvAK" target="_blank">
						<img src="http://mgghot.com/wp-content/uploads/2020/01/tikitet.jpg">
					</a>
				</div>
				<div class="col-md-4">
					<a href="https://shorten.asia/57awhMtg" target="_blank">
						<img src="http://mgghot.com/wp-content/uploads/2020/01/81981a133a7a0d2a1c80df8dfb0f8a0c.jpeg">
					</a>
				</div>
				<div class="col-md-4">
					<a href="https://shorten.asia/FfsxFBt7" target="_blank">
						<img src="http://mgghot.com/wp-content/uploads/2020/01/81264216_3023631017682701_2837327950620131328_n.jpg">
					</a>
				</div>
			</div>
			<!-- <div class="row mt30 banner">
				<div class="col-md-6 mt30">
					<a href="https://shorten.asia/3uNkteSp" target="_blank">
						<img src="http://mgghot.com/wp-content/uploads/2020/01/754c3162b8b9a790eda15ffd7fa961b1.png" alt="shopee">
					</a>
				</div>
				<div class="col-md-6 mt30">
					<a href="https://shorten.asia/PTeWGR7m" target="_blank">
						<img src="http://mgghot.com/wp-content/uploads/2020/01/2130390223311abd50ceb9e2327f57e9.png" alt="sendo">
					</a>
				</div>
			</div> -->
			<div class="row mt30 banner">
				<div class="col-md-12 mt30">
					<a href="https://shorten.asia/bnjATUrB" target="_blank">
						<img src="https://media3.scdn.vn/img3/2019/9_16/12NzEn.png" alt="sendo">
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<?php if (!$isClose) { ?>
				<h2 class="ttl-h2 pt_50"> Các Sản phẩm giảm giá nhiều tại </h2>
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
									$results = $wpdb->get_results ( "SELECT * FROM products WHERE id_web = 1 AND status = 1 AND percent > 69 AND DATEDIFF(CURRENT_DATE, last_update) < 2 ORDER BY `products`.`percent` DESC" );
									
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
												<!-- <?php 
													if(is_user_logged_in()) {
														?>
														<select class="select-option" data-id="<?php echo $product->id; ?>">
															<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
															<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
														</select>
														<?php
													}
													?> -->
													<div class="item">
														<div class="images-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
														</div>
														<h4 class="title-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
														</h4>
														<div class="price-product">
															<div class="original-price"><?php echo $product->original_price;?> Đ</div>
															<div class="price"><?php echo $product->price;?> Đ</div>
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
										$results = $wpdb->get_results ( "SELECT * FROM products WHERE id_web = 3 AND status = 1 AND percent > 80 AND DATEDIFF(CURRENT_DATE, last_update) < 2 ORDER BY `products`.`percent` DESC" );

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
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
														</div>
														<h4 class="title-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
														</h4>
														<div class="price-product">
															<div class="original-price"><?php echo $product->original_price;?> Đ</div>
															<div class="price"><?php echo $product->price;?> Đ</div>
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
										$results = $wpdb->get_results ( "SELECT * FROM products WHERE id_web = 4 AND status = 1 AND percent > 78 AND DATEDIFF(CURRENT_DATE, last_update) < 2 ORDER BY `products`.`percent` DESC" );

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
												<!-- <?php 
													if(is_user_logged_in()) {
														?>
														<select class="select-option" data-id="<?php echo $product->id; ?>">
															<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
															<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
														</select>
														<?php
													}
													?> -->
													<div class="item">
														<div class="images-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
														</div>
														<h4 class="title-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
														</h4>
														<div class="price-product">
															<div class="original-price"><?php echo $product->original_price;?> Đ</div>
															<div class="price"><?php echo $product->price;?> Đ</div>
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
										$results = $wpdb->get_results ( "SELECT * FROM products WHERE id_web = 2 AND status = 1 AND percent > 60 AND DATEDIFF(CURRENT_DATE, last_update) < 2 ORDER BY `products`.`percent` DESC" );
										
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
												<!-- <?php 
													if(is_user_logged_in()) {
														?>
														<select class="select-option" data-id="<?php echo $product->id; ?>">
															<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
															<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
														</select>
														<?php
													}
													?> -->
													<div class="item">
														<div class="images-product">
															<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
														</div>
														<h4 class="title-product">
															<a target="_blank" href="<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
														</h4>
														<div class="price-product">
															<div class="original-price"><?php echo $product->original_price;?> Đ</div>
															<div class="price"><?php echo $product->price;?> Đ</div>
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
				<?php } else { ?>
					<h1 style="color:red;margin: 200px 0;text-align: center;">We need fix something. Our website will coming soon!</h1>
				<?php } ?>
			</div>
			<section class="my-blog mt30">
				<div class="container">
					<h2 class="ttl-blog">Video</h2>
					<div class="row">
						<div class="col-md-4">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/n3xS9vsKW8U?autoplay=1" frameborder='0' allowfullscreen></iframe>
						</div>
						<div class="col-md-4">
							<iframe width="660" height="315" src="https://www.youtube.com/embed/wv1CN1W-4lY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<div class="col-md-4">
							<iframe width="660" height="315" src="https://www.youtube.com/embed/MVpR7f3LJlI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <div class="sticky-banner left">
		<a href="https://shorten.asia/TxbX713n" target="_blank" class="right"><img style="width: 100px;" src="https://salt.tikicdn.com/ts/banner/92/8a/7c/c4fae43654a17c5bb124136c42b05f24.png" alt="" width="60"></a>
	</div> -->
	<div class="sticky-banner">
		<a href="https://shorten.asia/H4HRcVkF" target="_blank" class="right"><img style="width: 100px;" src="https://salt.tikicdn.com/ts/banner/8c/a5/9c/71d24fa486b36e2b726aa179e92382df.png" alt="" width="60"></a>
	</div>
	<div class="loading">
		<div class="wap-loader">
			<div class="loader"></div>
		</div>
	</div>
	<input type="hidden" id="ads-google" value="" name="ads-google">
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">
</div>
</div>


<?php
	// <h1 style="color:red;margin: 200px 0;text-align: center;">We need fix something. Our website will coming soon!</h1>
get_footer();
