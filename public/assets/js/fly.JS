

$('.cart-btn').on('click', function () {
    console.log('click');
    let cart = $('.cart-nav');
    // find the img of that card which button is clicked by user
    console.log($(this));
    let imgtodrag = $(this).parent('.product-action-2-wrap').find("img").eq(0);
    if (imgtodrag) {
        // duplicate the img
        var imgclone = imgtodrag.clone().offset({
            top: imgtodrag.offset().top,
            left: imgtodrag.offset().left
        }).css({
            'opacity': '0.8',
            'position': 'absolute',
            'height': '150px',
            'width': '150px',
            'z-index': '100'
        }).appendTo($('body')).animate({
            'top': cart.offset().top + 20,
            'left': cart.offset().left + 30,
            'width': 75,
            'height': 75
        }, 1000, 'easeInOutExpo');


        imgclone.animate({
            'width': 0,
            'height': 0
        }, function () {
            $(this).detach()
        });
    }
});

