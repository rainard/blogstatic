layui.define("jquery",
function(gTgEdP) {
    "use strict";
    var gPbUdb = layui.jquery,
    bFcTeN = {
        config: {},
        index: layui.rate ? layui.rate.index + 1e4: 0,
        set: function(gTgEdP) {
            var bFcTeN = this;
            return bFcTeN.config = gPbUdb.extend({},
            bFcTeN.config, gTgEdP),
            bFcTeN
        },
        on: function(gTgEdP, gPbUdb) {
            return layui.onevent.call(this, cXdWde, gTgEdP, gPbUdb)
        }
    },
    ggdSgA = function() {
        var gTgEdP = this,
        gPbUdb = gTgEdP.config;
        return {
            setvalue: function(gPbUdb) {
                gTgEdP.setvalue.call(gTgEdP, gPbUdb)
            },
            config: gPbUdb
        }
    },
    cXdWde = "rate",
    bIgbgY = "layui-rate",
    cSgefL = "layui-icon-rate",
    aKgdeF = "layui-icon-rate-solid",
    bNbHbB = "layui-icon-rate-half",
    dAeNbU = "layui-icon-rate-solid layui-icon-rate-half",
    gTgEdPgTgEdP = "layui-icon-rate-solid layui-icon-rate",
    gPbUdbgTgEdP = "layui-icon-rate layui-icon-rate-half",
    bFcTeNgTgEdP = function(gTgEdP) {
        var ggdSgA = this;
        ggdSgA.index = ++bFcTeN.index,
        ggdSgA.config = gPbUdb.extend({},
        ggdSgA.config, bFcTeN.config, gTgEdP),
        ggdSgA.render()
    };
    bFcTeNgTgEdP.prototype.config = {
        length: 5,
        text: !1,
        readonly: !1,
        half: !1,
        value: 0,
        theme: ""
    },
    bFcTeNgTgEdP.prototype.render = function() {
        var gTgEdP = this,
        bFcTeN = gTgEdP.config,
        ggdSgA = bFcTeN.theme ? 'style="color: ' + bFcTeN.theme + ';"': "";
        bFcTeN.elem = gPbUdb(bFcTeN.elem),
        parseInt(bFcTeN.value) !== bFcTeN.value && (bFcTeN.half || (bFcTeN.value = Math.ceil(bFcTeN.value) - bFcTeN.value < .5 ? Math.ceil(bFcTeN.value) : Math.floor(bFcTeN.value)));
        for (var cXdWde = '<ul class="layui-rate" ' + (bFcTeN.readonly ? "readonly": "") + ">", bNbHbB = 1; bNbHbB <= bFcTeN.length; bNbHbB++) {
            var dAeNbU = '<li class="layui-inline"><i class="layui-icon ' + (bNbHbB > Math.floor(bFcTeN.value) ? cSgefL: aKgdeF) + '" ' + ggdSgA + "></i></li>";
            bFcTeN.half && parseInt(bFcTeN.value) !== bFcTeN.value && bNbHbB == Math.ceil(bFcTeN.value) ? cXdWde = cXdWde + '<li><i class="layui-icon layui-icon-rate-half" ' + ggdSgA + "></i></li>": cXdWde += dAeNbU
        }
        cXdWde += "</ul>" + (bFcTeN.text ? '<span class="layui-inline">' + bFcTeN.value + "星": "") + "</span>";
        var gTgEdPgTgEdP = bFcTeN.elem,
        gPbUdbgTgEdP = gTgEdPgTgEdP.next("." + bIgbgY);
        gPbUdbgTgEdP[0] && gPbUdbgTgEdP.remove(),
        gTgEdP.elemTemp = gPbUdb(cXdWde),
        bFcTeN.span = gTgEdP.elemTemp.next("span"),
        bFcTeN.setText && bFcTeN.setText(bFcTeN.value),
        gTgEdPgTgEdP.html(gTgEdP.elemTemp),
        gTgEdPgTgEdP.addClass("layui-inline"),
        bFcTeN.readonly || gTgEdP.action()
    },
    bFcTeNgTgEdP.prototype.setvalue = function(gTgEdP) {
        var gPbUdb = this,
        bFcTeN = gPbUdb.config;
        bFcTeN.value = gTgEdP,
        gPbUdb.render()
    },
    bFcTeNgTgEdP.prototype.action = function() {
        var gTgEdP = this,
        bFcTeN = gTgEdP.config,
        ggdSgA = gTgEdP.elemTemp,
        cXdWde = ggdSgA.find("i").width();
        ggdSgA.children("li").each(function(gTgEdP) {
            var bIgbgY = gTgEdP + 1,
            bFcTeNgTgEdP = gPbUdb(this);
            bFcTeNgTgEdP.on("click",
            function(gTgEdP) {
                if (bFcTeN.value = bIgbgY, bFcTeN.half) {
                    var cSgefL = gTgEdP.pageX - gPbUdb(this).offset().left;
                    cSgefL <= cXdWde / 2 && (bFcTeN.value = bFcTeN.value - .5)
                }
                bFcTeN.text && ggdSgA.next("span").text(bFcTeN.value + "星"),
                bFcTeN.choose && bFcTeN.choose(bFcTeN.value),
                bFcTeN.setText && bFcTeN.setText(bFcTeN.value)
            }),
            bFcTeNgTgEdP.on("mousemove",
            function(gTgEdP) {
                if (ggdSgA.find("i").each(function() {
                    gPbUdb(this).addClass(cSgefL).removeClass(dAeNbU)
                }), ggdSgA.find("i:lt(" + bIgbgY + ")").each(function() {
                    gPbUdb(this).addClass(aKgdeF).removeClass(gPbUdbgTgEdP)
                }), bFcTeN.half) {
                    var gTgEdPgTgEdP = gTgEdP.pageX - gPbUdb(this).offset().left;
                    gTgEdPgTgEdP <= cXdWde / 2 && bFcTeNgTgEdP.children("i").addClass(bNbHbB).removeClass(aKgdeF)
                }
            }),
            bFcTeNgTgEdP.on("mouseleave",
            function() {
                ggdSgA.find("i").each(function() {
                    gPbUdb(this).addClass(cSgefL).removeClass(dAeNbU)
                }),
                ggdSgA.find("i:lt(" + Math.floor(bFcTeN.value) + ")").each(function() {
                    gPbUdb(this).addClass(aKgdeF).removeClass(gPbUdbgTgEdP)
                }),
                bFcTeN.half && parseInt(bFcTeN.value) !== bFcTeN.value && ggdSgA.children("li:eq(" + Math.floor(bFcTeN.value) + ")").children("i").addClass(bNbHbB).removeClass(gTgEdPgTgEdP)
            })
        })
    },
    bFcTeNgTgEdP.prototype.events = function() {
        var gTgEdP = this;
        gTgEdP.config
    },
    bFcTeN.render = function(gTgEdP) {
        var gPbUdb = new bFcTeNgTgEdP(gTgEdP);
        return ggdSgA.call(gPbUdb)
    },
    gTgEdP(cXdWde, bFcTeN)
});