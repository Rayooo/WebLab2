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
$imageURL = "";
//还有个文件
//如果是图片则保存
if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg"))){
    if ($_FILES["image"]["error"] > 0) {
        //跳到错误页面,还没做
        echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
    }
    else {
//        echo "Upload: " . $_FILES["image"]["name"] . "<br />";
//        echo "Type: " . $_FILES["image"]["type"] . "<br />";
//        echo "Size: " . ($_FILES["image"]["size"] / 1024) . " Kb<br />";
//        echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br />";
        //改文件名,新文件名为年月日加五位随机数
        $upfileType = explode(".", $_FILES["image"]["name"]);
        $now = date("YmdHis");
        $randNum = rand(10000,99999);
        $newName = $now.$randNum.".".end($upfileType);
//        echo "newName:".$newName."<br>";

        if (file_exists("upload/" . $newName)) {
            echo $_FILES["image"]["name"] . " already exists. ";
        }
        else {
            $imageURL = "upload/" . $newName;
            move_uploaded_file($_FILES["image"]["tmp_name"],
                $imageURL);
//            echo "Stored in: " . "upload/" .$newName;
        }
    }
}

include "connectDB.php";
$sql = "INSERT INTO students (userName, userPassword, realName, cardNo, business, enterYear, classId, mobile, address, zipcode, image)".
        "VALUES ('$userName','$password','$realName','$cardNo','$business','$enterYear',$classId,'$mobile','$address','$zipcode','$imageURL') ";
if($connection->query($sql)===true){
    $url = 'index.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";
}
else {
    //错误处理
    echo $sql;
}

?>