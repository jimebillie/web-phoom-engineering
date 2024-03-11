<?php
if($_SERVER["REQUEST_METHOD"]!= "POST"){
    http_response_code(404);
    echo "Cannot GET ".$_SERVER["REQUEST_URI"];
    die();
}
