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
					<th>Name Page</th>
					<th>Like Count</th>
					<th>Link</th>
					<th>Action</th>
				</tr>

			
			<?php
				$pages = get_list_page();
				$pages = explode(',', $pages);

				if (!empty($pages)) {
					$results = get_info_page($pages);

					foreach ($results as $item) {
							?>
							<tr>
								<td class="show-detail-page"><a href=" <?php echo home_url() ?>/facebook-detail?pageId=<?php echo $item['page_id'] ?>" target="_blank"><?php echo $item['page_name'] ?></a></td>
								<td><?php echo $item['likes'] ?></td>
								<td><a target="_blank" href="<?php echo $item['link'] ?>">Click</a></td>
								<td><span class="btn-remove-channel" data-id="<?php echo $item['id_channel'] ?>">x</span></td>
							</tr>

							<?php
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
