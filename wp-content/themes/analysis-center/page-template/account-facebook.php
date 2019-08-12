<?php 
/**
 * Template Name: account facebook
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
	
	global $wpdb;
	get_header();
?>

	<div class="main">
		<div class="container">
			<div class="add-account">
				<div class="warrap">
				  	<span class="dropbtn" data-toggle="modal" data-target="#modal-account-facebook">Thêm Tài Khoản</span>
				</div>
			</div>

			<table>
				<tr>
					<th>Tên Người Dùng</th>
					<th>Access Token</th>
					<th>Trạng Thái</th>
					<th>Action</th>
				</tr>

			
			<?php
				$users = get_list_account_facebook();

				if (!empty($users)) {

					foreach ($users as $item) {
							?>
							<tr>
								<td><?php echo $item['name'] ?></td>
								<td><?php echo substr($item['access_token'], 0, 35) . "..." ?></td>
								<td><?php echo $item['active'] ? "Đang sử dụng" : "Sẵn sàng" ?></td>
								<td><span class="btn-remove-account" data-id="<?php echo $item['id'] ?>">x</span></td>
							</tr>
							<?php
						}
					}

			?>
			</table>
		</div>

		<div class="modal" id="modal-account-facebook">
		    <div class="modal-dialog">
		      	<div class="modal-content">
		      
		        <!-- Modal Header -->
		        	<div class="modal-header">
		          		<h4 class="modal-title" style="text-align: center;">THÊM TÀI KHOẢN FACEBOOK</h4>
		          		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	</div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		          	<form id="form-add-account-facebook" class="form-add">
		          		<dir class="item-account">
			          		<label class="label-name-account">Tên Người Dùng:</label>
			          		<input class="input-item input-name" type="text" name="name[]"/>
			          		<label class="lable-access-token">Access Token:</label>
			          		<input class="input-item input-token" type="text" name="token[]"/>
			          		<span class="btn-item-option btn-add-item btn-add">+</span>
			          		<span class="btn-item-option btn-remove-item btn-remove">-</span>
		          		</dir>
		          	</form>
		        </div>
		        
		        <!-- Modal footer -->
		        <div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-save-add-account">Lưu</button>
		          	<button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
		        </div>
	        
	      	</div>
    	</div>
	</div>
	<input type="hidden" id="url-ajax" value="<?php echo admin_url('admin-ajax.php');?>" name="url-ajax">

<?php
	get_footer();
