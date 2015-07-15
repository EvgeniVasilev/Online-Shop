$(document).ready(function () {
    $("#process_shopping").on("click", function () {
        $("#basket").fadeOut("normal", function () {
            $("#shop_form").fadeIn("normal");
        });
    });
});
