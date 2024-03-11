<?php
require_once("database.php");

class home_about_company
{
    private $db;

    public function __construct()
    {
        $this->db = (new database)->get_connection_db();
    }

    public function saveToDB($data)
    {
        $stmt = $this->db->prepare("UPDATE `home_about_company` SET `data`=? WHERE `id` = 1");
        $stmt->bind_param("s", $data);
        $stmt->execute();
        echo json_encode(["status" => 200, "msg" => "ok"]);
    }

    public function show()
    {
        $stmt = $this->db->prepare("SELECT * FROM `home_about_company` WHERE 1;");
        $stmt->execute();
        $res = $stmt->get_result();
        foreach ($res as $row) {
            echo json_encode(["status" => 200, "data" => $row['data']]);
        }
    }

}
