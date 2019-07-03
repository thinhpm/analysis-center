<?php
/**
 * Template Name: facebook login
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
<div class="container">
	<div class="limiter" style="text-align: center">
		<div class="container-login100">
			<div class="wrap-login100">

					<span class="login100-form-title p-b-34">
						Account Login
					</span>

						<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
							<input id="user-name" class="input100" type="text" name="username" placeholder="User name">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
							<input class="input100 password-social" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn btn-login-social">
								Sign in
							</button>
						</div>


					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							Sign Up
						</a>
					</div>


				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
				<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">
				<input type="hidden" id="url-redirect" value="facebook" name="url-redirect">
			</div>
		</div>
	</div>
</div>
<?php
get_footer();