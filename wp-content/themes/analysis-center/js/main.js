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
});

// Options
var options = {
    /* Which hue should be used for the first batch of rockets? */
    startingHue: 255,
    /* How many ticks the script should wait before a new firework gets spawned, if the user is holding down his mouse button. */
    clickLimiter: 5,
    /* How fast the rockets should automatically spawn, based on ticks */
    timerInterval: 20,
    /* Show pulsing circles marking the targets? */
    showTargets: false,
    /* Rocket movement options, should be self-explanatory */
    rocketSpeed: 1,
    rocketAcceleration: 1.03,
    /* Particle movement options, should be self-explanatory */
    particleFriction: 0.95,
    particleGravity: 1,
    /* Minimum and maximum amount of particle spawns per rocket */
    particleMinCount: 35,
    particleMaxCount: 50,
    /* Minimum and maximum radius of a particle */
    particleMinRadius: 2,
    particleMaxRadius: 4
};

// Local variables
var fireworks = [];
var particles = [];
var mouse = {down: false, x: 0, y: 0};
var currentHue = options.startingHue;
var clickLimiterTick = 0;
var timerTick = 0;
var cntRocketsLaunched = 0;

// Helper function for canvas animations
window.requestAnimFrame = (function() {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function(cb) {
            window.setTimeout(callback, 1000 / 60);
        }
})();

// Helper function to return random numbers within a specified range
function random(min, max) {
    return Math.random() * (max - min) + min;
}

// Helper function to calculate the distance between 2 points
function calculateDistance(p1x, p1y, p2x, p2y) {
    var xDistance = p1x - p2x;
    var yDistance = p1y - p2y;
    return Math.sqrt(Math.pow(xDistance, 2) + Math.pow(yDistance, 2));
}

// Setup some basic variables
var canvas = document.getElementById('fireworks');
var canvasCtx = canvas.getContext('2d');
var canvasWidth = window.innerWidth;
var canvasHeight = window.innerHeight;

// Resize canvas
canvas.width = canvasWidth;
canvas.height = canvasHeight;

// Firework class
function Firework(sx, sy, tx, ty) {
    // Set coordinates (x/y = actual, sx/sy = starting, tx/ty = target)
    this.x = this.sx = sx;
    this.y = this.sy = sy;
    this.tx = tx; this.ty = ty;

    // Calculate distance between starting and target point
    this.distanceToTarget = calculateDistance(sx, sy, tx, ty);
    this.distanceTraveled = 0;

    // To simulate a trail effect, the last few coordinates will be stored
    this.coordinates = [];
    this.coordinateCount = 3;

    // Populate coordinate array with initial data
    while(this.coordinateCount--) {
        this.coordinates.push([this.x, this.y]);
    }

    // Some settings, you can adjust them if you'd like to do so.
    this.angle = Math.atan2(ty - sy, tx - sx);
    this.speed = options.rocketSpeed;
    this.acceleration = options.rocketAcceleration;
    this.brightness = random(50, 80);
    this.hue = currentHue;
    this.targetRadius = 1;
    this.targetDirection = false;  // false = Radius is getting bigger, true = Radius is getting smaller

    // Increase the rockets launched counter
    cntRocketsLaunched++;
};

// This method should be called each frame to update the firework
Firework.prototype.update = function(index) {
    // Update the coordinates array
    this.coordinates.pop();
    this.coordinates.unshift([this.x, this.y]);

    // Cycle the target radius (used for the pulsing target circle)
    if(!this.targetDirection) {
        if(this.targetRadius < 8)
            this.targetRadius += 0.15;
        else
            this.targetDirection = true;
    } else {
        if(this.targetRadius > 1)
            this.targetRadius -= 0.15;
        else
            this.targetDirection = false;
    }

    // Speed up the firework (could possibly travel faster than the speed of light)
    this.speed *= this.acceleration;

    // Calculate the distance the firework has travelled so far (based on velocities)
    var vx = Math.cos(this.angle) * this.speed;
    var vy = Math.sin(this.angle) * this.speed;
    this.distanceTraveled = calculateDistance(this.sx, this.sy, this.x + vx, this.y + vy);

    // If the distance traveled (including velocities) is greater than the initial distance
    // to the target, then the target has been reached. If that's not the case, keep traveling.
    if(this.distanceTraveled >= this.distanceToTarget) {
        createParticles(this.tx, this.ty);
        fireworks.splice(index, 1);
    } else {
        this.x += vx;
        this.y += vy;
    }
};

// Draws the firework
Firework.prototype.draw = function() {
    var lastCoordinate = this.coordinates[this.coordinates.length - 1];

    // Draw the rocket
    canvasCtx.beginPath();
    canvasCtx.moveTo(lastCoordinate[0], lastCoordinate[1]);
    canvasCtx.lineTo(this.x, this.y);
    canvasCtx.strokeStyle = 'hsl(' + this.hue + ',100%,' + this.brightness + '%)';
    canvasCtx.stroke();

    // Draw the target (pulsing circle)
    if(options.showTargets) {
        canvasCtx.beginPath();
        canvasCtx.arc(this.tx, this.ty, this.targetRadius, 0, Math.PI * 2);
        canvasCtx.stroke();
    }
};

// Particle class
function Particle(x, y) {
    // Set the starting point
    this.x = x;
    this.y = y;

    // To simulate a trail effect, the last few coordinates will be stored
    this.coordinates = [];
    this.coordinateCount = 5;

    // Populate coordinate array with initial data
    while(this.coordinateCount--) {
        this.coordinates.push([this.x, this.y]);
    }

    // Set a random angle in all possible directions (radians)
    this.angle = random(0, Math.PI * 2);
    this.speed = random(1, 10);

    // Add some friction and gravity to the particle
    this.friction = options.particleFriction;
    this.gravity = options.particleGravity;

    // Change the hue to a random number
    this.hue = random(currentHue - 20, currentHue + 20);
    this.brightness = random(50, 80);
    this.alpha = 1;

    // Set how fast the particles decay
    this.decay = random(0.01, 0.03);
}

// Updates the particle, should be called each frame
Particle.prototype.update = function(index) {
    // Update the coordinates array
    this.coordinates.pop();
    this.coordinates.unshift([this.x, this.y]);

    // Slow it down (based on friction)
    this.speed *= this.friction;

    // Apply velocity to the particle
    this.x += Math.cos(this.angle) * this.speed;
    this.y += Math.sin(this.angle) * this.speed + this.gravity;

    // Fade out the particle, and remove it if alpha is low enough
    this.alpha -= this.decay;
    if(this.alpha <= this.decay) {
        particles.splice(index, 1);
    }
}

// Draws the particle
Particle.prototype.draw = function() {
    var lastCoordinate = this.coordinates[this.coordinates.length - 1];
    var radius = Math.round(random(options.particleMinRadius, options.particleMaxRadius));

    // Create a new shiny gradient
    var gradient = canvasCtx.createRadialGradient(this.x, this.y, 0, this.x, this.y, radius);
    gradient.addColorStop(0.0, 'white');
    gradient.addColorStop(0.0, 'white');
    gradient.addColorStop(0.1, 'hsla(' + this.hue + ',100%,' + this.brightness + '%,' + this.alpha + ')');
    gradient.addColorStop(0.0, 'black');

    // Draw the gradient
    canvasCtx.beginPath();
    canvasCtx.fillStyle = gradient;
    canvasCtx.arc(this.x, this.y, radius, Math.PI * 2, false);
    canvasCtx.fill();
}
function createParticles(x, y) {
    var particleCount = Math.round(random(options.particleMinCount, options.particleMaxCount));
    while(particleCount--) {
        particles.push(new Particle(x, y));
    }
}
window.addEventListener('resize', function(e) {
    canvas.width = canvasWidth = window.innerWidth;
    canvas.height = canvasHeight = window.innerHeight;
});
canvas.addEventListener('mousemove', function(e) {
    e.preventDefault();
    mouse.x = e.pageX - canvas.offsetLeft;
    mouse.y = e.pageY - canvas.offsetTop;
});

canvas.addEventListener('mousedown', function(e) {
    e.preventDefault();
    mouse.down = true;
});

canvas.addEventListener('mouseup', function(e) {
    e.preventDefault();
    mouse.down = false;
});
function gameLoop() {
    requestAnimFrame(gameLoop);
    currentHue += 0.5;
    canvasCtx.globalCompositeOperation = 'destination-out';
    canvasCtx.fillStyle = 'rgba(0, 0, 0, 0.5)';
    canvasCtx.fillRect(0, 0, canvasWidth, canvasHeight);
    canvasCtx.globalCompositeOperation = 'lighter';
    var i = fireworks.length;
    while(i--) {
        fireworks[i].draw();
        fireworks[i].update(i);
    }
    var i = particles.length;
    while(i--) {
        particles[i].draw();
        particles[i].update(i);
    }
    if(timerTick >= options.timerInterval) {
        if(!mouse.down) {
            fireworks.push(new Firework(canvasWidth / 2, canvasHeight, random(0, canvasWidth), random(0, canvasHeight / 2)));
            timerTick = 0;
        }
    } else {
        timerTick++;
    }

    // Limit the rate at which fireworks can be spawned by mouse
    if(clickLimiterTick >= options.clickLimiter) {
        if(mouse.down) {
            fireworks.push(new Firework(canvasWidth / 2, canvasHeight, mouse.x, mouse.y));
            clickLimiterTick = 0;
        }
    } else {
        clickLimiterTick++;
    }
}

window.onload = gameLoop();


