// function initMap() {
//     map = new google.maps.Map(document.getElementById("map"),{
//         center: {
//             lat: 55.820904,
//             lng: 37.628346
//         },
//         zoom: 16,
//         disableDefaultUI: !0,
//         scrollwheel: !1,
//         zoomControl: !0
//     });
//     var o = "img/marker64.png";
//     $(window).width() < 1200 && (o = "img/marker32.png");
//     new google.maps.Marker({
//         position: {
//             lat: 55.820904,
//             lng: 37.628346
//         },
//         map: map,
//         icon: o
//     })
// }
var touch = "ontouchstart"in document.documentElement || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
if (touch)
    try {
        for (var si in document.styleSheets) {
            var styleSheet = document.styleSheets[si];
            if (styleSheet.rules)
                for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--)
                    styleSheet.rules[ri].selectorText && styleSheet.rules[ri].selectorText.match(":hover") && styleSheet.deleteRule(ri)
        }
    } catch (o) {}
!function() {
    $(".js-menuLinkDropdown").on("click", function(o) {
        o.stopPropagation(),
        $(this).toggleClass("active"),
        $(this).parent().find(".dropdown").toggleClass("dropdown_active")
    }),
    $(".js-sortLinkDropdown").on("click", function(o) {
        o.stopPropagation(),
        $(this).toggleClass("active"),
        $(this).parent().find(".dropdown").toggleClass("dropdown_active")
    }),
    $(".js-sortItemDropdown").on("click", function(o) {
        // o.preventDefault();
        var e = $(this).find(".dropdown__link").text();
        $(".js-sortLinkDropdown").text(e)
    }),
    $(window).on("click", function(o) {
        $(".js-menuLinkDropdown").removeClass("active"),
        $(".js-menuLinkDropdown").parent().find(".dropdown").removeClass("dropdown_active"),
        $(".js-sortLinkDropdown").removeClass("active"),
        $(".js-sortLinkDropdown").parent().find(".dropdown").removeClass("dropdown_active")
    })
}(),
function() {
    $(".js-hamburger").on("click", function() {
        $(".js-menu").addClass("active"),
        $("html, body").addClass("noScroll")
    }),
    $(".js-close").on("click", function() {
        $(".js-menu").removeClass("active"),
        $("html, body").removeClass("noScroll")
    })
}();
var map;
