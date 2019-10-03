;"use strict";
var mods = ["element", "sidebar", "mockjs", "select", "tabs", "menu", "route", "utils", "component", "kit"];
layui.define(mods, function (e) {
    layui.element;
    var t = layui.utils, a = layui.jquery, n = (layui.lodash, layui.route), i = layui.tabs, l = layui.layer,
        o = layui.menu, m = layui.component, s = layui.kit, p = function () {
            this.config = {elem: "#app", loadType: "SPA"}, this.version = "1.0.0"
        };
    p.prototype.ready = function (e) {
        var i = this.config, o = (0, t.localStorage.getItem)("KITADMIN_SETTING_LOADTYPE");
        null !== o && void 0 !== o.loadType && (i.loadType = o.loadType), s.set({type: i.loadType}).init(), u.routeInit(i), u.menuInit(i), "TABS" === i.loadType && u.tabsInit(), "" === location.hash && t.setUrlState("主页", "#/"), layui.sidebar.render({
            elem: "#ccleft",
            title: "这是左侧打开的栗子",
            shade: !0,
            direction: "left",
            dynamicRender: !0,
            url: "xykwebadmin.php/app",
            width: "50%"
        }), a("#cc").on("click", function () {
            layui.sidebar.render({
                elem: this,
                title: "这是表单盒子",
                shade: !0,
                dynamicRender: !0,
                url: "xykwebadmin.php/formindex",
                width: "50%"
            })
        }), m.on("nav(header_right)", function (e) {
            var t = e.elem.attr("kit-target");
            "setting" === t && layui.sidebar.render({
                elem: e.elem,
                title: "设置",
                shade: !0,
                dynamicRender: !0,
                url: "xykwebadmin.php/setting"
            })
             /*   , "menu" === t && layui.sidebar.render({
                elem: e.elem,
                title: "菜单管理",
                shade: !0,
                url: "menu",
                direction: "left",
                dynamicRender: !0,
                width: "100%"
            })*/
        }), layui.mockjs.inject(APIs), "SPA" === i.loadType && n.render(), "function" == typeof e && e()
    };
    var u = {
        routeInit: function (e) {
            var t = this, a = {
                r: [{
                    path: "/user/index",
                    component: "views/user/index",
                    name: "用户列表",
                    children: [{
                        path: "/user/create",
                        component: "views/user/create",
                        name: "新增用户"
                    }, {path: "/user/edit", component: "views/user/edit", name: "编辑用户"}]
                }],
                routes: [{
                    path: "/xyk/fly",
                    component: "https://fly.layui.com/",
                    name: "Fly",
                    iframe: !0
                }, {path: "/xyk", component: "http://www.layui.com/", name: "Layui", iframe: !0}, {
                    path: "/baidu",
                    component: "https://www.baidu.com/",
                    name: "百度一下",
                    iframe: !0
                }, {path: "/user/index", component: "/views/user/index", name: "用户列表"}, {
                    path: "/user/create",
                    component: "views/user/create",
                    name: "新增用户"
                }, {path: "/user/edit", component: "views/user/edit", name: "编辑用户"}, {
                    path: "/cascader",
                    component: "views/cascader/index",
                    name: "Cascader"}
                , {path: "/", component: "xykwebadmin.php/app", name: "主页"}
                , {path: "/xyk/app", component: "xykwebadmin.php/app", name: "主页"}
                , {path: "/xyk/profile", component: "xykwebadmin.php/profile", name: "用户中心"}
                , {path: "/xyk/grid", component: "xykwebadmin.php/grid", name: "Grid"}
                , {path: "/xyk/button", component: "xykwebadmin.php/button", name: "按钮"}
                , {path: "/xyk/form", component: "xykwebadmin.php/form", name: "表单"}
                , {path: "/xyk/nav", component: "xykwebadmin.php/nav", name: "导航/面包屑"}
                , {path: "/xyk/tab", component: "xykwebadmin.php/tab", name: "选项卡"}
                , {path: "/xyk/progress", component: "xykwebadmin.php/progress", name: "progress"}
                , {path: "/xyk/panel", component: "xykwebadmin.php/panel", name: "panel"}
                , {path: "/xyk/badge", component: "xykwebadmin.php/badge", name: "badge"}
                , {path: "/xyk/timeline", component: "xykwebadmin.php/timeline", name: "timeline"}
                , {path: "/xyk/table_element", component: "xykwebadmin.php/table_element", name: "table-element"}
                , {path: "/xyk/anim", component: "xykwebadmin.php/anim", name: "anim"}
                , {path: "/xyk/auxiliar", component: "xykwebadmin.php/auxiliar", name: "anim"}
                , {path: "/xyk/layer", component: "xykwebadmin.php/layer", name: "layer"}
                , {path: "/xyk/laydate", component: "xykwebadmin.php/laydate", name: "laydate"}
                , {path: "/xyk/table", component: "xykwebadmin.php/table", name: "table"}
                , {path: "/xyk/laypage", component: "xykwebadmin.php/laypage", name: "laypage"}
                , {path: "/xyk/upload", component: "xykwebadmin.php/upload", name: "upload"}
                , {path: "/xyk/carousel", component: "xykwebadmin.php/carousel",}
                , {path: "/xyk/laytpl", component: "xykwebadmin.php/laytpl", name: "laytpl"}
                , {path: "/xyk/flow", component: "xykwebadmin.php/flow", name: "flow"}
                , {path: "/xyk/util", component: "xykwebadmin.php/util", name: "util"}
                , {path: "/xyk/code", component: "xykwebadmin.php/code", name: "code"}
                , {path: "/xyk/select", component: "xykwebadmin.php/select", name: "code"}
                , {path: "/xyk/403", component: "xykwebadmin.php/p403", name: "code"}
                , {path: "/xyk/404", component: "xykwebadmin.php/p404", name: "code"}
                , {path: "/xyk/500", component: "xykwebadmin.php/p500", name: "code"}
                , {path: "/xyk/mockjs", component: "xykwebadmin.php/mockjs", name: "拦截器(Mockjs)"}
                , { path: "/xyk/menu", component: "/xykwebadmin.php/menu", name: "左侧菜单(Menu)"}
                , { path: "/xyk/addmenu", component: "xykwebadmin.php/addmenu", name: "add(Menu)"}
                , { path: "/xyk/umenu", component: "xykwebadmin.php/umenu", name: "前台菜单(umenu)"}
                , { path: "/xyk/addumenu", component: "xykwebadmin.php/addumenu", name: "add(Menu)"}
                , { path: "/xyk/menu", component: "xykwebadmin.php/menu", name: "左侧菜单(Menu)"}
                , {path: "/xyk/route", component: "xykwebadmin.php/route", name: "路由配置(Route)"}
                , { path: "/xyk/tabs", component: "xykwebadmin.php/tabs", name: "选项卡(Tabs)"}
                , {path: "/xyk/utils", component: "xykwebadmin.php/utils", name: "工具包(Utils)"}
                , {path: "/xyk/us", component: "xykwebadmin.php/us", name: "关于我们(us)"}
                , {path: "/xyk/news", component: "xykwebadmin.php/news", name: "news"}
                , {path: "/xyk/addnews", component: "xykwebadmin.php/addnews", name: "addnews"}
                , {path: "/xyk/article", component: "xykwebadmin.php/article", name: "article"}
                , {path: "/xyk/addarticle", component: "xykwebadmin.php/addarticle", name: "addarticle"}
                , {path: "/xyk/goods", component: "xykwebadmin.php/goods", name: "goods"}
                , {path: "/xyk/addgoods", component: "xykwebadmin.php/addgoods", name: "addgoods"}
                , {path: "/xyk/goodscate", component: "xykwebadmin.php/goodscate", name: "goodscate"}
                , {path: "/xyk/addgoodscate", component: "xykwebadmin.php/addgoodscate", name: "addgoodscate"}
                , {path: "/xyk/recruit", component: "xykwebadmin.php/recruit", name: "recruit"}
                , {path: "/xyk/addrecruit", component: "xykwebadmin.php/addrecruit", name: "addrecruit"}
                , {path: "/xyk/friendly", component: "xykwebadmin.php/friendly", name: "friendly"}
                , {path: "/xyk/addfriendly", component: "xykwebadmin.php/addfriendly", name: "addfriendly"}
                , {path: "/xyk/banner", component: "xykwebadmin.php/banner", name: "banner"}
                , {path: "/xyk/addbanner", component: "xykwebadmin.php/addbanner", name: "addbanner"}
                , {path: "/xyk/data_backups", component: "xykwebadmin.php/data_backups", name: "data_backups"}
                , {path: "/xyk/fileManage", component: "xykwebadmin.php/fileManage", name: "fileManage"}
                , {path: "/xyk/addfiles", component: "xykwebadmin.php/addfiles", name: "addfiles"}
                , {path: "/xyk/webset", component: "xykwebadmin.php/webset", name: "webset"}
                ]};
            return "TABS" === e.loadType && (a.onChanged = function () {
                i.existsByPath(location.hash) ? i.switchByPath(location.hash) : t.addTab(location.hash, (new Date).getTime())
            }), n.setRoutes(a), this
        }, addTab: function (e, t) {
            var a = n.getRoute(e);
            a && i.add({id: t, title: a.name, path: e, component: a.component, rendered: !1, icon: "&#xe62e;"})
        }, menuInit: function (e) {
            var t = this;
            return o.set({
                dynamicRender: !1, isJump: "SPA" === e.loadType, onClicked: function (a) {
                    if ("TABS" === e.loadType && !a.hasChild) {
                        var n = a.data, i = n.href, l = n.layid;
                        t.addTab(i, l)
                    }
                }, elem: "#menu-box", remote: {url: "/api/getmenus", method: "post"}, cached: !1
            }).render(), t
        }, tabsInit: function () {
            i.set({
                onChanged: function (e) {
                }
            }).render(function (e) {
                e.isIndex && n.render("#/")
            })
        }
    };

    (new p).ready(function () {
    }), e("admin", {})
});