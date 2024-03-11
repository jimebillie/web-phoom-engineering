<?php
require_once("database.php");

class home_slide_img
{
    private $db;

    public function __construct()
    {
        $this->db = (new database())->get_connection_db();
    }

    public function save_img($img_desktop, $img_mobile)
    {
        /**
         * Desktop
         */
        $fileNameDesktop = explode(".", $img_desktop["name"]);
        $fileNameDesktopCount = count($fileNameDesktop);
        $lastnameDesktopFile = $fileNameDesktop[$fileNameDesktopCount - 1];
        $newNameDesktop = date("YmdHis") . rand(10000, 99999) . "." . $lastnameDesktopFile;
        $uploadDesktop = dirname(__DIR__, 2) . "/upload/" . $newNameDesktop;
        /**
         * Mobile
         */
        $fileNameMobile = explode(".", $img_mobile["name"]);
        $fileNameMobileCount = count($fileNameMobile);
        $lastnameMobileFile = $fileNameMobile[$fileNameMobileCount - 1];
        $newNameMobile = date("YmdHis") . rand(10000, 99999) . "." . $lastnameMobileFile;
        $uploadMobile = dirname(__DIR__, 2) . "/upload/" . $newNameMobile;


        if (move_uploaded_file($img_desktop['tmp_name'], $uploadDesktop) && move_uploaded_file($img_mobile['tmp_name'], $uploadMobile)) {
            $stmt = $this->db->prepare("INSERT INTO `home_slide_img`(`img_desktop`, `img_mobile`) VALUES (?,?)");
            $stmt->bind_param("ss", $newNameDesktop, $newNameMobile);
            $stmt->execute();
        }
        echo json_encode(["status" => 200, "msg" => "Save image success"]);
    }

    public function select_all_img()
    {
        $stmt = $this->db->prepare("SELECT * FROM `home_slide_img`ORDER BY id DESC;");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        foreach ($res as $row) {
            array_push($data, ["id" => $row['id'], "img_desktop" => $row['img_desktop'], "img_mobile" => $row['img_mobile']]);
        }
        echo json_encode($data);
    }

    public function del_img($id, $img_desktop, $img_mobile)
    {
        if (unlink(dirname(__DIR__, 2) . "/upload/" . $img_desktop) && unlink(dirname(dirname(__DIR__)) . "/upload/" . $img_mobile)) {
            $stmt = $this->db->prepare("DELETE FROM `home_slide_img` WHERE `id`=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["status" => 200, "msg" => "Delete image success"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => 500, "msg" => "Error"]);
        }
    }

}
