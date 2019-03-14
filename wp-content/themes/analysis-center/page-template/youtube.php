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

			<table class="table-show-indo-channels">
				<tr>
					<th>Name Channel</th>
					<th>Video Count</th>
					<th>View Count</th>
					<th>Subscriber Count</th>
					<th>Hidden Subscriber Count</th>
					<th>Link</th>
					<th>Action</th>
				</tr>
			</table>
		</div>
		<div class="modal" id="myModal">
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
	<input type="hidden" id="list-channels" name="list-channels" value="<?php echo get_list_channel(); ?>">
	<input type="hidden" id="list-key-apis" name="list-key-apis" value="<?php echo get_list_key_api(); ?>">
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">

<?php
	get_footer();
