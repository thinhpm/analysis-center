$(document).ready(function() {       
   $('#myModal').modal('show');
    }); 


$(document).ready(function() {
	var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });

	const url_ajax = $('#url-ajax').val();

	$('.lazy-images').lazy();

    if ($('#back-to-top').length) {
	    var scrollTrigger = 100;
	    var backToTop = function () {
	        var scrollTop = $(window).scrollTop();
	        if (scrollTop > scrollTrigger) {
	            $('#back-to-top').addClass('show');
	        } else {
	            $('#back-to-top').removeClass('show');
	        }
	    };
	    backToTop();

	    $(window).on('scroll', function () {
	        backToTop();
	    });

	    $('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}

	$(document).on("click", '.coupon-des-ellip .more', function() {
		$(this).parent().parent().hide();
		$(this).parent().parent().next().show();
	});

	$(document).on("click", '.coupon-des-full .less', function() {
		$(this).parent().parent().hide();
		$(this).parent().parent().prev().show();
	});

	$('.modal-voucher').on('hidden.bs.modal', function () {
		var url = $(this).attr('data-aff-url');
	    window.open(url, "_blank");
	});

	// setIntervalAds();

	function initGoogleAds(open_page = false, link_item = '') {
		var gg = $('.google-auto-placed iframe');

		if (gg.length > 0) {
	        var url = gg[0].contentDocument.body.childNodes[2].src;
			
			if(url == '') {
			    url = gg[0].contentDocument.body.childNodes[1].src;
			}

			$.ajax({
	           	type : "POST",
	           	dataType : "json", 
	           	url : url_ajax, 
	           	data : {
	                action: "get_google_ads", 
	                url: url
	           	},
	           	success: function(response) {
	           		$('#ads-google').val(response);

	           		if (open_page) {
	           			window.open(link_item, "_self");
	           			openAds(response);
	           		}
	           	},
	           	error: function( jqXHR, textStatus, errorThrown ){
	                console.log( 'The following error occured: ' + textStatus, errorThrown );
	           	}
		    });
		}
	}

	function setIntervalAds() {
		var x = setInterval(function() {
			var gg = $('.google-auto-placed iframe');

			if (gg.length > 0) {
				initGoogleAds();
				clearInterval(x);
			}
			console.log(1);
		}, 1000);
	};
	
	function openAds(url) {
		window.open(url, '_blank');
	}

    // $(document).on("click", '.item a', function(e) {
    // 	var link_ads = $('#ads-google').val();
    // 	var link_item = $(this).attr('href');
    // 	var gg = $('.google-auto-placed iframe');

    // 	if (link_ads == '' && gg.length == 0) {
    // 		e.preventDefault();
    		
    // 		openAds(link_item);
    // 	} else {
    // 		if (link_ads != '') {
    // 			openAds(link_ads);
    // 		} else {
    // 			// e.preventDefault();

    // 			// initGoogleAds(true, link_item);
    // 		}
    // 	}
    // });

    $('.call-filter-category').click(function(){
        var name_category = $('#list-category :selected').attr('data-name');
        var percent = $('#list-percent :selected').attr('data');

        $.ajax({
           	type : "get",
           	dataType : "json", 
           	url : url_ajax, 
           	data : {
                action: "filter_category", 
                name_category: name_category,
                percent: percent
           	},
           	beforeSend: function(){
               	$('.product-list .row').html('');
               	$(".loading").css("display", "block");
           	},
           	success: function(response) {
           		$(".loading").css("display", "none");
           		if(response['result'] == ''){
           			alert("Không tìm thấy sản phẩm nào");
           		}
               	$('.product-list .row').html(response['result']);

               	// save to database
               	$.ajax({
		           	type : "post",
		           	dataType : "json",
		           	url : url_ajax, 
		           	data : {
		                action: "filter_category_save_db",
		                arrayData: response['arrayData']
		           	},
		           	beforeSend: function(){
		           		
		           	},
		           	success: function(response) {
		           		console.log('done update data!');
		           	},
		           	error: function( jqXHR, textStatus, errorThrown ){
		                console.log( 'The following error occured: ' + textStatus, errorThrown );
		           	}
		       });

           	},
           	error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
           	}
       	});
    });

    $('.select-option').on('change', function() {
    	var ele = $(this);
    	var id = $(this).attr("data-id");
    	var value = $(this).val();

    	$.ajax({
           	type : "get",
           	dataType : "html", 
           	url : url_ajax, 
           	data : {
                action: "option_item", 
                id: id,
                value: value
           	},
           	beforeSend: function(){
               	$(".loading").css("display", "block");
           	},
           	success: function(response) {
           		$(".loading").css("display", "none");
           		ele.parent().toggleClass('admin-hidden-item');
           	},
           	error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
           	}
       	});
    });

    $(document).on("click", ".dropbtn", function() {
    	document.getElementById("myDropdown").classList.toggle("show");
    });

	$(document).on("click", ".warrap-add-channel button", function() {
		var url_channel = $('input[name="add-channel"]').val();

		$.ajax({
           	type : "post",
           	dataType : "json",
           	url : url_ajax, 
           	data : {
                action: "add_channel",
                url_channel: url_channel
           	},
           	beforeSend: function(){
           		
           	},
           	success: function(response) {
           		location.reload();
           	},
           	error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
           	}
       });
	});

	$(document).on("click", "#btn-login-youtube", function(e) {
		checkLogin(url_ajax);
	});

	$(document).on("keypress", "#password", function(e) {
		if (e.keyCode == 13) {
			checkLogin(url_ajax);
		}
	});

	$(document).on("click", ".btn-remove-channel", function() {
		var id_channel = $(this).attr('data-id');
		var element = $(this);
		$.ajax({
	       	type : "post",
	       	dataType : "json",
	       	url : url_ajax, 
	       	data : {
	            action: "remove_channel",
	            id_channel: id_channel
	       	},
	       	beforeSend: function(){
	       		
	       	},
	       	success: function(response) {
	       		if (response.success) {
	       			element.parents('tr').hide();
	       		}
	       	},
	       	error: function( jqXHR, textStatus, errorThrown ){
	            console.log( 'The following error occured: ' + textStatus, errorThrown );
	       	}
	   });
	});

	$(document).on("click", ".btn-show-detail-channel", function() {
		var modal_title = $('#myModal .modal-title');
		var id_channel = $(this).attr('data-id');
		var name_channel = $(this).attr('data-name');
		var key_apis = ($('#list-key-apis').val()).split(',');
		var modal_body = $('#myModal .modal-body tr.item');

		modal_body.remove();
		modal_title.text(name_channel);

		$('#myModal').modal('show');
		setTimeout(function() {
			showListVideoInChannelByOrder(id_channel, key_apis[0]);
		}, 0);
	});

	$(document).on("click", ".btn-order-list", function() {
		var modal_title = $('#myModal .modal-title');
		var id_channel = modal_title.attr('id-channel');
		var key_api = $('#list-key-apis').val();

		showListVideoInChannelByOrder(id_channel, key_api, 'viewCount');
	});

	getInfoChannels(url_ajax);

});

function showListVideoInChannelByOrder(id_channel, key_api, order = 'date') {
	var modal_title = $('#myModal .modal-title');
	var modal_body = $('#myModal .modal-body tr.item');

	modal_body.remove();
	modal_title.attr("id-channel", id_channel);
	var list_id_video = getListVideos(id_channel, order);
	
	var results = getDetailVideo(list_id_video, key_api);

	for (var i = 0; i < results.length; i++) {
		createHtmlShowDetailInfo(results[i], i + 1);
	}
}

function checkLogin(url_ajax) {
	var user_name = $('#user-name').val();
	var password = $('#password').val();

	$.ajax({
       	type : "get",
       	dataType : "json",
       	url : url_ajax, 
       	data : {
            action: "process_form_login",
            user_name: user_name,
            password, password
       	},
       	beforeSend: function(){
       		
       	},
       	success: function(response) {
       		if (response.status) {
       			location.href = "youtuber";
       		} else {
           		alert("Login fail");
       		}
       	},
       	error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
       	}
   });
}

function getDetailVideo(list_id_video, key_api) {
	var video_id = '';
	var result = [];
	var results = [];
	var j = 0;

	for (var i = 0; i < list_id_video.length; i++) {
		video_id += list_id_video[i] + ',';

		if (j > 40 || i == list_id_video.length - 1) {
			var url = "https://www.googleapis.com/youtube/v3/videos?key="+ key_api +"&part=snippet,statistics&id=" + video_id;

			$.ajax({
				async: false,
		       	type : "get",
		       	dataType : "json",
		       	url : url,
		       	beforeSend: function(){
		       		
		       	},
		       	success: function(response) {
		       		result = getDetailByRespone(response);
		       		results.push.apply(results, result);
		       	},
		       	error: function( jqXHR, textStatus, errorThrown ){
		            console.log( 'The following error occured: ' + textStatus, errorThrown );
		       	}
		   	});

		   	j = 0;
		   	video_id = '';
		}

		j++;
	}

	return results;
}

function createHtmlShowDetailInfo(item, stt) {
	var table_channels = $('.table-show-detail-video');
	var title = item.title
	var view_count = item.view_count;
	var published_at = item.published_at;
	var id = item.id;

	var result = "<tr class='item'>";
	result +="<td>" + stt +"</td>";
	result +="<td>" + title +"</td>";
	result +="<td>" + view_count + "</td>";
	result +="<td>" + published_at + "</td>";
	result +="<td><a target='_blank' href='https://www.youtube.com/watch?v=" + id + "'>" + "click" + "</td>"
	result +="</tr>";

	table_channels.append(result);
}

function getDetailByRespone(response) {
	var items = response.items;
	var results = [];

	for (var i = 0; i < items.length; i++) {
		var snippet = items[i].snippet;
		var statistics = items[i].statistics;
		var title = snippet.title;
		var view_count = statistics.viewCount;
		var published_at = snippet.publishedAt;

		var result =  {
			'id' : items[i].id,
			'title' : title,
			'view_count' : view_count,
			'published_at' : published_at
		};

		results.push(result);
	}

	return results;
}

function createHtmlShowInfo(response, channel) {
	var table_channels = $('.table-show-indo-channels');

	if (response.items.length > 0) {
		var id_channel = response.items[0].id;
		var snippet = response.items[0].snippet;
		var name_channel = snippet.title;
		var statistics = response.items[0].statistics;
		var view_count = statistics.viewCount;
		var subscriber_count = statistics.subscriberCount;
		var hidden_subscriber_count = statistics.hiddenSubscriberCount;
		var video_count = statistics.videoCount;
	} else {
		var id_channel = channel;
		var name_channel = '';
		var view_count = 0000;
		var subscriber_count = 0000;
		var hidden_subscriber_count = false;
		var video_count = 0000;
	}

	var result = "<tr>";
	result +="<td class='btn-show-detail-channel' data-id='" + id_channel + "' data-name='" + name_channel + "'>" + name_channel + "</td>";
	result +="<td>" + video_count + "</td>";
	result +="<td>" + view_count + "</td>";
	result +="<td>" + subscriber_count + "</td>";
	result +="<td>" + hidden_subscriber_count + "</td>";
	result +="<td><a target='_blank' href='https://www.youtube.com/channel/" + id_channel + "'>" + "click" + "</td>"
	result +="<td><span class='btn-remove-channel' data-id=" + id_channel + ">x</span></td>";
	result +="</tr>";

	table_channels.append(result);
}

function callAjaxGetInfo(url, key_api, channel, url_ajax) {
	var url = "https://www.googleapis.com/youtube/v3/channels?key="+ key_api +"&part=snippet,statistics&id=" + channel;

	$.ajax({
		async: false,
       	type : "get",
       	dataType : "json",
       	url : url,
       	beforeSend: function(){
       		
       	},
       	success: function(response) {
       		createHtmlShowInfo(response, channel);
       	},
       	error: function( jqXHR, textStatus, errorThrown ){
       		error_key_api(key_api, jqXHR, url_ajax);
       	}
   });
}

function getInfoChannels(url_ajax) {
	if ($('#list-channels').length == 0) {
		return;
	}

	var channels = ($('#list-channels').val()).split(',');
	var key_apis = ($('#list-key-apis').val()).split(',');
	
	if (channels.length > 0) {
		for (var i = 0; i < channels.length; i++) {
			if (channels[i] != '') {
				var url = "https://www.googleapis.com/youtube/v3/channels?key="+ key_apis[0] +"&part=snippet,statistics&id=" + channels[i];

				callAjaxGetInfo(url, key_apis[0], channels[i], url_ajax);
			}
		}
	}
}

function getListVideos(id_channel, order, pageToken = '') {
	var key_apis = ($('#list-key-apis').val()).split(',');
	var result;
	var results = [];
	var i = 0;

	while (true) {
		var url = "https://www.googleapis.com/youtube/v3/search?key="+ key_apis[0] +"&part=id&maxResults=50&channelId=" + id_channel + "&order=" + order + "&pageToken=" + pageToken;

		$.ajax({
			async: false,
	       	type : "get",
	       	dataType : "json",
	       	url : url,
	       	beforeSend: function(){
	       		
	       	},
	       	success: function(response) {
	       		var next_page_token = response.nextPageToken;

	       		pageToken = '';

	       		if (next_page_token != undefined && next_page_token != '') {
	       			pageToken = next_page_token;
	       		}

	       		result = getListVideoId(response);
	       		results.push.apply(results, result);
	       	},
	       	error: function( jqXHR, textStatus, errorThrown ){
	            console.log( 'The following error occured: ' + textStatus, errorThrown );
	       	}
	   	});

	   	i++;

		if (i >= 3 || pageToken == '')
	   		break;
	}

	return results;
}

function getListVideoId(response) {
	var items = response.items;
	var id;
	var result = [];

	if (items.length > 0) {
		for (var i = 0; i < items.length - 1; i++) {
			if (items[i].id.videoId != undefined) {
				id = items[i].id.videoId;

				result.push(id);
			}
		}
	}

	return result;
}

function error_key_api(key_api, jqXHR, url_ajax) {
	if (jqXHR.status == 403) {
		setKeyLimit(key_api, url_ajax);
	}
}

function setKeyLimit(key_api, url_ajax) {
	$.ajax({
		async: false,
       	type : "get",
       	dataType : "json",
       	url : url_ajax,
       	data: {
       		'action': 'set_key_api_limit',
       		'key_api': key_api
       	},
       	beforeSend: function(){
       		
       	},
       	success: function(response) {
       		location.reload();
       	},
       	error: function( jqXHR, textStatus, errorThrown ){
       		
       	}
   });
}






