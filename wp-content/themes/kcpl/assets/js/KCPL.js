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

  // generate as many page numbers as there are pages
  for(var n = 1; n <= $(".paginate").length; n++){
      // $(".page-numbers-container").append("<a class='page-numbers'>" + n + "</a>");
  };

  // make the first page the current page
  $(".page-numbers:eq(0)").addClass("current");

  // what happens when you click a number

  $('.page-numbers').click(function() {

      var n = $(this);
      var c = $('.current');

      $('.p-' + c.html()).hide('slide', {direction: 'left'}, 1000);
      $('.p-' + n.html()).show('slide', {direction: 'right'}, 1000).delay(1000);

      c.removeClass('current');
      $(this).addClass('current');
  });

  // what happens when you click next

  $('.next').click(function() {

      if ($('.current').next('.page-numbers').length > 0) {

        var n = $('.current').next('.page-numbers');
        var c = $('.current');

        $('.p-' + c.html()).hide('slide', {direction: 'left'}, 1000);
        $('.p-' + n.html()).show('slide', {direction: 'right'}, 1000);

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

        $('.p-' + c.html()).hide('slide', {direction: 'right'}, 1000);
        $('.p-' + p.html()).show('slide', {direction: 'left'}, 1000);

        c.removeClass('current');
        p.addClass('current');

    };

      // need to build in catch when it's at the beginning of the pagination
  });

});
