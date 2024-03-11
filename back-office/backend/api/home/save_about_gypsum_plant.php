<?php
require_once("../check_method.php");
require_once("../../controller/home_about_gypsum_plant.php");
(new home_about_gypsum_plant)->saveToDB($_POST['data']);