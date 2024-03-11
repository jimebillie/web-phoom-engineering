<?php
require_once("../check_method.php");
require_once("../../controller/home_slide_img.php");
(new home_slide_img())->save_img($_FILES['img_desktop'],  $_FILES['img_mobile']);