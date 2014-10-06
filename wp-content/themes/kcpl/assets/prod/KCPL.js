jQuery(document).ready(function($){
  //global functions
  try{Typekit.load();}catch(e){}

  //header functions
  $('#header-search').click(function(){
     $('#KCPL_header-search').toggleClass('active');
     if($('#KCPL_header-search').hasClass('active')){
       $('#KCPL_header-search input[name="s"]').focus();
     }else{
       $('#KCPL_header-search input[name="s"]').blur();
     }
  });

  //search functions
  $(document).on('click','#KCPL_search #search-params .bottom > a',function(){
    $class = $(this).attr('class');
    $('#KCPL_search #search-params .bottom > a').removeClass('active');
    $(this).addClass('active');
    $('#KCPL_search #select').removeClass().addClass($class);
  });

  //pagination functions

  // display the first set and hide all the others
  $('.paginate').hide();
  $('.p-1').show();

  $(".page-numbers-container").append('<a class="previous"><i class="fa fa-angle-double-left"></i></a>');

  // generate as many page numbers as there are pages
  for(var n = 1; n <= $(".paginate").length; n++){
      $(".page-numbers-container").append("<a class='page-numbers'>" + n + "</a>");
  };

  // generate the next arrow

  $(".page-numbers-container").append('<a class="next"><i class="fa fa-angle-double-right"></i></a>');

  // make the first page the current page
  $(".page-numbers:eq(0)").addClass("current");

  // what happens when you click a number

  $('.page-numbers').click(function() {

      var n = $(this);
      var c = $('.current');

      $('.p-' + c.html()).fadeOut("slow", function(){});
      $('.p-' + n.html()).delay(800).fadeIn('slow', function(){});

      c.removeClass('current');
      $(this).addClass('current');
  });

  // what happens when you click next

  $('.next').click(function() {

      if ($('.current').next('.page-numbers').length > 0) {

        var n = $('.current').next('.page-numbers');
        var c = $('.current');

        $('.p-' + c.html()).fadeOut("slow", function(){});
        $('.p-' + n.html()).delay(800).fadeIn('slow', function(){});

        c.removeClass('current');
        n.addClass('current');

      };

      // need to build in catch when it's at the end of the pagination
  });

  // what happens when you click previous

  $('.previous').click(function() {

      if($('.current').prev('.page-numbers').length > 0){
        var p = $('.current').prev('.page-numbers');
        var c = $('.current');

        $('.p-' + c.html()).fadeOut("slow", function(){});
        $('.p-' + p.html()).delay(800).fadeIn('slow', function(){});

        c.removeClass('current');
        p.addClass('current');

    };

      // need to build in catch when it's at the beginning of the pagination
  });



  /* ==============
    Made this better and smoother
  ============== */
  $('.KCPL_home-engagement .single-row').click(function(e){
    $index = $('.KCPL_home-engagement .single-row').index(this);
    $(this).siblings().addClass('active');
    $('.KCPL_home-engagement #row-expanded .engage-content').not(':eq('+$index+')').removeClass('active');
    $('.KCPL_home-engagement #row-expanded .engage-content').eq($index).addClass('active');
  });
  $('.KCPL_home-engagement .close').click(function(e){
    $('.KCPL_home-engagement #row-expanded').removeClass('active');
  });



  /* ==============
    Online Community
  ================= */
  $('#showProfile-cont.edit #showProfile-ava #avat').click(function(){
    $('#avat, #kcpl_oc-avatar').toggleClass('active');
  });


  /* ==============
    IT'S MOBILE TIME!
  ============== */
    //menu shift
  $(document).on('touchstart','#mobileMenuTrigger:not(.active), #contentWrap.active',function(e){
    e.preventDefault();
    if(event.type == "click"){
      documentClick = true;
    }
    if(documentClick){
      $('#mobileWrap,#contentWrap,#mobileMenuTrigger').toggleClass('active');
    }
  });

    //menu expand
  $('#mobileWrap ul#main_nav > li.menu-item-has-children').each(function(){
    $(this).append('<i class="drop fa fa-lg fa-caret-down"></i>');
  });
  $(document).on('touchstart','#mobileWrap ul#main_nav > li > i.drop',function(e){
    e.preventDefault();
    if(event.type == "click"){
      documentClick = true;
    }
    if(documentClick){
      if($(this).hasClass('active')){
        $(this).removeClass('active');
        $(this).parent().removeClass('active');
      }else{
        $('#mobileWrap.active i.drop').removeClass('active');
        $('#mobileWrap.active i.drop').parent().removeClass('active');
        $(this).addClass('active');
        $(this).parent().addClass('active');
      }
    }
  });
    //search shift
  $(document).on('touchstart','#mobileSearchTrigger',function(e){
    e.preventDefault();
    if(event.type == "click"){
      documentClick = true;
    }
    if(documentClick){
      $('#KCPL_header-search').toggleClass('active');
      if($('#KCPL_header-search').hasClass('active')){
        $('#KCPL_header-search input[name="s"]').focus();
      }else{
        $('#KCPL_header-search input[name="s"]').blur();
      }
     }
  });

});
