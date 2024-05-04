
// Script to  change the image
$(document).ready(function() {
    let currentImageIndex = 0;
    const images = $('.single-product-img img');

    $('#prev-image').click(function() {
        changeImage(-1);
    });

    $('#next-image').click(function() {
        changeImage(1);
    });

    function changeImage(delta) {
        currentImageIndex += delta;
        if (currentImageIndex < 0) {
            currentImageIndex = images.length - 1;
        } else if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }
        showImage(currentImageIndex);
    }

    function showImage(index) {
        images.hide().eq(index).show();
    }

    // Initially, show the main image
    showImage(currentImageIndex);
});

//
//
//
$(document).ready(function() {
    $('.show-manage-addresses').click(function() {
        $('.profile-information').hide(200),
            $('.manage-addresses').css('display', 'block')
    });

    $('.add-new-addresses').click(function() {
        $('.new-addresses').css('display', 'block')
    });

    $('.edit-icon').click(function() {
        $('.edit-address').css('display', 'block')
    });

});

//
//
//

$(document).ready(function() {
    $("#credit").click(function() {
        $("#credit-info").show();
        $("#paypal-info").hide();
        $("#cash-info").hide();
    });

    $("#paypal").click(function() {
        $("#paypal-info").show();
        $("#credit-info").hide();
        $("#cash-info").hide();
    });

    $("#cash").click(function() {
        $("#cash-info").show();
        $("#credit-info").hide();
        $("#paypal-info").hide();
    });
});
