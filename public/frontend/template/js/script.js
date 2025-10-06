document.addEventListener("DOMContentLoaded", function () {
    if ("onwheel" in document) {
        window.onwheel = function (event) {
            if (typeof this.RDSmoothScroll !== undefined) {
                try {
                    window.removeEventListener("DOMMouseScroll", this.RDSmoothScroll.prototype.onWheel);
                } catch (error) {}
                event.stopPropagation();
            }
        };
    } else if ("onmousewheel" in document) {
        window.onmousewheel = function (event) {
            if (typeof this.RDSmoothScroll !== undefined) {
                try {
                    window.removeEventListener("onmousewheel", this.RDSmoothScroll.prototype.onWheel);
                } catch (error) {}
                event.stopPropagation();
            }
        };
    }
    try {
        $("body").unmousewheel();
    } catch (error) {}
});
function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return myNav.indexOf("msie") != -1 ? parseInt(myNav.split("msie")[1]) : false;
}
include("public/frontend/template/js/jquery.cookie.js");
include("public/frontend/template/js/jquery.easing.1.3.js");
(function ($) {
    var o = $("html");
    if (o.hasClass("desktop")) {
        include("public/frontend/template/js/jquery.ui.totop.js");
        $(document).ready(function () {
            $().UItoTop({ easingType: "easeOutQuart" });
        });
    }
})(jQuery);
(function ($) {
    var o = $("[data-equal-group]");
    if (o.length > 0) {
        include("public/frontend/template/js/jquery.equalheights.js");
    }
})(jQuery);
(function ($) {
    var o = $("html");
    if (o.hasClass("desktop")) {
        include("public/frontend/template/js/jquery.mousewheel.min.js");
        include("public/frontend/template/js/jquery.simplr.smoothscroll.min.js");
        $(document).ready(function () {
            $.srSmoothscroll({ step: 150, speed: 800 });
        });
    }
})(jQuery);
var currentYear = new Date().getFullYear();
$(document).ready(function () {
    $("#copyright-year").text(new Date().getFullYear());
});
(function ($) {
    var o = $("html");
    if (navigator.userAgent.toLowerCase().indexOf("msie") == -1 || (isIE() && isIE() > 9)) {
        if (o.hasClass("desktop")) {
            include("public/frontend/template/js/wow.js");
            $(document).ready(function () {
                new WOW().init();
            });
        }
    }
})(jQuery);
(function ($) {
    var o = $(".lazy-img img");
    if (o.length > 0) {
        include("public/frontend/template/js/jquery.unveil.js");
        $(document).ready(function () {
            $(o).unveil(0, function () {
                if (isIE() && isIE() < 9) {
                    $(this).load().addClass("lazy-loaded");
                } else {
                    $(this).load(function () {
                        $(this).addClass("lazy-loaded");
                    });
                }
            });
        });
        $(window).load(function () {
            $(window).trigger("lookup.unveil");
        });
    }
})(jQuery);
$(function () {
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,
        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },
        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };
    scaleFix();
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM);
        if (!result) {
            $(".sf-menus li").each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            });
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0";
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');
(function ($) {
    var o = $("#subscribe-form");
    if (o.length > 0) {
        include("public/frontend/template/js/sForm.js");
    }
})(jQuery);
(function ($) {
    var o = $("#bookingForm");
    if (o.length > 0) {
        include("public/frontend/template/js/booking/booking.js");
        include("public/frontend/template/js/booking/jquery-ui-1.10.3.custom.min.js");
        include("public/frontend/template/js/booking/jquery.fancyform.js");
        include("public/frontend/template/js/booking/jquery.placeholder.js");
        include("public/frontend/template/js/booking/regula.js");
        $(document).ready(function () {
            o.bookingForm({ ownerEmail: "#" });
        });
    }
})(jQuery);
(function ($) {
    var o = $(".thumb");
    if (o.length > 0) {
        include("public/frontend/template/js/jquery.fancybox.js");
        include("public/frontend/template/js/jquery.fancybox-media.js");
        $(document).ready(function () {
            o.fancybox();
        });
    }
})(jQuery);
(function ($) {
    var o = $(".parallax");
    if (o.length > 0 && $("html").hasClass("desktop")) {
        include("public/frontend/template/js/jquery.rd-parallax.js");
    }
})(jQuery);
(function ($) {
    include("public/frontend/template/js/scrollTo.js");
})(jQuery);
