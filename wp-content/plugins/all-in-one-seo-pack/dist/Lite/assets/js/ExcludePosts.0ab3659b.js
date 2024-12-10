import{b as k}from"./index.5a710757.js";import{u as C}from"./JsonValues.892a7505.js";import{_ as S,S as T}from"./Caret.662da1f3.js";import{b as V}from"./index.ee8124c6.js";import{S as B}from"./AddPlus.9574d780.js";import{S as L}from"./External.c84e4310.js";import"./translations.12335a6a.js";import{v as u,o as N,c as j,C as p,l as i,x as d,t as o,a as n,E as g}from"./runtime-dom.esm-bundler.6789c400.js";import{_ as P}from"./_plugin-vue_export-helper.249dac1d.js";import{_ as l}from"./default-i18n.54b5d8cd.js";const a="all-in-one-seo-pack",w={setup(){const{getJsonValues:s,setJsonValues:e}=C();return{getJsonValues:s,optionsStore:k(),setJsonValues:e}},components:{BaseButton:S,BaseSelect:V,SvgAddPlus:B,SvgClose:T,SvgExternal:L},props:{options:{type:Object,required:!0},type:{type:String,required:!0}},data(){return{excludeOptions:[],strings:{typeToSearch:l("Type to search...",a),noOptionsPosts:l("Begin typing a post ID, title or slug to search...",a),noOptionsTerms:l("Begin typing a term ID or name to search...",a),noResult:l("No results found for your search. Try again!",a),clear:l("Clear",a),id:l("ID",a),type:l("Type",a)}}},computed:{optionName:{get(){return this.type==="posts"?this.options.excludePosts:this.options.excludeTerms},set(s){if(this.type==="posts"){this.options.excludePosts=s;return}this.options.excludeTerms=s}},noOptions(){return this.type==="posts"?this.strings.noOptionsPosts:this.strings.noOptionsTerms}},methods:{processGetObjects(s){return this.optionsStore.getObjects({query:s,type:this.type}).then(e=>{this.excludeOptions=e.body.objects})},getOptionTitle(s,e){s=s.replace(/<\/?[^>]+(>|$)/g,""),e=e.replace(/<\/?[^>]+(>|$)/g,"");const _=new RegExp(`(${e})`,"gi");return s.replace(_,'<span class="search-term">$1</span>')},searchableLabel({value:s,label:e,slug:_}){return`${s} ${e} ${_}`}}},E={class:"aioseo-exclude-posts"},J={class:"option"},R=["innerHTML"],A={class:"option-details"},D=["href"],q={class:"multiselect__tag"},I={class:"multiselect__tag-value"},M=["onClick"];function z(s,e,_,h,c,r){const x=u("svg-add-plus"),y=u("base-button"),f=u("svg-external"),b=u("svg-close"),v=u("base-select");return N(),j("div",E,[p(v,{options:c.excludeOptions,"ajax-search":r.processGetObjects,customLabel:r.searchableLabel,size:"medium",multiple:"",modelValue:h.getJsonValues(r.optionName),"onUpdate:modelValue":e[0]||(e[0]=t=>r.optionName=h.setJsonValues(t)),placeholder:c.strings.typeToSearch},{noOptions:i(()=>[d(o(r.noOptions),1)]),noResult:i(()=>[d(o(c.strings.noResult),1)]),caret:i(({toggle:t})=>[p(y,{class:"multiselect-toggle",style:{padding:"10px 13px",width:"40px",position:"absolute",height:"36px",right:"2px",top:"2px","text-align":"center",transition:"transform .2s ease"},type:"gray",onClick:t},{default:i(()=>[p(x,{style:{width:"14px",height:"14px",color:"black"}})]),_:2},1032,["onClick"])]),option:i(({option:t,search:m})=>[n("div",J,[n("div",{class:"option-title",innerHTML:r.getOptionTitle(t.label,m)},null,8,R),n("div",A,[n("span",null,o(c.strings.id)+": #"+o(t.value),1),n("span",null,o(c.strings.type)+": "+o(t.type),1)])]),n("a",{class:"option-permalink",href:t.link,target:"_blank",onClick:g(()=>{},["stop"])},[p(f)],8,D)]),tag:i(({option:t,remove:m})=>[n("div",q,[n("div",I,o(t.label)+" - #"+o(t.value),1),n("div",{class:"multiselect__tag-remove",onClick:g(O=>m(t),["stop"])},[p(b,{onClick:g(O=>m(t),["stop"])},null,8,["onClick"])],8,M)])]),_:1},8,["options","ajax-search","customLabel","modelValue","placeholder"]),p(y,{type:"gray",size:"medium",onClick:e[1]||(e[1]=t=>r.optionName=[])},{default:i(()=>[d(o(c.strings.clear),1)]),_:1})])}const $=P(w,[["render",z]]);export{$ as C};
