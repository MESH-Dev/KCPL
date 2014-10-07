document.addEventListener('DOMContentLoaded', function () {
    console.log('Here we go!');

    document.cookie="kcplAuth=0;domain=.ezproxy.kanawhalibrary.org;";
    var kcplidC  = getCookie('kcplID');
    var ezproxyC = getCookie('ezproxy');
    var authC    = getCookie('kcplAuth');

    console.log(kcplidC);
    console.log(ezproxyC);
    console.log(authC);

    var jqForm = $('form.left');

    $('form.left input[name="user"]').keyup(function(){
      var uid = $(this).val();
      document.cookie="kcplID="+uid+";domain=.ezproxy.kanawhalibrary.org;";
      console.log(document.cookie);
    });

    jqForm.submit(function(){
      document.cookie="kcplAuth=success;domain=.ezproxy.kanawhalibrary.org;";
    });


});

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
