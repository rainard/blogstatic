(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0d07e8"],{"67e6":function(t,a,s){"use strict";s.r(a);var e=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"sc-wp wbs-main page-stats"},[s("div",{staticClass:"tab-nav style-c"},[s("a",{staticClass:"tn-item",class:{current:7==t.day},on:{click:function(a){return t.set_day(7)}}},[t._v("近7天")]),s("a",{staticClass:"tn-item",class:{current:30==t.day},on:{click:function(a){return t.set_day(30)}}},[t._v("近30天")])]),s("bsl-stats-baidu",{attrs:{"date-x-axis":t.dateXAxis,"zero-data":t.zeroData,day:t.day}}),s("div",{staticClass:"sc-group"},[s("bsl-stats-google",{attrs:{"date-x-axis":t.dateXAxis,"zero-data":t.zeroData,day:t.day}}),s("bsl-stats-bing",{attrs:{"date-x-axis":t.dateXAxis,"zero-data":t.zeroData,day:t.day}})],1),s("div",{staticClass:"sc-group"},[s("bsl-stats-qh",{attrs:{"date-x-axis":t.dateXAxis,"zero-data":t.zeroData,day:t.day}}),s("div",{staticClass:"sc-block"})],1)],1)},c=[],o=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"sc-group"},[s("div",{staticClass:"sc-block"},[s("h3",{staticClass:"sc-header"},[s("strong",[t._v(" 百度普通收录推送统计 "),s("el-tooltip",{attrs:{placement:"right"}},[s("div",{attrs:{slot:"content"},slot:"content"},[s("dl",{staticClass:"wb-description"},[s("dt",[t._v("数据说明：")]),s("dd",[t._v("这里数据仅代表插件协作推送至百度搜索资源平台的数据，即完整推送数据；")]),s("dd",[t._v("百度搜索资源平台的统计数据为主动和sitemap推送方式去重数据，除sitemap推送外，主动推送不重复计算已经收录或者推送过的数据；")]),s("dd",[t._v("推送数据不代表收录数据，积极向百度推送数据目的是为了更好地获得收录数据。")]),s("dd",[t._v("对于已推送过的数据，不作重复推送，避免百度判断站点推送内容质量度低。")])])]),s("svg",{staticClass:"wb-icon sico-qa"},[s("use",{attrs:{"xlink:href":"#sico-qa"}})])])],1)]),s("div",{staticClass:"sc-body"},[s("div",{staticClass:"charts-wp"},[s("div",{staticClass:"chart"},[s("v-chart",{ref:"chart_obj",staticClass:"charts-box",attrs:{options:t.chart_cnf}})],1)])])]),s("div",{staticClass:"sc-block"},[s("h3",{staticClass:"sc-header"},[s("strong",[t._v(" 百度快速收录推送统计 "),s("el-tooltip",{attrs:{placement:"top"}},[s("div",{attrs:{slot:"content"},slot:"content"},[s("dl",{staticClass:"wb-description"},[s("dt",[t._v("数据说明：")]),s("dd",[t._v("* 这里仅统计快速收录推送数据，快速收录推送收录情况请访问"),s("a",{staticClass:"link",attrs:{target:"_blank",href:"https://ziyuan.baidu.com/"}},[t._v("百度搜索资源平台")]),t._v("查看。")]),s("dd",[t._v("* 快速收录推送收录数据有时候会出现1周的数据延迟或无数据的情况，这是百度系统问题。")])])]),s("svg",{staticClass:"wb-icon sico-qa"},[s("use",{attrs:{"xlink:href":"#sico-qa"}})])])],1),s("i",{staticClass:"tag-pro",on:{click:function(a){return t.aboutPro()}}},[t._v("Pro")])]),s("div",{staticClass:"sc-body"},[s("div",{staticClass:"charts-wp mt"},[s("div",{staticClass:"chart"},[s("v-chart",{ref:"chart_obj_daypush",staticClass:"charts-box",attrs:{options:t.chart_cnf_pro}})],1),t.is_pro?t._e():s("div",{staticClass:"getpro-mask"},[s("div",{staticClass:"mask-inner"},[s("a",{staticClass:"wbs-btn-primary j-get-pro",on:{click:t.aboutPro}},[t._v("获取PRO版本")]),s("p",{staticClass:"tips"},[t._v("* 注意：当前为随机演示数据，仅供参考")])])])])])])])},r=[],n=s("365c"),i=s("67fc"),d=s.n(i),h=s("5e9c"),l="WB_BSL_STATS",_={name:"WB_Bsl_Stats_Baidu",props:["day","date-x-axis","zero-data"],components:{"v-chart":d.a},watch:{day:function(t,a){this.pushOverview(t),this.dayPush(t)}},data:function(){var t=this;return{is_pro:t.$cnf.is_pro,cnf:t.$cnf,type:1,chart_cnf:{},chart_cnf_pro:{},list:[],loading:1}},created:function(){},mounted:function(){this.pushOverview(7),this.dayPush(7)},methods:{aboutPro:function(){this.$router.push({path:"/pro"})},dayPush:function(t){var a=this,s=a.day||7,e=a.dateXAxis(s);a.type=2,a.$refs.chart_obj_daypush.showLoading({text:"加载中...",color:"#06c",textColor:"#333",maskColor:"rgba(0, 0, 0, 0.02)",zlevel:0}),a.dayPushData(s,(function(t){a.chart_cnf_pro=Object.assign({},a.$echart_cnf,{yAxis:{type:"value",axisLine:{show:!0,lineStyle:{width:1,color:"rgba(0,0,0,.15)"}},splitLine:{lineStyle:{width:1,color:"rgba(0,0,0,.05)"}},axisLabel:{color:"#ccc"},axisTick:{show:!1}},xAxis:{boundaryGap:!0,type:"category",data:e,axisTick:{show:!1,lineStyle:{color:"rgba(0,0,0,.15)"}},axisLine:{show:!0,lineStyle:{width:1,color:"rgba(0,0,0,.15)"}},axisLabel:{color:"#ccc"},splitLine:{show:!1}},series:[{boundaryGap:!1,name:"当前配额",data:t[0],type:"line",smooth:!0,symbol:"none",lineStyle:{type:"dashed",color:"rgba(0,0,0,0)"}},{name:"推送数据",data:t[1],type:"bar",stack:"搜索引擎",barGap:30,showBackground:!0,barMaxWidth:"10",backgroundStyle:{color:"rgba(220, 220, 220, 0.2)"}},{name:"剩余配额",data:t[2],type:"bar",stack:"搜索引擎",barGap:30,barMaxWidth:"10",showBackground:!0,backgroundStyle:{color:"rgba(220, 220, 220, 0.2)"}}],color:["#E8684A","#5B8FF9","#cdddfd"]})}))},get_temp_data:function(t,a,s){for(var e=t||30,c=[],o=0;o<e;o++)1==s?c.push(a):c.push(parseInt(Math.random()*a));return c},dayPushData:function(t,a){var s=t||30,e=[[],[],[]],c=this;if(!c.is_pro)return e[0]=c.get_temp_data(s,10,1),e[1]=c.get_temp_data(s,6,2),e[2]=c.get_temp_data(s,4,2),a&&a(e),c.$refs.chart_obj_daypush.hideLoading(),e;var o=Object(h["b"])(l)||{},r="day_push_data_"+s;if(o[r])return e=o[r],a&&a(e),c.$refs.chart_obj_daypush.hideLoading(),e;var i=Object.assign({action:c.$cnf.action.act,day:s},{op:"daily_push_stat"},c.cnf.day_param);return Object(n["b"])(i).then((function(t){e=t["data"],a&&a(e),c.$refs.chart_obj_daypush.hideLoading(),o[r]=t["data"],Object(h["d"])(l,o)})).catch((function(){var t=[[],[],[]];t[0]=c.zeroData(s),t[1]=c.zeroData(s),t[2]=c.zeroData(s),c.$refs.chart_obj_daypush.hideLoading(),a&&a(t)})),e},pcPushData:function(t,a){var s=t||30,e=this,c=[[],[]],o="WB_BSL_STATS_PC",r=Object(h["b"])(o)||{},i="pc_push_data_"+s;return r[i]?(c=r[i],a&&a(c),e.$refs.chart_obj.hideLoading(),c):(Object(n["a"])({action:e.$cnf.action.act,op:"push_stat",day:s}).then((function(t){c=t["data"],a&&a(c),e.$refs.chart_obj.hideLoading(),r[i]=t["data"],Object(h["d"])(o,r)})).catch((function(){c[0]=e.zeroData(s),c[1]=e.zeroData(s),a&&a(c),e.$refs.chart_obj.hideLoading()})),c)},pushOverview:function(t){var a=this,s=a.day||7,e=a.dateXAxis(s);a.type=1,a.$refs.chart_obj.showLoading({text:"加载中...",color:"#06c",textColor:"#333",maskColor:"rgba(0, 0, 0, 0.02)",zlevel:0}),a.pcPushData(s,(function(t){a.chart_cnf=Object.assign({},a.$echart_cnf),a.chart_cnf.xAxis.data=e,a.chart_cnf.series=[],a.chart_cnf.series.push({name:"主动推送",data:t[1],type:"line",smooth:!0}),a.is_pro&&a.chart_cnf.series.push({name:"强制推送",data:t[0],type:"line",smooth:!0})}))}}},u=_,p=s("2877"),v=Object(p["a"])(u,o,r,!1,null,null,null),f=v.exports,b=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"sc-block"},[t._m(0),s("div",{staticClass:"sc-body"},[s("div",{staticClass:"charts-wp"},[s("v-chart",{ref:"chart_obj",staticClass:"charts-box",attrs:{options:t.chart_cnf}})],1)])])},g=[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("h3",{staticClass:"sc-header"},[s("strong",[t._v("Bing推送统计")])])}],y="WB_BSL_STATS_BING",m={name:"WB_Bsl_Stats_Bing",props:["day","date-x-axis","zero-data"],components:{"v-chart":d.a},watch:{day:function(t,a){this.overview_data(t)}},data:function(){var t=this;return{is_pro:t.$cnf.is_pro,opt:t.$opt,chart_cnf:{},overview:[{name:"剩余配额",value:0},{name:"成功推送",value:0},{name:"推送失败",value:0}]}},created:function(){},mounted:function(){var t=this;t.overview_data(t.day)},methods:{get_data:function(t,a){var s=t||30,e=this,c=[[],[],[]];e.$refs.chart_obj.showLoading({text:"加载中...",color:"#06c",textColor:"#333",maskColor:"rgba(0, 0, 0, 0.02)",zlevel:0});var o=Object(h["b"])(y)||{},r="bing_data_"+s;return o[r]?(c=o[r],a&&a(c),e.$refs.chart_obj.hideLoading(),c):(Object(n["a"])({action:e.$cnf.action.act,op:"bing_stat",day:s}).then((function(t){c=t["data"],a&&a(c),e.$refs.chart_obj.hideLoading(),o[r]=t["data"],Object(h["d"])(y,o)})).catch((function(){c[0]=e.zeroData(s),c[1]=e.zeroData(s),c[2]=e.zeroData(s),a&&a(c)})),c)},overview_data:function(t){var a=this,s=a.day||7,e=a.dateXAxis(s);a.get_data(s,(function(t){var s=[];a.is_pro&&"1"==a.opt.bing_auto&&s.push({name:"自动推送",data:t[0],type:"line",smooth:!0}),"1"==a.opt.bing_manual&&s.push({name:"手动推送",data:t[1],type:"line",smooth:!0}),a.chart_cnf=Object.assign({},a.$echart_cnf),a.chart_cnf.xAxis.data=e,a.chart_cnf.series=s}))}}},x=m,w=Object(p["a"])(x,b,g,!1,null,null,null),C=w.exports,j=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"sc-block"},[s("h3",{staticClass:"sc-header"},[s("strong",[t._v(" Google推送统计 "),s("el-tooltip",{attrs:{placement:"right"}},[s("div",{attrs:{slot:"content"},slot:"content"},[s("dl",{staticClass:"wb-description"},[s("dt",[t._v("数据说明：")]),s("dd",[t._v("更新推送-包括新发布或者修改发布，都会向search console发送索引请求；")]),s("dd",[t._v("删除推送-即通知search-console，对应URL已删除，等同于通知谷歌不再索引该URL。")]),s("dd",[t._v("推送URL至谷歌不同于谷歌一定索引该URL，只是更及时地通知谷歌来爬取该URL。")])])]),s("svg",{staticClass:"wb-icon sico-qa"},[s("use",{attrs:{"xlink:href":"#sico-qa"}})])])],1)]),s("div",{staticClass:"sc-body"},[s("div",{staticClass:"charts-wp"},[s("v-chart",{ref:"chart_obj",staticClass:"charts-box",attrs:{options:t.chart_cnf}})],1)])])},$=[],L="WB_BSL_STATS_GOOGLE",k={name:"WB_Bsl_Stats_Google",props:["day","date-x-axis","zero-data"],components:{"v-chart":d.a},watch:{day:function(t,a){this.overview_data(t)}},data:function(){var t=this;return{is_pro:t.$cnf.is_pro,opt:t.$opt,chart_cnf:{},overview:[{name:"更新推送",value:0},{name:"删除推送",value:0}]}},created:function(){},mounted:function(){var t=this;t.overview_data(t.day)},methods:{get_data:function(t,a){var s=t||30,e=this,c=[[],[],[]];e.$refs.chart_obj.showLoading({text:"加载中...",color:"#06c",textColor:"#333",maskColor:"rgba(0, 0, 0, 0.02)",zlevel:0});var o=Object(h["b"])(L)||{},r="google_data_"+s;return o[r]?(c=o[r],a&&a(c),e.$refs.chart_obj.hideLoading(),c):(Object(n["a"])({action:e.$cnf.action.act,op:"google_stat",day:s}).then((function(t){c=t["data"],a&&a(c),e.$refs.chart_obj.hideLoading(),o[r]=t["data"],Object(h["d"])(L,o)})).catch((function(){c[0]=e.zeroData(s),c[1]=e.zeroData(s),c[2]=e.zeroData(s),a&&a(c)})),c)},overview_data:function(t){var a=this,s=a.day||7,e=a.dateXAxis(s);a.get_data(s,(function(t){var s=[];a.is_pro&&(s.push({name:"更新推送",data:t[0],type:"line",smooth:!0}),s.push({name:"删除推送",data:t[1],type:"line",smooth:!0}),a.chart_cnf=Object.assign({},a.$echart_cnf),a.chart_cnf.xAxis.data=e,a.chart_cnf.series=s)}))}}},z=k,O=Object(p["a"])(z,j,$,!1,null,null,null),D=O.exports,B=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"sc-block"},[t._m(0),s("div",{staticClass:"sc-body"},[s("div",{staticClass:"charts-wp"},[s("v-chart",{ref:"chart_obj",staticClass:"charts-box",attrs:{options:t.chart_cnf}})],1)])])},S=[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("h3",{staticClass:"sc-header"},[s("strong",[t._v("其他推送统计")])])}],A="WB_BSL_STATS_OTHER",T={name:"WB_Bsl_Stats_Qh",props:["day","date-x-axis","zero-data"],components:{"v-chart":d.a},watch:{day:function(t,a){this.overview_data(t)}},data:function(){var t=this;return{is_pro:wb_bsl_init,pro:wb_bsl_cnf,opt:t.$opt,chart_cnf:{}}},created:function(){},mounted:function(){var t=this;t.overview_data(t.day)},methods:{overviewData:function(t,a){var s=t||30,e=this,c=[[],[],[]];e.$refs.chart_obj.showLoading({text:"加载中...",color:"#06c",textColor:"#333",maskColor:"rgba(0, 0, 0, 0.02)",zlevel:0});var o=Object(h["b"])(A)||{},r="other_chart_data_"+s;return o[r]?(c=o[r],a&&a(c),e.$refs.chart_obj.hideLoading(),c):(Object(n["a"])({action:e.$cnf.action.act,op:"qh_stat",day:s}).then((function(t){c=t["data"],a&&a(c),e.$refs.chart_obj.hideLoading(),o[r]=t["data"],Object(h["d"])(A,o)})).catch((function(){c[0]=e.zeroData(s),c[1]=e.zeroData(s),c[2]=e.zeroData(s),a&&a(c)})),c)},overview_data:function(){var t=this,a=t.day||7,s=t.dateXAxis(a);t.overviewData(a,(function(a){var e=[];"1"==t.opt.qh_active&&e.push({name:"360推送",data:a[0],type:"line",smooth:!0}),"1"==t.opt.sm_active&&e.push({name:"神马推送",data:a[1],type:"line",smooth:!0}),"1"==t.opt.byte_active&&e.push({name:"头条推送",data:a[2],type:"line",smooth:!0}),t.chart_cnf=Object.assign({},t.$echart_cnf),t.chart_cnf.xAxis.data=s,t.chart_cnf.series=e}))}}},P=T,W=Object(p["a"])(P,B,S,!1,null,null,null),q=W.exports,E={name:"WB_Bsl_Stats",data:function(){return{day:7}},components:{"bsl-stats-baidu":f,"bsl-stats-google":D,"bsl-stats-bing":C,"bsl-stats-qh":q},methods:{set_day:function(t){this.day=t},dateXAxis:function(t){if(!t)return!1;for(var a=[],s=(new Date).getTime(),e=new Date,c="",o=0;o<t;o++)e.setTime(s-864e5*o),c=e.getMonth()<9?"0"+(e.getMonth()+1)+"-":e.getMonth()+1+"-",e.getDate()<10?c+="0"+e.getDate():c+=e.getDate(),a.unshift(c);return a},zeroData:function(t){for(var a=t||30,s=[],e=0;e<a;e++)s.push(0);return s}}},X=E,G=Object(p["a"])(X,e,c,!1,null,null,null);a["default"]=G.exports}}]);