// Basice Code keep it 
$(document).ready(function () {
    $(document).on("scroll", onScroll);

    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

// Use Your Class or ID For Selection 

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#menu-center a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#menu-center ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}



(function(){
    $("#sentButton").click(function() {

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        var validateMail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
 
        if (name == "") {
            $("#name").focus();
            $('#hint').text('* Por favor escriba su nombre');
            return false;
        }else if(phone == ""){
            $("#phone").focus();
            $('#hint').text('* Por favor escriba su teléfono');
            return false;
        }else if(email == "" || !validateMail.test(email)){
            $("#email").focus();  
            $('#hint').text('* Por favor escriba su correo electrónico');  
            return false;
        }else if(message == ""){
            $("#message").focus();
            $('#hint').text('* Por favor escriba su mensaje');  
            return false;
        }else{
            // All validations correct
            $('.loading').removeClass('hidden').fadeIn();
            $('#hint').text('');  

            var data = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message;
            $.ajax({
                type: "POST",
                url: "contact.php",
                data: data,
                success: function() {
                    $('.loading').hide();
                    $('.dialog').removeClass('hidden').fadeIn();
                    $('#message').text('Mensaje enviado!').addClass('success').animate({ 'right' : '130px' }, 300);  
                    
                    // Clear variables
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#message').val('');
                },
                error: function() {
                    $('.loading').hide();
                    $('.dialog').removeClass('hidden').fadeIn();
                    $('#message').text('Hubo un error!').addClass('error').animate({ 'right' : '130px' }, 300);                 
                }
            });

            return false;
        }
    });

    $(".close-button").click(function(event) {
        event.stopPropagation();
        $(this).parent('.dialog').fadeOut();
    });
})();