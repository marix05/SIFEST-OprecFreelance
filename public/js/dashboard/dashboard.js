// Wait until document is ready
$(document).ready(function () {
    // navs tabs
    $(".info_navs a").click(function () {
        const id = $(this).data("id");
        console.log(id);
        if (!$(this).hasClass("active")) {
            $(".info_navs a").removeClass("active");
            $(this).addClass("active");

            $(".info_tab").hide();
            $(`[data-content=${id}]`).fadeIn();
        }
    });
});
