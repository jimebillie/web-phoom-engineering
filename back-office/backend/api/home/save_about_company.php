<?php
require_once("../check_method.php");
require_once("../../controller/home_about_company.php");
(new home_about_company)->saveToDB($_POST["data"]);