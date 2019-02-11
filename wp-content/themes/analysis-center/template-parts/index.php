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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.call-filter-category').click(function(){
		        var name_category = $('#list-category :selected').attr('data-name');
		        var percent = $('#list-percent :selected').attr('data');

		        $.ajax({
		           	type : "get",
		           	dataType : "json", 
		           	url : '<?php echo admin_url('admin-ajax.php');?>', 
		           	data : {
		                action: "filter_category", 
		                name_category: name_category,
		                percent: percent
		           	},
		           	beforeSend: function(){
		               	$('.product-list .row').html('');
		               	$(".loading").css("display", "block");
		           	},
		           	success: function(response) {
		           		$(".loading").css("display", "none");
		           		if(response['result'] == ''){
		           			alert("Không tìm thấy sản phẩm nào");
		           		}
		               	$('.product-list .row').html(response['result']);

		               	// save to database
		               	$.ajax({
				           	type : "post",
				           	dataType : "json",
				           	url : '<?php echo admin_url('admin-ajax.php');?>', 
				           	data : {
				                action: "filter_category_save_db",
				                arrayData: response['arrayData']
				           	},
				           	beforeSend: function(){
				           		
				           	},
				           	success: function(response) {
				           		console.log('done update data!');
				           	},
				           	error: function( jqXHR, textStatus, errorThrown ){
				                console.log( 'The following error occured: ' + textStatus, errorThrown );
				           	}
				       });

		           	},
		           	error: function( jqXHR, textStatus, errorThrown ){
		                console.log( 'The following error occured: ' + textStatus, errorThrown );
		           	}
		       	});
		    });

		    $('.select-option').on('change', function() {
		    	var ele = $(this);
		    	var id = $(this).attr("data-id");
		    	var value = $(this).val();

		    	$.ajax({
		           	type : "get",
		           	dataType : "html", 
		           	url : '<?php echo admin_url('admin-ajax.php');?>', 
		           	data : {
		                action: "option_item", 
		                id: id,
		                value: value
		           	},
		           	beforeSend: function(){
		               	$(".loading").css("display", "block");
		           	},
		           	success: function(response) {
		           		$(".loading").css("display", "none");
		           		ele.next().toggleClass('admin-hidden-item');
		           	},
		           	error: function( jqXHR, textStatus, errorThrown ){
		                console.log( 'The following error occured: ' + textStatus, errorThrown );
		           	}
		       	});
		    });
		});

	</script>

	<div id="primary" class="content-area home-page">
		<main id="main" class="site-main">
			<div class="container">
				<div class="search-list">
					<!-- <h2>Lọc Nâng Cao Theo Danh Mục Sản Phẩm</h2>
					<?php 
						$categories = $wpdb->get_results ("SELECT * FROM categories");
					 ?>
					<select id='list-category'>
						<?php 
							foreach ($categories as $value) {
								echo "<option data-name='". $value->id_category ."'>". $value->name_category ."</option>";
							}
						 ?>
					</select>
					<select id='list-percent'>
						<option data='90'> >= 90%</option>
						<option data='80'> >= 80%</option>
						<option data='70'> >= 70%</option>
						<option data='60'> >= 60%</option>
						<option data='50'> >= 50%</option>
						<option data='40'> >= 40%</option>
						<option data='30'> >= 30%</option>
						<option data='20'> >= 20%</option>
						<option data='10'> >= 10%</option>
					</select>
					<button class='call-filter-category'>Lọc</button> -->
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
								
								<div class="col-md-3">
									<?php 
										$class_item = '';

										if ($product->status == 0) {
											$class_item = 'hidden-item';
										}

										if(is_user_logged_in()) {
											if ($product->status == 0) {
												$class_item = 'admin-hidden-item';
											}

											?>
											<select class="select-option" data-id="<?php echo $product->id; ?>">
												<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
												<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
											</select>

											<?php
										}
									 ?>
									<div class="item <?php echo $class_item; ?>">
										<div class="images-product">
											<a target="_blank" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><img src="<?php echo $product->image_product;?>"></a>
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
							
								<div class="col-md-3">
									<?php 
										$class_item = '';

										if ($product->status == 0) {
											$class_item = 'hidden-item';
										}

										if(is_user_logged_in()) {
											if ($product->status == 0) {
												$class_item = 'admin-hidden-item';
											}

											?>
											<select class="select-option" data-id="<?php echo $product->id; ?>">
												<option value="1" <?php echo $product->status == 0 ? "selected" : '' ?> >show</option>
												<option value="0" <?php echo $product->status == 0 ? "selected" : '' ?> >disable</option>
											</select>

											<?php
										}
									 ?>

									<div class="item <?php echo $class_item; ?>">
										<div class="images-product">
											<a target="_blank" href="<?php echo $product->link_product;?>?utm_source=accesstrade&aff_sid=vL8Ti5qxAg7LPCIeMU5e2aDnQEBIkkXrU2OzO1BLNqzhv22x"><img src="<?php echo $product->image_product;?>"></a>
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


<?php
get_footer();
