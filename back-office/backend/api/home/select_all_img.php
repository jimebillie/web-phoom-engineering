<?php
require_once("../check_method.php");
require_once("../../controller/home_slide_img.php");
(new home_slide_img())->select_all_img();
