/**
 * All the animations of the front-end are created here.
 *
 * @package perfectPortfolio
 * @since 1.0.0
 */
var $ = jQuery.noConflict();
$(document).ready(function($){
	'use strict';

  var load = $('#loading').val();

  if(load == "checked"){
    var appear = 1;
    $('.loading-dot').hide();
  }
  else{
    var appear = 3400;

    $('.simple-1').animate({
      marginTop:'45px',
      marginLeft:'89px'
    },500);
    $('.simple-2').animate({
      marginTop:'0px',
      marginLeft:'45px'
    },500);
    $('.simple-3').animate({
      marginTop:'90px',
      marginLeft:'45px'
    },500);
    $('.simple-4').animate({
      marginTop:'45px',
      marginLeft:'0px'
    },500);

    swap();

    setInterval(function(){
      $('.simple-1').animate({
        marginTop:'45px',
        marginLeft:'89px'
      },500);
      $('.simple-2').animate({
        marginTop:'0px',
        marginLeft:'45px'
      },500);
      $('.simple-3').animate({
        marginTop:'90px',
        marginLeft:'45px'
      },500);
      $('.simple-4').animate({
        marginTop:'45px',
        marginLeft:'0px'
      },500);

      swap();

    },1000);

    setTimeout(function(){
      $('.simple-1').fadeOut(300);
    },1600);
    setTimeout(function(){
      $('.simple-2').fadeOut(300);
    },1900);
    setTimeout(function(){
      $('.simple-4').fadeOut(300);
    },2200);
    setTimeout(function(){
      $('.simple-3').fadeOut(300);
    },2500);

    setTimeout(function(){
      $('.loading-dot').fadeOut(900);
    },2600);

    function swap(){
      $('.simple-dot').each(function(i,obj){
        if($(obj).hasClass('simple-1')){
          $(obj).removeClass('simple-1');
          $(obj).addClass('simple-3');
        }
        else if($(obj).hasClass('simple-2')){
          $(obj).removeClass('simple-2');
          $(obj).addClass('simple-1');
        }
        else if($(obj).hasClass('simple-3')){
          $(obj).removeClass('simple-3');
          $(obj).addClass('simple-4');
        }
        else{
          $(obj).removeClass('simple-4');
          $(obj).addClass('simple-2');
        }
      });
    }
  }

$(document).on('click' , '.submit-email' , function(e){

	e.preventDefault();

	var name = $('#form_name').val();
	var email = $('#form_email').val();
	var message = $('#form_message').val();

	if(name == ''){
		$('.sadMessage').html('You need to enter your full name');
		$('.sadMessage').css('display' , 'block');
		return;
	}
	else if(email == ''){
		$('.sadMessage').html('You need to enter your email');
		$('.sadMessage').css('display' , 'block');
		return;
	}
	else if( message.length < 20	){
		$('.sadMessage').html('The message needs to have at least 20 characters');
		$('.sadMessage').css('display' , 'block');
		return;
	}

	$.ajax({
		type : 'POST',
		url : urlforajax.ajax_url,
		async: true,
		data :{
			action    : 'portfolioThemeSendEmail',
			name : name,
			email : email,
			message : message
		},
		dataType : 'text',
		success : function(data){
			$('#form_name').val('');
			$('#form_email').val('');
			$('#form_message').val('');
			console.log(data);
			$('.sadMessage').css('display' , 'none');
			$('.HappyMessage').css('display','block');
		},
		error : function(){
			$('.sadMessage').css('display' , 'block');
		}
	});

});


});

$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });


$('a[href^="#"]').on('click',function (e) {
	e.preventDefault();

	var target = this.hash,
	$target = $(target);

	if(typeof($target.offset())!== 'undefined' ){
		$('html, body').stop().animate({
				'scrollTop': $target.offset().top
		}, 900, 'swing', function () {
				window.location.hash = target;
		});
	}
});


/*
* Modules
*/

var themeInit = (function(){

	$('.profile-picture-container').hide();
	$('#first-name').hide();
	$('.profile-picture-container').fadeIn(1500).fadeTo(2000);
	$('#first-name').fadeIn(1500);
	$('.skillbar-progress').each(function(i,obj){
		var percentage = $(obj).data('progress');
		$(obj).css('width',percentage+'%');
	});

	$('.dots').css('width',60*$('#numberOfImages').val()+'px');

})();

var contactFormAnimation = (function(){
	//cacheDom
	$contactButton = $('.contact-me-button');
	$contactmeForm = $('.contact-me-form');
	$hiddenX = $('.hidden-x');
	$contactMe = $('.contect-me');

  //events
	$contactButton.on('click',showForm);
	$hiddenX.on('click',hideForm);

	//init
	$contactmeForm.hide();
	$hiddenX.hide();
	$hiddenX.insertAfter('.contact-me-form');

	function showForm(){
		$contactmeForm.show(1200);
		$contactButton.hide(1200);
		$hiddenX.show(1200);
		$('.contact-me').animate({
			height:'1000px'
		},1200);
	}

	function hideForm() {
		$contactmeForm.hide(1200);
		$contactButton.show(1200);
		$hiddenX.hide(1200);
		$('.contact-me').animate({
			height:'350px'
		},1200);
	}
})();

var bigMenuButton = (function(){

	//cacheDom
	var $bigMenu = $('.big-menu');
	var $menuIcon = $('.menu-icon-picture');
	var $bigMenuButton = $('.big-menu-button');
	var $exitButton = $('.exit-button');

	//events
	$menuIcon.on('click', showMenu);
	$bigMenuButton.on('click', hideMenu);
	$exitButton.on('click',hideMenu);

	//main
	function showMenu(){
		$bigMenu.css('display','block');
		$bigMenu.animate({
				opacity:1
		},1600);
	}

	function hideMenu() {
		$bigMenu.animate({
				opacity:0
		},1600);
		setTimeout( () =>{
			$bigMenu.css('display','none');
		});
	}

})();

var categoriesSingleAnimation = (function(){

	//cacheDom
	var $categories = $('.categories-single');
	var $chosen = $('.chosen');
	//events
	$categories.on('click' , animateChosen);

	//main
	function animateChosen() {
		$chosen = $('.chosen');
		hideTheChosen($chosen);
		showTheChosen(this);
	}

	function hideTheChosen($chosen){
		//console.log($chosen);
		$chosen.animate({
			borderRight : '0px solid white',
			fontSize : '0.8em',
			fontWeight : '400',
			marginBottom : '0px',
			marginTop : '0px'
		},200,function(){
			$chosen.removeClass('chosen');
		});
	}

	function showTheChosen(that){
		$(that).animate({
			fontSize : '1.2em',
			fontWeight : '700',
			marginBottom : '25px',
			marginTop : '25px'
		},200,function(){
			$(that).addClass('chosen');
		});
	}

})();

var portfolioSingleHover = (function(){
	//cachedDom
	var $singlePortfolio = $('.portfolio-container-single');
	var $categories = $('.categories-single');
	var $body = $('body');

	//events
	$body.on('mouseenter' , '.portfolio-container-single' , animateInnerIcon);
	$body.on('mouseleave', '.portfolio-container-single' , hideInnerIcon);
	$body.on('click tap', '.portfolio-container-single' , enterPost);

	function animateInnerIcon() {
		$(this.querySelector('.inner-icon')).fadeIn(400);
		$(this.querySelector('.job-title p')).animate({'letter-spacing':'1px','font-size':'1em','opacity' : '1'},400);
	}

	function hideInnerIcon() {
		$(this.querySelector('.inner-icon')).fadeOut(400);
		$(this.querySelector('.job-title p')).animate({'letter-spacing':'0px','font-size':'0.9em','opacity' : '0.6' },400);
	}

	function enterPost(){
		 var href = this.querySelector('input').value;
			window.location = href+'&category='+$('.chosen').text();;
	}

})();

var ajaxReq = (function(){

	//cache dom
	var $doc = $(document);
	var $page = $('.next-page');
	var $currentPage = $page.data('page');
	var $maxPages = $page.data('max');
	var $chosen = $('.chosen');
	var $category = $chosen.data('id');
	var $portfolioCon = 	$('.portfolio-container');

	//events
	$doc.on('click','.next-page',nextPage);
	$doc.on('click','.last-page',lastPage);
	$doc.on('click','.categories-single',categoryPage);

	function refreshData(){
		 $category = $('.chosen').data('id');
		 //$currentPage = $page.data('page');
		 console.log($category);
	}

	function nextPage(){
		$currentPage++;
		hideContainer();
		setTimeout(function(){
			refreshData();
			if($currentPage >= $maxPages){
				$page.css('display','none');
			}
			sendData('portfolioThemePagination');
		},500);
	}

	function lastPage(){
		refreshData();
		$currentPage--;
		hideContainer();
		if($currentPage == 0){
			$('.last-page').css('display','none');
		}

		$('.next-page').css('display','block');

		setTimeout(function(){
			sendData('portfolioThemePagination');
		},500);
	}

	function categoryPage(){

		$currentPage = 1;
		hideContainer();
		setTimeout(function(){
			refreshData();
			sendData('portfolioThemePaginationByCategory');
		},500);
	}

	function sendData(action){
		console.log($category);
		$.ajax({
			type : 'POST',
			url : urlforajax.ajax_url,
			async: true,
			data :{
				action    : action,
				page      : $currentPage,
				category  : $category,
				max       : $maxPages
			},
			dataType : 'text',
			success : function(data){

				$portfolioCon.html(data.slice(0, -1));
					$portfolioCon.animate({
						opacity : 1
					},500);

			}
		});
	}

	function hideContainer(){
		$portfolioCon.animate({
			opacity : 0
		},500);
	}

})();

var checkIfScrolledEnough = {

	elements : [],

	init : function() {
		this.cacheDom();
		this.bindEl();
		this.checkHeight();
	},
	cacheDom : function() {
		this.$el = $('.showUp');
		this.$window = $(window);
		this.registerAllElements();
	},
	bindEl : function(){
		this.$window.on('scroll' , this.checkHeight.bind(this));
	},
	registerAllElements : function(){
		var that = this;
		this.$el.each(function(i,obj){
			var el = { };
			el.id = $('#'+obj.id);
			console.log(obj.offsetTop);
			el.height = parseInt(obj.offsetTop)-700;
			that.elements.push(el);
			if(i > 0 && (that.elements[i-1].height == that.elements[i].height )){
				that.elements[i].height += 1;
			}
		});
		console.log(this.elements);
		this.hideEl();
	},
	hideEl : function() {
		for(var i = 0;i < this.elements.length; i++){
			this.elements[i].id.hide();
		}
	},
	checkHeight : function() {
		var scroll = parseInt(this.$window.scrollTop() );
		for(var i = 0; i<this.elements.length ;i++){
			if(this.elements[i].height <= scroll ){
				this.elements[i].id.fadeIn(2000);
			}
		}

	}
}

checkIfScrolledEnough.init();

var postHovering = {
	init : function() {
		$('.post').css('z-index','1000');
		this.cacheDom();
		this.bindEl();
	},
	cacheDom : function() {
		this.$post = $('.post');
		this.$width = $(window).width();
		this.$colored = $('.colored-icon');
	},
	bindEl : function() {
		var that = this;
		this.$post.hover( this.mouseoverAnimation , this.mouseleaveAnimation.bind(this,event) );
	},
	mouseoverAnimation : function() {

		//var height = this.checkWindowWidth();
		$('.colored-icon').css('background-color', 'black' );
		$(this).find('.colored-icon').animate({
			opacity : 0.8,
			height :'20vh'
		},150);
	},
	mouseleaveAnimation : function(){
		this.$colored.animate({
			opacity : 0,
			height : '0vh'
		},150);
	},
	checkWindowWidth : function() {
		if(this.$width < '1000'){
			return '180px';
		}
		return '20vh';
	}
}

postHovering.init();

//Keyboard animation
var keyboardAnimation = {

	wholeText : '',
	currentLetter : 0,
	keepAdding : '',
	that : this,

	init : function(){
		this.cacheDom();
		this.tick();
		this.$profileText.css({'margin-top':'-300px' , 'opacity' : '0'});
		this.$profileText.animate({marginTop :'0px',opacity : '1'},1500);
	},
	cacheDom : function(){
		this.customText = $('#profile-hidden-text').val();
		this.$seconds = $('#profile-text-animation-timer').val();
		this.$targetEl = $('#profile-text-p');
		this.$profileText = $('.profile-text');
	},
	render : function(){
		this.$targetEl.text(this.wholeText);
	},
	tick : function(){
		this.keepAdding = setInterval( this.addLetter.bind(this) ,this.$seconds,this.currentLetter,this.wholeText,this.that);
	},
	addLetter : function(){
		if(this.customText[ this.currentLetter ] == ' '){
			this.wholeText+=' ';
			this.currentLetter++;
		}
		this.wholeText+=this.customText[ this.currentLetter ];
		this.render();
		this.currentLetter++;
		if(this.customText.length == this.currentLetter ){
			clearInterval(this.keepAdding);
		}
	}
}

keyboardAnimation.init();

var changeImage = {

	testimonials : { },
	testimonialPictures : { },
	dot : { },
	timing : 600,
	lastImage : false,
	nextImage : true ,
	firstImage : true,
	currentNumber : 1,
	clickedDot : false,
	dotCliked : '',

	init : function(){
		this.cacheDom();
		this.events();
		this.hideTheImages();
	},
	cacheDom : function(){
		this.generalAmount = $('#numberOfImages').val();
		this.$rightTriangle = $('.right-triangle');
		this.$leftTriangle = $('.left-triangle');
		this.$currentDot = $('.dot-inside');
		for(var i = 1; i <= this.generalAmount; i++){
			this.testimonials["$n"+i] = $('#testimonial'+i);
			this.testimonialPictures["$n"+i] = $("#testimonial"+i+"pic");
			this.dot["$n"+i] = $("#dot"+i);
		}
	},
	hideTheImages : function(){
		for(var i = 2;i<= this.generalAmount ;i++){
			this.testimonials["$n"+i].css('display','none');
			this.testimonials["$n"+i].css('opacity','0');
			this.testimonialPictures["$n"+i].css('display','none');
			this.testimonialPictures["$n"+i].css('opacity','0');
		}
	},
	events : function(){
		this.$rightTriangle.on('click',this.nextImageAnimation.bind(this));
		this.$leftTriangle.on('click',this.lastImageAnimation.bind(this));
		this.$currentDot.on('click tap',  this.clickedOnDot.bind(this,event) );
	},
	nextImageAnimation : function(){

		var that = this;

		this.clickedDot = false;
		this.nextImage = true;

		this.hideCurrentImage();

		if( this.currentNumber == this.generalAmount	){
			this.lastImage = true;

			this.showNextImage();

			setTimeout(function(){
				that.currentNumber = 1;
			},this.timing );
		}
		else{
			this.lastImage = false;

			this.showNextImage();

			setTimeout(function(){
				that.currentNumber++;
			},this.timing + 100);
		}
	},
	lastImageAnimation : function(){

		var that = this;

		this.clickedDot = false;
		this.nextImage = false;

		this.hideCurrentImage();

		if( this.currentNumber == 1	){
			this.firstImage = true;

			this.showNextImage();

			setTimeout(function(){
				that.currentNumber = that.generalAmount;
			},this.timing + 100 );
		}
		else{
			this.firstImage = false;

			this.showNextImage();

			setTimeout(function(){
				that.currentNumber--;
			},this.timing +100 );
		}
	},
	clickedOnDot : function(){

		var that = this;

		this.hideCurrentImage();

		var string =  event.path[0].id;
		this.dotCliked = parseInt(string[string.length -1]);
		this.clickedDot = true;
		this.nextImage = false;

		this.showNextImage();

		setTimeout(function(){
			that.currentNumber = that.dotCliked;
		},this.timing + 100);

	},
	hideCurrentImage : function(){
		var that = this;
		this.testimonials["$n"+this.currentNumber].animate({
			'opacity':'0'
		},this.timing , function(){
			that.testimonials["$n"+that.currentNumber].css('display','none');
		});

		this.dot["$n"+this.currentNumber].animate({
			height:'10px',
			width:'10px'
		},this.timing);

	},
	showNextImage : function(){

		var that = this;

		if(this.nextImage){
			currentImage = "$n"+(this.currentNumber+1);

			if( this.lastImage ){
				var currentImage = "$n1";
			}
		}
		else if(this.clickedDot){
			var	currentImage = "$n"+this.dotCliked;
		}
		else{
			var currentImage = "$n"+(this.currentNumber-1);

			if( this.firstImage ){
				var currentImage = "$n"+this.generalAmount;
			}
		}

		this.dot[currentImage].animate({
			height : '22px',
			width : '22px'
		},this.timing  );

		setTimeout(function(){

			that.testimonialPictures[currentImage].css('display','block');
			that.testimonials[currentImage].css('display','block');

			that.testimonials[currentImage].animate({
				opacity : '1'
			},that.timing );

			that.testimonialPictures[currentImage].animate({
				opacity : '1'
			},that.timing );

		},this.timing - 1);

	}
}

changeImage.init();
