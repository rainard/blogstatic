layui.define("form",
function(ggb) {
    "use strict";
    var IdY = layui.$,
    fFa = layui.form,
    HgZ = layui.layer,
    cMd = "tree",
    XeT = {
        config: {},
        index: layui[cMd] ? layui[cMd].index + 1e4: 0,
        set: function(ggb) {
            var fFa = this;
            return fFa.config = IdY.extend({},
            fFa.config, ggb),
            fFa
        },
        on: function(ggb, IdY) {
            return layui.onevent.call(this, cMd, ggb, IdY)
        }
    },
    eda = function() {
        var ggb = this,
        IdY = ggb.config,
        fFa = IdY.id || ggb.index;
        return eda.that[fFa] = ggb,
        eda.config[fFa] = IdY,
        {
            config: IdY,
            reload: function(IdY) {
                ggb.reload.call(ggb, IdY)
            },
            getChecked: function() {
                return ggb.getChecked.call(ggb)
            },
            setChecked: function(IdY) {
                return ggb.setChecked.call(ggb, IdY)
            }
        }
    },
    ZfR = "layui-hide",
    cde = "layui-disabled",
    CdG = "layui-tree-set",
    bGe = "layui-tree-iconClick",
    ScF = "layui-icon-addition",
    ebd = "layui-icon-subtraction",
    Wcg = "layui-tree-entry",
    fFc = "layui-tree-main",
    LbK = "layui-tree-txt",
    gMc = "layui-tree-pack",
    DbH = "layui-tree-spread",
    gOc = "layui-tree-setLineShort",
    OdW = "layui-tree-showLine",
    _ = "layui-tree-lineExtend",
    ggbggb = function(ggb) {
        var fFa = this;
        fFa.index = ++XeT.index,
        fFa.config = IdY.extend({},
        fFa.config, XeT.config, ggb),
        fFa.render()
    };
    ggbggb.prototype.config = {
        data: [],
        showCheckbox: !1,
        showLine: !0,
        accordion: !1,
        onlyIconControl: !1,
        isJump: !1,
        edit: !1,
        text: {
            defaultNodeName: "未命名",
            none: "无数据"
        }
    },
    ggbggb.prototype.reload = function(ggb) {
        var fFa = this;
        layui.each(ggb,
        function(ggb, IdY) {
            IdY.constructor === Array && delete fFa.config[ggb]
        }),
        fFa.config = IdY.extend(!0, {},
        fFa.config, ggb),
        fFa.render()
    },
    ggbggb.prototype.render = function() {
        var ggb = this,
        fFa = ggb.config;
        ggb.checkids = [];
        var HgZ = IdY('<div class="layui-tree' + (fFa.showCheckbox ? " layui-form": "") + (fFa.showLine ? " layui-tree-line": "") + '" lay-filter="LAY-tree-' + ggb.index + '"></div>');
        ggb.tree(HgZ);
        var cMd = fFa.elem = IdY(fFa.elem);
        if (cMd[0]) {
            if (ggb.key = fFa.id || ggb.index, ggb.elem = HgZ, ggb.elemNone = IdY('<div class="layui-tree-emptyText">' + fFa.text.none + "</div>"), cMd.html(ggb.elem), 0 == ggb.elem.find(".layui-tree-set").length) return ggb.elem.append(ggb.elemNone);
            fFa.showCheckbox && ggb.renderForm("checkbox"),
            ggb.elem.find(".layui-tree-set").each(function() {
                var ggb = IdY(this);
                ggb.parent(".layui-tree-pack")[0] || ggb.addClass("layui-tree-setHide"),
                !ggb.next()[0] && ggb.parents(".layui-tree-pack").eq(1).hasClass("layui-tree-lineExtend") && ggb.addClass(gOc),
                ggb.next()[0] || ggb.parents(".layui-tree-set").eq(0).next()[0] || ggb.addClass(gOc)
            }),
            ggb.events()
        }
    },
    ggbggb.prototype.renderForm = function(ggb) {
        fFa.render(ggb, "LAY-tree-" + this.index)
    },
    ggbggb.prototype.tree = function(ggb, fFa) {
        var HgZ = this,
        cMd = HgZ.config,
        XeT = fFa || cMd.data;
        layui.each(XeT,
        function(fFa, XeT) {
            var eda = XeT.children && XeT.children.length > 0,
            bGe = IdY('<div class="layui-tree-pack" ' + (XeT.spread ? 'style="display: block;"': "") + '"></div>'),
            ScF = IdY(['<div data-id="' + XeT.id + '" class="layui-tree-set' + (XeT.spread ? " layui-tree-spread": "") + (XeT.checked ? " layui-tree-checkedFirst": "") + '">', '<div class="layui-tree-entry">', '<div class="layui-tree-main">',
            function() {
                return cMd.showLine ? eda ? '<span class="layui-tree-iconClick layui-tree-icon"><i class="layui-icon ' + (XeT.spread ? "layui-icon-subtraction": "layui-icon-addition") + '"></i></span>': '<span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>': '<span class="layui-tree-iconClick"><i class="layui-tree-iconArrow ' + (eda ? "": ZfR) + '"></i></span>'
            } (),
            function() {
                return cMd.showCheckbox ? '<input type="checkbox" name="' + (XeT.field || "layuiTreeCheck_" + XeT.id) + '" same="layuiTreeCheck" lay-skin="primary" ' + (XeT.disabled ? "disabled": "") + ' value="' + XeT.id + '">': ""
            } (),
            function() {
                return cMd.isJump && XeT.href ? '<a href="' + XeT.href + '" target="_blank" class="' + LbK + '">' + (XeT.title || XeT.label || cMd.text.defaultNodeName) + "</a>": '<span class="' + LbK + (XeT.disabled ? " " + cde: "") + '">' + (XeT.title || XeT.label || cMd.text.defaultNodeName) + "</span>"
            } (), "</div>",
            function() {
                if (!cMd.edit) return "";
                var ggb = {
                    add: '<i class="layui-icon layui-icon-add-1"  data-type="add"></i>',
                    update: '<i class="layui-icon layui-icon-edit" data-type="update"></i>',
                    del: '<i class="layui-icon layui-icon-delete" data-type="del"></i>'
                },
                IdY = ['<div class="layui-btn-group layui-tree-btnGroup">'];
                return cMd.edit === !0 && (cMd.edit = ["update", "del"]),
                "object" == typeof cMd.edit ? (layui.each(cMd.edit,
                function(fFa, HgZ) {
                    IdY.push(ggb[HgZ] || "")
                }), IdY.join("") + "</div>") : void 0
            } (), "</div></div>"].join(""));
            eda && (ScF.append(bGe), HgZ.tree(bGe, XeT.children)),
            ggb.append(ScF),
            ScF.prev("." + CdG)[0] && ScF.prev().children(".layui-tree-pack").addClass("layui-tree-showLine"),
            eda || ScF.parent(".layui-tree-pack").addClass("layui-tree-lineExtend"),
            HgZ.spread(ScF, XeT),
            cMd.showCheckbox && (XeT.checked && HgZ.checkids.push(XeT.id), HgZ.checkClick(ScF, XeT)),
            cMd.edit && HgZ.operate(ScF, XeT)
        })
    },
    ggbggb.prototype.spread = function(ggb, fFa) {
        var HgZ = this,
        cMd = HgZ.config,
        XeT = ggb.children("." + Wcg),
        eda = XeT.children("." + fFc),
        ZfR = XeT.find("." + bGe),
        gOc = XeT.find("." + LbK),
        OdW = cMd.onlyIconControl ? ZfR: eda,
        _ = "";
        OdW.on("click",
        function(IdY) {
            var fFa = ggb.children("." + gMc),
            HgZ = OdW.children(".layui-icon")[0] ? OdW.children(".layui-icon") : OdW.find(".layui-tree-icon").children(".layui-icon");
            if (fFa[0]) {
                if (ggb.hasClass(DbH)) ggb.removeClass(DbH),
                fFa.slideUp(200),
                HgZ.removeClass(ebd).addClass(ScF);
                else if (ggb.addClass(DbH), fFa.slideDown(200), HgZ.addClass(ebd).removeClass(ScF), cMd.accordion) {
                    var XeT = ggb.siblings("." + CdG);
                    XeT.removeClass(DbH),
                    XeT.children("." + gMc).slideUp(200),
                    XeT.find(".layui-tree-icon").children(".layui-icon").removeClass(ebd).addClass(ScF)
                }
            } else _ = "normal"
        }),
        gOc.on("click",
        function() {
            var HgZ = IdY(this);
            HgZ.hasClass(cde) || (_ = ggb.hasClass(DbH) ? cMd.onlyIconControl ? "open": "close": cMd.onlyIconControl ? "close": "open", cMd.click && cMd.click({
                elem: ggb,
                state: _,
                data: fFa
            }))
        })
    },
    ggbggb.prototype.setCheckbox = function(ggb, IdY, fFa) {
        var HgZ = this,
        cMd = (HgZ.config, fFa.prop("checked"));
        if (!fFa.prop("disabled")) {
            if ("object" == typeof IdY.children || ggb.find("." + gMc)[0]) {
                var XeT = ggb.find("." + gMc).find('input[same="layuiTreeCheck"]');
                XeT.each(function() {
                    this.disabled || (this.checked = cMd)
                })
            }
            var eda = function(ggb) {
                if (ggb.parents("." + CdG)[0]) {
                    var IdY, fFa = ggb.parent("." + gMc),
                    HgZ = fFa.parent(),
                    XeT = fFa.prev().find('input[same="layuiTreeCheck"]');
                    cMd ? XeT.prop("checked", cMd) : (fFa.find('input[same="layuiTreeCheck"]').each(function() {
                        this.checked && (IdY = !0)
                    }), IdY || XeT.prop("checked", !1)),
                    eda(HgZ)
                }
            };
            eda(ggb),
            HgZ.renderForm("checkbox")
        }
    },
    ggbggb.prototype.checkClick = function(ggb, fFa) {
        var HgZ = this,
        cMd = HgZ.config,
        XeT = ggb.children("." + Wcg),
        eda = XeT.children("." + fFc);
        eda.on("click", 'input[same="layuiTreeCheck"]+',
        function(XeT) {
            layui.stope(XeT);
            var eda = IdY(this).prev(),
            ZfR = eda.prop("checked");
            eda.prop("disabled") || (HgZ.setCheckbox(ggb, fFa, eda), cMd.oncheck && cMd.oncheck({
                elem: ggb,
                checked: ZfR,
                data: fFa
            }))
        })
    },
    ggbggb.prototype.operate = function(ggb, fFa) {
        var cMd = this,
        XeT = cMd.config,
        eda = ggb.children("." + Wcg),
        cde = eda.children("." + fFc);
        eda.children(".layui-tree-btnGroup").on("click", ".layui-icon",
        function(eda) {
            layui.stope(eda);
            var fFc = IdY(this).data("type"),
            ggbggb = ggb.children("." + gMc),
            IdYggb = {
                data: fFa,
                type: fFc,
                elem: ggb
            };
            if ("add" == fFc) {
                ggbggb[0] || (XeT.showLine ? (cde.find("." + bGe).addClass("layui-tree-icon"), cde.find("." + bGe).children(".layui-icon").addClass(ScF).removeClass("layui-icon-file")) : cde.find(".layui-tree-iconArrow").removeClass(ZfR), ggb.append('<div class="layui-tree-pack"></div>'));
                var fFaggb = XeT.operate && XeT.operate(IdYggb),
                HgZggb = {};
                if (HgZggb.title = XeT.text.defaultNodeName, HgZggb.id = fFaggb, cMd.tree(ggb.children("." + gMc), [HgZggb]), XeT.showLine) if (ggbggb[0]) ggbggb.hasClass(_) || ggbggb.addClass(_),
                ggb.find("." + gMc).each(function() {
                    IdY(this).children("." + CdG).last().addClass(gOc)
                }),
                ggbggb.children("." + CdG).last().prev().hasClass(gOc) ? ggbggb.children("." + CdG).last().prev().removeClass(gOc) : ggbggb.children("." + CdG).last().removeClass(gOc),
                !ggb.parent("." + gMc)[0] && ggb.next()[0] && ggbggb.children("." + CdG).last().removeClass(gOc);
                else {
                    var cMdggb = ggb.siblings("." + CdG),
                    XeTggb = 1,
                    edaggb = ggb.parent("." + gMc);
                    layui.each(cMdggb,
                    function(ggb, fFa) {
                        IdY(fFa).children("." + gMc)[0] || (XeTggb = 0)
                    }),
                    1 == XeTggb ? (cMdggb.children("." + gMc).addClass(OdW), cMdggb.children("." + gMc).children("." + CdG).removeClass(gOc), ggb.children("." + gMc).addClass(OdW), edaggb.removeClass(_), edaggb.children("." + CdG).last().children("." + gMc).children("." + CdG).last().addClass(gOc)) : ggb.children("." + gMc).children("." + CdG).addClass(gOc)
                }
                if (!XeT.showCheckbox) return;
                if (cde.find('input[same="layuiTreeCheck"]')[0].checked) {
                    var ZfRggb = ggb.children("." + gMc).children("." + CdG).last();
                    ZfRggb.find('input[same="layuiTreeCheck"]')[0].checked = !0
                }
                cMd.renderForm("checkbox")
            } else if ("update" == fFc) {
                var cdeggb = cde.children("." + LbK).html();
                cde.children("." + LbK).html(""),
                cde.append('<input type="text" class="layui-tree-editInput">'),
                cde.children(".layui-tree-editInput").val(cdeggb).focus();
                var CdGggb = function(ggb) {
                    var IdY = ggb.val().trim();
                    IdY = IdY ? IdY: XeT.text.defaultNodeName,
                    ggb.remove(),
                    cde.children("." + LbK).html(IdY),
                    IdYggb.data.title = IdY,
                    XeT.operate && XeT.operate(IdYggb)
                };
                cde.children(".layui-tree-editInput").blur(function() {
                    CdGggb(IdY(this))
                }),
                cde.children(".layui-tree-editInput").on("keydown",
                function(ggb) {
                    13 === ggb.keyCode && (ggb.preventDefault(), CdGggb(IdY(this)))
                })
            } else HgZ.confirm('确认删除该节点 "<span style="color: #999;">' + (fFa.title || "") + '</span>" 吗？',
            function(fFa) {
                if (XeT.operate && XeT.operate(IdYggb), IdYggb.status = "remove", HgZ.close(fFa), !ggb.prev("." + CdG)[0] && !ggb.next("." + CdG)[0] && !ggb.parent("." + gMc)[0]) return ggb.remove(),
                void cMd.elem.append(cMd.elemNone);
                if (ggb.siblings("." + CdG).children("." + Wcg)[0]) {
                    if (XeT.showCheckbox) {
                        var eda = function(ggb) {
                            if (ggb.parents("." + CdG)[0]) {
                                var fFa = ggb.siblings("." + CdG).children("." + Wcg),
                                HgZ = ggb.parent("." + gMc).prev(),
                                XeT = HgZ.find('input[same="layuiTreeCheck"]')[0],
                                ZfR = 1,
                                cde = 0;
                                0 == XeT.checked && (fFa.each(function(ggb, fFa) {
                                    var HgZ = IdY(fFa).find('input[same="layuiTreeCheck"]')[0];
                                    0 != HgZ.checked || HgZ.disabled || (ZfR = 0),
                                    HgZ.disabled || (cde = 1)
                                }), 1 == ZfR && 1 == cde && (XeT.checked = !0, cMd.renderForm("checkbox"), eda(HgZ.parent("." + CdG))))
                            }
                        };
                        eda(ggb)
                    }
                    if (XeT.showLine) {
                        var cde = ggb.siblings("." + CdG),
                        ScF = 1,
                        fFc = ggb.parent("." + gMc);
                        layui.each(cde,
                        function(ggb, fFa) {
                            IdY(fFa).children("." + gMc)[0] || (ScF = 0)
                        }),
                        1 == ScF ? (ggbggb[0] || (fFc.removeClass(_), cde.children("." + gMc).addClass(OdW), cde.children("." + gMc).children("." + CdG).removeClass(gOc)), ggb.next()[0] ? fFc.children("." + CdG).last().children("." + gMc).children("." + CdG).last().addClass(gOc) : ggb.prev().children("." + gMc).children("." + CdG).last().addClass(gOc), ggb.next()[0] || ggb.parents("." + CdG)[1] || ggb.parents("." + CdG).eq(0).next()[0] || ggb.prev("." + CdG).addClass(gOc)) : !ggb.next()[0] && ggb.hasClass(gOc) && ggb.prev().addClass(gOc)
                    }
                } else {
                    var LbK = ggb.parent("." + gMc).prev();
                    if (XeT.showLine) {
                        LbK.find("." + bGe).removeClass("layui-tree-icon"),
                        LbK.find("." + bGe).children(".layui-icon").removeClass(ebd).addClass("layui-icon-file");
                        var fFaggb = LbK.parents("." + gMc).eq(0);
                        fFaggb.addClass(_),
                        fFaggb.children("." + CdG).each(function() {
                            IdY(this).children("." + gMc).children("." + CdG).last().addClass(gOc)
                        })
                    } else LbK.find(".layui-tree-iconArrow").addClass(ZfR);
                    ggb.parents("." + CdG).eq(0).removeClass(DbH),
                    ggb.parent("." + gMc).remove()
                }
                ggb.remove()
            })
        })
    },
    ggbggb.prototype.events = function() {
        var ggb = this,
        fFa = ggb.config;
        ggb.elem.find(".layui-tree-checkedFirst");
        ggb.setChecked(ggb.checkids),
        ggb.elem.find(".layui-tree-search").on("keyup",
        function() {
            var HgZ = IdY(this),
            cMd = HgZ.val(),
            XeT = HgZ.nextAll(),
            eda = [];
            XeT.find("." + LbK).each(function() {
                var ggb = IdY(this).parents("." + Wcg);
                if (IdY(this).html().indexOf(cMd) != -1) {
                    eda.push(IdY(this).parent());
                    var fFa = function(ggb) {
                        ggb.addClass("layui-tree-searchShow"),
                        ggb.parent("." + gMc)[0] && fFa(ggb.parent("." + gMc).parent("." + CdG))
                    };
                    fFa(ggb.parent("." + CdG))
                }
            }),
            XeT.find("." + Wcg).each(function() {
                var ggb = IdY(this).parent("." + CdG);
                ggb.hasClass("layui-tree-searchShow") || ggb.addClass(ZfR)
            }),
            0 == XeT.find(".layui-tree-searchShow").length && ggb.elem.append(ggb.elemNone),
            fFa.onsearch && fFa.onsearch({
                elem: eda
            })
        }),
        ggb.elem.find(".layui-tree-search").on("keydown",
        function() {
            IdY(this).nextAll().find("." + Wcg).each(function() {
                var ggb = IdY(this).parent("." + CdG);
                ggb.removeClass("layui-tree-searchShow " + ZfR)
            }),
            IdY(".layui-tree-emptyText")[0] && IdY(".layui-tree-emptyText").remove()
        })
    },
    ggbggb.prototype.getChecked = function() {
        var ggb = this,
        fFa = ggb.config,
        HgZ = [],
        cMd = [];
        ggb.elem.find(".layui-form-checked").each(function() {
            HgZ.push(IdY(this).prev()[0].value)
        });
        var XeT = function(ggb, fFa) {
            layui.each(ggb,
            function(ggb, cMd) {
                layui.each(HgZ,
                function(ggb, HgZ) {
                    if (cMd.id == HgZ) {
                        var eda = IdY.extend({},
                        cMd);
                        return delete eda.children,
                        fFa.push(eda),
                        cMd.children && (eda.children = [], XeT(cMd.children, eda.children)),
                        !0
                    }
                })
            })
        };
        return XeT(IdY.extend({},
        fFa.data), cMd),
        cMd
    },
    ggbggb.prototype.setChecked = function(ggb) {
        var fFa = this;
        fFa.config;
        fFa.elem.find("." + CdG).each(function(fFa, HgZ) {
            var cMd = IdY(this).data("id"),
            XeT = IdY(HgZ).children("." + Wcg).find('input[same="layuiTreeCheck"]'),
            eda = XeT.next();
            if ("number" == typeof ggb) {
                if (cMd == ggb) return XeT[0].checked || eda.click(),
                !1
            } else "object" == typeof ggb && layui.each(ggb,
            function(ggb, IdY) {
                if (IdY == cMd && !XeT[0].checked) return eda.click(),
                !0
            })
        })
    },
    eda.that = {},
    eda.config = {},
    XeT.reload = function(ggb, IdY) {
        var fFa = eda.that[ggb];
        return fFa.reload(IdY),
        eda.call(fFa)
    },
    XeT.getChecked = function(ggb) {
        var IdY = eda.that[ggb];
        return IdY.getChecked()
    },
    XeT.setChecked = function(ggb, IdY) {
        var fFa = eda.that[ggb];
        return fFa.setChecked(IdY)
    },
    XeT.render = function(ggb) {
        var IdY = new ggbggb(ggb);
        return eda.call(IdY)
    },
    ggb(cMd, XeT)
});