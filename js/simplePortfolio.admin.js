/**
 * Updaitng the changes when images are removed or added. PLus adding live changes when the metabox "More details" adds or removes details.
 *
 * @package perfectPortfolio
 * @since 1.0.0
 **/

jQuery(document).ready(function($){

  var mediaUploader;

  function uploadSinglePicture(e , title , target, placeholder){
      e.preventDefault();
      if( mediaUploader ){
        mediaUploader.open();
        return;
      }

      mediaUploader = wp.media.frames.file_frame = wp.media({

        title   : title,
        button  : {
          text  : 'Choose Picture'
        },
        multiple: false

      });



      mediaUploader.on('select' , function(){
        attachment = mediaUploader.state().get('selection').first().toJSON();
        $(target).val(attachment.url);
        if($(placeholder).attr('src')){
            $(placeholder).attr('src',attachment.url);
        }
        else{
          $(placeholder).css('background-image','url('+attachment.url+')');

        }
        $('#submitForm_content').submit();
      });


      mediaUploader.open();
      return;
    }


  $( '#upload-button' ).on('click' , function(e){uploadSinglePicture(e , 'Choose profile picture' , '#profile_url','#profile_url_placeholder')});
  $( '#upload-logo-button' ).on('click' , function(e){uploadSinglePicture(e , 'Choose logo' , '#content_logo','#content_logo_placeholder')});
  $( '#upload_content_blog_bg' ).on('click' , function(e){uploadSinglePicture(e , 'Choose Blog background' , '#content_blog_bg_2','#upload_content_blog_bg_placeholder')});
  $( '#upload_testimonials_bg' ).on('click' , function(e){uploadSinglePicture(e , 'Choose Testimonials Background' , '#content_testimonials_bg','#upload_testimonials_bg_placeholder')});
  $( '#upload_main_bg' ).on('click' , function(e){uploadSinglePicture(e , 'Choose blog background' , '#content_main_page_bg','#upload_main_bg_placeholder')});
  $( '#portfolioTheme_background_image_click' ).on('click' , function(e){uploadSinglePicture(e , 'Choose blog background' , '#portfolioTheme_background_image_field','#portfolioTheme_background_image_placeholder')});

  $( '#remove-picture' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture");
    if( answer  ==  true ){
      $('#profile_url').val('');
      $('.portfolio_general_form').submit();
    }
    return;
  });

  $( '#remove-main-bg' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture");
    if( answer  ==  true ){
      $('#content_main_page_bg').val('');
      $('.portfolio_general_form_content').submit();
    }
    return;
  });



  $( '#remove-bloggy-bg' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture");
    if( answer  ==  true ){
      $('#content_blog_bg_2').val('');
      $('.portfolio_general_form_content').submit();
    }
    return;
  });



  $( '#remove-blog-bg' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture");
    if( answer  ==  true ){
      $('#content_testimonials_bg').val('');
      $('.portfolio_general_form_content').submit();
    }
    return;
  });

  $( '#remove-logo' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your profile picture");
    if( answer  ==  true ){
      $('#content_logo').val('');
      $('.portfolio_general_form_content').submit();
    }
    return;
  });

  $( '#portfolioTheme_background_image_remove' ).on('click',function(e){
    e.preventDefault();
    var answer = confirm("Are you sure you want to reset this picture?");
    if( answer  ==  true ){
      $('#portfolioTheme_background_image_field').val('');
      $('#post').submit();
    }
    return;
  });

  $('#more_choices').on('click',function( e ){
    e.preventDefault();

    var number = $('#counting-elements-field').val();

    if(number >= 6){
      alert("6 are the max number of details you can have");
      return;
    }

    var input = $('<input></input>');
    input.attr('name' , 'number'+number);
    input.attr('id','number'+number);
    input.css({
      'margin-bottom':'30px',
      'margin-right':'15px',
      'margin-left':'15px'
    });

    var input2 = $('<input></input>');
    input2.attr('name' , 'answer'+number);
    input2.attr('id','answer'+number);

    input2.css({
      'margin-bottom':'30px',
      'margin-right':'15px',
      'margin-left':'15px'
    });

    var add = $('<button></button>');
    add.addClass('add-choices-state button button-primary');
    add.attr('id','button'+number);
    add.html('remove detail');

    var label2 = $('<label></label>');
    label2.attr('for','answer'+number);
    label2.attr('id','lanswer'+number);
    label2.html('choose the value of the detail');

    var label = $('<label></label>');
    label.attr('for','number'+number);
    label.attr('id','lnumber'+number);
    label.html('choose the name of the detail');

    var br = $('<br></br>');
    br.addClass('br'+number);


    $('#more-choices-box').append(label);
    $('#more-choices-box').append(input);
    $('#more-choices-box').append(label2);
    $('#more-choices-box').append(input2);
    $('#more-choices-box').append(add);
    $('#more-choices-box').append(br);
    number++;
    $('#counting-elements-field').val(number);
  });

  function countElements(el){
    var counter = 0;
    $(el).each(function(i,obj){

      if( obj.is('input') ){
        counter++;
      }

    });

    return counter;

  }

  $('body').on('click','.add-choices-state',function(event){
    event.preventDefault();
    var number = $(this).attr('id').slice(-1);
    var max = $('#counting-elements-field').val();
    if(number < max){
      for(i = parseInt(number)+1; i <= max; i++){
        $('#number'+i).attr('name','number'+(i-1));
        $('input[name='+'number'+(i-1)+']').attr('id','number'+(i-1));
        $('#answer'+i).attr('name','answer'+(i-1));
        $('input[name=answer'+(i-1)+']').attr('id','answer'+(i-1));
        $('.br'+i).addClass('br'+(i-1));
        $('.br'+(i-1)).removeClass('br'+i);
        $('label[for=answer'+i+']').attr('id','lanswer'+(i-1));
        $('#lanswer'+(i-1)).attr('for' , 'answer'+(i-1));
        $('label[for=number'+i+']').attr('id','lnumber'+(i-1));
        $('#lnumber'+(i-1)).attr('for' , 'number'+(i-1));
        $('#button'+i).addClass('button'+(i-1));
        $('.button'+(i-1)).attr('id','button'+(i-1));
      }
    }
    $('#number'+number).remove();
    $('#answer'+number).remove();
    $('#button'+number).remove();
    $('.br'+number).remove();
    $('#lnumber'+number).remove();
    $('#lanswer'+number).remove();
    $('#counting-elements-field').val($('#counting-elements-field').val()-1);
  });

  $('#twitter_checkbox').change(function(){
    checkForState('twitter',this);

  });
  $('#facebook_checkbox').change(function(){
    checkForState('facebook',this);
  });
  $('#linkedin_checkbox').change(function(){
    checkForState('linkedin',this);
  });
  $('#instagram_checkbox').change(function(){
    checkForState('instagram',this);
  });

  function checkForState(social,that){
    if(that.checked){
      $('#'+social+'-link').prop('disabled',false);
    }
    else{
      $('#'+social+'-link').prop('disabled',true);
    }
  }


});
