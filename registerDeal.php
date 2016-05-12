<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 13:56
 */

    include "connectDB.php";
    $userName = $_REQUEST["userName"];
    $password = $_REQUEST["password"];
    
    $sql = "INSERT INTO admins (adminName, adminPassword) VALUES ($userName,$password)";
    if($connection->query($sql) === true){
        $url = 'login.php';
        echo "<script language='javascript'>";
        echo "location.href='$url'";
        echo "</script>";
    }
    else {
        echo $sql;
    }





?>