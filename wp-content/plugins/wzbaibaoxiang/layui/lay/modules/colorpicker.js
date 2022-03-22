layui.define("jquery",
function(dZ) {
    "use strict";
    var ah = layui.jquery,
    aD = {
        config: {},
        index: layui.colorpicker ? layui.colorpicker.index + 1e4: 0,
        set: function(dZ) {
            var aD = this;
            return aD.config = ah.extend({},
            aD.config, dZ),
            aD
        },
        on: function(dZ, ah) {
            return layui.onevent.call(this, "colorpicker", dZ, ah)
        }
    },
    eG = function() {
        var dZ = this,
        ah = dZ.config;
        return {
            config: ah
        }
    },
    fB = "colorpicker",
    fK = "layui-show",
    aB = "layui-colorpicker",
    dS = ".layui-colorpicker-main",
    aA = "layui-icon-down",
    aH = "layui-icon-close",
    bd = "layui-colorpicker-trigger-span",
    fI = "layui-colorpicker-trigger-i",
    eb = "layui-colorpicker-side",
    dI = "layui-colorpicker-side-slider",
    bB = "layui-colorpicker-basis",
    aW = "layui-colorpicker-alpha-bgcolor",
    fb = "layui-colorpicker-alpha-slider",
    gX = "layui-colorpicker-basis-cursor",
    fX = "layui-colorpicker-main-input",
    ai = function(dZ) {
        var ah = {
            h: 0,
            s: 0,
            b: 0
        },
        aD = Math.min(dZ.r, dZ.g, dZ.b),
        eG = Math.max(dZ.r, dZ.g, dZ.b),
        fB = eG - aD;
        return ah.b = eG,
        ah.s = 0 != eG ? 255 * fB / eG: 0,
        0 != ah.s ? dZ.r == eG ? ah.h = (dZ.g - dZ.b) / fB: dZ.g == eG ? ah.h = 2 + (dZ.b - dZ.r) / fB: ah.h = 4 + (dZ.r - dZ.g) / fB: ah.h = -1,
        eG == aD && (ah.h = 0),
        ah.h *= 60,
        ah.h < 0 && (ah.h += 360),
        ah.s *= 100 / 255,
        ah.b *= 100 / 255,
        ah
    },
    ba = function(dZ) {
        var dZ = dZ.indexOf("#") > -1 ? dZ.substring(1) : dZ;
        if (3 == dZ.length) {
            var ah = dZ.split("");
            dZ = ah[0] + ah[0] + ah[1] + ah[1] + ah[2] + ah[2]
        }
        dZ = parseInt(dZ, 16);
        var aD = {
            r: dZ >> 16,
            g: (65280 & dZ) >> 8,
            b: 255 & dZ
        };
        return ai(aD)
    },
    dA = function(dZ) {
        var ah = {},
        aD = dZ.h,
        eG = 255 * dZ.s / 100,
        fB = 255 * dZ.b / 100;
        if (0 == eG) ah.r = ah.g = ah.b = fB;
        else {
            var fK = fB,
            aB = (255 - eG) * fB / 255,
            dS = (fK - aB) * (aD % 60) / 60;
            360 == aD && (aD = 0),
            aD < 60 ? (ah.r = fK, ah.b = aB, ah.g = aB + dS) : aD < 120 ? (ah.g = fK, ah.b = aB, ah.r = fK - dS) : aD < 180 ? (ah.g = fK, ah.r = aB, ah.b = aB + dS) : aD < 240 ? (ah.b = fK, ah.r = aB, ah.g = fK - dS) : aD < 300 ? (ah.b = fK, ah.g = aB, ah.r = aB + dS) : aD < 360 ? (ah.r = fK, ah.g = aB, ah.b = fK - dS) : (ah.r = 0, ah.g = 0, ah.b = 0)
        }
        return {
            r: Math.round(ah.r),
            g: Math.round(ah.g),
            b: Math.round(ah.b)
        }
    },
    bU = function(dZ) {
        var aD = dA(dZ),
        eG = [aD.r.toString(16), aD.g.toString(16), aD.b.toString(16)];
        return ah.each(eG,
        function(dZ, ah) {
            1 == ah.length && (eG[dZ] = "0" + ah)
        }),
        eG.join("")
    },
    bA = function(dZ) {
        var ah = /[0-9]{1,3}/g,
        aD = dZ.match(ah) || [];
        return {
            r: aD[0],
            g: aD[1],
            b: aD[2]
        }
    },
    ae = ah(window),
    fd = ah(document),
    ef = function(dZ) {
        var eG = this;
        eG.index = ++aD.index,
        eG.config = ah.extend({},
        eG.config, aD.config, dZ),
        eG.render()
    };
    ef.prototype.config = {
        color: "",
        size: null,
        alpha: !1,
        format: "hex",
        predefine: !1,
        colors: ["#009688", "#5FB878", "#1E9FFF", "#FF5722", "#FFB800", "#01AAED", "#999", "#c00", "#ff8c00", "#ffd700", "#90ee90", "#00ced1", "#1e90ff", "#c71585", "rgb(0, 186, 189)", "rgb(255, 120, 0)", "rgb(250, 212, 0)", "#393D49", "rgba(0,0,0,.5)", "rgba(255, 69, 0, 0.68)", "rgba(144, 240, 144, 0.5)", "rgba(31, 147, 255, 0.73)"]
    },
    ef.prototype.render = function() {
        var dZ = this,
        aD = dZ.config,
        eG = ah(['<div class="layui-unselect layui-colorpicker">', "<span " + ("rgb" == aD.format && aD.alpha ? 'class="layui-colorpicker-trigger-bgcolor"': "") + ">", '<span class="layui-colorpicker-trigger-span" ', 'lay-type="' + ("rgb" == aD.format ? aD.alpha ? "rgba": "torgb": "") + '" ', 'style="' +
        function() {
            var dZ = "";
            return aD.color ? (dZ = aD.color, (aD.color.match(/[0-9]{1,3}/g) || []).length > 3 && (aD.alpha && "rgb" == aD.format || (dZ = "#" + bU(ai(bA(aD.color))))), "background: " + dZ) : dZ
        } () + '">', '<i class="layui-icon layui-colorpicker-trigger-i ' + (aD.color ? aA: aH) + '"></i>', "</span>", "</span>", "</div>"].join("")),
        fB = ah(aD.elem);
        aD.size && eG.addClass("layui-colorpicker-" + aD.size),
        fB.addClass("layui-inline").html(dZ.elemColorBox = eG),
        dZ.color = dZ.elemColorBox.find("." + bd)[0].style.background,
        dZ.events()
    },
    ef.prototype.renderPicker = function() {
        var dZ = this,
        aD = dZ.config,
        eG = dZ.elemColorBox[0],
        fB = dZ.elemPicker = ah(['<div id="layui-colorpicker' + dZ.index + '" data-index="' + dZ.index + '" class="layui-anim layui-anim-upbit layui-colorpicker-main">', '<div class="layui-colorpicker-main-wrapper">', '<div class="layui-colorpicker-basis">', '<div class="layui-colorpicker-basis-white"></div>', '<div class="layui-colorpicker-basis-black"></div>', '<div class="layui-colorpicker-basis-cursor"></div>', "</div>", '<div class="layui-colorpicker-side">', '<div class="layui-colorpicker-side-slider"></div>', "</div>", "</div>", '<div class="layui-colorpicker-main-alpha ' + (aD.alpha ? fK: "") + '">', '<div class="layui-colorpicker-alpha-bgcolor">', '<div class="layui-colorpicker-alpha-slider"></div>', "</div>", "</div>",
        function() {
            if (aD.predefine) {
                var dZ = ['<div class="layui-colorpicker-main-pre">'];
                return layui.each(aD.colors,
                function(ah, aD) {
                    dZ.push(['<div class="layui-colorpicker-pre' + ((aD.match(/[0-9]{1,3}/g) || []).length > 3 ? " layui-colorpicker-pre-isalpha": "") + '">', '<div style="background:' + aD + '"></div>', "</div>"].join(""))
                }),
                dZ.push("</div>"),
                dZ.join("")
            }
            return ""
        } (), '<div class="layui-colorpicker-main-input">', '<div class="layui-inline">', '<input type="text" class="layui-input">', "</div>", '<div class="layui-btn-container">', '<button class="layui-btn layui-btn-primary layui-btn-sm" colorpicker-events="clear">清空</button>', '<button class="layui-btn layui-btn-sm" colorpicker-events="confirm">确定</button>', "</div", "</div>", "</div>"].join(""));
        dZ.elemColorBox.find("." + bd)[0];
        ah(dS)[0] && ah(dS).data("index") == dZ.index ? dZ.removePicker(ef.thisElemInd) : (dZ.removePicker(ef.thisElemInd), ah("body").append(fB)),
        ef.thisElemInd = dZ.index,
        ef.thisColor = eG.style.background,
        dZ.position(),
        dZ.pickerEvents()
    },
    ef.prototype.removePicker = function(dZ) {
        var aD = this;
        aD.config;
        return ah("#layui-colorpicker" + (dZ || aD.index)).remove(),
        aD
    },
    ef.prototype.position = function() {
        var dZ = this,
        ah = dZ.config,
        aD = dZ.bindElem || dZ.elemColorBox[0],
        eG = dZ.elemPicker[0],
        fB = aD.getBoundingClientRect(),
        fK = eG.offsetWidth,
        aB = eG.offsetHeight,
        dS = function(dZ) {
            return dZ = dZ ? "scrollLeft": "scrollTop",
            document.body[dZ] | document.documentElement[dZ]
        },
        aA = function(dZ) {
            return document.documentElement[dZ ? "clientWidth": "clientHeight"]
        },
        aH = 5,
        bd = fB.left,
        fI = fB.bottom;
        bd -= (fK - aD.offsetWidth) / 2,
        fI += aH,
        bd + fK + aH > aA("width") ? bd = aA("width") - fK - aH: bd < aH && (bd = aH),
        fI + aB + aH > aA() && (fI = fB.top > aB ? fB.top - aB: aA() - aB, fI -= 2 * aH),
        ah.position && (eG.style.position = ah.position),
        eG.style.left = bd + ("fixed" === ah.position ? 0 : dS(1)) + "px",
        eG.style.top = fI + ("fixed" === ah.position ? 0 : dS()) + "px"
    },
    ef.prototype.val = function() {
        var dZ = this,
        ah = (dZ.config, dZ.elemColorBox.find("." + bd)),
        aD = dZ.elemPicker.find("." + fX),
        eG = ah[0],
        fB = eG.style.backgroundColor;
        if (fB) {
            var fK = ai(bA(fB)),
            aB = ah.attr("lay-type");
            if (dZ.select(fK.h, fK.s, fK.b), "torgb" === aB && aD.find("input").val(fB), "rgba" === aB) {
                var dS = bA(fB);
                if (3 == (fB.match(/[0-9]{1,3}/g) || []).length) aD.find("input").val("rgba(" + dS.r + ", " + dS.g + ", " + dS.b + ", 1)"),
                dZ.elemPicker.find("." + fb).css("left", 280);
                else {
                    aD.find("input").val(fB);
                    var aA = 280 * fB.slice(fB.lastIndexOf(",") + 1, fB.length - 1);
                    dZ.elemPicker.find("." + fb).css("left", aA)
                }
                dZ.elemPicker.find("." + aW)[0].style.background = "linear-gradient(to right, rgba(" + dS.r + ", " + dS.g + ", " + dS.b + ", 0), rgb(" + dS.r + ", " + dS.g + ", " + dS.b + "))"
            }
        } else dZ.select(0, 100, 100),
        aD.find("input").val(""),
        dZ.elemPicker.find("." + aW)[0].style.background = "",
        dZ.elemPicker.find("." + fb).css("left", 280)
    },
    ef.prototype.side = function() {
        var dZ = this,
        aD = dZ.config,
        eG = dZ.elemColorBox.find("." + bd),
        fB = eG.attr("lay-type"),
        fK = dZ.elemPicker.find("." + eb),
        aB = dZ.elemPicker.find("." + dI),
        dS = dZ.elemPicker.find("." + bB),
        ba = dZ.elemPicker.find("." + gX),
        bU = dZ.elemPicker.find("." + aW),
        fd = dZ.elemPicker.find("." + fb),
        ef = aB[0].offsetTop / 180 * 360,
        cG = 100 - (ba[0].offsetTop + 3) / 180 * 100,
        _ = (ba[0].offsetLeft + 3) / 260 * 100,
        dZdZ = Math.round(fd[0].offsetLeft / 280 * 100) / 100,
        ahdZ = dZ.elemColorBox.find("." + fI),
        aDdZ = dZ.elemPicker.find(".layui-colorpicker-pre").children("div"),
        eGdZ = function(ah, fK, aB, dS) {
            dZ.select(ah, fK, aB);
            var bd = dA({
                h: ah,
                s: fK,
                b: aB
            });
            if (ahdZ.addClass(aA).removeClass(aH), eG[0].style.background = "rgb(" + bd.r + ", " + bd.g + ", " + bd.b + ")", "torgb" === fB && dZ.elemPicker.find("." + fX).find("input").val("rgb(" + bd.r + ", " + bd.g + ", " + bd.b + ")"), "rgba" === fB) {
                var fI = 0;
                fI = 280 * dS,
                fd.css("left", fI),
                dZ.elemPicker.find("." + fX).find("input").val("rgba(" + bd.r + ", " + bd.g + ", " + bd.b + ", " + dS + ")"),
                eG[0].style.background = "rgba(" + bd.r + ", " + bd.g + ", " + bd.b + ", " + dS + ")",
                bU[0].style.background = "linear-gradient(to right, rgba(" + bd.r + ", " + bd.g + ", " + bd.b + ", 0), rgb(" + bd.r + ", " + bd.g + ", " + bd.b + "))"
            }
            aD.change && aD.change(dZ.elemPicker.find("." + fX).find("input").val())
        },
        fBdZ = ah(['<div class="layui-auxiliar-moving" id="LAY-colorpicker-moving"></div'].join("")),
        fKdZ = function(dZ) {
            ah("#LAY-colorpicker-moving")[0] || ah("body").append(fBdZ),
            fBdZ.on("mousemove", dZ),
            fBdZ.on("mouseup",
            function() {
                fBdZ.remove()
            }).on("mouseleave",
            function() {
                fBdZ.remove()
            })
        };
        aB.on("mousedown",
        function(dZ) {
            var ah = this.offsetTop,
            aD = dZ.clientY,
            eG = function(dZ) {
                var eG = ah + (dZ.clientY - aD),
                fB = fK[0].offsetHeight;
                eG < 0 && (eG = 0),
                eG > fB && (eG = fB);
                var aB = eG / 180 * 360;
                ef = aB,
                eGdZ(aB, _, cG, dZdZ),
                dZ.preventDefault()
            };
            fKdZ(eG),
            dZ.preventDefault()
        }),
        fK.on("click",
        function(dZ) {
            var aD = dZ.clientY - ah(this).offset().top;
            aD < 0 && (aD = 0),
            aD > this.offsetHeight && (aD = this.offsetHeight);
            var eG = aD / 180 * 360;
            ef = eG,
            eGdZ(eG, _, cG, dZdZ),
            dZ.preventDefault()
        }),
        ba.on("mousedown",
        function(dZ) {
            var ah = this.offsetTop,
            aD = this.offsetLeft,
            eG = dZ.clientY,
            fB = dZ.clientX,
            fK = function(dZ) {
                var fK = ah + (dZ.clientY - eG),
                aB = aD + (dZ.clientX - fB),
                aA = dS[0].offsetHeight - 3,
                aH = dS[0].offsetWidth - 3;
                fK < -3 && (fK = -3),
                fK > aA && (fK = aA),
                aB < -3 && (aB = -3),
                aB > aH && (aB = aH);
                var bd = (aB + 3) / 260 * 100,
                fI = 100 - (fK + 3) / 180 * 100;
                cG = fI,
                _ = bd,
                eGdZ(ef, bd, fI, dZdZ),
                dZ.preventDefault()
            };
            layui.stope(dZ),
            fKdZ(fK),
            dZ.preventDefault()
        }),
        dS.on("mousedown",
        function(dZ) {
            var aD = dZ.clientY - ah(this).offset().top - 3 + ae.scrollTop(),
            eG = dZ.clientX - ah(this).offset().left - 3 + ae.scrollLeft();
            aD < -3 && (aD = -3),
            aD > this.offsetHeight - 3 && (aD = this.offsetHeight - 3),
            eG < -3 && (eG = -3),
            eG > this.offsetWidth - 3 && (eG = this.offsetWidth - 3);
            var fB = (eG + 3) / 260 * 100,
            fK = 100 - (aD + 3) / 180 * 100;
            cG = fK,
            _ = fB,
            eGdZ(ef, fB, fK, dZdZ),
            dZ.preventDefault(),
            ba.trigger(dZ, "mousedown")
        }),
        fd.on("mousedown",
        function(dZ) {
            var ah = this.offsetLeft,
            aD = dZ.clientX,
            eG = function(dZ) {
                var eG = ah + (dZ.clientX - aD),
                fB = bU[0].offsetWidth;
                eG < 0 && (eG = 0),
                eG > fB && (eG = fB);
                var fK = Math.round(eG / 280 * 100) / 100;
                dZdZ = fK,
                eGdZ(ef, _, cG, fK),
                dZ.preventDefault()
            };
            fKdZ(eG),
            dZ.preventDefault()
        }),
        bU.on("click",
        function(dZ) {
            var aD = dZ.clientX - ah(this).offset().left;
            aD < 0 && (aD = 0),
            aD > this.offsetWidth && (aD = this.offsetWidth);
            var eG = Math.round(aD / 280 * 100) / 100;
            dZdZ = eG,
            eGdZ(ef, _, cG, eG),
            dZ.preventDefault()
        }),
        aDdZ.each(function() {
            ah(this).on("click",
            function() {
                ah(this).parent(".layui-colorpicker-pre").addClass("selected").siblings().removeClass("selected");
                var dZ, aD = this.style.backgroundColor,
                eG = ai(bA(aD)),
                fB = aD.slice(aD.lastIndexOf(",") + 1, aD.length - 1);
                ef = eG.h,
                _ = eG.s,
                cG = eG.b,
                3 == (aD.match(/[0-9]{1,3}/g) || []).length && (fB = 1),
                dZdZ = fB,
                dZ = 280 * fB,
                eGdZ(eG.h, eG.s, eG.b, fB)
            })
        })
    },
    ef.prototype.select = function(dZ, ah, aD, eG) {
        var fB = this,
        fK = (fB.config, bU({
            h: dZ,
            s: 100,
            b: 100
        })),
        aB = bU({
            h: dZ,
            s: ah,
            b: aD
        }),
        dS = dZ / 360 * 180,
        aA = 180 - aD / 100 * 180 - 3,
        aH = ah / 100 * 260 - 3;
        fB.elemPicker.find("." + dI).css("top", dS),
        fB.elemPicker.find("." + bB)[0].style.background = "#" + fK,
        fB.elemPicker.find("." + gX).css({
            top: aA,
            left: aH
        }),
        "change" !== eG && fB.elemPicker.find("." + fX).find("input").val("#" + aB)
    },
    ef.prototype.pickerEvents = function() {
        var dZ = this,
        aD = dZ.config,
        eG = dZ.elemColorBox.find("." + bd),
        fB = dZ.elemPicker.find("." + fX + " input"),
        fK = {
            clear: function(ah) {
                eG[0].style.background = "",
                dZ.elemColorBox.find("." + fI).removeClass(aA).addClass(aH),
                dZ.color = "",
                aD.done && aD.done(""),
                dZ.removePicker()
            },
            confirm: function(ah, fK) {
                var aB = fB.val(),
                dS = aB,
                bd = {};
                if (aB.indexOf(",") > -1) {
                    if (bd = ai(bA(aB)), dZ.select(bd.h, bd.s, bd.b), eG[0].style.background = dS = "#" + bU(bd), (aB.match(/[0-9]{1,3}/g) || []).length > 3 && "rgba" === eG.attr("lay-type")) {
                        var eb = 280 * aB.slice(aB.lastIndexOf(",") + 1, aB.length - 1);
                        dZ.elemPicker.find("." + fb).css("left", eb),
                        eG[0].style.background = aB,
                        dS = aB
                    }
                } else bd = ba(aB),
                eG[0].style.background = dS = "#" + bU(bd),
                dZ.elemColorBox.find("." + fI).removeClass(aH).addClass(aA);
                return "change" === fK ? (dZ.select(bd.h, bd.s, bd.b, fK), void(aD.change && aD.change(dS))) : (dZ.color = aB, aD.done && aD.done(aB), void dZ.removePicker())
            }
        };
        dZ.elemPicker.on("click", "*[colorpicker-events]",
        function() {
            var dZ = ah(this),
            aD = dZ.attr("colorpicker-events");
            fK[aD] && fK[aD].call(this, dZ)
        }),
        fB.on("keyup",
        function(dZ) {
            var aD = ah(this);
            fK.confirm.call(this, aD, 13 === dZ.keyCode ? null: "change")
        })
    },
    ef.prototype.events = function() {
        var dZ = this,
        aD = dZ.config,
        eG = dZ.elemColorBox.find("." + bd);
        dZ.elemColorBox.on("click",
        function() {
            dZ.renderPicker(),
            ah(dS)[0] && (dZ.val(), dZ.side())
        }),
        aD.elem[0] && !dZ.elemColorBox[0].eventHandler && (fd.on("click",
        function(aD) {
            if (!ah(aD.target).hasClass(aB) && !ah(aD.target).parents("." + aB)[0] && !ah(aD.target).hasClass(dS.replace(/\./g, "")) && !ah(aD.target).parents(dS)[0] && dZ.elemPicker) {
                if (dZ.color) {
                    var fB = ai(bA(dZ.color));
                    dZ.select(fB.h, fB.s, fB.b)
                } else dZ.elemColorBox.find("." + fI).removeClass(aA).addClass(aH);
                eG[0].style.background = dZ.color || "",
                dZ.removePicker()
            }
        }), ae.on("resize",
        function() {
            return ! (!dZ.elemPicker || !ah(dS)[0]) && void dZ.position()
        }), dZ.elemColorBox[0].eventHandler = !0)
    },
    aD.render = function(dZ) {
        var ah = new ef(dZ);
        return eG.call(ah)
    },
    dZ(fB, aD)
});