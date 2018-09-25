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
}
add_action( 'widgets_init', 'analysis_center_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function analysis_center_scripts() {
	wp_enqueue_style( 'analysis-center-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-style', get_template_directory_uri().'/css/main.css');
	wp_enqueue_style( 'font-Awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrapstyle', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_script( 'analysis-center-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'analysis-center-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	// wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.3.1');
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/js/main.js', array('jquery'),'1.0', true );

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
/**
 * add shortcode
 */
require get_template_directory() . '/inc/shortcode.php';

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
	$numPage = 20;

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
