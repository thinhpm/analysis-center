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
		});

	</script>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="search-list">
					<h2>Lọc Nâng Cao Theo Danh Mục Sản Phẩm</h2>
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
					<button class='call-filter-category'>Lọc</button>
				</div>
				<iframe width="100%" height="35" src="https://lap.lazada.com/searchbar/searchbar.php?aff_id=182393&country=vn" frameborder="0" scrolling="no"></iframe>
			</div>

			<div class="container">
				<h2>Các Sản Phẩm Giảm giá nhiều nhất trong 1h qua</h2>
				<div class="product-list">
					<div class="row">

					<?php
					    $results = $wpdb->get_results ( "SELECT * FROM products ORDER BY `percent` DESC LIMIT 50" );

					    foreach ( $results as $product )   {
					    	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
							$datetime2 = new DateTime($product->last_update);
							$diff = $datetime1->diff($datetime2);

							if($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h < 2){
							    ?>
							
								<div class="col-md-3">
									<div class="item">
										<div class="images-product">
											<a href="<?php echo $product->link_product;?>"><img src="<?php echo $product->image_product;?>"></a>
										</div>
										<h4 class="title-product">
											<a href="<?php echo $product->link_product;?>"><?php echo $product->name_product;?></a>
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

	<div class="loading">
		<div class="wap-loader">
			<div class="loader"></div>
		</div>
	</div>


<?php
get_footer();
