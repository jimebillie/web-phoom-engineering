<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Phoom Engineering and Consultant Limited Partnership</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/header.css" rel="stylesheet" type="text/css"/>
    <link href="css/header-m.css" rel="stylesheet" type="text/css"/>
    <link href="css/header-t.css" rel="stylesheet" type="text/css"/>
    <link href="css/content.css" rel="stylesheet" type="text/css"/>
    <link href="css/content-m.css" rel="stylesheet" type="text/css"/>
    <link href="css/content-t.css" rel="stylesheet" type="text/css"/>
    <link href="css/footer.css" rel="stylesheet" type="text/css"/>
    <link href="css/footer-m.css" rel="stylesheet" type="text/css"/>
    <link href="css/footer-t.css" rel="stylesheet" type="text/css"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>


</head>

<body>
<div class="header">
    <div class="logo"><a href="index.php"><img src="images/logo-phoomengineering.jpg" width="550" height="155"/></a>
    </div>
    <?php include 'inc/box-menu.php'; ?>
    <?php include 'inc/contact-top.php'; ?>
</div>
<div class="content">
    <div class="line-top"></div>
    <div class="box-main">
        <div class="title-all">CONTACT US</div>
        <div class="contact-list-01"><a href="" target="_blank"></a></div>
        <div class="contact-list-02"></div>
        <div class="contact-list-03"></div>
        <div class="box-social-contact">
            <div class="social-contact-00"><a href="" target="_blank"></a></div>
            <div class="social-contact-01"><a href=""
                                              target="_blank"></a></div>
            <div class="social-contact-02"><a href="" target="_blank"></a></div>


        </div>
    </div>


    <div class="google_map">

    </div>


</div>
<?php include 'inc/footer.php'; ?>
<script>

    async function callContact() {
        const formData = new FormData();
        formData.append("api", "show")
        const api = await fetch("back-office/backend/api/contact.php", {method: "post", body: formData});
        const res = await api.json();
        res.map((v, i) => {
            document.querySelector(".contact-list-01 > a").href = "tel:" + v.f1
            document.querySelector(".contact-list-01 > a").innerHTML=v.f1
            document.querySelector(".contact-list-02").innerHTML=v.f2
            document.querySelector(".contact-list-03").innerHTML=v.f3
            document.querySelector(".social-contact-00 > a").href = v.f5
            document.querySelector(".social-contact-00 > a").innerHTML = v.f4
            document.querySelector(".social-contact-01 > a").href = v.f7
            document.querySelector(".social-contact-01 > a").innerHTML = v.f6
            document.querySelector(".social-contact-02 > a").href = v.f9
            document.querySelector(".social-contact-02 > a").innerHTML = v.f8
            setTimeout(()=>{
            document.querySelector(".google_map").innerHTML=v.f10
            },500)
        })
    }

    callContact()

    $(function () {
        var demo1 = $("#demo1").slippry({
            // transition: 'fade',
            // useCSS: true,
            speed: 2000,
            pause: 2000,
            pager: false,
            responsive: true,
            // auto: true,
            // preload: 'visible',
            // autoHover: false
        });

        $('.stop').click(function () {
            demo1.stopAuto();
        });

        $('.start').click(function () {
            demo1.startAuto();
        });

        $('.prev').click(function () {
            demo1.goToPrevSlide();
            return false;
        });
        $('.next').click(function () {
            demo1.goToNextSlide();
            return false;
        });
        $('.reset').click(function () {
            demo1.destroySlider();
            return false;
        });
        $('.reload').click(function () {
            demo1.reloadSlider();
            return false;
        });
        $('.init').click(function () {
            demo1 = $("#demo1").slippry();
            return false;
        });
    });
</script>
<script>
    $(function () {
        var demo2 = $("#demo2").slippry({
            // transition: 'fade',
            // useCSS: true,
            speed: 2000,
            pause: 2000,
            pager: false,
            responsive: true,
            // auto: true,
            // preload: 'visible',
            // autoHover: false
        });

        $('.stop').click(function () {
            demo2.stopAuto();
        });

        $('.start').click(function () {
            demo2.startAuto();
        });

        $('.prev').click(function () {
            demo2.goToPrevSlide();
            return false;
        });
        $('.next').click(function () {
            demo2.goToNextSlide();
            return false;
        });
        $('.reset').click(function () {
            demo2.destroySlider();
            return false;
        });
        $('.reload').click(function () {
            demo2.reloadSlider();
            return false;
        });
        $('.init').click(function () {
            demo2 = $("#demo2").slippry();
            return false;
        });
    });
</script>
<script>
    jQuery(function ($) {
        $('.vmcarousel-centered').vmcarousel({
            centered: true,
            start_item: 2,
            autoplay: true,
            infinite: false
        });

        $('.vmcarousel-centered-infitine').vmcarousel({
            delay: 2000,
            speed: 500,
            autoplay: true,
            items_to_show: 0,
            min_items_to_show: 1,
            items_to_slide: 2,
            dont_cut: true,
            centered: false,
            start_item: 0,
            start_item_centered: false,
            infinite: false,
            changed_slide: $.noop()

        });

        $('.vmcarousel-normal').vmcarousel({
            centered: false,
            start_item: 0,
            autoplay: true,
            infinite: false
        });
    });
</script>
</body>
</html>