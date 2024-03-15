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

    <script src="js/jquery.min.js"></script>
    <script src="js/slippry.min.js"></script>
    <link href="css/demo.css" rel="stylesheet" type="text/css">
    <link href="css/slippry.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/jquery.vm-carousel.css">
    <script src="js/jquery.vm-carousel.js"></script>
    <script src="js/modernizr.js"></script>
</head>

<body>
<div class="header">
    <div class="logo"><a href="index.php"><img src="images/logo-phoomengineering.jpg" width="550" height="155"/></a>
    </div>
    <?php include 'inc/box-menu.php'; ?>
    <?php include 'inc/contact-top.php'; ?>
    <div class="banner">
        <section id="slippry-slider" class="full-width">
            <article class="demo_block">
                <ul id="demo1">
                </ul>
            </article>
        </section>
    </div>
    <div class="banner-m">
        <section id="slippry-slider" class="full-width">
            <article class="demo_block">
                <ul id="demo2">
                </ul>
            </article>
        </section>
    </div>
</div>
<div class="content">
    <div class="box-main">
        <div class="box-about-home">
            <div class="box-about-home-left">
                <div class="title-about-home">ABOUT OUR
                    COMPANY
                </div>
                <div class="year-about-home" id="api_title_abu">
                </div>
                <div class="text-about-home">We are specialist in electrical and automation.<br/>
                </div>
                <div class="bnt-more-01"><a href="aboutus.php">READ MORE</a></div>
            </div>
            <div class="box-about-home-center">
                <div class="picture-about-home"><img src="images/picture-about-home.jpg" width="450" height="415"/>
                </div>

            </div>
            <div class="box-about-home-right">
                <div class="title-highlights">Gypsum plant specialist.
                </div>
                <div class="text-highlights-01" id="gps1">
                </div>
                <div class="text-highlights-01" id="gps2">
                </div>
                <div class="text-highlights-01" id="gps3">
                </div>
                <div class="text-highlights-01" id="gps4">
                </div>
                <div class="text-highlights-01" id="gps5">

                </div>

            </div>


        </div>

    </div>

    <div class="box-logo-customer">

        <div class="box-main">

            <ul class="vmcarousel-centered-infitine">
            </ul>
        </div>


    </div>
    <div class="box-plant-home">
        <div class="box-main">
            <div class="title-project">GYPSUM PLANT</div>
            <div class="sub-project" id="edt_gypsum">
            </div>
            <div class="box-project-list-00">

            </div>
            <div class="bnt-more-02"><a href="gypsumplant.php">READ MORE</a></div>
        </div>


    </div>
    <div class="box-project-home">
        <div class="box-main">
            <div class="title-project">PROJECT</div>
            <div class="sub-project" id="edt_project" style="margin-bottom: 10px">
            </div>
            <div class="box-project-list-00"  id="api_project">

            </div>
            <div class="bnt-more-02"><a href="project.php">READ MORE</a></div>
        </div>


    </div>


</div>
<?php include 'inc/footer.php'; ?>
<script type="application/javascript">

    async function callApiShowAboutHomeGypsumPlant() {
        const api = await fetch("back-office/backend/api/home/show_about_gypsum_plant.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            document.getElementById("edt_gypsum").innerHTML = res.data;
        }
    }
    callApiShowAboutHomeGypsumPlant();

    async function callApiShowGypsumPlant3item() {
        const formData = new FormData();
        formData.append("api", "get3itemForIndex");
        const api = await fetch("back-office/backend/api/gypsumplant.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.length > 0) {
            res.map((v, i) => {
                const box_project_list_01 = document.createElement("div");
                const picture_project_list_01 = document.createElement("div");
                const name_project_list_02 = document.createElement("div");
                const aT = document.createElement("a");
                const aB = document.createElement("a");
                const img = document.createElement("img");
                box_project_list_01.classList.add("box-project-list-01");
                picture_project_list_01.classList.add("picture-project-list-01");
                aT.href = "gypsumplant-detail.php?id=" + v.id;
                img.src = "back-office/upload/" + v.img;
                img.setAttribute("width", "425");
                img.setAttribute("height", "315");
                name_project_list_02.classList.add("name-project-list-02");
                aB.href = "gypsumplant-detail.php?id=" + v.id;
                aB.textContent = v.name_plant
                document.querySelector(".box-project-list-00").appendChild(box_project_list_01);
                box_project_list_01.appendChild(picture_project_list_01);
                picture_project_list_01.appendChild(aT);
                aT.appendChild(img);
                box_project_list_01.appendChild(name_project_list_02);
                name_project_list_02.appendChild(aB);
            })
        }
    }

    callApiShowGypsumPlant3item();

    async function callApiShowProject3item() {
        const formData = new FormData();
        formData.append("api", "get3itemForIndex");
        const api = await fetch("back-office/backend/api/project.php", {method: "post", body: formData});
        const res = await api.json();
        if (res.length > 0) {
            res.map((v, i) => {
                const box_project_list_01 = document.createElement("div");
                const picture_project_list_01 = document.createElement("div");
                const name_project_list_01 = document.createElement("div");
                const year_project_list_01 = document.createElement("div");
                const aT = document.createElement("a");
                const aB = document.createElement("a");
                const img = document.createElement("img");
                box_project_list_01.classList.add("box-project-list-01");
                picture_project_list_01.classList.add("picture-project-list-01");
                aT.href = "project-detail.php?id=" + v.id;
                img.src = "back-office/upload/" + v.img;
                img.setAttribute("width", "425");
                img.setAttribute("height", "315");
                name_project_list_01.classList.add("name-project-list-01");
                name_project_list_01.textContent = v.name_project;
                aB.href = "project-detail.php?id=" + v.id;
                aB.textContent = v.year;
                year_project_list_01.classList.add("year-project-list-01");
                document.getElementById("api_project").appendChild(box_project_list_01);
                box_project_list_01.appendChild(picture_project_list_01);
                picture_project_list_01.appendChild(aT);
                aT.appendChild(img);
                box_project_list_01.appendChild(name_project_list_01);
                box_project_list_01.appendChild(year_project_list_01);
                name_project_list_01.appendChild(aB);
                year_project_list_01.appendChild(aB);
            })
        }
    }

    callApiShowProject3item();


    async function callApiShowAboutHomeProject() {
        const api = await fetch("back-office/backend/api/home/show_about_project.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            document.getElementById("edt_project").innerHTML = res.data;
        }
    }

    callApiShowAboutHomeProject();


    async function callPicBanner() {
        const api = await fetch("back-office/backend/api/home/select_all_img.php", {
            method: "post"
        });
        const res = await api.json();
        if (res.length > 0) {
            res.map((v, i) => {
                /**
                 * Desktop
                 */
                const liDesktop = document.createElement("li");
                const imgDesktop = document.createElement("img");
                imgDesktop.src = "back-office/upload/" + v.img_desktop;
                liDesktop.appendChild(imgDesktop);
                /**
                 * Mobile
                 */
                const liMobile = document.createElement("li");
                const imgMobile = document.createElement("img");
                imgMobile.src = "back-office/upload/" + v.img_mobile;
                liMobile.appendChild(imgMobile);
                /**
                 * Append child
                 */
                document.getElementById("demo1").appendChild(liDesktop);
                document.getElementById("demo2").appendChild(liMobile);
            });
            callSlideDesktop();
            callSlideMobile();
        }
    }

    callPicBanner();

    async function callTextAboutHome() {
        const api = await fetch("back-office/backend/api/home/show_about_company.php", {method: "post"});
        const res = await api.json();
        if (res.status === 200) {
            document.querySelector("#api_title_abu").textContent = res.title;
            document.querySelector(".text-about-home").innerHTML = res.data;
            document.querySelector("#gps1").textContent = res.gps1;
            document.querySelector("#gps2").textContent = res.gps2;
            document.querySelector("#gps3").textContent = res.gps3;
            document.querySelector("#gps4").textContent = res.gps4;
            document.querySelector("#gps5").textContent = res.gps5;
        }
    }

    callTextAboutHome();

    async function callSlideCustomer() {
        const api = await fetch("back-office/backend/api/home/select_all_customer.php", {
            method: "post"
        });
        const res = await api.json();
        if (res.length > 0) {
            res.forEach((v) => {
                const li = document.createElement("li");
                const img = document.createElement("img");
                img.src = "back-office/upload/" + v.img;
                img.setAttribute("width", "260")
                li.appendChild(img);
                document.querySelector(".vmcarousel-centered-infitine").appendChild(li);
            })
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

        }
    }

    callSlideCustomer();


</script>
<script>
    function callSlideDesktop() {
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
    }

</script>
<script>
    function callSlideMobile() {
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
    }
</script>
<script>
    function xxx() {

    }

    xxx();
</script>
</body>
</html>