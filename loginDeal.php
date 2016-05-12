<?php
    /**
    * Created by PhpStorm.
    * User: Ray
    * Date: 16/5/5
    * Time: 20:14
    */
    //    if(isset($_SESSION["userName"])){
    //        $url = 'index.php';
    //        echo "<script language='javascript'>";
    //        echo "location.href='$url'";
    //        echo "</script>";
    //    }
    session_start();
    $userName = $_REQUEST["userName"];
    $password = $_REQUEST["password"];
    $isAdmin = $_REQUEST["isAdmin"];

    include "connectDB.php";

    if($isAdmin == 1){
        $sql = "SELECT * FROM admins WHERE adminName=$userName AND adminPassword=$password AND isUse=1";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION["userName"] = $row["adminName"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["isAdmin"] = 1;
            }
        }
        else{
            $_SESSION["error"] = "账户名密码错误";
        }
    }
    else{
        $sql = "SELECT * FROM students WHERE userName=$userName AND userPassword=$password AND isUse=1";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["realName"] = $row["realName"];
                $_SESSION["isAdmin"] = 0;
            }
        }
        else{
            $_SESSION["error"] = "账户名密码错误";
        }
    }
    $url = 'index.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";




    $result->free();
    $connection->close();

?>