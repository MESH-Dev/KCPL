jQuery(document).ready(function($){
  //start with the localized object, that's important
  console.log(KCPL);

  //global functions
  try{Typekit.load();}catch(e){}

  //header functions
  $('#header-search').click(function(){
     $('#KCPL_header-search').toggleClass('active');
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

  $('.single-row').click(function() {
      var id = $(this).attr('id');
      var bg = $(this).attr('class');
      var content = id.slice(7,bg.length)
      content = "#content-" + content;
      bg = bg.slice(11,bg.length);
       console.log(content);

      $('.engage-content').hide();

      $(content).show();

      $('#row-expanded').removeClass().addClass(bg);
      $('#row-expanded').animate({left:"298px"},400);
  });

  $('.close').click(function() {
    $('#row-expanded').animate({left:"-690px"},500);
  });




  /* ==============
    Online Community
  ================= */
  $('#showProfile-cont.edit #showProfile-ava #avat').click(function(){
    $('#avat, #kcpl_oc-avatar').toggleClass('active');
  });

});
