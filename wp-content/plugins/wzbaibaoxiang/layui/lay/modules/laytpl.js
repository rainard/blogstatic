layui.define(function(aIaAgAgB) {
    "use strict";
    var bMbahaaP = {
        open: "{{",
        close: "}}"
    },
    cfdggQfI = {
        exp: function(aIaAgAgB) {
            return new RegExp(aIaAgAgB, "g")
        },
        query: function(aIaAgAgB, cfdggQfI, gJfFdAac) {
            var difdaAbJ = ["#([\\s\\S])+?", "([^{#}])*?"][aIaAgAgB || 0];
            return eGaGdeaF((cfdggQfI || "") + bMbahaaP.open + difdaAbJ + bMbahaaP.close + (gJfFdAac || ""))
        },
        escape: function(aIaAgAgB) {
            return String(aIaAgAgB || "").replace(/&(?!#?[a-zA-Z0-9]+;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&quot;")
        },
        error: function(aIaAgAgB, bMbahaaP) {
            var cfdggQfI = "Laytpl Error：";
            return "object" == typeof console && console.error(cfdggQfI + aIaAgAgB + "\n" + (bMbahaaP || "")),
            cfdggQfI + aIaAgAgB
        }
    },
    eGaGdeaF = cfdggQfI.exp,
    gJfFdAac = function(aIaAgAgB) {
        this.tpl = aIaAgAgB
    };
    gJfFdAac.pt = gJfFdAac.prototype,
    window.errors = 0,
    gJfFdAac.pt.parse = function(aIaAgAgB, gJfFdAac) {
        var difdaAbJ = this,
        gFbZgYaW = aIaAgAgB,
        eLbA = eGaGdeaF("^" + bMbahaaP.open + "#", ""),
        aIaAgAgBaIaAgAgB = eGaGdeaF(bMbahaaP.close + "$", "");
        aIaAgAgB = aIaAgAgB.replace(/\s+|\r|\t|\n/g, " ").replace(eGaGdeaF(bMbahaaP.open + "#"), bMbahaaP.open + "# ").replace(eGaGdeaF(bMbahaaP.close + "}"), "} " + bMbahaaP.close).replace(/\\/g, "\\\\").replace(eGaGdeaF(bMbahaaP.open + "!(.+?)!" + bMbahaaP.close),
        function(aIaAgAgB) {
            return aIaAgAgB = aIaAgAgB.replace(eGaGdeaF("^" + bMbahaaP.open + "!"), "").replace(eGaGdeaF("!" + bMbahaaP.close), "").replace(eGaGdeaF(bMbahaaP.open + "|" + bMbahaaP.close),
            function(aIaAgAgB) {
                return aIaAgAgB.replace(/(.)/g, "\\$1")
            })
        }).replace(/(?="|')/g, "\\").replace(cfdggQfI.query(),
        function(aIaAgAgB) {
            return aIaAgAgB = aIaAgAgB.replace(eLbA, "").replace(aIaAgAgBaIaAgAgB, ""),
            '";' + aIaAgAgB.replace(/\\/g, "") + ';view+="'
        }).replace(cfdggQfI.query(1),
        function(aIaAgAgB) {
            var cfdggQfI = '"+(';
            return aIaAgAgB.replace(/\s/g, "") === bMbahaaP.open + bMbahaaP.close ? "": (aIaAgAgB = aIaAgAgB.replace(eGaGdeaF(bMbahaaP.open + "|" + bMbahaaP.close), ""), /^=/.test(aIaAgAgB) && (aIaAgAgB = aIaAgAgB.replace(/^=/, ""), cfdggQfI = '"+_escape_('), cfdggQfI + aIaAgAgB.replace(/\\/g, "") + ')+"')
        }),
        aIaAgAgB = '"use strict";var view = "' + aIaAgAgB + '";return view;';
        try {
            return difdaAbJ.cache = aIaAgAgB = new Function("d, _escape_", aIaAgAgB),
            aIaAgAgB(gJfFdAac, cfdggQfI.escape)
        } catch(aIaAgAgB) {
            return delete difdaAbJ.cache,
            cfdggQfI.error(aIaAgAgB, gFbZgYaW)
        }
    },
    gJfFdAac.pt.render = function(aIaAgAgB, bMbahaaP) {
        var eGaGdeaF, gJfFdAac = this;
        return aIaAgAgB ? (eGaGdeaF = gJfFdAac.cache ? gJfFdAac.cache(aIaAgAgB, cfdggQfI.escape) : gJfFdAac.parse(gJfFdAac.tpl, aIaAgAgB), bMbahaaP ? void bMbahaaP(eGaGdeaF) : eGaGdeaF) : cfdggQfI.error("no data")
    };
    var difdaAbJ = function(aIaAgAgB) {
        return "string" != typeof aIaAgAgB ? cfdggQfI.error("Template not found") : new gJfFdAac(aIaAgAgB)
    };
    difdaAbJ.config = function(aIaAgAgB) {
        aIaAgAgB = aIaAgAgB || {};
        for (var cfdggQfI in aIaAgAgB) bMbahaaP[cfdggQfI] = aIaAgAgB[cfdggQfI]
    },
    difdaAbJ.v = "1.2.0",
    aIaAgAgB("laytpl", difdaAbJ)
});