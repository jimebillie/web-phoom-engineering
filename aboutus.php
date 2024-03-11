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
        <div class="title-all">ABOUT US</div>
        <div class="name-about">
            <div class="title-about">PHOOM ENGINEERING</div>
            <div class="year-about">Establish 1 October 2003
            </div>

        </div>
        <div class="picture-about"><img src="images/picture-about.jpg" width="715" height="540"/></div>
        <div class="box-about-right">
            <div class="box-highlights-list">
                <div class="text-highlights-list" id="edt_aboutus" style="min-height: 70vh">

                </div>

            </div>
        </div>


    </div>
    <?php include 'inc/footer.php'; ?>
    <script>

        async function showAboutUs() {
            const api = await fetch("back-office/backend/api/show_aboutus.php", {method: "post"});
            const res = await api.json();
            if (res.status === 200) {
                document.getElementById("edt_aboutus").innerHTML = res.data;
            }
        }

        showAboutUs();

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