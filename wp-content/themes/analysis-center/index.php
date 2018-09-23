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
	// $categoryName = 'phu-kien-dien-thoai-may-tinh-bang';
	// $percent = 50;
	// filter_category($categoryName, $percent);
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.call-ajax').click(function(){ // Khi click vào button thì sẽ gọi hàm ajax
		        $.ajax({ // Hàm ajax
		           type : "post", //Phương thức truyền post hoặc get
		           dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
		           url : '<?php echo admin_url('admin-ajax.php');?>', // Nơi xử lý dữ liệu
		           data : {
		                action: "filter_category", //Tên action, dữ liệu gởi lên cho server
		                name_category: 'phu-kien-dien-thoai-may-tinh-bang',
		                percent: '10'
		           },
		           beforeSend: function(){
		               $('.product-list .row').html('');
		           },
		           success: function(response) {
		               $('.product-list .row').html(response);
		           },
		           error: function( jqXHR, textStatus, errorThrown ){
		                console.log( 'The following error occured: ' + textStatus, errorThrown );
		           }
		       });
		    });
		});

	</script>
	


<!-- 	<div class="curl">
		<?php 
			

			$data = file_get_contents('https://www.lazada.vn/products/ao-thun-tay-dai-phoi-tui-thoi-trang-d118-tran-doanh-i143281453-s148107021.html?search=1');

			preg_match("/<div id=\"module_product_price_1\"(.+?)<div id=\"module_promotion_tags\"/", $data, $output_array);

			$html = str_replace("<div id=\"module_promotion_tags\"", '', $output_array[0]);

			$doc = new DOMDocument();
			$doc->loadHTML('<?xml encoding="UTF-8">' . $html);
			echo $doc->saveHTML();

		 ?>
	</div> -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<button class='call-ajax'>filter</button>
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
					    global $wpdb;

					    $results = $wpdb->get_results ( "SELECT * FROM products" );

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

<?php
get_footer();
