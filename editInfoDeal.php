<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 20:06
 */
session_start();
//    如果没有登陆,跳转
if(!isset($_SESSION["userName"]) || !$_SESSION["isAdmin"]){
    $url = 'login.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";
}

$studentId = $_REQUEST["studentId"];
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
include "connectDB.php";

//根据是否上传文件选择不同的sql
if(!empty($_FILES['image']['tmp_name'])){
    if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg"))){
        if ($_FILES["image"]["error"] > 0) {
            //跳到错误页面,还没做
            echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
        }
        else {
            //改文件名,新文件名为年月日加五位随机数
            $upfileType = explode(".", $_FILES["image"]["name"]);
            $now = date("YmdHis");
            $randNum = rand(10000,99999);
            $newName = $now.$randNum.".".end($upfileType);

            if (file_exists("upload/" . $newName)) {
                echo $_FILES["image"]["name"] . " already exists. ";
            }
            else {
                $imageURL = "upload/" . $newName;
                move_uploaded_file($_FILES["image"]["tmp_name"],
                    $imageURL);

                $sql = "UPDATE students SET userName='$userName',userPassword='$password',realName='$realName',mobile='$mobile',
                        business='$business',cardNo='$business',address='$address',zipcode='$zipcode',enterYear='$enterYear',classId=$classId,image='$imageURL' WHERE students.id=$studentId";
                if($connection->query($sql)===TRUE){
                    $url = 'editInfo.php?studentId='.$studentId;
                    echo "<script language='javascript'>";
                    echo "alert('更新成功');";
                    echo "location.href='$url'";
                    echo "</script>";
                }
                else{
                    echo "Error".$connection->error."<br>";
                    echo $sql;
                }

            }
        }
    }
    else{
        echo "error";
    }

}else{
    $sql = "UPDATE students SET userName='$userName',userPassword='$password',realName='$realName',mobile='$mobile',
          business='$business',cardNo='$business',address='$address',zipcode='$zipcode',enterYear='$enterYear',classId=$classId WHERE students.id=$studentId";
    if($connection->query($sql)===TRUE){
        $url = 'editInfo.php?studentId='.$studentId;
        echo "<script language='javascript'>";
        echo "alert('更新成功');";
        echo "location.href='$url'";
        echo "</script>";
    }
    else{
        echo "Error".$connection->error."<br>";
        echo $sql;
    }
}




?>