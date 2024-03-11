<?php

require_once("../check_method.php");
require_once("../../controller/home_customer.php");
(new home_customer())->select_all_customer();