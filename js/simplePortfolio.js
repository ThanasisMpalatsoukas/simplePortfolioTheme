/**
 * All the animations of the front-end are created here.
 *
 * @package perfectPortfolio
 * @since 1.0.0
 */

jQuery(document).ready(function($){


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

    $('.contact-me-form').hide();
    $('.hidden-x').hide();

    $('.hidden-x').insertAfter('.contact-me-form');

    $.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

    $('.profile-text').css({'margin-top':'-300px' , 'opacity' : '0'});

    $('.profile-text').animate({
      marginTop :'0px',
      opacity : '1'
    },1500);

    $('.profile-picture-container').hide();
    $('#first-name').hide();
    $('.profile-picture-container').fadeIn(1500).fadeTo(2000);

    var customText = $('#profile-hidden-text').val();

    $('#first-name').fadeIn(1500);

    $('.skillbar-progress').each(function(i,obj){
      var percentage = $(obj).data('progress');
      $(obj).css('width',percentage+'%');
    });

    if($('#profile-text-animation').val() == 1){
      keyboardAnimation(customText , $('#profile-text-animation-timer').val() ,  '#profile-text-p');
    }
    else{
      $('#profile-text-p').text(customText);
    }

    // Elements that trigger during scroll.
    var mostInformation = '#objectives';

    // Hide elements that will trigger.
    $('.showup-information').hide();
    $('.showup-information-p').hide();

    $('.dots').css('width',60*$('#numberOfImages').val()+'px');


    // ON action statements.
    $('.contact-me-button').on('click',function(){
      $('.contact-me-form').show(1200);
      $('.contact-me-button').hide(1200);
      $('.hidden-x').show(1200);
      $('.contact-me').animate({
        height:'1000px'
      },1200);
    });

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

		$('.menu-icon-picture').on('click', () => {
			$('.big-menu').css('display','block');
			$('.big-menu').animate({

				opacity:1
			},1600);
		});

		$('.big-menu-button').on('click' , () =>{
			$('.big-menu').animate({

				opacity:0
			},1600);
			setTimeout(() =>{
				$('.big-menu').css('display','none');
			},1600);
		});

		$('.exit-button').on('click', () =>{
			$('.big-menu').animate({

				opacity:0
			},1600);
			setTimeout(() =>{
				$('.big-menu').css('display','none');
			},1600);
		});


    $('.hidden-x').on('click',()=>{
      $('.contact-me-form').hide(1200);
      $('.contact-me-button').show(1200);
      $('.hidden-x').hide(1200);
      $('.contact-me').animate({
        height:'350px'
      },1200);
    });

    var scrollTop     = $(window).scrollTop(),
      elementOffset = $(mostInformation).offset().top,
      distanceMostInformation  = (elementOffset - scrollTop);

    $(window).on('scroll',function(){
      checkIfScrolledEnough(distanceMostInformation);
    });

    checkIfScrolledEnough(distanceMostInformation);

    $('.post').hover(function(){

      var height = '20vh';

      if($( window ).width() < '1000'){
        height = '180px';
      }

      $('.colored-icon').css('background-color',randomRgba());
      $(this).find('.colored-icon').animate({
        opacity : 0.8,
        height : height
      },300);
    },function(){
      $(this).find('.colored-icon').animate({
        opacity : 0,
        height : '0vh'
      },300);
    });

    $('.categories-single').on('click',function(){
      var which = 0;
      $('.categories-single').each(function(i,obj){
        if($(obj).hasClass('chosen')){
          which = i;
          $(obj).animate({
            borderRight : '0px solid white',
            fontSize : '0.8em',
            fontWeight : '400',
            marginBottom : '0px',
            marginTop : '0px'
          },200,function(){
            $(obj).removeClass('chosen');
          });
        }
      });

      var marginTop;

      if(which == 0){
        marginTop = '0px';
      }
      else{
        marginTop = '25px';
      }

      $(this).animate({
        borderRight : '2px solid #90c6db',
        fontSize : '1.2em',
        fontWeight : '700',
        marginBottom : '25px',
        marginTop : marginTop
      },200,function(){
        $(this).addClass('chosen');
      });
    });

    $('body').on('mouseenter','.masonry',
      function(){
        $(this).find('div').each(function(i,obj){
          if($(obj).hasClass('inner-icon')){
            $(obj).fadeIn(400);
          }
          if($(obj).hasClass('job-title')){
            $(obj).find('p').animate({
              'letter-spacing':'1px',
              'font-size':'1em',
              'opacity' : '1'
            },400);
          }
        });
      });

    $('body').on('click tap','.masonry',function(){
      var href = $(this).find('input').val();

      var category;
        $('.categories-single').each(function(i,obj){
          if($(obj).hasClass('chosen')){
            category = $(obj).text();
          }
        });
        window.location = href+'&category='+category;
    });

    $('body').on('mouseleave','.masonry',
      function(){
        $(this).find('div').each(function(i,obj){
          if($(obj).hasClass('inner-icon')){
            $(obj).fadeOut(400);
          }
          if($(obj).hasClass('job-title')){
            $(obj).find('p').animate({
              'letter-spacing':'0px',
              'font-size':'0.9em',
              'opacity' : '0.6'
            },400);
          }
        });
      }
    );




    // TESTIMONIALS SLIDER.
    // CUSTOM FUNCTION AREA.
    for(i = 2;i<= $('#numberOfImages').val();i++){
      $('#testimonial'+i).css('display','none');
      $('#testimonial'+i).css('opacity','0');
      $('#testimonial'+i+'pic').css('display','none');
      $('#testimonial'+i+'pic').css('opacity','0');
    }

    var currentNumber = 1;

    $('.right-triangle').on('click',function(){
        nextImage( currentNumber , $('#numberOfImages').val() , 700 );
        currentNumber++;
        if( currentNumber > $('#numberOfImages').val() ){
            currentNumber = 1;
        }
    });

    $('.left-triangle').on('click',function(){
        lastImage( currentNumber , $('#numberOfImages').val() , 700 );
        currentNumber--;
        if( currentNumber == 0 ){
            currentNumber = $('#numberOfImages').val();
        }
    });

    $('.dot-inside').on('click tap',function(){
      currentNumber = currentDot(currentNumber , $('#numberOfImages').val() , 700 , this );
    });

    function currentDot( currentNumber  , generalAmount  , timing, element ){

      $('#testimonial'+currentNumber).animate({
        'opacity':'0'
      },timing,function(){
        $('#testimonial'+currentNumber).css('display','none');
      });

      $('#dot'+currentNumber).animate({
        height:'10px',
        width:'10px'
      },timing);

      $('#testimonial'+currentNumber+'pic').animate({
        opacity : 0
      },timing,function(){
        $('#testimonial'+currentNumber+'pic').css('display','none');
      });

      var string = element.id;
      var lastLetter = string[string.length -1];

      $('#dot'+lastLetter).animate({
        height:'22px',
        width:'22px'
      },timing);

      setTimeout(function(){
          $('#testimonial'+lastLetter+'pic').css('display','block');
          $('#testimonial'+lastLetter).css('display','block');
          $('#testimonial'+lastLetter).animate({
            opacity : '1'
          },timing);
          $('#testimonial'+lastLetter+'pic').animate({
            opacity : '1'
          },timing);
      },timing-6);

      return parseInt(lastLetter);

    }

    function lastImage(currentNumber  , generalAmount  , timing  ){

      /*
        currentNumber INT: current active image
        generalAmount INT: amount of images
        timing INT: amount of time to change 500<x<1000
      */

      $('#testimonial'+currentNumber).animate({
        'opacity':'0'
      },timing,function(){
        $('#testimonial'+currentNumber).css('display','none');
      });

      $('#dot'+currentNumber).animate({
        height:'10px',
        width:'10px'
      },timing);

      $('#testimonial'+currentNumber+'pic').animate({
        opacity : 0
      },timing,function(){
        $('#testimonial'+currentNumber+'pic').css('display','none');
      });

      if( currentNumber == 1 ){

        $('#dot'+generalAmount).animate({
          height:'22px',
          width:'22px'
        },timing);

        setTimeout(function(){
            $('#testimonial'+generalAmount+'pic').css('display','block');
            $('#testimonial'+generalAmount).css('display','block');
            $('#testimonial'+generalAmount).animate({
              opacity : '1'
            },timing);
            $('#testimonial'+generalAmount+'pic').animate({
              opacity : '1'
            },timing);
        },timing-6);

      }
      else{

        $('#dot'+(currentNumber-1)).animate({
          height:'22px',
          width:'22px'
        },timing);

        setTimeout(function(){
            $('#testimonial'+(currentNumber-1)+'pic').css('display','block');
            $('#testimonial'+(currentNumber-1)).css('display','block');
            $('#testimonial'+(currentNumber-1)).animate({
              opacity : '1'
            },timing);

            $('#testimonial'+(currentNumber-1)+'pic').animate({
              opacity : '1'
            },timing);
        },timing-6);

      }
    }

    function nextImage(currentNumber , generalAmount , timing ){

      /*
        currentNumber INT: current active image
        generalAmount INT: amount of images
        timing INT: amount of time to change 500<x<1000
      */

      $('#testimonial'+currentNumber).animate({
        'opacity':'0'
      },timing,function(){
        $('#testimonial'+currentNumber).css('display','none');
      });

      $('#dot'+currentNumber).animate({
        height:'10px',
        width:'10px'
      },timing);

      $('#testimonial'+currentNumber+'pic').animate({
        opacity : 0
      },timing,function(){
        $('#testimonial'+currentNumber+'pic').css('display','none');
      });

      if( currentNumber == generalAmount ){

        $('#dot1').animate({
          height:'22px',
          width:'22px'
        },timing);

        setTimeout(function(){
            $('#testimonial'+1+'pic').css('display','block');
            $('#testimonial'+1).css('display','block');
            $('#testimonial'+1).animate({
              opacity : '1'
            },timing);
            $('#testimonial'+1+'pic').animate({
              opacity : '1'
            },timing);
        },timing-6);

      }
      else{

        $('#dot'+(currentNumber+1)).animate({
          height:'22px',
          width:'22px'
        },timing);

        setTimeout(function(){
            $('#testimonial'+(currentNumber+1)+'pic').css('display','block');
            $('#testimonial'+(currentNumber+1)).css('display','block');
            $('#testimonial'+(currentNumber+1)).animate({
              opacity : '1'
            },timing);

            $('#testimonial'+(currentNumber+1)+'pic').animate({
              opacity : '1'
            },timing);
        },timing-6);

      }

    }

    /*
    ----------------------------------
      ANIMATION FUNCTIONS
    ----------------------------------
    */




    function keyboardAnimation( text , seconds = 'random' , targetElement ){

      var currentLetter = 0;
      var wholeText = '';


      var showText = setInterval(function(){

        if(text[currentLetter] == ' '){
          wholeText+=' ';
          currentLetter++;
        }
        wholeText+=text[currentLetter];
        $(targetElement).text(wholeText);
        currentLetter++;

        if(text.length == currentLetter){
          clearInterval(showText);
        }

      },seconds,currentLetter,wholeText);

    }

    /*
    ----------------------------------
      MISC
    ----------------------------------
    */

    function randomRgba(){
      var n1 = Math.floor(Math.random() * 255),
          n2 = Math.floor(Math.random() * 255),
          n3 = Math.floor(Math.random() * 255)

      return 'rgba('+n1+','+n2+','+n3+',1)';
    }


    function checkIfScrolledEnough(distanceMostInformation){
      currentScroll = $(window).scrollTop();

      if(currentScroll >= distanceMostInformation+100){
        $('.showup-information').fadeIn(1800);
        $('.showup-information-p').fadeIn(2300);
      }
    }


    /*
    ----------------------------------
      AJAX REQUEST
    ----------------------------------
    */

  $(document).on('click','.next-page',function(){

    var that = $(this);
    var page = $(this).data('page');

    var maxPages = $(this).data('max');
    var category = $('.chosen').data('id');
    page++;

    console.log(page);


    $('.portfolio-container').animate({
      opacity : 0
    },500);

    setTimeout(function(){


      if(page >= maxPages){
        $('.next-page').css('display','none');
      }

      $.ajax({
        type : 'POST',
        url : urlforajax.ajax_url,
        async: true,
        data :{
          action    : 'portfolioThemePagination',
          page      : page,
          category  : category,
          max       : maxPages
        },
        dataType : 'text',
        success : function(data){

          $('.portfolio-container').html(data.slice(0, -1));
            $('.portfolio-container').animate({
              opacity : 1
            },500);

        }
      });

    },500);
  });

    $(document).on('click','.last-page',function(){

      var that = $(this);
      var page = $(this).data('page');

      var maxPages = $(this).data('max');
      var category = $('.chosen').data('id');
      page--;
      $('.portfolio-container').animate({
        opacity : 0
      },500);

      console.log(page);


      if(page == 0){
        $('.last-page').css('display','none');
      }

      $('.next-page').css('display','block');

      setTimeout(function(){

        $.ajax({
          type : 'POST',
          async: true,
          url : urlforajax.ajax_url,
          data :{
            action    : 'portfolioThemePagination',
            page      : page,
            category  : category,
            max       : maxPages
          },
          dataType : 'text',
          success : function(data){

            $('.portfolio-container').html(data.slice(0, -1));
            $('.portfolio-container').animate({
              opacity : 1
            },500);

          }
        });

      },500);
    });

      $(document).on('click','.categories-single',function(){

        var that = $(this);
        var category = $(this).data('id');
        var page = 1;

        var maxPages = $(this).data('max');

        $('.portfolio-container').animate({
          opacity : 0
        },500);

        console.log(page);

        setTimeout(function(){

          $.ajax({
            type : 'POST',
            url : urlforajax.ajax_url,
            async: true,
            data :{
              action    : 'portfolioThemePaginationByCategory',
              category  : category,
              page      : page,
              max       : maxPages
            },
            dataType : 'text',
            success : function(data){

              $('.portfolio-container').html(data.slice(0, -1));
              $('.portfolio-container').animate({
                opacity : 1
              },500);

            }
          });

        },500);


      });

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
