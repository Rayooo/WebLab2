<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 14:37
 */
    session_start();
    $_SESSION["location"] = "deleteInfo";
    
    if(!isset($_SESSION["userName"])){
        $url = 'login.php';
        echo "<script language='javascript'>";
        echo "location.href='$url'";
        echo "</script>";
    }
    $studentId = $_REQUEST["studentId"];
    include "connectDB.php";
    $sql = "UPDATE students SET isUse=0 WHERE students.id=$studentId";
    if($connection->query($sql)===TRUE){
        echo "<script language='javascript'>";
        echo "alert('删除成功');";
        echo "history.go(-1);";
        echo "</script>";
    }


?>

