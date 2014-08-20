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

  //footer functions
<<<<<<< HEAD

  //pagination functions

  
=======
 
>>>>>>> 9f5bb61070b08a101b36fd372b46124a0656643b

});
