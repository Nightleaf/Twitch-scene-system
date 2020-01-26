function animate_logo(element_name, anim_enter, anim_attention) {
    setTimeout(function() {
        $(element_name).show();
        $(element_name).addClass('animated ' + anim_enter);  
        $(element_name).one('webkitAnimationEnd mozAnimationEnd animationend', function() {
            $(element_name).removeClass('animated ' + anim_enter);          
            setTimeout(function() {
                $(element_name).addClass('animated ' + anim_attention); 
                $(element_name).one('webkitAnimationEnd mozAnimationEnd animationend', function() {
                    setTimeout(function () {
                        location.reload();
                    }, 60000);
                });          
            }, 30000);
        });  
        
    }, 5000);
}

function start_scene() {
    animate_logo('#logo', 'fadeInUp', 'tada');
}