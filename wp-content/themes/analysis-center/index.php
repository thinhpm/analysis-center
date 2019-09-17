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
								<a href="https://shorten.asia/eXwcJM9B" target="_blank">
									<img src="https://vn-live-02.slatic.net/p/2e362766929dc70718d34fdde40df11f.jpg">
								</a>
							</div>
							<div class="col-md-6">
								<a href="https://shorten.asia/Pz2Y6GtS" target="_blank">
									<img src="https://vn-live-02.slatic.net/p/a54283ed14267bfcc240a2ea52d80428.jpg">
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 banner-right">
						<div>
							<a href="https://shorten.asia/rXgzc6kD" target="_blank"> <img src="https://media3.scdn.vn/img3/2019/9_12/0fdNld.jpg"/> </a>
						</div>
						<div class="mt30">
							<a href="https://shorten.asia/sNSbj3B4" target="_blank">
							<img src="https://bloggiamgia.vn/wp-content/uploads/2019/03/17027320184862-1.jpg" alt="adayroi">
						</a>
						</div>
					</div>
					
				<!-- 	<div class="col-md-12 mt30">
						<a href="https://shorten.asia/KsCPxZxJ" target="_blank">
							<img src="https://laz-img-cdn.alicdn.com/images/ims-web/TB1YA6Efbj1gK0jSZFuXXcrHpXa.jpg_1200x1200.jpg" alt="lazada">
						</a>
					</div> -->
					<div class="col-md-12 mt30">
						<a href="https://shorten.asia/5RV6jNPC" target="_blank">
							<img src="https://salt.tikicdn.com/ts/lp/4d/7f/43/7add44d2d422bfa9540f5eeb8e1853bb.png" alt="sendo">
						</a>
					</div>
					<div class="col-md-12 mt30">
						<a href="https://shorten.asia/bnjATUrB" target="_blank">
							<img src="https://media3.scdn.vn/img3/2019/9_16/12NzEn.png" alt="sendo">
						</a>
					</div>
					
				</div>
				
				<?php if (!$isClose) { ?>
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
														<a target="_blank" href="<?php echo $product->link_product;?>"><img class="lazy-images" data-src="<?php echo $product->image_product;?>"></a>
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
				<!-- <?php if(is_user_logged_in()) {
					?>
				<?php } else { ?>
					<h1 style="color:red;margin: 200px 0;text-align: center;">Khi có sản phẩm lỗi giá thì vẫn luôn được cập nhập ở Group fb này: <a target="_blank" rel="noopener" href="https://www.facebook.com/groups/1895929324003794"> Hotdeal
					</a></h1>
						<div id="shopee" class="">
							<h2>Shopee</h2>
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
				<?php }?>  -->
				
			</div>
			<section class="my-blog">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							
							<h2 class="ttl-blog">Video</h2>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/n3xS9vsKW8U?autoplay=1" frameborder='0' allowfullscreen></iframe>
						</div>
						<div class="col-md-8">
							<h2 class="ttl-blog">my blog</h2>
							<?php echo do_shortcode('[get_post_blog]') ?>
						</div>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <div class="sticky-banner left">
		<a href="https://shorten.asia/213KGCfx" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/7d/e3/ec/aa0db5bfdbe76ca4446a257ebdd46516.png" alt="" width="60"></a>
	</div> -->
	<div class="sticky-banner">
		<a href="https://shorten.asia/5RV6jNPC" target="_blank" class="right"><img src="https://salt.tikicdn.com/ts/banner/73/67/51/29e66f1de761220712c0558cb7d536dc.png" alt="" width="60"></a>
	</div>
	<div class="loading">
		<div class="wap-loader">
			<div class="loader"></div>
		</div>
	</div>
	<input type="hidden" id="ads-google" value="" name="ads-google">
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">
		<!-- <div id="myModal" class="modal fade quangcao" role="dialog">
		  	<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Một Giây Quảng Cáo</h4>
		      </div>
		      <div class="modal-body">
		        <p>Trang web này đã xuất hiện quảng cáo<br>
		        	Không có tiền thì web hoạt động làm sao.</p>
		        	<p class="red"><strong>Click Banner dưới ủng hộ web nha</strong></p>
		        	<p>
		        		<a href="https://shorten.asia/j4cvqGwj" target="_blank">
							<img src="https://salt.tikicdn.com/cache/w584/ts/banner/a8/a9/48/e2133b84c135001f59f65cea1e749107.jpg">
						</a>
		        	</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
	    </div> -->

  </div>
</div>
<?php
	// <h1 style="color:red;margin: 200px 0;text-align: center;">We need fix something. Our website will coming soon!</h1>
get_footer();
