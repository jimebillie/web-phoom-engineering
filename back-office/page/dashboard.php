<?php
session_start();
if (!$_SESSION['auth']) {
    ?>
    <script>window.location.href = "login.php"</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="../environment-jimebillie/bootstrap-5.3.1/css/bootstrap.min.css">
    <!--\.bootstrap-->
    <!--fontawesome-->
    <link rel="stylesheet" href="../environment-jimebillie/fontawesome-6.4.2/css/all.min.css">
    <!--\.fontawesome-->
    <!--dashboard-->
    <link rel="stylesheet" href="../environment-jimebillie/css/dashboard.css?v=<?php echo rand(1000, 9999); ?>">
    <!--\.dashboard-->

    <!--3illie-gallery-plugin-->
    <link rel="stylesheet" href="../environment-jimebillie/env-3illie-gallery-plugin/css/billie-gallery.css">
    <!--.\3illie-gallery-plugin-->

    <!-- include libraries(jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>

<nav class="nav_show">
    <div class="wrap-content">
        <div id="wrap_fa_bars">
            <i class="fa-solid fa-bars ps-2" style="cursor: pointer" onclick="collapse_aside()"></i>
        </div>
        <b class="mb-0 fw-semibold ps-2" id="name_app">Phoom Engineering - Back Office</b>
    </div>
</nav>

<aside class="aside_show">
    <div class="aside_close">
        <i class="fa-solid fa-circle-chevron-left" style="cursor: pointer" onclick="collapse_aside()"></i>
    </div>

    <div class="wrap_profile">
        <div class="wrap_profile_img">
            <img style="cursor: pointer" src="https://cdn-icons-png.flaticon.com/512/206/206899.png"
                 alt="Profile Image" billie-gallery="รูปโปรไฟล์">
        </div>
        <div class="wrap_profile_name">
            <div class="mb-0 status_login">
                <i class="fa-solid fa-circle text-success me-1" style="font-size: xx-small"></i>ออนไลน์
            </div>
            <div class="wrap_name">
                <!--Detail Profile-->
                <div class="mb-0 name"><span class="wrap_i_dropdown"><i
                                class="fa-solid fa-circle-chevron-down me-1"></i></span>
                    <?php echo $_SESSION["uname"] ?>
                </div>
                <div class="wrap_box_detail_profile_name" disP-event="hide">
                    <div class="p-3">
                        <div class="mb-1"><b>สถานะ : </b><span
                                    class="badge border rounded-pill bg-success">ออนไลน์</span></div>
                        <div class="mb-1"><b>ชื่อผู้ใช้ : </b><?php echo $_SESSION["uname"] ?></div>
                        <div class="mb-1"><b>ชื่อ : </b><span><?php echo $_SESSION["uname"] ?></span></div>
                        <div class="mb-2"><b>บทบาท : </b><span>Super Admin</span></div>
                        <div class="mb-1" style="cursor: pointer" onclick="logout()"><span
                                    class="badge bg-secondary p-2 w-100"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ</span>
                        </div>
                    </div>
                </div>
                <!--\.Detail Profile-->
            </div>
        </div>
    </div>
    <!--aside Menu-->
    <div class="wrap_aside_menu">

        <div class="category">
            หมวดหมู่หลัก
        </div>
        <a class="item" href="dashboard.php?p=home">
            <div class="name_menu">หน้าแรก</div>
        </a>
        <a class="item" href="dashboard.php?p=about_us">
            <div class="name_menu">หน้า About Us</div>
        </a>
        <a class="item" href="dashboard.php?p=gypsumplant">
            <div class="name_menu">หน้า Gypsum Plant</div>
        </a>
        <a class="item" href="dashboard.php?p=project">
            <div class="name_menu">หน้า Project</div>
        </a> <a class="item" href="dashboard.php?p=contact">
            <div class="name_menu">หน้า Contact</div>
        </a>

    </div>
    <!--\.aside Menu-->


    <!--copyright-->
    <div class="wrap_aside_copyright">
        &copy; 2024 V1.0.0
    </div>
    <!--\.copyright-->

</aside>

<!--content-->
<div id="wrap-content" class="content_show">
    <div class="area-content">
        <?php
        if ($_GET['p']) {
            switch ($_GET["p"]) {
                case "home":
                    require_once("required/home.php");
                    break;
                case "about_us":
                    require_once("required/about_us.php");
                    break;
                case "gypsumplant":
                    require_once("required/gypsum_plant.php");
                    break;
                case "edit_gypsumplant":
                    require_once("required/edit_gypsum_plant.php");
                    break;
                case "project":
                    require_once("required/project.php");
                    break;
                case "edit_project":
                    require_once("required/edit_project.php");
                    break;
                case "contact":
                    require_once("required/contact.php");
                    break;
                default:
                    require_once("required/home.php");
            }
        } else {
            ?>
            <script>window.location.href = "?p=home"</script>
            <?php
        }

        ?>
    </div>
</div>
<!--\.content-->

<!--bootstrap-->
<script src="../environment-jimebillie/bootstrap-5.3.1/js/bootstrap.bundle.min.js"></script>
<!--\.bootstrap-->
<!--fontawesome-->
<script src="../environment-jimebillie/fontawesome-6.4.2/js/all.min.js"></script>
<!--\.fontawesome-->
<!--dashboard-->
<script src="../environment-jimebillie/javascript/dashboard.js"></script>
<!--\.dashboard-->

<!--3illie-gallery-plugin-->
<script src="../environment-jimebillie/env-3illie-gallery-plugin/javascript/billie-gallery.js"></script>
<!--.\3illie-gallery-plugin-->

<script>
    async function logout() {
        const callAPI = await fetch("../backend/api/logout.php", {method: "post"});
        const res = await callAPI.json();
        if (res.status === 200) {
            window.location.href = 'login.php'
        }
    }

</script>
</body>
</html>