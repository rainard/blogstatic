!
function() {
    "use strict";
    var gjf = window.layui && layui.define,
    NeD = {
        getPath: function() {
            var gjf = document.currentScript ? document.currentScript.src: function() {
                for (var gjf, NeD = document.scripts,
                aBf = NeD.length - 1,
                haa = aBf; haa > 0; haa--) if ("interactive" === NeD[haa].readyState) {
                    gjf = NeD[haa].src;
                    break
                }
                return gjf || NeD[aBf].src
            } ();
            return gjf.substring(0, gjf.lastIndexOf("/") + 1)
        } (),
        getStyle: function(gjf, NeD) {
            var aBf = gjf.currentStyle ? gjf.currentStyle: window.getComputedStyle(gjf, null);
            return aBf[aBf.getPropertyValue ? "getPropertyValue": "getAttribute"](NeD)
        },
        link: function(gjf, haa, eMb) {
            if (aBf.path) {
                var aaE = document.getElementsByTagName("head")[0],
                fgc = document.createElement("link");
                "string" == typeof haa && (eMb = haa);
                var HfH = (eMb || gjf).replace(/\.|\//g, ""),
                cVa = "layuicss-" + HfH,
                gbK = 0;
                fgc.rel = "stylesheet",
                fgc.href = aBf.path + gjf,
                fgc.id = cVa,
                document.getElementById(cVa) || aaE.appendChild(fgc),
                "function" == typeof haa && !
                function gjf() {
                    return++gbK > 80 ? window.console && console.error("laydate.css: Invalid") : void(1989 === parseInt(NeD.getStyle(document.getElementById(cVa), "width")) ? haa() : setTimeout(gjf, 100))
                } ()
            }
        }
    },
    aBf = {
        v: "5.0.9",
        config: {},
        index: window.laydate && window.laydate.v ? 1e5: 0,
        path: NeD.getPath,
        set: function(gjf) {
            var NeD = this;
            return NeD.config = NeDgjf.extend({},
            NeD.config, gjf),
            NeD
        },
        ready: function(haa) {
            var eMb = "laydate",
            aaE = "",
            fgc = (gjf ? "modules/laydate/": "theme/") + "default/laydate.css?v=" + aBf.v + aaE;
            return gjf ? layui.addcss(fgc, haa, eMb) : NeD.link(fgc, haa, eMb),
            this
        }
    },
    haa = function() {
        var gjf = this;
        return {
            hint: function(NeD) {
                gjf.hint.call(gjf, NeD)
            },
            config: gjf.config
        }
    },
    eMb = "laydate",
    aaE = ".layui-laydate",
    fgc = "layui-this",
    HfH = "laydate-disabled",
    cVa = "开始日期超出了结束日期<br>建议重新选择",
    gbK = [100, 2e5],
    eba = "layui-laydate-static",
    KcX = "layui-laydate-list",
    fbd = "laydate-selected",
    ifB = "layui-laydate-hint",
    cEe = "laydate-day-prev",
    BfV = "laydate-day-next",
    fLe = "layui-laydate-footer",
    HaR = ".laydate-btns-confirm",
    fgb = "laydate-time-text",
    ddh = ".laydate-btns-time",
    gjfgjf = function(gjf) {
        var NeD = this;
        NeD.index = ++aBf.index,
        NeD.config = NeDgjf.extend({},
        NeD.config, aBf.config, gjf),
        aBf.ready(function() {
            NeD.init()
        })
    },
    NeDgjf = function(gjf) {
        return new aBfgjf(gjf)
    },
    aBfgjf = function(gjf) {
        for (var NeD = 0,
        aBf = "object" == typeof gjf ? [gjf] : (this.selector = gjf, document.querySelectorAll(gjf || null)); NeD < aBf.length; NeD++) this.push(aBf[NeD])
    };
    aBfgjf.prototype = [],
    aBfgjf.prototype.constructor = aBfgjf,
    NeDgjf.extend = function() {
        var gjf = 1,
        NeD = arguments,
        aBf = function(gjf, NeD) {
            gjf = gjf || (NeD.constructor === Array ? [] : {});
            for (var haa in NeD) gjf[haa] = NeD[haa] && NeD[haa].constructor === Object ? aBf(gjf[haa], NeD[haa]) : NeD[haa];
            return gjf
        };
        for (NeD[0] = "object" == typeof NeD[0] ? NeD[0] : {}; gjf < NeD.length; gjf++)"object" == typeof NeD[gjf] && aBf(NeD[0], NeD[gjf]);
        return NeD[0]
    },
    NeDgjf.ie = function() {
        var gjf = navigator.userAgent.toLowerCase();
        return !! (window.ActiveXObject || "ActiveXObject" in window) && ((gjf.match(/msie\s(\d+)/) || [])[1] || "11")
    } (),
    NeDgjf.stope = function(gjf) {
        gjf = gjf || window.event,
        gjf.stopPropagation ? gjf.stopPropagation() : gjf.cancelBubble = !0
    },
    NeDgjf.each = function(gjf, NeD) {
        var aBf, haa = this;
        if ("function" != typeof NeD) return haa;
        if (gjf = gjf || [], gjf.constructor === Object) {
            for (aBf in gjf) if (NeD.call(gjf[aBf], aBf, gjf[aBf])) break
        } else for (aBf = 0; aBf < gjf.length && !NeD.call(gjf[aBf], aBf, gjf[aBf]); aBf++);
        return haa
    },
    NeDgjf.digit = function(gjf, NeD, aBf) {
        var haa = "";
        gjf = String(gjf),
        NeD = NeD || 2;
        for (var eMb = gjf.length; eMb < NeD; eMb++) haa += "0";
        return gjf < Math.pow(10, NeD) ? haa + (0 | gjf) : gjf
    },
    NeDgjf.elem = function(gjf, NeD) {
        var aBf = document.createElement(gjf);
        return NeDgjf.each(NeD || {},
        function(gjf, NeD) {
            aBf.setAttribute(gjf, NeD)
        }),
        aBf
    },
    aBfgjf.addStr = function(gjf, NeD) {
        return gjf = gjf.replace(/\s+/, " "),
        NeD = NeD.replace(/\s+/, " ").split(" "),
        NeDgjf.each(NeD,
        function(NeD, aBf) {
            new RegExp("\\b" + aBf + "\\b").test(gjf) || (gjf = gjf + " " + aBf)
        }),
        gjf.replace(/^\s|\s$/, "")
    },
    aBfgjf.removeStr = function(gjf, NeD) {
        return gjf = gjf.replace(/\s+/, " "),
        NeD = NeD.replace(/\s+/, " ").split(" "),
        NeDgjf.each(NeD,
        function(NeD, aBf) {
            var haa = new RegExp("\\b" + aBf + "\\b");
            haa.test(gjf) && (gjf = gjf.replace(haa, ""))
        }),
        gjf.replace(/\s+/, " ").replace(/^\s|\s$/, "")
    },
    aBfgjf.prototype.find = function(gjf) {
        var NeD = this,
        aBf = 0,
        haa = [],
        eMb = "object" == typeof gjf;
        return this.each(function(aaE, fgc) {
            for (var HfH = eMb ? [gjf] : fgc.querySelectorAll(gjf || null); aBf < HfH.length; aBf++) haa.push(HfH[aBf]);
            NeD.shift()
        }),
        eMb || (NeD.selector = (NeD.selector ? NeD.selector + " ": "") + gjf),
        NeDgjf.each(haa,
        function(gjf, aBf) {
            NeD.push(aBf)
        }),
        NeD
    },
    aBfgjf.prototype.each = function(gjf) {
        return NeDgjf.each.call(this, this, gjf)
    },
    aBfgjf.prototype.addClass = function(gjf, NeD) {
        return this.each(function(aBf, haa) {
            haa.className = aBfgjf[NeD ? "removeStr": "addStr"](haa.className, gjf)
        })
    },
    aBfgjf.prototype.removeClass = function(gjf) {
        return this.addClass(gjf, !0)
    },
    aBfgjf.prototype.hasClass = function(gjf) {
        var NeD = !1;
        return this.each(function(aBf, haa) {
            new RegExp("\\b" + gjf + "\\b").test(haa.className) && (NeD = !0)
        }),
        NeD
    },
    aBfgjf.prototype.attr = function(gjf, NeD) {
        var aBf = this;
        return void 0 === NeD ?
        function() {
            if (aBf.length > 0) return aBf[0].getAttribute(gjf)
        } () : aBf.each(function(aBf, haa) {
            haa.setAttribute(gjf, NeD)
        })
    },
    aBfgjf.prototype.removeAttr = function(gjf) {
        return this.each(function(NeD, aBf) {
            aBf.removeAttribute(gjf)
        })
    },
    aBfgjf.prototype.html = function(gjf) {
        return this.each(function(NeD, aBf) {
            aBf.innerHTML = gjf
        })
    },
    aBfgjf.prototype.val = function(gjf) {
        return this.each(function(NeD, aBf) {
            aBf.value = gjf
        })
    },
    aBfgjf.prototype.append = function(gjf) {
        return this.each(function(NeD, aBf) {
            "object" == typeof gjf ? aBf.appendChild(gjf) : aBf.innerHTML = aBf.innerHTML + gjf
        })
    },
    aBfgjf.prototype.remove = function(gjf) {
        return this.each(function(NeD, aBf) {
            gjf ? aBf.removeChild(gjf) : aBf.parentNode.removeChild(aBf)
        })
    },
    aBfgjf.prototype.on = function(gjf, NeD) {
        return this.each(function(aBf, haa) {
            haa.attachEvent ? haa.attachEvent("on" + gjf,
            function(gjf) {
                gjf.target = gjf.srcElement,
                NeD.call(haa, gjf)
            }) : haa.addEventListener(gjf, NeD, !1)
        })
    },
    aBfgjf.prototype.off = function(gjf, NeD) {
        return this.each(function(aBf, haa) {
            haa.detachEvent ? haa.detachEvent("on" + gjf, NeD) : haa.removeEventListener(gjf, NeD, !1)
        })
    },
    gjfgjf.isLeapYear = function(gjf) {
        return gjf % 4 === 0 && gjf % 100 !== 0 || gjf % 400 === 0
    },
    gjfgjf.prototype.config = {
        type: "date",
        range: !1,
        format: "yyyy-MM-dd",
        value: null,
        isInitValue: !0,
        min: "1900-1-1",
        max: "2099-12-31",
        trigger: "focus",
        show: !1,
        showBottom: !0,
        btns: ["clear", "now", "confirm"],
        lang: "cn",
        theme: "default",
        position: null,
        calendar: !1,
        mark: {},
        zIndex: null,
        done: null,
        change: null
    },
    gjfgjf.prototype.lang = function() {
        var gjf = this,
        NeD = gjf.config,
        aBf = {
            cn: {
                weeks: ["日", "一", "二", "三", "四", "五", "六"],
                time: ["时", "分", "秒"],
                timeTips: "选择时间",
                startTime: "开始时间",
                endTime: "结束时间",
                dateTips: "返回日期",
                month: ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],
                tools: {
                    confirm: "确定",
                    clear: "清空",
                    now: "现在"
                }
            },
            en: {
                weeks: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                time: ["Hours", "Minutes", "Seconds"],
                timeTips: "Select Time",
                startTime: "Start Time",
                endTime: "End Time",
                dateTips: "Select Date",
                month: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                tools: {
                    confirm: "Confirm",
                    clear: "Clear",
                    now: "Now"
                }
            }
        };
        return aBf[NeD.lang] || aBf.cn
    },
    gjfgjf.prototype.init = function() {
        var gjf = this,
        NeD = gjf.config,
        aBf = "yyyy|y|MM|M|dd|d|HH|H|mm|m|ss|s",
        haa = "static" === NeD.position,
        eMb = {
            year: "yyyy",
            month: "yyyy-MM",
            date: "yyyy-MM-dd",
            time: "HH:mm:ss",
            datetime: "yyyy-MM-dd HH:mm:ss"
        };
        NeD.elem = NeDgjf(NeD.elem),
        NeD.eventElem = NeDgjf(NeD.eventElem),
        NeD.elem[0] && (NeD.range === !0 && (NeD.range = "-"), NeD.format === eMb.date && (NeD.format = eMb[NeD.type]), gjf.format = NeD.format.match(new RegExp(aBf + "|.", "g")) || [], gjf.EXP_IF = "", gjf.EXP_SPLIT = "", NeDgjf.each(gjf.format,
        function(NeD, haa) {
            var eMb = new RegExp(aBf).test(haa) ? "\\d{" +
            function() {
                return new RegExp(aBf).test(gjf.format[0 === NeD ? NeD + 1 : NeD - 1] || "") ? /^yyyy|y$/.test(haa) ? 4 : haa.length: /^yyyy$/.test(haa) ? "1,4": /^y$/.test(haa) ? "1,308": "1,2"
            } () + "}": "\\" + haa;
            gjf.EXP_IF = gjf.EXP_IF + eMb,
            gjf.EXP_SPLIT = gjf.EXP_SPLIT + "(" + eMb + ")"
        }), gjf.EXP_IF = new RegExp("^" + (NeD.range ? gjf.EXP_IF + "\\s\\" + NeD.range + "\\s" + gjf.EXP_IF: gjf.EXP_IF) + "$"), gjf.EXP_SPLIT = new RegExp("^" + gjf.EXP_SPLIT + "$", ""), gjf.isInput(NeD.elem[0]) || "focus" === NeD.trigger && (NeD.trigger = "click"), NeD.elem.attr("lay-key") || (NeD.elem.attr("lay-key", gjf.index), NeD.eventElem.attr("lay-key", gjf.index)), NeD.mark = NeDgjf.extend({},
        NeD.calendar && "cn" === NeD.lang ? {
            "0-1-1": "元旦",
            "0-2-14": "情人",
            "0-3-8": "妇女",
            "0-3-12": "植树",
            "0-4-1": "愚人",
            "0-5-1": "劳动",
            "0-5-4": "青年",
            "0-6-1": "儿童",
            "0-9-10": "教师",
            "0-9-18": "国耻",
            "0-10-1": "国庆",
            "0-12-25": "圣诞"
        }: {},
        NeD.mark), NeDgjf.each(["min", "max"],
        function(gjf, aBf) {
            var haa = [],
            eMb = [];
            if ("number" == typeof NeD[aBf]) {
                var aaE = NeD[aBf],
                fgc = (new Date).getTime(),
                HfH = 864e5,
                cVa = new Date(aaE ? aaE < HfH ? fgc + aaE * HfH: aaE: fgc);
                haa = [cVa.getFullYear(), cVa.getMonth() + 1, cVa.getDate()],
                aaE < HfH || (eMb = [cVa.getHours(), cVa.getMinutes(), cVa.getSeconds()])
            } else haa = (NeD[aBf].match(/\d+-\d+-\d+/) || [""])[0].split("-"),
            eMb = (NeD[aBf].match(/\d+:\d+:\d+/) || [""])[0].split(":");
            NeD[aBf] = {
                year: 0 | haa[0] || (new Date).getFullYear(),
                month: haa[1] ? (0 | haa[1]) - 1 : (new Date).getMonth(),
                date: 0 | haa[2] || (new Date).getDate(),
                hours: 0 | eMb[0],
                minutes: 0 | eMb[1],
                seconds: 0 | eMb[2]
            }
        }), gjf.elemID = "layui-laydate" + NeD.elem.attr("lay-key"), (NeD.show || haa) && gjf.render(), haa || gjf.events(), NeD.value && NeD.isInitValue && (NeD.value.constructor === Date ? gjf.setValue(gjf.parse(0, gjf.systemDate(NeD.value))) : gjf.setValue(NeD.value)))
    },
    gjfgjf.prototype.render = function() {
        var gjf = this,
        NeD = gjf.config,
        aBf = gjf.lang(),
        haa = "static" === NeD.position,
        eMb = gjf.elem = NeDgjf.elem("div", {
            id: gjf.elemID,
            class: ["layui-laydate", NeD.range ? " layui-laydate-range": "", haa ? " " + eba: "", NeD.theme && "default" !== NeD.theme && !/^#/.test(NeD.theme) ? " laydate-theme-" + NeD.theme: ""].join("")
        }),
        aaE = gjf.elemMain = [],
        fgc = gjf.elemHeader = [],
        HfH = gjf.elemCont = [],
        cVa = gjf.table = [],
        gbK = gjf.footer = NeDgjf.elem("div", {
            class: fLe
        });
        if (NeD.zIndex && (eMb.style.zIndex = NeD.zIndex), NeDgjf.each(new Array(2),
        function(gjf) {
            if (!NeD.range && gjf > 0) return ! 0;
            var haa = NeDgjf.elem("div", {
                class: "layui-laydate-header"
            }),
            eMb = [function() {
                var gjf = NeDgjf.elem("i", {
                    class: "layui-icon laydate-icon laydate-prev-y"
                });
                return gjf.innerHTML = "&#xe65a;",
                gjf
            } (),
            function() {
                var gjf = NeDgjf.elem("i", {
                    class: "layui-icon laydate-icon laydate-prev-m"
                });
                return gjf.innerHTML = "&#xe603;",
                gjf
            } (),
            function() {
                var gjf = NeDgjf.elem("div", {
                    class: "laydate-set-ym"
                }),
                NeD = NeDgjf.elem("span"),
                aBf = NeDgjf.elem("span");
                return gjf.appendChild(NeD),
                gjf.appendChild(aBf),
                gjf
            } (),
            function() {
                var gjf = NeDgjf.elem("i", {
                    class: "layui-icon laydate-icon laydate-next-m"
                });
                return gjf.innerHTML = "&#xe602;",
                gjf
            } (),
            function() {
                var gjf = NeDgjf.elem("i", {
                    class: "layui-icon laydate-icon laydate-next-y"
                });
                return gjf.innerHTML = "&#xe65b;",
                gjf
            } ()],
            gbK = NeDgjf.elem("div", {
                class: "layui-laydate-content"
            }),
            eba = NeDgjf.elem("table"),
            KcX = NeDgjf.elem("thead"),
            fbd = NeDgjf.elem("tr");
            NeDgjf.each(eMb,
            function(gjf, NeD) {
                haa.appendChild(NeD)
            }),
            KcX.appendChild(fbd),
            NeDgjf.each(new Array(6),
            function(gjf) {
                var NeD = eba.insertRow(0);
                NeDgjf.each(new Array(7),
                function(haa) {
                    if (0 === gjf) {
                        var eMb = NeDgjf.elem("th");
                        eMb.innerHTML = aBf.weeks[haa],
                        fbd.appendChild(eMb)
                    }
                    NeD.insertCell(haa)
                })
            }),
            eba.insertBefore(KcX, eba.children[0]),
            gbK.appendChild(eba),
            aaE[gjf] = NeDgjf.elem("div", {
                class: "layui-laydate-main laydate-main-list-" + gjf
            }),
            aaE[gjf].appendChild(haa),
            aaE[gjf].appendChild(gbK),
            fgc.push(eMb),
            HfH.push(gbK),
            cVa.push(eba)
        }), NeDgjf(gbK).html(function() {
            var gjf = [],
            eMb = [];
            return "datetime" === NeD.type && gjf.push('<span lay-type="datetime" class="laydate-btns-time">' + aBf.timeTips + "</span>"),
            NeDgjf.each(NeD.btns,
            function(gjf, aaE) {
                var fgc = aBf.tools[aaE] || "btn";
                NeD.range && "now" === aaE || (haa && "clear" === aaE && (fgc = "cn" === NeD.lang ? "重置": "Reset"), eMb.push('<span lay-type="' + aaE + '" class="laydate-btns-' + aaE + '">' + fgc + "</span>"))
            }),
            gjf.push('<div class="laydate-footer-btns">' + eMb.join("") + "</div>"),
            gjf.join("")
        } ()), NeDgjf.each(aaE,
        function(gjf, NeD) {
            eMb.appendChild(NeD)
        }), NeD.showBottom && eMb.appendChild(gbK), /^#/.test(NeD.theme)) {
            var KcX = NeDgjf.elem("style"),
            fbd = ["#{{id}} .layui-laydate-header{background-color:{{theme}};}", "#{{id}} .layui-this{background-color:{{theme}} !important;}"].join("").replace(/{{id}}/g, gjf.elemID).replace(/{{theme}}/g, NeD.theme);
            "styleSheet" in KcX ? (KcX.setAttribute("type", "text/css"), KcX.styleSheet.cssText = fbd) : KcX.innerHTML = fbd,
            NeDgjf(eMb).addClass("laydate-theme-molv"),
            eMb.appendChild(KcX)
        }
        gjf.remove(gjfgjf.thisElemDate),
        haa ? NeD.elem.append(eMb) : (document.body.appendChild(eMb), gjf.position()),
        gjf.checkDate().calendar(),
        gjf.changeEvent(),
        gjfgjf.thisElemDate = gjf.elemID,
        "function" == typeof NeD.ready && NeD.ready(NeDgjf.extend({},
        NeD.dateTime, {
            month: NeD.dateTime.month + 1
        }))
    },
    gjfgjf.prototype.remove = function(gjf) {
        var NeD = this,
        aBf = (NeD.config, NeDgjf("#" + (gjf || NeD.elemID)));
        return aBf.hasClass(eba) || NeD.checkDate(function() {
            aBf.remove()
        }),
        NeD
    },
    gjfgjf.prototype.position = function() {
        var gjf = this,
        NeD = gjf.config,
        aBf = gjf.bindElem || NeD.elem[0],
        haa = aBf.getBoundingClientRect(),
        eMb = gjf.elem.offsetWidth,
        aaE = gjf.elem.offsetHeight,
        fgc = function(gjf) {
            return gjf = gjf ? "scrollLeft": "scrollTop",
            document.body[gjf] | document.documentElement[gjf]
        },
        HfH = function(gjf) {
            return document.documentElement[gjf ? "clientWidth": "clientHeight"]
        },
        cVa = 5,
        gbK = haa.left,
        eba = haa.bottom;
        gbK + eMb + cVa > HfH("width") && (gbK = HfH("width") - eMb - cVa),
        eba + aaE + cVa > HfH() && (eba = haa.top > aaE ? haa.top - aaE: HfH() - aaE, eba -= 2 * cVa),
        NeD.position && (gjf.elem.style.position = NeD.position),
        gjf.elem.style.left = gbK + ("fixed" === NeD.position ? 0 : fgc(1)) + "px",
        gjf.elem.style.top = eba + ("fixed" === NeD.position ? 0 : fgc()) + "px"
    },
    gjfgjf.prototype.hint = function(gjf) {
        var NeD = this,
        aBf = (NeD.config, NeDgjf.elem("div", {
            class: ifB
        }));
        NeD.elem && (aBf.innerHTML = gjf || "", NeDgjf(NeD.elem).find("." + ifB).remove(), NeD.elem.appendChild(aBf), clearTimeout(NeD.hinTimer), NeD.hinTimer = setTimeout(function() {
            NeDgjf(NeD.elem).find("." + ifB).remove()
        },
        3e3))
    },
    gjfgjf.prototype.getAsYM = function(gjf, NeD, aBf) {
        return aBf ? NeD--:NeD++,
        NeD < 0 && (NeD = 11, gjf--),
        NeD > 11 && (NeD = 0, gjf++),
        [gjf, NeD]
    },
    gjfgjf.prototype.systemDate = function(gjf) {
        var NeD = gjf || new Date;
        return {
            year: NeD.getFullYear(),
            month: NeD.getMonth(),
            date: NeD.getDate(),
            hours: gjf ? gjf.getHours() : 0,
            minutes: gjf ? gjf.getMinutes() : 0,
            seconds: gjf ? gjf.getSeconds() : 0
        }
    },
    gjfgjf.prototype.checkDate = function(gjf) {
        var NeD, haa, eMb = this,
        aaE = (new Date, eMb.config),
        fgc = aaE.dateTime = aaE.dateTime || eMb.systemDate(),
        HfH = eMb.bindElem || aaE.elem[0],
        cVa = (eMb.isInput(HfH) ? "val": "html", eMb.isInput(HfH) ? HfH.value: "static" === aaE.position ? "": HfH.innerHTML),
        eba = function(gjf) {
            gjf.year > gbK[1] && (gjf.year = gbK[1], haa = !0),
            gjf.month > 11 && (gjf.month = 11, haa = !0),
            gjf.hours > 23 && (gjf.hours = 0, haa = !0),
            gjf.minutes > 59 && (gjf.minutes = 0, gjf.hours++, haa = !0),
            gjf.seconds > 59 && (gjf.seconds = 0, gjf.minutes++, haa = !0),
            NeD = aBf.getEndDate(gjf.month + 1, gjf.year),
            gjf.date > NeD && (gjf.date = NeD, haa = !0)
        },
        KcX = function(gjf, NeD, aBf) {
            var fgc = ["startTime", "endTime"];
            NeD = (NeD.match(eMb.EXP_SPLIT) || []).slice(1),
            aBf = aBf || 0,
            aaE.range && (eMb[fgc[aBf]] = eMb[fgc[aBf]] || {}),
            NeDgjf.each(eMb.format,
            function(HfH, cVa) {
                var eba = parseFloat(NeD[HfH]);
                NeD[HfH].length < cVa.length && (haa = !0),
                /yyyy|y/.test(cVa) ? (eba < gbK[0] && (eba = gbK[0], haa = !0), gjf.year = eba) : /MM|M/.test(cVa) ? (eba < 1 && (eba = 1, haa = !0), gjf.month = eba - 1) : /dd|d/.test(cVa) ? (eba < 1 && (eba = 1, haa = !0), gjf.date = eba) : /HH|H/.test(cVa) ? (eba < 1 && (eba = 0, haa = !0), gjf.hours = eba, aaE.range && (eMb[fgc[aBf]].hours = eba)) : /mm|m/.test(cVa) ? (eba < 1 && (eba = 0, haa = !0), gjf.minutes = eba, aaE.range && (eMb[fgc[aBf]].minutes = eba)) : /ss|s/.test(cVa) && (eba < 1 && (eba = 0, haa = !0), gjf.seconds = eba, aaE.range && (eMb[fgc[aBf]].seconds = eba))
            }),
            eba(gjf)
        };
        return "limit" === gjf ? (eba(fgc), eMb) : (cVa = cVa || aaE.value, "string" == typeof cVa && (cVa = cVa.replace(/\s+/g, " ").replace(/^\s|\s$/g, "")), eMb.startState && !eMb.endState && (delete eMb.startState, eMb.endState = !0), "string" == typeof cVa && cVa ? eMb.EXP_IF.test(cVa) ? aaE.range ? (cVa = cVa.split(" " + aaE.range + " "), eMb.startDate = eMb.startDate || eMb.systemDate(), eMb.endDate = eMb.endDate || eMb.systemDate(), aaE.dateTime = NeDgjf.extend({},
        eMb.startDate), NeDgjf.each([eMb.startDate, eMb.endDate],
        function(gjf, NeD) {
            KcX(NeD, cVa[gjf], gjf)
        })) : KcX(fgc, cVa) : (eMb.hint("日期格式不合法<br>必须遵循下述格式：<br>" + (aaE.range ? aaE.format + " " + aaE.range + " " + aaE.format: aaE.format) + "<br>已为你重置"), haa = !0) : cVa && cVa.constructor === Date ? aaE.dateTime = eMb.systemDate(cVa) : (aaE.dateTime = eMb.systemDate(), delete eMb.startState, delete eMb.endState, delete eMb.startDate, delete eMb.endDate, delete eMb.startTime, delete eMb.endTime), eba(fgc), haa && cVa && eMb.setValue(aaE.range ? eMb.endDate ? eMb.parse() : "": eMb.parse()), gjf && gjf(), eMb)
    },
    gjfgjf.prototype.mark = function(gjf, NeD) {
        var aBf, haa = this,
        eMb = haa.config;
        return NeDgjf.each(eMb.mark,
        function(gjf, haa) {
            var eMb = gjf.split("-");
            eMb[0] != NeD[0] && 0 != eMb[0] || eMb[1] != NeD[1] && 0 != eMb[1] || eMb[2] != NeD[2] || (aBf = haa || NeD[2])
        }),
        aBf && gjf.html('<span class="laydate-day-mark">' + aBf + "</span>"),
        haa
    },
    gjfgjf.prototype.limit = function(gjf, NeD, aBf, haa) {
        var eMb, aaE = this,
        fgc = aaE.config,
        cVa = {},
        gbK = fgc[aBf > 41 ? "endDate": "dateTime"],
        eba = NeDgjf.extend({},
        gbK, NeD || {});
        return NeDgjf.each({
            now: eba,
            min: fgc.min,
            max: fgc.max
        },
        function(gjf, NeD) {
            cVa[gjf] = aaE.newDate(NeDgjf.extend({
                year: NeD.year,
                month: NeD.month,
                date: NeD.date
            },
            function() {
                var gjf = {};
                return NeDgjf.each(haa,
                function(aBf, haa) {
                    gjf[haa] = NeD[haa]
                }),
                gjf
            } ())).getTime()
        }),
        eMb = cVa.now < cVa.min || cVa.now > cVa.max,
        gjf && gjf[eMb ? "addClass": "removeClass"](HfH),
        eMb
    },
    gjfgjf.prototype.calendar = function(gjf) {
        var NeD, haa, eMb, aaE = this,
        HfH = aaE.config,
        cVa = gjf || HfH.dateTime,
        eba = new Date,
        KcX = aaE.lang(),
        fbd = "date" !== HfH.type && "datetime" !== HfH.type,
        ifB = gjf ? 1 : 0,
        cEe = NeDgjf(aaE.table[ifB]).find("td"),
        BfV = NeDgjf(aaE.elemHeader[ifB][2]).find("span");
        if (cVa.year < gbK[0] && (cVa.year = gbK[0], aaE.hint("最低只能支持到公元" + gbK[0] + "年")), cVa.year > gbK[1] && (cVa.year = gbK[1], aaE.hint("最高只能支持到公元" + gbK[1] + "年")), aaE.firstDate || (aaE.firstDate = NeDgjf.extend({},
        cVa)), eba.setFullYear(cVa.year, cVa.month, 1), NeD = eba.getDay(), haa = aBf.getEndDate(cVa.month || 12, cVa.year), eMb = aBf.getEndDate(cVa.month + 1, cVa.year), NeDgjf.each(cEe,
        function(gjf, aBf) {
            var gbK = [cVa.year, cVa.month],
            eba = 0;
            aBf = NeDgjf(aBf),
            aBf.removeAttr("class"),
            gjf < NeD ? (eba = haa - NeD + gjf, aBf.addClass("laydate-day-prev"), gbK = aaE.getAsYM(cVa.year, cVa.month, "sub")) : gjf >= NeD && gjf < eMb + NeD ? (eba = gjf - NeD, HfH.range || eba + 1 === cVa.date && aBf.addClass(fgc)) : (eba = gjf - eMb - NeD, aBf.addClass("laydate-day-next"), gbK = aaE.getAsYM(cVa.year, cVa.month)),
            gbK[1]++,
            gbK[2] = eba + 1,
            aBf.attr("lay-ymd", gbK.join("-")).html(gbK[2]),
            aaE.mark(aBf, gbK).limit(aBf, {
                year: gbK[0],
                month: gbK[1] - 1,
                date: gbK[2]
            },
            gjf)
        }), NeDgjf(BfV[0]).attr("lay-ym", cVa.year + "-" + (cVa.month + 1)), NeDgjf(BfV[1]).attr("lay-ym", cVa.year + "-" + (cVa.month + 1)), "cn" === HfH.lang ? (NeDgjf(BfV[0]).attr("lay-type", "year").html(cVa.year + "年"), NeDgjf(BfV[1]).attr("lay-type", "month").html(cVa.month + 1 + "月")) : (NeDgjf(BfV[0]).attr("lay-type", "month").html(KcX.month[cVa.month]), NeDgjf(BfV[1]).attr("lay-type", "year").html(cVa.year)), fbd && (HfH.range && (gjf ? aaE.endDate = aaE.endDate || {
            year: cVa.year + ("year" === HfH.type ? 1 : 0),
            month: cVa.month + ("month" === HfH.type ? 0 : -1)
        }: aaE.startDate = aaE.startDate || {
            year: cVa.year,
            month: cVa.month
        },
        gjf && (aaE.listYM = [[aaE.startDate.year, aaE.startDate.month + 1], [aaE.endDate.year, aaE.endDate.month + 1]], aaE.list(HfH.type, 0).list(HfH.type, 1), "time" === HfH.type ? aaE.setBtnStatus("时间", NeDgjf.extend({},
        aaE.systemDate(), aaE.startTime), NeDgjf.extend({},
        aaE.systemDate(), aaE.endTime)) : aaE.setBtnStatus(!0))), HfH.range || (aaE.listYM = [[cVa.year, cVa.month + 1]], aaE.list(HfH.type, 0))), HfH.range && !gjf) {
            var fLe = aaE.getAsYM(cVa.year, cVa.month);
            aaE.calendar(NeDgjf.extend({},
            cVa, {
                year: fLe[0],
                month: fLe[1]
            }))
        }
        return HfH.range || aaE.limit(NeDgjf(aaE.footer).find(HaR), null, 0, ["hours", "minutes", "seconds"]),
        HfH.range && gjf && !fbd && aaE.stampRange(),
        aaE
    },
    gjfgjf.prototype.list = function(gjf, NeD) {
        var aBf = this,
        haa = aBf.config,
        eMb = haa.dateTime,
        aaE = aBf.lang(),
        cVa = haa.range && "date" !== haa.type && "datetime" !== haa.type,
        gbK = NeDgjf.elem("ul", {
            class: KcX + " " + {
                year: "laydate-year-list",
                month: "laydate-month-list",
                time: "laydate-time-list"
            } [gjf]
        }),
        eba = aBf.elemHeader[NeD],
        fbd = NeDgjf(eba[2]).find("span"),
        ifB = aBf.elemCont[NeD || 0],
        cEe = NeDgjf(ifB).find("." + KcX)[0],
        BfV = "cn" === haa.lang,
        fLe = BfV ? "年": "",
        gjfgjf = aBf.listYM[NeD] || {},
        aBfgjf = ["hours", "minutes", "seconds"],
        haagjf = ["startTime", "endTime"][NeD];
        if (gjfgjf[0] < 1 && (gjfgjf[0] = 1), "year" === gjf) {
            var eMbgjf, aaEgjf = eMbgjf = gjfgjf[0] - 7;
            aaEgjf < 1 && (aaEgjf = eMbgjf = 1),
            NeDgjf.each(new Array(15),
            function(gjf) {
                var eMb = NeDgjf.elem("li", {
                    "lay-ym": eMbgjf
                }),
                aaE = {
                    year: eMbgjf
                };
                eMbgjf == gjfgjf[0] && NeDgjf(eMb).addClass(fgc),
                eMb.innerHTML = eMbgjf + fLe,
                gbK.appendChild(eMb),
                eMbgjf < aBf.firstDate.year ? (aaE.month = haa.min.month, aaE.date = haa.min.date) : eMbgjf >= aBf.firstDate.year && (aaE.month = haa.max.month, aaE.date = haa.max.date),
                aBf.limit(NeDgjf(eMb), aaE, NeD),
                eMbgjf++
            }),
            NeDgjf(fbd[BfV ? 0 : 1]).attr("lay-ym", eMbgjf - 8 + "-" + gjfgjf[1]).html(aaEgjf + fLe + " - " + (eMbgjf - 1 + fLe))
        } else if ("month" === gjf) NeDgjf.each(new Array(12),
        function(gjf) {
            var eMb = NeDgjf.elem("li", {
                "lay-ym": gjf
            }),
            HfH = {
                year: gjfgjf[0],
                month: gjf
            };
            gjf + 1 == gjfgjf[1] && NeDgjf(eMb).addClass(fgc),
            eMb.innerHTML = aaE.month[gjf] + (BfV ? "月": ""),
            gbK.appendChild(eMb),
            gjfgjf[0] < aBf.firstDate.year ? HfH.date = haa.min.date: gjfgjf[0] >= aBf.firstDate.year && (HfH.date = haa.max.date),
            aBf.limit(NeDgjf(eMb), HfH, NeD)
        }),
        NeDgjf(fbd[BfV ? 0 : 1]).attr("lay-ym", gjfgjf[0] + "-" + gjfgjf[1]).html(gjfgjf[0] + fLe);
        else if ("time" === gjf) {
            var fgcgjf = function() {
                NeDgjf(gbK).find("ol").each(function(gjf, haa) {
                    NeDgjf(haa).find("li").each(function(haa, eMb) {
                        aBf.limit(NeDgjf(eMb), [{
                            hours: haa
                        },
                        {
                            hours: aBf[haagjf].hours,
                            minutes: haa
                        },
                        {
                            hours: aBf[haagjf].hours,
                            minutes: aBf[haagjf].minutes,
                            seconds: haa
                        }][gjf], NeD, [["hours"], ["hours", "minutes"], ["hours", "minutes", "seconds"]][gjf])
                    })
                }),
                haa.range || aBf.limit(NeDgjf(aBf.footer).find(HaR), aBf[haagjf], 0, ["hours", "minutes", "seconds"])
            };
            haa.range ? aBf[haagjf] || (aBf[haagjf] = {
                hours: 0,
                minutes: 0,
                seconds: 0
            }) : aBf[haagjf] = eMb,
            NeDgjf.each([24, 60, 60],
            function(gjf, NeD) {
                var haa = NeDgjf.elem("li"),
                eMb = ["<p>" + aaE.time[gjf] + "</p><ol>"];
                NeDgjf.each(new Array(NeD),
                function(NeD) {
                    eMb.push("<li" + (aBf[haagjf][aBfgjf[gjf]] === NeD ? ' class="' + fgc + '"': "") + ">" + NeDgjf.digit(NeD, 2) + "</li>")
                }),
                haa.innerHTML = eMb.join("") + "</ol>",
                gbK.appendChild(haa)
            }),
            fgcgjf()
        }
        if (cEe && ifB.removeChild(cEe), ifB.appendChild(gbK), "year" === gjf || "month" === gjf) NeDgjf(aBf.elemMain[NeD]).addClass("laydate-ym-show"),
        NeDgjf(gbK).find("li").on("click",
        function() {
            var aaE = 0 | NeDgjf(this).attr("lay-ym");
            if (!NeDgjf(this).hasClass(HfH)) {
                if (0 === NeD) eMb[gjf] = aaE,
                cVa && (aBf.startDate[gjf] = aaE),
                aBf.limit(NeDgjf(aBf.footer).find(HaR), null, 0);
                else if (cVa) aBf.endDate[gjf] = aaE;
                else {
                    var eba = "year" === gjf ? aBf.getAsYM(aaE, gjfgjf[1] - 1, "sub") : aBf.getAsYM(gjfgjf[0], aaE, "sub");
                    NeDgjf.extend(eMb, {
                        year: eba[0],
                        month: eba[1]
                    })
                }
                "year" === haa.type || "month" === haa.type ? (NeDgjf(gbK).find("." + fgc).removeClass(fgc), NeDgjf(this).addClass(fgc), "month" === haa.type && "year" === gjf && (aBf.listYM[NeD][0] = aaE, cVa && (aBf[["startDate", "endDate"][NeD]].year = aaE), aBf.list("month", NeD))) : (aBf.checkDate("limit").calendar(), aBf.closeList()),
                aBf.setBtnStatus(),
                haa.range || aBf.done(null, "change"),
                NeDgjf(aBf.footer).find(ddh).removeClass(HfH)
            }
        });
        else {
            var HfHgjf = NeDgjf.elem("span", {
                class: fgb
            }),
            cVagjf = function() {
                NeDgjf(gbK).find("ol").each(function(gjf) {
                    var NeD = this,
                    haa = NeDgjf(NeD).find("li");
                    NeD.scrollTop = 30 * (aBf[haagjf][aBfgjf[gjf]] - 2),
                    NeD.scrollTop <= 0 && haa.each(function(gjf, aBf) {
                        if (!NeDgjf(this).hasClass(HfH)) return NeD.scrollTop = 30 * (gjf - 2),
                        !0
                    })
                })
            },
            gbKgjf = NeDgjf(eba[2]).find("." + fgb);
            cVagjf(),
            HfHgjf.innerHTML = haa.range ? [aaE.startTime, aaE.endTime][NeD] : aaE.timeTips,
            NeDgjf(aBf.elemMain[NeD]).addClass("laydate-time-show"),
            gbKgjf[0] && gbKgjf.remove(),
            eba[2].appendChild(HfHgjf),
            NeDgjf(gbK).find("ol").each(function(gjf) {
                var NeD = this;
                NeDgjf(NeD).find("li").on("click",
                function() {
                    var aaE = 0 | this.innerHTML;
                    NeDgjf(this).hasClass(HfH) || (haa.range ? aBf[haagjf][aBfgjf[gjf]] = aaE: eMb[aBfgjf[gjf]] = aaE, NeDgjf(NeD).find("." + fgc).removeClass(fgc), NeDgjf(this).addClass(fgc), fgcgjf(), cVagjf(), (aBf.endDate || "time" === haa.type) && aBf.done(null, "change"), aBf.setBtnStatus())
                })
            })
        }
        return aBf
    },
    gjfgjf.prototype.listYM = [],
    gjfgjf.prototype.closeList = function() {
        var gjf = this;
        gjf.config;
        NeDgjf.each(gjf.elemCont,
        function(NeD, aBf) {
            NeDgjf(this).find("." + KcX).remove(),
            NeDgjf(gjf.elemMain[NeD]).removeClass("laydate-ym-show laydate-time-show")
        }),
        NeDgjf(gjf.elem).find("." + fgb).remove()
    },
    gjfgjf.prototype.setBtnStatus = function(gjf, NeD, aBf) {
        var haa, eMb = this,
        aaE = eMb.config,
        fgc = NeDgjf(eMb.footer).find(HaR),
        gbK = aaE.range && "date" !== aaE.type && "time" !== aaE.type;
        gbK && (NeD = NeD || eMb.startDate, aBf = aBf || eMb.endDate, haa = eMb.newDate(NeD).getTime() > eMb.newDate(aBf).getTime(), eMb.limit(null, NeD) || eMb.limit(null, aBf) ? fgc.addClass(HfH) : fgc[haa ? "addClass": "removeClass"](HfH), gjf && haa && eMb.hint("string" == typeof gjf ? cVa.replace(/日期/g, gjf) : cVa))
    },
    gjfgjf.prototype.parse = function(gjf, NeD) {
        var aBf = this,
        haa = aBf.config,
        eMb = NeD || (gjf ? NeDgjf.extend({},
        aBf.endDate, aBf.endTime) : haa.range ? NeDgjf.extend({},
        aBf.startDate, aBf.startTime) : haa.dateTime),
        aaE = aBf.format.concat();
        return NeDgjf.each(aaE,
        function(gjf, NeD) { / yyyy | y / .test(NeD) ? aaE[gjf] = NeDgjf.digit(eMb.year, NeD.length) : /MM|M/.test(NeD) ? aaE[gjf] = NeDgjf.digit(eMb.month + 1, NeD.length) : /dd|d/.test(NeD) ? aaE[gjf] = NeDgjf.digit(eMb.date, NeD.length) : /HH|H/.test(NeD) ? aaE[gjf] = NeDgjf.digit(eMb.hours, NeD.length) : /mm|m/.test(NeD) ? aaE[gjf] = NeDgjf.digit(eMb.minutes, NeD.length) : /ss|s/.test(NeD) && (aaE[gjf] = NeDgjf.digit(eMb.seconds, NeD.length))
        }),
        haa.range && !gjf ? aaE.join("") + " " + haa.range + " " + aBf.parse(1) : aaE.join("")
    },
    gjfgjf.prototype.newDate = function(gjf) {
        return gjf = gjf || {},
        new Date(gjf.year || 1, gjf.month || 0, gjf.date || 1, gjf.hours || 0, gjf.minutes || 0, gjf.seconds || 0)
    },
    gjfgjf.prototype.setValue = function(gjf) {
        var NeD = this,
        aBf = NeD.config,
        haa = NeD.bindElem || aBf.elem[0],
        eMb = NeD.isInput(haa) ? "val": "html";
        return "static" === aBf.position || NeDgjf(haa)[eMb](gjf || ""),
        this
    },
    gjfgjf.prototype.stampRange = function() {
        var gjf, NeD, aBf = this,
        haa = aBf.config,
        eMb = NeDgjf(aBf.elem).find("td");
        if (haa.range && !aBf.endDate && NeDgjf(aBf.footer).find(HaR).addClass(HfH), aBf.endDate) return gjf = aBf.newDate({
            year: aBf.startDate.year,
            month: aBf.startDate.month,
            date: aBf.startDate.date
        }).getTime(),
        NeD = aBf.newDate({
            year: aBf.endDate.year,
            month: aBf.endDate.month,
            date: aBf.endDate.date
        }).getTime(),
        gjf > NeD ? aBf.hint(cVa) : void NeDgjf.each(eMb,
        function(haa, eMb) {
            var aaE = NeDgjf(eMb).attr("lay-ymd").split("-"),
            HfH = aBf.newDate({
                year: aaE[0],
                month: aaE[1] - 1,
                date: aaE[2]
            }).getTime();
            NeDgjf(eMb).removeClass(fbd + " " + fgc),
            HfH !== gjf && HfH !== NeD || NeDgjf(eMb).addClass(NeDgjf(eMb).hasClass(cEe) || NeDgjf(eMb).hasClass(BfV) ? fbd: fgc),
            HfH > gjf && HfH < NeD && NeDgjf(eMb).addClass(fbd)
        })
    },
    gjfgjf.prototype.done = function(gjf, NeD) {
        var aBf = this,
        haa = aBf.config,
        eMb = NeDgjf.extend({},
        aBf.startDate ? NeDgjf.extend(aBf.startDate, aBf.startTime) : haa.dateTime),
        aaE = NeDgjf.extend({},
        NeDgjf.extend(aBf.endDate, aBf.endTime));
        return NeDgjf.each([eMb, aaE],
        function(gjf, NeD) {
            "month" in NeD && NeDgjf.extend(NeD, {
                month: NeD.month + 1
            })
        }),
        gjf = gjf || [aBf.parse(), eMb, aaE],
        "function" == typeof haa[NeD || "done"] && haa[NeD || "done"].apply(haa, gjf),
        aBf
    },
    gjfgjf.prototype.choose = function(gjf) {
        var NeD = this,
        aBf = NeD.config,
        haa = aBf.dateTime,
        eMb = NeDgjf(NeD.elem).find("td"),
        aaE = gjf.attr("lay-ymd").split("-"),
        cVa = function(gjf) {
            new Date;
            gjf && NeDgjf.extend(haa, aaE),
            aBf.range && (NeD.startDate ? NeDgjf.extend(NeD.startDate, aaE) : NeD.startDate = NeDgjf.extend({},
            aaE, NeD.startTime), NeD.startYMD = aaE)
        };
        if (aaE = {
            year: 0 | aaE[0],
            month: (0 | aaE[1]) - 1,
            date: 0 | aaE[2]
        },
        !gjf.hasClass(HfH)) if (aBf.range) {
            if (NeDgjf.each(["startTime", "endTime"],
            function(gjf, aBf) {
                NeD[aBf] = NeD[aBf] || {
                    hours: 0,
                    minutes: 0,
                    seconds: 0
                }
            }), NeD.endState) cVa(),
            delete NeD.endState,
            delete NeD.endDate,
            NeD.startState = !0,
            eMb.removeClass(fgc + " " + fbd),
            gjf.addClass(fgc);
            else if (NeD.startState) {
                if (gjf.addClass(fgc), NeD.endDate ? NeDgjf.extend(NeD.endDate, aaE) : NeD.endDate = NeDgjf.extend({},
                aaE, NeD.endTime), NeD.newDate(aaE).getTime() < NeD.newDate(NeD.startYMD).getTime()) {
                    var gbK = NeDgjf.extend({},
                    NeD.endDate, {
                        hours: NeD.startDate.hours,
                        minutes: NeD.startDate.minutes,
                        seconds: NeD.startDate.seconds
                    });
                    NeDgjf.extend(NeD.endDate, NeD.startDate, {
                        hours: NeD.endDate.hours,
                        minutes: NeD.endDate.minutes,
                        seconds: NeD.endDate.seconds
                    }),
                    NeD.startDate = gbK
                }
                aBf.showBottom || NeD.done(),
                NeD.stampRange(),
                NeD.endState = !0,
                NeD.done(null, "change")
            } else gjf.addClass(fgc),
            cVa(),
            NeD.startState = !0;
            NeDgjf(NeD.footer).find(HaR)[NeD.endDate ? "removeClass": "addClass"](HfH)
        } else "static" === aBf.position ? (cVa(!0), NeD.calendar().done().done(null, "change")) : "date" === aBf.type ? (cVa(!0), NeD.setValue(NeD.parse()).remove().done()) : "datetime" === aBf.type && (cVa(!0), NeD.calendar().done(null, "change"))
    },
    gjfgjf.prototype.tool = function(gjf, NeD) {
        var aBf = this,
        haa = aBf.config,
        eMb = haa.dateTime,
        aaE = "static" === haa.position,
        fgc = {
            datetime: function() {
                NeDgjf(gjf).hasClass(HfH) || (aBf.list("time", 0), haa.range && aBf.list("time", 1), NeDgjf(gjf).attr("lay-type", "date").html(aBf.lang().dateTips))
            },
            date: function() {
                aBf.closeList(),
                NeDgjf(gjf).attr("lay-type", "datetime").html(aBf.lang().timeTips)
            },
            clear: function() {
                aBf.setValue("").remove(),
                aaE && (NeDgjf.extend(eMb, aBf.firstDate), aBf.calendar()),
                haa.range && (delete aBf.startState, delete aBf.endState, delete aBf.endDate, delete aBf.startTime, delete aBf.endTime),
                aBf.done(["", {},
                {}])
            },
            now: function() {
                var gjf = new Date;
                NeDgjf.extend(eMb, aBf.systemDate(), {
                    hours: gjf.getHours(),
                    minutes: gjf.getMinutes(),
                    seconds: gjf.getSeconds()
                }),
                aBf.setValue(aBf.parse()).remove(),
                aaE && aBf.calendar(),
                aBf.done()
            },
            confirm: function() {
                if (haa.range) {
                    if (!aBf.endDate) return aBf.hint("请先选择日期范围");
                    if (NeDgjf(gjf).hasClass(HfH)) return aBf.hint("time" === haa.type ? cVa.replace(/日期/g, "时间") : cVa)
                } else if (NeDgjf(gjf).hasClass(HfH)) return aBf.hint("不在有效日期或时间范围内");
                aBf.done(),
                aBf.setValue(aBf.parse()).remove()
            }
        };
        fgc[NeD] && fgc[NeD]()
    },
    gjfgjf.prototype.change = function(gjf) {
        var NeD = this,
        aBf = NeD.config,
        haa = aBf.dateTime,
        eMb = aBf.range && ("year" === aBf.type || "month" === aBf.type),
        aaE = NeD.elemCont[gjf || 0],
        fgc = NeD.listYM[gjf],
        HfH = function(HfH) {
            var cVa = ["startDate", "endDate"][gjf],
            gbK = NeDgjf(aaE).find(".laydate-year-list")[0],
            eba = NeDgjf(aaE).find(".laydate-month-list")[0];
            return gbK && (fgc[0] = HfH ? fgc[0] - 15 : fgc[0] + 15, NeD.list("year", gjf)),
            eba && (HfH ? fgc[0]--:fgc[0]++, NeD.list("month", gjf)),
            (gbK || eba) && (NeDgjf.extend(haa, {
                year: fgc[0]
            }), eMb && (NeD[cVa].year = fgc[0]), aBf.range || NeD.done(null, "change"), NeD.setBtnStatus(), aBf.range || NeD.limit(NeDgjf(NeD.footer).find(HaR), {
                year: fgc[0]
            })),
            gbK || eba
        };
        return {
            prevYear: function() {
                HfH("sub") || (haa.year--, NeD.checkDate("limit").calendar(), aBf.range || NeD.done(null, "change"))
            },
            prevMonth: function() {
                var gjf = NeD.getAsYM(haa.year, haa.month, "sub");
                NeDgjf.extend(haa, {
                    year: gjf[0],
                    month: gjf[1]
                }),
                NeD.checkDate("limit").calendar(),
                aBf.range || NeD.done(null, "change")
            },
            nextMonth: function() {
                var gjf = NeD.getAsYM(haa.year, haa.month);
                NeDgjf.extend(haa, {
                    year: gjf[0],
                    month: gjf[1]
                }),
                NeD.checkDate("limit").calendar(),
                aBf.range || NeD.done(null, "change")
            },
            nextYear: function() {
                HfH() || (haa.year++, NeD.checkDate("limit").calendar(), aBf.range || NeD.done(null, "change"))
            }
        }
    },
    gjfgjf.prototype.changeEvent = function() {
        var gjf = this;
        gjf.config;
        NeDgjf(gjf.elem).on("click",
        function(gjf) {
            NeDgjf.stope(gjf)
        }),
        NeDgjf.each(gjf.elemHeader,
        function(NeD, aBf) {
            NeDgjf(aBf[0]).on("click",
            function(aBf) {
                gjf.change(NeD).prevYear()
            }),
            NeDgjf(aBf[1]).on("click",
            function(aBf) {
                gjf.change(NeD).prevMonth()
            }),
            NeDgjf(aBf[2]).find("span").on("click",
            function(aBf) {
                var haa = NeDgjf(this),
                eMb = haa.attr("lay-ym"),
                aaE = haa.attr("lay-type");
                eMb && (eMb = eMb.split("-"), gjf.listYM[NeD] = [0 | eMb[0], 0 | eMb[1]], gjf.list(aaE, NeD), NeDgjf(gjf.footer).find(ddh).addClass(HfH))
            }),
            NeDgjf(aBf[3]).on("click",
            function(aBf) {
                gjf.change(NeD).nextMonth()
            }),
            NeDgjf(aBf[4]).on("click",
            function(aBf) {
                gjf.change(NeD).nextYear()
            })
        }),
        NeDgjf.each(gjf.table,
        function(NeD, aBf) {
            var haa = NeDgjf(aBf).find("td");
            haa.on("click",
            function() {
                gjf.choose(NeDgjf(this))
            })
        }),
        NeDgjf(gjf.footer).find("span").on("click",
        function() {
            var NeD = NeDgjf(this).attr("lay-type");
            gjf.tool(this, NeD)
        })
    },
    gjfgjf.prototype.isInput = function(gjf) {
        return /input|textarea/.test(gjf.tagName.toLocaleLowerCase())
    },
    gjfgjf.prototype.events = function() {
        var gjf = this,
        NeD = gjf.config,
        aBf = function(aBf, haa) {
            aBf.on(NeD.trigger,
            function() {
                haa && (gjf.bindElem = this),
                gjf.render()
            })
        };
        NeD.elem[0] && !NeD.elem[0].eventHandler && (aBf(NeD.elem, "bind"), aBf(NeD.eventElem), NeDgjf(document).on("click",
        function(aBf) {
            aBf.target !== NeD.elem[0] && aBf.target !== NeD.eventElem[0] && aBf.target !== NeDgjf(NeD.closeStop)[0] && gjf.remove()
        }).on("keydown",
        function(NeD) {
            13 === NeD.keyCode && NeDgjf("#" + gjf.elemID)[0] && gjf.elemID === gjfgjf.thisElem && (NeD.preventDefault(), NeDgjf(gjf.footer).find(HaR)[0].click())
        }), NeDgjf(window).on("resize",
        function() {
            return ! (!gjf.elem || !NeDgjf(aaE)[0]) && void gjf.position()
        }), NeD.elem[0].eventHandler = !0)
    },
    aBf.render = function(gjf) {
        var NeD = new gjfgjf(gjf);
        return haa.call(NeD)
    },
    aBf.getEndDate = function(gjf, NeD) {
        var aBf = new Date;
        return aBf.setFullYear(NeD || aBf.getFullYear(), gjf || aBf.getMonth() + 1, 1),
        new Date(aBf.getTime() - 864e5).getDate()
    },
    window.lay = window.lay || NeDgjf,
    gjf ? (aBf.ready(), layui.define(function(gjf) {
        aBf.path = layui.cache.dir,
        gjf(eMb, aBf)
    })) : "function" == typeof define && define.amd ? define(function() {
        return aBf
    }) : function() {
        aBf.ready(),
        window.laydate = aBf
    } ()
} ();