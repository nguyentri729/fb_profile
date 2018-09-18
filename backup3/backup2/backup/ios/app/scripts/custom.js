$(window).on("load", function() {
    setTimeout(function() {
        $("#page-build").css("display", "block")
    }, 25), setTimeout(function() {
        $("#preloader").addClass("hide-preloader")
    }, 450)
}), $(document).ready(function() {
    "use strict";

    function e() {
        $("a").on("click", function() {
            if ("#" === $(this).attr("href")) return !1
        });
        var e = "gradient-body-1 gradient-body-2 gradient-body-3 gradient-body-4 gradient-body-5 gradient-body-6 gradient-body-7 gradient-body-8 gradient-body-9";
        $(".democ-1").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-1")
        }), $(".democ-2").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-2")
        }), $(".democ-3").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-3")
        }), $(".democ-4").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-4")
        }), $(".democ-5").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-5")
        }), $(".democ-6").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-6")
        }), $(".democ-7").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-7")
        }), $(".democ-8").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-8")
        }), $(".democ-9").on("click", function() {
            $(".page-bg, .menu-bg").removeClass(e).addClass("gradient-body-9")
        }), $(function() {
            FastClick.attach(document.body)
        }), $(function() {
            $(".preload-image").lazyload({
                threshold: 500
            })
        });
        var t = (new Date).getFullYear();

        function a() {
            $(".header-card").length ? $(".header").addClass("hide-header-card") : $(".header").removeClass("hide-header-card")
        }

        function o() {
            var e = $(window).height(),
                t = $(window).width();
            if ($(".page-content-full").length > 0) {
                var a = "0";
                $(".page-content, #page-transitions").css({
                    "min-height": e
                })
            } else {
                a = "0";
                $(".page-content, #page-transitions").css({
                    "min-height": e
                })
            }
            $(".cover-item").css({
                height: e - a,
                width: t
            }), $(".cover-item-full").css({
                "margin-top": -1 * a,
                height: e,
                width: t
            }), $(".coverpage-full .cover-item").css({
                height: e,
                width: t
            }), $(".coverpage-full").css({
                "margin-top": -1 * a
            }), $(".cover-content-center").each(function() {
                var e = $(this).innerHeight(),
                    t = $(this).innerWidth();
                $(this).css({
                    "margin-left": t / 2 * -1,
                    "margin-top": e / 2 * -1
                })
            }), $(".cover-content-center-full").each(function() {
                var e = $(this).innerHeight();
                $(this).css({
                    "margin-top": e / 2 * -1
                })
            })
        }
        $("#copyright-year, .copyright-year").html(t), $(".back-button").on("click", function() {
            return $("#page-transitions").addClass("back-button-clicked"), $("#page-transitions").removeClass("back-button-not-clicked"), window.history.go(-1), !1
        }), setTimeout(function() {
            $(".menu").show(0)
        }, 300), $(".menu-hider").length || $("body").append('<div class="menu-hider"></div>'), $(".page-bg").length || $("body").prepend('<div class="page-bg gradient-body-1"></div>'), $(".menu-box-bottom").each(function() {
            var e = $(this).attr("id"),
                t = $("[data-menu=" + e + "]").data("menu-height");
            $(this).css("bottom", -1 * (t + 50)), $(this).css("height", t)
        }), $(".menu-box-top").each(function() {
            $(this).attr("id");
            var e = $(this).data("menu-height");
            $(this).css("height", e), $(this).css("-webkit-transform", "translate(0%, " + -1 * e + "px)")
        }), $(".menu-box-bottom").each(function() {
            $(this).attr("id");
            var e = $(this).data("menu-height");
            $(this).css("height", e), $(this).css("-webkit-transform", "translate(-50%, " + e + "px)")
        }), $(".submenu").prepend('<div class="submenu-line"></div>'), $(".menu-item, .submenu a").append('<i class="fa fa-angle-right"></i>'), $(".menu-item span").length && ($(".menu-item span").parent().find(".fa-angle-right").hide(), $(".menu-item span").parent().addClass("remove-dot")), $("[data-menu]").on("click", function() {
            $(".menu").removeClass("active-menu-box-top active-menu-box-bottom active-menu-box-modal active-menu-full active-sidebar-left-over active-sidebar-left-push active-sidebar-right-push active-sidebar-left-parallax active-sidebar-right-parallax active-sidebar-right-over"), $(".page-content, .header").removeClass("active-body-left-push active-body-right-push active-body-left-parallax active-body-right-parallax"), $(".menu").css({
                "margin-top": ""
            }), $(".menu-hider").addClass("active-menu-hider");
            var e = $(this).data("menu-type"),
                t = $(this).data("menu"),
                a = $("#" + t).data("menu-height"),
                o = $("#" + t).data("menu-height") / 6;
            return "menu-full-bottom" === e && ($("#" + t).toggleClass("active-menu-full-bottom"), $("#" + t).hasClass("active-menu-full-bottom") || $(".menu-hider").removeClass("active-menu-hider")), "menu-full-top" === e && ($("#" + t).toggleClass("active-menu-full-top"), $("#" + t).hasClass("active-menu-full-top") || $(".menu-hider").removeClass("active-menu-hider")), "menu-box-modal" === e && ($("#" + t).css({
                height: a
            }), $("#" + t).css({
                "margin-top": a / 2 * -1
            }), $("#" + t).toggleClass("active-menu-box-modal")), "menu-box-full" === e && $("#" + t).toggleClass("active-menu-box-full"), "menu-box-bottom" === e && ($("#" + t).toggleClass("active-menu-box-bottom"), $(".page-content").css("transform", "translateY(" + -1 * o + "px)"), $(".header").css("transform", "translateY(-90px)")), "menu-box-top" === e && ($("#" + t).toggleClass("active-menu-box-top"), $(".page-content").css("transform", "translateY(" + o + "px)"), $(".header").css("transform", "translateY(-90px)")), "menu-sidebar-left-over" === e && $("#" + t).toggleClass("active-sidebar-left-over").addClass("menu-sidebar-shadow"), "menu-sidebar-left-push" === e && ($("#" + t).toggleClass("active-sidebar-left-push"), $(".page-content, .header").toggleClass("active-body-left-push")), "menu-sidebar-left-parallax" === e && ($("#" + t).toggleClass("active-sidebar-left-parallax").addClass("menu-sidebar-shadow"), $(".page-content, .header").toggleClass("active-body-left-parallax")), "menu-sidebar-right-parallax" === e && ($("#" + t).toggleClass("active-sidebar-right-parallax").addClass("menu-sidebar-shadow"), $(".page-content, .header").toggleClass("active-body-right-parallax")), "menu-sidebar-right-over" === e && $("#" + t).toggleClass("active-sidebar-right-over").addClass("menu-sidebar-shadow"), "menu-sidebar-right-push" === e && ($("#" + t).toggleClass("active-sidebar-right-push"), $(".page-content, .header").toggleClass("active-body-right-push")), !1
        }), $(".menu-hider, .close-menu, .menu-bar").on("click", function() {
            return $(".menu-hider").removeClass("active-menu-hider"), $(".menu").removeClass("active-menu-box-full active-menu-full-top active-menu-full-bottom active-menu-box-top active-menu-box-bottom active-menu-box-modal active-menu-full active-sidebar-left-over active-sidebar-left-push active-sidebar-right-push active-sidebar-left-parallax active-sidebar-right-parallax active-sidebar-right-over"), $(".page-content, .header").removeClass("header-zindex active-body-left-push active-body-right-push active-body-left-parallax active-body-right-parallax"), $(".menu").css({
                "margin-top": ""
            }), $(".page-content").css("transform", ""), $(".header").css("transform", ""), !1
        }), $(".menu-hider").removeClass("active-menu-hider"), $("a[data-submenu]").each(function() {
            var e = $(this).data("submenu"),
                t = $("#" + e + ">a").length;
            $(this).find("span").html(t)
        }), $("a[data-submenu]").on("click", function() {
            $(this).toggleClass("active-menu");
            var e = $(this).data("submenu"),
                t = $("#" + e + ">a").length;
            $("#" + e).height();
            0 == $("#" + e).height() ? $("#" + e).css({
                height: 50 * t
            }) : $("#" + e).css({
                height: "0px"
            })
        }), setTimeout(function() {
            if ($("a[data-submenu]").hasClass("active-menu")) {
                var e = $(".active-menu").data("submenu"),
                    t = $("#" + e + ">a").length;
                $("#" + e).height();
                0 == $("#" + e).height() ? $("#" + e).css({
                    height: 50 * t
                }) : $("#" + e).css({
                    height: "0px"
                })
            }
        }, 500), $(".back-to-top-badge, .back-to-top").on("click", function(e) {
            return e.preventDefault(), $("html, body").animate({
                scrollTop: 0
            }, s), !1
        }), a(), $("a[data-accordion]").on("click", function() {
            console.log("test");
            var e = $(this).data("accordion");
            $(".accordion-content").slideUp(200), $(".accordion i").removeClass("rotate-180"), $("#" + e).is(":visible") ? ($("#" + e).slideUp(200), $(this).find("i:last-child").removeClass("rotate-180")) : ($("#" + e).slideDown(200), $(this).find("i:last-child").addClass("rotate-180"))
        }), setTimeout(function() {
            $(".ad-300x50-fixed").fadeIn(350)
        }, 2500), $(".close-ad-button").on("click", function() {
            $(".ad-300x50-fixed").fadeOut(250)
        }), $(window).on("scroll", function() {
            var e = document.body.scrollHeight,
                t = $(this).scrollTop() <= 150,
                o = $(this).scrollTop() >= 0,
                i = ($(this).scrollTop(), $(this).scrollTop() >= e - ($(window).height() + 600));
            !0 === t ? ($(".store-product-button-fixed").removeClass("show-store-product-button"), $(".back-to-top-badge").removeClass("back-to-top-badge-visible"), a()) : !0 === o && ($(".store-product-button-fixed").addClass("show-store-product-button"), $(".back-to-top-badge").addClass("back-to-top-badge-visible")), 1 == i && ($(".store-product-button-fixed").removeClass("show-store-product-button"), $(".back-to-top-badge").removeClass("back-to-top-badge-visible"))
        }), setTimeout(function() {
            $(".home-thumb-slider, .single-slider").css({
                padding: "0px 15px"
            }), $(".home-thumb-slider").owlCarousel({
                lazyLoad: !0,
                center: !1,
                items: 2,
                loop: !1,
                startPosition: 0,
                margin: 20,
                responsive: {
                    600: {
                        items: 4
                    }
                }
            }), $(".single-slider").owlCarousel({
                loop: !0,
                items: 1,
                center: !0,
                margin: 50,
                nav: !1,
                lazyload: !0,
                autoHeight: !0,
                lazyLoad: !0,
                items: 1,
                autoplay: !1,
                autoplayTimeout: 3500
            }), $(".quote-slider").owlCarousel({
                loop: !0,
                items: 1,
                margin: 20,
                nav: !1,
                autoHeight: !0,
                lazyLoad: !0,
                items: 1,
                autoplay: !1,
                autoplayTimeout: 3500
            }), $(".single-slider-no-timeout").owlCarousel({
                loop: !0,
                margin: 0,
                nav: !1,
                dots: !1,
                items: 1,
                autoHeight: !0
            }), $(".single-store-slider").owlCarousel({
                loop: !1,
                margin: 10,
                nav: !1,
                autoHeight: !0,
                lazyLoad: !0,
                items: 1,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".double-slider").owlCarousel({
                loop: !0,
                margin: 20,
                nav: !1,
                autoHeight: !0,
                lazyLoad: !0,
                items: 2,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".thumb-slider").owlCarousel({
                loop: !0,
                margin: 10,
                nav: !1,
                autoHeight: !0,
                lazyLoad: !0,
                items: 3,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".cover-slider").owlCarousel({
                loop: !0,
                nav: !1,
                lazyLoad: !0,
                items: 1,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".cover-walkthrough-slider").owlCarousel({
                loop: !1,
                nav: !1,
                lazyLoad: !0,
                items: 1,
                autoplay: !1,
                autoplayTimeout: 3500
            }), $(".cover-slider-full").owlCarousel({
                loop: !1,
                nav: !1,
                dots: !1,
                mouseDrag: !1,
                touchDrag: !1,
                pullDrag: !1,
                lazyLoad: !0,
                items: 1,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".timeline-slider").owlCarousel({
                loop: !0,
                lazyLoad: !0,
                nav: !1,
                items: 1,
                autoplay: !0,
                autoplayTimeout: 3500
            }), $(".next-slide, .next-slide-arrow, .next-slide-text, .next-slide-custom").on("click", function() {
                $(this).parent().find(".owl-carousel").trigger("next.owl.carousel")
            }), $(".prev-slide, .prev-slide-arrow, .prev-slide-text, .prev-slide-custom").on("click", function() {
                $(this).parent().find(".owl-carousel").trigger("prev.owl.carousel")
            })
        }, 100), setTimeout(function() {
            o()
        }, 301), $(window).on("resize", function() {
            o()
        }), baguetteBox.run(".gallery", {}), baguetteBox.run(".profile-gallery", {}), $(".gallery-filter").length > 0 && $(".gallery-filter").filterizr(), $(".gallery-filter-controls li").on("click", function() {
            $(".gallery-filter-controls li").removeClass("gallery-filter-active color-blue-dark"), $(this).addClass("gallery-filter-active color-blue-dark")
        });
        var i = "false";
        jQuery(document).ready(function(e) {
            function t(t, a) {
                e(".formValidationError").hide(), e(".fieldHasError").removeClass("fieldHasError"), e("#" + t + " .requiredField").each(function(a) {
                    if ("" == e(this).val() || e(this).val() == e(this).attr("data-dummy")) return e(this).val(e(this).attr("data-dummy")), e(this).focus(), e(this).addClass("fieldHasError"), e("#" + e(this).attr("id") + "Error").fadeIn(300), !1;
                    if (e(this).hasClass("requiredEmailField")) {
                        var o = "#" + e(this).attr("id");
                        if (!/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(e(o).val())) return e(o).focus(), e(o).addClass("fieldHasError"), e(o + "Error2").fadeIn(300), !1
                    }
                    "false" == i && a == e("#" + t + " .requiredField").length - 1 && function(t, a) {
                        i = "true";
                        var o = e("#" + t).serialize();
                        e.post(e("#" + t).attr("action"), o, function(a) {
                            e("#" + t).hide(), e("#formSuccessMessageWrap").fadeIn(500)
                        })
                    }(t)
                })
            }
            e("#formSuccessMessageWrap").hide(0), e(".formValidationError").fadeOut(0), e('input[type="text"], input[type="password"], textarea').focus(function() {
                e(this).val() == e(this).attr("data-dummy") && e(this).val("")
            }), e("input, textarea").blur(function() {
                "" == e(this).val() && e(this).val(e(this).attr("data-dummy"))
            }), e("#contactSubmitButton").click(function() {
                return t(e(this).attr("data-formId")), !1
            })
        });
        var s = 350;
        $(".header, .footer").css({
                WebkitTransition: "all " + s + "ms ease",
                MozTransition: "all " + s + "ms ease",
                MsTransition: "all " + s + "ms ease",
                OTransition: "all " + s + "ms ease",
                transition: "all " + s + "ms ease"
            }),
            function(e, t, a) {
                if (a in t && t[a]) {
                    var o, i = e.location,
                        s = /^(a|html)$/i;
                    e.addEventListener("click", function(e) {
                        for (o = e.target; !s.test(o.nodeName);) o = o.parentNode;
                        "href" in o && (o.href.indexOf("http") || ~o.href.indexOf(i.host)) && (e.preventDefault(), i.href = o.href)
                    }, !1)
                }
            }(document, window.navigator, "standalone"), $("head").append('<meta charset="utf-8">'), $("head").append('<meta name="apple-mobile-web-app-capable" content="yes">');
        var n, r, l, d, c, u, h, p, g, m, b = {
            Android: function() {
                return navigator.userAgent.match(/Android/i)
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i)
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i)
            },
            any: function() {
                return b.Android() || b.iOS() || b.Windows()
            }
        };
        if (b.any() || ($(".show-blackberry, .show-ios, .show-windows, .show-android").addClass("disabled"), $(".show-no-detection").removeClass("disabled")), b.Android() && ($("head").append('<meta name="theme-color" content="#000000"> />'), $(".show-android").removeClass("disabled"), $(".show-blackberry, .show-ios, .show-windows, .show-download").addClass("disabled"), $(".sidebar-scroll").css("right", "0px"), $(".set-today").addClass("mobile-date-correction")), b.iOS() && ($(".show-ios").removeClass("disabled"), $(".show-blackberry, .show-android, .show-windows, .show-download").addClass("disabled"), $(".set-today").addClass("mobile-date-correction")), b.Windows() && ($(".show-windows").removeClass("disabled"), $(".show-blackberry, .show-ios, .show-android, .show-download").addClass("disabled")), $(".inner-link-list").on("click", function() {
                $(this).parent().find(".link-list").slideToggle(250), $(this).find(".fa-plus, .fa-angle-down").toggleClass("rotate-180")
            }), window.FontAwesomeConfig = {
                searchPseudoElements: !0
            }, $(".close-notification").on("click", function() {
                $(this).parent().addClass("hide-notification")
            }), $(".chart").length > 0) {
            n = "scripts/charts.js", r = function() {
                new Chart(document.getElementById("pie-chart"), {
                    type: "pie",
                    data: {
                        labels: ["Facebook", "Twitter", "Google Plus", "Pinterest", "WhatsApp"],
                        datasets: [{
                            backgroundColor: ["#4A89DC", "#4FC1E9", "#FC6E51", "#ED5565", "#A0D468"],
                            borderColor: "rgba(255,255,255,1)",
                            data: [7e3, 3e3, 1e3, 2e3, 2e3]
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        tooltips: {
                            enabled: !0
                        },
                        animation: {
                            duration: 1500
                        }
                    }
                }), new Chart(document.getElementById("doughnut-chart"), {
                    type: "doughnut",
                    data: {
                        labels: ["Apple Inc.", "Samsung", "Google", "One Plus", "Huawei"],
                        datasets: [{
                            backgroundColor: ["#CCD1D9", "#5D9CEC", "#FC6E51", "#434A54", "#4FC1E9"],
                            borderColor: "rgba(255,255,255,1)",
                            data: [5500, 4e3, 2e3, 3e3, 1e3]
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        tooltips: {
                            enabled: !0
                        },
                        animation: {
                            duration: 1500
                        },
                        layout: {
                            padding: {
                                bottom: 30
                            }
                        }
                    }
                }), new Chart(document.getElementById("polar-chart"), {
                    type: "polarArea",
                    data: {
                        labels: ["Windows", "Mac", "Linux"],
                        datasets: [{
                            backgroundColor: ["#CCD1D9", "#5D9CEC", "#FC6E51"],
                            borderColor: "rgba(255,255,255,1)",
                            data: [7e3, 1e4, 5e3]
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        tooltips: {
                            enabled: !0
                        },
                        animation: {
                            duration: 1500
                        },
                        layout: {
                            padding: {
                                bottom: 30
                            }
                        }
                    }
                }), new Chart(document.getElementById("vertical-chart"), {
                    type: "bar",
                    data: {
                        labels: ["2010", "2015", "2020", "2025"],
                        datasets: [{
                            label: "iOS",
                            backgroundColor: "#A0D468",
                            data: [900, 1e3, 1200, 1400]
                        }, {
                            label: "Android",
                            backgroundColor: "#4A89DC",
                            data: [890, 950, 1100, 1300]
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        title: {
                            display: !1
                        }
                    }
                }), new Chart(document.getElementById("horizontal-chart"), {
                    type: "horizontalBar",
                    data: {
                        labels: ["2010", "2013", "2016", "2020"],
                        datasets: [{
                            label: "Mobile",
                            backgroundColor: "#BF263C",
                            data: [330, 400, 580, 590]
                        }, {
                            label: "Responsive",
                            backgroundColor: "#EC87C0",
                            data: [390, 450, 550, 570]
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        title: {
                            display: !1
                        }
                    }
                }), new Chart(document.getElementById("line-chart"), {
                    type: "line",
                    data: {
                        labels: [2e3, 2005, 2010, 2015, 2010],
                        datasets: [{
                            data: [500, 400, 300, 200, 300],
                            label: "Desktop Web",
                            borderColor: "#D8334A"
                        }, {
                            data: [0, 100, 300, 400, 500],
                            label: "Mobile Web",
                            borderColor: "#4A89DC"
                        }]
                    },
                    options: {
                        legend: {
                            display: !0,
                            position: "bottom",
                            labels: {
                                fontSize: 13,
                                padding: 15,
                                boxWidth: 12
                            }
                        },
                        title: {
                            display: !1
                        }
                    }
                })
            }, l = document.body, (d = document.createElement("script")).src = n, d.onload = r, d.onreadystatechange = r, l.appendChild(d)
        }

        function f(e, t, a) {
            if (a) {
                var o = new Date;
                o.setTime(o.getTime() + 48 * a * 60 * 60 * 1e3);
                var i = "; expires=" + o.toGMTString()
            } else i = "";
            document.cookie = e + "=" + t + i + "; path=/"
        }

        function v(e) {
            for (var t = e + "=", a = document.cookie.split(";"), o = 0; o < a.length; o++) {
                for (var i = a[o];
                    " " == i.charAt(0);) i = i.substring(1, i.length);
                if (0 == i.indexOf(t)) return i.substring(t.length, i.length)
            }
            return null
        }
        if (v("enabled_cookie_active_menu123") || setTimeout(function() {
                $(".activate-menu").length && $(".activate-menu").trigger("click")
            }, 500), v("enabled_cookie_active_menu123") && setTimeout(function() {
                $(".activate-menu").length && $(".activate-menu").removeClass("activate-menu")
            }, 500), $(".close-cookie-menu").click(function() {
                $(".cookie-policy").fadeOut(300), f("enabled_cookie_active_menu123", !0, 1)
            }), $(window).scroll(function() {
                var e = $(window).scrollTop() / ($(".page-content").height() - $(window).height()) * 100;
                $(".reading-line").css("width", e + "%")
            }), $(function() {
                var e = $(".reading-time-box");
                e.readingTime({
                    readingTimeAsNumber: !0,
                    readingTimeTarget: e.find(".reading-time"),
                    wordCountTarget: e.find(".reading-words"),
                    wordsPerMinute: 1075,
                    round: !1,
                    lang: "en"
                })
            }), $("a[data-deploy-snack]").on("click", function() {
                var e = $(this).data("deploy-snack");
                $("#" + e).addClass("active-snack"), setTimeout(function() {
                    $("#" + e).removeClass("active-snack")
                }, 5e3)
            }), $(".snackbar a").on("click", function() {
                $(this).parent().removeClass("active-snack")
            }), $(".snb").on("click", function() {
                $(".notification-bar").height();
                $(".notification-bar").toggleClass("toggle-notification-bar")
            }), $("#sortable").length) {
            var C = document.getElementById("sortable");
            Sortable.create(C)
        }
        $("[data-search]").on("keyup", function() {
            var e = $(this).val();
            $(this).parent().parent().find("[data-filter-item]");
            "" != e ? ($(this).parent().parent().find(".search-results").removeClass("disabled-search-list"), $(this).parent().parent().find("[data-filter-item]").addClass("disabled-search"), $(this).parent().parent().find('[data-filter-item][data-filter-name*="' + e.toLowerCase() + '"]').removeClass("disabled-search")) : ($(this).parent().parent().find(".search-results").addClass("disabled-search-list"), $(this).parent().parent().find("[data-filter-item]").removeClass("disabled-search"))
        }), $(".active-tab").slideDown(0), $("a[data-tab]").on("click", function() {
            var e = $(this).data("tab");
            $(this).parent().find("[data-tab]").removeClass("active-tab-button"), $(this).parent().parent().find(".tab-titles a").removeClass("active-tab-button"), $(this).addClass("active-tab-button"), $(this).parent().parent().find(".tab-item").slideUp(200), $("#" + e).slideDown(200)
        }), $("a[data-tab-pill]").on("click", function() {
            var e = $(this).data("tab-pill"),
                t = $(this).parent().parent().find(".tab-pill-titles").data("active-tab-pill-background");
            $(this).parent().find("[data-tab-pill]").removeClass("active-tab-pill-button " + t), $(this).parent().parent().find(".tab-titles a").removeClass("active-tab-pill-button " + t), $(this).addClass("active-tab-pill-button " + t), $(this).parent().parent().find(".tab-item").slideUp(200), $("#" + e).slideDown(200)
        }), $("a[data-toast]").on("click", function() {
            $(".toast").removeClass("show-toast");
            var e = $(this).data("toast");
            $("#" + e).addClass("show-toast"), setTimeout(function() {
                $("#" + e).removeClass("show-toast")
            }, 3e3)
        }), $(".toggle-trigger, .toggle-title").on("click", function() {
            $(this).parent().toggleClass("toggle-active"), $(this).parent().find(".toggle-content").slideToggle(250)
        }), $(".faq-question").on("click", function() {
            $(this).parent().find(".faq-answer").slideToggle(300), $(this).find(".fa-plus").toggleClass("rotate-45"), $(this).find(".fa-chevron-down").toggleClass("rotate-180"), $(this).find(".fa-arrow-down").toggleClass("rotate-180")
        }), $(".article-card, .instant-box").length && setTimeout(function() {
            $('[data-article-card="' + activate_clone + '"]').addClass("active-card"), $('[data-instant="' + activate_clone + '"]').addClass("active-instant")
        }, 0), $("[data-article-card]").clone().addClass("article-clone").removeClass("article-card-round").appendTo("#page-transitions"), $(".article-clone .article-header").append('<span class="article-back"><i class="fa fa-angle-left"></i> Back</span>'), $("[data-deploy-card]").on("click", function() {
            $(".article-clone a").removeAttr("data-deploy-card");
            var e = $(this).data("deploy-card");
            $('[data-article-card="' + e + '"]').addClass("active-card"), $(".article-card").animate({
                scrollTop: 0
            }, 0)
        }), $(".article-clone .article-back, .close-article").on("click", function() {
            return $(".article-clone").removeClass("active-card"), !1
        }), $(".instant-box").clone().addClass("instant-box-clone").appendTo("#page-transitions"), $("[data-deploy-instant]").on("click", function() {
            $(".instant-box-clone .instant-content").removeAttr("data-deploy-instant");
            var e = $(this).data("deploy-instant");
            $('[data-instant="' + e + '"]').addClass("active-instant"), $(".instant-box").animate({
                scrollTop: 0
            }, 0)
        }), $(".instant-clone").remove("instant-hidden-large"), $(".close-instant").on("click", function() {
            return $(".instant-box-clone").removeClass("active-instant"), !1
        }), $(".progress-bar").length > 0 && $(".progress-bar-wrapper").each(function() {
            var e = $(this).data("progress-height"),
                t = $(this).data("progress-border"),
                a = $(this).attr("data-progress-round"),
                o = $(this).data("progress-bar-color"),
                i = $(this).data("progress-bar-background"),
                s = $(this).data("progress-complete"),
                n = $(this).attr("data-progress-text-visible"),
                r = $(this).attr("data-progress-text-color"),
                l = $(this).attr("data-progress-text-size"),
                d = $(this).attr("data-progress-text-position"),
                c = $(this).attr("data-progress-text-before"),
                u = $(this).attr("data-progress-text-after");
            "true" === a && ($(this).find(".progress-bar").css({
                "border-radius": e
            }), $(this).css({
                "border-radius": e
            })), "true" === n && ($(this).append("<em>" + c + s + "%" + u + "</em>"), $(this).find("em").css({
                color: r,
                "text-align": d,
                "font-size": l + "px",
                height: e + "px",
                "line-height": e + t + "px"
            })), $(this).css({
                height: e + t,
                "background-color": i
            }), $(this).find(".progress-bar").css({
                width: s + "%",
                height: e - t,
                "background-color": o,
                "border-left-color": i,
                "border-right-color": i,
                "border-left-width": t,
                "border-right-width": t,
                "margin-top": t
            })
        }), c = "01/19/2030 03:14:07 AM", c = (c = new Date(c)).getTime(), isNaN(c) || setInterval(function() {
            var e = new Date,
                e = new Date(e.getUTCFullYear(), e.getUTCMonth(), e.getUTCDate(), e.getUTCHours(), e.getUTCMinutes(), e.getUTCSeconds()),
                t = parseInt((c - e.getTime()) / 1e3);
            t >= 0 && (u = parseInt(t / 31536e3), t %= 31536e3, h = parseInt(t / 86400), t %= 86400, p = parseInt(t / 3600), t %= 3600, g = parseInt(t / 60), t %= 60, m = parseInt(t), $(".countdown").length > 0 && ($(".countdown #years")[0].innerHTML = parseInt(u, 10), $(".countdown #days")[0].innerHTML = parseInt(h, 10), $(".countdown #hours")[0].innerHTML = ("0" + p).slice(-2), $(".countdown #minutes")[0].innerHTML = ("0" + g).slice(-2), $(".countdown #seconds")[0].innerHTML = ("0" + m).slice(-2)))
        }, 1), $(".show-map, .hide-map").on("click", function() {
            $(".map-full .cover-content").toggleClass("deactivate-map"), $(".map-full .cover-overlay").toggleClass("deactivate-map"), $(".map-but-1, .map-but-2").toggleClass("deactivate-map"), $(".map-full .hide-map").toggleClass("activate-map")
        }), $("[data-toggle-box]").on("click", function() {
            var e = $(this).data("toggle-box");
            $("#" + e).is(":visible") ? $("#" + e).slideUp(250) : ($("[id^='box']").slideUp(250), $("#" + e).slideDown(250))
        }), $(".read-more-show").on("click", function() {
            $(this).hide(), $(this).parent().parent().find(".read-more-box").show()
        });
        var w = window.location.href;
        $(".shareToFacebook").prop("href", "https://www.facebook.com/sharer/sharer.php?u=" + w), $(".shareToGooglePlus").prop("href", "https://plus.google.com/share?url=" + w), $(".shareToTwitter").prop("href", "https://twitter.com/home?status=" + w), $(".shareToPinterest").prop("href", "https://pinterest.com/pin/create/button/?url=" + w), $(".shareToWhatsApp").prop("href", "whatsapp://send?text=" + w), $(".shareToMail").prop("href", "mailto:?body=" + w)
    }
    setTimeout(e, 0), $(function() {
        var t = {
            prefetch: !0,
            prefetchOn: "mouseover",
            cacheLength: 100,
            scroll: !0,
            blacklist: ".show-gallery",
            forms: "contactForm",
            onStart: {
                duration: 350,
                render: function(e) {
                    return e.addClass("is-exiting"), $(".page-change-preloader").addClass("show-change-preloader"), $(".menu-hider").removeClass("active-menu-hider"), $(".menu").removeClass("active-menu-box-full active-menu-full-top active-menu-full-bottom active-menu-box-top active-menu-box-bottom active-menu-box-modal active-menu-full active-sidebar-left-over active-sidebar-left-push active-sidebar-right-push active-sidebar-left-parallax active-sidebar-right-parallax active-sidebar-right-over"), $(".page-content, .header").removeClass("header-zindex active-body-left-push active-body-right-push active-body-left-parallax active-body-right-parallax"), $(".menu").css({
                        "margin-top": ""
                    }), $(".page-content").css("transform", ""), $(".header").css("transform", ""), !1
                }
            },
            onReady: {
                duration: 50,
                render: function(e, t) {
                    e.removeClass("is-exiting"), e.html(t), $("#page-build").remove(), $(".page-change-preloader").addClass("show-change-preloader")
                }
            },
            onAfter: function(t, a) {
                setTimeout(e, 0), setTimeout(function() {
                    $(".page-change-preloader").removeClass("show-change-preloader")
                }, 150)
            }
        };
        $("#page-transitions").smoothState(t).data("smoothState")
    }), $("body").append('<div class="page-change-preloader preloader-light"><div id="preload-spinner" class="spinner-red"></div></div>')
});