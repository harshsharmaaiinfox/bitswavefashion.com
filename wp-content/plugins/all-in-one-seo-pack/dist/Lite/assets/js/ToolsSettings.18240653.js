import{b as l,u as r,m as u}from"./index.5a710757.js";import{a as _}from"./addons.ef42f038.js";import{a as p}from"./allowed.b971be4c.js";import"./translations.12335a6a.js";import{f as d}from"./runtime-dom.esm-bundler.6789c400.js";import{_ as s}from"./default-i18n.54b5d8cd.js";const e="all-in-one-seo-pack",A=()=>{const i=d(()=>{const a=[{value:"webmasterTools",label:s("Webmaster Tools",e),access:"aioseo_general_settings"},{value:"rssContent",label:s("RSS Content",e),access:"aioseo_general_settings"},{value:"advanced",label:s("Advanced",e),access:"aioseo_general_settings"},{value:"searchAppearance",label:s("Search Appearance",e),access:"aioseo_search_appearance_settings"},{value:"social",label:s("Social Networks",e),access:"aioseo_social_networks_settings"},{value:"sitemap",label:s("Sitemaps",e),access:"aioseo_sitemap_settings"},{value:"robots",label:s("Robots.txt",e),access:"aioseo_tools_settings"},{value:"breadcrumbs",label:s("Breadcrumbs",e),access:"aioseo_general_settings"}];l().internalOptions.internal.deprecatedOptions.includes("badBotBlocker")&&a.push({value:"blocker",label:s("Bad Bot Blocker",e),access:"aioseo_tools_settings"}),r().isPro&&a.push({value:"accessControl",label:s("Access Control",e),access:"aioseo_admin"});const t=u();return!t.isUnlicensed&&o("aioseo-image-seo")&&a.push({value:"image",label:s("Image SEO",e),access:"aioseo_search_appearance_settings"}),!t.isUnlicensed&&o("aioseo-local-business")&&a.push({value:"localBusiness",label:s("Local Business SEO",e),access:"aioseo_local_seo_settings"}),!t.isUnlicensed&&o("aioseo-redirects")&&a.push({value:"redirects",label:s("Redirects",e),access:"aioseo_redirects_settings"}),!t.isUnlicensed&&o("aioseo-link-assistant")&&a.push({value:"linkAssistant",label:s("Link Assistant",e),access:"aioseo_link_assistant_settings"}),!t.isUnlicensed&&o("aioseo-eeat")&&a.push({value:"eeat",label:s("Author SEO (E-E-A-T)",e),access:"aioseo_search_appearance_settings"}),a.filter(c=>p(c.access))}),o=a=>{const n=_.getAddon(a);return n&&n.isActive&&!n.requiresUpgrade};return{toolsSettings:i}};export{A as u};
