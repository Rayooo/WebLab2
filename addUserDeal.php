<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/8
 * Time: 20:43
 */
$userName = $_REQUEST["userName"];
$password = $_REQUEST["password"];
$realName = $_REQUEST["realName"];
$mobile = $_REQUEST["mobile"];
$business = $_REQUEST["business"];
$cardNo = $_REQUEST["cardNo"];
$address = $_REQUEST["address"];
$zipcode = $_REQUEST["zipcode"];
$enterYear = $_REQUEST["enterYear"];
$classId = $_REQUEST["classId"];
//还有个文件
echo "AAA";
if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg"))){
    echo "aa";
    if ($_FILES["image"]["error"] > 0) {
        echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
    }
    else {
        echo "Upload: " . $_FILES["image"]["name"] . "<br />";
        echo "Type: " . $_FILES["image"]["type"] . "<br />";
        echo "Size: " . ($_FILES["image"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br />";

        if (file_exists("upload/" . $_FILES["image"]["name"])) {
            echo $_FILES["image"]["name"] . " already exists. ";
        }
        else {
            move_uploaded_file($_FILES["image"]["tmp_name"],
                "upload/" . $_FILES["image"]["name"]);
            echo "Stored in: " . "upload/" . $_FILES["image"]["name"];
        }
    }
}

$url = 'index.php';
echo "<script language='javascript'>";
echo "location.href='$url'";
echo "</script>";



?>