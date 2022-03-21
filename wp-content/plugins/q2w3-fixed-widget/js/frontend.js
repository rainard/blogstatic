'use strict';

var extendStatics = function(d, b) {
    extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
    return extendStatics(d, b);
};
function __extends(d, b) {
    if (typeof b !== "function" && b !== null)
        throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
    extendStatics(d, b);
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
}
var __assign = function() {
    __assign = Object.assign || function __assign(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p)) t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};

var StopWidgetClassName = 'FixedWidget__stop_widget';
var FixedWidgetClassName = 'FixedWidget__fixed_widget';
var Widget = (function () {
    function Widget(el) {
        this.el = el;
        this.top_offset = 0;
        this.root_offset = 0;
        this.need_to_calc_el_offset = function (_) { return false; };
        this.prevSibling = function (el) {
            return el && el.previousElementSibling;
        };
    }
    Widget.prototype.render = function () { };
    Widget.prototype.mount = function (user_margins) {
        if (user_margins === void 0) { user_margins = {}; }
        if (!this.el || !this.el.parentElement) {
            return;
        }
        this.top_offset = this.get_total_top_offset(user_margins);
        this.root_offset = scrollY + this.el.getBoundingClientRect().y;
    };
    Widget.prototype.getElement = function () {
        return this.el;
    };
    Widget.prototype.toString = function () {
        var _a;
        return "".concat((_a = this.el) === null || _a === void 0 ? void 0 : _a.innerHTML);
    };
    Widget.prototype.get_total_top_offset = function (margins) {
        return get_sibilings_offset(this.prevSibling, this.need_to_calc_el_offset, this.prevSibling(this.el), margins.margin_top);
    };
    Widget.queryAllWidgetsContainers = function (className) {
        return []
            .concat(Array.from(document.querySelectorAll(".".concat(className))), Array.from(document.querySelectorAll("[data-fixed_widget=".concat(className))))
            .map(function (el) {
            el.classList.remove(className);
            el.removeAttribute('data-fixed_widget');
            var container = getWidgetContainer(el);
            container.classList.remove(FixedWidgetClassName);
            container.classList.remove(StopWidgetClassName);
            return container;
        });
    };
    Widget.from = function (root, className) {
        var _this = this;
        var elements = [];
        try {
            elements = Array.from(root.querySelectorAll(":scope > .".concat(className)));
        }
        catch (_e) {
            elements = Array.from(root.children).filter(function (e) { return e.classList.contains(className); });
        }
        return elements
            .filter(function (el) { return el !== null; })
            .map(function (e) { return new _this(e); });
    };
    return Widget;
}());
var getWidgetContainer = function (el) {
    return el.parentElement && (el.parentElement.childElementCount === 1 ||
        el.parentElement.classList.toString().includes('wp-block-group') ||
        el.parentElement.classList.toString().includes('wp-block-column') ||
        el.parentElement.classList.contains('widget')) ? getWidgetContainer(el.parentElement) : el;
};
var get_sibilings_offset = function (next, need_to_calc_el_offset, el, offset) {
    if (offset === void 0) { offset = 0; }
    if (!el) {
        return offset;
    }
    if (!need_to_calc_el_offset(el)) {
        return get_sibilings_offset(next, need_to_calc_el_offset, next(el), offset);
    }
    var _a = getComputedStyle(el), marginTop = _a.marginTop, marginBottom = _a.marginBottom;
    return get_sibilings_offset(next, need_to_calc_el_offset, next(el), offset + el.getBoundingClientRect().height + parseInt(marginTop || '0') + parseInt(marginBottom || '0'));
};

var findIntersections = function (arr1, arr2) {
    return [
        arr2.filter(function (e) { return !arr1.includes(e); }),
        arr1.filter(function (e) { return arr2.includes(e); }),
    ];
};
var splitSelectors = function (s) {
    if (s === void 0) { s = ''; }
    return s.replace(/[\r\n]|[\r]/gi, '\n')
        .split('\n')
        .map(function (s) { return s.trim(); })
        .filter(function (s) { return s !== ''; });
};
var compatabilty_FW_v5 = function (selectors) {
    if (selectors === void 0) { selectors = []; }
    if (selectors.some(function (s) { return !/^[a-z]/i.test(s); })) {
        return selectors;
    }
    return selectors.concat(selectors.map(function (s) { return "#".concat(s); }));
};

var queryElements = function (selectors) {
    if (selectors === void 0) { selectors = []; }
    return Array.from((selectors)
        .map(function (selector) { return Array.from(document.querySelectorAll(selector)); }))
        .reduce(function (all, elements) { return all.concat(elements); }, [])
        .filter(function (e) { return e instanceof HTMLElement; });
};
function findWithProperty(el, predicate) {
    if (!el || el === document.body) {
        return null;
    }
    if (predicate(getComputedStyle(el))) {
        return el;
    }
    return findWithProperty(el.parentElement, predicate);
}

var reactive = function (getter, interval) {
    if (interval === void 0) { interval = 300; }
    var subs = [];
    var v = getter();
    setInterval(check, interval);
    function check() {
        if (subs.length === 0) {
            return;
        }
        var new_v = getter();
        if (v === new_v) {
            return;
        }
        v = new_v;
        for (var _i = 0, subs_1 = subs; _i < subs_1.length; _i++) {
            var update = subs_1[_i];
            update(new_v);
        }
    }
    return {
        get val() {
            return v;
        },
        on_change: function (update) {
            update(v);
            subs.push(update);
        }
    };
};

var PositionWidget = (function (_super) {
    __extends(PositionWidget, _super);
    function PositionWidget() {
        var _this = _super !== null && _super.apply(this, arguments) || this;
        _this.bottom_offset = 0;
        _this.top_margin = 0;
        _this.borderBox = 0;
        _this.block_height = reactive(function () { return 0; });
        _this.max_top_offset = 0;
        _this.bottom_margin = 0;
        _this.user_margins = {};
        _this.prevSibling = function (el) {
            return el
                && !el.classList.contains(StopWidgetClassName)
                && el.previousElementSibling
                || null;
        };
        _this.get_total_bottom_offset = function (margins) {
            var next = function (el) { return el && !el.classList.contains(StopWidgetClassName) ? el.nextElementSibling : null; };
            return get_sibilings_offset(next, _this.need_to_calc_el_offset, next(_this.el), margins.margin_bottom);
        };
        return _this;
    }
    PositionWidget.prototype.mount = function (user_margins) {
        var _this = this;
        _super.prototype.mount.call(this, user_margins);
        if (!this.el || !this.el.parentElement) {
            return;
        }
        this.user_margins = user_margins;
        var _a = getComputedStyle(this.el), marginTop = _a.marginTop, marginBottom = _a.marginBottom;
        this.bottom_margin = parseInt(marginBottom);
        this.top_margin = parseInt(marginTop);
        this.bottom_offset = this.get_total_bottom_offset(user_margins);
        this.max_top_offset = document.body.clientHeight;
        this.block_height = reactive(function () {
            if (!_this.el) {
                return 0;
            }
            return Math.round(Math.max(_this.el.clientHeight, _this.el.scrollHeight, _this.el.getBoundingClientRect().height));
        });
        this.block_height.on_change(function (block_height) {
            _this.borderBox = block_height + _this.top_margin + _this.bottom_margin;
        });
        reactive(this.get_total_bottom_offset.bind(this, user_margins))
            .on_change(function (bottom_offset) {
            _this.bottom_offset = bottom_offset;
        });
        reactive(this.get_total_top_offset.bind(this, user_margins))
            .on_change(function (top_offset) {
            _this.top_offset = top_offset;
            if (!_this.el) {
                return;
            }
            _this.el.style.top = "".concat(top_offset, "px");
        });
    };
    PositionWidget.prototype.setMaxOffset = function (max_top_offset) {
        this.max_top_offset = max_top_offset;
    };
    PositionWidget.prototype.render = function () {
        this.on_scroll(scrollY);
    };
    PositionWidget.from = function (root) {
        return _super.from.call(this, root, FixedWidgetClassName);
    };
    PositionWidget.prototype.on_scroll = function (_scroll_top) { };
    return PositionWidget;
}(Widget));

var FixedWidget = (function (_super) {
    __extends(FixedWidget, _super);
    function FixedWidget(el) {
        var _this = _super.call(this, el) || this;
        _this.is_pinned = false;
        _this.relative_top = 0;
        _this.paddings = 0;
        _this.init_style = { position: 'static', marginTop: '', marginBottom: '', width: '', height: '' };
        _this.need_to_calc_el_offset = function (el) {
            return el.classList.contains(FixedWidgetClassName);
        };
        if (!_this.el || !_this.el.parentElement) {
            return _this;
        }
        _this.el.classList.add(FixedWidgetClassName);
        return _this;
    }
    FixedWidget.prototype.mount = function (margins) {
        var _this = this;
        _super.prototype.mount.call(this, margins);
        if (!this.el) {
            return;
        }
        this.paddings =
            this.top_offset
                + this.top_margin
                + this.bottom_margin
                + this.bottom_offset;
        this.store_style(getComputedStyle(this.el));
        this.clone();
        this.block_height.on_change(function (block_height) {
            _this.relative_top = _this.max_top_offset - block_height - _this.paddings;
            _this.init_style.height = "".concat(block_height, "px");
        });
    };
    FixedWidget.prototype.update_root_offset = function () {
        var element = this.is_pinned ? this.clone_el : this.el;
        var new_root_offset = Math.round(scrollY + (element ? element.getBoundingClientRect().top : 0));
        this.root_offset = Math.max(this.root_offset, new_root_offset);
    };
    FixedWidget.prototype.setMaxOffset = function (max_top_offset) {
        if (max_top_offset === 0 ||
            max_top_offset < this.root_offset ||
            this.max_top_offset === max_top_offset) {
            return;
        }
        this.max_top_offset = max_top_offset;
        this.relative_top = this.max_top_offset - this.block_height.val - this.paddings;
    };
    FixedWidget.prototype.clone = function () {
        var _this = this;
        if (!this.el || !this.el.parentElement) {
            return;
        }
        this.clone_el = this.el.cloneNode(false);
        this.clone_el.getAttributeNames().forEach(function (attr) {
            _this.clone_el.removeAttribute(attr);
        });
        for (var prop in this.init_style) {
            this.clone_el.style[prop] = this.init_style[prop];
        }
        this.clone_el.style.display = 'none';
        this.el.parentElement.insertBefore(this.clone_el, this.el);
    };
    FixedWidget.prototype.store_style = function (style) {
        this.init_style.position = style.position;
        this.init_style.marginTop = style.marginTop;
        this.init_style.marginBottom = style.marginBottom;
        this.init_style.width = style.width;
        this.init_style.height = style.height;
    };
    FixedWidget.prototype.restore_style = function (style) {
        if (!this.is_pinned) {
            return;
        }
        this.is_pinned = false;
        style.position = this.init_style.position;
        if (this.clone_el) {
            this.clone_el.style.display = 'none';
        }
    };
    FixedWidget.prototype.on_scroll = function (scroll_top) {
        if (!this.el) {
            return;
        }
        this.update_root_offset();
        var need_to_fix = scroll_top > this.root_offset - this.top_offset;
        var limited_by_stop_element = this.max_top_offset !== 0 && scroll_top > this.relative_top;
        var top = limited_by_stop_element ? this.relative_top - scroll_top + this.top_offset : this.top_offset;
        need_to_fix ?
            this.fix(top) :
            this.restore_style(this.el.style);
    };
    FixedWidget.prototype.fix = function (top) {
        if (!this.el) {
            return;
        }
        this.el.style.top = "".concat(top, "px");
        if (this.is_pinned) {
            return;
        }
        this.is_pinned = true;
        this.el.style.position = 'fixed';
        this.el.style.transition = 'transform 0.5s';
        this.el.style.width = this.init_style.width;
        this.el.style.height = this.init_style.height;
        if (!this.clone_el) {
            return;
        }
        this.clone_el.style.display = 'block';
    };
    FixedWidget.new = function (selector) {
        return new FixedWidget(document.querySelector(selector));
    };
    FixedWidget.is = function (selector) {
        var el = document.querySelector(selector);
        return !!el && el.classList.contains(FixedWidgetClassName);
    };
    return FixedWidget;
}(PositionWidget));

var StickyWidget = (function (_super) {
    __extends(StickyWidget, _super);
    function StickyWidget(el) {
        var _this = _super.call(this, el) || this;
        _this.margins = 0;
        _this.get_margins = function () {
            return (_this.el && _this.el.parentElement && _this.el.parentElement.clientHeight || 0)
                - _this.bottom_margin
                - _this.top_margin
                - _this.block_height.val;
        };
        _this.need_to_calc_el_offset = function (el) {
            return el.classList.contains(FixedWidgetClassName);
        };
        if (!_this.el || !_this.el.parentElement) {
            return _this;
        }
        _this.el.classList.add(FixedWidgetClassName);
        return _this;
    }
    StickyWidget.prototype.mount = function (margins) {
        var _this = this;
        _super.prototype.mount.call(this, margins);
        if (!this.el || !this.el.parentElement) {
            return;
        }
        reactive(this.get_margins)
            .on_change(function (margins) {
            _this.margins = margins;
        });
        this.el.style.position = 'sticky';
        this.el.style.position = '-webkit-sticky';
        this.el.style.transition = 'transform 0s';
        this.el.style.boxSizing = 'border-box';
    };
    StickyWidget.prototype.setMaxOffset = function (max_top_offset) {
        if (!this.el || !this.el.parentElement) {
            return;
        }
        if (max_top_offset < this.el.offsetTop) {
            return;
        }
        this.max_top_offset = max_top_offset;
    };
    StickyWidget.prototype.on_scroll = function () {
        if (!this.el || !this.el.parentElement) {
            return;
        }
        var bottom_margin = this.max_top_offset ?
            Math.min(this.max_top_offset - this.el.offsetTop - this.borderBox, this.margins - this.el.offsetTop)
            : this.margins - this.el.offsetTop;
        this.el.style.top = "".concat(this.top_offset, "px");
        if (bottom_margin >= this.bottom_offset) {
            this.el.style.transform = "translateY(0px)";
            return;
        }
        this.el.style.transform = "translateY(".concat(bottom_margin - this.bottom_offset, "px)");
    };
    StickyWidget.new = function (selector) {
        return new StickyWidget(document.querySelector(selector));
    };
    StickyWidget.is = function (selector) {
        var el = document.querySelector(selector);
        return !!el && el.classList.contains(FixedWidgetClassName);
    };
    return StickyWidget;
}(PositionWidget));

var StopWidget = (function (_super) {
    __extends(StopWidget, _super);
    function StopWidget(el) {
        var _this = _super.call(this, el) || this;
        _this.need_to_calc_el_offset = function () { return true; };
        if (!_this.el || !_this.el.parentElement) {
            return _this;
        }
        _this.el.classList.add(StopWidgetClassName);
        return _this;
    }
    StopWidget.prototype.mount = function (user_margins) {
        var _this = this;
        _super.prototype.mount.call(this, user_margins);
        reactive(function () { return Math.round(scrollY + (_this.el ? _this.el.getBoundingClientRect().top : 0)); })
            .on_change(function (root_offset) {
            _this.root_offset = root_offset;
        });
    };
    StopWidget.new = function (selector) {
        return new StopWidget(document.querySelector(selector));
    };
    StopWidget.is = function (selector) {
        var el = document.querySelector(selector);
        return !!el && el.classList.contains(StopWidgetClassName);
    };
    StopWidget.from = function (root) {
        return _super.from.call(this, root, StopWidgetClassName);
    };
    return StopWidget;
}(Widget));

var Sidebar = (function () {
    function Sidebar(el, margins, use_sticky_position) {
        var _this = this;
        if (use_sticky_position === void 0) { use_sticky_position = false; }
        this.el = el;
        this.margins = margins;
        this.widgets = [];
        this.stop_widgets = [];
        this.isSticky = false;
        this.setWidgetsMaxOffset = function (max_offset) {
            for (var _i = 0, _a = _this.widgets; _i < _a.length; _i++) {
                var widget = _a[_i];
                widget.setMaxOffset(max_offset);
            }
        };
        var isDeprecatedFloatMarkup = !!findWithProperty(this.el, function (style) { return style.float !== 'none'; });
        var isOverflowHiddenMarkup = !!findWithProperty(this.el, function (style) { return style.overflow === 'hidden'; });
        var isFallbackToSticky = (isDeprecatedFloatMarkup || isOverflowHiddenMarkup) && use_sticky_position;
        isFallbackToSticky && console.log('Fixed Widget: fallback to position sticky');
        this.isSticky =
            !isDeprecatedFloatMarkup &&
                !isOverflowHiddenMarkup &&
                use_sticky_position;
        var WidgetContructor = this.isSticky ? StickyWidget : FixedWidget;
        this.stop_widgets = StopWidget.from(this.el);
        this.widgets = WidgetContructor.from(this.el);
        if (!this.isSticky) {
            return;
        }
        this.el.style.position = 'relative';
        if (this.stop_widgets.length !== 0) {
            return;
        }
        this.el.style.minHeight = '100%';
    }
    Sidebar.prototype.mount = function () {
        var _this = this;
        this.stop_widgets.forEach(function (widget) { widget.mount(); });
        this.widgets.forEach(function (widget) { widget.mount(_this.margins); });
    };
    Sidebar.prototype.setMaxOffset = function (general_stop_widgets) {
        var is_local_stop_widgets = this.stop_widgets.length != 0;
        var use_top_offset = this.isSticky && is_local_stop_widgets;
        var stop_widgets = is_local_stop_widgets ? this.stop_widgets : general_stop_widgets;
        if (stop_widgets.length === 0) {
            return;
        }
        var max_top_offset = reactive(function () {
            var min_offset = use_top_offset ?
                stop_widgets[0].top_offset :
                stop_widgets[0].root_offset;
            for (var _i = 0, stop_widgets_1 = stop_widgets; _i < stop_widgets_1.length; _i++) {
                var widget = stop_widgets_1[_i];
                var offset = use_top_offset ? widget.top_offset : widget.root_offset;
                if (min_offset > offset) {
                    min_offset = offset;
                }
            }
            return Math.round(min_offset);
        });
        max_top_offset.on_change(this.setWidgetsMaxOffset);
        this.setWidgetsMaxOffset(max_top_offset.val);
    };
    Sidebar.prototype.render = function () {
        for (var _i = 0, _a = this.stop_widgets; _i < _a.length; _i++) {
            var stop_widget = _a[_i];
            stop_widget.render();
        }
        for (var _b = 0, _c = this.widgets; _b < _c.length; _b++) {
            var widget = _c[_b];
            widget.render();
        }
    };
    return Sidebar;
}());

var Sidebars = (function () {
    function Sidebars(elements, options) {
        var _this = this;
        this.data = [];
        this.render = function () {
            for (var _i = 0, _a = _this.data; _i < _a.length; _i++) {
                var sidebar = _a[_i];
                sidebar.render();
            }
        };
        this.data = Array.from(new Set(elements.map(function (widget) { return widget.parentElement; })))
            .filter(function (sidebar_el) { return sidebar_el !== null; })
            .map(function (sidebar_el) { return new Sidebar(sidebar_el, options, options.use_sticky_position); });
    }
    Sidebars.prototype.mount = function () {
        this.data.forEach(function (sidebar) { sidebar.mount(); });
        this.setMaxOffset();
    };
    Sidebars.prototype.setMaxOffset = function () {
        var general_stop_widgets = this.getGeneralStopElements();
        for (var _i = 0, _a = this.data; _i < _a.length; _i++) {
            var sidebar = _a[_i];
            sidebar.setMaxOffset(general_stop_widgets);
        }
    };
    Sidebars.prototype.getGeneralStopElements = function () {
        return this.data.filter(function (sidebar) {
            return sidebar.isSticky ?
                sidebar.widgets.length === 0 :
                true;
        })
            .map(function (sidebar) { return sidebar.stop_widgets; })
            .reduce(function (all, widgets) { return all.concat(widgets); }, []);
    };
    Sidebars.new = function (options) {
        var fixedWidgetsContainers = Array.from(new Set(Widget
            .queryAllWidgetsContainers(FixedWidgetClassName)
            .concat(queryElements(compatabilty_FW_v5(options.widgets)))));
        var stopWidgetsSelectors = compatabilty_FW_v5(splitSelectors(options.stop_elements_selectors || options.stop_id));
        var stopWidgetsContainers = Array.from(new Set(Widget
            .queryAllWidgetsContainers(StopWidgetClassName)
            .concat(queryElements(stopWidgetsSelectors))));
        var _a = findIntersections(fixedWidgetsContainers, stopWidgetsContainers), stopWidgetsUniqContainers = _a[0], duplicates = _a[1];
        duplicates.forEach(function (w) {
            console.error("The Widget is detected as fixed block and stop block!\n".concat(w.innerHTML));
        });
        fixedWidgetsContainers.forEach(function (c) { c.classList.add(FixedWidgetClassName); });
        stopWidgetsUniqContainers.forEach(function (c) { c.classList.add(StopWidgetClassName); });
        return new Sidebars(fixedWidgetsContainers.concat(stopWidgetsUniqContainers), options);
    };
    return Sidebars;
}());

var sidebars;
var initPlugin = function (options) {
    if (options === void 0) { options = []; }
    if (sidebars) {
        sidebars.render();
        return;
    }
    sidebars = Sidebars.new(options.reduce(function (prev, cur) { return (__assign(__assign(__assign({}, prev), cur), { widgets: prev.widgets.concat(cur.widgets || []) })); }, { widgets: [] }));
    document.addEventListener('scroll', sidebars.render);
    sidebars.mount();
};

window.addEventListener('load', onDocumentLoaded);
document.readyState === "complete" && onDocumentLoaded();
onDocumentLoaded();
function onDocumentLoaded() {
    var admin_panel = document.querySelector('#wpadminbar');
    var user_options = window['q2w3_sidebar_options'] || [{}];
    var options = user_options.map(function (option) {
        option.margin_top = (option.margin_top || 0) + (admin_panel && admin_panel.clientHeight || 0);
        return option;
    });
    if (options.some(function (option) {
        return window.innerWidth < option.screen_max_width ||
            window.innerHeight < option.screen_max_height;
    })) {
        return;
    }
    initPlugin(options);
}
