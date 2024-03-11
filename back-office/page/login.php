<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>login</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="../environment-jimebillie/bootstrap-5.3.1/css/bootstrap.min.css">
    <!--\.bootstrap-->
    <!--fontawesome-->
    <link rel="stylesheet" href="../environment-jimebillie/fontawesome-6.4.2/css/all.min.css">
    <!--\.fontawesome-->
    <!--Login css-->
    <link rel="stylesheet" href="../environment-jimebillie/css/login.css?v=<?php echo rand(1000,9999);?>">
    <!--\.Login css-->
</head>
<body>
<div class="login-bg-fixed">
    <div class="wrap-image-cover-pc d-none d-md-inline-block col-md-8">
        <div id="wrap-tag-image1"></div>
    </div>
    <div class="wrap-panel-login col-12 col-md-4">
        <div id="wrap-tag-image2" class="d-block d-md-none"></div>
        <div class="wrap-content-login">
            <div class="content-login-center">
                <form method="post">

                    <h1><i class="fa-solid fa-unlock-keyhole" style="color: goldenrod"></i> ระบบล็อกอิน</h1>
                    <h5 class="text-secondary">Phoom Engineering - Back Office</h5>

                    <hr>
                    <div class="form-floating mb-2">
                        <input class="form-control border border-secondary" type="text" id="username"
                               placeholder="Username">
                        <label for="username"><i class="fa-solid fa-user"></i> ชื่อผู้ใช้ : </label>
                    </div>
                    <div class="form-floating" id="wrap-password">
                        <input class="form-control  border border-secondary" type="password" id="password"
                               placeholder="Password">
                        <label for="password"><i class="fa-solid fa-star-of-life"></i> รหัสผ่าน : </label>
                        <div class="wrap-eye-password">
                            <i class="text-secondary fa-solid fa-eye" onclick="open_pass(this)"></i>
                            <i class="text-secondary fa-solid fa-eye-slash d-none" onclick="close_pass(this)"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-secondary w-100 border border-secondary border-2 fw-bold p-2"
                                type="submit">เข้าสู่ระบบ
                        </button>
                    </div>
                    <hr>
                    <small>&copy 2024 V1.0.0</small>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    .wrapLoad {
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
        justify-content: center;
        align-items: center;
    }

    .wrapLoad:before {
        content: "Loading...";
        font-size: 25px;
        font-weight: bold;
        color: white;
    }
</style>
<div class="wrapLoad"></div>

<!--bootstrap-->
<script src="../environment-jimebillie/bootstrap-5.3.1/js/bootstrap.bundle.min.js"></script>
<!--\.bootstrap-->
<!--fontawesome-->
<script src="../environment-jimebillie/fontawesome-6.4.2/js/all.min.js"></script>
<!--\.fontawesome-->
<script src="../environment-jimebillie/javascript/login.js"></script>
<!-- Change BG -->
<script>
    const set_image_login_page = new change_cover_image("../environment-jimebillie/image-login/cover.jpg")
</script>
<!-- .\Change BG -->
<script>
    document.querySelector("form").addEventListener("submit", (e) => {
        e.preventDefault();
        const usn = document.getElementById("username").value
        const pwd = document.getElementById("password").value
        auth(usn, pwd);
    });

    async function auth(usn, pwd) {
        document.querySelectorAll(".wrapLoad")[0].style.display = "flex";
        const formData = new FormData;
        formData.append("usn", usn);
        formData.append("pwd", pwd);
        const callAPI = await fetch("../backend/api/auth.php", {
            method: 'post',
            body: formData
        });
        const res = await callAPI.json();
        if (callAPI.status !== 200) {
            alert(res.fail.msg)
            setTimeout(() => {
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }, 500);
        } else {
            setTimeout(() => {
                document.querySelectorAll(".wrapLoad")[0].style.display = "none";
            }, 500);
            setTimeout(() => {
                window.location.href = "dashboard.php"
            }, 500);
        }

    }
</script>
</body>
</html>