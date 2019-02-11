<?php
/**
 * Template Name: sendo
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
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<h2>Mã Giảm giá Sendo</h2>
				<?php echo do_shortcode( '[atcoupon type="sendovn"]' ); ?>
				<div class="coupondiv">
				   <div class="promotiontype">
				      <div class="promotag">
				         <div class="promotagcont tagsale">
				            <div class="saveamount">15</div>
				            <div class="saleorcoupon">%</div>
				         </div>
				      </div>
				      <div class="promotiondetails">
				         <div class="coupontitle">Thứ 2 hàng tuần: Tuyệt đỉnh gia dụng - Siêu giảm giá đến 50%</div>
				         <div class="cpinfo">
				            <strong>Hạn dùng: </strong>2018-11-30
				         </div>
				      </div>
				      <div class="cpbutton">
				         <div class="xemngayz" onclick="window.open('https://pub.accesstrade.vn/deep_link/4945784097639239041?url=https%3A%2F%2Fwww.sendo.vn%2Fsu-kien%2Ftuyet-dinh-gia-dung%2F','_blank')">XEM NGAY</div>
				      </div>
				   </div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
