function collapse_aside() {
    conFix_aside_nav_onDisplay(), switch_hamburger_bar()
}

function switch_hamburger_bar() {
    let e = document.querySelector("nav").classList[0],
        a = document.querySelector("nav > .wrap-content > #wrap_fa_bars").style;
    "nav_show" === e && (a.display = "none"), "nav_hide" === e && (a.display = "flex")
}

function conFix_aside_nav_onDisplay() {
    animate_transition();
    let e = document.querySelector("nav").classList, a = document.querySelector("aside").classList;
    get_display_width() > 768 && ("nav_hide" === e[0] ? (e.remove("nav_hide"), e.add("nav_show"), chg_padLeft_18rem_wrap_content()) : (e.remove("nav_show"), e.add("nav_hide"), chg_padLeft_2rem_wrap_content())), "aside_hide" === a[0] ? (a.remove("aside_hide"), a.add("aside_show")) : (a.remove("aside_show"), a.add("aside_hide"))
}

function on_display(e) {
    animate_transition();
    let a = document.querySelector("nav").classList, t = document.querySelector("aside").classList,
        n = document.querySelector("aside").style,
        i = document.querySelector("nav >.wrap-content> #name_app").classList;
    e > 768 ? (a.remove("nav_hide"), a.add("nav_show"), t.remove("aside_hide"), t.add("aside_show"), chg_padLeft_18rem_wrap_content()) : (n.display = "flex", a.remove("nav_show"), a.add("nav_hide"), t.remove("aside_show"), t.add("aside_hide"), chg_padLeft_2rem_wrap_content()), e < 380 ? n.width = "80%" : n.width = "16rem", e < 450 ? i.add("ellipsis200px") : i.remove("ellipsis200px"), e < 850 ? i.add("ellipsis850px") : i.remove("ellipsis850px")
}

function animate_transition() {
    document.querySelector("nav").style.transition = "0.35s", document.querySelector("aside").style.transition = "0.35s", document.querySelector("#wrap-content").style.transition = "0.35s"
}

function get_display_width() {
    return window.innerWidth
}

function chg_padLeft_18rem_wrap_content() {
    document.querySelector("#wrap-content").style.paddingLeft = "18rem"
}

function chg_padLeft_2rem_wrap_content() {
    document.querySelector("#wrap-content").style.paddingLeft = "2rem"
}

function event_dropdown_box_detail_profile_name() {
    let e = 0,
        a = document.querySelector("aside > .wrap_profile > .wrap_profile_name > .wrap_name > .wrap_box_detail_profile_name"),
        n = document.querySelector("aside > .wrap_profile > .wrap_profile_name > .wrap_name");
    document.addEventListener("click", function () {
        e <= 0
            ? ("show_block" === a.attributes["disP-event"].textContent && (e += 1))
            : (a.setAttribute("disP-event", "hide"), e = 0 , n.style.backgroundColor = "rgba(220, 220, 220, 0.2)")
    })
}

window.addEventListener("resize", function (e) {
    on_display(e.target.innerWidth), switch_hamburger_bar()
}), window.addEventListener("DOMContentLoaded", function () {
    on_display(window.innerWidth), switch_hamburger_bar()
})

setInterval(function (){
    document.querySelector("aside > .wrap_profile > .wrap_profile_name > .wrap_name").addEventListener("click", function () {
        let a = document.querySelector("aside > .wrap_profile > .wrap_profile_name > .wrap_name > .wrap_box_detail_profile_name"),
            b = document.querySelector("aside > .wrap_profile > .wrap_profile_name > .wrap_name");

        a.setAttribute("disP-event", "show_block"), b.style.backgroundColor = "gainsboro"
    })
        ,event_dropdown_box_detail_profile_name();
})

