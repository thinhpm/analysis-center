$(document).ready(function() {
	const url_ajax = $('#url-ajax').val();

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

});

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

