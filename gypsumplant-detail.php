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
        <div class="title-all">GYPSUM PLANT</div>
        <div class="year-detail"></div>
        <div class="project-detail">
            <p class="t-text">

            </p>


        </div>
        <div class="box-project-list-00">

        </div>
        <div class="bnt-back-01"><a href="gypsumplant.php">BACK</a></div>


    </div>


</div>
<?php include 'inc/footer.php'; ?>
<script>

    async function callGypsum() {
        const formData = new FormData();
        formData.append('api', "getGypsumById");
        formData.append('id', <?=$_GET['id']?>);
        const api = await fetch("back-office/backend/api/gypsumplant.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.length > 0) {
            res.map((v, i) => {
                document.querySelector(".year-detail").textContent = v.name_plant
                document.querySelector(".t-text").innerHTML = v.detail;
                if (v.img_other !== "no") {
                    const x = v.img_other.split(",")
                    x.map((value, index) => {
                        const box_project_list_01 = document.createElement("div");
                        const picture_project_list_01 = document.createElement("div");
                        const img = document.createElement("img");
                        box_project_list_01.classList.add("box-project-list-01");
                        picture_project_list_01.classList.add("picture-project-list-01");
                        img.src = "back-office/upload/" + value;
                        img.setAttribute("width", "425");
                        img.setAttribute("height", "315");
                        document.querySelector(".box-project-list-00").appendChild(box_project_list_01);
                        box_project_list_01.appendChild(picture_project_list_01);
                        picture_project_list_01.appendChild(img);
                    })
                }
            })

        }
    }

    callGypsum();
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