<?php
/**
 * Template Name: lazada
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
$website = get_query_var('pagename'); 

global $wpdb;
get_header();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="container">
	<h1 class="title-voucher">Mã giảm giá <?php echo $website ?>, Voucher <?php echo $website ?> khuyến mãi HOT tháng <?php echo date("m/Y") ?></h1>
	<div class="store-listings st-list-coupons" style="padding: 0 50px">
		<?php 
			$lists = $wpdb->get_results("SELECT * FROM voucher WHERE `website`='" . $website . "' AND `status` = 1");
			$list_category = $wpdb->get_results("SELECT DISTINCT name_cate FROM voucher WHERE `website`='" . $website . "'");
			$stt = 0;

			foreach ($list_category as $cate) {
				?>
				<h2 class="title-cate"><?php echo $cate->name_cate ?></h2>
				<?php
				foreach ($lists as $item) {
					if ($item->name_cate == $cate->name_cate) {
						$stt += 1;
						?>
							<div data-id="<?php echo $stt ?>" class="coupon-item store-listing-item has-thumb c-cat c-type-code shadow-box coupon-live">
								<div class="coupon-mgg-wrap">
									<div class="store-thumb-link">
										<div class="store-thumb thumb-img">
						 					<span><?php echo $item->percent; ?></span>
						 				</div>
						 			</div>
						 			<div class="latest-coupon">
						 				<h3 class="coupon-title">
						 					<a class="coupon-link" title="<?php echo $item->name ?>" href="#"><?php echo $item->name ?></a>
						 				</h3>
						 				<div class="coupon-des">
						 					<div class="coupon-des-ellip"> <?php echo substr($item->description, 0, 80) ?> <span class="c-actions-span">...<a class="more" href="javascript:void(0)">Xem thêm</a></span>
						 					</div>
						 					<div class="coupon-des-full">
						 						<p> <?php echo $item->description ?> <a class="more less" href="javascript:void(0)">….Thu gọn</a></p>
						 					</div>
						 				</div>
						 			</div>
						 			<div class="coupon-detail coupon-button-type">
						 				<?php 
						 					if ($item->is_voucher) {
						 						?>
							 						<a rel="nofollow" data-type="code" data-coupon-id="<?php echo $item->id ?>" href="javascript:void(0)" class="coupon-button coupon-code btn-get-code" data-tooltip="Nhấn để lấy mã" data-code="<?php echo $item->code ?>" data-aff-url="http://lazada.vn">
									 					<span class="code-text" rel="nofollow"> <?php echo $item->code ?> </span>
									 					<span class="get-code" data-toggle="modal" data-target="#myModal-<?php echo $stt ?>">Lấy Mã</span>
									 				</a>
						 						<?php
						 					} else {
						 						?>
						 							<a class="coupon-button coupon-code btn-bonus" href="<?php echo $item->link_aff ?>">Nhận ưu đãi</a>
						 						<?php
						 					}
						 				?>
						 				
						 				<div class="clear"></div>
						 				<div class="exp-text"> <?php echo $item->time_out ?>
						 				</div>
						 			</div>
						 		</div>
						 		<div class="clear"></div>
						 		<div id="myModal-<?php echo $stt ?>" class="modal fade modal-voucher" role="dialog" data-aff-url="<?php echo $item->link_aff ?>">
								  	<div class="modal-dialog">
								    	<div class="modal-content">
								      		<div class="modal-header">
								        		<button type="button" class="close" data-dismiss="modal">&times;</button>
								        		<h4 class="modal-title">Mã giảm giá</h4>
								      		</div>
								      		<div class="modal-body">
								        		<p style="text-align: center;"><?php echo $item->code ?></p>
								      		</div>
								      		<div class="modal-footer">
								        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								      		</div>
								    	</div>
								  	</div>
								</div>
							</div>
						<?php
					}
				}
			}
		?>
	</div>
</div>

<?php
// get_sidebar();
get_footer();
