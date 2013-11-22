/**
 * Created by JeffreyZhang on 13-10-23.
 */
$(document).ready(function(){
    $(window).resize(function(){
        if($(window).width()>=767)
            $(".u-2-3").css("width", $(window).width()-$(".u-1-3").width());
        else
            $(".u-2-3").css("width", $(window).width());
    });
    $(window).resize();
});

function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) == (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}

var csrftoken = getCookie('csrf_cookie_name');
console.log(csrftoken);

function csrfSafeMethod(method) {
    // these HTTP methods do not require CSRF protection
    return (/^(GET|HEAD|OPTIONS|TRACE)$/.test(method));
}

$.ajaxSetup({
    crossDomain: false, // obviates need for sameOrigin test
    beforeSend: function (xhr, settings) {
        if (!csrfSafeMethod(settings.type)) {
            xhr.setRequestHeader("X-CSRFToken", csrftoken);
        }
    }
});

function redirCapture() {
    var redirInstances = $("[data-redir]");
    redirInstances.each(function (index, element) {
        var targetBlock = $(element).data("redir-target");
//        console.log(targetBlock);
        var params = {"target": targetBlock};
        $(element).redir(index, params);
    });
}

$(window).ready(function () {
    redirCapture();
}).ajaxComplete(function (event, request, settings) {
//        console.log("AjaxComplete");
        var redirInstances = $("[data-redir]");
        redirInstances.each(function(index, element) {
            $(element).unbind("click");
        });
        redirCapture();
    });