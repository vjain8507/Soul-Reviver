/*jslint browser: true*/
/*global $ */
$(document).ready(function () {
    "use strict";
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        });
    $('#cpassword').on('keyup', function () {
        if ($(this).val() === $('#password').val()) {
            $('#tick').html("<i class='fa fa-hand-o-right'></i>").css('color', 'green');
        } else {
            $('#tick').html("<i class='fa fa-hand-o-right'></i>").css('color', 'red');
        }
    });
});
jQuery(function ($) {
    "use strict";
    jQuery('#demo1').skdslider({
        delay: 5000,
        animationSpeed: 2000,
        showNextPrev: false,
        showPlayButton: false,
        autoSlide: true,
        animationType: 'fading'
    });
    jQuery('#responsive').change(function () {
        $('#responsive_wrapper').width(jQuery(this).val());
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $(".navbar-fixed-top").addClass('past-main');
        } else {
            $(".navbar-fixed-top").removeClass('past-main');
        }
    });
    $('#firstTop').on("click", function () {
        var percentage = 100;
        var height = $(document).height();
        var remove = +height / +100 * +percentage;
        var spaceFromTop = +height - +remove;
        $('html,body').animate({
            scrollTop: spaceFromTop
        }, 'slow', function () {});
    });
    $('#secondTop').on("click", function () {
        var percentage = 100;
        var height = $(document).height();
        var remove = +height / +100 * +percentage;
        var spaceFromTop = +height - +remove;
        $('html,body').animate({
            scrollTop: spaceFromTop
        }, 'slow', function () {});
    });
    $('#firstBottom').on("click", function () {
        var window_height = $(window).height();
        var document_height = $(document).height();
        $('html,body').animate({
            scrollTop: window_height + document_height
        }, 'slow', function () {});
    });
    $('#secondBottom').on("click", function () {
        var window_height = $(window).height();
        var document_height = $(document).height();
        $('html,body').animate({
            scrollTop: window_height + document_height
        }, 'slow', function () {});
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    $('.scrollToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    menuItems.click(function (e) {
        var href = $(this).attr("href"),
            offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 900);
        e.preventDefault();
    });
    $(window).scroll(function () {
        var fromTop = $(this).scrollTop() + topMenuHeight;
        var cur = scrollItems.map(function () {
            if ($(this).offset().top < fromTop) {
                return this;
            }
        });
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
        if (lastId !== id) {
            lastId = id;
            menuItems.parent().removeClass("active").end().filter("[href=#" + id + "]").parent().addClass("active");
        }
    });
    $('.navbar-nav').on('click', 'li a', function () {
        $('.in').collapse('hide');
    });
    jQuery(window).load(function () {
        $('#status').fadeOut();
        $('#preloader').delay(100).fadeOut('slow');
        $('body').delay(100).css({
            'overflow': 'visible'
        });
    });
    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
});
(function (window) {
    "use strict";

    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function CBPFWTabs(el, options) {
        this.el = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this._init();
    }
    CBPFWTabs.prototype.options = {
        start: 0
    };
    CBPFWTabs.prototype._init = function () {
        this.tabs = [].slice.call(this.el.querySelectorAll('nav > ul > li'));
        this.items = [].slice.call(this.el.querySelectorAll('.content > section'));
        this.current = -1;
        this._show();
        this._initEvents();
    };
    CBPFWTabs.prototype._initEvents = function () {
        var self = this;
        this.tabs.forEach(function (tab, idx) {
            tab.addEventListener('click', function (ev) {
                ev.preventDefault();
                self._show(idx);
            });
        });
    };
    CBPFWTabs.prototype._show = function (idx) {
        if (this.current >= 0) {
            this.tabs[this.current].className = '';
            this.items[this.current].className = '';
        }
        this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
        this.tabs[this.current].className = 'tab-current';
        this.items[this.current].className = 'content-current';
    };
    window.CBPFWTabs = CBPFWTabs;
})(window);
$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;
    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {
        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }
    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
});
$().ready(function () {
    $('[rel="tooltip"]').tooltip();
});

function rotateCard(btn) {
    var $card = $(btn).closest('.card-container');
    console.log($card);
    if ($card.hasClass('hover')) {
        $card.removeClass('hover');
    } else {
        $card.addClass('hover');
    }
}
