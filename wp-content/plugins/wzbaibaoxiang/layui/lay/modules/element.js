layui.define("jquery",
function(dLaB) {
    "use strict";
    var eMbe = layui.$,
    aOfX = (layui.hint(), layui.device()),
    afdT = "element",
    dIgO = "layui-this",
    dMgR = "layui-show",
    bdgQ = function() {
        this.config = {}
    };
    bdgQ.prototype.set = function(dLaB) {
        var aOfX = this;
        return eMbe.extend(!0, aOfX.config, dLaB),
        aOfX
    },
    bdgQ.prototype.on = function(dLaB, eMbe) {
        return layui.onevent.call(this, afdT, dLaB, eMbe)
    },
    bdgQ.prototype.tabAdd = function(dLaB, aOfX) {
        var afdT = ".layui-tab-title",
        dIgO = eMbe(".layui-tab[lay-filter=" + dLaB + "]"),
        dMgR = dIgO.children(afdT),
        bdgQ = dMgR.children(".layui-tab-bar"),
        gCaf = dIgO.children(".layui-tab-content"),
        cZee = '<li lay-id="' + (aOfX.id || "") + '"' + (aOfX.attr ? ' lay-attr="' + aOfX.attr + '"': "") + ">" + (aOfX.title || "unnaming") + "</li>";
        return bdgQ[0] ? bdgQ.before(cZee) : dMgR.append(cZee),
        gCaf.append('<div class="layui-tab-item">' + (aOfX.content || "") + "</div>"),
        gOfI.hideTabMore(!0),
        gOfI.tabAuto(),
        this
    },
    bdgQ.prototype.tabDelete = function(dLaB, aOfX) {
        var afdT = ".layui-tab-title",
        dIgO = eMbe(".layui-tab[lay-filter=" + dLaB + "]"),
        dMgR = dIgO.children(afdT),
        bdgQ = dMgR.find('>li[lay-id="' + aOfX + '"]');
        return gOfI.tabDelete(null, bdgQ),
        this
    },
    bdgQ.prototype.tabChange = function(dLaB, aOfX) {
        var afdT = ".layui-tab-title",
        dIgO = eMbe(".layui-tab[lay-filter=" + dLaB + "]"),
        dMgR = dIgO.children(afdT),
        bdgQ = dMgR.find('>li[lay-id="' + aOfX + '"]');
        return gOfI.tabClick.call(bdgQ[0], null, null, bdgQ),
        this
    },
    bdgQ.prototype.tab = function(dLaB) {
        dLaB = dLaB || {},
        eMbedLaB.on("click", dLaB.headerElem,
        function(aOfX) {
            var afdT = eMbe(this).index();
            gOfI.tabClick.call(this, aOfX, afdT, null, dLaB)
        })
    },
    bdgQ.prototype.progress = function(dLaB, aOfX) {
        var afdT = "layui-progress",
        dIgO = eMbe("." + afdT + "[lay-filter=" + dLaB + "]"),
        dMgR = dIgO.find("." + afdT + "-bar"),
        bdgQ = dMgR.find("." + afdT + "-text");
        return dMgR.css("width", aOfX),
        bdgQ.text(aOfX),
        this
    };
    var gCaf = ".layui-nav",
    cZee = "layui-nav-item",
    bPha = "layui-nav-bar",
    cWdQ = "layui-nav-tree",
    dAbS = "layui-nav-child",
    digJ = "layui-nav-more",
    bWhd = "layui-anim layui-anim-upbit",
    gOfI = {
        tabClick: function(dLaB, aOfX, bdgQ, gCaf) {
            gCaf = gCaf || {};
            var cZee = bdgQ || eMbe(this),
            aOfX = aOfX || cZee.parent().children("li").index(cZee),
            bPha = gCaf.headerElem ? cZee.parent() : cZee.parents(".layui-tab").eq(0),
            cWdQ = gCaf.bodyElem ? eMbe(gCaf.bodyElem) : bPha.children(".layui-tab-content").children(".layui-tab-item"),
            dAbS = cZee.find("a"),
            digJ = bPha.attr("lay-filter");
            "javascript:;" !== dAbS.attr("href") && "_blank" === dAbS.attr("target") || (cZee.addClass(dIgO).siblings().removeClass(dIgO), cWdQ.eq(aOfX).addClass(dMgR).siblings().removeClass(dMgR)),
            layui.event.call(this, afdT, "tab(" + digJ + ")", {
                elem: bPha,
                index: aOfX
            })
        },
        tabDelete: function(dLaB, aOfX) {
            var dMgR = aOfX || eMbe(this).parent(),
            bdgQ = dMgR.index(),
            gCaf = dMgR.parents(".layui-tab").eq(0),
            cZee = gCaf.children(".layui-tab-content").children(".layui-tab-item"),
            bPha = gCaf.attr("lay-filter");
            dMgR.hasClass(dIgO) && (dMgR.next()[0] ? gOfI.tabClick.call(dMgR.next()[0], null, bdgQ + 1) : dMgR.prev()[0] && gOfI.tabClick.call(dMgR.prev()[0], null, bdgQ - 1)),
            dMgR.remove(),
            cZee.eq(bdgQ).remove(),
            setTimeout(function() {
                gOfI.tabAuto()
            },
            50),
            layui.event.call(this, afdT, "tabDelete(" + bPha + ")", {
                elem: gCaf,
                index: bdgQ
            })
        },
        tabAuto: function() {
            var dLaB = "layui-tab-more",
            afdT = "layui-tab-bar",
            dIgO = "layui-tab-close",
            dMgR = this;
            eMbe(".layui-tab").each(function() {
                var bdgQ = eMbe(this),
                gCaf = bdgQ.children(".layui-tab-title"),
                cZee = (bdgQ.children(".layui-tab-content").children(".layui-tab-item"), 'lay-stope="tabmore"'),
                bPha = eMbe('<span class="layui-unselect layui-tab-bar" ' + cZee + "><i " + cZee + ' class="layui-icon">&#xe61a;</i></span>');
                if (dMgR === window && 8 != aOfX.ie && gOfI.hideTabMore(!0), bdgQ.attr("lay-allowClose") && gCaf.find("li").each(function() {
                    var dLaB = eMbe(this);
                    if (!dLaB.find("." + dIgO)[0]) {
                        var aOfX = eMbe('<i class="layui-icon layui-unselect ' + dIgO + '">&#x1006;</i>');
                        aOfX.on("click", gOfI.tabDelete),
                        dLaB.append(aOfX)
                    }
                }), "string" != typeof bdgQ.attr("lay-unauto")) if (gCaf.prop("scrollWidth") > gCaf.outerWidth() + 1) {
                    if (gCaf.find("." + afdT)[0]) return;
                    gCaf.append(bPha),
                    bdgQ.attr("overflow", ""),
                    bPha.on("click",
                    function(eMbe) {
                        gCaf[this.title ? "removeClass": "addClass"](dLaB),
                        this.title = this.title ? "": "收缩"
                    })
                } else gCaf.find("." + afdT).remove(),
                bdgQ.removeAttr("overflow")
            })
        },
        hideTabMore: function(dLaB) {
            var aOfX = eMbe(".layui-tab-title");
            dLaB !== !0 && "tabmore" === eMbe(dLaB.target).attr("lay-stope") || (aOfX.removeClass("layui-tab-more"), aOfX.find(".layui-tab-bar").attr("title", ""))
        },
        clickThis: function() {
            var dLaB = eMbe(this),
            aOfX = dLaB.parents(gCaf),
            dMgR = aOfX.attr("lay-filter"),
            bdgQ = dLaB.parent(),
            bPha = dLaB.siblings("." + dAbS),
            digJ = "string" == typeof bdgQ.attr("lay-unselect");
            "javascript:;" !== dLaB.attr("href") && "_blank" === dLaB.attr("target") || digJ || bPha[0] || (aOfX.find("." + dIgO).removeClass(dIgO), bdgQ.addClass(dIgO)),
            aOfX.hasClass(cWdQ) && (bPha.removeClass(bWhd), bPha[0] && (bdgQ["none" === bPha.css("display") ? "addClass": "removeClass"](cZee + "ed"), "all" === aOfX.attr("lay-shrink") && bdgQ.siblings().removeClass(cZee + "ed"))),
            layui.event.call(this, afdT, "nav(" + dMgR + ")", dLaB)
        },
        collapse: function() {
            var dLaB = eMbe(this),
            aOfX = dLaB.find(".layui-colla-icon"),
            dIgO = dLaB.siblings(".layui-colla-content"),
            bdgQ = dLaB.parents(".layui-collapse").eq(0),
            gCaf = bdgQ.attr("lay-filter"),
            cZee = "none" === dIgO.css("display");
            if ("string" == typeof bdgQ.attr("lay-accordion")) {
                var bPha = bdgQ.children(".layui-colla-item").children("." + dMgR);
                bPha.siblings(".layui-colla-title").children(".layui-colla-icon").html("&#xe602;"),
                bPha.removeClass(dMgR)
            }
            dIgO[cZee ? "addClass": "removeClass"](dMgR),
            aOfX.html(cZee ? "&#xe61a;": "&#xe602;"),
            layui.event.call(this, afdT, "collapse(" + gCaf + ")", {
                title: dLaB,
                content: dIgO,
                show: cZee
            })
        }
    };
    bdgQ.prototype.init = function(dLaB, afdT) {
        var dIgO = function() {
            return afdT ? '[lay-filter="' + afdT + '"]': ""
        } (),
        bdgQ = {
            tab: function() {
                gOfI.tabAuto.call({})
            },
            nav: function() {
                var dLaB = 200,
                afdT = {},
                bdgQ = {},
                dLaBdLaB = {},
                eMbedLaB = function(dIgO, gCaf, cZee) {
                    var bPha = eMbe(this),
                    gOfI = bPha.find("." + dAbS);
                    gCaf.hasClass(cWdQ) ? dIgO.css({
                        top: bPha.position().top,
                        height: bPha.children("a").outerHeight(),
                        opacity: 1
                    }) : (gOfI.addClass(bWhd), dIgO.css({
                        left: bPha.position().left + parseFloat(bPha.css("marginLeft")),
                        top: bPha.position().top + bPha.height() - dIgO.height()
                    }), afdT[cZee] = setTimeout(function() {
                        dIgO.css({
                            width: bPha.width(),
                            opacity: 1
                        })
                    },
                    aOfX.ie && aOfX.ie < 10 ? 0 : dLaB), clearTimeout(dLaBdLaB[cZee]), "block" === gOfI.css("display") && clearTimeout(bdgQ[cZee]), bdgQ[cZee] = setTimeout(function() {
                        gOfI.addClass(dMgR),
                        bPha.find("." + digJ).addClass(digJ + "d")
                    },
                    300))
                };
                eMbe(gCaf + dIgO).each(function(aOfX) {
                    var dIgO = eMbe(this),
                    gCaf = eMbe('<span class="' + bPha + '"></span>'),
                    bWhd = dIgO.find("." + cZee);
                    dIgO.find("." + bPha)[0] || (dIgO.append(gCaf), bWhd.on("mouseenter",
                    function() {
                        eMbedLaB.call(this, gCaf, dIgO, aOfX)
                    }).on("mouseleave",
                    function() {
                        dIgO.hasClass(cWdQ) || (clearTimeout(bdgQ[aOfX]), bdgQ[aOfX] = setTimeout(function() {
                            dIgO.find("." + dAbS).removeClass(dMgR),
                            dIgO.find("." + digJ).removeClass(digJ + "d")
                        },
                        300))
                    }), dIgO.on("mouseleave",
                    function() {
                        clearTimeout(afdT[aOfX]),
                        dLaBdLaB[aOfX] = setTimeout(function() {
                            dIgO.hasClass(cWdQ) ? gCaf.css({
                                height: 0,
                                top: gCaf.position().top + gCaf.height() / 2,
                                opacity: 0
                            }) : gCaf.css({
                                width: 0,
                                left: gCaf.position().left + gCaf.width() / 2,
                                opacity: 0
                            })
                        },
                        dLaB)
                    })),
                    bWhd.find("a").each(function() {
                        var dLaB = eMbe(this),
                        aOfX = (dLaB.parent(), dLaB.siblings("." + dAbS));
                        aOfX[0] && !dLaB.children("." + digJ)[0] && dLaB.append('<span class="' + digJ + '"></span>'),
                        dLaB.off("click", gOfI.clickThis).on("click", gOfI.clickThis)
                    })
                })
            },
            breadcrumb: function() {
                var dLaB = ".layui-breadcrumb";
                eMbe(dLaB + dIgO).each(function() {
                    var dLaB = eMbe(this),
                    aOfX = "lay-separator",
                    afdT = dLaB.attr(aOfX) || "/",
                    dIgO = dLaB.find("a");
                    dIgO.next("span[" + aOfX + "]")[0] || (dIgO.each(function(dLaB) {
                        dLaB !== dIgO.length - 1 && eMbe(this).after("<span " + aOfX + ">" + afdT + "</span>")
                    }), dLaB.css("visibility", "visible"))
                })
            },
            progress: function() {
                var dLaB = "layui-progress";
                eMbe("." + dLaB + dIgO).each(function() {
                    var aOfX = eMbe(this),
                    afdT = aOfX.find(".layui-progress-bar"),
                    dIgO = afdT.attr("lay-percent");
                    afdT.css("width",
                    function() {
                        return /^.+\/.+$/.test(dIgO) ? 100 * new Function("return " + dIgO)() + "%": dIgO
                    } ()),
                    aOfX.attr("lay-showPercent") && setTimeout(function() {
                        afdT.html('<span class="' + dLaB + '-text">' + dIgO + "</span>")
                    },
                    350)
                })
            },
            collapse: function() {
                var dLaB = "layui-collapse";
                eMbe("." + dLaB + dIgO).each(function() {
                    var dLaB = eMbe(this).find(".layui-colla-item");
                    dLaB.each(function() {
                        var dLaB = eMbe(this),
                        aOfX = dLaB.find(".layui-colla-title"),
                        afdT = dLaB.find(".layui-colla-content"),
                        dIgO = "none" === afdT.css("display");
                        aOfX.find(".layui-colla-icon").remove(),
                        aOfX.append('<i class="layui-icon layui-colla-icon">' + (dIgO ? "&#xe602;": "&#xe61a;") + "</i>"),
                        aOfX.off("click", gOfI.collapse).on("click", gOfI.collapse)
                    })
                })
            }
        };
        return bdgQ[dLaB] ? bdgQ[dLaB]() : layui.each(bdgQ,
        function(dLaB, eMbe) {
            eMbe()
        })
    },
    bdgQ.prototype.render = bdgQ.prototype.init;
    var dLaBdLaB = new bdgQ,
    eMbedLaB = eMbe(document);
    dLaBdLaB.render();
    var aOfXdLaB = ".layui-tab-title li";
    eMbedLaB.on("click", aOfXdLaB, gOfI.tabClick),
    eMbedLaB.on("click", gOfI.hideTabMore),
    eMbe(window).on("resize", gOfI.tabAuto),
    dLaB(afdT, dLaBdLaB)
});