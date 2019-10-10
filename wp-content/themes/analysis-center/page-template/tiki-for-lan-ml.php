<?php
/**
 * Template Name: Tiki for admin
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ict
 */
get_header();

// $isClose = !is_user_logged_in();

global $wpdb;
$isClose = false;

$results = filter_tiki_for_lan_ml();

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
				<h2 class="ttl-h2"> Các Sản phẩm giảm giá nhiều tại </h2>
				<div class="tabs">
					<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#tiki">Tiki</a></li>
					</ul>

				  <div class="tab-content">
				    <div id="tiki" class="tab-pane fade in active">
						<div class="product-list">
							<div class="row">

							<?php
							    foreach ( $results as $product ) {
									$class_item = 'd';
									?>
									<div class="col-md-3 <?php echo $class_item; ?>">
										<div class="item">
											<div class="images-product">
												<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product['linkProduct'];?>"><img class="lazy-images" data-src="<?php echo $product['imageProduct'];?>"></a>
											</div>
											<h4 class="title-product">
												<a target="_blank" href="https://go.isclix.com/deep_link/4945784097639239041?url=<?php echo $product['linkProduct'];?>"><?php echo $product['name'];?></a>
											</h4>
											<div class="price-product">
												<div class="original-price"><?php echo $product['originalPrice'];?> Đ</div>
												<div class="price"><?php echo $product['price'];?> Đ</div>
											</div>
											<div class="percent"><?php echo $product['discount'];?>%</div>
											<div class="last-update"><?php echo $product['last_update'];?></div>
										</div>
									</div>
								 <?php
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
