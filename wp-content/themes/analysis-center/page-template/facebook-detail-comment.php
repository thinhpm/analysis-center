<?php 
/**
 * Template Name: facebook detail comment
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
	
	if (!$_SESSION["user_name"]) {
		wp_redirect(home_url() . '/facebook-login');
		exit;
	}

	// $x = 1.0000436576133E+14;
	// print_r(is_float($x));
	// die;

	global $wpdb;
	get_header();
	$page_id = $_GET["pageId"];
	$datas = get_list_comment('484451281604769');
?>

	<div class="main">
		<div class="container">
			<div style="text-align: center; padding: 30px 0;">
				<h2><?php echo $name ?></h2>
			</div>

			<table class="table-show-detail">
				<tr>
					<th>Stt</th>
					<th>Tên Người Dùng</th>
					<th>Nội Dung</th>
					<th>Nội Dung Bài Viết</th>
				</tr>
			<?php

				if (!empty($datas)) {
					$stt = 1;

					foreach ($datas as $item) {
							?>
							<tr>
								<td><?php echo $stt ?></td>
								<td><?php echo $item->fromid ?></td>
								<td><?php echo $item->text ?></td>
								<td><?php echo $item->post_id ?></td>
							</tr>

							<?php
							$stt++;
						}
					}

			?>
			</table>
		</div>
	</div>
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">

<?php
	get_footer();
