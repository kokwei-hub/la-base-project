/* --- Function List --- */
/* Localization Event */

/* --- Event List --- */


/* Localization Event */
const gettext = (text) => {
    if (!text) {
        return text;
    }

    if (locale[text]) {
        return locale[text] || text;
    }

    if (text.includes('_')) {
        text = text.split('_').map(function (item, index) {
            return locale[item] || text;
        });

        if (lang == 'cn') {
            return text.toString().replace(',', '');
        }

        return text.toString().replace(',', ' ');
    }

    return locale[text] || text;
};

/* Page Loader Event */
const setPageLoader = () => {
    if ($('.page-loader').length > 0) {
        if ($('.page-loader').is(':visible')) {
            $('.page-loader').hide();
        } else {
            $('.page-loader').show();
        }
    }
};

/* Password Toggle Event */
const onPasswordToggle = (elemClass = '.toggle-password') => {
    $(elemClass).click(function () {
        $(this).toggleClass('fa-eye fa-eye-slash');

        let input = $($(this).attr('toggle'));
        
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });
};

$(document).ready(function () {
    /* Page Loader Handler */
    setPageLoader();
});
