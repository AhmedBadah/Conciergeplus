jQuery(document).ready(function(){
    jQuery('.home-hero img.hero-mobile,.home-hero img.hero-tap,.home-hero img.hero-desktop').addClass('animate');
    jQuery('.mobile-nav-icon').on('click',function(event){
        event.preventDefault();
        jQuery('.main-nav>ul').show();
        jQuery('.main-nav .btn-main').show();
    });
    jQuery('.plus-button').on('click',function(event){
        event.preventDefault();
        jQuery(this).parent().parent().find('ul').show();
        jQuery(this).parent().parent().find('.plus-button').hide();
        jQuery(this).parent().parent().find('.minus-button').show();
    });
    jQuery('.minus-button').on('click',function(event){
        event.preventDefault();
        jQuery(this).parent().parent().find('ul').hide();
        jQuery(this).parent().parent().find('.plus-button').show();
        jQuery(this).parent().parent().find('.minus-button').hide();
    });
    jQuery('.close-menu').on('click',function(event){
        event.preventDefault();
        jQuery('.main-nav>ul').hide();
        jQuery('.main-nav .btn-main').hide();
    });
    
    jQuery('*[animate="animate"]').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();
        difference=viewportBottom-elementTop;
        

        // console.log(elementTop);
        if(difference>0){
            
            var values=difference/300;
            if(values>1){
                values=1;
            }
            
            var output=values;
            var translateY=20-output*20;
            jQuery(this).css('opacity',output);
            jQuery(this).css('transform','translateY('+translateY+'px)');
        }
    });
    jQuery('*[animate="animate-fade"]').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();
        difference=viewportBottom-elementTop;
        

        // console.log(elementTop);
        if(difference>0){
            
            var values=difference/300;
            if(values>1){
                values=1;
            }
            
            var output=values;
            var translateY=20-output*20;
            jQuery(this).css('opacity',output);
            // jQuery(this).css('transform','translateY('+translateY+'px)');
        }
    });
    jQuery('#reviews').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        autoHeight: true,
        merge: true,
        
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    jQuery('#features').owlCarousel({
        loop: true,
        nav: true,
        navText: ["<img src='"+base_url+"/assets/img/owl-previous.png'>","<img src='"+base_url+"/assets/img/owl-next.png'>"],
        dots: true,
        items: 1,
        autoHeight: true,
        merge: true,
        
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    jQuery('.team .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        navText: ["<img src='"+base_url+"/assets/img/owl-previous.png'>","<img src='"+base_url+"/assets/img/owl-next.png'>"],
        dots: true,
        items: 1,
        autoHeight: true,
        merge: true,
        
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    jQuery('.features-list .featured-list-ul-container ul.features-list-ul li').each(function(){
        if(jQuery(this).children().length > 0){

        }else{
            jQuery(this).css('visibility','hidden');
            jQuery(this).css('padding','0');
        }
    });

    jQuery(window).scroll(function() { 
    if(jQuery('body'))
    // jQuery('.home .section-hero').css('background-position-y',jQuery(window).scrollTop()+'px');
    
    jQuery('*[animate="animate"]').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();
        difference=viewportBottom-elementTop;
        

        // console.log(elementTop);
        if(difference>0){
            
            var values=difference/300;
            if(values>1){
                values=1;
            }
            
            var output=values;
            var translateY=20-output*20;
            jQuery(this).css('opacity',output);
            jQuery(this).css('transform','translateY('+translateY+'px)');
        }
    });
    jQuery('*[animate="animate-fade"]').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height();
        difference=viewportBottom-elementTop;
        

        // console.log(elementTop);
        if(difference>0){
            
            var values=difference/300;
            if(values>1){
                values=1;
            }
            
            var output=values;
            var translateY=20-output*20;
            jQuery(this).css('opacity',output);
            // jQuery(this).css('transform','translateY('+translateY+'px)');
        }
    });


    jQuery('.home-hero').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height()+75;
        var difference=viewportBottom-elementBottom;

        

        if(difference>0 && viewportTop < elementBottom){
            
            jQuery(this).addClass('animateafter');
        }else{
            jQuery(this).removeClass('animateafter');
        }
    });


    // jQuery('.home-hero img.hero-mobile,.home-hero img.hero-tap').each(function(){
    //     var elementTop = jQuery(this).offset().top;
    //     var elementBottom = elementTop + jQuery(this).outerHeight();
    //     var viewportTop = jQuery(window).scrollTop();
    //     var viewportBottom = viewportTop + jQuery(window).height()+75;
    //     var difference=viewportBottom-elementBottom;

        

    //     if(difference>0 && viewportTop < elementBottom){
            
    //         jQuery(this).addClass('animate');
    //     }else{
    //         jQuery(this).removeClass('animate');
    //     }
    // });
jQuery('.Large-LightBlue,.Small-DarkBlue,.Small-LightBlue,.section-resources .icon-container img.dark-icon,.section-resources .icon-container img.dark-icon-1,.section-resources .icon-container img.light-icon-1,.section-resources .icon-container img.arrow-icon,.section-resources .icon-container img.light-icon-2,.lets-talk .btn-blue').each(function(){
        var elementTop = jQuery(this).offset().top;
        var elementBottom = elementTop + jQuery(this).outerHeight();
        var viewportTop = jQuery(window).scrollTop();
        var viewportBottom = viewportTop + jQuery(window).height()+75;
        var difference=viewportBottom-elementBottom;

        

        if(difference>0 && viewportTop < elementBottom){
            
            jQuery(this).addClass('animate');
        }else{
            jQuery(this).removeClass('animate');
        }
    });


    });
    // var timeout=1000;
    // var count=0;
    // var action= function(){
    //     var removeclass_var=function(){
    //         jQuery('.lets-talk .btn-blue').removeClass('animation');
    //         setTimeout(action, timeout);
    //     }
    //     var addclass_var=function(){
    //         jQuery('.lets-talk .btn-blue').addClass('animation');
    //         setTimeout(action, timeout);
    //     }
    //     if(jQuery('.lets-talk .btn-blue').hasClass('animation')){
            
    //         if(count<1){
    //             count++;
    //             setTimeout(removeclass_var, timeout);
    //         }
    //     }else{
    //         jQuery('.lets-talk .btn-blue').addClass('animation');
            
    //         setTimeout(addclass_var, timeout);
            
    //     }


        
    // };
    // action();


    jQuery('.featured-mega-menu-list-item .desktop-sub-menu.not-mega').each(function(){
        
        var left_value=jQuery(this).parent().width();
        
        var output=(330 - left_value)/2;
        jQuery(this).css('left','-'+output+'px');
    });

    jQuery('.video-container').on('click',function(){
        jQuery(this).removeClass('video-container');
    });


    

    
});