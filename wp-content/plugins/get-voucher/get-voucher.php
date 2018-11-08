/*
Plugin Name: Get Voucher
Plugin URI: mgghot.com
Description: Get Voucher
Version: 1.1
Author: Thinhpm
Author URI: Thinhpm
Author Email: phamminhthinh9x@gmail.com
License: Copyright @2018
*/

<?php 

function get_data_voucher($data, $name) {
	preg_match("/". $name ."=\"(.+?)\"/", $data, $output_array);
	return $output_array[1];
}

function get_voucher() {
	global $wpdb;
	ini_set('max_execution_time', 300);

	$arr_website = [
		'lazada' => 'https://mgg.vn/ma-giam-gia/lazada/',
		'shopee' => 'https://mgg.vn/ma-giam-gia/shopee/',
		'tiki' => 'https://mgg.vn/ma-giam-gia/tiki-vn/'
	];

	foreach ($arr_website as $name_web => $link_web) {
		$data = file_get_contents($link_web);
	
		preg_match_all("/<h3 class=\"coupon-title\">(.+?)<div class=\"coupon-des\">/", $data, $output_array);

		if(count($output_array[1]) > 0) {
			foreach ($output_array[1] as $key => $value) {
				$title_type = get_data_voucher($value, 'data-type');

				if($title_type == 'code') {
					preg_match("/<span class=\"exp\">(.+?)<\/span>/", $value, $time_out);

					if($time_out[1] != 'Đã hết hạn' && $time_out[1] != '') {
						$title = get_data_voucher($value, 'title');
						$data_code = get_data_voucher($value, 'data-code');

						$results = $wpdb->get_results("INSERT INTO voucher (code, type, name, description, time_out, website) VALUES ('". $data_code ."', 'code', '". $title ."', '". $title ."','". $time_out[1] ."', '". $name_web ."')");	


					}
				}
			}
		}
	}


	
}