$(function(){
    'use strict' ;
    //Adjust slider hight
    var winH  =$(window).hight(),
        navH=$('.navbar').innerHeight();
        $('.slider').height(winH-navH);
});
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        autoPlay:true
    });
});
/*global $, alert, console */

$(function () {
   
    'use strict';

    var userError   = true,
        
        emailError  = true,
        
        msgError    = true;
    
    $('.username').blur(function () {
       
        if ($(this).val().length < 4) { // Show Error
                        
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
            
                .end().find('.asterisx').fadeIn(100);
            
            userError = true;
            
        } else { // No Errors
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            
                .end().find('.asterisx').fadeOut(100);
            
            userError = false;
            
        }
        
    });
    
    $('.email').blur(function () {
       
        if ($(this).val() === '') {
                        
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
                
                .end().find('.asterisx').fadeIn(100);
                        
            emailError = true;
            
        } else {
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            
                .end().find('.asterisx').fadeOut(100);
                        
            emailError = false;
            
        }
        
    });
    
    $('.message').blur(function () {
       
        if ($(this).val().length < 10) {
            
            $(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(200)
                
                .end().find('.asterisx').fadeIn(100);
            
            msgError = true;
            
        } else {
                        
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
                
                .end().find('.asterisx').fadeOut(100);
            
            msgError = false;
            
        }
        
    });
   
    // Submit Form Validation
    
    $('.contact-form').submit(function (e) {
        
        if (userError === true || emailError === true || msgError === true) {
            
            e.preventDefault();
            
            $('.username, .email, .message').blur();
            
        }
        
    });
    
});