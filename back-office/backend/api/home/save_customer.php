<?php

require_once("../check_method.php");
require_once("../../controller/home_customer.php");
(new home_customer())->save_img($_FILES['img']);