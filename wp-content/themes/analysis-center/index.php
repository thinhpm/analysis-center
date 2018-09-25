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
				<h2>Lọc theo danh mục sản phẩm</h2>
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
			<div class="container">
				<h2>Chọn khoảng giảm giá theo. %</h2>
				  <form>
				    <div class="checkbox">
				      <label><input type="checkbox" value="">80%</label>
				    </div>
				    <div class="checkbox">
				      <label><input type="checkbox" value="">85%</label>
				    </div>
				    <div class="checkbox">
				      <label><input type="checkbox" value="">90%</label>
				    </div>
				  </form>
				  viết cái phần trăm vào đây
				<div class="product-list">
					<div class="row">

					<?php
					    $results = $wpdb->get_results ( "SELECT * FROM products ORDER BY `percent` DESC LIMIT 50" );


					    foreach ( $results as $product )   {
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
									<div class="original-price"><?php echo $product->original_price;?></div>
									<div class="price"><?php echo $product->price;?></td></div>
								</div>
								<div class="percent"><?php echo $product->percent;?>%</div>
								<div class="last-update"><?php echo $product->last_update;?></div>';
							</div>
						</div>
					 <?php }
					  ?> 
					</div>
				</div>
			<!-- <?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?> -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="loading">
		<div class="wap-loader">
			<div class="loader"></div>
		</div>
	</div>
	
	
	<style>
		.loading {
			display: none;
			position: fixed;
		    top: 0;
		    bottom: 0;
		    right: 0;
		    left: 0;
		    background: rgba(255, 255, 255, 0.6);
		}
		.wap-loader {
			position: absolute;
			top: calc(50% - 60px);
			left: calc(50% - 60px);
		}
		.loader {
		  border: 16px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 16px solid #3498db;
		  width: 120px;
		  height: 120px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		}

		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
	</style>

<?php
get_footer();
