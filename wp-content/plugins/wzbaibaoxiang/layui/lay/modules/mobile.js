layui.define(function(c) {
    c("layui.mobile", layui.v)
});
layui.define(function(c) {
    "use strict";
    var h = {
        open: "{{",
        close: "}}"
    },
    e = {
        exp: function(c) {
            return new RegExp(c, "g")
        },
        query: function(c, e, a) {
            var g = ["#([\\s\\S])+?", "([^{#}])*?"][c || 0];
            return F((e || "") + h.open + g + h.close + (a || ""))
        },
        escape: function(c) {
            return String(c || "").replace(/&(?!#?[a-zA-Z0-9]+;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&quot;")
        },
        error: function(c, h) {
            var e = "Laytpl Error：";
            return "object" == typeof console && console.error(e + c + "\n" + (h || "")),
            e + c
        }
    },
    F = e.exp,
    a = function(c) {
        this.tpl = c
    };
    a.pt = a.prototype,
    window.errors = 0,
    a.pt.parse = function(c, a) {
        var g = this,
        f = c,
        N = F("^" + h.open + "#", ""),
        eb = F(h.close + "$", "");
        c = c.replace(/\s+|\r|\t|\n/g, " ").replace(F(h.open + "#"), h.open + "# ").replace(F(h.close + "}"), "} " + h.close).replace(/\\/g, "\\\\").replace(F(h.open + "!(.+?)!" + h.close),
        function(c) {
            return c = c.replace(F("^" + h.open + "!"), "").replace(F("!" + h.close), "").replace(F(h.open + "|" + h.close),
            function(c) {
                return c.replace(/(.)/g, "\\$1")
            })
        }).replace(/(?="|')/g, "\\").replace(e.query(),
        function(c) {
            return c = c.replace(N, "").replace(eb, ""),
            '";' + c.replace(/\\/g, "") + ';view+="'
        }).replace(e.query(1),
        function(c) {
            var e = '"+(';
            return c.replace(/\s/g, "") === h.open + h.close ? "": (c = c.replace(F(h.open + "|" + h.close), ""), /^=/.test(c) && (c = c.replace(/^=/, ""), e = '"+_escape_('), e + c.replace(/\\/g, "") + ')+"')
        }),
        c = '"use strict";var view = "' + c + '";return view;';
        try {
            return g.cache = c = new Function("d, _escape_", c),
            c(a, e.escape)
        } catch(c) {
            return delete g.cache,
            e.error(c, f)
        }
    },
    a.pt.render = function(c, h) {
        var F, a = this;
        return c ? (F = a.cache ? a.cache(c, e.escape) : a.parse(a.tpl, c), h ? void h(F) : F) : e.error("no data")
    };
    var g = function(c) {
        return "string" != typeof c ? e.error("Template not found") : new a(c)
    };
    g.config = function(c) {
        c = c || {};
        for (var e in c) h[e] = c[e]
    },
    g.v = "1.2.0",
    c("laytpl", g)
});
layui.define(function(c) {
    "use strict";
    var h = (window, document),
    e = "querySelectorAll",
    F = "getElementsByClassName",
    a = function(c) {
        return h[e](c)
    },
    g = {
        type: 0,
        shade: !0,
        shadeClose: !0,
        fixed: !0,
        anim: "scale"
    },
    f = {
        extend: function(c) {
            var h = JSON.parse(JSON.stringify(g));
            for (var e in c) h[e] = c[e];
            return h
        },
        timer: {},
        end: {}
    };
    f.touch = function(c, h) {
        c.addEventListener("click",
        function(c) {
            h.call(this, c)
        },
        !1)
    };
    var N = 0,
    eb = ["layui-m-layer"],
    eh = function(c) {
        var h = this;
        h.config = f.extend(c),
        h.view()
    };
    eh.prototype.view = function() {
        var c = this,
        e = c.config,
        g = h.createElement("div");
        c.id = g.id = eb[0] + N,
        g.setAttribute("class", eb[0] + " " + eb[0] + (e.type || 0)),
        g.setAttribute("index", N);
        var f = function() {
            var c = "object" == typeof e.title;
            return e.title ? '<h3 style="' + (c ? e.title[1] : "") + '">' + (c ? e.title[0] : e.title) + "</h3>": ""
        } (),
        eh = function() {
            "string" == typeof e.btn && (e.btn = [e.btn]);
            var c, h = (e.btn || []).length;
            return 0 !== h && e.btn ? (c = '<span yes type="1">' + e.btn[0] + "</span>", 2 === h && (c = '<span no type="0">' + e.btn[1] + "</span>" + c), '<div class="layui-m-layerbtn">' + c + "</div>") : ""
        } ();
        if (e.fixed || (e.top = e.hasOwnProperty("top") ? e.top: 100, e.style = e.style || "", e.style += " top:" + (h.body.scrollTop + e.top) + "px"), 2 === e.type && (e.content = '<i></i><i class="layui-m-layerload"></i><i></i><p>' + (e.content || "") + "</p>"), e.skin && (e.anim = "up"), "msg" === e.skin && (e.shade = !1), g.innerHTML = (e.shade ? "<div " + ("string" == typeof e.shade ? 'style="' + e.shade + '"': "") + ' class="layui-m-layershade"></div>': "") + '<div class="layui-m-layermain" ' + (e.fixed ? "": 'style="position:static;"') + '><div class="layui-m-layersection"><div class="layui-m-layerchild ' + (e.skin ? "layui-m-layer-" + e.skin + " ": "") + (e.className ? e.className: "") + " " + (e.anim ? "layui-m-anim-" + e.anim: "") + '" ' + (e.style ? 'style="' + e.style + '"': "") + ">" + f + '<div class="layui-m-layercont">' + e.content + "</div>" + eh + "</div></div></div>", !e.type || 2 === e.type) {
            var he = h[F](eb[0] + e.type),
            Fh = he.length;
            Fh >= 1 && d.close(he[0].getAttribute("index"))
        }
        document.body.appendChild(g);
        var aa = c.elem = a("#" + c.id)[0];
        e.success && e.success(aa),
        c.index = N++,
        c.action(e, aa)
    },
    eh.prototype.action = function(c, h) {
        var e = this;
        c.time && (f.timer[e.index] = setTimeout(function() {
            d.close(e.index)
        },
        1e3 * c.time));
        var a = function() {
            var h = this.getAttribute("type");
            0 == h ? (c.no && c.no(), d.close(e.index)) : c.yes ? c.yes(e.index) : d.close(e.index)
        };
        if (c.btn) for (var g = h[F]("layui-m-layerbtn")[0].children, N = g.length, eb = 0; eb < N; eb++) f.touch(g[eb], a);
        if (c.shade && c.shadeClose) {
            var eh = h[F]("layui-m-layershade")[0];
            f.touch(eh,
            function() {
                d.close(e.index, c.end)
            })
        }
        c.end && (f.end[e.index] = c.end)
    };
    var d = {
        v: "2.0 m",
        index: N,
        open: function(c) {
            var h = new eh(c || {});
            return h.index
        },
        close: function(c) {
            var e = a("#" + eb[0] + c)[0];
            e && (e.innerHTML = "", h.body.removeChild(e), clearTimeout(f.timer[c]), delete f.timer[c], "function" == typeof f.end[c] && f.end[c](), delete f.end[c])
        },
        closeAll: function() {
            for (var c = h[F](eb[0]), e = 0, a = c.length; e < a; e++) d.close(0 | c[0].getAttribute("index"))
        }
    };
    c("layer-mobile", d)
});
layui.define(function(c) {
    var h = function() {
        function c(c) {
            return null == c ? String(c) : v[w.call(c)] || "object"
        }
        function h(h) {
            return "function" == c(h)
        }
        function e(c) {
            return null != c && c == c.window
        }
        function F(c) {
            return null != c && c.nodeType == c.DOCUMENT_NODE
        }
        function a(h) {
            return "object" == c(h)
        }
        function g(c) {
            return a(c) && !e(c) && Object.getPrototypeOf(c) == Object.prototype
        }
        function f(c) {
            var h = !!c && "length" in c && c.length,
            F = cE.type(c);
            return "function" != F && !e(c) && ("array" == F || 0 === h || "number" == typeof h && h > 0 && h - 1 in c)
        }
        function N(c) {
            return bG.call(c,
            function(c) {
                return null != c
            })
        }
        function eb(c) {
            return c.length > 0 ? cE.fn.concat.apply([], c) : c
        }
        function eh(c) {
            return c.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
        }
        function d(c) {
            return c in aS ? aS[c] : aS[c] = new RegExp("(^|\\s)" + c + "(\\s|$)")
        }
        function he(c, h) {
            return "number" != typeof h || i[eh(c)] ? h: h + "px"
        }
        function Fh(c) {
            var h, e;
            return dA[c] || (h = cZ.createElement(c), cZ.body.appendChild(h), e = getComputedStyle(h, "").getPropertyValue("display"), h.parentNode.removeChild(h), "none" == e && (e = "block"), dA[c] = e),
            dA[c]
        }
        function aa(c) {
            return "children" in c ? cJ.call(c.children) : cE.map(c.childNodes,
            function(c) {
                if (1 == c.nodeType) return c
            })
        }
        function hb(c, h) {
            var e, F = c ? c.length: 0;
            for (e = 0; e < F; e++) this[e] = c[e];
            this.length = F,
            this.selector = h || ""
        }
        function aab(c, h, e) {
            for (dQ in h) e && (g(h[dQ]) || A(h[dQ])) ? (g(h[dQ]) && !g(c[dQ]) && (c[dQ] = {}), A(h[dQ]) && !A(c[dQ]) && (c[dQ] = []), aab(c[dQ], h[dQ], e)) : h[dQ] !== gb && (c[dQ] = h[dQ])
        }
        function fQ(c, h) {
            return null == h ? cE(c) : cE(c).filter(h)
        }
        function ej(c, e, F, a) {
            return h(e) ? e.call(c, F, a) : e
        }
        function cQ(c, h, e) {
            null == e ? c.removeAttribute(h) : c.setAttribute(h, e)
        }
        function gc(c, h) {
            var e = c.className || "",
            F = e && e.baseVal !== gb;
            return h === gb ? F ? e.baseVal: e: void(F ? e.baseVal = h: c.className = h)
        }
        function b(c) {
            try {
                return c ? "true" == c || "false" != c && ("null" == c ? null: +c + "" == c ? +c: /^[\[\{]/.test(c) ? cE.parseJSON(c) : c) : c
            } catch(h) {
                return c
            }
        }
        function B(c, h) {
            h(c);
            for (var e = 0,
            F = c.childNodes.length; e < F; e++) B(c.childNodes[e], h)
        }
        var gb, dQ, cE, aX, df, dd, fY = [],
        bb = fY.concat,
        bG = fY.filter,
        cJ = fY.slice,
        cZ = window.document,
        dA = {},
        aS = {},
        i = {
            "column-count": 1,
            columns: 1,
            "font-weight": 1,
            "line-height": 1,
            opacity: 1,
            "z-index": 1,
            zoom: 1
        },
        j = /^\s*<(\w+|!)[^>]*>/,
        k = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        l = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        m = /^(?:body|html)$/i,
        n = /([A-Z])/g,
        o = ["val", "css", "html", "text", "data", "width", "height", "offset"],
        p = ["after", "prepend", "before", "append"],
        q = cZ.createElement("table"),
        r = cZ.createElement("tr"),
        s = {
            tr: cZ.createElement("tbody"),
            tbody: q,
            thead: q,
            tfoot: q,
            td: r,
            th: r,
            "*": cZ.createElement("div")
        },
        t = /complete|loaded|interactive/,
        u = /^[\w-]*$/,
        v = {},
        w = v.toString,
        x = {},
        y = cZ.createElement("div"),
        z = {
            tabindex: "tabIndex",
            readonly: "readOnly",
            for: "htmlFor",
            class: "className",
            maxlength: "maxLength",
            cellspacing: "cellSpacing",
            cellpadding: "cellPadding",
            rowspan: "rowSpan",
            colspan: "colSpan",
            usemap: "useMap",
            frameborder: "frameBorder",
            contenteditable: "contentEditable"
        },
        A = Array.isArray ||
        function(c) {
            return c instanceof Array
        };
        return x.matches = function(c, h) {
            if (!h || !c || 1 !== c.nodeType) return ! 1;
            var e = c.matches || c.webkitMatchesSelector || c.mozMatchesSelector || c.oMatchesSelector || c.matchesSelector;
            if (e) return e.call(c, h);
            var F, a = c.parentNode,
            g = !a;
            return g && (a = y).appendChild(c),
            F = ~x.qsa(a, h).indexOf(c),
            g && y.removeChild(c),
            F
        },
        df = function(c) {
            return c.replace(/-+(.)?/g,
            function(c, h) {
                return h ? h.toUpperCase() : ""
            })
        },
        dd = function(c) {
            return bG.call(c,
            function(h, e) {
                return c.indexOf(h) == e
            })
        },
        x.fragment = function(c, h, e) {
            var F, a, f;
            return k.test(c) && (F = cE(cZ.createElement(RegExp.$1))),
            F || (c.replace && (c = c.replace(l, "<$1></$2>")), h === gb && (h = j.test(c) && RegExp.$1), h in s || (h = "*"), f = s[h], f.innerHTML = "" + c, F = cE.each(cJ.call(f.childNodes),
            function() {
                f.removeChild(this)
            })),
            g(e) && (a = cE(F), cE.each(e,
            function(c, h) {
                o.indexOf(c) > -1 ? a[c](h) : a.attr(c, h)
            })),
            F
        },
        x.Z = function(c, h) {
            return new hb(c, h)
        },
        x.isZ = function(c) {
            return c instanceof x.Z
        },
        x.init = function(c, e) {
            var F;
            if (!c) return x.Z();
            if ("string" == typeof c) if (c = c.trim(), "<" == c[0] && j.test(c)) F = x.fragment(c, RegExp.$1, e),
            c = null;
            else {
                if (e !== gb) return cE(e).find(c);
                F = x.qsa(cZ, c)
            } else {
                if (h(c)) return cE(cZ).ready(c);
                if (x.isZ(c)) return c;
                if (A(c)) F = N(c);
                else if (a(c)) F = [c],
                c = null;
                else if (j.test(c)) F = x.fragment(c.trim(), RegExp.$1, e),
                c = null;
                else {
                    if (e !== gb) return cE(e).find(c);
                    F = x.qsa(cZ, c)
                }
            }
            return x.Z(F, c)
        },
        cE = function(c, h) {
            return x.init(c, h)
        },
        cE.extend = function(c) {
            var h, e = cJ.call(arguments, 1);
            return "boolean" == typeof c && (h = c, c = e.shift()),
            e.forEach(function(e) {
                aab(c, e, h)
            }),
            c
        },
        x.qsa = function(c, h) {
            var e, F = "#" == h[0],
            a = !F && "." == h[0],
            g = F || a ? h.slice(1) : h,
            f = u.test(g);
            return c.getElementById && f && F ? (e = c.getElementById(g)) ? [e] : [] : 1 !== c.nodeType && 9 !== c.nodeType && 11 !== c.nodeType ? [] : cJ.call(f && !F && c.getElementsByClassName ? a ? c.getElementsByClassName(g) : c.getElementsByTagName(h) : c.querySelectorAll(h))
        },
        cE.contains = cZ.documentElement.contains ?
        function(c, h) {
            return c !== h && c.contains(h)
        }: function(c, h) {
            for (; h && (h = h.parentNode);) if (h === c) return ! 0;
            return ! 1
        },
        cE.type = c,
        cE.isFunction = h,
        cE.isWindow = e,
        cE.isArray = A,
        cE.isPlainObject = g,
        cE.isEmptyObject = function(c) {
            var h;
            for (h in c) return ! 1;
            return ! 0
        },
        cE.isNumeric = function(c) {
            var h = Number(c),
            e = typeof c;
            return null != c && "boolean" != e && ("string" != e || c.length) && !isNaN(h) && isFinite(h) || !1
        },
        cE.inArray = function(c, h, e) {
            return fY.indexOf.call(h, c, e)
        },
        cE.camelCase = df,
        cE.trim = function(c) {
            return null == c ? "": String.prototype.trim.call(c)
        },
        cE.uuid = 0,
        cE.support = {},
        cE.expr = {},
        cE.noop = function() {},
        cE.map = function(c, h) {
            var e, F, a, g = [];
            if (f(c)) for (F = 0; F < c.length; F++) e = h(c[F], F),
            null != e && g.push(e);
            else for (a in c) e = h(c[a], a),
            null != e && g.push(e);
            return eb(g)
        },
        cE.each = function(c, h) {
            var e, F;
            if (f(c)) {
                for (e = 0; e < c.length; e++) if (h.call(c[e], e, c[e]) === !1) return c
            } else for (F in c) if (h.call(c[F], F, c[F]) === !1) return c;
            return c
        },
        cE.grep = function(c, h) {
            return bG.call(c, h)
        },
        window.JSON && (cE.parseJSON = JSON.parse),
        cE.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),
        function(c, h) {
            v["[object " + h + "]"] = h.toLowerCase()
        }),
        cE.fn = {
            constructor: x.Z,
            length: 0,
            forEach: fY.forEach,
            reduce: fY.reduce,
            push: fY.push,
            sort: fY.sort,
            splice: fY.splice,
            indexOf: fY.indexOf,
            concat: function() {
                var c, h, e = [];
                for (c = 0; c < arguments.length; c++) h = arguments[c],
                e[c] = x.isZ(h) ? h.toArray() : h;
                return bb.apply(x.isZ(this) ? this.toArray() : this, e)
            },
            map: function(c) {
                return cE(cE.map(this,
                function(h, e) {
                    return c.call(h, e, h)
                }))
            },
            slice: function() {
                return cE(cJ.apply(this, arguments))
            },
            ready: function(c) {
                return t.test(cZ.readyState) && cZ.body ? c(cE) : cZ.addEventListener("DOMContentLoaded",
                function() {
                    c(cE)
                },
                !1),
                this
            },
            get: function(c) {
                return c === gb ? cJ.call(this) : this[c >= 0 ? c: c + this.length]
            },
            toArray: function() {
                return this.get()
            },
            size: function() {
                return this.length
            },
            remove: function() {
                return this.each(function() {
                    null != this.parentNode && this.parentNode.removeChild(this)
                })
            },
            each: function(c) {
                return fY.every.call(this,
                function(h, e) {
                    return c.call(h, e, h) !== !1
                }),
                this
            },
            filter: function(c) {
                return h(c) ? this.not(this.not(c)) : cE(bG.call(this,
                function(h) {
                    return x.matches(h, c)
                }))
            },
            add: function(c, h) {
                return cE(dd(this.concat(cE(c, h))))
            },
            is: function(c) {
                return this.length > 0 && x.matches(this[0], c)
            },
            not: function(c) {
                var e = [];
                if (h(c) && c.call !== gb) this.each(function(h) {
                    c.call(this, h) || e.push(this)
                });
                else {
                    var F = "string" == typeof c ? this.filter(c) : f(c) && h(c.item) ? cJ.call(c) : cE(c);
                    this.forEach(function(c) {
                        F.indexOf(c) < 0 && e.push(c)
                    })
                }
                return cE(e)
            },
            has: function(c) {
                return this.filter(function() {
                    return a(c) ? cE.contains(this, c) : cE(this).find(c).size()
                })
            },
            eq: function(c) {
                return c === -1 ? this.slice(c) : this.slice(c, +c + 1)
            },
            first: function() {
                var c = this[0];
                return c && !a(c) ? c: cE(c)
            },
            last: function() {
                var c = this[this.length - 1];
                return c && !a(c) ? c: cE(c)
            },
            find: function(c) {
                var h, e = this;
                return h = c ? "object" == typeof c ? cE(c).filter(function() {
                    var c = this;
                    return fY.some.call(e,
                    function(h) {
                        return cE.contains(h, c)
                    })
                }) : 1 == this.length ? cE(x.qsa(this[0], c)) : this.map(function() {
                    return x.qsa(this, c)
                }) : cE()
            },
            closest: function(c, h) {
                var e = [],
                a = "object" == typeof c && cE(c);
                return this.each(function(g, f) {
                    for (; f && !(a ? a.indexOf(f) >= 0 : x.matches(f, c));) f = f !== h && !F(f) && f.parentNode;
                    f && e.indexOf(f) < 0 && e.push(f)
                }),
                cE(e)
            },
            parents: function(c) {
                for (var h = [], e = this; e.length > 0;) e = cE.map(e,
                function(c) {
                    if ((c = c.parentNode) && !F(c) && h.indexOf(c) < 0) return h.push(c),
                    c
                });
                return fQ(h, c)
            },
            parent: function(c) {
                return fQ(dd(this.pluck("parentNode")), c)
            },
            children: function(c) {
                return fQ(this.map(function() {
                    return aa(this)
                }), c)
            },
            contents: function() {
                return this.map(function() {
                    return this.contentDocument || cJ.call(this.childNodes)
                })
            },
            siblings: function(c) {
                return fQ(this.map(function(c, h) {
                    return bG.call(aa(h.parentNode),
                    function(c) {
                        return c !== h
                    })
                }), c)
            },
            empty: function() {
                return this.each(function() {
                    this.innerHTML = ""
                })
            },
            pluck: function(c) {
                return cE.map(this,
                function(h) {
                    return h[c]
                })
            },
            show: function() {
                return this.each(function() {
                    "none" == this.style.display && (this.style.display = ""),
                    "none" == getComputedStyle(this, "").getPropertyValue("display") && (this.style.display = Fh(this.nodeName))
                })
            },
            replaceWith: function(c) {
                return this.before(c).remove()
            },
            wrap: function(c) {
                var e = h(c);
                if (this[0] && !e) var F = cE(c).get(0),
                a = F.parentNode || this.length > 1;
                return this.each(function(h) {
                    cE(this).wrapAll(e ? c.call(this, h) : a ? F.cloneNode(!0) : F)
                })
            },
            wrapAll: function(c) {
                if (this[0]) {
                    cE(this[0]).before(c = cE(c));
                    for (var h; (h = c.children()).length;) c = h.first();
                    cE(c).append(this)
                }
                return this
            },
            wrapInner: function(c) {
                var e = h(c);
                return this.each(function(h) {
                    var F = cE(this),
                    a = F.contents(),
                    g = e ? c.call(this, h) : c;
                    a.length ? a.wrapAll(g) : F.append(g)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    cE(this).replaceWith(cE(this).children())
                }),
                this
            },
            clone: function() {
                return this.map(function() {
                    return this.cloneNode(!0)
                })
            },
            hide: function() {
                return this.css("display", "none")
            },
            toggle: function(c) {
                return this.each(function() {
                    var h = cE(this); (c === gb ? "none" == h.css("display") : c) ? h.show() : h.hide()
                })
            },
            prev: function(c) {
                return cE(this.pluck("previousElementSibling")).filter(c || "*")
            },
            next: function(c) {
                return cE(this.pluck("nextElementSibling")).filter(c || "*")
            },
            html: function(c) {
                return 0 in arguments ? this.each(function(h) {
                    var e = this.innerHTML;
                    cE(this).empty().append(ej(this, c, h, e))
                }) : 0 in this ? this[0].innerHTML: null
            },
            text: function(c) {
                return 0 in arguments ? this.each(function(h) {
                    var e = ej(this, c, h, this.textContent);
                    this.textContent = null == e ? "": "" + e
                }) : 0 in this ? this.pluck("textContent").join("") : null
            },
            attr: function(c, h) {
                var e;
                return "string" != typeof c || 1 in arguments ? this.each(function(e) {
                    if (1 === this.nodeType) if (a(c)) for (dQ in c) cQ(this, dQ, c[dQ]);
                    else cQ(this, c, ej(this, h, e, this.getAttribute(c)))
                }) : 0 in this && 1 == this[0].nodeType && null != (e = this[0].getAttribute(c)) ? e: gb
            },
            removeAttr: function(c) {
                return this.each(function() {
                    1 === this.nodeType && c.split(" ").forEach(function(c) {
                        cQ(this, c)
                    },
                    this)
                })
            },
            prop: function(c, h) {
                return c = z[c] || c,
                1 in arguments ? this.each(function(e) {
                    this[c] = ej(this, h, e, this[c])
                }) : this[0] && this[0][c]
            },
            removeProp: function(c) {
                return c = z[c] || c,
                this.each(function() {
                    delete this[c]
                })
            },
            data: function(c, h) {
                var e = "data-" + c.replace(n, "-$1").toLowerCase(),
                F = 1 in arguments ? this.attr(e, h) : this.attr(e);
                return null !== F ? b(F) : gb
            },
            val: function(c) {
                return 0 in arguments ? (null == c && (c = ""), this.each(function(h) {
                    this.value = ej(this, c, h, this.value)
                })) : this[0] && (this[0].multiple ? cE(this[0]).find("option").filter(function() {
                    return this.selected
                }).pluck("value") : this[0].value)
            },
            offset: function(c) {
                if (c) return this.each(function(h) {
                    var e = cE(this),
                    F = ej(this, c, h, e.offset()),
                    a = e.offsetParent().offset(),
                    g = {
                        top: F.top - a.top,
                        left: F.left - a.left
                    };
                    "static" == e.css("position") && (g.position = "relative"),
                    e.css(g)
                });
                if (!this.length) return null;
                if (cZ.documentElement !== this[0] && !cE.contains(cZ.documentElement, this[0])) return {
                    top: 0,
                    left: 0
                };
                var h = this[0].getBoundingClientRect();
                return {
                    left: h.left + window.pageXOffset,
                    top: h.top + window.pageYOffset,
                    width: Math.round(h.width),
                    height: Math.round(h.height)
                }
            },
            css: function(h, e) {
                if (arguments.length < 2) {
                    var F = this[0];
                    if ("string" == typeof h) {
                        if (!F) return;
                        return F.style[df(h)] || getComputedStyle(F, "").getPropertyValue(h)
                    }
                    if (A(h)) {
                        if (!F) return;
                        var a = {},
                        g = getComputedStyle(F, "");
                        return cE.each(h,
                        function(c, h) {
                            a[h] = F.style[df(h)] || g.getPropertyValue(h)
                        }),
                        a
                    }
                }
                var f = "";
                if ("string" == c(h)) e || 0 === e ? f = eh(h) + ":" + he(h, e) : this.each(function() {
                    this.style.removeProperty(eh(h))
                });
                else for (dQ in h) h[dQ] || 0 === h[dQ] ? f += eh(dQ) + ":" + he(dQ, h[dQ]) + ";": this.each(function() {
                    this.style.removeProperty(eh(dQ))
                });
                return this.each(function() {
                    this.style.cssText += ";" + f
                })
            },
            index: function(c) {
                return c ? this.indexOf(cE(c)[0]) : this.parent().children().indexOf(this[0])
            },
            hasClass: function(c) {
                return !! c && fY.some.call(this,
                function(c) {
                    return this.test(gc(c))
                },
                d(c))
            },
            addClass: function(c) {
                return c ? this.each(function(h) {
                    if ("className" in this) {
                        aX = [];
                        var e = gc(this),
                        F = ej(this, c, h, e);
                        F.split(/\s+/g).forEach(function(c) {
                            cE(this).hasClass(c) || aX.push(c)
                        },
                        this),
                        aX.length && gc(this, e + (e ? " ": "") + aX.join(" "))
                    }
                }) : this
            },
            removeClass: function(c) {
                return this.each(function(h) {
                    if ("className" in this) {
                        if (c === gb) return gc(this, "");
                        aX = gc(this),
                        ej(this, c, h, aX).split(/\s+/g).forEach(function(c) {
                            aX = aX.replace(d(c), " ")
                        }),
                        gc(this, aX.trim())
                    }
                })
            },
            toggleClass: function(c, h) {
                return c ? this.each(function(e) {
                    var F = cE(this),
                    a = ej(this, c, e, gc(this));
                    a.split(/\s+/g).forEach(function(c) { (h === gb ? !F.hasClass(c) : h) ? F.addClass(c) : F.removeClass(c)
                    })
                }) : this
            },
            scrollTop: function(c) {
                if (this.length) {
                    var h = "scrollTop" in this[0];
                    return c === gb ? h ? this[0].scrollTop: this[0].pageYOffset: this.each(h ?
                    function() {
                        this.scrollTop = c
                    }: function() {
                        this.scrollTo(this.scrollX, c)
                    })
                }
            },
            scrollLeft: function(c) {
                if (this.length) {
                    var h = "scrollLeft" in this[0];
                    return c === gb ? h ? this[0].scrollLeft: this[0].pageXOffset: this.each(h ?
                    function() {
                        this.scrollLeft = c
                    }: function() {
                        this.scrollTo(c, this.scrollY)
                    })
                }
            },
            position: function() {
                if (this.length) {
                    var c = this[0],
                    h = this.offsetParent(),
                    e = this.offset(),
                    F = m.test(h[0].nodeName) ? {
                        top: 0,
                        left: 0
                    }: h.offset();
                    return e.top -= parseFloat(cE(c).css("margin-top")) || 0,
                    e.left -= parseFloat(cE(c).css("margin-left")) || 0,
                    F.top += parseFloat(cE(h[0]).css("border-top-width")) || 0,
                    F.left += parseFloat(cE(h[0]).css("border-left-width")) || 0,
                    {
                        top: e.top - F.top,
                        left: e.left - F.left
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var c = this.offsetParent || cZ.body; c && !m.test(c.nodeName) && "static" == cE(c).css("position");) c = c.offsetParent;
                    return c
                })
            }
        },
        cE.fn.detach = cE.fn.remove,
        ["width", "height"].forEach(function(c) {
            var h = c.replace(/./,
            function(c) {
                return c[0].toUpperCase()
            });
            cE.fn[c] = function(a) {
                var g, f = this[0];
                return a === gb ? e(f) ? f["inner" + h] : F(f) ? f.documentElement["scroll" + h] : (g = this.offset()) && g[c] : this.each(function(h) {
                    f = cE(this),
                    f.css(c, ej(this, a, h, f[c]()))
                })
            }
        }),
        p.forEach(function(h, e) {
            var F = e % 2;
            cE.fn[h] = function() {
                var h, a, g = cE.map(arguments,
                function(e) {
                    var F = [];
                    return h = c(e),
                    "array" == h ? (e.forEach(function(c) {
                        return c.nodeType !== gb ? F.push(c) : cE.zepto.isZ(c) ? F = F.concat(c.get()) : void(F = F.concat(x.fragment(c)))
                    }), F) : "object" == h || null == e ? e: x.fragment(e)
                }),
                f = this.length > 1;
                return g.length < 1 ? this: this.each(function(c, h) {
                    a = F ? h: h.parentNode,
                    h = 0 == e ? h.nextSibling: 1 == e ? h.firstChild: 2 == e ? h: null;
                    var N = cE.contains(cZ.documentElement, a);
                    g.forEach(function(c) {
                        if (f) c = c.cloneNode(!0);
                        else if (!a) return cE(c).remove();
                        a.insertBefore(c, h),
                        N && B(c,
                        function(c) {
                            if (! (null == c.nodeName || "SCRIPT" !== c.nodeName.toUpperCase() || c.type && "text/javascript" !== c.type || c.src)) {
                                var h = c.ownerDocument ? c.ownerDocument.defaultView: window;
                                h.eval.call(h, c.innerHTML)
                            }
                        })
                    })
                })
            },
            cE.fn[F ? h + "To": "insert" + (e ? "Before": "After")] = function(c) {
                return cE(c)[h](this),
                this
            }
        }),
        x.Z.prototype = hb.prototype = cE.fn,
        x.uniq = dd,
        x.deserializeValue = b,
        cE.zepto = x,
        cE
    } (); !
    function(c) {
        function h(c) {
            return c._zid || (c._zid = Fh++)
        }
        function e(c, e, g, f) {
            if (e = F(e), e.ns) var N = a(e.ns);
            return (fQ[h(c)] || []).filter(function(c) {
                return c && (!e.e || c.e == e.e) && (!e.ns || N.test(c.ns)) && (!g || h(c.fn) === h(g)) && (!f || c.sel == f)
            })
        }
        function F(c) {
            var h = ("" + c).split(".");
            return {
                e: h[0],
                ns: h.slice(1).sort().join(" ")
            }
        }
        function a(c) {
            return new RegExp("(?:^| )" + c.replace(" ", " .* ?") + "(?: |$)")
        }
        function g(c, h) {
            return c.del && !cQ && c.e in gc || !!h
        }
        function f(c) {
            return b[c] || cQ && gc[c] || c
        }
        function N(e, a, N, eb, d, Fh, aa) {
            var hb = h(e),
            aab = fQ[hb] || (fQ[hb] = []);
            a.split(/\s/).forEach(function(h) {
                if ("ready" == h) return c(document).ready(N);
                var a = F(h);
                a.fn = N,
                a.sel = d,
                a.e in b && (N = function(h) {
                    var e = h.relatedTarget;
                    if (!e || e !== this && !c.contains(this, e)) return a.fn.apply(this, arguments)
                }),
                a.del = Fh;
                var hb = Fh || N;
                a.proxy = function(c) {
                    if (c = eh(c), !c.isImmediatePropagationStopped()) {
                        c.data = eb;
                        var h = hb.apply(e, c._args == he ? [c] : [c].concat(c._args));
                        return h === !1 && (c.preventDefault(), c.stopPropagation()),
                        h
                    }
                },
                a.i = aab.length,
                aab.push(a),
                "addEventListener" in e && e.addEventListener(f(a.e), a.proxy, g(a, aa))
            })
        }
        function eb(c, F, a, N, eb) {
            var eh = h(c); (F || "").split(/\s/).forEach(function(h) {
                e(c, h, a, N).forEach(function(h) {
                    delete fQ[eh][h.i],
                    "removeEventListener" in c && c.removeEventListener(f(h.e), h.proxy, g(h, eb))
                })
            })
        }
        function eh(h, e) {
            return ! e && h.isDefaultPrevented || (e || (e = h), c.each(cE,
            function(c, F) {
                var a = e[c];
                h[c] = function() {
                    return this[F] = B,
                    a && a.apply(e, arguments)
                },
                h[F] = gb
            }), h.timeStamp || (h.timeStamp = Date.now()), (e.defaultPrevented !== he ? e.defaultPrevented: "returnValue" in e ? e.returnValue === !1 : e.getPreventDefault && e.getPreventDefault()) && (h.isDefaultPrevented = B)),
            h
        }
        function d(c) {
            var h, e = {
                originalEvent: c
            };
            for (h in c) dQ.test(h) || c[h] === he || (e[h] = c[h]);
            return eh(e, c)
        }
        var he, Fh = 1,
        aa = Array.prototype.slice,
        hb = c.isFunction,
        aab = function(c) {
            return "string" == typeof c
        },
        fQ = {},
        ej = {},
        cQ = "onfocusin" in window,
        gc = {
            focus: "focusin",
            blur: "focusout"
        },
        b = {
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        };
        ej.click = ej.mousedown = ej.mouseup = ej.mousemove = "MouseEvents",
        c.event = {
            add: N,
            remove: eb
        },
        c.proxy = function(e, F) {
            var a = 2 in arguments && aa.call(arguments, 2);
            if (hb(e)) {
                var g = function() {
                    return e.apply(F, a ? a.concat(aa.call(arguments)) : arguments)
                };
                return g._zid = h(e),
                g
            }
            if (aab(F)) return a ? (a.unshift(e[F], e), c.proxy.apply(null, a)) : c.proxy(e[F], e);
            throw new TypeError("expected function")
        },
        c.fn.bind = function(c, h, e) {
            return this.on(c, h, e)
        },
        c.fn.unbind = function(c, h) {
            return this.off(c, h)
        },
        c.fn.one = function(c, h, e, F) {
            return this.on(c, h, e, F, 1)
        };
        var B = function() {
            return ! 0
        },
        gb = function() {
            return ! 1
        },
        dQ = /^([A-Z]|returnValue$|layer[XY]$|webkitMovement[XY]$)/,
        cE = {
            preventDefault: "isDefaultPrevented",
            stopImmediatePropagation: "isImmediatePropagationStopped",
            stopPropagation: "isPropagationStopped"
        };
        c.fn.delegate = function(c, h, e) {
            return this.on(h, c, e)
        },
        c.fn.undelegate = function(c, h, e) {
            return this.off(h, c, e)
        },
        c.fn.live = function(h, e) {
            return c(document.body).delegate(this.selector, h, e),
            this
        },
        c.fn.die = function(h, e) {
            return c(document.body).undelegate(this.selector, h, e),
            this
        },
        c.fn.on = function(h, e, F, a, g) {
            var f, eh, Fh = this;
            return h && !aab(h) ? (c.each(h,
            function(c, h) {
                Fh.on(c, e, F, h, g)
            }), Fh) : (aab(e) || hb(a) || a === !1 || (a = F, F = e, e = he), a !== he && F !== !1 || (a = F, F = he), a === !1 && (a = gb), Fh.each(function(he, Fh) {
                g && (f = function(c) {
                    return eb(Fh, c.type, a),
                    a.apply(this, arguments)
                }),
                e && (eh = function(h) {
                    var F, g = c(h.target).closest(e, Fh).get(0);
                    if (g && g !== Fh) return F = c.extend(d(h), {
                        currentTarget: g,
                        liveFired: Fh
                    }),
                    (f || a).apply(g, [F].concat(aa.call(arguments, 1)))
                }),
                N(Fh, h, a, F, e, eh || f)
            }))
        },
        c.fn.off = function(h, e, F) {
            var a = this;
            return h && !aab(h) ? (c.each(h,
            function(c, h) {
                a.off(c, e, h)
            }), a) : (aab(e) || hb(F) || F === !1 || (F = e, e = he), F === !1 && (F = gb), a.each(function() {
                eb(this, h, F, e)
            }))
        },
        c.fn.trigger = function(h, e) {
            return h = aab(h) || c.isPlainObject(h) ? c.Event(h) : eh(h),
            h._args = e,
            this.each(function() {
                h.type in gc && "function" == typeof this[h.type] ? this[h.type]() : "dispatchEvent" in this ? this.dispatchEvent(h) : c(this).triggerHandler(h, e)
            })
        },
        c.fn.triggerHandler = function(h, F) {
            var a, g;
            return this.each(function(f, N) {
                a = d(aab(h) ? c.Event(h) : h),
                a._args = F,
                a.target = N,
                c.each(e(N, h.type || h),
                function(c, h) {
                    if (g = h.proxy(a), a.isImmediatePropagationStopped()) return ! 1
                })
            }),
            g
        },
        "focusin focusout focus blur load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function(h) {
            c.fn[h] = function(c) {
                return 0 in arguments ? this.bind(h, c) : this.trigger(h)
            }
        }),
        c.Event = function(c, h) {
            aab(c) || (h = c, c = h.type);
            var e = document.createEvent(ej[c] || "Events"),
            F = !0;
            if (h) for (var a in h)"bubbles" == a ? F = !!h[a] : e[a] = h[a];
            return e.initEvent(c, F, !0),
            eh(e)
        }
    } (h),
    function(c) {
        function h(h, e, F) {
            var a = c.Event(e);
            return c(h).trigger(a, F),
            !a.isDefaultPrevented()
        }
        function e(c, e, F, a) {
            if (c.global) return h(e || gc, F, a)
        }
        function F(h) {
            h.global && 0 === c.active++&&e(h, null, "ajaxStart")
        }
        function a(h) {
            h.global && !--c.active && e(h, null, "ajaxStop")
        }
        function g(c, h) {
            var F = h.context;
            return h.beforeSend.call(F, c, h) !== !1 && e(h, F, "ajaxBeforeSend", [c, h]) !== !1 && void e(h, F, "ajaxSend", [c, h])
        }
        function f(c, h, F, a) {
            var g = F.context,
            f = "success";
            F.success.call(g, c, f, h),
            a && a.resolveWith(g, [c, f, h]),
            e(F, g, "ajaxSuccess", [h, F, c]),
            eb(f, h, F)
        }
        function N(c, h, F, a, g) {
            var f = a.context;
            a.error.call(f, F, h, c),
            g && g.rejectWith(f, [F, h, c]),
            e(a, f, "ajaxError", [F, a, c || h]),
            eb(h, F, a)
        }
        function eb(c, h, F) {
            var g = F.context;
            F.complete.call(g, h, c),
            e(F, g, "ajaxComplete", [h, F]),
            a(F)
        }
        function eh(c, h, e) {
            if (e.dataFilter == d) return c;
            var F = e.context;
            return e.dataFilter.call(F, c, h)
        }
        function d() {}
        function he(c) {
            return c && (c = c.split(";", 2)[0]),
            c && (c == cE ? "html": c == dQ ? "json": B.test(c) ? "script": gb.test(c) && "xml") || "text"
        }
        function Fh(c, h) {
            return "" == h ? c: (c + "&" + h).replace(/[&?]{1,2}/, "?")
        }
        function aa(h) {
            h.processData && h.data && "string" != c.type(h.data) && (h.data = c.param(h.data, h.traditional)),
            !h.data || h.type && "GET" != h.type.toUpperCase() && "jsonp" != h.dataType || (h.url = Fh(h.url, h.data), h.data = void 0)
        }
        function hb(h, e, F, a) {
            return c.isFunction(e) && (a = F, F = e, e = void 0),
            c.isFunction(F) || (a = F, F = void 0),
            {
                url: h,
                data: e,
                success: F,
                dataType: a
            }
        }
        function aab(h, e, F, a) {
            var g, f = c.isArray(e),
            N = c.isPlainObject(e);
            c.each(e,
            function(e, eb) {
                g = c.type(eb),
                a && (e = F ? a: a + "[" + (N || "object" == g || "array" == g ? e: "") + "]"),
                !a && f ? h.add(eb.name, eb.value) : "array" == g || !F && "object" == g ? aab(h, eb, F, e) : h.add(e, eb)
            })
        }
        var fQ, ej, cQ = +new Date,
        gc = window.document,
        b = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        B = /^(?:text|application)\/javascript/i,
        gb = /^(?:text|application)\/xml/i,
        dQ = "application/json",
        cE = "text/html",
        aX = /^\s*$/,
        df = gc.createElement("a");
        df.href = window.location.href,
        c.active = 0,
        c.ajaxJSONP = function(h, e) {
            if (! ("type" in h)) return c.ajax(h);
            var F, a, eb = h.jsonpCallback,
            eh = (c.isFunction(eb) ? eb() : eb) || "Zepto" + cQ++,
            d = gc.createElement("script"),
            he = window[eh],
            Fh = function(h) {
                c(d).triggerHandler("error", h || "abort")
            },
            aa = {
                abort: Fh
            };
            return e && e.promise(aa),
            c(d).on("load error",
            function(g, eb) {
                clearTimeout(a),
                c(d).off().remove(),
                "error" != g.type && F ? f(F[0], aa, h, e) : N(null, eb || "error", aa, h, e),
                window[eh] = he,
                F && c.isFunction(he) && he(F[0]),
                he = F = void 0
            }),
            g(aa, h) === !1 ? (Fh("abort"), aa) : (window[eh] = function() {
                F = arguments
            },
            d.src = h.url.replace(/\?(.+)=\?/, "?$1=" + eh), gc.head.appendChild(d), h.timeout > 0 && (a = setTimeout(function() {
                Fh("timeout")
            },
            h.timeout)), aa)
        },
        c.ajaxSettings = {
            type: "GET",
            beforeSend: d,
            success: d,
            error: d,
            complete: d,
            context: null,
            global: !0,
            xhr: function() {
                return new window.XMLHttpRequest
            },
            accepts: {
                script: "text/javascript, application/javascript, application/x-javascript",
                json: dQ,
                xml: "application/xml, text/xml",
                html: cE,
                text: "text/plain"
            },
            crossDomain: !1,
            timeout: 0,
            processData: !0,
            cache: !0,
            dataFilter: d
        },
        c.ajax = function(h) {
            var e, a, eb = c.extend({},
            h || {}),
            hb = c.Deferred && c.Deferred();
            for (fQ in c.ajaxSettings) void 0 === eb[fQ] && (eb[fQ] = c.ajaxSettings[fQ]);
            F(eb),
            eb.crossDomain || (e = gc.createElement("a"), e.href = eb.url, e.href = e.href, eb.crossDomain = df.protocol + "//" + df.host != e.protocol + "//" + e.host),
            eb.url || (eb.url = window.location.toString()),
            (a = eb.url.indexOf("#")) > -1 && (eb.url = eb.url.slice(0, a)),
            aa(eb);
            var aab = eb.dataType,
            cQ = /\?.+=\?/.test(eb.url);
            if (cQ && (aab = "jsonp"), eb.cache !== !1 && (h && h.cache === !0 || "script" != aab && "jsonp" != aab) || (eb.url = Fh(eb.url, "_=" + Date.now())), "jsonp" == aab) return cQ || (eb.url = Fh(eb.url, eb.jsonp ? eb.jsonp + "=?": eb.jsonp === !1 ? "": "callback=?")),
            c.ajaxJSONP(eb, hb);
            var b, B = eb.accepts[aab],
            gb = {},
            dQ = function(c, h) {
                gb[c.toLowerCase()] = [c, h]
            },
            cE = /^([\w-]+:)\/\//.test(eb.url) ? RegExp.$1: window.location.protocol,
            dd = eb.xhr(),
            fY = dd.setRequestHeader;
            if (hb && hb.promise(dd), eb.crossDomain || dQ("X-Requested-With", "XMLHttpRequest"), dQ("Accept", B || "*/*"), (B = eb.mimeType || B) && (B.indexOf(",") > -1 && (B = B.split(",", 2)[0]), dd.overrideMimeType && dd.overrideMimeType(B)), (eb.contentType || eb.contentType !== !1 && eb.data && "GET" != eb.type.toUpperCase()) && dQ("Content-Type", eb.contentType || "application/x-www-form-urlencoded"), eb.headers) for (ej in eb.headers) dQ(ej, eb.headers[ej]);
            if (dd.setRequestHeader = dQ, dd.onreadystatechange = function() {
                if (4 == dd.readyState) {
                    dd.onreadystatechange = d,
                    clearTimeout(b);
                    var h, e = !1;
                    if (dd.status >= 200 && dd.status < 300 || 304 == dd.status || 0 == dd.status && "file:" == cE) {
                        if (aab = aab || he(eb.mimeType || dd.getResponseHeader("content-type")), "arraybuffer" == dd.responseType || "blob" == dd.responseType) h = dd.response;
                        else {
                            h = dd.responseText;
                            try {
                                h = eh(h, aab, eb),
                                "script" == aab ? (0, eval)(h) : "xml" == aab ? h = dd.responseXML: "json" == aab && (h = aX.test(h) ? null: c.parseJSON(h))
                            } catch(c) {
                                e = c
                            }
                            if (e) return N(e, "parsererror", dd, eb, hb)
                        }
                        f(h, dd, eb, hb)
                    } else N(dd.statusText || null, dd.status ? "error": "abort", dd, eb, hb)
                }
            },
            g(dd, eb) === !1) return dd.abort(),
            N(null, "abort", dd, eb, hb),
            dd;
            var bb = !("async" in eb) || eb.async;
            if (dd.open(eb.type, eb.url, bb, eb.username, eb.password), eb.xhrFields) for (ej in eb.xhrFields) dd[ej] = eb.xhrFields[ej];
            for (ej in gb) fY.apply(dd, gb[ej]);
            return eb.timeout > 0 && (b = setTimeout(function() {
                dd.onreadystatechange = d,
                dd.abort(),
                N(null, "timeout", dd, eb, hb)
            },
            eb.timeout)),
            dd.send(eb.data ? eb.data: null),
            dd
        },
        c.get = function() {
            return c.ajax(hb.apply(null, arguments))
        },
        c.post = function() {
            var h = hb.apply(null, arguments);
            return h.type = "POST",
            c.ajax(h)
        },
        c.getJSON = function() {
            var h = hb.apply(null, arguments);
            return h.dataType = "json",
            c.ajax(h)
        },
        c.fn.load = function(h, e, F) {
            if (!this.length) return this;
            var a, g = this,
            f = h.split(/\s/),
            N = hb(h, e, F),
            eb = N.success;
            return f.length > 1 && (N.url = f[0], a = f[1]),
            N.success = function(h) {
                g.html(a ? c("<div>").html(h.replace(b, "")).find(a) : h),
                eb && eb.apply(g, arguments)
            },
            c.ajax(N),
            this
        };
        var dd = encodeURIComponent;
        c.param = function(h, e) {
            var F = [];
            return F.add = function(h, e) {
                c.isFunction(e) && (e = e()),
                null == e && (e = ""),
                this.push(dd(h) + "=" + dd(e))
            },
            aab(F, h, e),
            F.join("&").replace(/%20/g, "+")
        }
    } (h),
    function(c) {
        c.fn.serializeArray = function() {
            var h, e, F = [],
            a = function(c) {
                return c.forEach ? c.forEach(a) : void F.push({
                    name: h,
                    value: c
                })
            };
            return this[0] && c.each(this[0].elements,
            function(F, g) {
                e = g.type,
                h = g.name,
                h && "fieldset" != g.nodeName.toLowerCase() && !g.disabled && "submit" != e && "reset" != e && "button" != e && "file" != e && ("radio" != e && "checkbox" != e || g.checked) && a(c(g).val())
            }),
            F
        },
        c.fn.serialize = function() {
            var c = [];
            return this.serializeArray().forEach(function(h) {
                c.push(encodeURIComponent(h.name) + "=" + encodeURIComponent(h.value))
            }),
            c.join("&")
        },
        c.fn.submit = function(h) {
            if (0 in arguments) this.bind("submit", h);
            else if (this.length) {
                var e = c.Event("submit");
                this.eq(0).trigger(e),
                e.isDefaultPrevented() || this.get(0).submit()
            }
            return this
        }
    } (h),
    function() {
        try {
            getComputedStyle(void 0)
        } catch(h) {
            var c = getComputedStyle;
            window.getComputedStyle = function(h, e) {
                try {
                    return c(h, e)
                } catch(c) {
                    return null
                }
            }
        }
    } (),
    c("zepto", h)
});
layui.define(function(c) {
    c("layim-mobile", layui.v)
});
layui["layui.mobile"] || layui.config({
    base: layui.cache.dir + "lay/modules/mobile/"
}).extend({
    "layer-mobile": "layer-mobile",
    zepto: "zepto",
    "upload-mobile": "upload-mobile",
    "layim-mobile": "layim-mobile"
}),
layui.define(["layer-mobile", "zepto", "layim-mobile"],
function(c) {
    c("mobile", {
        layer: layui["layer-mobile"],
        layim: layui["layim-mobile"]
    })
});