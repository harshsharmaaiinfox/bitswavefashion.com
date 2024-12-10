import{b as D,u as P,k as B}from"./index.5a710757.js";import{u as O}from"./PostTypes.d6c1987b.js";import{A as L,T as j}from"./TitleDescription.0fc59fae.js";import{C as q}from"./Card.5b602127.js";import{C as w}from"./Tabs.08a4fd23.js";import{C as E}from"./Tooltip.b6b45c85.js";import{a as F}from"./index.ee8124c6.js";import"./translations.12335a6a.js";import{c as p,F as b,J as h,v as m,o as r,k as S,l as a,a as o,G as I,x as u,t as n,C as _,q as N,T as R}from"./runtime-dom.esm-bundler.6789c400.js";import{_ as V}from"./_plugin-vue_export-helper.249dac1d.js";import{_ as e,s as T}from"./default-i18n.54b5d8cd.js";import"./helpers.f95d5840.js";import"./constants.2019bcb3.js";import"./JsonValues.892a7505.js";import"./RadioToggle.64619d6b.js";import"./RobotsMeta.923dd147.js";import"./Checkbox.e983780b.js";import"./Checkmark.32f79576.js";import"./Row.f01f32cd.js";import"./SettingsRow.1934f141.js";import"./Editor.e5877fb8.js";import"./isEqual.51bf23f5.js";import"./_baseIsEqual.6bc92395.js";import"./_getTag.8dc22eac.js";import"./_baseClone.50c6045c.js";import"./_arrayEach.f4f00336.js";import"./Caret.662da1f3.js";import"./Tags.3157574f.js";import"./helpers.b97d7047.js";import"./metabox.1128ddb8.js";import"./cleanForSlug.f9ffe7db.js";import"./toString.1401d490.js";import"./_baseTrim.940c51cf.js";import"./_stringToArray.08127ca9.js";import"./_baseSet.32e7a763.js";import"./regex.f8017116.js";import"./GoogleSearchPreview.805aa110.js";import"./Url.cc9d8d5e.js";import"./HtmlTagsEditor.b85e0cfa.js";import"./UnfilteredHtml.559aa5ad.js";import"./Slide.d0517fb0.js";import"./vue-router.fc4966b9.js";import"./ProBadge.7733ac87.js";import"./Information.82968754.js";const s="all-in-one-seo-pack",z={setup(){const{getPostIconClass:l}=O();return{getPostIconClass:l,optionsStore:D(),rootStore:P(),settingsStore:B()}},components:{Advanced:L,CoreCard:q,CoreMainTabs:w,CoreTooltip:E,SvgCircleQuestionMark:F,TitleDescription:j},data(){return{internalDebounce:null,strings:{label:e("Label:",s),name:e("Slug:",s),postTypes:e("Post Types:",s),ctaButtonText:e("Unlock Custom Taxonomies",s),ctaDescription:T(e("%1$s %2$s lets you set the SEO title and description for custom taxonomies. You can also control all of the robots meta and other options just like the default category and tags taxonomies.",s),"AIOSEO","Pro"),ctaHeader:T(e("Custom Taxonomy Support is a %1$s Feature",s),"PRO")},tabs:[{slug:"title-description",name:e("Title & Description",s),access:"aioseo_search_appearance_settings",pro:!1},{slug:"advanced",name:e("Advanced",s),access:"aioseo_search_appearance_settings",pro:!1}]}},computed:{taxonomies(){return this.rootStore.aioseo.postData.taxonomies}},methods:{processChangeTab(l,g){this.internalDebounce||(this.internalDebounce=!0,this.settingsStore.changeTab({slug:`${l}SA`,value:g}),setTimeout(()=>{this.internalDebounce=!1},50))}}},M={class:"aioseo-search-appearance-taxonomies"},U={class:"aioseo-description"},G=o("br",null,null,-1),H=o("br",null,null,-1),J=o("br",null,null,-1);function Q(l,g,Y,i,c,f){const C=m("svg-circle-question-mark"),v=m("core-tooltip"),k=m("core-main-tabs"),A=m("core-card");return r(),p("div",M,[(r(!0),p(b,null,h(f.taxonomies,(t,x)=>(r(),S(A,{key:x,slug:`${t.name}SA`},{header:a(()=>[o("div",{class:I(["icon dashicons",i.getPostIconClass(t.icon)])},null,2),u(" "+n(t.label)+" ",1),_(v,{"z-index":"99999"},{tooltip:a(()=>[o("div",U,[u(n(c.strings.label)+" ",1),o("strong",null,n(t.label),1),G,u(" "+n(c.strings.name)+" ",1),o("strong",null,n(t.name),1),H,u(" "+n(c.strings.postTypes),1),J,o("ul",null,[(r(!0),p(b,null,h(t.postTypes,(d,y)=>(r(),p("li",{key:y},[o("strong",null,n(d),1)]))),128))])])]),default:a(()=>[_(C)]),_:2},1024)]),tabs:a(()=>[_(k,{tabs:c.tabs,showSaveButton:!1,active:i.settingsStore.settings.internalTabs[`${t.name}SA`],internal:"",onChanged:d=>f.processChangeTab(t.name,d)},null,8,["tabs","active","onChanged"])]),default:a(()=>[_(R,{name:"route-fade",mode:"out-in"},{default:a(()=>[(r(),S(N(i.settingsStore.settings.internalTabs[`${t.name}SA`]),{object:t,separator:i.optionsStore.options.searchAppearance.global.separator,options:i.optionsStore.dynamicOptions.searchAppearance.taxonomies[t.name],type:"taxonomies","show-bulk":!1},null,8,["object","separator","options"]))]),_:2},1024)]),_:2},1032,["slug"]))),128))])}const Rt=V(z,[["render",Q]]);export{Rt as default};
