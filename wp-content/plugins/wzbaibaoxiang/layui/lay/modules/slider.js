layui.define("jquery",
function(gMd) {
    "use strict";
    var NbT = layui.jquery,
    aEe = {
        config: {},
        index: layui.slider ? layui.slider.index + 1e4: 0,
        set: function(gMd) {
            var aEe = this;
            return aEe.config = NbT.extend({},
            aEe.config, gMd),
            aEe
        },
        on: function(gMd, NbT) {
            return layui.onevent.call(this, gFe, gMd, NbT)
        }
    },
    KdR = function() {
        var gMd = this,
        NbT = gMd.config;
        return {
            setValue: function(NbT, aEe) {
                return gMd.slide("set", NbT, aEe || 0)
            },
            config: NbT
        }
    },
    gFe = "slider",
    DaH = "layui-disabled",
    bAg = "layui-slider",
    Gde = "layui-slider-bar",
    fLe = "layui-slider-wrap",
    DfV = "layui-slider-wrap-btn",
    dEe = "layui-slider-tips",
    LbM = "layui-slider-input",
    hdd = "layui-slider-input-txt",
    QbB = "layui-slider-input-btn",
    fMb = "layui-slider-hover",
    ieI = function(gMd) {
        var KdR = this;
        KdR.index = ++aEe.index,
        KdR.config = NbT.extend({},
        KdR.config, aEe.config, gMd),
        KdR.render()
    };
    ieI.prototype.config = {
        type: "default",
        min: 0,
        max: 100,
        value: 0,
        step: 1,
        showstep: !1,
        tips: !0,
        input: !1,
        range: !1,
        height: 200,
        disabled: !1,
        theme: "#009688"
    },
    ieI.prototype.render = function() {
        var gMd = this,
        aEe = gMd.config;
        if (aEe.step < 1 && (aEe.step = 1), aEe.max < aEe.min && (aEe.max = aEe.min + aEe.step), aEe.range) {
            aEe.value = "object" == typeof aEe.value ? aEe.value: [aEe.min, aEe.value];
            var KdR = Math.min(aEe.value[0], aEe.value[1]),
            gFe = Math.max(aEe.value[0], aEe.value[1]);
            aEe.value[0] = KdR > aEe.min ? KdR: aEe.min,
            aEe.value[1] = gFe > aEe.min ? gFe: aEe.min,
            aEe.value[0] = aEe.value[0] > aEe.max ? aEe.max: aEe.value[0],
            aEe.value[1] = aEe.value[1] > aEe.max ? aEe.max: aEe.value[1];
            var Gde = Math.floor((aEe.value[0] - aEe.min) / (aEe.max - aEe.min) * 100),
            LbM = Math.floor((aEe.value[1] - aEe.min) / (aEe.max - aEe.min) * 100),
            QbB = LbM - Gde + "%";
            Gde += "%",
            LbM += "%"
        } else {
            "object" == typeof aEe.value && (aEe.value = Math.min.apply(null, aEe.value)),
            aEe.value < aEe.min && (aEe.value = aEe.min),
            aEe.value > aEe.max && (aEe.value = aEe.max);
            var QbB = Math.floor((aEe.value - aEe.min) / (aEe.max - aEe.min) * 100) + "%"
        }
        var fMb = aEe.disabled ? "#c2c2c2": aEe.theme,
        ieI = '<div class="layui-slider ' + ("vertical" === aEe.type ? "layui-slider-vertical": "") + '">' + (aEe.tips ? '<div class="layui-slider-tips"></div>': "") + '<div class="layui-slider-bar" style="background:' + fMb + "; " + ("vertical" === aEe.type ? "height": "width") + ":" + QbB + ";" + ("vertical" === aEe.type ? "bottom": "left") + ":" + (Gde || 0) + ';"></div><div class="layui-slider-wrap" style="' + ("vertical" === aEe.type ? "bottom": "left") + ":" + (Gde || QbB) + ';"><div class="layui-slider-wrap-btn" style="border: 2px solid ' + fMb + ';"></div></div>' + (aEe.range ? '<div class="layui-slider-wrap" style="' + ("vertical" === aEe.type ? "bottom": "left") + ":" + LbM + ';"><div class="layui-slider-wrap-btn" style="border: 2px solid ' + fMb + ';"></div></div>': "") + "</div>",
        eBc = NbT(aEe.elem),
        OdG = eBc.next("." + bAg);
        if (OdG[0] && OdG.remove(), gMd.elemTemp = NbT(ieI), aEe.range ? (gMd.elemTemp.find("." + fLe).eq(0).data("value", aEe.value[0]), gMd.elemTemp.find("." + fLe).eq(1).data("value", aEe.value[1])) : gMd.elemTemp.find("." + fLe).data("value", aEe.value), eBc.html(gMd.elemTemp), "vertical" === aEe.type && gMd.elemTemp.height(aEe.height + "px"), aEe.showstep) {
            for (var aFf = (aEe.max - aEe.min) / aEe.step, agF = "", _ = 1; _ < aFf + 1; _++) {
                var gMdgMd = 100 * _ / aFf;
                gMdgMd < 100 && (agF += '<div class="layui-slider-step" style="' + ("vertical" === aEe.type ? "bottom": "left") + ":" + gMdgMd + '%"></div>')
            }
            gMd.elemTemp.append(agF)
        }
        if (aEe.input && !aEe.range) {
            var NbTgMd = NbT('<div class="layui-slider-input layui-input"><div class="layui-slider-input-txt"><input type="text" class="layui-input"></div><div class="layui-slider-input-btn"><i class="layui-icon layui-icon-up"></i><i class="layui-icon layui-icon-down"></i></div></div>');
            eBc.css("position", "relative"),
            eBc.append(NbTgMd),
            eBc.find("." + hdd).children("input").val(aEe.value),
            "vertical" === aEe.type ? NbTgMd.css({
                left: 0,
                top: -48
            }) : gMd.elemTemp.css("margin-right", NbTgMd.outerWidth() + 15)
        }
        aEe.disabled ? (gMd.elemTemp.addClass(DaH), gMd.elemTemp.find("." + DfV).addClass(DaH)) : gMd.slide(),
        gMd.elemTemp.find("." + DfV).on("mouseover",
        function() {
            var KdR = "vertical" === aEe.type ? aEe.height: gMd.elemTemp[0].offsetWidth,
            gFe = gMd.elemTemp.find("." + fLe),
            DaH = "vertical" === aEe.type ? KdR - NbT(this).parent()[0].offsetTop - gFe.height() : NbT(this).parent()[0].offsetLeft,
            bAg = DaH / KdR * 100,
            Gde = NbT(this).parent().data("value"),
            DfV = aEe.setTips ? aEe.setTips(Gde) : Gde;
            gMd.elemTemp.find("." + dEe).html(DfV),
            "vertical" === aEe.type ? gMd.elemTemp.find("." + dEe).css({
                bottom: bAg + "%",
                "margin-bottom": "20px",
                display: "inline-block"
            }) : gMd.elemTemp.find("." + dEe).css({
                left: bAg + "%",
                display: "inline-block"
            })
        }).on("mouseout",
        function() {
            gMd.elemTemp.find("." + dEe).css("display", "none")
        })
    },
    ieI.prototype.slide = function(gMd, aEe, KdR) {
        var gFe = this,
        DaH = gFe.config,
        bAg = gFe.elemTemp,
        ieI = function() {
            return "vertical" === DaH.type ? DaH.height: bAg[0].offsetWidth
        },
        eBc = bAg.find("." + fLe),
        OdG = bAg.next("." + LbM),
        aFf = OdG.children("." + hdd).children("input").val(),
        agF = 100 / ((DaH.max - DaH.min) / Math.ceil(DaH.step)),
        _ = function(gMd, NbT) {
            gMd = Math.ceil(gMd) * agF > 100 ? Math.ceil(gMd) * agF: Math.round(gMd) * agF,
            gMd = gMd > 100 ? 100 : gMd,
            eBc.eq(NbT).css("vertical" === DaH.type ? "bottom": "left", gMd + "%");
            var aEe = gMdgMd(eBc[0].offsetLeft),
            KdR = DaH.range ? gMdgMd(eBc[1].offsetLeft) : 0;
            "vertical" === DaH.type ? (bAg.find("." + dEe).css({
                bottom: gMd + "%",
                "margin-bottom": "20px"
            }), aEe = gMdgMd(ieI() - eBc[0].offsetTop - eBc.height()), KdR = DaH.range ? gMdgMd(ieI() - eBc[1].offsetTop - eBc.height()) : 0) : bAg.find("." + dEe).css("left", gMd + "%"),
            aEe = aEe > 100 ? 100 : aEe,
            KdR = KdR > 100 ? 100 : KdR;
            var gFe = Math.min(aEe, KdR),
            fLe = Math.abs(aEe - KdR);
            "vertical" === DaH.type ? bAg.find("." + Gde).css({
                height: fLe + "%",
                bottom: gFe + "%"
            }) : bAg.find("." + Gde).css({
                width: fLe + "%",
                left: gFe + "%"
            });
            var DfV = DaH.min + Math.round((DaH.max - DaH.min) * gMd / 100);
            if (aFf = DfV, OdG.children("." + hdd).children("input").val(aFf), eBc.eq(NbT).data("value", DfV), DfV = DaH.setTips ? DaH.setTips(DfV) : DfV, bAg.find("." + dEe).html(DfV), DaH.range) {
                var LbM = [eBc.eq(0).data("value"), eBc.eq(1).data("value")];
                LbM[0] > LbM[1] && LbM.reverse()
            }
            DaH.change && DaH.change(DaH.range ? LbM: DfV)
        },
        gMdgMd = function(gMd) {
            var NbT = gMd / ieI() * 100 / agF,
            aEe = Math.round(NbT) * agF;
            return gMd == ieI() && (aEe = Math.ceil(NbT) * agF),
            aEe
        },
        NbTgMd = NbT(['<div class="layui-auxiliar-moving" id="LAY-slider-moving"></div'].join("")),
        aEegMd = function(gMd, aEe) {
            var KdR = function() {
                aEe && aEe(),
                NbTgMd.remove()
            };
            NbT("#LAY-slider-moving")[0] || NbT("body").append(NbTgMd),
            NbTgMd.on("mousemove", gMd),
            NbTgMd.on("mouseup", KdR).on("mouseleave", KdR)
        };
        if ("set" === gMd) return _(aEe, KdR);
        bAg.find("." + DfV).each(function(gMd) {
            var aEe = NbT(this);
            aEe.on("mousedown",
            function(NbT) {
                NbT = NbT || window.event;
                var KdR = aEe.parent()[0].offsetLeft,
                gFe = NbT.clientX;
                "vertical" === DaH.type && (KdR = ieI() - aEe.parent()[0].offsetTop - eBc.height(), gFe = NbT.clientY);
                var Gde = function(NbT) {
                    NbT = NbT || window.event;
                    var Gde = KdR + ("vertical" === DaH.type ? gFe - NbT.clientY: NbT.clientX - gFe);
                    Gde < 0 && (Gde = 0),
                    Gde > ieI() && (Gde = ieI());
                    var fLe = Gde / ieI() * 100 / agF;
                    _(fLe, gMd),
                    aEe.addClass(fMb),
                    bAg.find("." + dEe).show(),
                    NbT.preventDefault()
                },
                fLe = function() {
                    aEe.removeClass(fMb),
                    bAg.find("." + dEe).hide()
                };
                aEegMd(Gde, fLe)
            })
        }),
        bAg.on("click",
        function(gMd) {
            var aEe = NbT("." + DfV);
            if (!aEe.is(event.target) && 0 === aEe.has(event.target).length && aEe.length) {
                var KdR, gFe = "vertical" === DaH.type ? ieI() - gMd.clientY + NbT(this).offset().top: gMd.clientX - NbT(this).offset().left;
                gFe < 0 && (gFe = 0),
                gFe > ieI() && (gFe = ieI());
                var bAg = gFe / ieI() * 100 / agF;
                KdR = DaH.range ? "vertical" === DaH.type ? Math.abs(gFe - parseInt(NbT(eBc[0]).css("bottom"))) > Math.abs(gFe - parseInt(NbT(eBc[1]).css("bottom"))) ? 1 : 0 : Math.abs(gFe - eBc[0].offsetLeft) > Math.abs(gFe - eBc[1].offsetLeft) ? 1 : 0 : 0,
                _(bAg, KdR),
                gMd.preventDefault()
            }
        }),
        OdG.hover(function() {
            var gMd = NbT(this);
            gMd.children("." + QbB).fadeIn("fast")
        },
        function() {
            var gMd = NbT(this);
            gMd.children("." + QbB).fadeOut("fast")
        }),
        OdG.children("." + QbB).children("i").each(function(gMd) {
            NbT(this).on("click",
            function() {
                aFf = 1 == gMd ? aFf - DaH.step < DaH.min ? DaH.min: Number(aFf) - DaH.step: Number(aFf) + DaH.step > DaH.max ? DaH.max: Number(aFf) + DaH.step;
                var NbT = (aFf - DaH.min) / (DaH.max - DaH.min) * 100 / agF;
                _(NbT, 0)
            })
        });
        var KdRgMd = function() {
            var gMd = this.value;
            gMd = isNaN(gMd) ? 0 : gMd,
            gMd = gMd < DaH.min ? DaH.min: gMd,
            gMd = gMd > DaH.max ? DaH.max: gMd,
            this.value = gMd;
            var NbT = (gMd - DaH.min) / (DaH.max - DaH.min) * 100 / agF;
            _(NbT, 0)
        };
        OdG.children("." + hdd).children("input").on("keydown",
        function(gMd) {
            13 === gMd.keyCode && (gMd.preventDefault(), KdRgMd.call(this))
        }).on("change", KdRgMd)
    },
    ieI.prototype.events = function() {
        var gMd = this;
        gMd.config
    },
    aEe.render = function(gMd) {
        var NbT = new ieI(gMd);
        return KdR.call(NbT)
    },
    gMd(gFe, aEe)
});