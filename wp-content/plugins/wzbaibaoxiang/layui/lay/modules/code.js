layui.define("jquery",
function(fFfMgUfMg) {
    "use strict";
    var EaJbUgNba = layui.$,
    gggHcbcMa = "http://www.layui.com/doc/modules/code.html";
    fFfMgUfMg("code",
    function(fFfMgUfMg) {
        var gbZfBeXeH = [];
        fFfMgUfMg = fFfMgUfMg || {},
        fFfMgUfMg.elem = EaJbUgNba(fFfMgUfMg.elem || ".layui-code"),
        fFfMgUfMg.about = !("about" in fFfMgUfMg) || fFfMgUfMg.about,
        fFfMgUfMg.elem.each(function() {
            gbZfBeXeH.push(this)
        }),
        layui.each(gbZfBeXeH.reverse(),
        function(gbZfBeXeH, eLbZfLeNc) {
            var WfSeZbbai = EaJbUgNba(eLbZfLeNc),
            bMaYaW = WfSeZbbai.html(); (WfSeZbbai.attr("lay-encode") || fFfMgUfMg.encode) && (bMaYaW = bMaYaW.replace(/&(?!#?[a-zA-Z0-9]+;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&quot;")),
            WfSeZbbai.html('<ol class="layui-code-ol"><li>' + bMaYaW.replace(/[\r\t\n]+/g, "</li><li>") + "</li></ol>"),
            WfSeZbbai.find(">.layui-code-h3")[0] || WfSeZbbai.prepend('<h3 class="layui-code-h3">' + (WfSeZbbai.attr("lay-title") || fFfMgUfMg.title || "code") + (fFfMgUfMg.about ? '<a href="' + gggHcbcMa + '" target="_blank">layui.code</a>': "") + "</h3>");
            var fFfMgUfMgfFfMgUfMg = WfSeZbbai.find(">.layui-code-ol");
            WfSeZbbai.addClass("layui-box layui-code-view"),
            (WfSeZbbai.attr("lay-skin") || fFfMgUfMg.skin) && WfSeZbbai.addClass("layui-code-" + (WfSeZbbai.attr("lay-skin") || fFfMgUfMg.skin)),
            (fFfMgUfMgfFfMgUfMg.find("li").length / 100 | 0) > 0 && fFfMgUfMgfFfMgUfMg.css("margin-left", (fFfMgUfMgfFfMgUfMg.find("li").length / 100 | 0) + "px"),
            (WfSeZbbai.attr("lay-height") || fFfMgUfMg.height) && fFfMgUfMgfFfMgUfMg.css("max-height", WfSeZbbai.attr("lay-height") || fFfMgUfMg.height)
        })
    })
}).addcss("modules/code.css", "skincodecss");