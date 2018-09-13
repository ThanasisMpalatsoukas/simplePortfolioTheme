/**
 * The blog carousel is here and the portfolio image format carousel is here.
 *
 * @package perfectPortfolio
 * @since 1.0.0
 */

jQuery(document).ready(function($){


  // Blog gallery slider.
  var numberOfItems = $('.blog-gallery').length;
  var currentItem = 0;
  var timer = $('.gallery-container').data('time');

  function changeItem( currentItem , maxItems , timer ){

    $('.image'+currentItem).fadeOut(500);

    currentItem++;

    if( currentItem == maxItems ){
      currentItem = 0;
    }

    var doItLater = setTimeout( () => {
      $('.image'+currentItem).fadeIn(500);
    },499)

    var cycleThrough = setTimeout( () => {
      changeItem( currentItem , maxItems , timer );
    } , timer*1000);

  }

  // INITIATE START OF INTERVAL.
  var cycleThrough = setTimeout( () => {
    changeItem( 0 , numberOfItems, timer );
  } , timer*1000 );


  // PORTFOLIO gallery slider.
  var interval = $('.right-image').data('interval');
  interval=interval*1000;

  var generalAmount = $('.cc').length;


  function nextImageInterval(currentNumber , generalAmount , start , interval){

    if(generalAmount == currentNumber){

      currentNumber = 1;

      $('.cc1').css('margin-left','100%');

      $('.cc1').animate({
        marginLeft:'0%'
      },1000);

      $('.cc'+generalAmount).animate({
        marginLeft:'-100%'
      },1000).promise().done(()=>{
        for(var i = 2;i<=3;i++){
          $('.cc'+i).css('margin-left','100%');
        }
      });

    }
    else{

      $('.cc'+currentNumber).animate({
        marginLeft:'-100%'
      },1000);

      currentNumber++;

      $('.cc'+currentNumber).animate({
        marginLeft:'0%'
      },1000);
    }

    window.setTimeout(function(){
      nextImageInterval(currentNumber,generalAmount,start,interval);
    },interval);
  }

  // INITIATE START OF SLIDER.
  nextImageInterval(1,generalAmount,1,interval);



if($('.picture')){
  var width = $( window ).width();

  if(width<1000 && width>600){
    $('.picture').css('height','300px');
  }
  else if(width<=600){
    $('.picture').css('height','250px');
  }
}
});
