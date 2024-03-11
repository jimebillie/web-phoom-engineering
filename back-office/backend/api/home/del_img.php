<?php
require_once("../check_method.php");
require_once("../../controller/home_slide_img.php");
(new home_slide_img())->del_img($_POST['id'], $_POST['img_desktop'], $_POST['img_mobile']);