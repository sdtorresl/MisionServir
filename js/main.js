// function scrollToAnchor(element){
//     $('html,body').animate({scrollTop: element.offset().top},'slow');
// }

// $(".down-button").click(function(event) {
//     event.preventDefault();
//     var href = $(this).attr('href');
//     var selector = $(href);
//     scrollToAnchor(selector);
// });

// $(".up-button").click(function(event) {
//     event.preventDefault();
//     var href = $(this).attr('href');
//     var selector = $(href);
//     scrollToAnchor(selector);
// });

// $("#main-menu a").click(function(event) {
//     event.preventDefault();
//     var href = $(this).attr('href');
//     var selector = $(href);
//     scrollToAnchor(selector);
// });

// /*Set the class 'active' to the first element 
//  this will serve as our indicator*/
// $('section.full-display').first().addClass('active');

// /* Handle the mousewheel event together with DOMMouseScroll to work on cross browser */
// $(document).on('mousewheel DOMMouseScroll', function (e) {
//     e.preventDefault();//prevent the default mousewheel scrolling
//     var active = $('section.active');
//     //get the delta to determine the mousewheel scrol UP and DOWN
//     var delta = e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0 ? 1 : -1;
    
//     //if the delta value is negative, the user is scrolling down
//     if (delta < 0) {
//         //mousewheel down handler
//         next = active.next();
//         //check if the next section exist and animate the anchoring
//         if (next.length) {
//            /*setTimeout is here to prevent the scrolling animation
//             to jump to the topmost or bottom when 
//             the user scrolled very fast.*/
//             var timer = setTimeout(function () {
//                 /* animate the scrollTop by passing 
//                 the elements offset top value */
//                 $('body, html').animate({
//                     scrollTop: next.offset().top
//                 }, 'slow');
                
//                 // move the indicator 'active' class
//                 next.addClass('active')
//                     .siblings().removeClass('active');
                
//                 clearTimeout(timer);
//             }, 800);
//         }

//     } else {
//         //mousewheel up handler
//         /*similar logic to the mousewheel down handler 
//         except that we are animate the anchoring 
//         to the previous sibling element*/
//         prev = active.prev();

//         if (prev.length) {
//             var timer = setTimeout(function () {
//                 $('body, html').animate({
//                     scrollTop: prev.offset().top
//                 }, 'slow');

//                 prev.addClass('active')
//                     .siblings().removeClass('active');
                
//                 clearTimeout(timer);
//             }, 800);
//         }
//     }
// });



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