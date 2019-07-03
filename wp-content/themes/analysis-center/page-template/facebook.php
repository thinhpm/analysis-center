<?php 
/**
 * Template Name: facebook
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
?>

	<div class="main">
		<div class="container">
			<div class="add-channel">
				<div class="dropdown">
				  	<span class="dropbtn">Add page</span>
				  	<div id="myDropdown" class="dropdown-content">
				  		<div class="warrap-add-channel">
					    	<input type="tet" name="add-page">
					    	<button>Add</button>
				  		</div>
				 	 </div>
				</div>
			</div>

			<table>
				<tr>
					<th>Name Channel</th>
					<th>Video Count</th>
					<th>View Count</th>
					<th>Subscriber Count</th>
					<th>Hidden Subscriber Count</th>
					<th>Action</th>
				</tr>

			
			<?php
				$pages = get_list_page();
				$pages = explode(',', $pages);

				if (!empty($pages)) {
					foreach ($pages as $page_id) {

						$results = get_info_page($page_id);

						if (!empty($results)) {
							?>
							<tr>
								<td><?php echo $results['name_channel'] ?></td>
								<td><?php echo $results['video_count'] ?></td>
								<td><?php echo $results['view_count'] ?></td>
								<td><?php echo $results['subscriber_count'] ?></td>
								<td><?php echo $results['hidden_subscriber_count'] == false ? "False" : "True"  ?></td>
								<td><span class="btn-remove-channel" data-id="<?php echo $results['id_channel'] ?>">x</span></td>
							</tr>

							<?php
						}
					}
				}
			?>
			</table>
		</div>
	</div>
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">

<?php
	get_footer();
