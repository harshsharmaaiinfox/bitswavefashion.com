(()=>{"use strict";const e=window.React,t=window.wp.blocks,o=window.wp.element,n=(0,o.forwardRef)((function({icon:e,size:t=24,...n},c){return(0,o.cloneElement)(e,{width:t,height:t,...n,ref:c})})),c=window.wp.primitives,i=(0,e.createElement)(c.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,e.createElement)(c.Path,{fillRule:"evenodd",d:"M5 5.5h14a.5.5 0 01.5.5v1.5a.5.5 0 01-.5.5H5a.5.5 0 01-.5-.5V6a.5.5 0 01.5-.5zM4 9.232A2 2 0 013 7.5V6a2 2 0 012-2h14a2 2 0 012 2v1.5a2 2 0 01-1 1.732V18a2 2 0 01-2 2H6a2 2 0 01-2-2V9.232zm1.5.268V18a.5.5 0 00.5.5h12a.5.5 0 00.5-.5V9.5h-13z",clipRule:"evenodd"})),l=window.wp.blockEditor,r=window.wc.blocksCheckout,a=window.wc.wcSettings,{optInText:s,optInEnabled:d,optInPreselected:w}=(0,a.getSetting)("omnisend_consent_data",""),m=JSON.parse('{"apiVersion":2,"name":"omnisend/checkout-block","version":"2.0.0","title":"Omnisend subscriber checkbox","category":"woocommerce","description":"Adds a checkbox field to let the shopper become a subscriber.","supports":{"html":false,"align":false,"multiple":false,"reusable":false},"parent":["woocommerce/checkout-contact-information-block"],"attributes":{"lock":{"type":"object","default":{"remove":true,"move":true}},"text":{"type":"string","default":""}},"textdomain":"omnisend-checkout-block","editorStyle":""}');(0,t.registerBlockType)(m,{icon:{src:(0,e.createElement)(n,{icon:i})},edit:()=>{const t=(0,l.useBlockProps)();return d?(0,e.createElement)("div",{...t,id:"omnisend-subscribe-block"},(0,e.createElement)(r.CheckboxControl,{style:{marginTop:0,lineHeight:"normal"},id:"newsletter-text",checked:w,disabled:!0},(0,e.createElement)(o.RawHTML,null,s))):(0,e.createElement)("div",null)}})})();