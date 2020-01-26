function animate_element(element_name, anim_enter, anim_exit) {
    setTimeout(function() {
        $(element_name).show();
        $(element_name).addClass('animated ' + anim_enter);
        $(element_name).one('webkitAnimationEnd mozAnimationEnd animationend', function() {
            $(element_name).removeClass('animated ' + anim_enter);          
            setTimeout(function() {
                $(element_name).addClass('animated ' + anim_exit); 
                $(element_name).one('webkitAnimationEnd mozAnimationEnd animationend', function() {
                    $(element_name).removeClass('animated ' + anim_exit);
                    $(element_name).hide();
                });          
            }, 5000);
        });   
    }, 5000);
}


function start_feed() {
    animate_element('#twitter', 'slideInLeft', 'slideOutLeft');
    setTimeout(function() {
        animate_element('#youtube', 'slideInLeft', 'slideOutLeft');  
    }, 8000);
    setTimeout(function() {
        animate_element('#twitch', 'slideInLeft', 'slideOutLeft');  
    }, 16000);
    setTimeout(function() {
        location.reload();
    }, 120000);  
}
