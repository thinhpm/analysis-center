<?php 
/**
 * Template Name: facebook detail
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
	$page_id = $_GET["pageId"];
	$sort_by = $_GET["sortBy"];

	$info = get_info_detail_page($page_id);

	$datas = $info['datas'];
	$name = $info['name'];
	$results = sort_list_post($datas, $sort_by);
	
?>

	<div class="main">
		<div class="container">
			<div style="text-align: center; padding: 30px 0;">
				<h2><?php echo $name ?></h2>
			</div>

			<div class="warrap-sort">
				<span>Sort By:</span>
				<select data-page-id="<?php echo $page_id ?>" data-home-url="<?php echo home_url() ?>">
				  	<option value="newer" selected>Newer</option>
				  	<option value="popular" <?php echo $sort_by == 'popular' ? 'selected' : '' ?>>Popular</option>
				</select>
			</div>

			<table>
				<tr>
					<th>Stt</th>
					<th>Title Post</th>
					<th>Like Count</th>
					<th>Share Count</th>
					<th>Comments Count</th>
					<th>Public At</th>
					<th>Total Reactions</th>
					<th>Link</th>
				</tr>
			<?php

				if (!empty($results)) {
					$stt = 1;

					foreach ($results as $item) {
							?>
							<tr>
								<td><?php echo $stt ?></td>
								<td><?php echo substr($item['message'], 0, 130) ?>...</td>
								<td><?php echo $item['likes'] ?></td>
								<td><?php echo $item['shares'] ?></td>
								<td><?php echo $item['comments'] ?></td>
								<td><?php echo $item['created_time'] ?></td>
								<td><?php echo $item['reactions_total'] ?></td>
								<td><a target="_blank" href="https://facebook.com/<?php echo $item['post_id'] ?>">Click</a></td>
							</tr>

							<?php
							$stt++;
						}
					}

			?>
			</table>
		</div>

		<div class="modal" id="modal-page">
		    <div class="modal-dialog">
		      	<div class="modal-content">
		      
		        <!-- Modal Header -->
		        	<div class="modal-header">
		          		<h4 class="modal-title" style="text-align: center;">Detail</h4>
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	</div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		          	<table class="table-show-detail-video">
						<tr>
							<th>Stt</th>
							<th>Title</th>
							<th class="btn-order-list">View Count</th>
							<th>Published At</th>
							<th>Link</th>
						</tr>
					</table>
		        </div>
		        
		        <!-- Modal footer -->
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
	        
	      	</div>
    	</div>
	</div>
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">

<?php
	get_footer();
