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

	$(document).on("click", '.btn-get-code', function() {
		var url = $(this).attr('data-aff-url');
		
		// window.open(url, "_blank");
	});

	setIntervalAds();

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

    $(document).on("click", '.item a', function(e) {
    	var link_ads = $('#ads-google').val();
    	var link_item = $(this).attr('href');
    	var gg = $('.google-auto-placed iframe');

    	if (link_ads == '' && gg.length == 0) {
    		e.preventDefault();
    		
    		openAds(link_item);
    	} else {
    		if (link_ads != '') {
    			openAds(link_ads);
    		} else {
    			// e.preventDefault();

    			// initGoogleAds(true, link_item);
    		}
    	}
    });

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
});
