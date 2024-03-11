<?php
session_start();
require_once("database.php");

class auth
{
    private $db;

    public function __construct()
    {
        $this->db = (new database)->get_connection_db();
    }

    public function login($usn, $pwd)
    {
        $stmt = $this->db->prepare("SELECT * FROM `user` WHERE `user`=? and `pwd`=?");
        $stmt->bind_param("ss", $usn, $pwd);
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0;
        foreach ($result as $row) {
            $_SESSION['uname'] = $row["name"];
            $_SESSION['user'] = $row["user"];
            $_SESSION['auth'] = "pass";
            $i += 1;
        }
        if ($i == 0) {
            http_response_code(400);
            return json_encode(["fail" => ["msg" => "ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง"]]);
        } else {
            return json_encode(["success" => ["msg" => "Authentication pass"]]);
        }

    }

    public function logout()
    {
        session_destroy();
        return json_encode(["status" => 200, "msg" => "logout ok"]);
    }


}
