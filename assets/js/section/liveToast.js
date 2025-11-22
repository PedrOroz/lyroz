import Toast from '../common-sass/bootstrap/js/dist/toast';

if ( document.getElementById( "liveToastBtn" )) {
    var option = {
            animation: true,
            autohide: false
        },
        d = document.getElementById('liveToastBtn'),
        f = document.getElementById('liveToast');

    d.addEventListener('click',function(){
        var a = new Toast(f,option);
        a.show();
    });
}