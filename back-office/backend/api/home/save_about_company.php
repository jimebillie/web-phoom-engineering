<?php
require_once("../check_method.php");
require_once("../../controller/home_about_company.php");
(new home_about_company)->saveToDB($_POST['title'], $_POST["data"], $_POST['gps1'], $_POST['gps2'], $_POST['gps3'], $_POST['gps4'], $_POST['gps5']);