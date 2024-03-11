<?php
require_once("database.php");

class gypsumplant
{
    public $db;

    public function __construct()
    {
        $this->db = (new database)->get_connection_db();
    }

    function save_main($name_plant, $img, $detail)
    {
        $fileName = explode(".", $img["name"]);
        $fileNameCount = count($fileName);
        $lastnameFile = $fileName[$fileNameCount - 1];
        $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
        $upload = dirname(__DIR__, 2) . "/upload/" . $newName;

        if (move_uploaded_file($img["tmp_name"], $upload)) {
            $stmt = $this->db->prepare("INSERT INTO `gypsumplant`(`name_plant`, `img`, `detail`) VALUES (?,?,?)");
            $stmt->bind_param("sss", $name_plant, $newName, $detail);
            $stmt->execute();
            echo json_encode(["status" => 200, "msg" => "ok"]);
        }


    }

    function show_main()
    {
        $stmt = $this->db->prepare("SELECT `id`, `name_plant`, `img`, `detail` FROM `gypsumplant` ORDER BY id desc ");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        foreach ($res as $row) {
            array_push($data, ["id" => $row['id'], "name_plant" => $row['name_plant'], "img" => $row['img'], "detail" => $row['detail']]);
        }
        echo json_encode($data);

    }

    function getGypsumById($id, $wantRes = "json")
    {
        $stmt = $this->db->prepare("SELECT * FROM `gypsumplant` where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = [];
        foreach ($res as $row) {
            array_push($data, ["id" => $row['id'], "name_plant" => $row['name_plant'], "img" => $row['img'], "detail" => $row['detail'], "img_other" => $row["img_other"]]);
        }
        if ($wantRes == "json") {
            echo json_encode($data);
        }
        if ($wantRes == "array") {
            return $data;
        }

    }

    function editGypsumById($id, $name_plant, $img, $detail)
    {
        $sl = $this->getGypsumById($id, "array");
        if (count($sl) > 0) {
            if ($img === null) {
                $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `name_plant`=?,`detail`=? WHERE `id`=?");
                $stmt->bind_param("ssi", $name_plant, $detail, $id);
                $stmt->execute();
                echo json_encode(["status" => 200, "msg" => "ok"]);
            } else {
                foreach ($sl as $row) {
                    $pathOldFile = dirname(__DIR__, 2) . "/upload/" . $row['img'];
                    if (file_exists($pathOldFile)) {
                        if (unlink($pathOldFile)) {
                            $fileName = explode(".", $img["name"]);
                            $fileNameCount = count($fileName);
                            $lastnameFile = $fileName[$fileNameCount - 1];
                            $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
                            $upload = dirname(__DIR__, 2) . "/upload/" . $newName;

                            if (move_uploaded_file($img["tmp_name"], $upload)) {
                                $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `name_plant`=?,`img`=?,`detail`=? WHERE `id`=?");
                                $stmt->bind_param("sssi", $name_plant, $newName, $detail, $id);
                                $stmt->execute();
                                echo json_encode(["status" => 200, "msg" => "ok"]);
                            }
                        }
                    } else {
                        $fileName = explode(".", $img["name"]);
                        $fileNameCount = count($fileName);
                        $lastnameFile = $fileName[$fileNameCount - 1];
                        $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
                        $upload = dirname(__DIR__, 2) . "/upload/" . $newName;

                        if (move_uploaded_file($img["tmp_name"], $upload)) {
                            $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `name_plant`=?,`img`=?,`detail`=? WHERE `id`=?");
                            $stmt->bind_param("sssi", $name_plant, $newName, $detail, $id);
                            $stmt->execute();
                            echo json_encode(["status" => 200, "msg" => "ok"]);
                        }

                    }

                }

            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => 400, "msg" => "Fail : #gypsumplant->editGypsumById"]);
        }

    }

    function saveImgOther($id, $img)
    {
        $sl = $this->getGypsumById($id, "array");
        if (count($sl) > 0) {
            foreach ($sl as $r) {
                if ($r["img_other"] == "no") {
                    $fileName = explode(".", $img["name"]);
                    $fileNameCount = count($fileName);
                    $lastnameFile = $fileName[$fileNameCount - 1];
                    $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
                    $upload = dirname(__DIR__, 2) . "/upload/" . $newName;

                    if (move_uploaded_file($img["tmp_name"], $upload)) {
                        $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                        $stmt->bind_param("si", $newName, $id);
                        $stmt->execute();
                        echo json_encode(["status" => 200, "msg" => "ok"]);
                    }
                } else {
                    $fileName = explode(".", $img["name"]);
                    $fileNameCount = count($fileName);
                    $lastnameFile = $fileName[$fileNameCount - 1];
                    $newName = date("YmdHis") . rand(10000, 99999) . "." . $lastnameFile;
                    $upload = dirname(__DIR__, 2) . "/upload/" . $newName;
                    $saveDatabase = $newName . "," . $r["img_other"];

                    if (move_uploaded_file($img["tmp_name"], $upload)) {
                        $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                        $stmt->bind_param("si", $saveDatabase, $id);
                        $stmt->execute();
                        echo json_encode(["status" => 200, "msg" => "ok"]);
                    }
                }
            }
        }
    }

    function delImgOther($id, $i)
    {
        $sl = $this->getGypsumById($id, "array");
        if (count($sl) > 0) {
            foreach ($sl as $r) {
                if ($r["img_other"] == "no") {
                    // No event
                } else {
                    $x = explode(",", $r["img_other"]);
                    if (file_exists(dirname(__DIR__, 2) . "/upload/" . $x[$i])) {
                        if (unlink(dirname(__DIR__, 2) . "/upload/" . $x[$i])) {
                            unset($x[$i]);
                            if (count($x) == 0) {
                                $saveDatabase = "no";
                                $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                                $stmt->bind_param("si", $saveDatabase, $id);
                                $stmt->execute();
                                echo json_encode(["status" => 200, "msg" => "ok"]);
                            } else {
                                $saveDatabase = implode(",", $x);
                                $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                                $stmt->bind_param("si", $saveDatabase, $id);
                                $stmt->execute();
                                echo json_encode(["status" => 200, "msg" => "ok"]);
                            }
                        }
                    } else {
                        unset($x[$i]);
                        if (count($x) == 0) {
                            $saveDatabase = "no";
                            $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                            $stmt->bind_param("si", $saveDatabase, $id);
                            $stmt->execute();
                            echo json_encode(["status" => 200, "msg" => "ok"]);
                        } else {
                            $saveDatabase = implode(",", $x);
                            $stmt = $this->db->prepare("UPDATE `gypsumplant` SET `img_other`=? WHERE `id`=?");
                            $stmt->bind_param("si", $saveDatabase, $id);
                            $stmt->execute();
                            echo json_encode(["status" => 200, "msg" => "ok"]);
                        }
                    }

                }
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => 400, "msg" => "Fail"]);
        }
    }

    function del_main($id)
    {
        $sl = $this->getGypsumById($id, "array");
        if (count($sl) > 0) {
            foreach ($sl as $r) {
                if (file_exists(dirname(__DIR__, 2) . "/upload/" . $r["img"])) {
                    unlink(dirname(__DIR__, 2) . "/upload/" . $r["img"]);
                }
                if ($r["img_other"] != "no"){
                    $img_other = explode(",", $r["img_other"]);
                    foreach ($img_other as $r2) {
                        if (file_exists(dirname(__DIR__, 2) . "/upload/" . $r2)) {
                            unlink(dirname(__DIR__, 2) . "/upload/" . $r2);
                        }
                    }
                }
            }
            $stmt = $this->db->prepare("DELETE FROM `gypsumplant` WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["status" => 200, "msg" => "ok"]);
        } else {
            http_response_code(400);
            echo json_encode(["status" => 400, "msg" => "Fail"]);
        }
    }
}
