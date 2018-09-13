/**
 * Two carousel functions are here.
 *
 * @package perfectPortfolio
 * @since 1.0.0
 **/

jQuery(document).ready(function($){

  $('.submit').addClass('btn btn-primary');
  $('.comment-respond').first().css('display','none');


  // Carousel.
  $('body').hide();
  $('body').fadeIn(1000);

  var options = {
    repeated : false,
    controls : true
  }

  if(options.repeated){

    setTimeout(function(){
      portfolio_carousel_randomized(1,3,3, 1 ,options);
    },2000);

  }

  var lastItem = 3;
  var firstItem = 1;

  $('.right-click').on('click',function(options){
    var currentItem = $('.active').data('carousel');

    portfolio_carousel_randomized(currentItem , 3 , lastItem , firstItem , options);

    if(currentItem == lastItem){
      lastItem = firstItem;
      firstItem++;

      if(firstItem>3){
        firstItem = 1;
      }

    }
  });


  $('.left-click').on('click',function(options){
    var currentItem = $('.active').data('carousel');
    portfolio_carousel_randomized_left(currentItem , 3 , lastItem , firstItem , options);

    if(currentItem == firstItem){
      firstItem = lastItem;
      lastItem--;

      if(lastItem==0){
        lastItem = 3;
      }

    }
  });


  function portfolio_carousel_randomized(currentItem , allItems , lastItem , firstItem , options , runIt = false){

    if(runIt){
      $('.right-click').on('click',function(){
        clearTimeout(runIt);
      });
    }

    $('.cc'+currentItem).animate({
      marginLeft : '-100%'
    },1000);

    $('.cc'+currentItem).removeClass('active');


    if(currentItem == lastItem){
      $('.cc'+firstItem).css('margin-left' , '100%');
      lastItem = firstItem;
      firstItem++;

      if(firstItem>allItems){
        firstItem = 1;
      }

    }
    currentItem++

    if(currentItem > allItems){
      currentItem = 1;
    }

    $('.cc'+currentItem).animate({
      marginLeft : '0%'
    },1000);

    $('.cc'+currentItem).addClass('active');

    if(options.repeated){
      var runIt = setTimeout(function(){
        portfolio_carousel_randomized(currentItem,3,lastItem, firstItem ,options,runIt);

        $('.right-click').on('click',function(){
          clearTimeout(runIt);
        });

      },2000);
    }

  }


  function portfolio_carousel_randomized_left(currentItem,allItems,lastItem, firstItem ,options,runIt = false){

    clearTimeout(runIt);

    $('.cc'+currentItem).animate({
      marginLeft : '+100%'
    },1000);

    $('.cc'+currentItem).removeClass('active');


    if(currentItem == firstItem){
      $('.cc'+lastItem).css('margin-left' , '-100%');
      lastItem = firstItem;
      lastItem--;

      if(lastItem == 0){
        firstItem = allItems;
      }

    }
    currentItem--

    if (currentItem == 0) {
      currentItem = allItems;
    }

    $('.cc'+currentItem).animate({
      marginLeft : '0%'
    },1000);

    $('.cc'+currentItem).addClass('active');

  }



  function resetItem(currentItem , firstItem, lastItem){
    if(currentItem == lastItem){
      $('.cc'+firstItem).css('margin-left' , '100%');
    }
  }





if( $('.picture-column-1') ){

  var elementsOffset = [],
      piccolumn1 = $('.picture-column-1'),
      scrollTop     = $(window).scrollTop();

  var counter = 0;

  piccolumn1.each(function(i,obj){
      var elementOffset = $(obj).offset().top,
      distanceMostInformation  = (elementOffset - scrollTop);
      elementsOffset.push(distanceMostInformation);
      counter++;
  });

  var fixedHeight = 900*counter;

  $('.changeHeight').css('height',fixedHeight+'px');

  $('.picture-column-1').css({
      'opacity':'0',
      'marginTop':'120px'
  });

  var state  = true;


  var counter = 0;


  if($('.picture-column-1')){
    $(window).on('scroll',function(){
      checked = checkIfScrolledEnough(elementsOffset,counter);
      if(checked == 1){
        elementsOffset.shift();
        counter++;
      }
    });
    checked = checkIfScrolledEnough(elementsOffset,counter);
    if(checked == 1){
      elementsOffset.shift();
      counter++;
    }
  }

  function checkIfScrolledEnough(distanceMostInformation,counter){
    currentScroll = $(window).scrollTop();

      if(currentScroll >= distanceMostInformation[0]-650){
        $('#scroll-image-column1-'+counter).animate({
          opacity:'1',
          marginTop:'0px'
        },1200);
        return 1;
      }
      return 0;

    }

}

});
