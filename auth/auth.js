document.addEventListener('DOMContentLoaded', function () {
    console.log('Aloha! Ohana!');

    var kcplidC = getCookie('kcplID');
    var ezproxyC = getCookie('ezproxy');

    console.log(kcplidC);
    console.log(ezproxyC);

    var jqForm = $('form.left');

    $('form.left').submit(function(e){
      e.preventDefault();
      var uid = $(this).find('input[name="user"]').val();
      setCookie('kcplID',uid,365);
      var ourcookie = getCookie('kcplID');
      setTimeout(function(){
        $(this).unbind('submit').submit();
      },500);
    });

});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";domain=.ezproxy.kanawhalibrary.org " + expires;
}

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
