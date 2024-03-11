<?php
require_once("check_method.php");
require_once("../controller/auth.php");


echo (new auth)->login($_POST['usn'], $_POST['pwd']);
