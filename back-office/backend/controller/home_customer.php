<?php
require_once("database.php");

class home_customer
{
    private $db;

    public function __construct()
    {
        $this->db = (new database())->get_connection_db();
    }

    public function save_img($img)
    {
        $fileName = explode(".", $img["name"]);
        $fileNameCount = count($fileName);
        $lastnameFile = $fileName[$fileNameCount - 1];
        $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
        $upload = dirname(__DIR__,2) . "/upload/" . $newName;

        if (move_uploaded_file($img['tmp_name'], $upload)) {
            $stmt = $this->db->prepare("INSERT INTO `home_customer`(`img`) VALUES (?)");
            $stmt->bind_param("s", $newName);
            $stmt->execute();
        }
        echo json_encode(["status" => 200, "msg" => "Save image success"]);
    }

    public function select_all_customer()
    {
        $stmt = $this->db->prepare("SELECT * FROM `home_customer`ORDER BY id DESC;");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        foreach ($res as $row) {
            array_push($data, ["id" => $row['id'], "img" => $row['img']]);
        }
        echo json_encode($data);
    }

    public function del_customer($id, $img)
    {
        if (unlink(dirname(__DIR__,2) . "/upload/" . $img)) {
            $stmt = $this->db->prepare("DELETE FROM `home_customer` WHERE `id`=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["status" => 200, "msg" => "Delete image success"]);
        } else {
            http_response_code(500);
            echo json_encode(["status" => 500, "msg" => "Error"]);
        }
    }

}
