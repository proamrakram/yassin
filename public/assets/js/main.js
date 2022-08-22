$(function () {

    $(document).on("click", ".toggle-menu", function () {
        $("header .links").addClass("show");
    });

    $(document).on("click", ".over", function () {
        $("header .links").removeClass("show");
    });

    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $("header").addClass("down");
        } else {
            $("header").removeClass("down");
        }
    };

    scrollFunction();

    $(document).on("click", ".open-answer", function () {
        $($(this).parent(".question")).toggleClass("active");
        $($($(this).parent(".question")).next(".answer")).slideToggle(333);
    });

});