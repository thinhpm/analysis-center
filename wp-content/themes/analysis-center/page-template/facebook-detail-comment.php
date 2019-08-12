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
	
	global $wpdb;
	get_header();

	

	die;

	$page_id = $_GET["pageId"];
	$datas = get_list_comment($page_id);
	$home_page_facebook = "https://facebook.com/";
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
					<th>Nội Dung Bình luận</th>
					<th>Nội Dung Bài Viết</th>
					<th>Link chia sẻ</th>
				</tr>
			<?php

				if (!empty($datas)) {
					$stt = 1;

					foreach ($datas as $item) {
							?>
							<tr>
								<td><?php echo $stt ?></td>
								<td data-uid="<?php echo $item['fromid'] ?>"><a href="<?php echo $home_page_facebook . $item['fromid'] ?>" target="_blank"><?php echo $item['name'] ?></a></td>
								<td><?php echo $item['text'] ?></td>
								<td data-post-id="<?php echo $item['post_id'] ?>"><a href="<?php echo $home_page_facebook . $item['post_id'] ?>" target="_blank"><?php echo $item['message'] ?></a></td>
								<td><a href="<?php echo $item['link'] ?>" target="_blank"><?php echo $item['link'] ?></a></td>
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
