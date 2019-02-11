<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Analysis_Center
 */

?>

	</div><!-- #content -->
<canvas id="fireworks"></canvas>
	<footer id="colophon" class="site-footer">
		<a href="#" id="back-to-top" title="Back to top">&uarr;</a>
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-md-3 footer-logo">
						<?php get_logo(); ?>
					</div>
					<div class="col-md-3">
						<h3>Giới Thiệu</h3>
						<p>
							<a href="mgghot.com">Mgghot.com</a> là một website chuyên về cập nhật mã giảm giá và các chương trình khuyến mãi của các website thương mại và dich vụ một cách nhanh và chính xác nhất hiện nay, với rất nhiều tin khuyến mãi giảm giá phong phú chắc chắn đáp ứng nhu cầu người dùng thoải mái lựa chọn để mua sắm được tiết kiệm nhất.
						</p>
					</div>			
					<div class="col-md-3">
						<h3>Menu</h3>
						<div class="menu-footer">
							<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
						</div>
					</div>			
					<div class="col-md-3">
						<h3>Liên Kết</h3>
						<ul>
							<li>
								<a href="https://shorten.asia/sDkqc8Mb">Tiki</a>
							</li>
							<li>
								<a href="">Lazada</a>
							</li>
							<li>
								<a href="https://shorten.asia/kYKAJ6yh">Shopee</a>
							</li>
							<li>
								<a href="">Adayroi</a>
							</li>
							<li>
								<a href="https://shorten.asia/Xg8MNySh">Sendo</a>
							</li>
						</ul>
					</div>			
				</div>
			</div>
			<div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<p>© 2018 - present <a href="mgghot.com">Mgghot.com</a> All Rights Reserved</p>
							<ul class="inline-list">
								<li class="inline-list_item">
									<a href="" class="inline-list_link is-white">Điều khoản</a>
								</li>
								<li class="inline-list_item"><a href="" class="inline-list_link is-white">Chính sách bảo mật</a>
								</li>
								<li class="inline-list_item">
									<a href="" class="inline-list_link is-white">Liên hệ</a>
								</li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-4">
							<div class="row">
								<div class="col-md-6">
									<p><?php echo "Hôm nay:".do_shortcode('[wpstatistics stat=visitors time=today]');?></p>
									<p><?php echo "Tháng này:".do_shortcode('[wpstatistics stat=visitors time=month]');?></p>
								</div>
								<div class="col-md-6">
									<ul class="social-list align-right">
										<li class="social-list_item">
											<a target="_blank" rel="noopener" href="https://www.facebook.com/groups/1895929324003794" class="social-list_link is-facebook" aria-label="facebook">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
