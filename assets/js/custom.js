/*
 * @Date    :25-3-2018
 * @return  : mandetory operations for required js actions
 */
//$(".img-popup").on('click', function () {
//    $src = $(this).attr('src');
//    $(".overlay-dark").css('display', 'block');
//    $('.img-overlay').css('opacity', 1);
//    $('.img-overlay').attr('src', $src);
//    $('.img-overlay').css('transform', 'translate(-50%, 0) scale(1, 1)');
//});

$(".showInfoModal").click(function () {
    $(".infomodal").find(".modal-title").html($(this).data('heading'));
    $(".infomodal").find("p").html($(this).data('content'));
    $(".infomodal").modal('show');
});
$(".overlay-dark").on('click', function () {
    $(".overlay-dark").css('display', 'none');
    $('.img-overlay').css('opacity', 0);
    setTimeout(function () {
        $('.img-overlay').css('transform', 'translate(-50%, 0) scale(0, 0)');
    }, 600);
});
$(".seemore-list").click(function () {
    $className = $(this).data('target');
    $("." + $className).removeClass('hidden-xs');
    $('.arrow').addClass('rotateUp');
    $(this).hide();
    $(".seeless-list").show();
});

$('.seeless-list').click(function () {
    $(this).hide();
    $(".seemore-list").show();
    $className = $(this).data('target');
    $("." + $className).addClass('hidden-xs');
//    }
});

$(".seemore-affilation").click(function () {
    $className = $(this).data('target');
    $("." + $className).removeClass('hidden-xs');
    $('.arrow').addClass('rotateUp');
    $(this).hide();
    $(".seeless-affilation").show();
});

$('.seeless-affilation').click(function () {
    $(this).hide();
    $(".showme-affilation").show();
    $className = $(this).data('target');
    $("." + $className).addClass('hidden-xs');
    $(".seemore-affilation").show();
});

$(".seemore").click(function () {
    $className = $(this).data('target');
    $("." + $className).removeClass('hidden-xs');
    $('.arrow').addClass('rotateUp');
    $(this).hide();
    $(".seeless").show();
});

$('.seeless').click(function () {
    $(this).hide();
    $(".seemore").show();
    $className = $(this).data('target');
    $("." + $className).addClass('hidden-xs');
//    }
});

$(".seemore-doc").click(function () {
    $className = $(this).data('target');
    $("." + $className).removeClass('hidden-xs');
    $('.arrow').addClass('rotateUp');
    $(this).hide();
    $(".seeless-doc").show();
});

$('.seeless-doc').click(function () {
    $(this).hide();
    $(".seemore-doc").show();
    $className = $(this).data('target');
    $("." + $className).addClass('hidden-xs');
//    }
});

$(".seemore-doc2").click(function () {
    $className = $(this).data('target');
    $("." + $className).removeClass('hidden-xs');
    $('.arrow').addClass('rotateUp');
    $(this).hide();
    $(".seeless-doc2").show();
});

$('.seeless-doc2').click(function () {
    $(this).hide();
    $(".seemore-doc2").show();
    $className = $(this).data('target');
    $("." + $className).addClass('hidden-xs');
//    }
});

$(".list-group-item").click(function () {
//$hideMe = $(this).data('id');
    $showMe = "#" + $(this).data('id');
//    alert($showMe);
    $(".tab-data").hide();
    $($showMe).fadeIn("slow");
    $(".list-group").find('.on').removeClass('on');
    $(this).addClass('on');
});
$('.js-gotop').on('click', function (event) {

    event.preventDefault();

    $('html, body').animate({
        scrollTop: $('html').offset().top
    }, 500);

    return false;
});

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

$(window).scroll(function () {

    var $win = $(window);
    if ($win.scrollTop() > 200) {
        $('.js-top').addClass('active');
        $(".bottom-btn").fadeIn('slow');
    } else {
        $(".bottom-btn").fadeOut('slow');
        $('.js-top').removeClass('active');
    }



});




//var className = null;
//var msg = null;
function errorHandler(className, msg) {
//    alert('in error handler');
//    alert("." + className + "");

    if (className && msg) {
        $("." + className + "").html(msg);
        $("." + className + "").fadeIn('slow');

    }
}
var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
function validateForm() {
//    alert('function call');
    var name = $(".name").val();
    var email = $(".email").val();
    var contact = $(".contact").val();
    var hairline = $(".hairline").val();
    var error = false;

    if (!hairline) {
        errorHandler('error', 'Please choose your grade hairline');
        error = true;
    }
    if (!contact) {
        errorHandler('error', 'Contact is required');
        error = true;
    }
    if (!email) {
        errorHandler('error', 'Email is required');
        error = true;
    } else if (!email_regex.test(email)) {
        errorHandler('error', 'Please enter valid email address');
        error = true;
    }

    if (!name) {
        errorHandler('error', 'Name is required');
        error = true;
    }



    return error;
}

function validateFormPopup() {
//    alert('function call');
    var name = $(".name-popup").val();
    var email = $(".email-popup").val();
    var contact = $(".contact-popup").val();
    var hairline = $(".hairline-popup").val();
    var error = false;

    if (!hairline) {
        errorHandler('error-popup', 'Please choose your grade hairline');
        error = true;
    }
    if (!contact) {
        errorHandler('error-popup', 'Contact is required');
        error = true;
    }
    if (!email) {
        errorHandler('error-popup', 'Email is required');
        error = true;
    } else if (!email_regex.test(email)) {
        errorHandler('error-popup', 'Please enter valid email address');
        error = true;
    }

    if (!name) {
        errorHandler('error-popup', 'Name is required');
        error = true;
    }



    return error;
}

function callApi(name, email, mobile, hairline, formClass) {
//    alert(name + ',' + email + ',' + mobile + ',' + hairline + ',' + formClass + ',');
//    var name = name;
//    var email = email;
//    var mobile = mobile;
//    var hairline = hairline;
//    if (name && email && mobile && hairline && formClass) {
//        $.ajax({
//            type: 'POST',
//            url: 'http://www.hairmdindia.com/campaigns/consultation',
//            crossDomain: true,
//            contentType: "application/x-www-form-urlencoded",
//            async: false,
//            dataType: 'json',
//            data: {name: name, email: email, phone: mobile, query: hairline, source: 'lading-hair-md'},
//            success: function (data) {
////                alert(data['message']);
//                if (data != null) {
//                    alert('success');
                    $(formClass).submit();
//                } else {
//                    $(".gtco-loader-transpernt").hide();
//                    $("#ErrorModal").find('strong').html('Something went wrong please refresh page and try again');
//                    $("#ErrorModal").modal('show');
//                }
//            },
//            error: function (jXHR, textStatus, errorThrown) {
////                alert('in error');
//                $(".gtco-loader-transpernt").hide();
//                $("#ErrorModal").find('strong').html('Something went wrong please refresh page and try again');
//                $("#ErrorModal").modal('show');
//            }
//        });
//    } else {
//        $(".gtco-loader-transpernt").hide();
//        $("#ErrorModal").find('strong').html('All fields are mandetory');
//        $("#ErrorModal").modal('show');
//    }
}
$(document).ready(function () {
//$(".tablinks").html('<i class=" ti-arrow-circle-right link-icon"></i>');
    $(window).load(function () {
        $(".gtco-loader").fadeOut("slow");
    });

    $(".submitUserDetails").click(function (e) {
        var name = $(".name").val();
        var email = $(".email").val();
        var contact = $(".contact").val();
        var hairline = $(".hairline").val();
        var formClass = ".qouteForm";
        if (validateForm()) {
            e.preventDefault();
        } else {
            $(".gtco-loader-transpernt").show();
            callApi(name, email, contact, hairline, formClass);
        }

    });

    $(".submitUserDetails-popup").click(function (e) {
        var name = $(".name-popup").val();
        var email = $(".email-popup").val();
        var contact = $(".contact-popup").val();
        var hairline = $(".hairline-popup").val();
        var formClass = ".qouteForm-popup";
        if (validateFormPopup()) {
            e.preventDefault();
        } else {
            $(".gtco-loader-transpernt").show();
//            $(".qouteForm-popup").submit();
            callApi(name, email, contact, hairline, formClass);
        }

    });


    $(".input-file").change(function () {
        $(".filename").val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });


});