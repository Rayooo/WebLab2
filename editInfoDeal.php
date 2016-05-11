<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 20:06
 */
session_start();
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
    echo'已选择文件';



}else{
    echo'请选择文件';
    $sql = "UPDATE students SET userName='$userName',userPassword='$password',realName='$realName',mobile='$mobile',
          business='$business',cardNo='$business',address='$address',zipcode='$zipcode',enterYear='$enterYear',classId=$classId WHERE students.id=$studentId";
    if($connection->query($sql)===TRUE){
        echo "Update Success<br>";
    }
    else{
        echo "Error".$connection->error."<br>";
        echo $sql;
    }
}

?>