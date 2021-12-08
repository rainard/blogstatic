!function(e){function t(n){if(l[n])return l[n].exports;var r=l[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var l={};t.m=e,t.c=l,t.d=function(e,l,n){t.o(e,l)||Object.defineProperty(e,l,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var l=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(l,"a",l),l},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,l){"use strict";Object.defineProperty(t,"__esModule",{value:!0});l(1)},function(e,t,l){"use strict";var n=l(2),r=(l.n(n),l(3)),i=(l.n(r),wp.data.withSelect,wp.components),o=(i.IconButton,i.PanelBody),c=i.TextControl,a=(i.SelectControl,i.ToggleControl,i.withNotices),p=wp.element.Fragment,__=wp.i18n.__,m=wp.blocks.registerBlockType,s=wp.blockEditor,d=s.BlockControls,w=s.InspectorControls,u=(s.ContrastChecker,s.PanelColorSettings,s.BlockAlignmentToolbar,s.MediaPlaceholder),v=s.MediaReplaceFlow,h=(s.MediaUpload,s.AlignmentToolbar,s.RichText,s.BlockIcon,["application"]),g={title:{type:"array",source:"children",selector:"p"},url:{type:"string"},align:{type:"string"},width:{type:"number",default:600},height:{type:"number",default:300},contentAlign:{type:"string",default:"center"},id:{type:"number"}},f=wp.blocks.getCategories().some(function(e){return"common"===e.slug});m("algori-pdf-viewer/block-algori-pdf-viewer",{title:__("PDF Viewer"),description:__("Let visitors view your PDF documents directly on your site! Insert a PDF file."),icon:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24"},wp.element.createElement("path",{fill:"none",d:"M0 0h24v24H0z"}),wp.element.createElement("path",{d:"M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"})),category:f?"common":"media",keywords:[__("portable document format"),__("file"),__("algori")],example:{attributes:{url:cgbGlobal_AlgoriPDFViewer.pluginDirUrl+"dist/web/compressed.tracemonkey-pldi-09.pdf",width:500}},attributes:g,edit:a(function(e){var t=e.attributes,l=e.setAttributes,n=(e.isSelected,e.className),r=e.noticeOperations,i=e.noticeUI,a=t.url,m=(t.title,t.align,t.width),s=t.height,g=(t.contentAlign,t.id),f=function(e){return l({width:parseInt(e,10)})},b=function(e){return l({height:parseInt(e,10)})},y=function(e){if(!e||!e.url)return void l({url:void 0,id:void 0});l({url:e.url,id:e.id})},E=function(e){e!==a&&l({url:e,id:void 0})},k=function(e){r.removeAllNotices(),r.createErrorNotice(e)},H=wp.element.createElement(p,null,wp.element.createElement(d,null,wp.element.createElement(v,{mediaId:g,mediaURL:a,allowedTypes:h,accept:"application/pdf",onSelect:y,onSelectURL:E,onError:k})),!!a&&wp.element.createElement(w,null,wp.element.createElement(o,{title:__("PDF Dimensions"),initialOpen:!1},wp.element.createElement("div",null,wp.element.createElement(c,{type:"number",label:__("Width"),value:void 0!==m?m:"",placeholder:600,min:1,onChange:f}),wp.element.createElement(c,{type:"number",label:__("Height"),value:void 0!==s?s:"",placeholder:300,min:1,onChange:b})))));return a?wp.element.createElement(p,null,H,wp.element.createElement("div",{className:"wp-block-algori-pdf-viewer-block-algori-pdf-viewer"},wp.element.createElement("iframe",{className:"wp-block-algori-pdf-viewer-block-algori-pdf-viewer-iframe",src:cgbGlobal_AlgoriPDFViewer.pluginDirUrl+"dist/web/viewer.html?file="+encodeURIComponent(a),style:{width:m,height:s}}))):wp.element.createElement(p,null,H,wp.element.createElement(u,{icon:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24"},wp.element.createElement("path",{fill:"none",d:"M0 0h24v24H0z"}),wp.element.createElement("path",{d:"M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"})),className:n,labels:{title:__("PDF Viewer"),instructions:__("Drag a PDF, upload a new one, insert from URL or select a file from your library.")},onSelect:y,onSelectURL:E,accept:"application/pdf",allowedTypes:h,notices:i,onError:r.createErrorNotice}))}),save:function(e){var t=e.attributes,l=(e.className,t.url),n=(t.title,t.align,t.width),r=t.height;t.contentAlign,t.id;return wp.element.createElement("div",{className:"wp-block-algori-pdf-viewer-block-algori-pdf-viewer"},wp.element.createElement("iframe",{className:"wp-block-algori-pdf-viewer-block-algori-pdf-viewer-iframe",src:cgbGlobal_AlgoriPDFViewer.pluginDirUrl+"dist/web/viewer.html?file="+encodeURIComponent(l),style:{width:n,height:r}}))},deprecated:[{attributes:Object.assign({},g),save:function(e){var t=e.attributes,l=(e.className,t.url),n=(t.title,t.align,t.width),r=t.height;t.contentAlign,t.id;return wp.element.createElement("div",{className:"wp-block-cgb-block-algori-pdf-viewer"},wp.element.createElement("iframe",{className:"wp-block-cgb-block-algori-pdf-viewer-iframe",src:algoriPDFViewerPluginDirectoryPath+"/algori-pdf-viewer/dist/web/viewer.html?file="+encodeURIComponent(l),style:{width:n,height:r}}))}}]})},function(e,t){},function(e,t){}]);