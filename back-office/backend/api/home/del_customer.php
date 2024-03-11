<?php

require_once("../check_method.php");
require_once("../../controller/home_customer.php");
(new home_customer())->del_customer($_POST['id'], $_POST['img']);