jQuery(function ($) {
    if (!$('#profile-page')) {
        return;
    }

    // Remove existing WordPress strength meter
    $("#pass-strength-result").remove();
    $(".description.indicator-hint").remove();

    // Initialise how secure is my password code
    $("#pass1").hsimp();
});