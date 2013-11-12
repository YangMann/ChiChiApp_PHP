/**
 * Created by JeffreyZhang on 13-10-23.
 */
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
    beforeSend: function(xhr, settings) {
        if (!csrfSafeMethod(settings.type)) {
            xhr.setRequestHeader("X-CSRFToken", csrftoken);
        }
    }
});

/*
var app = angular.module("chichi", []);

app.controller('photoFlowController', function($scope) {
    $scope.photo = {
        name: "ChiChi"
    };
});

app.controller('blogController', function($scope) {
    $scope.blog = {
        name: "ChiChi - Blog"
    };
});
*/


$(window).ready(function() {
    var redirInstances = $("[data-redir]");
    redirInstances.each(function(index, element) {
        var params = {};
        $(element).redir(index, params);
    });
});
