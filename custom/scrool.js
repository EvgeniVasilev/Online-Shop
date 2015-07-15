$(document).ready(function () {
    $("#nav ul li a[href^='#']").on('click', function (e) {

        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;

        // animate
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 300, function () {

            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = hash;
        });

    });
});

// scroll back window to the top
$(document).ready(function () {
    $('#toTop').click(function () {

        var hash = this.hash;

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).position().top
        }, 500, function () {
            window.location.hash = hash;
        });

        return false;
    });
});
// show link to scroll back to top
$(document).ready(function () {
    $(window).scroll(function () {
        var scrl = $(this).scrollTop();
        if (scrl > 500) {
            $("#toTop").fadeIn(800);
        }
        if (scrl < 500) {
            $("#toTop").fadeOut('medium');
        }
    });
});
