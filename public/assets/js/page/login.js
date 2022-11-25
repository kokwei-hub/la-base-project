
if ($('.alert-danger').length) {
    $('.alert-dismissible').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        closeAlert($('.alert-danger'));
    });

    window.setTimeout(function (e) {
        closeAlert($('.alert-danger'));
    }, 3000);

    function closeAlert(selector) {
        selector.fadeTo(500, 0).slideUp(500, function () {
            $(this).hide(); 
        });
    }
}

if (sessionStorage.getItem('client_error')) {
    $('.error-alert > .invalid-title').html(sessionStorage.getItem('client_error'));
    $('.error-alert').removeClass('d-none');
    sessionStorage.removeItem('client_error');
}

$(document).ready(function() {
    'use strict';
    onPasswordToggle();
});
