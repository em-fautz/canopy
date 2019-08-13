( function($) {
    jQuery(window).load(function() {
        var c = jQuery(window).width(), d = ".main-nav";
        jQuery('.main-nav >li:has("ul")>a').each(function() {
            jQuery(this).addClass("below")
        }), jQuery('ul:not(.main-nav)>li:has("ul")>a').each(function() {
        jQuery(this).addClass("side")
        }), c > 991 ? (jQuery("#showbutton").off("click"), jQuery(".im-hiding").css("display", "block"), jQuery(d).off("mouseenter", "li"), jQuery(d).off("mouseleave", "li"), jQuery(d).off("click", "li"), jQuery(d).off("click", "a"), jQuery(d).on("mouseenter", "li", function() {
            jQuery(this).children("ul").stop().hide(), jQuery(this).children("ul").slideDown(400)
        }), jQuery(d).on("mouseleave", "li", function() {
            jQuery(this).children("ul").stop().slideUp(350)
        })) : (jQuery("#showbutton").off("click"), jQuery(".im-hiding").css("display", "none"), jQuery(d).off("mouseenter", "li"), jQuery(d).off("mouseleave", "li"), jQuery(d).off("click", "li"), jQuery(d).off("click", "a"), jQuery(d).on("click", "a", function(a) {
            jQuery(this).next("ul").attr('style=""'), jQuery(this).next("ul").slideToggle(), 0 !== jQuery(this).next("ul").length && a.preventDefault()
        }),

        jQuery("#showbutton").on("click", function() {
            jQuery(".im-hiding").slideToggle()
        })),

        jQuery(window).resize(function() {
            c = jQuery(window).width(), jQuery(d + " ul").each(function() {
                jQuery(this).attr("style", '" "')
            }), c > 991 ? (jQuery("#showbutton").off("click"), jQuery(".im-hiding").css("display", "block"), jQuery(d).off("mouseenter", "li"), jQuery(d).off("mouseleave", "li"), jQuery(d).off("click", "li"), jQuery(d).off("click", "a"), jQuery(d).on("mouseenter", "li", function() {
                jQuery(this).children("ul").stop().hide(), jQuery(this).children("ul").slideDown(400)
            }), jQuery(d).on("mouseleave", "li", function() {
                jQuery(this).children("ul").stop().slideUp(350)
            })) : (jQuery("#showbutton").off("click"), jQuery(".im-hiding").css("display", "none"), jQuery(d).off("mouseenter", "li"), jQuery(d).off("mouseleave", "li"), jQuery(d).off("click", "li"), jQuery(d).off("click", "a"), jQuery(d).on("click", "a", function(a) {
                jQuery(this).next("ul").attr('style=""'), jQuery(this).next("ul").slideToggle(), 0 !== jQuery(this).next("ul").length && a.preventDefault()
            }), jQuery("#showbutton").on("click", function() {
                jQuery(".im-hiding").slideToggle()
            }))
        }),

        $("#owl-demo").owlCarousel({
            slideSpeed: 300,
            autoPlay: !0,
            paginationSpeed: 400,
            singleItem: !0,
            navigation: !1,
            pagination: !1
        }),

        $("#owl-demo1").owlCarousel({
            autoPlay: !0,
            slideSpeed: 300,
            itemsCustom: [
                [0, 1],
                [450, 1],
                [600, 2],
                [700, 2],
                [1e3, 3],
                [1200, 3],
                [1400, 3],
                [1600, 3]
            ],
            navigation: !1,
            pagination: !1
        }),

        $("#owl-demo4").owlCarousel({
            autoPlay: !0,
            slideSpeed: 300,
            itemsCustom: [
                [0, 1],
                [450, 1],
                [600, 2],
                [700, 2],
                [1e3, 3],
                [1200, 4],
                [1400, 4],
                [1600, 4]
            ],
            navigation: !1,
            pagination: !1
        }),

        $("#owl-demo2").owlCarousel({
            slideSpeed: 300,
            autoPlay: !0,
            paginationSpeed: 400,
            singleItem: !0,
            navigation: !1,
            pagination: !0
        }),

        $("#owl-demo3").owlCarousel({
            slideSpeed: 300,
            autoPlay: !0,
            paginationSpeed: 400,
            singleItem: !0,
            navigation: !1,
            pagination: !0
        }),

        $(document).ready(function() {
            $(".carousel").carousel({
                interval: 3e3
            })
        }),

        $(window).resize(function() {
            $("#log").append("<div>Handler for .resize() called.</div>")
        }),

        $(document).ready(function() {
            $("#owl-demo1").show()
        }),

        $(document).ready(function() {
            $("#owl-demo").show()
        }),

        $(document).ready(function( $ ) {
            $('.counter').counterUp({
              delay: 300,
              time: 3000
            });
            $(".single_work_counter").last().css( "border-right", "none" );
        })
});

} ) ( jQuery );