<?php
require_once("../check_method.php");
require_once("../../controller/home_about_project.php");
(new home_about_project)->saveToDB($_POST['data']);