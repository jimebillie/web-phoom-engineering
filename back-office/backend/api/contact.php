<?php
require_once("check_method.php");
require_once("../controller/database.php");
$controller = new contact();

switch ($_POST['api']) {
    case "save":
        $controller->save($_POST['f1'], $_POST['f2'], $_POST['f3'], $_POST['f4'], $_POST['f5'], $_POST['f6'], $_POST['f7'], $_POST['f8'], $_POST['f9'], $_POST['f10']);
        break;
    case "show":
        $controller->show();
        break;
}


class contact
{
    public $db;

    public function __construct()
    {
        $this->db = (new database())->get_connection_db();
    }

    function save($f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8, $f9, $f10)
    {
        $stmt = $this->db->prepare("UPDATE `contact` SET `tel`=?,`mail`=?,`address`=?,`wa_txt`=?,`wa_link`=?,`fb_txt`=?,`fb_link`=?,`line_txt`=?,`line_link`=?,`map`=? WHERE `id` = 1");
        $stmt->bind_param("ssssssssss", $f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8, $f9, $f10);
        $stmt->execute();
        echo json_encode(["status" => 200, "msg" => "ok"]);
    }

    function show()
    {
        $stmt = $this->db->prepare("SELECT * FROM `contact` WHERE `id` = 1");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        foreach ($res as $r) {
            array_push($data, ["f1" => $r['tel'], "f2" => $r['mail'], "f3" => $r['address'], "f4" => $r['wa_txt'], "f5" => $r['wa_link'], "f6" => $r['fb_txt'], "f7" => $r['fb_link'], "f8" => $r['line_txt'], "f9" => $r['line_link'], "f10" => $r['map']]);
        }
        echo json_encode($data);
    }

}

