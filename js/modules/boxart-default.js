function start_box_art() {
    setTimeout(function() {        
        $('#box-art').show();
        $('#box-art').addClass('animated fadeInUp');
        // After the animation ends, the box art will dissapear in 180 seconds (3 minutes).
        $('#box-art').one('webkitAnimationEnd mozAnimationEnd animationend', function() {
            //setTimeout(function() {
            //    $('#box-art').removeClass('animated fadeInUp');
            //    $('#box-art').addClass('animated fadeOutDown');
            //}, 180000);
        });
    }, 10000);    
}