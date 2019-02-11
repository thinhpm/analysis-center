<?php
/**
 * Template Name: shopee
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
global $wpdb;
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
<div class="store-listings st-list-coupons" style="padding: 0 50px">
	<?php 
		$lists = $wpdb->get_results ("SELECT * FROM voucher WHERE `website`='shopee'");
		$stt = 0;
		
		foreach ($lists as $item) {
			if (checkDateVoucher($item->time_out)) {
				$stt += 1;
				?>
					<div data-id="<?php echo $stt ?>" class="coupon-item store-listing-item has-thumb c-cat c-type-code shadow-box coupon-live">
						<div class="coupon-mgg-wrap">
							<div class="store-thumb-link">
								<div class="store-thumb thumb-img">
				 					<a class="thumb-padding" href="#">
				 						<img width="300" height="150" src="https://mgg.vn/wp-content/uploads/2018/01/shopee.png" class="attachment-wpcoupon_medium-thumb size-wpcoupon_medium-thumb" alt="Mã giảm giá shopee" title="Mã giảm giá shopee" sizes="(max-width: 300px) 100vw, 300px">
				 					</a>
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
				 				<a rel="nofollow" data-type="code" data-coupon-id="<?php echo $item->id ?>" href="javascript:void(0)" class="coupon-button coupon-code btn-get-code" data-tooltip="Nhấn để lấy mã" data-code="<?php echo $item->code ?>">
				 					<span class="code-text" rel="nofollow"> <?php echo $item->code ?> </span>
				 					<span class="get-code" data-toggle="modal" data-target="#myModal-<?php echo $stt ?>">Lấy Mã</span>
				 				</a>
				 				<div class="clear"></div>
				 				<div class="exp-text"> <?php echo $item->time_out ?>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="clear"></div>
				 		<div id="myModal-<?php echo $stt ?>" class="modal fade modal-voucher" role="dialog" data-aff-url="http://lazada.vn">
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
	?>
</div>
<script type="text/javascript" src="/wp-content/themes/analysis-center/js/main.js"></script>
<?php
// get_sidebar();
get_footer();
