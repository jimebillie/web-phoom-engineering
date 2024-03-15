<?php
require_once("database.php");

class home_about_company
{
    private $db;

    public function __construct()
    {
        $this->db = (new database)->get_connection_db();
    }

    public function saveToDB($title, $data, $gps1, $gps2, $gps3, $gps4, $gps5)
    {
        $stmt = $this->db->prepare("UPDATE `home_about_company` SET `title`=?,`data`=?,`gps1`=?,`gps2`=?,`gps3`=?,`gps4`=?,`gps5`=? WHERE `id` = 1");
        $stmt->bind_param("sssssss", $title, $data, $gps1, $gps2, $gps3, $gps4, $gps5);
        $stmt->execute();
        echo json_encode(["status" => 200, "msg" => "ok"]);
    }

    public function show()
    {
        $stmt = $this->db->prepare("SELECT * FROM `home_about_company` WHERE 1;");
        $stmt->execute();
        $res = $stmt->get_result();
        foreach ($res as $row) {
            echo json_encode(["status" => 200, "title" => $row['title'], "data" => $row['data'], "gps1" => $row['gps1'], "gps2" => $row['gps2'], "gps3" => $row['gps3'], "gps4" => $row['gps4'], "gps5" => $row['gps5']]);
        }
    }

}
