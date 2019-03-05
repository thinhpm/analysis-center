<?php 
/**
 * Template Name: youtube
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
		wp_redirect(home_url() . '/youtube-login');
		exit;
	}

	global $wpdb;
	get_header();
?>

	<div class="main">
		<div class="container">
			<div class="add-channel">
				<div class="dropdown">
				  	<span class="dropbtn">Add channel</span>
				  	<div id="myDropdown" class="dropdown-content">
				  		<div class="warrap-add-channel">
					    	<input type="tet" name="add-channel">
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
				$channels = get_list_channel();

				if (!empty($channels)) {
					foreach ($channels as $channel) {
						$channel_id = $channel->id_channel;

						$results = get_info_channel($channel_id);

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
