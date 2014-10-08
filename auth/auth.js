document.addEventListener('DOMContentLoaded', function () {
    document.cookie="kcplAuth=0;domain=.ezproxy.kanawhalibrary.org;";
    var kcplidC  = getCookie('kcplID');
    var ezproxyC = getCookie('ezproxy');
    var authC    = getCookie('kcplAuth');

    var jqForm = $('form.left');

    jqForm.submit(function(){
      var uid = $(this).find('input[name="user"]').val();
      document.cookie="kcplID="+uid+";domain=.ezproxy.kanawhalibrary.org;";
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
