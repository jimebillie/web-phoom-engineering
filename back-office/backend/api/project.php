<?php
require_once("check_method.php");
require_once("../controller/project.php");
$controller = new project();

if (isset($_POST['api'])) {
    switch ($_POST['api']) {
        case "save_main":
            $controller->save_main($_POST['name_project'], $_POST['year'], $_FILES['img'], $_POST['detail']);
            break;
        case "show_main":
            $controller->show_main();
            break;
        case "getGypsumById":
            $controller->getGypsumById($_POST['id']);
            break;
        case "editGypsumById":
            if (!isset($_FILES['img'])) {
                $_FILES['img'] = null;
            }
            $controller->editGypsumById($_POST['id'], $_POST['name_project'], $_POST['year'], $_FILES['img'], $_POST['detail']);
            break;
        case "saveImgOther":
            $controller->saveImgOther($_POST['id'], $_FILES['img']);
            break;
        case "delImgOther":
            $controller->delImgOther($_POST['id'], $_POST['i']);
            break;
        case "del_main":
            $controller->del_main($_POST['id']);
            break;
        case "get3itemForIndex":
            $controller->get3itemForIndex();
            break;
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => 400, "msg" => "#api->fail"]);
}

