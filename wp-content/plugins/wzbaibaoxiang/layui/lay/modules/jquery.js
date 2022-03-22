!
function(g, R) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = g.document ? R(g, !0) : function(g) {
        if (!g.document) throw new Error("jQuery requires a window with a document");
        return R(g)
    }: R(g)
} ("undefined" != typeof window ? window: this,
function(g, R) {
    function gZ(g) {
        var R = !!g && "length" in g && g.length,
        gZ = S.type(g);
        return "function" !== gZ && !S.isWindow(g) && ("array" === gZ || 0 === R || "number" == typeof R && R > 0 && R - 1 in g)
    }
    function d(g, R, gZ) {
        if (S.isFunction(R)) return S.grep(g,
        function(g, d) {
            return !! R.call(g, d, g) !== gZ
        });
        if (R.nodeType) return S.grep(g,
        function(g) {
            return g === R !== gZ
        });
        if ("string" == typeof R) {
            if (Rg.test(R)) return S.filter(R, g, gZ);
            R = S.filter(R, g)
        }
        return S.grep(g,
        function(g) {
            return S.inArray(g, R) > -1 !== gZ
        })
    }
    function L(g, R) {
        do {
            g = g[R]
        } while ( g && 1 !== g . nodeType );
        return g
    }
    function b(g) {
        var R = {};
        return S.each(g.match(gjg) || [],
        function(g, gZ) {
            R[gZ] = !0
        }),
        R
    }
    function F() {
        E.addEventListener ? (E.removeEventListener("DOMContentLoaded", gj), g.removeEventListener("load", gj)) : (E.detachEvent("onreadystatechange", gj), g.detachEvent("onload", gj))
    }
    function gj() { (E.addEventListener || "load" === g.event.type || "complete" === E.readyState) && (F(), S.ready())
    }
    function dC(g, R, gZ) {
        if (void 0 === gZ && 1 === g.nodeType) {
            var d = "data-" + R.replace(hg, "-$1").toLowerCase();
            if (gZ = g.getAttribute(d), "string" == typeof gZ) {
                try {
                    gZ = "true" === gZ || "false" !== gZ && ("null" === gZ ? null: +gZ + "" === gZ ? +gZ: dYg.test(gZ) ? S.parseJSON(gZ) : gZ)
                } catch(g) {}
                S.data(g, R, gZ)
            } else gZ = void 0
        }
        return gZ
    }
    function e(g) {
        var R;
        for (R in g) if (("data" !== R || !S.isEmptyObject(g[R])) && "toJSON" !== R) return ! 1;
        return ! 0
    }
    function G(g, R, gZ, d) {
        if (Gg(g)) {
            var L, b, F = S.expando,
            gj = g.nodeType,
            dC = gj ? S.cache: g,
            e = gj ? g[F] : g[F] && F;
            if (e && dC[e] && (d || dC[e].data) || void 0 !== gZ || "string" != typeof R) return e || (e = gj ? g[F] = D.pop() || S.guid++:F),
            dC[e] || (dC[e] = gj ? {}: {
                toJSON: S.noop
            }),
            "object" != typeof R && "function" != typeof R || (d ? dC[e] = S.extend(dC[e], R) : dC[e].data = S.extend(dC[e].data, R)),
            b = dC[e],
            d || (b.data || (b.data = {}), b = b.data),
            void 0 !== gZ && (b[S.camelCase(R)] = gZ),
            "string" == typeof R ? (L = b[R], null == L && (L = b[S.camelCase(R)])) : L = b,
            L
        }
    }
    function dY(g, R, gZ) {
        if (Gg(g)) {
            var d, L, b = g.nodeType,
            F = b ? S.cache: g,
            gj = b ? g[S.expando] : S.expando;
            if (F[gj]) {
                if (R && (d = gZ ? F[gj] : F[gj].data)) {
                    S.isArray(R) ? R = R.concat(S.map(R, S.camelCase)) : R in d ? R = [R] : (R = S.camelCase(R), R = R in d ? [R] : R.split(" ")),
                    L = R.length;
                    for (; L--;) delete d[R[L]];
                    if (gZ ? !e(d) : !S.isEmptyObject(d)) return
                } (gZ || (delete F[gj].data, e(F[gj]))) && (b ? S.cleanData([g], !0) : P.deleteExpando || F != F.window ? delete F[gj] : F[gj] = void 0)
            }
        }
    }
    function h(g, R, gZ, d) {
        var L, b = 1,
        F = 20,
        gj = d ?
        function() {
            return d.cur()
        }: function() {
            return S.css(g, R, "")
        },
        dC = gj(),
        e = gZ && gZ[3] || (S.cssNumber[R] ? "": "px"),
        G = (S.cssNumber[R] || "px" !== e && +dC) && fg.exec(S.css(g, R));
        if (G && G[3] !== e) {
            e = e || G[3],
            gZ = gZ || [],
            G = +dC || 1;
            do {
                b = b || ".5", G /= b, S.style(g, R, G + e)
            } while ( b !== ( b = gj () / dC) && 1 !== b && --F)
        }
        return gZ && (G = +G || +dC || 0, L = gZ[1] ? G + (gZ[1] + 1) * gZ[2] : +gZ[2], d && (d.unit = e, d.start = G, d.end = L)),
        L
    }
    function bd(g) {
        var R = eYg.split("|"),
        gZ = g.createDocumentFragment();
        if (gZ.createElement) for (; R.length;) gZ.createElement(R.pop());
        return gZ
    }
    function f(g, R) {
        var gZ, d, L = 0,
        b = "undefined" != typeof g.getElementsByTagName ? g.getElementsByTagName(R || "*") : "undefined" != typeof g.querySelectorAll ? g.querySelectorAll(R || "*") : void 0;
        if (!b) for (b = [], gZ = g.childNodes || g; null != (d = gZ[L]); L++) ! R || S.nodeName(d, R) ? b.push(d) : S.merge(b, f(d, R));
        return void 0 === R || R && S.nodeName(g, R) ? S.merge([g], b) : b
    }
    function gN(g, R) {
        for (var gZ, d = 0; null != (gZ = g[d]); d++) S._data(gZ, "globalEval", !R || S._data(R[d], "globalEval"))
    }
    function c(g) {
        ag.test(g.type) && (g.defaultChecked = g.checked)
    }
    function bdC(g, R, gZ, d, L) {
        for (var b, F, gj, dC, e, G, dY, h = g.length,
        bdC = bd(R), a = [], C = 0; C < h; C++) if (F = g[C], F || 0 === F) if ("object" === S.type(F)) S.merge(a, F.nodeType ? [F] : F);
        else if (fZg.test(F)) {
            for (dC = dC || bdC.appendChild(R.createElement("div")), e = (Cg.exec(F) || ["", ""])[1].toLowerCase(), dY = eHg[e] || eHg._default, dC.innerHTML = dY[1] + S.htmlPrefilter(F) + dY[2], b = dY[0]; b--;) dC = dC.lastChild;
            if (!P.leadingWhitespace && aPg.test(F) && a.push(R.createTextNode(aPg.exec(F)[0])), !P.tbody) for (F = "table" !== e || cRg.test(F) ? "<table>" !== dY[1] || cRg.test(F) ? 0 : dC: dC.firstChild, b = F && F.childNodes.length; b--;) S.nodeName(G = F.childNodes[b], "tbody") && !G.childNodes.length && F.removeChild(G);
            for (S.merge(a, dC.childNodes), dC.textContent = ""; dC.firstChild;) dC.removeChild(dC.firstChild);
            dC = bdC.lastChild
        } else a.push(R.createTextNode(F));
        for (dC && bdC.removeChild(dC), P.appendChecked || S.grep(f(a, "input"), c), C = 0; F = a[C++];) if (d && S.inArray(F, d) > -1) L && L.push(F);
        else if (gj = S.contains(F.ownerDocument, F), dC = f(bdC.appendChild(F), "script"), gj && gN(dC), gZ) for (b = 0; F = dC[b++];) fDg.test(F.type || "") && gZ.push(F);
        return dC = null,
        bdC
    }
    function a() {
        return ! 0
    }
    function C() {
        return ! 1
    }
    function fD() {
        try {
            return E.activeElement
        } catch(g) {}
    }
    function aP(g, R, gZ, d, L, b) {
        var F, gj;
        if ("object" == typeof R) {
            "string" != typeof gZ && (d = d || gZ, gZ = void 0);
            for (gj in R) aP(g, gj, gZ, d, R[gj], b);
            return g
        }
        if (null == d && null == L ? (L = gZ, d = gZ = void 0) : null == L && ("string" == typeof gZ ? (L = d, d = void 0) : (L = d, d = gZ, gZ = void 0)), L === !1) L = C;
        else if (!L) return g;
        return 1 === b && (F = L, L = function(g) {
            return S().off(g),
            F.apply(this, arguments)
        },
        L.guid = F.guid || (F.guid = S.guid++)),
        g.each(function() {
            S.event.add(this, R, L, d, gZ)
        })
    }
    function eY(g, R) {
        return S.nodeName(g, "table") && S.nodeName(11 !== R.nodeType ? R: R.firstChild, "tr") ? g.getElementsByTagName("tbody")[0] || g.appendChild(g.ownerDocument.createElement("tbody")) : g
    }
    function eH(g) {
        return g.type = (null !== S.find.attr(g, "type")) + "/" + g.type,
        g
    }
    function fZ(g) {
        var R = ig.exec(g.type);
        return R ? g.type = R[1] : g.removeAttribute("type"),
        g
    }
    function cR(g, R) {
        if (1 === R.nodeType && S.hasData(g)) {
            var gZ, d, L, b = S._data(g),
            F = S._data(R, b),
            gj = b.events;
            if (gj) {
                delete F.handle,
                F.events = {};
                for (gZ in gj) for (d = 0, L = gj[gZ].length; d < L; d++) S.event.add(R, gZ, gj[gZ][d])
            }
            F.data && (F.data = S.extend({},
            F.data))
        }
    }
    function ce(g, R) {
        var gZ, d, L;
        if (1 === R.nodeType) {
            if (gZ = R.nodeName.toLowerCase(), !P.noCloneEvent && R[S.expando]) {
                L = S._data(R);
                for (d in L.events) S.removeEvent(R, d, L.handle);
                R.removeAttribute(S.expando)
            }
            "script" === gZ && R.text !== g.text ? (eH(R).text = g.text, fZ(R)) : "object" === gZ ? (R.parentNode && (R.outerHTML = g.outerHTML), P.html5Clone && g.innerHTML && !S.trim(R.innerHTML) && (R.innerHTML = g.innerHTML)) : "input" === gZ && ag.test(g.type) ? (R.defaultChecked = R.checked = g.checked, R.value !== g.value && (R.value = g.value)) : "option" === gZ ? R.defaultSelected = R.selected = g.defaultSelected: "input" !== gZ && "textarea" !== gZ || (R.defaultValue = g.defaultValue)
        }
    }
    function eT(g, R, gZ, d) {
        R = I.apply([], R);
        var L, b, F, gj, dC, e, G = 0,
        dY = g.length,
        h = dY - 1,
        bd = R[0],
        gN = S.isFunction(bd);
        if (gN || dY > 1 && "string" == typeof bd && !P.checkClone && bVg.test(bd)) return g.each(function(L) {
            var b = g.eq(L);
            gN && (R[0] = bd.call(this, L, b.html())),
            eT(b, R, gZ, d)
        });
        if (dY && (e = bdC(R, g[0].ownerDocument, !1, g, d), L = e.firstChild, 1 === e.childNodes.length && (e = L), L || d)) {
            for (gj = S.map(f(e, "script"), eH), F = gj.length; G < dY; G++) b = e,
            G !== h && (b = S.clone(b, !0, !0), F && S.merge(gj, f(b, "script"))),
            gZ.call(g[G], b, G);
            if (F) for (dC = gj[gj.length - 1].ownerDocument, S.map(gj, fZ), G = 0; G < F; G++) b = gj[G],
            fDg.test(b.type || "") && !S._data(b, "globalEval") && S.contains(dC, b) && (b.src ? S._evalUrl && S._evalUrl(b.src) : S.globalEval((b.text || b.textContent || b.innerHTML || "").replace(jg, "")));
            e = L = null
        }
        return g
    }
    function gZb(g, R, gZ) {
        for (var d, L = R ? S.filter(R, g) : g, b = 0; null != (d = L[b]); b++) gZ || 1 !== d.nodeType || S.cleanData(f(d)),
        d.parentNode && (gZ && S.contains(d.ownerDocument, d) && gN(f(d, "script")), d.parentNode.removeChild(d));
        return g
    }
    function Y(g, R) {
        var gZ = S(R.createElement(g)).appendTo(R.body),
        d = S.css(gZ[0], "display");
        return gZ.detach(),
        d
    }
    function dc(g) {
        var R = E,
        gZ = ng[g];
        return gZ || (gZ = Y(g, R), "none" !== gZ && gZ || (mg = (mg || S("<iframe frameborder='0' width='0' height='0'/>")).appendTo(R.documentElement), R = (mg[0].contentWindow || mg[0].contentDocument).document, R.write(), R.close(), gZ = Y(g, R), mg.detach()), ng[g] = gZ),
        gZ
    }
    function eL(g, R) {
        return {
            get: function() {
                return g() ? void delete this.get: (this.get = R).apply(this, arguments)
            }
        }
    }
    function aY(g) {
        if (g in Dg) return g;
        for (var R = g.charAt(0).toUpperCase() + g.slice(1), gZ = Bg.length; gZ--;) if (g = Bg[gZ] + R, g in Dg) return g
    }
    function gX(g, R) {
        for (var gZ, d, L, b = [], F = 0, gj = g.length; F < gj; F++) d = g[F],
        d.style && (b[F] = S._data(d, "olddisplay"), gZ = d.style.display, R ? (b[F] || "none" !== gZ || (d.style.display = ""), "" === d.style.display && cg(d) && (b[F] = S._data(d, "olddisplay", dc(d.nodeName)))) : (L = cg(d), (gZ && "none" !== gZ || !L) && S._data(d, "olddisplay", L ? gZ: S.css(d, "display"))));
        for (F = 0; F < gj; F++) d = g[F],
        d.style && (R && "none" !== d.style.display && "" !== d.style.display || (d.style.display = R ? b[F] || "": "none"));
        return g
    }
    function cP(g, R, gZ) {
        var d = yg.exec(R);
        return d ? Math.max(0, d[1] - (gZ || 0)) + (d[2] || "px") : R
    }
    function bV(g, R, gZ, d, L) {
        for (var b = gZ === (d ? "border": "content") ? 4 : "width" === R ? 1 : 0, F = 0; b < 4; b += 2)"margin" === gZ && (F += S.css(g, gZ + gNg[b], !0, L)),
        d ? ("content" === gZ && (F -= S.css(g, "padding" + gNg[b], !0, L)), "margin" !== gZ && (F -= S.css(g, "border" + gNg[b] + "Width", !0, L))) : (F += S.css(g, "padding" + gNg[b], !0, L), "padding" !== gZ && (F += S.css(g, "border" + gNg[b] + "Width", !0, L)));
        return F
    }
    function i(R, gZ, d) {
        var L = !0,
        b = "width" === gZ ? R.offsetWidth: R.offsetHeight,
        F = sg(R),
        gj = P.boxSizing && "border-box" === S.css(R, "boxSizing", !1, F);
        if (E.msFullscreenElement && g.top !== g && R.getClientRects().length && (b = Math.round(100 * R.getBoundingClientRect()[gZ])), b <= 0 || null == b) {
            if (b = tg(R, gZ, F), (b < 0 || null == b) && (b = R.style[gZ]), pg.test(b)) return b;
            L = gj && (P.boxSizingReliable() || b === R.style[gZ]),
            b = parseFloat(b) || 0
        }
        return b + bV(R, gZ, d || (gj ? "border": "content"), L, F) + "px"
    }
    function j(g, R, gZ, d, L) {
        return new j.prototype.init(g, R, gZ, d, L)
    }
    function k() {
        return g.setTimeout(function() {
            Eg = void 0
        }),
        Eg = S.now()
    }
    function l(g, R) {
        var gZ, d = {
            height: g
        },
        L = 0;
        for (R = R ? 1 : 0; L < 4; L += 2 - R) gZ = gNg[L],
        d["margin" + gZ] = d["padding" + gZ] = g;
        return R && (d.opacity = d.width = g),
        d
    }
    function m(g, R, gZ) {
        for (var d, L = (p.tweeners[R] || []).concat(p.tweeners["*"]), b = 0, F = L.length; b < F; b++) if (d = L[b].call(gZ, R, g)) return d
    }
    function n(g, R, gZ) {
        var d, L, b, F, gj, dC, e, G, dY = this,
        h = {},
        bd = g.style,
        f = g.nodeType && cg(g),
        gN = S._data(g, "fxshow");
        gZ.queue || (gj = S._queueHooks(g, "fx"), null == gj.unqueued && (gj.unqueued = 0, dC = gj.empty.fire, gj.empty.fire = function() {
            gj.unqueued || dC()
        }), gj.unqueued++, dY.always(function() {
            dY.always(function() {
                gj.unqueued--,
                S.queue(g, "fx").length || gj.empty.fire()
            })
        })),
        1 === g.nodeType && ("height" in R || "width" in R) && (gZ.overflow = [bd.overflow, bd.overflowX, bd.overflowY], e = S.css(g, "display"), G = "none" === e ? S._data(g, "olddisplay") || dc(g.nodeName) : e, "inline" === G && "none" === S.css(g, "float") && (P.inlineBlockNeedsLayout && "inline" !== dc(g.nodeName) ? bd.zoom = 1 : bd.display = "inline-block")),
        gZ.overflow && (bd.overflow = "hidden", P.shrinkWrapBlocks() || dY.always(function() {
            bd.overflow = gZ.overflow[0],
            bd.overflowX = gZ.overflow[1],
            bd.overflowY = gZ.overflow[2]
        }));
        for (d in R) if (L = R[d], Ig.exec(L)) {
            if (delete R[d], b = b || "toggle" === L, L === (f ? "hide": "show")) {
                if ("show" !== L || !gN || void 0 === gN[d]) continue;
                f = !0
            }
            h[d] = gN && gN[d] || S.style(g, d)
        } else e = void 0;
        if (S.isEmptyObject(h))"inline" === ("none" === e ? dc(g.nodeName) : e) && (bd.display = e);
        else {
            gN ? "hidden" in gN && (f = gN.hidden) : gN = S._data(g, "fxshow", {}),
            b && (gN.hidden = !f),
            f ? S(g).show() : dY.done(function() {
                S(g).hide()
            }),
            dY.done(function() {
                var R;
                S._removeData(g, "fxshow");
                for (R in h) S.style(g, R, h[R])
            });
            for (d in h) F = m(f ? gN[d] : 0, d, dY),
            d in gN || (gN[d] = F.start, f && (F.end = F.start, F.start = "width" === d || "height" === d ? 1 : 0))
        }
    }
    function o(g, R) {
        var gZ, d, L, b, F;
        for (gZ in g) if (d = S.camelCase(gZ), L = R[d], b = g[gZ], S.isArray(b) && (L = b[1], b = g[gZ] = b[0]), gZ !== d && (g[d] = b, delete g[gZ]), F = S.cssHooks[d], F && "expand" in F) {
            b = F.expand(b),
            delete g[d];
            for (gZ in b) gZ in g || (g[gZ] = b[gZ], R[gZ] = L)
        } else R[d] = L
    }
    function p(g, R, gZ) {
        var d, L, b = 0,
        F = p.prefilters.length,
        gj = S.Deferred().always(function() {
            delete dC.elem
        }),
        dC = function() {
            if (L) return ! 1;
            for (var R = Eg || k(), gZ = Math.max(0, e.startTime + e.duration - R), d = gZ / e.duration || 0, b = 1 - d, F = 0, dC = e.tweens.length; F < dC; F++) e.tweens[F].run(b);
            return gj.notifyWith(g, [e, b, gZ]),
            b < 1 && dC ? gZ: (gj.resolveWith(g, [e]), !1)
        },
        e = gj.promise({
            elem: g,
            props: S.extend({},
            R),
            opts: S.extend(!0, {
                specialEasing: {},
                easing: S.easing._default
            },
            gZ),
            originalProperties: R,
            originalOptions: gZ,
            startTime: Eg || k(),
            duration: gZ.duration,
            tweens: [],
            createTween: function(R, gZ) {
                var d = S.Tween(g, e.opts, R, gZ, e.opts.specialEasing[R] || e.opts.easing);
                return e.tweens.push(d),
                d
            },
            stop: function(R) {
                var gZ = 0,
                d = R ? e.tweens.length: 0;
                if (L) return this;
                for (L = !0; gZ < d; gZ++) e.tweens[gZ].run(1);
                return R ? (gj.notifyWith(g, [e, 1, 0]), gj.resolveWith(g, [e, R])) : gj.rejectWith(g, [e, R]),
                this
            }
        }),
        G = e.props;
        for (o(G, e.opts.specialEasing); b < F; b++) if (d = p.prefilters[b].call(e, g, G, e.opts)) return S.isFunction(d.stop) && (S._queueHooks(e.elem, e.opts.queue).stop = S.proxy(d.stop, d)),
        d;
        return S.map(G, m, e),
        S.isFunction(e.opts.start) && e.opts.start.call(g, e),
        S.fx.timer(S.extend(dC, {
            elem: g,
            anim: e,
            queue: e.opts.queue
        })),
        e.progress(e.opts.progress).done(e.opts.done, e.opts.complete).fail(e.opts.fail).always(e.opts.always)
    }
    function q(g) {
        return S.attr(g, "class") || ""
    }
    function r(g) {
        return function(R, gZ) {
            "string" != typeof R && (gZ = R, R = "*");
            var d, L = 0,
            b = R.toLowerCase().match(gjg) || [];
            if (S.isFunction(gZ)) for (; d = b[L++];)"+" === d.charAt(0) ? (d = d.slice(1) || "*", (g[d] = g[d] || []).unshift(gZ)) : (g[d] = g[d] || []).push(gZ)
        }
    }
    function s(g, R, gZ, d) {
        function L(gj) {
            var dC;
            return b[gj] = !0,
            S.each(g[gj] || [],
            function(g, gj) {
                var e = gj(R, gZ, d);
                return "string" != typeof e || F || b[e] ? F ? !(dC = e) : void 0 : (R.dataTypes.unshift(e), L(e), !1)
            }),
            dC
        }
        var b = {},
        F = g === dCR;
        return L(R.dataTypes[0]) || !b["*"] && L("*")
    }
    function t(g, R) {
        var gZ, d, L = S.ajaxSettings.flatOptions || {};
        for (d in R) void 0 !== R[d] && ((L[d] ? g: gZ || (gZ = {}))[d] = R[d]);
        return gZ && S.extend(!0, g, gZ),
        g
    }
    function u(g, R, gZ) {
        for (var d, L, b, F, gj = g.contents,
        dC = g.dataTypes;
        "*" === dC[0];) dC.shift(),
        void 0 === L && (L = g.mimeType || R.getResponseHeader("Content-Type"));
        if (L) for (F in gj) if (gj[F] && gj[F].test(L)) {
            dC.unshift(F);
            break
        }
        if (dC[0] in gZ) b = dC[0];
        else {
            for (F in gZ) {
                if (!dC[0] || g.converters[F + " " + dC[0]]) {
                    b = F;
                    break
                }
                d || (d = F)
            }
            b = b || d
        }
        if (b) return b !== dC[0] && dC.unshift(b),
        gZ[b]
    }
    function v(g, R, gZ, d) {
        var L, b, F, gj, dC, e = {},
        G = g.dataTypes.slice();
        if (G[1]) for (F in g.converters) e[F.toLowerCase()] = g.converters[F];
        for (b = G.shift(); b;) if (g.responseFields[b] && (gZ[g.responseFields[b]] = R), !dC && d && g.dataFilter && (R = g.dataFilter(R, g.dataType)), dC = b, b = G.shift()) if ("*" === b) b = dC;
        else if ("*" !== dC && dC !== b) {
            if (F = e[dC + " " + b] || e["* " + b], !F) for (L in e) if (gj = L.split(" "), gj[1] === b && (F = e[dC + " " + gj[0]] || e["* " + gj[0]])) {
                F === !0 ? F = e[L] : e[L] !== !0 && (b = gj[0], G.unshift(gj[1]));
                break
            }
            if (F !== !0) if (F && g["throws"]) R = F(R);
            else try {
                R = F(R)
            } catch(g) {
                return {
                    state: "parsererror",
                    error: F ? g: "No conversion from " + dC + " to " + b
                }
            }
        }
        return {
            state: "success",
            data: R
        }
    }
    function w(g) {
        return g.style && g.style.display || S.css(g, "display")
    }
    function x(g) {
        for (; g && 1 === g.nodeType;) {
            if ("none" === w(g) || "hidden" === g.type) return ! 0;
            g = g.parentNode
        }
        return ! 1
    }
    function y(g, R, gZ, d) {
        var L;
        if (S.isArray(R)) S.each(R,
        function(R, L) {
            gZ || bdR.test(g) ? d(g, L) : y(g + "[" + ("object" == typeof L && null != L ? R: "") + "]", L, gZ, d)
        });
        else if (gZ || "object" !== S.type(R)) d(g, R);
        else for (L in R) y(g + "[" + L + "]", R[L], gZ, d)
    }
    function z() {
        try {
            return new g.XMLHttpRequest
        } catch(g) {}
    }
    function A() {
        try {
            return new g.ActiveXObject("Microsoft.XMLHTTP")
        } catch(g) {}
    }
    function B(g) {
        return S.isWindow(g) ? g: 9 === g.nodeType && (g.defaultView || g.parentWindow)
    }
    var D = [],
    E = g.document,
    H = D.slice,
    I = D.concat,
    J = D.push,
    K = D.indexOf,
    M = {},
    N = M.toString,
    O = M.hasOwnProperty,
    P = {},
    Q = "1.12.3",
    S = function(g, R) {
        return new S.fn.init(g, R)
    },
    T = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
    U = /^-ms-/,
    V = /-([\da-z])/gi,
    W = function(g, R) {
        return R.toUpperCase()
    };
    S.fn = S.prototype = {
        jquery: Q,
        constructor: S,
        selector: "",
        length: 0,
        toArray: function() {
            return H.call(this)
        },
        get: function(g) {
            return null != g ? g < 0 ? this[g + this.length] : this[g] : H.call(this)
        },
        pushStack: function(g) {
            var R = S.merge(this.constructor(), g);
            return R.prevObject = this,
            R.context = this.context,
            R
        },
        each: function(g) {
            return S.each(this, g)
        },
        map: function(g) {
            return this.pushStack(S.map(this,
            function(R, gZ) {
                return g.call(R, gZ, R)
            }))
        },
        slice: function() {
            return this.pushStack(H.apply(this, arguments))
        },
        first: function() {
            return this.eq(0)
        },
        last: function() {
            return this.eq( - 1)
        },
        eq: function(g) {
            var R = this.length,
            gZ = +g + (g < 0 ? R: 0);
            return this.pushStack(gZ >= 0 && gZ < R ? [this[gZ]] : [])
        },
        end: function() {
            return this.prevObject || this.constructor()
        },
        push: J,
        sort: D.sort,
        splice: D.splice
    },
    S.extend = S.fn.extend = function() {
        var g, R, gZ, d, L, b, F = arguments[0] || {},
        gj = 1,
        dC = arguments.length,
        e = !1;
        for ("boolean" == typeof F && (e = F, F = arguments[gj] || {},
        gj++), "object" == typeof F || S.isFunction(F) || (F = {}), gj === dC && (F = this, gj--); gj < dC; gj++) if (null != (L = arguments[gj])) for (d in L) g = F[d],
        gZ = L[d],
        F !== gZ && (e && gZ && (S.isPlainObject(gZ) || (R = S.isArray(gZ))) ? (R ? (R = !1, b = g && S.isArray(g) ? g: []) : b = g && S.isPlainObject(g) ? g: {},
        F[d] = S.extend(e, b, gZ)) : void 0 !== gZ && (F[d] = gZ));
        return F
    },
    S.extend({
        expando: "jQuery" + (Q + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function(g) {
            throw new Error(g)
        },
        noop: function() {},
        isFunction: function(g) {
            return "function" === S.type(g)
        },
        isArray: Array.isArray ||
        function(g) {
            return "array" === S.type(g)
        },
        isWindow: function(g) {
            return null != g && g == g.window
        },
        isNumeric: function(g) {
            var R = g && g.toString();
            return ! S.isArray(g) && R - parseFloat(R) + 1 >= 0
        },
        isEmptyObject: function(g) {
            var R;
            for (R in g) return ! 1;
            return ! 0
        },
        isPlainObject: function(g) {
            var R;
            if (!g || "object" !== S.type(g) || g.nodeType || S.isWindow(g)) return ! 1;
            try {
                if (g.constructor && !O.call(g, "constructor") && !O.call(g.constructor.prototype, "isPrototypeOf")) return ! 1
            } catch(g) {
                return ! 1
            }
            if (!P.ownFirst) for (R in g) return O.call(g, R);
            for (R in g);
            return void 0 === R || O.call(g, R)
        },
        type: function(g) {
            return null == g ? g + "": "object" == typeof g || "function" == typeof g ? M[N.call(g)] || "object": typeof g
        },
        globalEval: function(R) {
            R && S.trim(R) && (g.execScript ||
            function(R) {
                g.eval.call(g, R)
            })(R)
        },
        camelCase: function(g) {
            return g.replace(U, "ms-").replace(V, W)
        },
        nodeName: function(g, R) {
            return g.nodeName && g.nodeName.toLowerCase() === R.toLowerCase()
        },
        each: function(g, R) {
            var d, L = 0;
            if (gZ(g)) for (d = g.length; L < d && R.call(g[L], L, g[L]) !== !1; L++);
            else for (L in g) if (R.call(g[L], L, g[L]) === !1) break;
            return g
        },
        trim: function(g) {
            return null == g ? "": (g + "").replace(T, "")
        },
        makeArray: function(g, R) {
            var d = R || [];
            return null != g && (gZ(Object(g)) ? S.merge(d, "string" == typeof g ? [g] : g) : J.call(d, g)),
            d
        },
        inArray: function(g, R, gZ) {
            var d;
            if (R) {
                if (K) return K.call(R, g, gZ);
                for (d = R.length, gZ = gZ ? gZ < 0 ? Math.max(0, d + gZ) : gZ: 0; gZ < d; gZ++) if (gZ in R && R[gZ] === g) return gZ
            }
            return - 1
        },
        merge: function(g, R) {
            for (var gZ = +R.length,
            d = 0,
            L = g.length; d < gZ;) g[L++] = R[d++];
            if (gZ !== gZ) for (; void 0 !== R[d];) g[L++] = R[d++];
            return g.length = L,
            g
        },
        grep: function(g, R, gZ) {
            for (var d, L = [], b = 0, F = g.length, gj = !gZ; b < F; b++) d = !R(g[b], b),
            d !== gj && L.push(g[b]);
            return L
        },
        map: function(g, R, d) {
            var L, b, F = 0,
            gj = [];
            if (gZ(g)) for (L = g.length; F < L; F++) b = R(g[F], F, d),
            null != b && gj.push(b);
            else for (F in g) b = R(g[F], F, d),
            null != b && gj.push(b);
            return I.apply([], gj)
        },
        guid: 1,
        proxy: function(g, R) {
            var gZ, d, L;
            if ("string" == typeof R && (L = g[R], R = g, g = L), S.isFunction(g)) return gZ = H.call(arguments, 2),
            d = function() {
                return g.apply(R || this, gZ.concat(H.call(arguments)))
            },
            d.guid = g.guid = g.guid || S.guid++,
            d
        },
        now: function() {
            return + new Date
        },
        support: P
    }),
    "function" == typeof Symbol && (S.fn[Symbol.iterator] = D[Symbol.iterator]),
    S.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),
    function(g, R) {
        M["[object " + R + "]"] = R.toLowerCase()
    });
    var X = function(g) {
        function R(g, R, gZ, d) {
            var L, b, F, gj, dC, e, dY, bd, f = R && R.ownerDocument,
            gN = R ? R.nodeType: 9;
            if (gZ = gZ || [], "string" != typeof g || !g || 1 !== gN && 9 !== gN && 11 !== gN) return gZ;
            if (!d && ((R ? R.ownerDocument || R: m) !== aY && eL(R), R = R || aY, cP)) {
                if (11 !== gN && (e = W.exec(g))) if (L = e[1]) {
                    if (9 === gN) {
                        if (! (F = R.getElementById(L))) return gZ;
                        if (F.id === L) return gZ.push(F),
                        gZ
                    } else if (f && (F = f.getElementById(L)) && k(R, F) && F.id === L) return gZ.push(F),
                    gZ
                } else {
                    if (e[2]) return y.apply(gZ, R.getElementsByTagName(g)),
                    gZ;
                    if ((L = e[3]) && aP.getElementsByClassName && R.getElementsByClassName) return y.apply(gZ, R.getElementsByClassName(L)),
                    gZ
                }
                if (aP.qsa && !r[g + " "] && (!bV || !bV.test(g))) {
                    if (1 !== gN) f = R,
                    bd = g;
                    else if ("object" !== R.nodeName.toLowerCase()) {
                        for ((gj = R.getAttribute("id")) ? gj = gj.replace(Z, "\\$&") : R.setAttribute("id", gj = l), dY = cR(g), b = dY.length, dC = Q.test(gj) ? "#" + gj: "[id='" + gj + "']"; b--;) dY[b] = dC + " " + h(dY[b]);
                        bd = dY.join(","),
                        f = X.test(g) && G(R.parentNode) || R
                    }
                    if (bd) try {
                        return y.apply(gZ, f.querySelectorAll(bd)),
                        gZ
                    } catch(g) {} finally {
                        gj === l && R.removeAttribute("id")
                    }
                }
            }
            return eT(g.replace(K, "$1"), R, gZ, d)
        }
        function gZ() {
            function g(gZ, d) {
                return R.push(gZ + " ") > eY.cacheLength && delete g[R.shift()],
                g[gZ + " "] = d
            }
            var R = [];
            return g
        }
        function d(g) {
            return g[l] = !0,
            g
        }
        function L(g) {
            var R = aY.createElement("div");
            try {
                return !! g(R)
            } catch(g) {
                return ! 1
            } finally {
                R.parentNode && R.parentNode.removeChild(R),
                R = null
            }
        }
        function b(g, R) {
            for (var gZ = g.split("|"), d = gZ.length; d--;) eY.attrHandle[gZ[d]] = R
        }
        function F(g, R) {
            var gZ = R && g,
            d = gZ && 1 === g.nodeType && 1 === R.nodeType && (~R.sourceIndex || t) - (~g.sourceIndex || t);
            if (d) return d;
            if (gZ) for (; gZ = gZ.nextSibling;) if (gZ === R) return - 1;
            return g ? 1 : -1
        }
        function gj(g) {
            return function(R) {
                var gZ = R.nodeName.toLowerCase();
                return "input" === gZ && R.type === g
            }
        }
        function dC(g) {
            return function(R) {
                var gZ = R.nodeName.toLowerCase();
                return ("input" === gZ || "button" === gZ) && R.type === g
            }
        }
        function e(g) {
            return d(function(R) {
                return R = +R,
                d(function(gZ, d) {
                    for (var L, b = g([], gZ.length, R), F = b.length; F--;) gZ[L = b[F]] && (gZ[L] = !(d[L] = gZ[L]))
                })
            })
        }
        function G(g) {
            return g && "undefined" != typeof g.getElementsByTagName && g
        }
        function dY() {}
        function h(g) {
            for (var R = 0,
            gZ = g.length,
            d = ""; R < gZ; R++) d += g[R].value;
            return d
        }
        function bd(g, R, gZ) {
            var d = R.dir,
            L = gZ && "parentNode" === d,
            b = o++;
            return R.first ?
            function(R, gZ, b) {
                for (; R = R[d];) if (1 === R.nodeType || L) return g(R, gZ, b)
            }: function(R, gZ, F) {
                var gj, dC, e, G = [n, b];
                if (F) {
                    for (; R = R[d];) if ((1 === R.nodeType || L) && g(R, gZ, F)) return ! 0
                } else for (; R = R[d];) if (1 === R.nodeType || L) {
                    if (e = R[l] || (R[l] = {}), dC = e[R.uniqueID] || (e[R.uniqueID] = {}), (gj = dC[d]) && gj[0] === n && gj[1] === b) return G[2] = gj[2];
                    if (dC[d] = G, G[2] = g(R, gZ, F)) return ! 0
                }
            }
        }
        function f(g) {
            return g.length > 1 ?
            function(R, gZ, d) {
                for (var L = g.length; L--;) if (!g[L](R, gZ, d)) return ! 1;
                return ! 0
            }: g[0]
        }
        function gN(g, gZ, d) {
            for (var L = 0,
            b = gZ.length; L < b; L++) R(g, gZ[L], d);
            return d
        }
        function c(g, R, gZ, d, L) {
            for (var b, F = [], gj = 0, dC = g.length, e = null != R; gj < dC; gj++)(b = g[gj]) && (gZ && !gZ(b, d, L) || (F.push(b), e && R.push(gj)));
            return F
        }
        function bdC(g, R, gZ, L, b, F) {
            return L && !L[l] && (L = bdC(L)),
            b && !b[l] && (b = bdC(b, F)),
            d(function(d, F, gj, dC) {
                var e, G, dY, h = [],
                bd = [],
                f = F.length,
                bdC = d || gN(R || "*", gj.nodeType ? [gj] : gj, []),
                a = !g || !d && R ? bdC: c(bdC, h, g, gj, dC),
                C = gZ ? b || (d ? g: f || L) ? [] : F: a;
                if (gZ && gZ(a, C, gj, dC), L) for (e = c(C, bd), L(e, [], gj, dC), G = e.length; G--;)(dY = e[G]) && (C[bd[G]] = !(a[bd[G]] = dY));
                if (d) {
                    if (b || g) {
                        if (b) {
                            for (e = [], G = C.length; G--;)(dY = C[G]) && e.push(a[G] = dY);
                            b(null, C = [], e, dC)
                        }
                        for (G = C.length; G--;)(dY = C[G]) && (e = b ? A(d, dY) : h[G]) > -1 && (d[e] = !(F[e] = dY))
                    }
                } else C = c(C === F ? C.splice(f, C.length) : C),
                b ? b(null, F, C, dC) : y.apply(F, C)
            })
        }
        function a(g) {
            for (var R, gZ, d, L = g.length,
            b = eY.relative[g[0].type], F = b || eY.relative[" "], gj = b ? 1 : 0, dC = bd(function(g) {
                return g === R
            },
            F, !0), e = bd(function(g) {
                return A(R, g) > -1
            },
            F, !0), G = [function(g, gZ, d) {
                var L = !b && (d || gZ !== gZb) || ((R = gZ).nodeType ? dC(g, gZ, d) : e(g, gZ, d));
                return R = null,
                L
            }]; gj < L; gj++) if (gZ = eY.relative[g[gj].type]) G = [bd(f(G), gZ)];
            else {
                if (gZ = eY.filter[g[gj].type].apply(null, g[gj].matches), gZ[l]) {
                    for (d = ++gj; d < L && !eY.relative[g[d].type]; d++);
                    return bdC(gj > 1 && f(G), gj > 1 && h(g.slice(0, gj - 1).concat({
                        value: " " === g[gj - 2].type ? "*": ""
                    })).replace(K, "$1"), gZ, gj < d && a(g.slice(gj, d)), d < L && a(g = g.slice(d)), d < L && h(g))
                }
                G.push(gZ)
            }
            return f(G)
        }
        function C(g, gZ) {
            var L = gZ.length > 0,
            b = g.length > 0,
            F = function(d, F, gj, dC, e) {
                var G, dY, h, bd = 0,
                f = "0",
                gN = d && [],
                bdC = [],
                a = gZb,
                C = d || b && eY.find.TAG("*", e),
                fD = n += null == a ? 1 : Math.random() || .1,
                aP = C.length;
                for (e && (gZb = F === aY || F || e); f !== aP && null != (G = C[f]); f++) {
                    if (b && G) {
                        for (dY = 0, F || G.ownerDocument === aY || (eL(G), gj = !cP); h = g[dY++];) if (h(G, F || aY, gj)) {
                            dC.push(G);
                            break
                        }
                        e && (n = fD)
                    }
                    L && ((G = !h && G) && bd--, d && gN.push(G))
                }
                if (bd += f, L && f !== bd) {
                    for (dY = 0; h = gZ[dY++];) h(gN, bdC, F, gj);
                    if (d) {
                        if (bd > 0) for (; f--;) gN[f] || bdC[f] || (bdC[f] = w.call(dC));
                        bdC = c(bdC)
                    }
                    y.apply(dC, bdC),
                    e && !d && bdC.length > 0 && bd + gZ.length > 1 && R.uniqueSort(dC)
                }
                return e && (n = fD, gZb = a),
                gN
            };
            return L ? d(F) : F
        }
        var fD, aP, eY, eH, fZ, cR, ce, eT, gZb, Y, dc, eL, aY, gX, cP, bV, i, j, k, l = "sizzle" + 1 * new Date,
        m = g.document,
        n = 0,
        o = 0,
        p = gZ(),
        q = gZ(),
        r = gZ(),
        s = function(g, R) {
            return g === R && (dc = !0),
            0
        },
        t = 1 << 31,
        u = {}.hasOwnProperty,
        v = [],
        w = v.pop,
        x = v.push,
        y = v.push,
        z = v.slice,
        A = function(g, R) {
            for (var gZ = 0,
            d = g.length; gZ < d; gZ++) if (g[gZ] === R) return gZ;
            return - 1
        },
        B = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
        D = "[\\x20\\t\\r\\n\\f]",
        E = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
        H = "\\[" + D + "*(" + E + ")(?:" + D + "*([*^$|!~]?=)" + D + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + E + "))|)" + D + "*\\]",
        I = ":(" + E + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + H + ")*)|.*)\\)|)",
        J = new RegExp(D + "+", "g"),
        K = new RegExp("^" + D + "+|((?:^|[^\\\\])(?:\\\\.)*)" + D + "+$", "g"),
        M = new RegExp("^" + D + "*," + D + "*"),
        N = new RegExp("^" + D + "*([>+~]|" + D + ")" + D + "*"),
        O = new RegExp("=" + D + "*([^\\]'\"]*?)" + D + "*\\]", "g"),
        P = new RegExp(I),
        Q = new RegExp("^" + E + "$"),
        S = {
            ID: new RegExp("^#(" + E + ")"),
            CLASS: new RegExp("^\\.(" + E + ")"),
            TAG: new RegExp("^(" + E + "|[*])"),
            ATTR: new RegExp("^" + H),
            PSEUDO: new RegExp("^" + I),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + D + "*(even|odd|(([+-]|)(\\d*)n|)" + D + "*(?:([+-]|)" + D + "*(\\d+)|))" + D + "*\\)|)", "i"),
            bool: new RegExp("^(?:" + B + ")$", "i"),
            needsContext: new RegExp("^" + D + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + D + "*((?:-\\d)?\\d*)" + D + "*\\)|)(?=[^-]|$)", "i")
        },
        T = /^(?:input|select|textarea|button)$/i,
        U = /^h\d$/i,
        V = /^[^{]+\{\s*\[native \w/,
        W = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
        X = /[+~]/,
        Z = /'|\\/g,
        $ = new RegExp("\\\\([\\da-f]{1,6}" + D + "?|(" + D + ")|.)", "ig"),
        _ = function(g, R, gZ) {
            var d = "0x" + R - 65536;
            return d !== d || gZ ? R: d < 0 ? String.fromCharCode(d + 65536) : String.fromCharCode(d >> 10 | 55296, 1023 & d | 56320)
        },
        gg = function() {
            eL()
        };
        try {
            y.apply(v = z.call(m.childNodes), m.childNodes),
            v[m.childNodes.length].nodeType
        } catch(g) {
            y = {
                apply: v.length ?
                function(g, R) {
                    x.apply(g, z.call(R))
                }: function(g, R) {
                    for (var gZ = g.length,
                    d = 0; g[gZ++] = R[d++];);
                    g.length = gZ - 1
                }
            }
        }
        aP = R.support = {},
        fZ = R.isXML = function(g) {
            var R = g && (g.ownerDocument || g).documentElement;
            return !! R && "HTML" !== R.nodeName
        },
        eL = R.setDocument = function(g) {
            var R, gZ, d = g ? g.ownerDocument || g: m;
            return d !== aY && 9 === d.nodeType && d.documentElement ? (aY = d, gX = aY.documentElement, cP = !fZ(aY), (gZ = aY.defaultView) && gZ.top !== gZ && (gZ.addEventListener ? gZ.addEventListener("unload", gg, !1) : gZ.attachEvent && gZ.attachEvent("onunload", gg)), aP.attributes = L(function(g) {
                return g.className = "i",
                !g.getAttribute("className")
            }), aP.getElementsByTagName = L(function(g) {
                return g.appendChild(aY.createComment("")),
                !g.getElementsByTagName("*").length
            }), aP.getElementsByClassName = V.test(aY.getElementsByClassName), aP.getById = L(function(g) {
                return gX.appendChild(g).id = l,
                !aY.getElementsByName || !aY.getElementsByName(l).length
            }), aP.getById ? (eY.find.ID = function(g, R) {
                if ("undefined" != typeof R.getElementById && cP) {
                    var gZ = R.getElementById(g);
                    return gZ ? [gZ] : []
                }
            },
            eY.filter.ID = function(g) {
                var R = g.replace($, _);
                return function(g) {
                    return g.getAttribute("id") === R
                }
            }) : (delete eY.find.ID, eY.filter.ID = function(g) {
                var R = g.replace($, _);
                return function(g) {
                    var gZ = "undefined" != typeof g.getAttributeNode && g.getAttributeNode("id");
                    return gZ && gZ.value === R
                }
            }), eY.find.TAG = aP.getElementsByTagName ?
            function(g, R) {
                return "undefined" != typeof R.getElementsByTagName ? R.getElementsByTagName(g) : aP.qsa ? R.querySelectorAll(g) : void 0
            }: function(g, R) {
                var gZ, d = [],
                L = 0,
                b = R.getElementsByTagName(g);
                if ("*" === g) {
                    for (; gZ = b[L++];) 1 === gZ.nodeType && d.push(gZ);
                    return d
                }
                return b
            },
            eY.find.CLASS = aP.getElementsByClassName &&
            function(g, R) {
                if ("undefined" != typeof R.getElementsByClassName && cP) return R.getElementsByClassName(g)
            },
            i = [], bV = [], (aP.qsa = V.test(aY.querySelectorAll)) && (L(function(g) {
                gX.appendChild(g).innerHTML = "<a id='" + l + "'></a><select id='" + l + "-\r\\' msallowcapture=''><option selected=''></option></select>",
                g.querySelectorAll("[msallowcapture^='']").length && bV.push("[*^$]=" + D + "*(?:''|\"\")"),
                g.querySelectorAll("[selected]").length || bV.push("\\[" + D + "*(?:value|" + B + ")"),
                g.querySelectorAll("[id~=" + l + "-]").length || bV.push("~="),
                g.querySelectorAll(":checked").length || bV.push(":checked"),
                g.querySelectorAll("a#" + l + "+*").length || bV.push(".#.+[+~]")
            }), L(function(g) {
                var R = aY.createElement("input");
                R.setAttribute("type", "hidden"),
                g.appendChild(R).setAttribute("name", "D"),
                g.querySelectorAll("[name=d]").length && bV.push("name" + D + "*[*^$|!~]?="),
                g.querySelectorAll(":enabled").length || bV.push(":enabled", ":disabled"),
                g.querySelectorAll("*,:x"),
                bV.push(",.*:")
            })), (aP.matchesSelector = V.test(j = gX.matches || gX.webkitMatchesSelector || gX.mozMatchesSelector || gX.oMatchesSelector || gX.msMatchesSelector)) && L(function(g) {
                aP.disconnectedMatch = j.call(g, "div"),
                j.call(g, "[s!='']:x"),
                i.push("!=", I)
            }), bV = bV.length && new RegExp(bV.join("|")), i = i.length && new RegExp(i.join("|")), R = V.test(gX.compareDocumentPosition), k = R || V.test(gX.contains) ?
            function(g, R) {
                var gZ = 9 === g.nodeType ? g.documentElement: g,
                d = R && R.parentNode;
                return g === d || !(!d || 1 !== d.nodeType || !(gZ.contains ? gZ.contains(d) : g.compareDocumentPosition && 16 & g.compareDocumentPosition(d)))
            }: function(g, R) {
                if (R) for (; R = R.parentNode;) if (R === g) return ! 0;
                return ! 1
            },
            s = R ?
            function(g, R) {
                if (g === R) return dc = !0,
                0;
                var gZ = !g.compareDocumentPosition - !R.compareDocumentPosition;
                return gZ ? gZ: (gZ = (g.ownerDocument || g) === (R.ownerDocument || R) ? g.compareDocumentPosition(R) : 1, 1 & gZ || !aP.sortDetached && R.compareDocumentPosition(g) === gZ ? g === aY || g.ownerDocument === m && k(m, g) ? -1 : R === aY || R.ownerDocument === m && k(m, R) ? 1 : Y ? A(Y, g) - A(Y, R) : 0 : 4 & gZ ? -1 : 1)
            }: function(g, R) {
                if (g === R) return dc = !0,
                0;
                var gZ, d = 0,
                L = g.parentNode,
                b = R.parentNode,
                gj = [g],
                dC = [R];
                if (!L || !b) return g === aY ? -1 : R === aY ? 1 : L ? -1 : b ? 1 : Y ? A(Y, g) - A(Y, R) : 0;
                if (L === b) return F(g, R);
                for (gZ = g; gZ = gZ.parentNode;) gj.unshift(gZ);
                for (gZ = R; gZ = gZ.parentNode;) dC.unshift(gZ);
                for (; gj[d] === dC[d];) d++;
                return d ? F(gj[d], dC[d]) : gj[d] === m ? -1 : dC[d] === m ? 1 : 0
            },
            aY) : aY
        },
        R.matches = function(g, gZ) {
            return R(g, null, null, gZ)
        },
        R.matchesSelector = function(g, gZ) {
            if ((g.ownerDocument || g) !== aY && eL(g), gZ = gZ.replace(O, "='$1']"), aP.matchesSelector && cP && !r[gZ + " "] && (!i || !i.test(gZ)) && (!bV || !bV.test(gZ))) try {
                var d = j.call(g, gZ);
                if (d || aP.disconnectedMatch || g.document && 11 !== g.document.nodeType) return d
            } catch(g) {}
            return R(gZ, aY, null, [g]).length > 0
        },
        R.contains = function(g, R) {
            return (g.ownerDocument || g) !== aY && eL(g),
            k(g, R)
        },
        R.attr = function(g, R) { (g.ownerDocument || g) !== aY && eL(g);
            var gZ = eY.attrHandle[R.toLowerCase()],
            d = gZ && u.call(eY.attrHandle, R.toLowerCase()) ? gZ(g, R, !cP) : void 0;
            return void 0 !== d ? d: aP.attributes || !cP ? g.getAttribute(R) : (d = g.getAttributeNode(R)) && d.specified ? d.value: null
        },
        R.error = function(g) {
            throw new Error("Syntax error, unrecognized expression: " + g)
        },
        R.uniqueSort = function(g) {
            var R, gZ = [],
            d = 0,
            L = 0;
            if (dc = !aP.detectDuplicates, Y = !aP.sortStable && g.slice(0), g.sort(s), dc) {
                for (; R = g[L++];) R === g[L] && (d = gZ.push(L));
                for (; d--;) g.splice(gZ[d], 1)
            }
            return Y = null,
            g
        },
        eH = R.getText = function(g) {
            var R, gZ = "",
            d = 0,
            L = g.nodeType;
            if (L) {
                if (1 === L || 9 === L || 11 === L) {
                    if ("string" == typeof g.textContent) return g.textContent;
                    for (g = g.firstChild; g; g = g.nextSibling) gZ += eH(g)
                } else if (3 === L || 4 === L) return g.nodeValue
            } else for (; R = g[d++];) gZ += eH(R);
            return gZ
        },
        eY = R.selectors = {
            cacheLength: 50,
            createPseudo: d,
            match: S,
            attrHandle: {},
            find: {},
            relative: {
                ">": {
                    dir: "parentNode",
                    first: !0
                },
                " ": {
                    dir: "parentNode"
                },
                "+": {
                    dir: "previousSibling",
                    first: !0
                },
                "~": {
                    dir: "previousSibling"
                }
            },
            preFilter: {
                ATTR: function(g) {
                    return g[1] = g[1].replace($, _),
                    g[3] = (g[3] || g[4] || g[5] || "").replace($, _),
                    "~=" === g[2] && (g[3] = " " + g[3] + " "),
                    g.slice(0, 4)
                },
                CHILD: function(g) {
                    return g[1] = g[1].toLowerCase(),
                    "nth" === g[1].slice(0, 3) ? (g[3] || R.error(g[0]), g[4] = +(g[4] ? g[5] + (g[6] || 1) : 2 * ("even" === g[3] || "odd" === g[3])), g[5] = +(g[7] + g[8] || "odd" === g[3])) : g[3] && R.error(g[0]),
                    g
                },
                PSEUDO: function(g) {
                    var R, gZ = !g[6] && g[2];
                    return S.CHILD.test(g[0]) ? null: (g[3] ? g[2] = g[4] || g[5] || "": gZ && P.test(gZ) && (R = cR(gZ, !0)) && (R = gZ.indexOf(")", gZ.length - R) - gZ.length) && (g[0] = g[0].slice(0, R), g[2] = gZ.slice(0, R)), g.slice(0, 3))
                }
            },
            filter: {
                TAG: function(g) {
                    var R = g.replace($, _).toLowerCase();
                    return "*" === g ?
                    function() {
                        return ! 0
                    }: function(g) {
                        return g.nodeName && g.nodeName.toLowerCase() === R
                    }
                },
                CLASS: function(g) {
                    var R = p[g + " "];
                    return R || (R = new RegExp("(^|" + D + ")" + g + "(" + D + "|$)")) && p(g,
                    function(g) {
                        return R.test("string" == typeof g.className && g.className || "undefined" != typeof g.getAttribute && g.getAttribute("class") || "")
                    })
                },
                ATTR: function(g, gZ, d) {
                    return function(L) {
                        var b = R.attr(L, g);
                        return null == b ? "!=" === gZ: !gZ || (b += "", "=" === gZ ? b === d: "!=" === gZ ? b !== d: "^=" === gZ ? d && 0 === b.indexOf(d) : "*=" === gZ ? d && b.indexOf(d) > -1 : "$=" === gZ ? d && b.slice( - d.length) === d: "~=" === gZ ? (" " + b.replace(J, " ") + " ").indexOf(d) > -1 : "|=" === gZ && (b === d || b.slice(0, d.length + 1) === d + "-"))
                    }
                },
                CHILD: function(g, R, gZ, d, L) {
                    var b = "nth" !== g.slice(0, 3),
                    F = "last" !== g.slice( - 4),
                    gj = "of-type" === R;
                    return 1 === d && 0 === L ?
                    function(g) {
                        return !! g.parentNode
                    }: function(R, gZ, dC) {
                        var e, G, dY, h, bd, f, gN = b !== F ? "nextSibling": "previousSibling",
                        c = R.parentNode,
                        bdC = gj && R.nodeName.toLowerCase(),
                        a = !dC && !gj,
                        C = !1;
                        if (c) {
                            if (b) {
                                for (; gN;) {
                                    for (h = R; h = h[gN];) if (gj ? h.nodeName.toLowerCase() === bdC: 1 === h.nodeType) return ! 1;
                                    f = gN = "only" === g && !f && "nextSibling"
                                }
                                return ! 0
                            }
                            if (f = [F ? c.firstChild: c.lastChild], F && a) {
                                for (h = c, dY = h[l] || (h[l] = {}), G = dY[h.uniqueID] || (dY[h.uniqueID] = {}), e = G[g] || [], bd = e[0] === n && e[1], C = bd && e[2], h = bd && c.childNodes[bd]; h = ++bd && h && h[gN] || (C = bd = 0) || f.pop();) if (1 === h.nodeType && ++C && h === R) {
                                    G[g] = [n, bd, C];
                                    break
                                }
                            } else if (a && (h = R, dY = h[l] || (h[l] = {}), G = dY[h.uniqueID] || (dY[h.uniqueID] = {}), e = G[g] || [], bd = e[0] === n && e[1], C = bd), C === !1) for (; (h = ++bd && h && h[gN] || (C = bd = 0) || f.pop()) && ((gj ? h.nodeName.toLowerCase() !== bdC: 1 !== h.nodeType) || !++C || (a && (dY = h[l] || (h[l] = {}), G = dY[h.uniqueID] || (dY[h.uniqueID] = {}), G[g] = [n, C]), h !== R)););
                            return C -= L,
                            C === d || C % d === 0 && C / d >= 0
                        }
                    }
                },
                PSEUDO: function(g, gZ) {
                    var L, b = eY.pseudos[g] || eY.setFilters[g.toLowerCase()] || R.error("unsupported pseudo: " + g);
                    return b[l] ? b(gZ) : b.length > 1 ? (L = [g, g, "", gZ], eY.setFilters.hasOwnProperty(g.toLowerCase()) ? d(function(g, R) {
                        for (var d, L = b(g, gZ), F = L.length; F--;) d = A(g, L[F]),
                        g[d] = !(R[d] = L[F])
                    }) : function(g) {
                        return b(g, 0, L)
                    }) : b
                }
            },
            pseudos: {
                not: d(function(g) {
                    var R = [],
                    gZ = [],
                    L = ce(g.replace(K, "$1"));
                    return L[l] ? d(function(g, R, gZ, d) {
                        for (var b, F = L(g, null, d, []), gj = g.length; gj--;)(b = F[gj]) && (g[gj] = !(R[gj] = b))
                    }) : function(g, d, b) {
                        return R[0] = g,
                        L(R, null, b, gZ),
                        R[0] = null,
                        !gZ.pop()
                    }
                }),
                has: d(function(g) {
                    return function(gZ) {
                        return R(g, gZ).length > 0
                    }
                }),
                contains: d(function(g) {
                    return g = g.replace($, _),
                    function(R) {
                        return (R.textContent || R.innerText || eH(R)).indexOf(g) > -1
                    }
                }),
                lang: d(function(g) {
                    return Q.test(g || "") || R.error("unsupported lang: " + g),
                    g = g.replace($, _).toLowerCase(),
                    function(R) {
                        var gZ;
                        do {
                            if (gZ = cP ? R.lang: R.getAttribute("xml:lang") || R.getAttribute("lang")) return gZ = gZ.toLowerCase(), gZ === g || 0 === gZ.indexOf(g + "-")
                        } while (( R = R . parentNode ) && 1 === R.nodeType);
                        return ! 1
                    }
                }),
                target: function(R) {
                    var gZ = g.location && g.location.hash;
                    return gZ && gZ.slice(1) === R.id
                },
                root: function(g) {
                    return g === gX
                },
                focus: function(g) {
                    return g === aY.activeElement && (!aY.hasFocus || aY.hasFocus()) && !!(g.type || g.href || ~g.tabIndex)
                },
                enabled: function(g) {
                    return g.disabled === !1
                },
                disabled: function(g) {
                    return g.disabled === !0
                },
                checked: function(g) {
                    var R = g.nodeName.toLowerCase();
                    return "input" === R && !!g.checked || "option" === R && !!g.selected
                },
                selected: function(g) {
                    return g.parentNode && g.parentNode.selectedIndex,
                    g.selected === !0
                },
                empty: function(g) {
                    for (g = g.firstChild; g; g = g.nextSibling) if (g.nodeType < 6) return ! 1;
                    return ! 0
                },
                parent: function(g) {
                    return ! eY.pseudos.empty(g)
                },
                header: function(g) {
                    return U.test(g.nodeName)
                },
                input: function(g) {
                    return T.test(g.nodeName)
                },
                button: function(g) {
                    var R = g.nodeName.toLowerCase();
                    return "input" === R && "button" === g.type || "button" === R
                },
                text: function(g) {
                    var R;
                    return "input" === g.nodeName.toLowerCase() && "text" === g.type && (null == (R = g.getAttribute("type")) || "text" === R.toLowerCase())
                },
                first: e(function() {
                    return [0]
                }),
                last: e(function(g, R) {
                    return [R - 1]
                }),
                eq: e(function(g, R, gZ) {
                    return [gZ < 0 ? gZ + R: gZ]
                }),
                even: e(function(g, R) {
                    for (var gZ = 0; gZ < R; gZ += 2) g.push(gZ);
                    return g
                }),
                odd: e(function(g, R) {
                    for (var gZ = 1; gZ < R; gZ += 2) g.push(gZ);
                    return g
                }),
                lt: e(function(g, R, gZ) {
                    for (var d = gZ < 0 ? gZ + R: gZ; --d >= 0;) g.push(d);
                    return g
                }),
                gt: e(function(g, R, gZ) {
                    for (var d = gZ < 0 ? gZ + R: gZ; ++d < R;) g.push(d);
                    return g
                })
            }
        },
        eY.pseudos.nth = eY.pseudos.eq;
        for (fD in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0
        }) eY.pseudos[fD] = gj(fD);
        for (fD in {
            submit: !0,
            reset: !0
        }) eY.pseudos[fD] = dC(fD);
        return dY.prototype = eY.filters = eY.pseudos,
        eY.setFilters = new dY,
        cR = R.tokenize = function(g, gZ) {
            var d, L, b, F, gj, dC, e, G = q[g + " "];
            if (G) return gZ ? 0 : G.slice(0);
            for (gj = g, dC = [], e = eY.preFilter; gj;) {
                d && !(L = M.exec(gj)) || (L && (gj = gj.slice(L[0].length) || gj), dC.push(b = [])),
                d = !1,
                (L = N.exec(gj)) && (d = L.shift(), b.push({
                    value: d,
                    type: L[0].replace(K, " ")
                }), gj = gj.slice(d.length));
                for (F in eY.filter) ! (L = S[F].exec(gj)) || e[F] && !(L = e[F](L)) || (d = L.shift(), b.push({
                    value: d,
                    type: F,
                    matches: L
                }), gj = gj.slice(d.length));
                if (!d) break
            }
            return gZ ? gj.length: gj ? R.error(g) : q(g, dC).slice(0)
        },
        ce = R.compile = function(g, R) {
            var gZ, d = [],
            L = [],
            b = r[g + " "];
            if (!b) {
                for (R || (R = cR(g)), gZ = R.length; gZ--;) b = a(R[gZ]),
                b[l] ? d.push(b) : L.push(b);
                b = r(g, C(L, d)),
                b.selector = g
            }
            return b
        },
        eT = R.select = function(g, R, gZ, d) {
            var L, b, F, gj, dC, e = "function" == typeof g && g,
            dY = !d && cR(g = e.selector || g);
            if (gZ = gZ || [], 1 === dY.length) {
                if (b = dY[0] = dY[0].slice(0), b.length > 2 && "ID" === (F = b[0]).type && aP.getById && 9 === R.nodeType && cP && eY.relative[b[1].type]) {
                    if (R = (eY.find.ID(F.matches[0].replace($, _), R) || [])[0], !R) return gZ;
                    e && (R = R.parentNode),
                    g = g.slice(b.shift().value.length)
                }
                for (L = S.needsContext.test(g) ? 0 : b.length; L--&&(F = b[L], !eY.relative[gj = F.type]);) if ((dC = eY.find[gj]) && (d = dC(F.matches[0].replace($, _), X.test(b[0].type) && G(R.parentNode) || R))) {
                    if (b.splice(L, 1), g = d.length && h(b), !g) return y.apply(gZ, d),
                    gZ;
                    break
                }
            }
            return (e || ce(g, dY))(d, R, !cP, gZ, !R || X.test(g) && G(R.parentNode) || R),
            gZ
        },
        aP.sortStable = l.split("").sort(s).join("") === l,
        aP.detectDuplicates = !!dc,
        eL(),
        aP.sortDetached = L(function(g) {
            return 1 & g.compareDocumentPosition(aY.createElement("div"))
        }),
        L(function(g) {
            return g.innerHTML = "<a href='#'></a>",
            "#" === g.firstChild.getAttribute("href")
        }) || b("type|href|height|width",
        function(g, R, gZ) {
            if (!gZ) return g.getAttribute(R, "type" === R.toLowerCase() ? 1 : 2)
        }),
        aP.attributes && L(function(g) {
            return g.innerHTML = "<input/>",
            g.firstChild.setAttribute("value", ""),
            "" === g.firstChild.getAttribute("value")
        }) || b("value",
        function(g, R, gZ) {
            if (!gZ && "input" === g.nodeName.toLowerCase()) return g.defaultValue
        }),
        L(function(g) {
            return null == g.getAttribute("disabled")
        }) || b(B,
        function(g, R, gZ) {
            var d;
            if (!gZ) return g[R] === !0 ? R.toLowerCase() : (d = g.getAttributeNode(R)) && d.specified ? d.value: null
        }),
        R
    } (g);
    S.find = X,
    S.expr = X.selectors,
    S.expr[":"] = S.expr.pseudos,
    S.uniqueSort = S.unique = X.uniqueSort,
    S.text = X.getText,
    S.isXMLDoc = X.isXML,
    S.contains = X.contains;
    var Z = function(g, R, gZ) {
        for (var d = [], L = void 0 !== gZ; (g = g[R]) && 9 !== g.nodeType;) if (1 === g.nodeType) {
            if (L && S(g).is(gZ)) break;
            d.push(g)
        }
        return d
    },
    $ = function(g, R) {
        for (var gZ = []; g; g = g.nextSibling) 1 === g.nodeType && g !== R && gZ.push(g);
        return gZ
    },
    _ = S.expr.match.needsContext,
    gg = /^<([\w-]+)\s*\/?>(?:<\/\1>|)$/,
    Rg = /^.[^:#\[\.,]*$/;
    S.filter = function(g, R, gZ) {
        var d = R[0];
        return gZ && (g = ":not(" + g + ")"),
        1 === R.length && 1 === d.nodeType ? S.find.matchesSelector(d, g) ? [d] : [] : S.find.matches(g, S.grep(R,
        function(g) {
            return 1 === g.nodeType
        }))
    },
    S.fn.extend({
        find: function(g) {
            var R, gZ = [],
            d = this,
            L = d.length;
            if ("string" != typeof g) return this.pushStack(S(g).filter(function() {
                for (R = 0; R < L; R++) if (S.contains(d[R], this)) return ! 0
            }));
            for (R = 0; R < L; R++) S.find(g, d[R], gZ);
            return gZ = this.pushStack(L > 1 ? S.unique(gZ) : gZ),
            gZ.selector = this.selector ? this.selector + " " + g: g,
            gZ
        },
        filter: function(g) {
            return this.pushStack(d(this, g || [], !1))
        },
        not: function(g) {
            return this.pushStack(d(this, g || [], !0))
        },
        is: function(g) {
            return !! d(this, "string" == typeof g && _.test(g) ? S(g) : g || [], !1).length
        }
    });
    var gZg, dg = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
    Lg = S.fn.init = function(g, R, gZ) {
        var d, L;
        if (!g) return this;
        if (gZ = gZ || gZg, "string" == typeof g) {
            if (d = "<" === g.charAt(0) && ">" === g.charAt(g.length - 1) && g.length >= 3 ? [null, g, null] : dg.exec(g), !d || !d[1] && R) return ! R || R.jquery ? (R || gZ).find(g) : this.constructor(R).find(g);
            if (d[1]) {
                if (R = R instanceof S ? R[0] : R, S.merge(this, S.parseHTML(d[1], R && R.nodeType ? R.ownerDocument || R: E, !0)), gg.test(d[1]) && S.isPlainObject(R)) for (d in R) S.isFunction(this[d]) ? this[d](R[d]) : this.attr(d, R[d]);
                return this
            }
            if (L = E.getElementById(d[2]), L && L.parentNode) {
                if (L.id !== d[2]) return gZg.find(g);
                this.length = 1,
                this[0] = L
            }
            return this.context = E,
            this.selector = g,
            this
        }
        return g.nodeType ? (this.context = this[0] = g, this.length = 1, this) : S.isFunction(g) ? "undefined" != typeof gZ.ready ? gZ.ready(g) : g(S) : (void 0 !== g.selector && (this.selector = g.selector, this.context = g.context), S.makeArray(g, this))
    };
    Lg.prototype = S.fn,
    gZg = S(E);
    var bg = /^(?:parents|prev(?:Until|All))/,
    Fg = {
        children: !0,
        contents: !0,
        next: !0,
        prev: !0
    };
    S.fn.extend({
        has: function(g) {
            var R, gZ = S(g, this),
            d = gZ.length;
            return this.filter(function() {
                for (R = 0; R < d; R++) if (S.contains(this, gZ[R])) return ! 0
            })
        },
        closest: function(g, R) {
            for (var gZ, d = 0,
            L = this.length,
            b = [], F = _.test(g) || "string" != typeof g ? S(g, R || this.context) : 0; d < L; d++) for (gZ = this[d]; gZ && gZ !== R; gZ = gZ.parentNode) if (gZ.nodeType < 11 && (F ? F.index(gZ) > -1 : 1 === gZ.nodeType && S.find.matchesSelector(gZ, g))) {
                b.push(gZ);
                break
            }
            return this.pushStack(b.length > 1 ? S.uniqueSort(b) : b)
        },
        index: function(g) {
            return g ? "string" == typeof g ? S.inArray(this[0], S(g)) : S.inArray(g.jquery ? g[0] : g, this) : this[0] && this[0].parentNode ? this.first().prevAll().length: -1
        },
        add: function(g, R) {
            return this.pushStack(S.uniqueSort(S.merge(this.get(), S(g, R))))
        },
        addBack: function(g) {
            return this.add(null == g ? this.prevObject: this.prevObject.filter(g))
        }
    }),
    S.each({
        parent: function(g) {
            var R = g.parentNode;
            return R && 11 !== R.nodeType ? R: null
        },
        parents: function(g) {
            return Z(g, "parentNode")
        },
        parentsUntil: function(g, R, gZ) {
            return Z(g, "parentNode", gZ)
        },
        next: function(g) {
            return L(g, "nextSibling")
        },
        prev: function(g) {
            return L(g, "previousSibling")
        },
        nextAll: function(g) {
            return Z(g, "nextSibling")
        },
        prevAll: function(g) {
            return Z(g, "previousSibling")
        },
        nextUntil: function(g, R, gZ) {
            return Z(g, "nextSibling", gZ)
        },
        prevUntil: function(g, R, gZ) {
            return Z(g, "previousSibling", gZ)
        },
        siblings: function(g) {
            return $((g.parentNode || {}).firstChild, g)
        },
        children: function(g) {
            return $(g.firstChild)
        },
        contents: function(g) {
            return S.nodeName(g, "iframe") ? g.contentDocument || g.contentWindow.document: S.merge([], g.childNodes)
        }
    },
    function(g, R) {
        S.fn[g] = function(gZ, d) {
            var L = S.map(this, R, gZ);
            return "Until" !== g.slice( - 5) && (d = gZ),
            d && "string" == typeof d && (L = S.filter(d, L)),
            this.length > 1 && (Fg[g] || (L = S.uniqueSort(L)), bg.test(g) && (L = L.reverse())),
            this.pushStack(L)
        }
    });
    var gjg = /\S+/g;
    S.Callbacks = function(g) {
        g = "string" == typeof g ? b(g) : S.extend({},
        g);
        var R, gZ, d, L, F = [],
        gj = [],
        dC = -1,
        e = function() {
            for (L = g.once, d = R = !0; gj.length; dC = -1) for (gZ = gj.shift(); ++dC < F.length;) F[dC].apply(gZ[0], gZ[1]) === !1 && g.stopOnFalse && (dC = F.length, gZ = !1);
            g.memory || (gZ = !1),
            R = !1,
            L && (F = gZ ? [] : "")
        },
        G = {
            add: function() {
                return F && (gZ && !R && (dC = F.length - 1, gj.push(gZ)),
                function R(gZ) {
                    S.each(gZ,
                    function(gZ, d) {
                        S.isFunction(d) ? g.unique && G.has(d) || F.push(d) : d && d.length && "string" !== S.type(d) && R(d)
                    })
                } (arguments), gZ && !R && e()),
                this
            },
            remove: function() {
                return S.each(arguments,
                function(g, R) {
                    for (var gZ; (gZ = S.inArray(R, F, gZ)) > -1;) F.splice(gZ, 1),
                    gZ <= dC && dC--
                }),
                this
            },
            has: function(g) {
                return g ? S.inArray(g, F) > -1 : F.length > 0
            },
            empty: function() {
                return F && (F = []),
                this
            },
            disable: function() {
                return L = gj = [],
                F = gZ = "",
                this
            },
            disabled: function() {
                return ! F
            },
            lock: function() {
                return L = !0,
                gZ || G.disable(),
                this
            },
            locked: function() {
                return !! L
            },
            fireWith: function(g, gZ) {
                return L || (gZ = gZ || [], gZ = [g, gZ.slice ? gZ.slice() : gZ], gj.push(gZ), R || e()),
                this
            },
            fire: function() {
                return G.fireWith(this, arguments),
                this
            },
            fired: function() {
                return !! d
            }
        };
        return G
    },
    S.extend({
        Deferred: function(g) {
            var R = [["resolve", "done", S.Callbacks("once memory"), "resolved"], ["reject", "fail", S.Callbacks("once memory"), "rejected"], ["notify", "progress", S.Callbacks("memory")]],
            gZ = "pending",
            d = {
                state: function() {
                    return gZ
                },
                always: function() {
                    return L.done(arguments).fail(arguments),
                    this
                },
                then: function() {
                    var g = arguments;
                    return S.Deferred(function(gZ) {
                        S.each(R,
                        function(R, b) {
                            var F = S.isFunction(g[R]) && g[R];
                            L[b[1]](function() {
                                var g = F && F.apply(this, arguments);
                                g && S.isFunction(g.promise) ? g.promise().progress(gZ.notify).done(gZ.resolve).fail(gZ.reject) : gZ[b[0] + "With"](this === d ? gZ.promise() : this, F ? [g] : arguments)
                            })
                        }),
                        g = null
                    }).promise()
                },
                promise: function(g) {
                    return null != g ? S.extend(g, d) : d
                }
            },
            L = {};
            return d.pipe = d.then,
            S.each(R,
            function(g, b) {
                var F = b[2],
                gj = b[3];
                d[b[1]] = F.add,
                gj && F.add(function() {
                    gZ = gj
                },
                R[1 ^ g][2].disable, R[2][2].lock),
                L[b[0]] = function() {
                    return L[b[0] + "With"](this === L ? d: this, arguments),
                    this
                },
                L[b[0] + "With"] = F.fireWith
            }),
            d.promise(L),
            g && g.call(L, L),
            L
        },
        when: function(g) {
            var R, gZ, d, L = 0,
            b = H.call(arguments),
            F = b.length,
            gj = 1 !== F || g && S.isFunction(g.promise) ? F: 0,
            dC = 1 === gj ? g: S.Deferred(),
            e = function(g, gZ, d) {
                return function(L) {
                    gZ[g] = this,
                    d[g] = arguments.length > 1 ? H.call(arguments) : L,
                    d === R ? dC.notifyWith(gZ, d) : --gj || dC.resolveWith(gZ, d)
                }
            };
            if (F > 1) for (R = new Array(F), gZ = new Array(F), d = new Array(F); L < F; L++) b[L] && S.isFunction(b[L].promise) ? b[L].promise().progress(e(L, gZ, R)).done(e(L, d, b)).fail(dC.reject) : --gj;
            return gj || dC.resolveWith(d, b),
            dC.promise()
        }
    });
    var dCg;
    S.fn.ready = function(g) {
        return S.ready.promise().done(g),
        this
    },
    S.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function(g) {
            g ? S.readyWait++:S.ready(!0)
        },
        ready: function(g) { (g === !0 ? --S.readyWait: S.isReady) || (S.isReady = !0, g !== !0 && --S.readyWait > 0 || (dCg.resolveWith(E, [S]), S.fn.triggerHandler && (S(E).triggerHandler("ready"), S(E).off("ready"))))
        }
    }),
    S.ready.promise = function(R) {
        if (!dCg) if (dCg = S.Deferred(), "complete" === E.readyState || "loading" !== E.readyState && !E.documentElement.doScroll) g.setTimeout(S.ready);
        else if (E.addEventListener) E.addEventListener("DOMContentLoaded", gj),
        g.addEventListener("load", gj);
        else {
            E.attachEvent("onreadystatechange", gj),
            g.attachEvent("onload", gj);
            var gZ = !1;
            try {
                gZ = null == g.frameElement && E.documentElement
            } catch(g) {}
            gZ && gZ.doScroll && !
            function R() {
                if (!S.isReady) {
                    try {
                        gZ.doScroll("left")
                    } catch(gZ) {
                        return g.setTimeout(R, 50)
                    }
                    F(),
                    S.ready()
                }
            } ()
        }
        return dCg.promise(R)
    },
    S.ready.promise();
    var eg;
    for (eg in S(P)) break;
    P.ownFirst = "0" === eg,
    P.inlineBlockNeedsLayout = !1,
    S(function() {
        var g, R, gZ, d;
        gZ = E.getElementsByTagName("body")[0],
        gZ && gZ.style && (R = E.createElement("div"), d = E.createElement("div"), d.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", gZ.appendChild(d).appendChild(R), "undefined" != typeof R.style.zoom && (R.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", P.inlineBlockNeedsLayout = g = 3 === R.offsetWidth, g && (gZ.style.zoom = 1)), gZ.removeChild(d))
    }),
    function() {
        var g = E.createElement("div");
        P.deleteExpando = !0;
        try {
            delete g.test
        } catch(g) {
            P.deleteExpando = !1
        }
        g = null
    } ();
    var Gg = function(g) {
        var R = S.noData[(g.nodeName + " ").toLowerCase()],
        gZ = +g.nodeType || 1;
        return (1 === gZ || 9 === gZ) && (!R || R !== !0 && g.getAttribute("classid") === R)
    },
    dYg = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
    hg = /([A-Z])/g;
    S.extend({
        cache: {},
        noData: {
            "applet ": !0,
            "embed ": !0,
            "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        },
        hasData: function(g) {
            return g = g.nodeType ? S.cache[g[S.expando]] : g[S.expando],
            !!g && !e(g)
        },
        data: function(g, R, gZ) {
            return G(g, R, gZ)
        },
        removeData: function(g, R) {
            return dY(g, R)
        },
        _data: function(g, R, gZ) {
            return G(g, R, gZ, !0)
        },
        _removeData: function(g, R) {
            return dY(g, R, !0)
        }
    }),
    S.fn.extend({
        data: function(g, R) {
            var gZ, d, L, b = this[0],
            F = b && b.attributes;
            if (void 0 === g) {
                if (this.length && (L = S.data(b), 1 === b.nodeType && !S._data(b, "parsedAttrs"))) {
                    for (gZ = F.length; gZ--;) F[gZ] && (d = F[gZ].name, 0 === d.indexOf("data-") && (d = S.camelCase(d.slice(5)), dC(b, d, L[d])));
                    S._data(b, "parsedAttrs", !0)
                }
                return L
            }
            return "object" == typeof g ? this.each(function() {
                S.data(this, g)
            }) : arguments.length > 1 ? this.each(function() {
                S.data(this, g, R)
            }) : b ? dC(b, g, S.data(b, g)) : void 0
        },
        removeData: function(g) {
            return this.each(function() {
                S.removeData(this, g)
            })
        }
    }),
    S.extend({
        queue: function(g, R, gZ) {
            var d;
            if (g) return R = (R || "fx") + "queue",
            d = S._data(g, R),
            gZ && (!d || S.isArray(gZ) ? d = S._data(g, R, S.makeArray(gZ)) : d.push(gZ)),
            d || []
        },
        dequeue: function(g, R) {
            R = R || "fx";
            var gZ = S.queue(g, R),
            d = gZ.length,
            L = gZ.shift(),
            b = S._queueHooks(g, R),
            F = function() {
                S.dequeue(g, R)
            };
            "inprogress" === L && (L = gZ.shift(), d--),
            L && ("fx" === R && gZ.unshift("inprogress"), delete b.stop, L.call(g, F, b)),
            !d && b && b.empty.fire()
        },
        _queueHooks: function(g, R) {
            var gZ = R + "queueHooks";
            return S._data(g, gZ) || S._data(g, gZ, {
                empty: S.Callbacks("once memory").add(function() {
                    S._removeData(g, R + "queue"),
                    S._removeData(g, gZ)
                })
            })
        }
    }),
    S.fn.extend({
        queue: function(g, R) {
            var gZ = 2;
            return "string" != typeof g && (R = g, g = "fx", gZ--),
            arguments.length < gZ ? S.queue(this[0], g) : void 0 === R ? this: this.each(function() {
                var gZ = S.queue(this, g, R);
                S._queueHooks(this, g),
                "fx" === g && "inprogress" !== gZ[0] && S.dequeue(this, g)
            })
        },
        dequeue: function(g) {
            return this.each(function() {
                S.dequeue(this, g)
            })
        },
        clearQueue: function(g) {
            return this.queue(g || "fx", [])
        },
        promise: function(g, R) {
            var gZ, d = 1,
            L = S.Deferred(),
            b = this,
            F = this.length,
            gj = function() {--d || L.resolveWith(b, [b])
            };
            for ("string" != typeof g && (R = g, g = void 0), g = g || "fx"; F--;) gZ = S._data(b[F], g + "queueHooks"),
            gZ && gZ.empty && (d++, gZ.empty.add(gj));
            return gj(),
            L.promise(R)
        }
    }),
    function() {
        var g;
        P.shrinkWrapBlocks = function() {
            if (null != g) return g;
            g = !1;
            var R, gZ, d;
            return gZ = E.getElementsByTagName("body")[0],
            gZ && gZ.style ? (R = E.createElement("div"), d = E.createElement("div"), d.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", gZ.appendChild(d).appendChild(R), "undefined" != typeof R.style.zoom && (R.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", R.appendChild(E.createElement("div")).style.width = "5px", g = 3 !== R.offsetWidth), gZ.removeChild(d), g) : void 0
        }
    } ();
    var bdg = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
    fg = new RegExp("^(?:([+-])=|)(" + bdg + ")([a-z%]*)$", "i"),
    gNg = ["Top", "Right", "Bottom", "Left"],
    cg = function(g, R) {
        return g = R || g,
        "none" === S.css(g, "display") || !S.contains(g.ownerDocument, g)
    },
    bdCg = function(g, R, gZ, d, L, b, F) {
        var gj = 0,
        dC = g.length,
        e = null == gZ;
        if ("object" === S.type(gZ)) {
            L = !0;
            for (gj in gZ) bdCg(g, R, gj, gZ[gj], !0, b, F)
        } else if (void 0 !== d && (L = !0, S.isFunction(d) || (F = !0), e && (F ? (R.call(g, d), R = null) : (e = R, R = function(g, R, gZ) {
            return e.call(S(g), gZ)
        })), R)) for (; gj < dC; gj++) R(g[gj], gZ, F ? d: d.call(g[gj], gj, R(g[gj], gZ)));
        return L ? g: e ? R.call(g) : dC ? R(g[0], gZ) : b
    },
    ag = /^(?:checkbox|radio)$/i,
    Cg = /<([\w:-]+)/,
    fDg = /^$|\/(?:java|ecma)script/i,
    aPg = /^\s+/,
    eYg = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|dialog|figcaption|figure|footer|header|hgroup|main|mark|meter|nav|output|picture|progress|section|summary|template|time|video"; !
    function() {
        var g = E.createElement("div"),
        R = E.createDocumentFragment(),
        gZ = E.createElement("input");
        g.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",
        P.leadingWhitespace = 3 === g.firstChild.nodeType,
        P.tbody = !g.getElementsByTagName("tbody").length,
        P.htmlSerialize = !!g.getElementsByTagName("link").length,
        P.html5Clone = "<:nav></:nav>" !== E.createElement("nav").cloneNode(!0).outerHTML,
        gZ.type = "checkbox",
        gZ.checked = !0,
        R.appendChild(gZ),
        P.appendChecked = gZ.checked,
        g.innerHTML = "<textarea>x</textarea>",
        P.noCloneChecked = !!g.cloneNode(!0).lastChild.defaultValue,
        R.appendChild(g),
        gZ = E.createElement("input"),
        gZ.setAttribute("type", "radio"),
        gZ.setAttribute("checked", "checked"),
        gZ.setAttribute("name", "t"),
        g.appendChild(gZ),
        P.checkClone = g.cloneNode(!0).cloneNode(!0).lastChild.checked,
        P.noCloneEvent = !!g.addEventListener,
        g[S.expando] = 1,
        P.attributes = !g.getAttribute(S.expando)
    } ();
    var eHg = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: P.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    };
    eHg.optgroup = eHg.option,
    eHg.tbody = eHg.tfoot = eHg.colgroup = eHg.caption = eHg.thead,
    eHg.th = eHg.td;
    var fZg = /<|&#?\w+;/,
    cRg = /<tbody/i; !
    function() {
        var R, gZ, d = E.createElement("div");
        for (R in {
            submit: !0,
            change: !0,
            focusin: !0
        }) gZ = "on" + R,
        (P[R] = gZ in g) || (d.setAttribute(gZ, "t"), P[R] = d.attributes[gZ].expando === !1);
        d = null
    } ();
    var ceg = /^(?:input|select|textarea)$/i,
    eTg = /^key/,
    gZbg = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
    Yg = /^(?:focusinfocus|focusoutblur)$/,
    dcg = /^([^.]*)(?:\.(.+)|)/;
    S.event = {
        global: {},
        add: function(g, R, gZ, d, L) {
            var b, F, gj, dC, e, G, dY, h, bd, f, gN, c = S._data(g);
            if (c) {
                for (gZ.handler && (dC = gZ, gZ = dC.handler, L = dC.selector), gZ.guid || (gZ.guid = S.guid++), (F = c.events) || (F = c.events = {}), (G = c.handle) || (G = c.handle = function(g) {
                    return "undefined" == typeof S || g && S.event.triggered === g.type ? void 0 : S.event.dispatch.apply(G.elem, arguments)
                },
                G.elem = g), R = (R || "").match(gjg) || [""], gj = R.length; gj--;) b = dcg.exec(R[gj]) || [],
                bd = gN = b[1],
                f = (b[2] || "").split(".").sort(),
                bd && (e = S.event.special[bd] || {},
                bd = (L ? e.delegateType: e.bindType) || bd, e = S.event.special[bd] || {},
                dY = S.extend({
                    type: bd,
                    origType: gN,
                    data: d,
                    handler: gZ,
                    guid: gZ.guid,
                    selector: L,
                    needsContext: L && S.expr.match.needsContext.test(L),
                    namespace: f.join(".")
                },
                dC), (h = F[bd]) || (h = F[bd] = [], h.delegateCount = 0, e.setup && e.setup.call(g, d, f, G) !== !1 || (g.addEventListener ? g.addEventListener(bd, G, !1) : g.attachEvent && g.attachEvent("on" + bd, G))), e.add && (e.add.call(g, dY), dY.handler.guid || (dY.handler.guid = gZ.guid)), L ? h.splice(h.delegateCount++, 0, dY) : h.push(dY), S.event.global[bd] = !0);
                g = null
            }
        },
        remove: function(g, R, gZ, d, L) {
            var b, F, gj, dC, e, G, dY, h, bd, f, gN, c = S.hasData(g) && S._data(g);
            if (c && (G = c.events)) {
                for (R = (R || "").match(gjg) || [""], e = R.length; e--;) if (gj = dcg.exec(R[e]) || [], bd = gN = gj[1], f = (gj[2] || "").split(".").sort(), bd) {
                    for (dY = S.event.special[bd] || {},
                    bd = (d ? dY.delegateType: dY.bindType) || bd, h = G[bd] || [], gj = gj[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), dC = b = h.length; b--;) F = h[b],
                    !L && gN !== F.origType || gZ && gZ.guid !== F.guid || gj && !gj.test(F.namespace) || d && d !== F.selector && ("**" !== d || !F.selector) || (h.splice(b, 1), F.selector && h.delegateCount--, dY.remove && dY.remove.call(g, F));
                    dC && !h.length && (dY.teardown && dY.teardown.call(g, f, c.handle) !== !1 || S.removeEvent(g, bd, c.handle), delete G[bd])
                } else for (bd in G) S.event.remove(g, bd + R[e], gZ, d, !0);
                S.isEmptyObject(G) && (delete c.handle, S._removeData(g, "events"))
            }
        },
        trigger: function(R, gZ, d, L) {
            var b, F, gj, dC, e, G, dY, h = [d || E],
            bd = O.call(R, "type") ? R.type: R,
            f = O.call(R, "namespace") ? R.namespace.split(".") : [];
            if (gj = G = d = d || E, 3 !== d.nodeType && 8 !== d.nodeType && !Yg.test(bd + S.event.triggered) && (bd.indexOf(".") > -1 && (f = bd.split("."), bd = f.shift(), f.sort()), F = bd.indexOf(":") < 0 && "on" + bd, R = R[S.expando] ? R: new S.Event(bd, "object" == typeof R && R), R.isTrigger = L ? 2 : 3, R.namespace = f.join("."), R.rnamespace = R.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, R.result = void 0, R.target || (R.target = d), gZ = null == gZ ? [R] : S.makeArray(gZ, [R]), e = S.event.special[bd] || {},
            L || !e.trigger || e.trigger.apply(d, gZ) !== !1)) {
                if (!L && !e.noBubble && !S.isWindow(d)) {
                    for (dC = e.delegateType || bd, Yg.test(dC + bd) || (gj = gj.parentNode); gj; gj = gj.parentNode) h.push(gj),
                    G = gj;
                    G === (d.ownerDocument || E) && h.push(G.defaultView || G.parentWindow || g)
                }
                for (dY = 0; (gj = h[dY++]) && !R.isPropagationStopped();) R.type = dY > 1 ? dC: e.bindType || bd,
                b = (S._data(gj, "events") || {})[R.type] && S._data(gj, "handle"),
                b && b.apply(gj, gZ),
                b = F && gj[F],
                b && b.apply && Gg(gj) && (R.result = b.apply(gj, gZ), R.result === !1 && R.preventDefault());
                if (R.type = bd, !L && !R.isDefaultPrevented() && (!e._default || e._default.apply(h.pop(), gZ) === !1) && Gg(d) && F && d[bd] && !S.isWindow(d)) {
                    G = d[F],
                    G && (d[F] = null),
                    S.event.triggered = bd;
                    try {
                        d[bd]()
                    } catch(g) {}
                    S.event.triggered = void 0,
                    G && (d[F] = G)
                }
                return R.result
            }
        },
        dispatch: function(g) {
            g = S.event.fix(g);
            var R, gZ, d, L, b, F = [],
            gj = H.call(arguments),
            dC = (S._data(this, "events") || {})[g.type] || [],
            e = S.event.special[g.type] || {};
            if (gj[0] = g, g.delegateTarget = this, !e.preDispatch || e.preDispatch.call(this, g) !== !1) {
                for (F = S.event.handlers.call(this, g, dC), R = 0; (L = F[R++]) && !g.isPropagationStopped();) for (g.currentTarget = L.elem, gZ = 0; (b = L.handlers[gZ++]) && !g.isImmediatePropagationStopped();) g.rnamespace && !g.rnamespace.test(b.namespace) || (g.handleObj = b, g.data = b.data, d = ((S.event.special[b.origType] || {}).handle || b.handler).apply(L.elem, gj), void 0 !== d && (g.result = d) === !1 && (g.preventDefault(), g.stopPropagation()));
                return e.postDispatch && e.postDispatch.call(this, g),
                g.result
            }
        },
        handlers: function(g, R) {
            var gZ, d, L, b, F = [],
            gj = R.delegateCount,
            dC = g.target;
            if (gj && dC.nodeType && ("click" !== g.type || isNaN(g.button) || g.button < 1)) for (; dC != this; dC = dC.parentNode || this) if (1 === dC.nodeType && (dC.disabled !== !0 || "click" !== g.type)) {
                for (d = [], gZ = 0; gZ < gj; gZ++) b = R[gZ],
                L = b.selector + " ",
                void 0 === d[L] && (d[L] = b.needsContext ? S(L, this).index(dC) > -1 : S.find(L, this, null, [dC]).length),
                d[L] && d.push(b);
                d.length && F.push({
                    elem: dC,
                    handlers: d
                })
            }
            return gj < R.length && F.push({
                elem: this,
                handlers: R.slice(gj)
            }),
            F
        },
        fix: function(g) {
            if (g[S.expando]) return g;
            var R, gZ, d, L = g.type,
            b = g,
            F = this.fixHooks[L];
            for (F || (this.fixHooks[L] = F = gZbg.test(L) ? this.mouseHooks: eTg.test(L) ? this.keyHooks: {}), d = F.props ? this.props.concat(F.props) : this.props, g = new S.Event(b), R = d.length; R--;) gZ = d[R],
            g[gZ] = b[gZ];
            return g.target || (g.target = b.srcElement || E),
            3 === g.target.nodeType && (g.target = g.target.parentNode),
            g.metaKey = !!g.metaKey,
            F.filter ? F.filter(g, b) : g
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget detail eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function(g, R) {
                return null == g.which && (g.which = null != R.charCode ? R.charCode: R.keyCode),
                g
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function(g, R) {
                var gZ, d, L, b = R.button,
                F = R.fromElement;
                return null == g.pageX && null != R.clientX && (d = g.target.ownerDocument || E, L = d.documentElement, gZ = d.body, g.pageX = R.clientX + (L && L.scrollLeft || gZ && gZ.scrollLeft || 0) - (L && L.clientLeft || gZ && gZ.clientLeft || 0), g.pageY = R.clientY + (L && L.scrollTop || gZ && gZ.scrollTop || 0) - (L && L.clientTop || gZ && gZ.clientTop || 0)),
                !g.relatedTarget && F && (g.relatedTarget = F === g.target ? R.toElement: F),
                g.which || void 0 === b || (g.which = 1 & b ? 1 : 2 & b ? 3 : 4 & b ? 2 : 0),
                g
            }
        },
        special: {
            load: {
                noBubble: !0
            },
            focus: {
                trigger: function() {
                    if (this !== fD() && this.focus) try {
                        return this.focus(),
                        !1
                    } catch(g) {}
                },
                delegateType: "focusin"
            },
            blur: {
                trigger: function() {
                    if (this === fD() && this.blur) return this.blur(),
                    !1
                },
                delegateType: "focusout"
            },
            click: {
                trigger: function() {
                    if (S.nodeName(this, "input") && "checkbox" === this.type && this.click) return this.click(),
                    !1
                },
                _default: function(g) {
                    return S.nodeName(g.target, "a")
                }
            },
            beforeunload: {
                postDispatch: function(g) {
                    void 0 !== g.result && g.originalEvent && (g.originalEvent.returnValue = g.result)
                }
            }
        },
        simulate: function(g, R, gZ) {
            var d = S.extend(new S.Event, gZ, {
                type: g,
                isSimulated: !0
            });
            S.event.trigger(d, null, R),
            d.isDefaultPrevented() && gZ.preventDefault()
        }
    },
    S.removeEvent = E.removeEventListener ?
    function(g, R, gZ) {
        g.removeEventListener && g.removeEventListener(R, gZ)
    }: function(g, R, gZ) {
        var d = "on" + R;
        g.detachEvent && ("undefined" == typeof g[d] && (g[d] = null), g.detachEvent(d, gZ))
    },
    S.Event = function(g, R) {
        return this instanceof S.Event ? (g && g.type ? (this.originalEvent = g, this.type = g.type, this.isDefaultPrevented = g.defaultPrevented || void 0 === g.defaultPrevented && g.returnValue === !1 ? a: C) : this.type = g, R && S.extend(this, R), this.timeStamp = g && g.timeStamp || S.now(), void(this[S.expando] = !0)) : new S.Event(g, R)
    },
    S.Event.prototype = {
        constructor: S.Event,
        isDefaultPrevented: C,
        isPropagationStopped: C,
        isImmediatePropagationStopped: C,
        preventDefault: function() {
            var g = this.originalEvent;
            this.isDefaultPrevented = a,
            g && (g.preventDefault ? g.preventDefault() : g.returnValue = !1)
        },
        stopPropagation: function() {
            var g = this.originalEvent;
            this.isPropagationStopped = a,
            g && !this.isSimulated && (g.stopPropagation && g.stopPropagation(), g.cancelBubble = !0)
        },
        stopImmediatePropagation: function() {
            var g = this.originalEvent;
            this.isImmediatePropagationStopped = a,
            g && g.stopImmediatePropagation && g.stopImmediatePropagation(),
            this.stopPropagation()
        }
    },
    S.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    },
    function(g, R) {
        S.event.special[g] = {
            delegateType: R,
            bindType: R,
            handle: function(g) {
                var gZ, d = this,
                L = g.relatedTarget,
                b = g.handleObj;
                return L && (L === d || S.contains(d, L)) || (g.type = b.origType, gZ = b.handler.apply(this, arguments), g.type = R),
                gZ
            }
        }
    }),
    P.submit || (S.event.special.submit = {
        setup: function() {
            return ! S.nodeName(this, "form") && void S.event.add(this, "click._submit keypress._submit",
            function(g) {
                var R = g.target,
                gZ = S.nodeName(R, "input") || S.nodeName(R, "button") ? S.prop(R, "form") : void 0;
                gZ && !S._data(gZ, "submit") && (S.event.add(gZ, "submit._submit",
                function(g) {
                    g._submitBubble = !0
                }), S._data(gZ, "submit", !0))
            })
        },
        postDispatch: function(g) {
            g._submitBubble && (delete g._submitBubble, this.parentNode && !g.isTrigger && S.event.simulate("submit", this.parentNode, g))
        },
        teardown: function() {
            return ! S.nodeName(this, "form") && void S.event.remove(this, "._submit")
        }
    }),
    P.change || (S.event.special.change = {
        setup: function() {
            return ceg.test(this.nodeName) ? ("checkbox" !== this.type && "radio" !== this.type || (S.event.add(this, "propertychange._change",
            function(g) {
                "checked" === g.originalEvent.propertyName && (this._justChanged = !0)
            }), S.event.add(this, "click._change",
            function(g) {
                this._justChanged && !g.isTrigger && (this._justChanged = !1),
                S.event.simulate("change", this, g)
            })), !1) : void S.event.add(this, "beforeactivate._change",
            function(g) {
                var R = g.target;
                ceg.test(R.nodeName) && !S._data(R, "change") && (S.event.add(R, "change._change",
                function(g) { ! this.parentNode || g.isSimulated || g.isTrigger || S.event.simulate("change", this.parentNode, g)
                }), S._data(R, "change", !0))
            })
        },
        handle: function(g) {
            var R = g.target;
            if (this !== R || g.isSimulated || g.isTrigger || "radio" !== R.type && "checkbox" !== R.type) return g.handleObj.handler.apply(this, arguments)
        },
        teardown: function() {
            return S.event.remove(this, "._change"),
            !ceg.test(this.nodeName)
        }
    }),
    P.focusin || S.each({
        focus: "focusin",
        blur: "focusout"
    },
    function(g, R) {
        var gZ = function(g) {
            S.event.simulate(R, g.target, S.event.fix(g))
        };
        S.event.special[R] = {
            setup: function() {
                var d = this.ownerDocument || this,
                L = S._data(d, R);
                L || d.addEventListener(g, gZ, !0),
                S._data(d, R, (L || 0) + 1)
            },
            teardown: function() {
                var d = this.ownerDocument || this,
                L = S._data(d, R) - 1;
                L ? S._data(d, R, L) : (d.removeEventListener(g, gZ, !0), S._removeData(d, R))
            }
        }
    }),
    S.fn.extend({
        on: function(g, R, gZ, d) {
            return aP(this, g, R, gZ, d)
        },
        one: function(g, R, gZ, d) {
            return aP(this, g, R, gZ, d, 1)
        },
        off: function(g, R, gZ) {
            var d, L;
            if (g && g.preventDefault && g.handleObj) return d = g.handleObj,
            S(g.delegateTarget).off(d.namespace ? d.origType + "." + d.namespace: d.origType, d.selector, d.handler),
            this;
            if ("object" == typeof g) {
                for (L in g) this.off(L, R, g[L]);
                return this
            }
            return R !== !1 && "function" != typeof R || (gZ = R, R = void 0),
            gZ === !1 && (gZ = C),
            this.each(function() {
                S.event.remove(this, g, gZ, R)
            })
        },
        trigger: function(g, R) {
            return this.each(function() {
                S.event.trigger(g, R, this)
            })
        },
        triggerHandler: function(g, R) {
            var gZ = this[0];
            if (gZ) return S.event.trigger(g, R, gZ, !0)
        }
    });
    var eLg = / jQuery\d+="(?:null|\d+)"/g,
    aYg = new RegExp("<(?:" + eYg + ")[\\s/>]", "i"),
    gXg = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:-]+)[^>]*)\/>/gi,
    cPg = /<script|<style|<link/i,
    bVg = /checked\s*(?:[^=]|=\s*.checked.)/i,
    ig = /^true\/(.*)/,
    jg = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
    kg = bd(E),
    lg = kg.appendChild(E.createElement("div"));
    S.extend({
        htmlPrefilter: function(g) {
            return g.replace(gXg, "<$1></$2>")
        },
        clone: function(g, R, gZ) {
            var d, L, b, F, gj, dC = S.contains(g.ownerDocument, g);
            if (P.html5Clone || S.isXMLDoc(g) || !aYg.test("<" + g.nodeName + ">") ? b = g.cloneNode(!0) : (lg.innerHTML = g.outerHTML, lg.removeChild(b = lg.firstChild)), !(P.noCloneEvent && P.noCloneChecked || 1 !== g.nodeType && 11 !== g.nodeType || S.isXMLDoc(g))) for (d = f(b), gj = f(g), F = 0; null != (L = gj[F]); ++F) d[F] && ce(L, d[F]);
            if (R) if (gZ) for (gj = gj || f(g), d = d || f(b), F = 0; null != (L = gj[F]); F++) cR(L, d[F]);
            else cR(g, b);
            return d = f(b, "script"),
            d.length > 0 && gN(d, !dC && f(g, "script")),
            d = gj = L = null,
            b
        },
        cleanData: function(g, R) {
            for (var gZ, d, L, b, F = 0,
            gj = S.expando,
            dC = S.cache,
            e = P.attributes,
            G = S.event.special; null != (gZ = g[F]); F++) if ((R || Gg(gZ)) && (L = gZ[gj], b = L && dC[L])) {
                if (b.events) for (d in b.events) G[d] ? S.event.remove(gZ, d) : S.removeEvent(gZ, d, b.handle);
                dC[L] && (delete dC[L], e || "undefined" == typeof gZ.removeAttribute ? gZ[gj] = void 0 : gZ.removeAttribute(gj), D.push(L))
            }
        }
    }),
    S.fn.extend({
        domManip: eT,
        detach: function(g) {
            return gZb(this, g, !0)
        },
        remove: function(g) {
            return gZb(this, g)
        },
        text: function(g) {
            return bdCg(this,
            function(g) {
                return void 0 === g ? S.text(this) : this.empty().append((this[0] && this[0].ownerDocument || E).createTextNode(g))
            },
            null, g, arguments.length)
        },
        append: function() {
            return eT(this, arguments,
            function(g) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var R = eY(this, g);
                    R.appendChild(g)
                }
            })
        },
        prepend: function() {
            return eT(this, arguments,
            function(g) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var R = eY(this, g);
                    R.insertBefore(g, R.firstChild)
                }
            })
        },
        before: function() {
            return eT(this, arguments,
            function(g) {
                this.parentNode && this.parentNode.insertBefore(g, this)
            })
        },
        after: function() {
            return eT(this, arguments,
            function(g) {
                this.parentNode && this.parentNode.insertBefore(g, this.nextSibling)
            })
        },
        empty: function() {
            for (var g, R = 0; null != (g = this[R]); R++) {
                for (1 === g.nodeType && S.cleanData(f(g, !1)); g.firstChild;) g.removeChild(g.firstChild);
                g.options && S.nodeName(g, "select") && (g.options.length = 0)
            }
            return this
        },
        clone: function(g, R) {
            return g = null != g && g,
            R = null == R ? g: R,
            this.map(function() {
                return S.clone(this, g, R)
            })
        },
        html: function(g) {
            return bdCg(this,
            function(g) {
                var R = this[0] || {},
                gZ = 0,
                d = this.length;
                if (void 0 === g) return 1 === R.nodeType ? R.innerHTML.replace(eLg, "") : void 0;
                if ("string" == typeof g && !cPg.test(g) && (P.htmlSerialize || !aYg.test(g)) && (P.leadingWhitespace || !aPg.test(g)) && !eHg[(Cg.exec(g) || ["", ""])[1].toLowerCase()]) {
                    g = S.htmlPrefilter(g);
                    try {
                        for (; gZ < d; gZ++) R = this[gZ] || {},
                        1 === R.nodeType && (S.cleanData(f(R, !1)), R.innerHTML = g);
                        R = 0
                    } catch(g) {}
                }
                R && this.empty().append(g)
            },
            null, g, arguments.length)
        },
        replaceWith: function() {
            var g = [];
            return eT(this, arguments,
            function(R) {
                var gZ = this.parentNode;
                S.inArray(this, g) < 0 && (S.cleanData(f(this)), gZ && gZ.replaceChild(R, this))
            },
            g)
        }
    }),
    S.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    },
    function(g, R) {
        S.fn[g] = function(g) {
            for (var gZ, d = 0,
            L = [], b = S(g), F = b.length - 1; d <= F; d++) gZ = d === F ? this: this.clone(!0),
            S(b[d])[R](gZ),
            J.apply(L, gZ.get());
            return this.pushStack(L)
        }
    });
    var mg, ng = {
        HTML: "block",
        BODY: "block"
    },
    og = /^margin/,
    pg = new RegExp("^(" + bdg + ")(?!px)[a-z%]+$", "i"),
    qg = function(g, R, gZ, d) {
        var L, b, F = {};
        for (b in R) F[b] = g.style[b],
        g.style[b] = R[b];
        L = gZ.apply(g, d || []);
        for (b in R) g.style[b] = F[b];
        return L
    },
    rg = E.documentElement; !
    function() {
        function R() {
            var R, G, dY = E.documentElement;
            dY.appendChild(dC),
            e.style.cssText = "-webkit-box-sizing:border-box;box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",
            gZ = L = gj = !1,
            d = F = !0,
            g.getComputedStyle && (G = g.getComputedStyle(e), gZ = "1%" !== (G || {}).top, gj = "2px" === (G || {}).marginLeft, L = "4px" === (G || {
                width: "4px"
            }).width, e.style.marginRight = "50%", d = "4px" === (G || {
                marginRight: "4px"
            }).marginRight, R = e.appendChild(E.createElement("div")), R.style.cssText = e.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", R.style.marginRight = R.style.width = "0", e.style.width = "1px", F = !parseFloat((g.getComputedStyle(R) || {}).marginRight), e.removeChild(R)),
            e.style.display = "none",
            b = 0 === e.getClientRects().length,
            b && (e.style.display = "", e.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", R = e.getElementsByTagName("td"), R[0].style.cssText = "margin:0;border:0;padding:0;display:none", b = 0 === R[0].offsetHeight, b && (R[0].style.display = "", R[1].style.display = "none", b = 0 === R[0].offsetHeight)),
            dY.removeChild(dC)
        }
        var gZ, d, L, b, F, gj, dC = E.createElement("div"),
        e = E.createElement("div");
        e.style && (e.style.cssText = "float:left;opacity:.5", P.opacity = "0.5" === e.style.opacity, P.cssFloat = !!e.style.cssFloat, e.style.backgroundClip = "content-box", e.cloneNode(!0).style.backgroundClip = "", P.clearCloneStyle = "content-box" === e.style.backgroundClip, dC = E.createElement("div"), dC.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", e.innerHTML = "", dC.appendChild(e), P.boxSizing = "" === e.style.boxSizing || "" === e.style.MozBoxSizing || "" === e.style.WebkitBoxSizing, S.extend(P, {
            reliableHiddenOffsets: function() {
                return null == gZ && R(),
                b
            },
            boxSizingReliable: function() {
                return null == gZ && R(),
                L
            },
            pixelMarginRight: function() {
                return null == gZ && R(),
                d
            },
            pixelPosition: function() {
                return null == gZ && R(),
                gZ
            },
            reliableMarginRight: function() {
                return null == gZ && R(),
                F
            },
            reliableMarginLeft: function() {
                return null == gZ && R(),
                gj
            }
        }))
    } ();
    var sg, tg, ug = /^(top|right|bottom|left)$/;
    g.getComputedStyle ? (sg = function(R) {
        var gZ = R.ownerDocument.defaultView;
        return gZ && gZ.opener || (gZ = g),
        gZ.getComputedStyle(R)
    },
    tg = function(g, R, gZ) {
        var d, L, b, F, gj = g.style;
        return gZ = gZ || sg(g),
        F = gZ ? gZ.getPropertyValue(R) || gZ[R] : void 0,
        "" !== F && void 0 !== F || S.contains(g.ownerDocument, g) || (F = S.style(g, R)),
        gZ && !P.pixelMarginRight() && pg.test(F) && og.test(R) && (d = gj.width, L = gj.minWidth, b = gj.maxWidth, gj.minWidth = gj.maxWidth = gj.width = F, F = gZ.width, gj.width = d, gj.minWidth = L, gj.maxWidth = b),
        void 0 === F ? F: F + ""
    }) : rg.currentStyle && (sg = function(g) {
        return g.currentStyle
    },
    tg = function(g, R, gZ) {
        var d, L, b, F, gj = g.style;
        return gZ = gZ || sg(g),
        F = gZ ? gZ[R] : void 0,
        null == F && gj && gj[R] && (F = gj[R]),
        pg.test(F) && !ug.test(R) && (d = gj.left, L = g.runtimeStyle, b = L && L.left, b && (L.left = g.currentStyle.left), gj.left = "fontSize" === R ? "1em": F, F = gj.pixelLeft + "px", gj.left = d, b && (L.left = b)),
        void 0 === F ? F: F + "" || "auto"
    });
    var vg = /alpha\([^)]*\)/i,
    wg = /opacity\s*=\s*([^)]*)/i,
    xg = /^(none|table(?!-c[ea]).+)/,
    yg = new RegExp("^(" + bdg + ")(.*)$", "i"),
    zg = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    },
    Ag = {
        letterSpacing: "0",
        fontWeight: "400"
    },
    Bg = ["Webkit", "O", "Moz", "ms"],
    Dg = E.createElement("div").style;
    S.extend({
        cssHooks: {
            opacity: {
                get: function(g, R) {
                    if (R) {
                        var gZ = tg(g, "opacity");
                        return "" === gZ ? "1": gZ
                    }
                }
            }
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {
            float: P.cssFloat ? "cssFloat": "styleFloat"
        },
        style: function(g, R, gZ, d) {
            if (g && 3 !== g.nodeType && 8 !== g.nodeType && g.style) {
                var L, b, F, gj = S.camelCase(R),
                dC = g.style;
                if (R = S.cssProps[gj] || (S.cssProps[gj] = aY(gj) || gj), F = S.cssHooks[R] || S.cssHooks[gj], void 0 === gZ) return F && "get" in F && void 0 !== (L = F.get(g, !1, d)) ? L: dC[R];
                if (b = typeof gZ, "string" === b && (L = fg.exec(gZ)) && L[1] && (gZ = h(g, R, L), b = "number"), null != gZ && gZ === gZ && ("number" === b && (gZ += L && L[3] || (S.cssNumber[gj] ? "": "px")), P.clearCloneStyle || "" !== gZ || 0 !== R.indexOf("background") || (dC[R] = "inherit"), !(F && "set" in F && void 0 === (gZ = F.set(g, gZ, d))))) try {
                    dC[R] = gZ
                } catch(g) {}
            }
        },
        css: function(g, R, gZ, d) {
            var L, b, F, gj = S.camelCase(R);
            return R = S.cssProps[gj] || (S.cssProps[gj] = aY(gj) || gj),
            F = S.cssHooks[R] || S.cssHooks[gj],
            F && "get" in F && (b = F.get(g, !0, gZ)),
            void 0 === b && (b = tg(g, R, d)),
            "normal" === b && R in Ag && (b = Ag[R]),
            "" === gZ || gZ ? (L = parseFloat(b), gZ === !0 || isFinite(L) ? L || 0 : b) : b
        }
    }),
    S.each(["height", "width"],
    function(g, R) {
        S.cssHooks[R] = {
            get: function(g, gZ, d) {
                if (gZ) return xg.test(S.css(g, "display")) && 0 === g.offsetWidth ? qg(g, zg,
                function() {
                    return i(g, R, d)
                }) : i(g, R, d)
            },
            set: function(g, gZ, d) {
                var L = d && sg(g);
                return cP(g, gZ, d ? bV(g, R, d, P.boxSizing && "border-box" === S.css(g, "boxSizing", !1, L), L) : 0)
            }
        }
    }),
    P.opacity || (S.cssHooks.opacity = {
        get: function(g, R) {
            return wg.test((R && g.currentStyle ? g.currentStyle.filter: g.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "": R ? "1": ""
        },
        set: function(g, R) {
            var gZ = g.style,
            d = g.currentStyle,
            L = S.isNumeric(R) ? "alpha(opacity=" + 100 * R + ")": "",
            b = d && d.filter || gZ.filter || "";
            gZ.zoom = 1,
            (R >= 1 || "" === R) && "" === S.trim(b.replace(vg, "")) && gZ.removeAttribute && (gZ.removeAttribute("filter"), "" === R || d && !d.filter) || (gZ.filter = vg.test(b) ? b.replace(vg, L) : b + " " + L)
        }
    }),
    S.cssHooks.marginRight = eL(P.reliableMarginRight,
    function(g, R) {
        if (R) return qg(g, {
            display: "inline-block"
        },
        tg, [g, "marginRight"])
    }),
    S.cssHooks.marginLeft = eL(P.reliableMarginLeft,
    function(g, R) {
        if (R) return (parseFloat(tg(g, "marginLeft")) || (S.contains(g.ownerDocument, g) ? g.getBoundingClientRect().left - qg(g, {
            marginLeft: 0
        },
        function() {
            return g.getBoundingClientRect().left
        }) : 0)) + "px"
    }),
    S.each({
        margin: "",
        padding: "",
        border: "Width"
    },
    function(g, R) {
        S.cssHooks[g + R] = {
            expand: function(gZ) {
                for (var d = 0,
                L = {},
                b = "string" == typeof gZ ? gZ.split(" ") : [gZ]; d < 4; d++) L[g + gNg[d] + R] = b[d] || b[d - 2] || b[0];
                return L
            }
        },
        og.test(g) || (S.cssHooks[g + R].set = cP)
    }),
    S.fn.extend({
        css: function(g, R) {
            return bdCg(this,
            function(g, R, gZ) {
                var d, L, b = {},
                F = 0;
                if (S.isArray(R)) {
                    for (d = sg(g), L = R.length; F < L; F++) b[R[F]] = S.css(g, R[F], !1, d);
                    return b
                }
                return void 0 !== gZ ? S.style(g, R, gZ) : S.css(g, R)
            },
            g, R, arguments.length > 1)
        },
        show: function() {
            return gX(this, !0)
        },
        hide: function() {
            return gX(this)
        },
        toggle: function(g) {
            return "boolean" == typeof g ? g ? this.show() : this.hide() : this.each(function() {
                cg(this) ? S(this).show() : S(this).hide()
            })
        }
    }),
    S.Tween = j,
    j.prototype = {
        constructor: j,
        init: function(g, R, gZ, d, L, b) {
            this.elem = g,
            this.prop = gZ,
            this.easing = L || S.easing._default,
            this.options = R,
            this.start = this.now = this.cur(),
            this.end = d,
            this.unit = b || (S.cssNumber[gZ] ? "": "px")
        },
        cur: function() {
            var g = j.propHooks[this.prop];
            return g && g.get ? g.get(this) : j.propHooks._default.get(this)
        },
        run: function(g) {
            var R, gZ = j.propHooks[this.prop];
            return this.options.duration ? this.pos = R = S.easing[this.easing](g, this.options.duration * g, 0, 1, this.options.duration) : this.pos = R = g,
            this.now = (this.end - this.start) * R + this.start,
            this.options.step && this.options.step.call(this.elem, this.now, this),
            gZ && gZ.set ? gZ.set(this) : j.propHooks._default.set(this),
            this
        }
    },
    j.prototype.init.prototype = j.prototype,
    j.propHooks = {
        _default: {
            get: function(g) {
                var R;
                return 1 !== g.elem.nodeType || null != g.elem[g.prop] && null == g.elem.style[g.prop] ? g.elem[g.prop] : (R = S.css(g.elem, g.prop, ""), R && "auto" !== R ? R: 0)
            },
            set: function(g) {
                S.fx.step[g.prop] ? S.fx.step[g.prop](g) : 1 !== g.elem.nodeType || null == g.elem.style[S.cssProps[g.prop]] && !S.cssHooks[g.prop] ? g.elem[g.prop] = g.now: S.style(g.elem, g.prop, g.now + g.unit)
            }
        }
    },
    j.propHooks.scrollTop = j.propHooks.scrollLeft = {
        set: function(g) {
            g.elem.nodeType && g.elem.parentNode && (g.elem[g.prop] = g.now)
        }
    },
    S.easing = {
        linear: function(g) {
            return g
        },
        swing: function(g) {
            return.5 - Math.cos(g * Math.PI) / 2
        },
        _default: "swing"
    },
    S.fx = j.prototype.init,
    S.fx.step = {};
    var Eg, Hg, Ig = /^(?:toggle|show|hide)$/,
    Jg = /queueHooks$/;
    S.Animation = S.extend(p, {
        tweeners: {
            "*": [function(g, R) {
                var gZ = this.createTween(g, R);
                return h(gZ.elem, g, fg.exec(R), gZ),
                gZ
            }]
        },
        tweener: function(g, R) {
            S.isFunction(g) ? (R = g, g = ["*"]) : g = g.match(gjg);
            for (var gZ, d = 0,
            L = g.length; d < L; d++) gZ = g[d],
            p.tweeners[gZ] = p.tweeners[gZ] || [],
            p.tweeners[gZ].unshift(R)
        },
        prefilters: [n],
        prefilter: function(g, R) {
            R ? p.prefilters.unshift(g) : p.prefilters.push(g)
        }
    }),
    S.speed = function(g, R, gZ) {
        var d = g && "object" == typeof g ? S.extend({},
        g) : {
            complete: gZ || !gZ && R || S.isFunction(g) && g,
            duration: g,
            easing: gZ && R || R && !S.isFunction(R) && R
        };
        return d.duration = S.fx.off ? 0 : "number" == typeof d.duration ? d.duration: d.duration in S.fx.speeds ? S.fx.speeds[d.duration] : S.fx.speeds._default,
        null != d.queue && d.queue !== !0 || (d.queue = "fx"),
        d.old = d.complete,
        d.complete = function() {
            S.isFunction(d.old) && d.old.call(this),
            d.queue && S.dequeue(this, d.queue)
        },
        d
    },
    S.fn.extend({
        fadeTo: function(g, R, gZ, d) {
            return this.filter(cg).css("opacity", 0).show().end().animate({
                opacity: R
            },
            g, gZ, d)
        },
        animate: function(g, R, gZ, d) {
            var L = S.isEmptyObject(g),
            b = S.speed(R, gZ, d),
            F = function() {
                var R = p(this, S.extend({},
                g), b); (L || S._data(this, "finish")) && R.stop(!0)
            };
            return F.finish = F,
            L || b.queue === !1 ? this.each(F) : this.queue(b.queue, F)
        },
        stop: function(g, R, gZ) {
            var d = function(g) {
                var R = g.stop;
                delete g.stop,
                R(gZ)
            };
            return "string" != typeof g && (gZ = R, R = g, g = void 0),
            R && g !== !1 && this.queue(g || "fx", []),
            this.each(function() {
                var R = !0,
                L = null != g && g + "queueHooks",
                b = S.timers,
                F = S._data(this);
                if (L) F[L] && F[L].stop && d(F[L]);
                else for (L in F) F[L] && F[L].stop && Jg.test(L) && d(F[L]);
                for (L = b.length; L--;) b[L].elem !== this || null != g && b[L].queue !== g || (b[L].anim.stop(gZ), R = !1, b.splice(L, 1)); ! R && gZ || S.dequeue(this, g)
            })
        },
        finish: function(g) {
            return g !== !1 && (g = g || "fx"),
            this.each(function() {
                var R, gZ = S._data(this),
                d = gZ[g + "queue"],
                L = gZ[g + "queueHooks"],
                b = S.timers,
                F = d ? d.length: 0;
                for (gZ.finish = !0, S.queue(this, g, []), L && L.stop && L.stop.call(this, !0), R = b.length; R--;) b[R].elem === this && b[R].queue === g && (b[R].anim.stop(!0), b.splice(R, 1));
                for (R = 0; R < F; R++) d[R] && d[R].finish && d[R].finish.call(this);
                delete gZ.finish
            })
        }
    }),
    S.each(["toggle", "show", "hide"],
    function(g, R) {
        var gZ = S.fn[R];
        S.fn[R] = function(g, d, L) {
            return null == g || "boolean" == typeof g ? gZ.apply(this, arguments) : this.animate(l(R, !0), g, d, L)
        }
    }),
    S.each({
        slideDown: l("show"),
        slideUp: l("hide"),
        slideToggle: l("toggle"),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        },
        fadeToggle: {
            opacity: "toggle"
        }
    },
    function(g, R) {
        S.fn[g] = function(g, gZ, d) {
            return this.animate(R, g, gZ, d)
        }
    }),
    S.timers = [],
    S.fx.tick = function() {
        var g, R = S.timers,
        gZ = 0;
        for (Eg = S.now(); gZ < R.length; gZ++) g = R[gZ],
        g() || R[gZ] !== g || R.splice(gZ--, 1);
        R.length || S.fx.stop(),
        Eg = void 0
    },
    S.fx.timer = function(g) {
        S.timers.push(g),
        g() ? S.fx.start() : S.timers.pop()
    },
    S.fx.interval = 13,
    S.fx.start = function() {
        Hg || (Hg = g.setInterval(S.fx.tick, S.fx.interval))
    },
    S.fx.stop = function() {
        g.clearInterval(Hg),
        Hg = null
    },
    S.fx.speeds = {
        slow: 600,
        fast: 200,
        _default: 400
    },
    S.fn.delay = function(R, gZ) {
        return R = S.fx ? S.fx.speeds[R] || R: R,
        gZ = gZ || "fx",
        this.queue(gZ,
        function(gZ, d) {
            var L = g.setTimeout(gZ, R);
            d.stop = function() {
                g.clearTimeout(L)
            }
        })
    },
    function() {
        var g, R = E.createElement("input"),
        gZ = E.createElement("div"),
        d = E.createElement("select"),
        L = d.appendChild(E.createElement("option"));
        gZ = E.createElement("div"),
        gZ.setAttribute("className", "t"),
        gZ.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",
        g = gZ.getElementsByTagName("a")[0],
        R.setAttribute("type", "checkbox"),
        gZ.appendChild(R),
        g = gZ.getElementsByTagName("a")[0],
        g.style.cssText = "top:1px",
        P.getSetAttribute = "t" !== gZ.className,
        P.style = /top/.test(g.getAttribute("style")),
        P.hrefNormalized = "/a" === g.getAttribute("href"),
        P.checkOn = !!R.value,
        P.optSelected = L.selected,
        P.enctype = !!E.createElement("form").enctype,
        d.disabled = !0,
        P.optDisabled = !L.disabled,
        R = E.createElement("input"),
        R.setAttribute("value", ""),
        P.input = "" === R.getAttribute("value"),
        R.value = "t",
        R.setAttribute("type", "radio"),
        P.radioValue = "t" === R.value
    } ();
    var Kg = /\r/g,
    Mg = /[\x20\t\r\n\f]+/g;
    S.fn.extend({
        val: function(g) {
            var R, gZ, d, L = this[0]; {
                if (arguments.length) return d = S.isFunction(g),
                this.each(function(gZ) {
                    var L;
                    1 === this.nodeType && (L = d ? g.call(this, gZ, S(this).val()) : g, null == L ? L = "": "number" == typeof L ? L += "": S.isArray(L) && (L = S.map(L,
                    function(g) {
                        return null == g ? "": g + ""
                    })), R = S.valHooks[this.type] || S.valHooks[this.nodeName.toLowerCase()], R && "set" in R && void 0 !== R.set(this, L, "value") || (this.value = L))
                });
                if (L) return R = S.valHooks[L.type] || S.valHooks[L.nodeName.toLowerCase()],
                R && "get" in R && void 0 !== (gZ = R.get(L, "value")) ? gZ: (gZ = L.value, "string" == typeof gZ ? gZ.replace(Kg, "") : null == gZ ? "": gZ)
            }
        }
    }),
    S.extend({
        valHooks: {
            option: {
                get: function(g) {
                    var R = S.find.attr(g, "value");
                    return null != R ? R: S.trim(S.text(g)).replace(Mg, " ")
                }
            },
            select: {
                get: function(g) {
                    for (var R, gZ, d = g.options,
                    L = g.selectedIndex,
                    b = "select-one" === g.type || L < 0,
                    F = b ? null: [], gj = b ? L + 1 : d.length, dC = L < 0 ? gj: b ? L: 0; dC < gj; dC++) if (gZ = d[dC], (gZ.selected || dC === L) && (P.optDisabled ? !gZ.disabled: null === gZ.getAttribute("disabled")) && (!gZ.parentNode.disabled || !S.nodeName(gZ.parentNode, "optgroup"))) {
                        if (R = S(gZ).val(), b) return R;
                        F.push(R)
                    }
                    return F
                },
                set: function(g, R) {
                    for (var gZ, d, L = g.options,
                    b = S.makeArray(R), F = L.length; F--;) if (d = L[F], S.inArray(S.valHooks.option.get(d), b) > -1) try {
                        d.selected = gZ = !0
                    } catch(g) {
                        d.scrollHeight
                    } else d.selected = !1;
                    return gZ || (g.selectedIndex = -1),
                    L
                }
            }
        }
    }),
    S.each(["radio", "checkbox"],
    function() {
        S.valHooks[this] = {
            set: function(g, R) {
                if (S.isArray(R)) return g.checked = S.inArray(S(g).val(), R) > -1
            }
        },
        P.checkOn || (S.valHooks[this].get = function(g) {
            return null === g.getAttribute("value") ? "on": g.value
        })
    });
    var Ng, Og, Pg = S.expr.attrHandle,
    Qg = /^(?:checked|selected)$/i,
    Sg = P.getSetAttribute,
    Tg = P.input;
    S.fn.extend({
        attr: function(g, R) {
            return bdCg(this, S.attr, g, R, arguments.length > 1)
        },
        removeAttr: function(g) {
            return this.each(function() {
                S.removeAttr(this, g)
            })
        }
    }),
    S.extend({
        attr: function(g, R, gZ) {
            var d, L, b = g.nodeType;
            if (3 !== b && 8 !== b && 2 !== b) return "undefined" == typeof g.getAttribute ? S.prop(g, R, gZ) : (1 === b && S.isXMLDoc(g) || (R = R.toLowerCase(), L = S.attrHooks[R] || (S.expr.match.bool.test(R) ? Og: Ng)), void 0 !== gZ ? null === gZ ? void S.removeAttr(g, R) : L && "set" in L && void 0 !== (d = L.set(g, gZ, R)) ? d: (g.setAttribute(R, gZ + ""), gZ) : L && "get" in L && null !== (d = L.get(g, R)) ? d: (d = S.find.attr(g, R), null == d ? void 0 : d))
        },
        attrHooks: {
            type: {
                set: function(g, R) {
                    if (!P.radioValue && "radio" === R && S.nodeName(g, "input")) {
                        var gZ = g.value;
                        return g.setAttribute("type", R),
                        gZ && (g.value = gZ),
                        R
                    }
                }
            }
        },
        removeAttr: function(g, R) {
            var gZ, d, L = 0,
            b = R && R.match(gjg);
            if (b && 1 === g.nodeType) for (; gZ = b[L++];) d = S.propFix[gZ] || gZ,
            S.expr.match.bool.test(gZ) ? Tg && Sg || !Qg.test(gZ) ? g[d] = !1 : g[S.camelCase("default-" + gZ)] = g[d] = !1 : S.attr(g, gZ, ""),
            g.removeAttribute(Sg ? gZ: d)
        }
    }),
    Og = {
        set: function(g, R, gZ) {
            return R === !1 ? S.removeAttr(g, gZ) : Tg && Sg || !Qg.test(gZ) ? g.setAttribute(!Sg && S.propFix[gZ] || gZ, gZ) : g[S.camelCase("default-" + gZ)] = g[gZ] = !0,
            gZ
        }
    },
    S.each(S.expr.match.bool.source.match(/\w+/g),
    function(g, R) {
        var gZ = Pg[R] || S.find.attr;
        Tg && Sg || !Qg.test(R) ? Pg[R] = function(g, R, d) {
            var L, b;
            return d || (b = Pg[R], Pg[R] = L, L = null != gZ(g, R, d) ? R.toLowerCase() : null, Pg[R] = b),
            L
        }: Pg[R] = function(g, R, gZ) {
            if (!gZ) return g[S.camelCase("default-" + R)] ? R.toLowerCase() : null
        }
    }),
    Tg && Sg || (S.attrHooks.value = {
        set: function(g, R, gZ) {
            return S.nodeName(g, "input") ? void(g.defaultValue = R) : Ng && Ng.set(g, R, gZ)
        }
    }),
    Sg || (Ng = {
        set: function(g, R, gZ) {
            var d = g.getAttributeNode(gZ);
            if (d || g.setAttributeNode(d = g.ownerDocument.createAttribute(gZ)), d.value = R += "", "value" === gZ || R === g.getAttribute(gZ)) return R
        }
    },
    Pg.id = Pg.name = Pg.coords = function(g, R, gZ) {
        var d;
        if (!gZ) return (d = g.getAttributeNode(R)) && "" !== d.value ? d.value: null
    },
    S.valHooks.button = {
        get: function(g, R) {
            var gZ = g.getAttributeNode(R);
            if (gZ && gZ.specified) return gZ.value
        },
        set: Ng.set
    },
    S.attrHooks.contenteditable = {
        set: function(g, R, gZ) {
            Ng.set(g, "" !== R && R, gZ)
        }
    },
    S.each(["width", "height"],
    function(g, R) {
        S.attrHooks[R] = {
            set: function(g, gZ) {
                if ("" === gZ) return g.setAttribute(R, "auto"),
                gZ
            }
        }
    })),
    P.style || (S.attrHooks.style = {
        get: function(g) {
            return g.style.cssText || void 0
        },
        set: function(g, R) {
            return g.style.cssText = R + ""
        }
    });
    var Ug = /^(?:input|select|textarea|button|object)$/i,
    Vg = /^(?:a|area)$/i;
    S.fn.extend({
        prop: function(g, R) {
            return bdCg(this, S.prop, g, R, arguments.length > 1)
        },
        removeProp: function(g) {
            return g = S.propFix[g] || g,
            this.each(function() {
                try {
                    this[g] = void 0,
                    delete this[g]
                } catch(g) {}
            })
        }
    }),
    S.extend({
        prop: function(g, R, gZ) {
            var d, L, b = g.nodeType;
            if (3 !== b && 8 !== b && 2 !== b) return 1 === b && S.isXMLDoc(g) || (R = S.propFix[R] || R, L = S.propHooks[R]),
            void 0 !== gZ ? L && "set" in L && void 0 !== (d = L.set(g, gZ, R)) ? d: g[R] = gZ: L && "get" in L && null !== (d = L.get(g, R)) ? d: g[R]
        },
        propHooks: {
            tabIndex: {
                get: function(g) {
                    var R = S.find.attr(g, "tabindex");
                    return R ? parseInt(R, 10) : Ug.test(g.nodeName) || Vg.test(g.nodeName) && g.href ? 0 : -1
                }
            }
        },
        propFix: {
            for: "htmlFor",
            class: "className"
        }
    }),
    P.hrefNormalized || S.each(["href", "src"],
    function(g, R) {
        S.propHooks[R] = {
            get: function(g) {
                return g.getAttribute(R, 4)
            }
        }
    }),
    P.optSelected || (S.propHooks.selected = {
        get: function(g) {
            var R = g.parentNode;
            return R && (R.selectedIndex, R.parentNode && R.parentNode.selectedIndex),
            null
        },
        set: function(g) {
            var R = g.parentNode;
            R && (R.selectedIndex, R.parentNode && R.parentNode.selectedIndex)
        }
    }),
    S.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"],
    function() {
        S.propFix[this.toLowerCase()] = this
    }),
    P.enctype || (S.propFix.enctype = "encoding");
    var Wg = /[\t\r\n\f]/g;
    S.fn.extend({
        addClass: function(g) {
            var R, gZ, d, L, b, F, gj, dC = 0;
            if (S.isFunction(g)) return this.each(function(R) {
                S(this).addClass(g.call(this, R, q(this)))
            });
            if ("string" == typeof g && g) for (R = g.match(gjg) || []; gZ = this[dC++];) if (L = q(gZ), d = 1 === gZ.nodeType && (" " + L + " ").replace(Wg, " ")) {
                for (F = 0; b = R[F++];) d.indexOf(" " + b + " ") < 0 && (d += b + " ");
                gj = S.trim(d),
                L !== gj && S.attr(gZ, "class", gj)
            }
            return this
        },
        removeClass: function(g) {
            var R, gZ, d, L, b, F, gj, dC = 0;
            if (S.isFunction(g)) return this.each(function(R) {
                S(this).removeClass(g.call(this, R, q(this)))
            });
            if (!arguments.length) return this.attr("class", "");
            if ("string" == typeof g && g) for (R = g.match(gjg) || []; gZ = this[dC++];) if (L = q(gZ), d = 1 === gZ.nodeType && (" " + L + " ").replace(Wg, " ")) {
                for (F = 0; b = R[F++];) for (; d.indexOf(" " + b + " ") > -1;) d = d.replace(" " + b + " ", " ");
                gj = S.trim(d),
                L !== gj && S.attr(gZ, "class", gj)
            }
            return this
        },
        toggleClass: function(g, R) {
            var gZ = typeof g;
            return "boolean" == typeof R && "string" === gZ ? R ? this.addClass(g) : this.removeClass(g) : S.isFunction(g) ? this.each(function(gZ) {
                S(this).toggleClass(g.call(this, gZ, q(this), R), R)
            }) : this.each(function() {
                var R, d, L, b;
                if ("string" === gZ) for (d = 0, L = S(this), b = g.match(gjg) || []; R = b[d++];) L.hasClass(R) ? L.removeClass(R) : L.addClass(R);
                else void 0 !== g && "boolean" !== gZ || (R = q(this), R && S._data(this, "__className__", R), S.attr(this, "class", R || g === !1 ? "": S._data(this, "__className__") || ""))
            })
        },
        hasClass: function(g) {
            var R, gZ, d = 0;
            for (R = " " + g + " "; gZ = this[d++];) if (1 === gZ.nodeType && (" " + q(gZ) + " ").replace(Wg, " ").indexOf(R) > -1) return ! 0;
            return ! 1
        }
    }),
    S.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),
    function(g, R) {
        S.fn[R] = function(g, gZ) {
            return arguments.length > 0 ? this.on(R, null, g, gZ) : this.trigger(R)
        }
    }),
    S.fn.extend({
        hover: function(g, R) {
            return this.mouseenter(g).mouseleave(R || g)
        }
    });
    var Xg = g.location,
    Zg = S.now(),
    $g = /\?/,
    _g = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    S.parseJSON = function(R) {
        if (g.JSON && g.JSON.parse) return g.JSON.parse(R + "");
        var gZ, d = null,
        L = S.trim(R + "");
        return L && !S.trim(L.replace(_g,
        function(g, R, L, b) {
            return gZ && R && (d = 0),
            0 === d ? g: (gZ = L || R, d += !b - !L, "")
        })) ? Function("return " + L)() : S.error("Invalid JSON: " + R)
    },
    S.parseXML = function(R) {
        var gZ, d;
        if (!R || "string" != typeof R) return null;
        try {
            g.DOMParser ? (d = new g.DOMParser, gZ = d.parseFromString(R, "text/xml")) : (gZ = new g.ActiveXObject("Microsoft.XMLDOM"), gZ.async = "false", gZ.loadXML(R))
        } catch(g) {
            gZ = void 0
        }
        return gZ && gZ.documentElement && !gZ.getElementsByTagName("parsererror").length || S.error("Invalid XML: " + R),
        gZ
    };
    var gR = /#.*$/,
    RR = /([?&])_=[^&]*/,
    gZR = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
    dR = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
    LR = /^(?:GET|HEAD)$/,
    bR = /^\/\//,
    FR = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
    gjR = {},
    dCR = {},
    eR = "*/".concat("*"),
    GR = Xg.href,
    dYR = FR.exec(GR.toLowerCase()) || [];
    S.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: GR,
            type: "GET",
            isLocal: dR.test(dYR[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": eR,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {
                xml: /\bxml\b/,
                html: /\bhtml/,
                json: /\bjson\b/
            },
            responseFields: {
                xml: "responseXML",
                text: "responseText",
                json: "responseJSON"
            },
            converters: {
                "* text": String,
                "text html": !0,
                "text json": S.parseJSON,
                "text xml": S.parseXML
            },
            flatOptions: {
                url: !0,
                context: !0
            }
        },
        ajaxSetup: function(g, R) {
            return R ? t(t(g, S.ajaxSettings), R) : t(S.ajaxSettings, g)
        },
        ajaxPrefilter: r(gjR),
        ajaxTransport: r(dCR),
        ajax: function(R, gZ) {
            function d(R, gZ, d, L) {
                var b, dY, a, C, aP, eH = gZ;
                2 !== fD && (fD = 2, dC && g.clearTimeout(dC), G = void 0, gj = L || "", eY.readyState = R > 0 ? 4 : 0, b = R >= 200 && R < 300 || 304 === R, d && (C = u(h, eY, d)), C = v(h, C, eY, b), b ? (h.ifModified && (aP = eY.getResponseHeader("Last-Modified"), aP && (S.lastModified[F] = aP), aP = eY.getResponseHeader("etag"), aP && (S.etag[F] = aP)), 204 === R || "HEAD" === h.type ? eH = "nocontent": 304 === R ? eH = "notmodified": (eH = C.state, dY = C.data, a = C.error, b = !a)) : (a = eH, !R && eH || (eH = "error", R < 0 && (R = 0))), eY.status = R, eY.statusText = (gZ || eH) + "", b ? gN.resolveWith(bd, [dY, eH, eY]) : gN.rejectWith(bd, [eY, eH, a]), eY.statusCode(bdC), bdC = void 0, e && f.trigger(b ? "ajaxSuccess": "ajaxError", [eY, h, b ? dY: a]), c.fireWith(bd, [eY, eH]), e && (f.trigger("ajaxComplete", [eY, h]), --S.active || S.event.trigger("ajaxStop")))
            }
            "object" == typeof R && (gZ = R, R = void 0),
            gZ = gZ || {};
            var L, b, F, gj, dC, e, G, dY, h = S.ajaxSetup({},
            gZ),
            bd = h.context || h,
            f = h.context && (bd.nodeType || bd.jquery) ? S(bd) : S.event,
            gN = S.Deferred(),
            c = S.Callbacks("once memory"),
            bdC = h.statusCode || {},
            a = {},
            C = {},
            fD = 0,
            aP = "canceled",
            eY = {
                readyState: 0,
                getResponseHeader: function(g) {
                    var R;
                    if (2 === fD) {
                        if (!dY) for (dY = {}; R = gZR.exec(gj);) dY[R[1].toLowerCase()] = R[2];
                        R = dY[g.toLowerCase()]
                    }
                    return null == R ? null: R
                },
                getAllResponseHeaders: function() {
                    return 2 === fD ? gj: null
                },
                setRequestHeader: function(g, R) {
                    var gZ = g.toLowerCase();
                    return fD || (g = C[gZ] = C[gZ] || g, a[g] = R),
                    this
                },
                overrideMimeType: function(g) {
                    return fD || (h.mimeType = g),
                    this
                },
                statusCode: function(g) {
                    var R;
                    if (g) if (fD < 2) for (R in g) bdC[R] = [bdC[R], g[R]];
                    else eY.always(g[eY.status]);
                    return this
                },
                abort: function(g) {
                    var R = g || aP;
                    return G && G.abort(R),
                    d(0, R),
                    this
                }
            };
            if (gN.promise(eY).complete = c.add, eY.success = eY.done, eY.error = eY.fail, h.url = ((R || h.url || GR) + "").replace(gR, "").replace(bR, dYR[1] + "//"), h.type = gZ.method || gZ.type || h.method || h.type, h.dataTypes = S.trim(h.dataType || "*").toLowerCase().match(gjg) || [""], null == h.crossDomain && (L = FR.exec(h.url.toLowerCase()), h.crossDomain = !(!L || L[1] === dYR[1] && L[2] === dYR[2] && (L[3] || ("http:" === L[1] ? "80": "443")) === (dYR[3] || ("http:" === dYR[1] ? "80": "443")))), h.data && h.processData && "string" != typeof h.data && (h.data = S.param(h.data, h.traditional)), s(gjR, h, gZ, eY), 2 === fD) return eY;
            e = S.event && h.global,
            e && 0 === S.active++&&S.event.trigger("ajaxStart"),
            h.type = h.type.toUpperCase(),
            h.hasContent = !LR.test(h.type),
            F = h.url,
            h.hasContent || (h.data && (F = h.url += ($g.test(F) ? "&": "?") + h.data, delete h.data), h.cache === !1 && (h.url = RR.test(F) ? F.replace(RR, "$1_=" + Zg++) : F + ($g.test(F) ? "&": "?") + "_=" + Zg++)),
            h.ifModified && (S.lastModified[F] && eY.setRequestHeader("If-Modified-Since", S.lastModified[F]), S.etag[F] && eY.setRequestHeader("If-None-Match", S.etag[F])),
            (h.data && h.hasContent && h.contentType !== !1 || gZ.contentType) && eY.setRequestHeader("Content-Type", h.contentType),
            eY.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + eR + "; q=0.01": "") : h.accepts["*"]);
            for (b in h.headers) eY.setRequestHeader(b, h.headers[b]);
            if (h.beforeSend && (h.beforeSend.call(bd, eY, h) === !1 || 2 === fD)) return eY.abort();
            aP = "abort";
            for (b in {
                success: 1,
                error: 1,
                complete: 1
            }) eY[b](h[b]);
            if (G = s(dCR, h, gZ, eY)) {
                if (eY.readyState = 1, e && f.trigger("ajaxSend", [eY, h]), 2 === fD) return eY;
                h.async && h.timeout > 0 && (dC = g.setTimeout(function() {
                    eY.abort("timeout")
                },
                h.timeout));
                try {
                    fD = 1,
                    G.send(a, d)
                } catch(g) {
                    if (! (fD < 2)) throw g;
                    d( - 1, g)
                }
            } else d( - 1, "No Transport");
            return eY
        },
        getJSON: function(g, R, gZ) {
            return S.get(g, R, gZ, "json")
        },
        getScript: function(g, R) {
            return S.get(g, void 0, R, "script")
        }
    }),
    S.each(["get", "post"],
    function(g, R) {
        S[R] = function(g, gZ, d, L) {
            return S.isFunction(gZ) && (L = L || d, d = gZ, gZ = void 0),
            S.ajax(S.extend({
                url: g,
                type: R,
                dataType: L,
                data: gZ,
                success: d
            },
            S.isPlainObject(g) && g))
        }
    }),
    S._evalUrl = function(g) {
        return S.ajax({
            url: g,
            type: "GET",
            dataType: "script",
            cache: !0,
            async: !1,
            global: !1,
            throws: !0
        })
    },
    S.fn.extend({
        wrapAll: function(g) {
            if (S.isFunction(g)) return this.each(function(R) {
                S(this).wrapAll(g.call(this, R))
            });
            if (this[0]) {
                var R = S(g, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && R.insertBefore(this[0]),
                R.map(function() {
                    for (var g = this; g.firstChild && 1 === g.firstChild.nodeType;) g = g.firstChild;
                    return g
                }).append(this)
            }
            return this
        },
        wrapInner: function(g) {
            return S.isFunction(g) ? this.each(function(R) {
                S(this).wrapInner(g.call(this, R))
            }) : this.each(function() {
                var R = S(this),
                gZ = R.contents();
                gZ.length ? gZ.wrapAll(g) : R.append(g)
            })
        },
        wrap: function(g) {
            var R = S.isFunction(g);
            return this.each(function(gZ) {
                S(this).wrapAll(R ? g.call(this, gZ) : g)
            })
        },
        unwrap: function() {
            return this.parent().each(function() {
                S.nodeName(this, "body") || S(this).replaceWith(this.childNodes)
            }).end()
        }
    }),
    S.expr.filters.hidden = function(g) {
        return P.reliableHiddenOffsets() ? g.offsetWidth <= 0 && g.offsetHeight <= 0 && !g.getClientRects().length: x(g)
    },
    S.expr.filters.visible = function(g) {
        return ! S.expr.filters.hidden(g)
    };
    var hR = /%20/g,
    bdR = /\[\]$/,
    fR = /\r?\n/g,
    gNR = /^(?:submit|button|image|reset|file)$/i,
    bdCR = /^(?:input|select|textarea|keygen)/i;
    S.param = function(g, R) {
        var gZ, d = [],
        L = function(g, R) {
            R = S.isFunction(R) ? R() : null == R ? "": R,
            d[d.length] = encodeURIComponent(g) + "=" + encodeURIComponent(R)
        };
        if (void 0 === R && (R = S.ajaxSettings && S.ajaxSettings.traditional), S.isArray(g) || g.jquery && !S.isPlainObject(g)) S.each(g,
        function() {
            L(this.name, this.value)
        });
        else for (gZ in g) y(gZ, g[gZ], R, L);
        return d.join("&").replace(hR, "+")
    },
    S.fn.extend({
        serialize: function() {
            return S.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                var g = S.prop(this, "elements");
                return g ? S.makeArray(g) : this
            }).filter(function() {
                var g = this.type;
                return this.name && !S(this).is(":disabled") && bdCR.test(this.nodeName) && !gNR.test(g) && (this.checked || !ag.test(g))
            }).map(function(g, R) {
                var gZ = S(this).val();
                return null == gZ ? null: S.isArray(gZ) ? S.map(gZ,
                function(g) {
                    return {
                        name: R.name,
                        value: g.replace(fR, "\r\n")
                    }
                }) : {
                    name: R.name,
                    value: gZ.replace(fR, "\r\n")
                }
            }).get()
        }
    }),
    S.ajaxSettings.xhr = void 0 !== g.ActiveXObject ?
    function() {
        return this.isLocal ? A() : E.documentMode > 8 ? z() : /^(get|post|head|put|delete|options)$/i.test(this.type) && z() || A()
    }: z;
    var aR = 0,
    CR = {},
    fDR = S.ajaxSettings.xhr();
    g.attachEvent && g.attachEvent("onunload",
    function() {
        for (var g in CR) CR[g](void 0, !0)
    }),
    P.cors = !!fDR && "withCredentials" in fDR,
    fDR = P.ajax = !!fDR,
    fDR && S.ajaxTransport(function(R) {
        if (!R.crossDomain || P.cors) {
            var gZ;
            return {
                send: function(d, L) {
                    var b, F = R.xhr(),
                    gj = ++aR;
                    if (F.open(R.type, R.url, R.async, R.username, R.password), R.xhrFields) for (b in R.xhrFields) F[b] = R.xhrFields[b];
                    R.mimeType && F.overrideMimeType && F.overrideMimeType(R.mimeType),
                    R.crossDomain || d["X-Requested-With"] || (d["X-Requested-With"] = "XMLHttpRequest");
                    for (b in d) void 0 !== d[b] && F.setRequestHeader(b, d[b] + "");
                    F.send(R.hasContent && R.data || null),
                    gZ = function(g, d) {
                        var b, dC, e;
                        if (gZ && (d || 4 === F.readyState)) if (delete CR[gj], gZ = void 0, F.onreadystatechange = S.noop, d) 4 !== F.readyState && F.abort();
                        else {
                            e = {},
                            b = F.status,
                            "string" == typeof F.responseText && (e.text = F.responseText);
                            try {
                                dC = F.statusText
                            } catch(g) {
                                dC = ""
                            }
                            b || !R.isLocal || R.crossDomain ? 1223 === b && (b = 204) : b = e.text ? 200 : 404
                        }
                        e && L(b, dC, e, F.getAllResponseHeaders())
                    },
                    R.async ? 4 === F.readyState ? g.setTimeout(gZ) : F.onreadystatechange = CR[gj] = gZ: gZ()
                },
                abort: function() {
                    gZ && gZ(void 0, !0)
                }
            }
        }
    }),
    S.ajaxSetup({
        accepts: {
            script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
        },
        contents: {
            script: /\b(?:java|ecma)script\b/
        },
        converters: {
            "text script": function(g) {
                return S.globalEval(g),
                g
            }
        }
    }),
    S.ajaxPrefilter("script",
    function(g) {
        void 0 === g.cache && (g.cache = !1),
        g.crossDomain && (g.type = "GET", g.global = !1)
    }),
    S.ajaxTransport("script",
    function(g) {
        if (g.crossDomain) {
            var R, gZ = E.head || S("head")[0] || E.documentElement;
            return {
                send: function(d, L) {
                    R = E.createElement("script"),
                    R.async = !0,
                    g.scriptCharset && (R.charset = g.scriptCharset),
                    R.src = g.url,
                    R.onload = R.onreadystatechange = function(g, gZ) { (gZ || !R.readyState || /loaded|complete/.test(R.readyState)) && (R.onload = R.onreadystatechange = null, R.parentNode && R.parentNode.removeChild(R), R = null, gZ || L(200, "success"))
                    },
                    gZ.insertBefore(R, gZ.firstChild)
                },
                abort: function() {
                    R && R.onload(void 0, !0)
                }
            }
        }
    });
    var aPR = [],
    eYR = /(=)\?(?=&|$)|\?\?/;
    S.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function() {
            var g = aPR.pop() || S.expando + "_" + Zg++;
            return this[g] = !0,
            g
        }
    }),
    S.ajaxPrefilter("json jsonp",
    function(R, gZ, d) {
        var L, b, F, gj = R.jsonp !== !1 && (eYR.test(R.url) ? "url": "string" == typeof R.data && 0 === (R.contentType || "").indexOf("application/x-www-form-urlencoded") && eYR.test(R.data) && "data");
        if (gj || "jsonp" === R.dataTypes[0]) return L = R.jsonpCallback = S.isFunction(R.jsonpCallback) ? R.jsonpCallback() : R.jsonpCallback,
        gj ? R[gj] = R[gj].replace(eYR, "$1" + L) : R.jsonp !== !1 && (R.url += ($g.test(R.url) ? "&": "?") + R.jsonp + "=" + L),
        R.converters["script json"] = function() {
            return F || S.error(L + " was not called"),
            F[0]
        },
        R.dataTypes[0] = "json",
        b = g[L],
        g[L] = function() {
            F = arguments
        },
        d.always(function() {
            void 0 === b ? S(g).removeProp(L) : g[L] = b,
            R[L] && (R.jsonpCallback = gZ.jsonpCallback, aPR.push(L)),
            F && S.isFunction(b) && b(F[0]),
            F = b = void 0
        }),
        "script"
    }),
    S.parseHTML = function(g, R, gZ) {
        if (!g || "string" != typeof g) return null;
        "boolean" == typeof R && (gZ = R, R = !1),
        R = R || E;
        var d = gg.exec(g),
        L = !gZ && [];
        return d ? [R.createElement(d[1])] : (d = bdC([g], R, L), L && L.length && S(L).remove(), S.merge([], d.childNodes))
    };
    var eHR = S.fn.load;
    return S.fn.load = function(g, R, gZ) {
        if ("string" != typeof g && eHR) return eHR.apply(this, arguments);
        var d, L, b, F = this,
        gj = g.indexOf(" ");
        return gj > -1 && (d = S.trim(g.slice(gj, g.length)), g = g.slice(0, gj)),
        S.isFunction(R) ? (gZ = R, R = void 0) : R && "object" == typeof R && (L = "POST"),
        F.length > 0 && S.ajax({
            url: g,
            type: L || "GET",
            dataType: "html",
            data: R
        }).done(function(g) {
            b = arguments,
            F.html(d ? S("<div>").append(S.parseHTML(g)).find(d) : g)
        }).always(gZ &&
        function(g, R) {
            F.each(function() {
                gZ.apply(this, b || [g.responseText, R, g])
            })
        }),
        this
    },
    S.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"],
    function(g, R) {
        S.fn[R] = function(g) {
            return this.on(R, g)
        }
    }),
    S.expr.filters.animated = function(g) {
        return S.grep(S.timers,
        function(R) {
            return g === R.elem
        }).length
    },
    S.offset = {
        setOffset: function(g, R, gZ) {
            var d, L, b, F, gj, dC, e, G = S.css(g, "position"),
            dY = S(g),
            h = {};
            "static" === G && (g.style.position = "relative"),
            gj = dY.offset(),
            b = S.css(g, "top"),
            dC = S.css(g, "left"),
            e = ("absolute" === G || "fixed" === G) && S.inArray("auto", [b, dC]) > -1,
            e ? (d = dY.position(), F = d.top, L = d.left) : (F = parseFloat(b) || 0, L = parseFloat(dC) || 0),
            S.isFunction(R) && (R = R.call(g, gZ, S.extend({},
            gj))),
            null != R.top && (h.top = R.top - gj.top + F),
            null != R.left && (h.left = R.left - gj.left + L),
            "using" in R ? R.using.call(g, h) : dY.css(h)
        }
    },
    S.fn.extend({
        offset: function(g) {
            if (arguments.length) return void 0 === g ? this: this.each(function(R) {
                S.offset.setOffset(this, g, R)
            });
            var R, gZ, d = {
                top: 0,
                left: 0
            },
            L = this[0],
            b = L && L.ownerDocument;
            if (b) return R = b.documentElement,
            S.contains(R, L) ? ("undefined" != typeof L.getBoundingClientRect && (d = L.getBoundingClientRect()), gZ = B(b), {
                top: d.top + (gZ.pageYOffset || R.scrollTop) - (R.clientTop || 0),
                left: d.left + (gZ.pageXOffset || R.scrollLeft) - (R.clientLeft || 0)
            }) : d
        },
        position: function() {
            if (this[0]) {
                var g, R, gZ = {
                    top: 0,
                    left: 0
                },
                d = this[0];
                return "fixed" === S.css(d, "position") ? R = d.getBoundingClientRect() : (g = this.offsetParent(), R = this.offset(), S.nodeName(g[0], "html") || (gZ = g.offset()), gZ.top += S.css(g[0], "borderTopWidth", !0), gZ.left += S.css(g[0], "borderLeftWidth", !0)),
                {
                    top: R.top - gZ.top - S.css(d, "marginTop", !0),
                    left: R.left - gZ.left - S.css(d, "marginLeft", !0)
                }
            }
        },
        offsetParent: function() {
            return this.map(function() {
                for (var g = this.offsetParent; g && !S.nodeName(g, "html") && "static" === S.css(g, "position");) g = g.offsetParent;
                return g || rg
            })
        }
    }),
    S.each({
        scrollLeft: "pageXOffset",
        scrollTop: "pageYOffset"
    },
    function(g, R) {
        var gZ = /Y/.test(R);
        S.fn[g] = function(d) {
            return bdCg(this,
            function(g, d, L) {
                var b = B(g);
                return void 0 === L ? b ? R in b ? b[R] : b.document.documentElement[d] : g[d] : void(b ? b.scrollTo(gZ ? S(b).scrollLeft() : L, gZ ? L: S(b).scrollTop()) : g[d] = L)
            },
            g, d, arguments.length, null)
        }
    }),
    S.each(["top", "left"],
    function(g, R) {
        S.cssHooks[R] = eL(P.pixelPosition,
        function(g, gZ) {
            if (gZ) return gZ = tg(g, R),
            pg.test(gZ) ? S(g).position()[R] + "px": gZ
        })
    }),
    S.each({
        Height: "height",
        Width: "width"
    },
    function(g, R) {
        S.each({
            padding: "inner" + g,
            content: R,
            "": "outer" + g
        },
        function(gZ, d) {
            S.fn[d] = function(d, L) {
                var b = arguments.length && (gZ || "boolean" != typeof d),
                F = gZ || (d === !0 || L === !0 ? "margin": "border");
                return bdCg(this,
                function(R, gZ, d) {
                    var L;
                    return S.isWindow(R) ? R.document.documentElement["client" + g] : 9 === R.nodeType ? (L = R.documentElement, Math.max(R.body["scroll" + g], L["scroll" + g], R.body["offset" + g], L["offset" + g], L["client" + g])) : void 0 === d ? S.css(R, gZ, F) : S.style(R, gZ, d, F)
                },
                R, b ? d: void 0, b, null)
            }
        })
    }),
    S.fn.extend({
        bind: function(g, R, gZ) {
            return this.on(g, null, R, gZ)
        },
        unbind: function(g, R) {
            return this.off(g, null, R)
        },
        delegate: function(g, R, gZ, d) {
            return this.on(R, g, gZ, d)
        },
        undelegate: function(g, R, gZ) {
            return 1 === arguments.length ? this.off(g, "**") : this.off(R, g || "**", gZ)
        }
    }),
    S.fn.size = function() {
        return this.length
    },
    S.fn.andSelf = S.fn.addBack,
    layui.define(function(g) {
        layui.$ = S,
        g("jquery", S)
    }),
    S
});