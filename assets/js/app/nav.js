/**
 * Created by JeffreyZhang on 13-10-21.
 */
;
(function (window) {

    'use strict';

    // http://stackoverflow.com/a/11381730/989439
    function mobilecheck() {
        var check = false;
        (function (a) {
            if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }

    function NvMenu(el, options) {
        this.el = el;
        this._init();
    }

    NvMenu.prototype = {
        _init: function () {
            this.trigger = this.el.querySelector('a.nv-icon-menu');
            this.triggerWrapper = this.el.querySelector('li.nv-trigger');
            this.menu = this.el.querySelector('nav.nv-menu-wrapper');
            this.isMenuOpen = false;
            this.coverImgB = $('div.as-cover-img-b');
            this.eventtype = mobilecheck() ? 'touchstart' : 'click';
            this._initEvents();

            var self = this;
            this.bodyClickFn = function () {
                self._closeMenu();
                this.removeEventListener(self.eventtype, self.bodyClickFn);
            };
        },
        _initEvents: function () {
            var self = this;

            if (!mobilecheck()) {
                this.trigger.addEventListener('mouseover', function (ev) {
                    self._openIconMenu();
                });
                this.trigger.addEventListener('mouseout', function (ev) {
                    self._closeIconMenu();
                });

                this.menu.addEventListener('mouseover', function (ev) {
                    self._openMenu();
                    document.addEventListener(self.eventtype, self.bodyClickFn);
                });
            }
            this.trigger.addEventListener(this.eventtype, function (ev) {
                ev.stopPropagation();
                ev.preventDefault();
                if (self.isMenuOpen) {
                    self._closeMenu();
                    document.removeEventListener(self.eventtype, self.bodyClickFn);
                }
                else {
                    self._openMenu();
                    document.addEventListener(self.eventtype, self.bodyClickFn);
                }
            });
            this.menu.addEventListener(this.eventtype, function (ev) {
                ev.stopPropagation();
            });
        },
        _openIconMenu: function () {
            $(this.menu).addClass("nv-open-part");
            this.coverImgB.removeClass("transparent");
        },
        _closeIconMenu: function () {
            $(this.menu).removeClass("nv-open-part");
            if (!this.isMenuOpen) this.coverImgB.addClass("transparent");
        },
        _openMenu: function () {
            if (this.isMenuOpen) return;
            $(this.trigger).addClass("nv-selected");
            $(this.triggerWrapper).addClass("nv-selected");
            this.coverImgB.removeClass("transparent");
            this.isMenuOpen = true;
            $(this.menu).addClass("nv-open-all");
            this._closeIconMenu();
        },
        _closeMenu: function () {
            if (!this.isMenuOpen) return;
            $(this.trigger).removeClass("nv-selected");
            $(this.triggerWrapper).removeClass("nv-selected");
            this.coverImgB.addClass("transparent");
            this.isMenuOpen = false;
            $(this.menu).removeClass("nv-open-all");
            this._closeIconMenu();
        }
    };

    // add to global namespace
    window.NvMenu = NvMenu;

})(window);

/*
 * NProgress
 *
 */
/*! NProgress (c) 2013, Rico Sta. Cruz
 *  http://ricostacruz.com/nprogress */

(function (factory) {

    if (typeof module === 'function') {
        module.exports = factory(this.jQuery || require('jquery'));
    } else {
        this.NProgress = factory(this.jQuery);
    }

})(function ($) {
    var NProgress = {};

    NProgress.version = '0.1.2';

    var Settings = NProgress.settings = {
        minimum: 0.08,
        easing: 'ease',
        positionUsing: '',
        speed: 200,
        trickle: true,
        trickleRate: 0.02,
        trickleSpeed: 800,
        showSpinner: true,
        template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
    };

    /**
     * Updates configuration.
     *
     *     NProgress.configure({
   *       minimum: 0.1
   *     });
     */
    NProgress.configure = function (options) {
        $.extend(Settings, options);
        return this;
    };

    /**
     * Last number.
     */

    NProgress.status = null;

    /**
     * Sets the progress bar status, where `n` is a number from `0.0` to `1.0`.
     *
     *     NProgress.set(0.4);
     *     NProgress.set(1.0);
     */

    NProgress.set = function (n) {
        var started = NProgress.isStarted();

        n = clamp(n, Settings.minimum, 1);
        NProgress.status = (n === 1 ? null : n);

        var $progress = NProgress.render(!started),
            $bar = $progress.find('[role="bar"]'),
            speed = Settings.speed,
            ease = Settings.easing;

        $progress[0].offsetWidth;
        /* Repaint */

        $progress.queue(function (next) {
            // Set positionUsing if it hasn't already been set
            if (Settings.positionUsing === '') Settings.positionUsing = NProgress.getPositioningCSS();

            // Add transition
            $bar.css(barPositionCSS(n, speed, ease));

            if (n === 1) {
                // Fade out
                $progress.css({ transition: 'none', opacity: 1 });
                $progress[0].offsetWidth;
                /* Repaint */

                setTimeout(function () {
                    $progress.css({ transition: 'all ' + speed + 'ms linear', opacity: 0 });
                    setTimeout(function () {
                        NProgress.remove();
                        next();
                    }, speed);
                }, speed);
            } else {
                setTimeout(next, speed);
            }
        });

        return this;
    };

    NProgress.isStarted = function () {
        return typeof NProgress.status === 'number';
    };

    /**
     * Shows the progress bar.
     * This is the same as setting the status to 0%, except that it doesn't go backwards.
     *
     *     NProgress.start();
     *
     */
    NProgress.start = function () {
        if (!NProgress.status) NProgress.set(0);

        var work = function () {
            setTimeout(function () {
                if (!NProgress.status) return;
                NProgress.trickle();
                work();
            }, Settings.trickleSpeed);
        };

        if (Settings.trickle) work();

        return this;
    };

    /**
     * Hides the progress bar.
     * This is the *sort of* the same as setting the status to 100%, with the
     * difference being `done()` makes some placebo effect of some realistic motion.
     *
     *     NProgress.done();
     *
     * If `true` is passed, it will show the progress bar even if its hidden.
     *
     *     NProgress.done(true);
     */

    NProgress.done = function (force) {
        if (!force && !NProgress.status) return this;

        return NProgress.inc(0.3 + 0.5 * Math.random()).set(1);
    };

    /**
     * Increments by a random amount.
     */

    NProgress.inc = function (amount) {
        var n = NProgress.status;

        if (!n) {
            return NProgress.start();
        } else {
            if (typeof amount !== 'number') {
                amount = (1 - n) * clamp(Math.random() * n, 0.1, 0.95);
            }

            n = clamp(n + amount, 0, 0.994);
            return NProgress.set(n);
        }
    };

    NProgress.trickle = function () {
        return NProgress.inc(Math.random() * Settings.trickleRate);
    };

    /**
     * (Internal) renders the progress bar markup based on the `template`
     * setting.
     */

    NProgress.render = function (fromStart) {
        if (NProgress.isRendered()) return $("#nprogress");
        $('html').addClass('nprogress-busy');

        var $el = $("<div id='nprogress'>")
            .html(Settings.template);

        var perc = fromStart ? '-100' : toBarPerc(NProgress.status || 0);

        $el.find('[role="bar"]').css({
            transition: 'all 0 linear',
            transform: 'translate3d(' + perc + '%,0,0)'
        });

        if (!Settings.showSpinner)
            $el.find('[role="spinner"]').remove();

        $el.appendTo(document.body);

        return $el;
    };

    /**
     * Removes the element. Opposite of render().
     */

    NProgress.remove = function () {
        $('html').removeClass('nprogress-busy');
        $('#nprogress').remove();
    };

    /**
     * Checks if the progress bar is rendered.
     */

    NProgress.isRendered = function () {
        return ($("#nprogress").length > 0);
    };

    /**
     * Determine which positioning CSS rule to use.
     */

    NProgress.getPositioningCSS = function () {
        // Sniff on document.body.style
        var bodyStyle = document.body.style;

        // Sniff prefixes
        var vendorPrefix = ('WebkitTransform' in bodyStyle) ? 'Webkit' :
            ('MozTransform' in bodyStyle) ? 'Moz' :
                ('msTransform' in bodyStyle) ? 'ms' :
                    ('OTransform' in bodyStyle) ? 'O' : '';

        if (vendorPrefix + 'Perspective' in bodyStyle) {
            // Modern browsers with 3D support, e.g. Webkit, IE10
            return 'translate3d';
        } else if (vendorPrefix + 'Transform' in bodyStyle) {
            // Browsers without 3D support, e.g. IE9
            return 'translate';
        } else {
            // Browsers without translate() support, e.g. IE7-8
            return 'margin';
        }
    };

    /**
     * Helpers
     */

    function clamp(n, min, max) {
        if (n < min) return min;
        if (n > max) return max;
        return n;
    }

    /**
     * (Internal) converts a percentage (`0..1`) to a bar translateX
     * percentage (`-100%..0%`).
     */

    function toBarPerc(n) {
        return (-1 + n) * 100;
    }


    /**
     * (Internal) returns the correct CSS for changing the bar's
     * position given an n percentage, and speed and ease from Settings
     */

    function barPositionCSS(n, speed, ease) {
        var barCSS;

        if (Settings.positionUsing === 'translate3d') {
            barCSS = { transform: 'translate3d(' + toBarPerc(n) + '%,0,0)' };
        } else if (Settings.positionUsing === 'translate') {
            barCSS = { transform: 'translate(' + toBarPerc(n) + '%,0)' };
        } else {
            barCSS = { 'margin-left': toBarPerc(n) + '%' };
        }

        barCSS.transition = 'all ' + speed + 'ms ' + ease;

        return barCSS;
    }

    return NProgress;
});

(function ($) {

    "use strict";

    $.redir = function (elements, index, options) {
        var defaults = {},
            plugin = this,
            target = $(document).find("#wd-main"),
            settings = {},
            $elements = $(elements);

        plugin.init = function () {
            plugin.settings = $.extend({}, defaults, options);
            mainHandler(index);
        };

        var mainHandler = function (index) {
            if ($elements.length <= 0) {
                return;
            }
            $elements.on("click", function (e) {
                NProgress.start();
                e.preventDefault();
                if (history && history.pushState) {
                    history.pushState(null, document.title, "/" + $(this).attr("data-redir") + "/");
                }
                else {
                    window.location.hash = "!" + $(this).attr("data-redir");
                }
                $.ajax({
                    type: "POST",
                    url: "/a/" + $(this).attr("data-redir") + "/",
                    dataType: "html",
                    data: {},
                    success: function (response) {
                        $(target).html(response);
                        NProgress.done();
                    }
                });
            });
        };

        plugin.init();
    };

    $.fn.redir = function (index, options) {
        return this.each(function () {
            if (undefined != $(this).data('redir')) {
                var plugin = new $.redir(this, index, options);
                $(this).data('redir', plugin);
            }
        });
    };

})(jQuery);

$(document).ready(function () {

    "use strict";

    var target = $(document).find("#wd-main");
    if (history && history.pushState) {
        var loaded = false;
        $(window).bind("popstate", function () {
            console.log("window bind called");
            if (!loaded) {
                loaded = true;
            } else {
                NProgress.start();
                $.post("/a/" + location.href.replace(/\w+:\/\/[A-Za-z0-9:.]+\/(\w+)/,"$1"), {}, function(response) {
                    $(target).html(response);
                    NProgress.done();
                });
            }
        });
    } else {
        if (window.location.hash.length) {
            NProgress.start();
            $.ajax({
                type: "POST",
                url: "/a/" + window.location.hash.replace("#!", "") + "/",
                dataType: "html",
                data: {},
                success: function (response) {
                    $(target).html(response);
                    NProgress.done();
                }
            });
        }
    }
});
