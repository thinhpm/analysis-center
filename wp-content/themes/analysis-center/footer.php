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

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>Giới Thiệu</h3>
						<p>
							Đây là. trang web so sánh đưa ra kết quả những sản phẩm lỗi giá. sản phẩm giảm giá mạnh trên lazada
						</p>
					</div>			
					<div class="col-md-4">
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
					<div class="col-md-4">
						<h3>Liên Kết</h3>
						<ul>
							<li>
								<a href="">Tiki</a>
							</li>
							<li>
								<a href="">Lazada</a>
							</li>
							<li>
								<a href="">Shopee</a>
							</li>
							<li>
								<a href="">Adayroi</a>
							</li>
						</ul>
					</div>			
				</div>
			</div>
			<div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-9">
							<p>© 2018 - present Mgghot.com All Rights Reserved</p>
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
						<div class="col-xs-12 col-sm-3">
							<ul class="social-list align-right">
								<li class="social-list_item">
									<a target="_blank" rel="noopener" href="" class="social-list_link is-facebook" aria-label="facebook">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li class="social-list_item">
									<a target="_blank" rel="noopener" href="" class="social-list_link is-twitter" aria-label="twitter">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li class="social-list_item">
									<a target="_blank" rel="noopener" href="" class="social-list_link is-google" aria-label="google"><i class="fa fa-google"></i>
									</a>
								</li>
							</ul>
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
