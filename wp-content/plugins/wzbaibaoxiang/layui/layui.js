!
function(eRac) {
    "use strict";
    var bUcP = document,
    eSdS = {
        modules: {},
        status: {},
        timeout: 10,
        event: {}
    },
    fUbg = function() {
        this.v = "2.5.6"
    },
    aBdU = function() {
        var eRac = bUcP.currentScript ? bUcP.currentScript.src: function() {
            for (var eRac, eSdS = bUcP.scripts,
            fUbg = eSdS.length - 1,
            aBdU = fUbg; aBdU > 0; aBdU--) if ("interactive" === eSdS[aBdU].readyState) {
                eRac = eSdS[aBdU].src;
                break
            }
            return eRac || eSdS[fUbg].src
        } ();
        return eRac.substring(0, eRac.lastIndexOf("/") + 1)
    } (),
    gdcb = function(bUcP) {
        eRac.console && console.error && console.error("Layui hint: " + bUcP)
    },
    ebeL = "undefined" != typeof opera && "[object Opera]" === opera.toString(),
    gJgf = {
        layer: "modules/layer",
        laydate: "modules/laydate",
        laypage: "modules/laypage",
        laytpl: "modules/laytpl",
        layim: "modules/layim",
        layedit: "modules/layedit",
        form: "modules/form",
        upload: "modules/upload",
        transfer: "modules/transfer",
        tree: "modules/tree",
        table: "modules/table",
        element: "modules/element",
        rate: "modules/rate",
        colorpicker: "modules/colorpicker",
        slider: "modules/slider",
        carousel: "modules/carousel",
        flow: "modules/flow",
        util: "modules/util",
        code: "modules/code",
        jquery: "modules/jquery",
        mobile: "modules/mobile",
        "layui.all": "../layui.all"
    };
    fUbg.prototype.cache = eSdS,
    fUbg.prototype.define = function(eRac, bUcP) {
        var fUbg = this,
        aBdU = "function" == typeof eRac,
        gdcb = function() {
            var eRac = function(eRac, bUcP) {
                layui[eRac] = bUcP,
                eSdS.status[eRac] = !0
            };
            return "function" == typeof bUcP && bUcP(function(fUbg, aBdU) {
                eRac(fUbg, aBdU),
                eSdS.callback[fUbg] = function() {
                    bUcP(eRac)
                }
            }),
            this
        };
        return aBdU && (bUcP = eRac, eRac = []),
        !layui["layui.all"] && layui["layui.mobile"] ? gdcb.call(fUbg) : (fUbg.use(eRac, gdcb), fUbg)
    },
    fUbg.prototype.use = function(eRac, fUbg, cSgi) {
        function ccgA(eRac, bUcP) {
            var fUbg = "PLaySTATION 3" === navigator.platform ? /^complete$/: /^(complete|loaded)$/; ("load" === eRac.type || fUbg.test((eRac.currentTarget || eRac.srcElement).readyState)) && (eSdS.modules[biaj] = bUcP, fNcZ.removeChild(eSdSeRac),
            function eRac() {
                return++eRaceRac > 1e3 * eSdS.timeout / 4 ? gdcb(biaj + " is not a valid module") : void(eSdS.status[biaj] ? gPeM() : setTimeout(eRac, 4))
            } ())
        }
        function gPeM() {
            cSgi.push(layui[biaj]),
            eRac.length > 1 ? eLdP.use(eRac.slice(1), fUbg, cSgi) : "function" == typeof fUbg && fUbg.apply(layui, cSgi)
        }
        var eLdP = this,
        gXeA = eSdS.dir = eSdS.dir ? eSdS.dir: aBdU,
        fNcZ = bUcP.getElementsByTagName("head")[0];
        eRac = "string" == typeof eRac ? [eRac] : eRac,
        window.jQuery && jQuery.fn.on && (eLdP.each(eRac,
        function(bUcP, eSdS) {
            "jquery" === eSdS && eRac.splice(bUcP, 1)
        }), layui.jquery = layui.$ = jQuery);
        var biaj = eRac[0],
        eRaceRac = 0;
        if (cSgi = cSgi || [], eSdS.host = eSdS.host || (gXeA.match(/\/\/([\s\S]+?)\//) || ["//" + location.host + "/"])[0], 0 === eRac.length || layui["layui.all"] && gJgf[biaj] || !layui["layui.all"] && layui["layui.mobile"] && gJgf[biaj]) return gPeM(),
        eLdP;
        var bUcPeRac = (gJgf[biaj] ? gXeA + "lay/": /^\{\/\}/.test(eLdP.modules[biaj]) ? "": eSdS.base || "") + (eLdP.modules[biaj] || biaj) + ".js";
        if (bUcPeRac = bUcPeRac.replace(/^\{\/\}/, ""), !eSdS.modules[biaj] && layui[biaj] && (eSdS.modules[biaj] = bUcPeRac), eSdS.modules[biaj]) !
        function eRac() {
            return++eRaceRac > 1e3 * eSdS.timeout / 4 ? gdcb(biaj + " is not a valid module") : void("string" == typeof eSdS.modules[biaj] && eSdS.status[biaj] ? gPeM() : setTimeout(eRac, 4))
        } ();
        else {
            var eSdSeRac = bUcP.createElement("script");
            eSdSeRac.async = !0,
            eSdSeRac.charset = "utf-8",
            eSdSeRac.src = bUcPeRac +
            function() {
                var eRac = eSdS.version === !0 ? eSdS.v || (new Date).getTime() : eSdS.version || "";
                return eRac ? "?v=" + eRac: ""
            } (),
            fNcZ.appendChild(eSdSeRac),
            !eSdSeRac.attachEvent || eSdSeRac.attachEvent.toString && eSdSeRac.attachEvent.toString().indexOf("[native code") < 0 || ebeL ? eSdSeRac.addEventListener("load",
            function(eRac) {
                ccgA(eRac, bUcPeRac)
            },
            !1) : eSdSeRac.attachEvent("onreadystatechange",
            function(eRac) {
                ccgA(eRac, bUcPeRac)
            }),
            eSdS.modules[biaj] = bUcPeRac
        }
        return eLdP
    },
    fUbg.prototype.getStyle = function(bUcP, eSdS) {
        var fUbg = bUcP.currentStyle ? bUcP.currentStyle: eRac.getComputedStyle(bUcP, null);
        return fUbg[fUbg.getPropertyValue ? "getPropertyValue": "getAttribute"](eSdS)
    },
    fUbg.prototype.link = function(eRac, fUbg, aBdU) {
        var ebeL = this,
        gJgf = bUcP.createElement("link"),
        cSgi = bUcP.getElementsByTagName("head")[0];
        "string" == typeof fUbg && (aBdU = fUbg);
        var ccgA = (aBdU || eRac).replace(/\.|\//g, ""),
        gPeM = gJgf.id = "layuicss-" + ccgA,
        eLdP = 0;
        return gJgf.rel = "stylesheet",
        gJgf.href = eRac + (eSdS.debug ? "?v=" + (new Date).getTime() : ""),
        gJgf.media = "all",
        bUcP.getElementById(gPeM) || cSgi.appendChild(gJgf),
        "function" != typeof fUbg ? ebeL: (function aBdU() {
            return++eLdP > 1e3 * eSdS.timeout / 100 ? gdcb(eRac + " timeout") : void(1989 === parseInt(ebeL.getStyle(bUcP.getElementById(gPeM), "width")) ?
            function() {
                fUbg()
            } () : setTimeout(aBdU, 100))
        } (), ebeL)
    },
    eSdS.callback = {},
    fUbg.prototype.factory = function(eRac) {
        if (layui[eRac]) return "function" == typeof eSdS.callback[eRac] ? eSdS.callback[eRac] : null
    },
    fUbg.prototype.addcss = function(eRac, bUcP, fUbg) {
        return layui.link(eSdS.dir + "css/" + eRac, bUcP, fUbg)
    },
    fUbg.prototype.img = function(eRac, bUcP, eSdS) {
        var fUbg = new Image;
        return fUbg.src = eRac,
        fUbg.complete ? bUcP(fUbg) : (fUbg.onload = function() {
            fUbg.onload = null,
            "function" == typeof bUcP && bUcP(fUbg)
        },
        void(fUbg.onerror = function(eRac) {
            fUbg.onerror = null,
            "function" == typeof eSdS && eSdS(eRac)
        }))
    },
    fUbg.prototype.config = function(eRac) {
        eRac = eRac || {};
        for (var bUcP in eRac) eSdS[bUcP] = eRac[bUcP];
        return this
    },
    fUbg.prototype.modules = function() {
        var eRac = {};
        for (var bUcP in gJgf) eRac[bUcP] = gJgf[bUcP];
        return eRac
    } (),
    fUbg.prototype.extend = function(eRac) {
        var bUcP = this;
        eRac = eRac || {};
        for (var eSdS in eRac) bUcP[eSdS] || bUcP.modules[eSdS] ? gdcb("模块名 " + eSdS + " 已被占用") : bUcP.modules[eSdS] = eRac[eSdS];
        return bUcP
    },
    fUbg.prototype.router = function(eRac) {
        var bUcP = this,
        eRac = eRac || location.hash,
        eSdS = {
            path: [],
            search: {},
            hash: (eRac.match(/[^#](#.*$)/) || [])[1] || ""
        };
        return /^#\//.test(eRac) ? (eRac = eRac.replace(/^#\//, ""), eSdS.href = "/" + eRac, eRac = eRac.replace(/([^#])(#.*$)/, "$1").split("/") || [], bUcP.each(eRac,
            function(eRac, bUcP) {
                / ^\w += /.test(bUcP)?function(){
                    bUcP=bUcP.split("="),eSdS.search[bUcP[0]]=bUcP[1]}():eSdS.path.push(bUcP)}),eSdS):eSdS
                },
                fUbg.prototype.url=function(eRac){var bUcP=this,eSdS={
                    pathname:function(){var bUcP=eRac?function(){
                        var bUcP=(eRac.match(/\.[^.]+?\/.+/)||[])[0]||"";
                        return bUcP.replace(/^[^\/]+/,"").replace(/\ ? . + /,"")}():location.pathname;
                        return bUcP.replace(/^\//,"").split("/")}(),search:function(){
                            var eSdS={},fUbg=(eRac?function(){
                                var bUcP=(eRac.match(/\?.+/)||[])[0]||"";
                                return bUcP.replace(/\#.+/,"")}():location.search).replace(/^\?+/,"").split("&");
                                return bUcP.each(fUbg,function(eRac,bUcP){var fUbg=bUcP.indexOf("="),aBdU=function(){
                                    return fUbg<0?bUcP.substr(0,bUcP.length):0!==fUbg&&bUcP.substr(0,fUbg)}();aBdU&&(eSdS[aBdU]=fUbg>0?bUcP.substr(fUbg+1):null)}),eSdS}(),hash:bUcP.router(function(){
                                        return eRac?(eRac.match(/#.+/)||[])[0]||"":location.hash}())};
                                        return eSdS},fUbg.prototype.data=function(bUcP,eSdS,fUbg){
                                            if(bUcP=bUcP||"layui",fUbg=fUbg||localStorage,eRac.JSON&&eRac.JSON.parse){
                                                if(null===eSdS)return delete fUbg[bUcP];eSdS="object"==typeof eSdS?eSdS:{key:eSdS};try{var aBdU=JSON.parse(fUbg[bUcP])}catch(eRac){var aBdU={}}
                                                return"value"in eSdS&&(aBdU[eSdS.key]=eSdS.value),eSdS.remove&&delete aBdU[eSdS.key],fUbg[bUcP]=JSON.stringify(aBdU),eSdS.key?aBdU[eSdS.key]:aBdU}},fUbg.prototype.sessionData=function(eRac,bUcP){
                                                    return this.data(eRac,bUcP,sessionStorage)},fUbg.prototype.device=function(bUcP){var eSdS=navigator.userAgent.toLowerCase(),fUbg=function(eRac){
                                                        var bUcP=new RegExp(eRac+"/([^\\s\\_\\-]+)");
                                                        return eRac=(eSdS.match(bUcP)||[])[1],eRac||!1},aBdU={os:function(){
                                                            return/windows/.test(eSdS)?"windows":/linux/.test(eSdS)?"linux":/iphone|ipod|ipad|ios/.test(eSdS)?"ios":/mac/.test(eSdS)?"mac":void 0}(),ie:function(){
                                                                return!!(eRac.ActiveXObject||"ActiveXObject"in eRac)&&((eSdS.match(/msie\s(\d+)/)||[])[1]||"11")}(),weixin:fUbg("micromessenger")};
                                                                return bUcP&&!aBdU[bUcP]&&(aBdU[bUcP]=fUbg(bUcP)),aBdU.android=/android/.test(eSdS),aBdU.ios="ios"===aBdU.os,aBdU.mobile=!(!aBdU.android&&!aBdU.ios),aBdU},fUbg.prototype.hint=function(){return{error:gdcb}},fUbg.prototype.each=function(eRac,bUcP){var eSdS,fUbg=this;if("function"!=typeof bUcP)return fUbg;if(eRac=eRac||[],eRac.constructor===Object){for(eSdS in eRac)if(bUcP.call(eRac[eSdS],eSdS,eRac[eSdS]))break}else for(eSdS=0;eSdS<eRac.length&&!bUcP.call(eRac[eSdS],eSdS,eRac[eSdS]);eSdS++);return fUbg},fUbg.prototype.sort=function(eRac,bUcP,eSdS){var fUbg=JSON.parse(JSON.stringify(eRac||[]));return bUcP?(fUbg.sort(function(eRac,eSdS){var fUbg=/^-?\d+$/,aBdU=eRac[bUcP],gdcb=eSdS[bUcP];return fUbg.test(aBdU)&&(aBdU=parseFloat(aBdU)),fUbg.test(gdcb)&&(gdcb=parseFloat(gdcb)),aBdU&&!gdcb?1:!aBdU&&gdcb?-1:aBdU>gdcb?1:aBdU<gdcb?-1:0}),eSdS&&fUbg.reverse(),fUbg):fUbg},fUbg.prototype.stope=function(bUcP){bUcP=bUcP||eRac.event;try{bUcP.stopPropagation()}catch(eRac){bUcP.cancelBubble=!0}},fUbg.prototype.onevent=function(eRac,bUcP,eSdS){return"string"!=typeof eRac||"function"!=typeof eSdS?this:fUbg.event(eRac,bUcP,null,eSdS)},fUbg.prototype.event=fUbg.event=function(eRac,bUcP,fUbg,aBdU){var gdcb=this,ebeL=null,gJgf=bUcP.match(/\((.*)\)$/)||[],cSgi=(eRac+"."+bUcP).replace(gJgf[0],""),ccgA=gJgf[1]||"",gPeM=function(eRac,bUcP){var eSdS=bUcP&&bUcP.call(gdcb,fUbg);eSdS===!1&&null===ebeL&&(ebeL=!1)};return aBdU?(eSdS.event[cSgi]=eSdS.event[cSgi]||{},eSdS.event[cSgi][ccgA]=[aBdU],this):(layui.each(eSdS.event[cSgi],function(eRac,bUcP){return"{*}"===ccgA?void layui.each(bUcP,gPeM):(""===eRac&&layui.each(bUcP,gPeM),void(ccgA&&eRac===ccgA&&layui.each(bUcP,gPeM)))}),ebeL)},eRac.layui=new fUbg}(window);
            