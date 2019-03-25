<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Analysis_Center
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
     	(adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-8663190089908401",
          enable_page_level_ads: true
     	});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
	<div class="swiper-container">
	    <div class="swiper-wrapper">
	      <div class="swiper-slide">
	      	<a href="https://shorten.asia/qXVnzw9F" target="_blank"><img src="https://salt.tikicdn.com/ts/banner/df/79/ec/65a00debbe80967e15a81d66b15f9975.png" alt="#"></a>
	      </div>
	      <div class="swiper-slide">
	      	<a href="" target="_blank"><img src="https://laz-img-cdn.alicdn.com/images/ims-web/TB1RXWfNNYaK1RjSZFnXXa80pXa.jpg" alt=""></a>
	      </div>
	    </div>
	</div>
	<div class="top-header">
		<div class="container">
			<p>Tham gia Group để cùng nhau chia sẽ về mã Giảm giá và mua hàng </p>
			<ul class="social-list align-right">
				<li class="social-list_item">
					<a target="_blank" rel="noopener" href="https://www.facebook.com/groups/1895929324003794" class="social-list_link is-facebook" aria-label="facebook">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<!-- <li class="social-list_item">
					<a target="_blank" rel="noopener" href="" class="social-list_link is-twitter" aria-label="twitter">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li class="social-list_item">
					<a target="_blank" rel="noopener" href="" class="social-list_link is-google" aria-label="google"><i class="fa fa-google"></i>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
	<header id="masthead" class="site-header">
		<div class="container">
			<?php get_logo(); ?>
			<div class="menu-top">
				<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'analysis-center' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
