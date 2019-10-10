<?php
/**
 * Analysis Center functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Analysis_Center
 */

if ( ! function_exists( 'analysis_center_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function analysis_center_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Analysis Center, use a find and replace
		 * to change 'analysis-center' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'analysis-center', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'analysis-center' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'analysis_center_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'analysis_center_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function analysis_center_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'analysis_center_content_width', 640 );
}
add_action( 'after_setup_theme', 'analysis_center_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function analysis_center_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'analysis-center' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'analysis-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer1', 'analysis-center' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'analysis-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer2', 'analysis-center' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'analysis-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer3', 'analysis-center' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'analysis-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer4', 'analysis-center' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'analysis-center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'analysis_center_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function analysis_center_scripts() {
	wp_enqueue_style( 'analysis-center-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-style', get_template_directory_uri().'/css/main.css');
	wp_enqueue_style( 'vourcher.css', get_template_directory_uri().'/css/vourcher.css');
	wp_enqueue_style( 'swiper.min.css', get_template_directory_uri().'/css/swiper.min.css');
	wp_enqueue_style( 'font-Awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrapstyle', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_script( 'analysis-center-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'analysis-center-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/js/main.js', array('jquery'),'1.0', true );
	wp_enqueue_script( 'swiper.min.js', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'),'1.0', true );
	wp_enqueue_script( 'jquery.lazy.min.js', get_template_directory_uri() . '/js/jquery.lazy-master/jquery.lazy.min.js', array('jquery'),'1.0', true );
	wp_enqueue_script( 'jquery.lazy.plugins.js', get_template_directory_uri() . '/js/jquery.lazy-master/jquery.lazy.plugins.js', array('jquery'),'1.0', true );
	wp_enqueue_script( 'bootstrap.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js', array('jquery'),'1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'analysis_center_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/core/init.php';

//Add logo
if (!function_exists('logo')) {
	function get_logo() {
		global $tp_options;
		echo '<h1 id="logo"><a href="'.home_url().'"><img src="'.$tp_options['logo-image']['url'].'" alt="'.get_bloginfo().'" /></a></h1>';
	}
}

add_action('wp_ajax_filter_filter_category', 'filter_category');
add_action('wp_ajax_nopriv_filter_category', 'filter_category');

function filter_category() {

	$result = '';
	$categoryName = $_GET['name_category'];
	$percent = $_GET['percent'];

	ini_set('max_execution_time', 300);
	$mainResult = [];

	$stt = 1;
	$numPage = 25;

	while(true) {
		$data = file_get_contents('https://www.lazada.vn/' . $categoryName . '/?page=' . $stt . '&sort=priceasc');
		preg_match_all("/\"itemId\":\"(.+?)\"ratingScore\"/", $data, $output_array);

		if(count($output_array[0]) == 0 || $stt == $numPage){
			break;
		}

		foreach($output_array[0] as $value){
			$arrResult = [];
			$discount = getValueOf($value, 'discount');
			$discount = str_replace('-', '', $discount);
			$discount = str_replace('%', '', $discount);

			if ($discount >= $percent) {
				$name = getValueOf($value, 'name');
				$id_product = getValueOf($value, 'itemId');
				$linkProduct = 'https:' . getValueOf($value, 'productUrl');
				$imageProduct = getValueOf($value, 'image');
			    $originalPrice = getValueOf($value, 'originalPrice');
			    $originalPrice = str_replace('.00', '', $originalPrice);
			    $originalPrice = str_replace('.0', '', $originalPrice);
			    $price = getValueOf($value, 'price');
			    $lastUpdate = date("Y-m-d H:i:s");
			    $price = str_replace('.00', '', $price);

				$arrResult['id_product'] = $id_product;
				$arrResult['name'] = $name;
				$arrResult['linkProduct'] = $linkProduct;
				$arrResult['imageProduct'] = $imageProduct;
				$arrResult['originalPrice'] = $originalPrice;
				$arrResult['price'] = $price;
				$arrResult['discount'] = $discount;
				$arrResult['last_update'] = $lastUpdate;
				$arrResult['name_category'] = $categoryName;

				array_push($mainResult, $arrResult);

				$result .= '<div class="col-md-3">';
				$result .= '	<div class="item">';
				$result .= '		<div class="images-product">';
				$result .= '			<a href="'. $linkProduct .'"><img src="'. $imageProduct .'"></a>';
				$result .= '		</div>';
				$result .= '		<h4 class="title-product">';
				$result .= '		<a href="'. $linkProduct .'">'. $name .'</a>';
				$result .= '		</h4>';
				$result .= '		<div class="price-product">';
				$result .= '			<div class="original-price">'. $originalPrice .'</div>';
				$result .= '			<div class="price">'. $price .'</td></div>';
				$result .= '		</div>';
				$result .= '		<div class="percent">-'. $discount .'%</div>';
				$result .= '		<div class="last-update">'. $lastUpdate .'</div>';
				$result .= '	</div>';
				$result .= '</div>';

			}
		}

		$stt++;
	}
	echo json_encode(['result'=> $result, 'arrayData' => $mainResult]);

	die();

}

function getValueOf($stringText, $name) {
    $index1 = strpos( $stringText, "\"" . $name . "\":\"");

    if ($index1 === false) {
    	return 0;
    }

    $stringText = substr($stringText, $index1 + strlen("\"" . $name . "\":\""));
    $index2 = strpos($stringText, '"');

    return substr($stringText, 0, $index2);
}

add_action('wp_ajax_filter_category_save_db', 'filter_category_save_db');
add_action('wp_ajax_nopriv_filter_category_save_db', 'filter_category_save_db');

function filter_category_save_db() {
	global $wpdb;

	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products" );
	$arrayData = $_POST['arrayData'];

	if (empty($arrayData)) {
		return;
	}

	foreach ($arrProductId as $key => $value) {
		$arrProductId[$key] = $value->id_product;
	}

	foreach ($arrayData as $key => $value) {
		if (in_array($value['id_product'], $arrProductId)) {
			$results = $wpdb->get_results ( "UPDATE products SET original_price = ". $value['originalPrice'] .", price = ". $value['price'] .", percent = ". $value['discount'] .", last_update = '". $value['last_update'] . "' WHERE id_product = ". $value['id_product'] . "");
		} else {
			$results = $wpdb->get_results("INSERT INTO products (id_product, name_product, link_product, image_product, original_price, price, percent, name_category) VALUES (". $value['id_product'] .", '". $value['name'] . "', '". $value['linkProduct'] ."', '". $value['imageProduct'] ."', ". $value['originalPrice'] .",". $value['price'] .", ". $value['discount'] .", '". $value['name_category'] ."')" );			
		}
	}

	
	print_r('done');

	die();
}

function filter_product() {
	$data = file_get_contents('https://www.lazada.vn/products/ao-thun-tay-dai-phoi-tui-thoi-trang-d118-tran-doanh-i143281453-s148107021.html?search=1');

	preg_match("/<div id=\"module_product_price_1\"(.+?)<div id=\"module_promotion_tags\"/", $data, $output_array);

	$html = str_replace("<div id=\"module_promotion_tags\"", '', $output_array[0]);

	$doc = new DOMDocument();
	$doc->loadHTML('<?xml encoding="UTF-8">' . $html);
	echo $doc->saveHTML();
}

// get post new
add_shortcode('get_post_new','get_post_new');

function get_post_new($atts, $content = null){
    $wp_query = new WP_Query(array(
        'post_type'      => 'post',
        'order'          => 'desc',
        'orderby'        => 'date',
        'post_status'    => 'publish',
        'posts_per_page'  => 12,
        ));
    ob_start();
    if( $wp_query->have_posts() ):
    echo '<div class="post_new">';
    while( $wp_query->have_posts() ): $wp_query->the_post();
    ?> 
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>
        <h4> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p class="excerpt"><?php echo wp_trim_words(get_the_content(),100,'...'); ?></p>
        <a rel="nofollow" target="_blank" href="<?php the_permalink(); ?>">Continue Reading</a>
    <?php
    endwhile;
    wp_reset_query();
    echo '</div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}

// get post new
add_shortcode('get_post_blog','get_post_blog');

function get_post_blog($atts, $content = null){
    $wp_query = new WP_Query(array(
        'post_type'      => 'post',
        'order'          => 'desc',
        'orderby'        => 'date',
        'post_status'    => 'publish',
        'posts_per_page'  => 4,
        ));
    ob_start();
    if( $wp_query->have_posts() ):
    echo '<div class="row blog">';
    while( $wp_query->have_posts() ): $wp_query->the_post();
    ?>
	<div class="col-md-3">
	    <div class="item-blog">
		    <a href="<?php the_permalink(); ?>" class="img-blog">
		        <?php the_post_thumbnail(); ?>
		    </a>
		    <div class="content-blog">
		        <h4 class="ttl-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		        <p class="txt-blog"><?php echo wp_trim_words(get_the_content(),20,'...'); ?></p>
		        <a rel="nofollow" target="_blank" href="<?php the_permalink(); ?>">Continue Reading</a>
		    </div>
		</div>
	</div>
    <?php
    endwhile;
    wp_reset_query();
    echo '</div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}

function filter_all_category_lazada_by_curl() {
	global $wpdb;

	$idWeb = 1;
	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb);
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);
	$percent = 60;
	$numPage = 25;
	
	ini_set('max_execution_time', "-1");

	$ch = curl_init();

	$proxy = get_proxy()[0];

	foreach ($categories as $value) {
		$categoryName = $value->id_category;
		$mainResult = [];
		$stt = 1;

		while(true) {
			$url = 'https://www.lazada.vn/' . $categoryName . '/?page=' . $stt . '&sort=priceasc';

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 2000);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

			$data = curl_exec($ch);

			preg_match_all("/\"itemId\":\"(.+?)\"ratingScore\"/", $data, $output_array);

			if(count($output_array[0]) == 0 || $stt == $numPage){
				break;
			}

			foreach($output_array[0] as $value) {
				$arrResult = [];
				$discount = getValueOf($value, 'discount');
				$discount = str_replace('-', '', $discount);
				$discount = str_replace('%', '', $discount);

				if ($discount >= $percent) {
					$name = getValueOf($value, 'name');
					$id_product = getValueOf($value, 'itemId');
					$linkProduct = 'https:' . getValueOf($value, 'productUrl');
					$imageProduct = getValueOf($value, 'image');
				    $originalPrice = getValueOf($value, 'originalPrice');
				    $originalPrice = str_replace('.00', '', $originalPrice);
				    $originalPrice = str_replace('.0', '', $originalPrice);
				    $price = getValueOf($value, 'price');
				    $lastUpdate = date("Y-m-d H:i:s");
				    $price = str_replace('.00', '', $price);

					$arrResult['id_product'] = $id_product;
					$arrResult['name'] = $name;
					$arrResult['linkProduct'] = $linkProduct;
					$arrResult['imageProduct'] = $imageProduct;
					$arrResult['originalPrice'] = $originalPrice;
					$arrResult['price'] = $price;
					$arrResult['discount'] = $discount;
					$arrResult['last_update'] = $lastUpdate;
					$arrResult['name_category'] = $categoryName;
					$arrResult['id_web'] = $idWeb;

					array_push($mainResult, $arrResult);
				}
			}

			$stt++;
		}

		category_save_db($mainResult, $arrProductId);
	}

	curl_close($ch);
}

function filter_all_category() {
	global $wpdb;

	$idWeb = 1;
	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb);
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);
	$percent = 80;
	$numPage = 25;
	
	ini_set('max_execution_time', 300);


	foreach ($categories as $value) {
		$categoryName = $value->id_category;
		
		$mainResult = [];

		$stt = 1;
		

		while(true) {
			$data = file_get_contents('https://www.lazada.vn/' . $categoryName . '/?page=' . $stt . '&sort=priceasc');
			preg_match_all("/\"itemId\":\"(.+?)\"ratingScore\"/", $data, $output_array);

			
			if(count($output_array[0]) == 0 || $stt == $numPage){
				break;
			}
			
			foreach($output_array[0] as $value){
				$arrResult = [];
				$discount = getValueOf($value, 'discount');
				$discount = str_replace('-', '', $discount);
				$discount = str_replace('%', '', $discount);
				
				if ($discount >= $percent) {
					$name = getValueOf($value, 'name');
					$id_product = getValueOf($value, 'itemId');
					$linkProduct = 'https:' . getValueOf($value, 'productUrl');
					$imageProduct = getValueOf($value, 'image');
				    $originalPrice = getValueOf($value, 'originalPrice');
				    $originalPrice = str_replace('.00', '', $originalPrice);
				    $originalPrice = str_replace('.0', '', $originalPrice);
				    $price = getValueOf($value, 'price');
				    $lastUpdate = date("Y-m-d H:i:s");
				    $price = str_replace('.00', '', $price);

					$arrResult['id_product'] = $id_product;
					$arrResult['name'] = $name;
					$arrResult['linkProduct'] = $linkProduct;
					$arrResult['imageProduct'] = $imageProduct;
					$arrResult['originalPrice'] = $originalPrice;
					$arrResult['price'] = $price;
					$arrResult['discount'] = $discount;
					$arrResult['last_update'] = $lastUpdate;
					$arrResult['name_category'] = $categoryName;
					$arrResult['id_web'] = $idWeb;

					array_push($mainResult, $arrResult);
				}
			}

			$stt++;
		}
		
		category_save_db($mainResult, $arrProductId);
	}
}

function category_save_db($arrayData, $arrProductId) {
	global $wpdb;

	if (empty($arrayData)) {
		return;
	}

	foreach ($arrProductId as $key => $value) {
		$arrProductId[$key] = $value->id_product;
	}

	foreach ($arrayData as $key => $value) {
		$value['price'] = trim((int)($value['price']));
		$value['originalPrice'] = trim((int)($value['originalPrice']));

		if (in_array($value['id_product'], $arrProductId)) {
			$results = $wpdb->get_results ( "UPDATE products SET original_price = ". $value['originalPrice'] .", price = ". $value['price'] .", percent = ". $value['discount'] .", last_update = '". $value['last_update'] . "' WHERE id_product = ". $value['id_product'] . "");
		} else {

			$results = $wpdb->get_results("INSERT INTO products (id_product, name_product, link_product, image_product, original_price, price, percent, name_category, id_web) VALUES (". $value['id_product'] .", '". $value['name'] . "', '". $value['linkProduct'] ."', '". $value['imageProduct'] ."', ". $value['originalPrice'] .",". $value['price'] .", ". $value['discount'] .", '". $value['name_category'] . "',". $value['id_web'] .")");
		}
	}

	return;
}

function category_save_db_api($value, $arrProductId) {
	global $wpdb;

	if (empty($value)) {
		return;
	}
	$lastUpdate = date("Y-m-d H:i:s");

	foreach ($arrProductId as $key => $value2) {
		$arrProductId[$key] = $value2->id_product;
	}

	$value['price'] = trim((int)($value['price']));
	$value['original_price'] = trim((int)($value['original_price']));

	if (in_array($value['id_product'], $arrProductId)) {
		$results = $wpdb->get_results ( "UPDATE products SET original_price = ". $value['original_price'] .", price = ". $value['price'] .", percent = ". $value['percent'] .", last_update = '". $lastUpdate . "' WHERE id_product = ". $value['id_product'] . "");
	} else {
		$results = $wpdb->get_results("INSERT INTO products (id_product, name_product, link_product, image_product, original_price, price, percent, name_category, id_web) VALUES (". $value['id_product'] .", '". $value['name_product'] . "', '". $value['link_product'] ."', '". $value['image_product'] ."', ". $value['original_price'] .",". $value['price'] .", ". $value['percent'] .", '". $value['name_category'] . "',". $value['id_web'] .")");
	
	}

	return;
}

add_action( 'wpb_custom_cron', 'filter_all_category' );

function filter_all_category_tiki() {
	
	$idWeb = '3';
	
	global $wpdb;

	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb);
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb );
	$percent = 80;
	$numPage = 50;
	ini_set('max_execution_time', '-1');

	foreach ($categories as $categorie) {
		$mainResult = [];
		$stt = 1;

		while(true) {

			if($stt == $numPage){
				break;
			}

			$data = file_get_contents('https://tiki.vn/' . $categorie->id_category . '?src=mega-menu&order=price%2Casc&page=' . $stt);

			$doc = new DOMDocument();
			@$doc->loadHTML('<?xml encoding="UTF-8">' . $data);

			$nodes = $doc->getElementsByTagName('div');

			foreach ($nodes as $node) {
				$arrResult = [];

				if($node->hasAttribute('data-seller-product-id')) {
					$tag_a = $node->getElementsByTagName('a')->item(0);
					$idProduct = $tag_a->getAttribute('data-id');
					$name = $tag_a->getAttribute('title');
					$linkProduct = $tag_a->getAttribute('href');
					$imageProduct = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
					$tag_span = $node->getElementsByTagName('span');

					foreach ($tag_span as $span) {
						if ($span->getAttribute('class') == 'price-regular') {
							$originalPrice = $span->nodeValue;
							$originalPrice = str_replace('.', '', $originalPrice);
							$originalPrice = str_replace('₫', '', $originalPrice);
						}
						if ($span->getAttribute('class') == 'final-price') {
							$price = trim($span->nodeValue);
							$price = str_replace('.', '', $price);
							$price = str_replace('₫', '', $price);
						}
						if ($span->getAttribute('class') == 'sale-tag sale-tag-square') {
							$discount = $span->nodeValue;
							$discount = str_replace('%', '', $discount);
							$discount = str_replace('-', '', $discount);
						}
					}

					if ((int)$discount < $percent) {
						continue;
					}

					$lastUpdate = date("Y-m-d H:i:s");

					$arrResult['id_product'] = $idProduct;
					$arrResult['name'] = $name;
					$arrResult['linkProduct'] = $linkProduct;
					$arrResult['imageProduct'] = $imageProduct;
					$arrResult['originalPrice'] = $originalPrice;
					$arrResult['price'] = $price;
					$arrResult['discount'] = $discount;
					$arrResult['last_update'] = $lastUpdate;
					$arrResult['name_category'] = $categorie->id_category;
					$arrResult['id_web'] = $idWeb;

					array_push($mainResult, $arrResult);

					
				}
				
			}

			$stt++;

		}

		category_save_db($mainResult, $arrProductId);
	}
}

add_action( 'wpb_custom_cron_filter_tiki', 'filter_all_category_tiki' );

function filter_all_category_tiki_by_curl() {
	ini_set('max_execution_time', '-1');
	$idWeb = '3';
	global $wpdb;
	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb . " AND status = 1");
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb );
	$percent = 80;
	$numPage = 200;

	$ch = curl_init();
	$user_agent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";

	foreach ($categories as $categorie) {
		$mainResult = [];
		$stt = 1;

		while(true) {
			if ($stt == $numPage) {
				break;
			}

			$url = 'https://tiki.vn/' . $categorie->id_category . '?src=mega-menu&order=price%2Casc&page=' . $stt;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

			$data = curl_exec($ch);

			$doc = new DOMDocument();
			@$doc->loadHTML('<?xml encoding="UTF-8">' . $data);

			$nodes = $doc->getElementsByTagName('div');

			foreach ($nodes as $node) {
				$arrResult = [];

				if ($node->hasAttribute('data-seller-product-id')) {
					$tag_a = $node->getElementsByTagName('a')->item(0);
					$idProduct = $tag_a->getAttribute('data-id');
					$name = $tag_a->getAttribute('title');
					$linkProduct = $tag_a->getAttribute('href');
					$imageProduct = $node->getElementsByTagName('img')->item(0)->getAttribute('src');
					$tag_span = $node->getElementsByTagName('span');

					foreach ($tag_span as $span) {
						if ($span->getAttribute('class') == 'price-regular') {
							$originalPrice = $span->nodeValue;
							$originalPrice = str_replace('.', '', $originalPrice);
							$originalPrice = str_replace('₫', '', $originalPrice);
						}

						if ($span->getAttribute('class') == 'final-price') {
							$price = trim($span->nodeValue);
							$price = str_replace('.', '', $price);
							$price = str_replace('₫', '', $price);
						}

						if ($span->getAttribute('class') == 'sale-tag sale-tag-square') {
							$discount = $span->nodeValue;
							$discount = str_replace('%', '', $discount);
							$discount = str_replace('-', '', $discount);
						}
					}

					if ((int)$discount < $percent) {
						continue;
					}

					$lastUpdate = date("Y-m-d H:i:s");

					$arrResult['id_product'] = $idProduct;
					$arrResult['name'] = $name;
					$arrResult['linkProduct'] = $linkProduct;
					$arrResult['imageProduct'] = $imageProduct;
					$arrResult['originalPrice'] = $originalPrice;
					$arrResult['price'] = $price;
					$arrResult['discount'] = $discount;
					$arrResult['last_update'] = $lastUpdate;
					$arrResult['name_category'] = $categorie->id_category;
					$arrResult['id_web'] = $idWeb;

					array_push($mainResult, $arrResult);
				}
			}

			$stt++;
		}

		category_save_db($mainResult, $arrProductId);
	}
	
	curl_close($ch);
}

add_action('wpb_custom_cron_filter_tiki_by_curl', 'filter_all_category_tiki_by_curl');

function filter_all_category_tiki_by_api() {
	ini_set('max_execution_time', '-1');
	$idWeb = '3';
	global $wpdb;
	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb);
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb );
	$percent = 80;
	$numPage = 5;

	$ch = curl_init();
	$user_agent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";

	foreach ($categories as $categorie) {
		$mainResult = [];
		$stt = 1;
		$check = false;

		while(true) {
			if ($stt == $numPage || $check) {
				break;
			}

			$id = $categorie->id_category;
			$arr_s = explode('/', $id);
			$id = str_replace('c', '', $arr_s[1]);


			$url = 'https://tiki.vn/api/v2/landingpage/products?category_id=' . $id . '&limit=48&sort=discount_percent,desc&page=' . $stt;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

			$data = curl_exec($ch);

			$datas = json_decode($data)->data;
			
			foreach ($datas as $item) {
				$arrResult = [];

				$discount = $item->discount_rate;

				if ((int)$discount < $percent) {
					$check = true;
					break;
				}

				$idProduct = $item->id;
				$name = $item->name;
				$linkProduct = 'https://tiki.vn/' . $item->url_key . '.html';
				$imageProduct = $item->thumbnail_url;
				$originalPrice = $item->list_price;
				$price = $item->price;

				$lastUpdate = date("Y-m-d H:i:s");

				$arrResult['id_product'] = $idProduct;
				$arrResult['name'] = $name;
				$arrResult['linkProduct'] = $linkProduct;
				$arrResult['imageProduct'] = $imageProduct;
				$arrResult['originalPrice'] = $originalPrice;
				$arrResult['price'] = $price;
				$arrResult['discount'] = $discount;
				$arrResult['last_update'] = $lastUpdate;
				$arrResult['name_category'] = $categorie->id_category;
				$arrResult['id_web'] = $idWeb;

				array_push($mainResult, $arrResult);
			}

			$stt++;
		}

		category_save_db($mainResult, $arrProductId);
	}
	
	curl_close($ch);
}

function filter_tiki_for_lan_ml() {
	ini_set('max_execution_time', '-1');
	$idWeb = '3';
	global $wpdb;
	$categories = $wpdb->get_results ("SELECT * FROM categories WHERE id_web=" . $idWeb);
	$percent = 80;
	$numPage = 5;

	$ch = curl_init();
	$user_agent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";

	foreach ($categories as $categorie) {
		$mainResult = [];
		$stt = 1;
		$check = false;

		while(true) {
			if ($stt == $numPage || $check) {
				break;
			}

			$id = $categorie->id_category;
			$arr_s = explode('/', $id);
			$id = str_replace('c', '', $arr_s[1]);


			$url = 'https://tiki.vn/api/v2/landingpage/products?category_id=' . $id . '&limit=48&sort=discount_percent,desc&page=' . $stt;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

			$data = curl_exec($ch);

			$datas = json_decode($data)->data;
			
			foreach ($datas as $item) {
				$arrResult = [];

				$discount = $item->discount_rate;

				if ((int)$discount < $percent) {
					$check = true;
					break;
				}

				$idProduct = $item->id;
				$name = $item->name;
				$linkProduct = 'https://tiki.vn/' . $item->url_key . '.html';
				$imageProduct = $item->thumbnail_url;
				$originalPrice = $item->list_price;
				$price = $item->price;

				$lastUpdate = date("Y-m-d H:i:s");

				$arrResult['id_product'] = $idProduct;
				$arrResult['name'] = $name;
				$arrResult['linkProduct'] = $linkProduct;
				$arrResult['imageProduct'] = $imageProduct;
				$arrResult['originalPrice'] = $originalPrice;
				$arrResult['price'] = $price;
				$arrResult['discount'] = $discount;
				$arrResult['last_update'] = $lastUpdate;
				$arrResult['name_category'] = $categorie->id_category;
				$arrResult['id_web'] = $idWeb;

				array_push($mainResult, $arrResult);
			}

			$stt++;
		}
	}
	
	curl_close($ch);

	return $mainResult;
}

add_action('wpb_custom_cron_filter_tiki_by_api', 'filter_all_category_tiki_by_api');

function get_data_voucher($data, $name) {
	preg_match("/". $name ."=\"(.+?)\"/", $data, $output_array);
	return $output_array[1];
}

function get_voucher() {
	global $wpdb;
	ini_set('max_execution_time', 300);

	$arr_website = [
		'lazada' => 'https://mgg.vn/ma-giam-gia/lazada/',
		'shopee' => 'https://mgg.vn/ma-giam-gia/shopee/',
		'tiki' => 'https://mgg.vn/ma-giam-gia/tiki-vn/'
	];

	foreach ($arr_website as $name_web => $link_web) {
		$data = file_get_contents($link_web);
	
		preg_match_all("/<h3 class=\"coupon-title\">(.+?)<div class=\"coupon-des\">/", $data, $output_array);

		if(count($output_array[1]) > 0) {
			foreach ($output_array[1] as $key => $value) {
				$title_type = get_data_voucher($value, 'data-type');

				if($title_type == 'code') {
					preg_match("/<span class=\"exp\">(.+?)<\/span>/", $value, $time_out);

					if($time_out[1] != 'Đã hết hạn' && $time_out[1] != '') {
						$title = get_data_voucher($value, 'title');
						$data_code = get_data_voucher($value, 'data-code');

						$results = $wpdb->get_results("INSERT INTO voucher (code, type, name, description, time_out, website) VALUES ('". $data_code ."', 'code', '". $title ."', '". $title ."','". $time_out[1] ."', '". $name_web ."')");	


					}
				}
			}
		}
	}
}

add_action('wp_ajax_api_v1_lazada_get_db', 'api_v1_lazada_get_db');
add_action('wp_ajax_nopriv_api_v1_lazada_get_db', 'api_v1_lazada_get_db');

function api_v1_lazada_get_db() {
	global $wpdb;
	$idWeb = 1;
	
	$results = $wpdb->get_results ( "SELECT * FROM products WHERE id_web=" . $idWeb . " ORDER BY `percent` DESC LIMIT 50" );

	wp_send_json($results);
}

add_action('wp_ajax_api_v1_lazada_set_db', 'api_v1_lazada_set_db');
add_action('wp_ajax_nopriv_api_v1_lazada_set_db', 'api_v1_lazada_set_db');

function api_v1_lazada_set_db() {
	global $wpdb;
	$idWeb = $_GET['id_web'];

	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);
	$arrayData = [];

    $arrayData['id_product'] = $_GET['id_product'];
    $arrayData['name_product'] = $_GET['name_product'];
    $arrayData['link_product'] = $_GET['link_product'];
    $arrayData['image_product'] = $_GET['image_product'];
    $arrayData['original_price'] = $_GET['original_price'];
    $arrayData['price'] = $_GET['price'];
    $arrayData['percent'] = $_GET['percent'];
    $arrayData['name_category'] = $_GET['name_category'];
    $arrayData['id_web'] = $_GET['id_web'];

	category_save_db_api($arrayData, $arrProductId);

	echo "Done";
}

function checkDateVoucher($stringText) {
	if ($stringText == 'No Expires') {
		return true;
	}

	$datetime1 = new DateTime(date("Y-m-d H:i:s"));
	$monthNow = $datetime1->format('m');
	$yearNow = '20' . $datetime1->format('y');

	$arr = explode("/", $stringText);

	$monthEx = $arr[1];
	$yearEx = $arr[2];

	if ((int)$yearNow <= (int)$yearEx && (int)$monthNow <= (int)$monthEx) {
		return true;
	}

	return false;
}

add_action('wp_ajax_option_item', 'option_item');
add_action('wp_ajax_nopriv_option_item', 'option_item');

function option_item() {
	global $wpdb;

	$result = '';
	$id = $_GET['id'];
	$value = $_GET['value'];
	$results = $wpdb->get_results ( "UPDATE products SET status = ". $value . " WHERE id = ". $id . "");
	echo 'true';
	die();
}

add_action('wp_ajax_get_google_ads', 'get_google_ads');
add_action('wp_ajax_nopriv_get_google_ads', 'get_google_ads');

function get_google_ads() {
	$result = '';
	$url = $_POST['url'];
	$data = file_get_contents($url);

	preg_match_all("/https:\/\/googleads.g.doubleclick.net\/aclk(.+?)\"/", $data, $output_array);
	
	$link = $output_array[0][0];
	$link = unescapeUTF8EscapeSeq($link);
	$link = str_replace('"', '', $link);

	wp_send_json($link);
	die();
}

function unescapeUTF8EscapeSeq($str) {
    return preg_replace_callback("/\\\u([0-9a-f]{4})/i",
        create_function('$matches',
            'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');'
        ), $str);
}

add_action('wpb_custom_cron_filter_shopee_by_curl', 'filter_all_category_shopee_by_curl');

function filter_all_category_shopee_by_curl() {
	ini_set('max_execution_time', '-1');
	global $wpdb;
	$percent = 80;
	$numPage = 300;
	$idWeb = 2;

	$ch = curl_init();

	$mainResult = [];
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);
	$url = "https://shopee.vn/api/v1/category_list/";
	$user_agent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

	$data = curl_exec($ch);
	$list_category = json_decode($data);

	foreach ($list_category as $category) {
		$category_id = $category->main->catid;

		for ($i = 0; $i <= $numPage; $i += 50) {
			$url = "https://shopee.vn/api/v2/search_items/?by=price&limit=50&match_id=" . $category_id . "&newest=" . $i . "&order=asc&page_type=search&rating_filter=1";
			
			curl_setopt($ch, CURLOPT_URL, $url);
			$data = curl_exec($ch);
			$list_item = json_decode($data);
			$list_item = $list_item->items;

			foreach ($list_item as $item) {
				$arrResult = [];
				$discount = $item->discount;
				$discount = str_replace("%", "", $discount);

				if (!empty($discount) && $discount >= $percent) {
					$arrResult = get_info_item($item, $category_id, $idWeb, $discount);

					array_push($mainResult, $arrResult);
				}
			}
		}
	}

	category_save_db($mainResult, $arrProductId);
}

function filter_all_category_shopee() {
	ini_set('max_execution_time', '-1');
	global $wpdb;
	$percent = 1;
	$numPage = 200;
	$idWeb = 2;

	$mainResult = [];
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);

	$url = "https://shopee.vn/api/v1/category_list/";

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$list_category = file_get_contents($url, false, $context);

	foreach (json_decode($list_category) as $category) {
		$category_id = $category->main->catid;

		for ($i = 0; $i <= $numPage; $i += 50) {
			$url = "https://shopee.vn/api/v2/search_items/?by=price&limit=50&match_id=" . $category_id . "&newest=" . $i . "&order=asc&page_type=search&rating_filter=1";
			
			$data = file_get_contents($url, false, $context);

			$list_item = json_decode($data);

			$list_item = $list_item->items;
			
			foreach ($list_item as $item) {
				$arrResult = [];
				$discount = $item->discount;
				$discount = str_replace("%", "", $discount);

				if (!empty($discount) && $discount >= $percent) {
					
					$arrResult = get_info_item($item, $category_id, $idWeb, $discount);

					array_push($mainResult, $arrResult);
				}
			}
		}
	}

	category_save_db($mainResult, $arrProductId);
}

function get_info_item($item, $category_id, $idWeb, $discount) {
	ini_set('max_execution_time', '-1');
	$arrResult = [];
	$originalPrice = '';
	$name_category = $category_id;
	$price = '';
	$shop_id = $item->shopid;

	$index1 = strpos($item->name, "#", 1);
	$name = $item->name;

	if ($index1 !== false){
		$name = substr($item->name, 0, $index1);
	}

	$linkProduct = str_replace(" ", "-", $name);

	$linkProduct = "https://shopee.vn/" . $linkProduct . "-i." . $shop_id . "." . $item->itemid;

	$lastUpdate = date("Y-m-d H:i:s");

	$url = "https://shopee.vn/api/v2/item/get?itemid=" . $item->itemid . "&shopid=". $shop_id;

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$list_item = file_get_contents($url, false, $context);

	$item_detail = json_decode($list_item)->item;
	
	$originalPrice = $item_detail->price_before_discount;
	$originalPrice = str_replace("00000", "", $originalPrice);
	$price = $item_detail->price;
	$price = str_replace("00000", "", $price);
	$imageProduct = "https://cf.shopee.vn/file/" . $item_detail->image;

	$arrResult['id_product'] = $item->itemid;
	$arrResult['name'] = $item->name;
	$arrResult['linkProduct'] = $linkProduct;
	$arrResult['imageProduct'] = $imageProduct;
	$arrResult['originalPrice'] = $originalPrice;
	$arrResult['price'] = $price;
	$arrResult['discount'] = $discount;
	$arrResult['last_update'] = $lastUpdate;
	$arrResult['name_category'] = $name_category;
	$arrResult['id_web'] = $idWeb;

	return $arrResult;
}

add_action( 'wpb_custom_cron_filter_sendo_by_curl', 'filter_sendo_by_curl' );

function filter_sendo_by_curl() {
	ini_set('max_execution_time', '-1');
	global $wpdb;
	$percent = 81;
	$numPage = 50;
	$idWeb = 4;

	$ch = curl_init();

	$mainResult = [];
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);

	$url = "https://www.sendo.vn/m/wap_v2/category/sitemap";
	$user_agent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

	$data = curl_exec($ch);
	
	$list_category = json_decode($data);

	foreach ($list_category->result->data as $category) {
		foreach ($category->child as $category_id) {
			$category_id = $category_id->id;

			for ($i = 0; $i <= $numPage; $i++) {
				$url = "https://www.sendo.vn/m/wap_v2/category/product?category_id=" . $category_id . "&listing_algo=algo6&p=" . $i . "&s=60&sortType=price_asc";

				curl_setopt($ch, CURLOPT_URL, $url);

				$data = curl_exec($ch);

				$list_item = json_decode($data);

				$list_item = $list_item->result->data;

				foreach ($list_item as $item) {
					$arrResult = [];
					$discount = $item->promotion_percent;
					$discount = str_replace("%", "", $discount);

					if (!empty($discount) && $discount >= $percent) {
						$lastUpdate = date("Y-m-d H:i:s");
						$linkProduct = "https://sendo.vn/" . $item->cat_path;
						$arrResult['id_product'] = $item->product_id;
						$arrResult['name'] = $item->name;
						$arrResult['linkProduct'] = $linkProduct;
						$arrResult['imageProduct'] = $item->image;
						$arrResult['originalPrice'] = $item->price;
						$arrResult['price'] = $item->final_price;
						$arrResult['discount'] = $discount;
						$arrResult['last_update'] = $lastUpdate;
						$arrResult['name_category'] = $category_id;
						$arrResult['id_web'] = $idWeb;

						array_push($mainResult, $arrResult);
					}
				}
			}
		}
	}

	curl_close($ch);
	category_save_db($mainResult, $arrProductId);
}

add_action( 'wpb_custom_cron_filter_shopee', 'filter_all_category_shopee' );

function filter_all_category_sendo() {
	ini_set('max_execution_time', '-1');
	global $wpdb;
	$percent = 81;
	$numPage = 25;
	$idWeb = 4;

	$mainResult = [];
	$arrProductId = $wpdb->get_results( "SELECT id_product FROM products WHERE id_web=" . $idWeb);

	$url = "https://www.sendo.vn/m/wap_v2/category/sitemap";

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$list_category = file_get_contents($url, false, $context);

	$list_category = json_decode($list_category)->result->data;

	foreach ($list_category as $category) {
		foreach ($category->child as $category_id) {
			$category_id = $category_id->id;

			for ($i = 0; $i <= $numPage; $i++) {
				$url = "https://www.sendo.vn/m/wap_v2/category/product?category_id=" . $category_id . "&listing_algo=algo6&p=" . $i . "&s=60&sortType=price_asc";

				$data = file_get_contents($url, false, $context);

				$list_item = json_decode($data);

				$list_item = $list_item->result->data;

				foreach ($list_item as $item) {
					$arrResult = [];
					$discount = $item->promotion_percent;
					$discount = str_replace("%", "", $discount);

					if (!empty($discount) && $discount >= $percent) {
						$lastUpdate = date("Y-m-d H:i:s");
						$linkProduct = "https://sendo.vn/" . $item->cat_path;
						$arrResult['id_product'] = $item->product_id;
						$arrResult['name'] = $item->name;
						$arrResult['linkProduct'] = $linkProduct;
						$arrResult['imageProduct'] = $item->image;
						$arrResult['originalPrice'] = $item->price;
						$arrResult['price'] = $item->final_price;
						$arrResult['discount'] = $discount;
						$arrResult['last_update'] = $lastUpdate;
						$arrResult['name_category'] = $category_id;
						$arrResult['id_web'] = $idWeb;

						array_push($mainResult, $arrResult);
					}
				}
			}
		}
	}

	category_save_db($mainResult, $arrProductId);
}

add_action( 'wpb_custom_cron_filter_sendo', 'filter_all_category_sendo' );

add_action('wp_ajax_set_voucher', 'set_voucher');
add_action('wp_ajax_nopriv_set_voucher', 'set_voucher');

function set_voucher() {
	global $wpdb;
	$id_coupon = $_POST['id_coupon'];
	$code = $_POST['code'];
	$is_voucher = $_POST['is_voucher'];
	$percent = $_POST['percent'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$link_aff = $_POST['link_aff'];
	$time_out = $_POST['date_exp'];
	$name_cate = $_POST['name_cate'];
	$website = $_POST['website'];
	

	$arr_id_coupon = $wpdb->get_results ("SELECT id_coupon FROM voucher WHERE website='" . $website . "'");

	foreach ($arr_id_coupon as $key => $value) {
		$arr_id_coupon[$key] = $value->id_coupon;
	}
	
	if (in_array($id_coupon, $arr_id_coupon)) {
		$results = $wpdb->get_results ( "UPDATE voucher SET time_out = '". $time_out ."' WHERE id_coupon = '". $id_coupon . "'");
	} else {
		$results = $wpdb->get_results("INSERT INTO voucher (id_coupon, code, is_voucher, percent, name, description, link_aff, time_out, name_cate, website) VALUES ('". $id_coupon ."', '". $code . "', '". $is_voucher ."', '". $percent ."', '". $name ."','". $description ."', '". $link_aff ."', '". $time_out . "','". $name_cate . "', '" . $website ."')");
	}

	wp_send_json('Done');
	die;
}

function get_list_key_api() {
	global $wpdb;
	$result = '';
	$apis = $wpdb->get_results ("SELECT key_api FROM key_apis WHERE `active` = true LIMIT 1");

	if (!empty($apis)) {
		// foreach ($apis as $item) {
		// 	$result .= $item->key_api . ',';
		// }
		$result = $apis[0]->key_api;
	}

	return $result;
}

function get_list_access_token() {
	global $wpdb;
	$result = '';
	$apis = $wpdb->get_results ("SELECT access_token FROM access_tokens WHERE `active` = true LIMIT 1");

	if (!empty($apis)) {
		// foreach ($apis as $item) {
		// 	$result .= $item->key_api . ',';
		// }
		$result = $apis[0]->access_token;
	}

	return $result;
}

function get_list_channel() {
	global $wpdb;

	$result = '';
	$user_name = $_SESSION["user_name"];
	$ids = $wpdb->get_results ("SELECT id FROM user_for_youtube WHERE `user_name`='" . $user_name . "'");

	if (!empty($ids)) {
		$id_user = $ids[0]->id;
		$_SESSION['user_id'] = $id_user;

		$channels = $wpdb->get_results ("SELECT id_channel FROM channels WHERE `user`='" . $id_user . "'");

		if (!empty($channels)) {
			foreach ($channels as $item) {
				$result .= $item->id_channel . ',';
			}
		}

		return $result;
	}
}

function get_list_page() {
	global $wpdb;

	$result = '';
	$user_name = $_SESSION["user_name"];
	$ids = $wpdb->get_results ("SELECT id FROM user_for_youtube WHERE `user_name`='" . $user_name . "'");

	if (!empty($ids)) {
		$id_user = $ids[0]->id;
		$_SESSION['user_id'] = $id_user;

		$channels = $wpdb->get_results("SELECT page_id FROM facebook_pages WHERE `user`='" . $id_user . "'");

		if (!empty($channels)) {
			foreach ($channels as $item) {
				$result .= $item->page_id . ',';
			}
		}

		return $result;
	}
}


function get_info_channel($id_channel) {
	ini_set('max_execution_time', '-1');
	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);  

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$key_apis = get_list_key_api();


	if (!empty($key_apis)) {
		$key_api = $key_apis[0]->key_api;
		$url = "https://www.googleapis.com/youtube/v3/channels?key=" . $key_api . "&part=snippet,statistics&id=" . $id_channel;

		$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

		$list_item = json_decode($response);

		$snippet = $list_item->items[0]->snippet;
		$name_channel = $snippet->title;
		$statistics = $list_item->items[0]->statistics;
		$view_count = $statistics->viewCount;
		$subscriber_count = $statistics->subscriberCount;
		$hidden_subscriber_count = $statistics->hiddenSubscriberCount;
		$video_count = $statistics->videoCount;

		return [
			'name_channel' => $name_channel,
			'view_count' => $view_count,
			'subscriber_count' => $subscriber_count,
			'hidden_subscriber_count' => $hidden_subscriber_count,
			'video_count' => $video_count,
			'id_channel' => $id_channel
		];
	}

	return [];
}

function get_info_page($pages) {
	ini_set('max_execution_time', '-1');
	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);  

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$access_token = get_list_access_token();
	$result = [];

	if (!empty($access_token)) {
		foreach ($pages as $page_id) {
			if ($page_id == '') {
				continue;
			}

			$url = "https://graph.facebook.com/v3.3/" . $page_id . "?fields=fan_count,link,name&access_token=" . $access_token;

			$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

			$list_item = json_decode($response);
			$page_like = $list_item->fan_count;
			$page_link = $list_item->link;
			$page_name = $list_item->name;

			$arr = [
				'likes' => $page_like,
				'link' => $page_link,
				'page_id' => $page_id,
				'page_name' => $page_name
			];

			array_push($result, $arr);
		}
	}

	return $result;
}

function get_info_detail_page($page_id, $total_day = 1) {
	$result = [];
	$point_share = 3;
	$point_comment = 2;
	$point_other = 1;

	date_default_timezone_set('UTC');
	$vi_time = new DateTimeZone('+7');
	ini_set('max_execution_time', '-1');
	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);  

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$access_token = get_list_access_token();

	if (!empty($access_token)) {
		$total_limit = 50;
		$total_result = 0;
		$check = true;
		$url = "https://graph.facebook.com/v3.3/" . $page_id . "/feed?fields=created_time&limit=" . $total_limit . "&access_token=" . $access_token;
		$next_page = '';
		$stt = 1;

		while ($check) {
			$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

			$list_item = json_decode($response);

			$datas = $list_item->data;
			$next_page = !empty($list_item->paging->next) ? $list_item->paging->next : '';

			foreach ($datas as $item) {
				$time_now = time();
				$your_date = strtotime($item->created_time);
				$datediff = $time_now - $your_date;

				$datediff =  round($datediff/(60*60));

				if ($datediff >= $total_day*24) {
					$check = false;
					break;
				}

				if ($datediff < $total_day*24) {
					$total_result++;
				}
			}

			if ($next_page == '') {
				break;
			}

			$url = $next_page;
			$stt++;
		}

		$next_page = '';
		$stt = 1;
		$check = true;

		while ($total_result > 0) {
			if ($total_result < $total_limit + 1) {
				$count_need = $total_result;
				$total_result = 0;
			} else {
				$count_need = $total_limit;
				$total_result = $total_result - $total_limit;
			}
			
			if ($next_page == '') {
				$url = "https://graph.facebook.com/v3.3/" . $page_id . "?fields=name%2Cfeed.limit(" . $count_need . "){comments,created_time,message,likes,shares,reactions.limit(0).type(HAHA).summary(total_count).as(reactions_haha),reactions.limit(0).type(WOW).summary(total_count).as(reactions_wow),reactions.limit(0).type(SAD).summary(total_count).as(reactions_sad),reactions.limit(0).summary(total_count).as(reactions_total)}&access_token=" . $access_token;
			} else {
				$url = $next_page;
			}

			$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

			$list_item = json_decode($response);

			if ($stt == 1) {
				$name = $list_item->name;
				$datas = $list_item->feed->data;
				$next_page = $list_item->feed->paging->next;
			} else {
				$datas = $list_item->data;
				$next_page = $list_item->paging->next;
			}

			foreach ($datas as $item) {
				$time_now = time();
				$your_date = strtotime($item->created_time);
				$datediff = $time_now - $your_date;

				$datediff =  round($datediff/(60*60));

				if ($datediff >= $total_day*24) {
					$check = false;
					break;
				}

				if ($datediff < $total_day*24) {
					$message = $item->message;
					$post_id = $item->id;

					$comments = $item->comments->count;
					// $comments = 0;

					$reactions_haha = $item->reactions_haha->summary->total_count;
					$reactions_wow = $item->reactions_wow->summary->total_count;
					$reactions_sad = $item->reactions_sad->summary->total_count;
					$reactions_total = $item->reactions_total->summary->total_count;

					$likes = !empty($item->likes) ? $item->likes->count : 0;
					$shares = !empty($item->shares) ? $item->shares->count : 0;
					$total_point = $shares*$point_share + $comments*$point_comment + $reactions_total*$point_other;

					$created_time = new DateTime($item->created_time);
					$created_time->setTimezone($vi_time);
					$created_time = $created_time->format('Y-m-d H:i:s');

					$arr = [
						'post_id' => $post_id,
						'message' => $message,
						'likes' => $likes,
						'shares' => $shares,
						'comments' => $comments,
						'reactions_haha' => $reactions_haha,
						'reactions_wow' => $reactions_wow,
						'reactions_sad' => $reactions_sad,
						'reactions_total' => $reactions_total,
						'total_point' => $total_point,
						'created_time' => $created_time
					];

					array_push($result, $arr);
				}
			}

			if ($next_page == '' || $total_result < 1) {
				break;
			}

			$url = $next_page;
			$stt++;
		}
	}

	return [
		'name' => $name,
		'datas' => $result
	];
}

function sort_list_post($datas, $sort_by) {
	if ($sort_by == 'most_view') {
		$total_point = array_column($datas, 'total_point');
		array_multisort($total_point, SORT_DESC, $datas);

		return $datas;
	}

	return $datas;
}

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

add_action('wp_ajax_add_channel', 'add_channel');
add_action('wp_ajax_nopriv_add_channel', 'add_channel');

function add_channel() {
	global $wpdb;
	$user_id = $_SESSION['user_id'];
	$url_channel = $_POST['url_channel'];
	// https://www.youtube.com/channel/UCC9LAF4c14W8NoYCm06eREQ/edit
	$url_channel = str_replace('https://www.youtube.com/channel/', '', $url_channel);
	$id_channel = $url_channel;

	$index = strpos($url_channel, '/');

	if ($index !== false) {
		$id_channel = substr($url_channel, 0, $index);
	}

	if ($id_channel == '') {
		wp_send_json('false');
		die();
	}

	$wpdb->get_results("INSERT INTO channels (id_channel, user) VALUES ('" . $id_channel . "', " . $user_id . ")");
	wp_send_json('Done');
	die;
}

add_action('wp_ajax_add_page', 'add_page');
add_action('wp_ajax_nopriv_add_page', 'add_page');

function add_page() {
	global $wpdb;
	$user_id = $_SESSION['user_id'];
	$url_page = $_POST['url_page'];

	$url_page = get_page_id_by_url($url_page);

	if ($url_page == '') {
		wp_send_json(['status' => false]);
		die();
	}

	$wpdb->get_results("INSERT INTO facebook_pages (page_id, user) VALUES ('" . $url_page . "', " . $user_id . ")");
	wp_send_json(['status' => true]);
	die;
}

function get_page_id_by_url($url) {
	ini_set('max_execution_time', '-1');

	$check = strpos($url, 'http');

	if ($check === false) {
		$url = "https://facebook.com/" . $url;
	}

	$opts = [
	    "http" => [
	        "method" => "GET",
	        "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36"
	    ]
	];

	$context = stream_context_create($opts);

	$response = file_get_contents($url, false, $context);

	preg_match_all("/content=\"fb:\/\/page\/\?id=(.+?)\"/", $response, $output_array);

	if (!empty($output_array) && count($output_array) > 1 && !empty($output_array[1])) {
		return $output_array[1][0];
	}

	return '';
}

add_action('wp_ajax_process_form_login', 'process_form_login');
add_action('wp_ajax_nopriv_process_form_login', 'process_form_login');

function process_form_login() {
	global $wpdb;

	$user_name = $_GET['user_name'];

	$password = $_GET['password'];
	$password = base64_url_encode($password);

	$result = $wpdb->get_results("SELECT * FROM user_for_youtube WHERE `user_name` = '" . $user_name . "' and `password` = '" . $password . "'");
	
	if (count($result) == 0) {
		wp_send_json(['status' => false]);
	}

	$_SESSION['user_name'] = $user_name;
	wp_send_json(['status' => true]);
	die;
}

function base64_url_encode($input) {
 	return strtr(base64_encode($input), '+/=', '._-');
}

function base64_url_decode($input) {
 	return base64_decode(strtr($input, '._-', '+/='));
}

add_action('wp_ajax_remove_channel', 'remove_channel');
add_action('wp_ajax_nopriv_remove_channel', 'remove_channel');

function remove_channel() {
	global $wpdb;
	$user_id = $_SESSION['user_id'];
	$id_channel = $_POST['id_channel'];

	$wpdb->get_results("DELETE FROM `channels` WHERE `id_channel`='" . $id_channel ."' AND `user`=" . $user_id);

	wp_send_json(['success' => true]);
	die;
}

add_action('wp_ajax_remove_page', 'remove_page');
add_action('wp_ajax_nopriv_remove_page', 'remove_page');

function remove_page() {
	global $wpdb;
	$user_id = $_SESSION['user_id'];
	$page_id = $_POST['page_id'];

	$wpdb->get_results("DELETE FROM `facebook_pages` WHERE `page_id`='" . $page_id ."' AND `user`=" . $user_id);

	wp_send_json(['success' => true]);
	die;
}

add_action('wp_ajax_set_key_api_limit', 'set_key_api_limit');
add_action('wp_ajax_nopriv_set_key_api_limit', 'set_key_api_limit');

function set_key_api_limit() {
	global $wpdb;
	$key_api = $_GET['key_api'];

	$wpdb->get_results("UPDATE `key_apis` SET `active` = 0 WHERE `key_api` = '" . $key_api . "'");
	wp_send_json(['success' => true]);
	die;
}

add_action('wp_ajax_api_v1_get_category', 'api_v1_get_category');
add_action('wp_ajax_nopriv_api_v1_get_category', 'api_v1_get_category');

function api_v1_get_category() {
	global $wpdb;
	$results = '';
	$idWeb = $_GET['id_web'];
	
	$category = $wpdb->get_results ("SELECT id_category FROM categories WHERE id_web=" . $idWeb);

	if (!empty($category)) {
		foreach ($category as $item) {
			$results .= $item->id_category . ',';
		}
	}
	wp_send_json($results);
}

function clear_voucher_expired() {
	global $wpdb;
	$results = [];
	
	$vouchers = $wpdb->get_results ("SELECT * FROM voucher WHERE status = 1 ORDER BY `voucher`.`updated` ASC");

	if (empty($vouchers)) {
		return;
	}

	foreach ($vouchers as $item) {
		$time_out = $item->time_out;

		if ($time_out != 'Còn hiệu lực') {
			$time_out = str_replace(' ', '', $time_out);
			$arr = explode("/", $time_out);
			$time_out = $arr[1] . '/' . $arr[0] . '/' . $arr[2];

			$time = strtotime($time_out);
			$month_1 = date("m");
			$month_2 = date("m", $time);
			$year_1 = date("y");
			$year_2 = date("y", $time);

			if ($year_1 - $year_2 > 0 || $month_1 > $month_2) {
				array_push($results, $item->id);
			}
		}
	}

	if (!empty($results)) {
		foreach ($results as $item) {
			$wpdb->get_results("UPDATE voucher SET status = 0 WHERE id = " . $item);
		}
	}
}

add_action('wpb_custom_cron_clear_voucher_expired', 'clear_voucher_expired');

// def getProxy():
//     url = "https://free-proxy-list.net"
//     req = requests.get(url)

//     root = html.fromstring(req.content)
//     list_item = root.xpath('//*[@id="proxylisttable"]/tbody/tr')

//     for item in list_item:
//         ip = item.xpath("td[1]/text()")[0]
//         port = item.xpath("td[2]/text()")[0]
//         type_proxy = item.xpath("td[5]/text()")[0]

//         if type_proxy == 'transparent' and check_exist_chapt('proxy', ip):
//             save_to_file('proxy', ip)

//             return str(ip) + ':' + str(port)

function get_proxy() {
	$url = "https://free-proxy-list.net";
	$data = file_get_contents($url, false);

	$doc = new DOMDocument();
	@$doc->loadHTML('<?xml encoding="UTF-8">' . $data);

	$table = $doc->getElementById('proxylisttable');
	$tr = $table->getElementsByTagName('tr');
	$result = [];
	
	foreach ($tr as $item) {
		$td = $item->getElementsByTagName('td');
		$ip = $td->item(0)->nodeValue;
		$port = $td->item(1)->nodeValue;
		$type_proxy = $td->item(4)->nodeValue;

		if ($type_proxy == 'transparent') {
			array_push($result, $ip . ':' . $port);
		}
	}

	return $result;
}