/* JQUERY */
! function() {
    "use strict";
    $.ajaxPrefilter(function(e, t, o) {
        e.async = !0
    })
}(),
function() {
    "use strict";

    function e() {
        $(".ripple").each(function() {
            new Ripple($(this))
        })
    }
    $(e)
}(),
function(e) {
    "use strict";

    function t(e) {
        var t = "transitionend webkitTransitionEnd",
            o = jQuery;
        this.element = e, this.rippleElement = this.getElement(), this.$rippleElement = o(this.rippleElement);
        var a = this.detectClickEvent(),
            r = this;
        e.on(a, function() {
            r.$rippleElement.removeClass("md-ripple-animate"), r.calcSizeAndPos(), r.$rippleElement.addClass("md-ripple-animate")
        }), this.$rippleElement.on(t, function() {
            r.$rippleElement.removeClass("md-ripple-animate"), r.rippleElement.style.width = 0, r.rippleElement.style.height = 0
        })
    }
    e.Ripple = t, t.prototype.getElement = function() {
        var e = this.element[0],
            t = e.querySelector(".md-ripple");
        return null === t && (t = document.createElement("span"), t.className = "md-ripple", this.element.append(t)), t
    }, t.prototype.calcSizeAndPos = function() {
        var e = Math.max(this.element.width(), this.element.height());
        this.rippleElement.style.width = e + "px", this.rippleElement.style.height = e + "px", this.rippleElement.style.marginTop = -(e / 2) + "px", this.rippleElement.style.marginLeft = -(e / 2) + "px"
    }, t.prototype.detectClickEvent = function() {
        var e = /iphone|ipad/gi.test(navigator.appVersion);
        return e ? "touchstart" : "click"
    }
}(window),
function() {
    "use strict";

    function e() {
        function e(e) {
            var t = e.target,
                o = t.parentNode;
            return "a" === t.tagName.toLowerCase() ? t : "a" === o.tagName.toLowerCase() ? o : "a" === o.parentNode.tagName.toLowerCase() ? o.parentNode : void 0
        }

        function t(e) {
            e.find("a").each(function() {
                var e = $(this).attr("href").replace("#", "");
                if ("" !== e && window.location.href.indexOf(e) >= 0) {
                    $(this).parents("li").addClass("active");
                    return !1
                }
            })
        }
        var o = $(".sidebar-nav");
        $(".sidebar-content");
        t(o), o.on("click", function(t) {
            var o = e(t);
            if (o) {
                var a = $(o),
                    r = a.parent()[0],
                    n = a.parent().parent().children();
                n.find("li").removeClass("active"), $.each(n, function(e, t) {
                    t !== r && $(t).removeClass("active")
                });
                var i = a.next();
                i.length && "UL" === i[0].tagName && (a.parent().toggleClass("active"), t.preventDefault())
            }
        });
        var a = $(".layout-container"),
            r = $("body");
        $("#sidebar-toggler").click(function(e) {
            e.preventDefault(), a.toggleClass("sidebar-visible"), $(this).parent().toggleClass("active")
        }), $(".sidebar-layout-obfuscator").click(function(e) {
            e.preventDefault(), a.removeClass("sidebar-visible"), $("#sidebar-toggler").parent().removeClass("active")
        }), $("#offcanvas-toggler").click(function(e) {
            e.preventDefault(), r.toggleClass("offcanvas-visible"), $(this).parent().toggleClass("active")
        }), window.addEventListener("resize", function() {
            window.innerWidth < 768 && (r.removeClass("offcanvas-visible"), $("#offcanvas-toggler").parent().addClass("active"))
        })
    }
    $(e)
}();
