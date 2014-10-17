jQuery(document).ready(function($){
  //global functions
  // try{Typekit.load();}catch(e){}
 
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

  //search catalog functions

  var medium = window.location.pathname;

  if (medium.toLowerCase().indexOf('/books/') >= 0) {
    $('#lm').attr('value', 'PRINTONLY');
  };

  if (medium.toLowerCase().indexOf('/audiobooks/') >= 0) {
    $('#lm').attr('value', 'AUDIOONLY');
  };

  if (medium.toLowerCase().indexOf('/music/') >= 0) {
    $('#lm').attr('value', 'MUSICONLY');
  };

  if (medium.toLowerCase().indexOf('/ebooks/') >= 0) {
    $('#lm').attr('value', 'EBOOKSONLY');
  };

  if (medium.toLowerCase().indexOf('/kids/') >= 0) {
    $('#lm').attr('value', 'CHILDMAT');
  };

  if (medium.toLowerCase().indexOf('/teens/') >= 0) {
    $('#lm').attr('value', 'YAMAT');
  };

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
    $('#contentPrimary').addClass('open');
  });
  $('.KCPL_home-engagement .close').click(function(e){
    $('.KCPL_home-engagement #row-expanded').removeClass('active');
    $('#contentPrimary').removeClass('open');
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
    $('#mobileWrap,#contentWrap,#mobileMenuTrigger').toggleClass('active');
  });

    //menu expand
  $('#mobileWrap ul#main_nav > li.menu-item-has-children').each(function(){
    $(this).append('<i class="drop fa fa-lg fa-caret-down"></i>');
  });
  $(document).on('touchstart','#mobileWrap ul#main_nav > li > i.drop',function(e){
    e.preventDefault();
    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $(this).parent().removeClass('active');
    }else{
      $('#mobileWrap.active i.drop').removeClass('active');
      $('#mobileWrap.active i.drop').parent().removeClass('active');
      $(this).addClass('active');
      $(this).parent().addClass('active');
    }
  });
    //search shift
  $(document).on('touchstart','#mobileSearchTrigger',function(e){
    e.preventDefault();
    $('#KCPL_header-search').toggleClass('active');
    if($('#KCPL_header-search').hasClass('active')){
      $('#KCPL_header-search input[name="s"]').focus();
    }else{
      $('#KCPL_header-search input[name="s"]').blur();
    }
  });


  //cookies
  setCookie('kcplID','1234');
  setCookie('ezproxy','success');
  setCookie('kcplAuth','success');
  var kcplidC = getCookie('kcplID');
  var ezproxyC = getCookie('ezproxy');

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
  }
  function setCookie(cname, cvalue){
    document.cookie = cname + "=" + cvalue + ";";
  }

  // New tabs

  /* ==========
     Variables
   ========== */
   var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   function beginsWith(needle, haystack){
     return (haystack.substr(0, needle.length) == needle);
   };


  /* ==========
     Anchors open in new tab/window
   ========== */
   $('a').each(function(){

     if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab
      if( test == false && $(this).attr('href') != '#' ){
        $(this).attr('target','_blank');
      }
     }
   });

});
