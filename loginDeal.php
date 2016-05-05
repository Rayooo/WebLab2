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

    $connection = mysqli_connect("localhost:8889","root","root","WebLab2");
    $sql = "SELECT * FROM admins WHERE adminName=$userName AND adminPassword=$password AND isUse=1";
    $result = $connection->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION["userName"] = $row["adminName"];
            $_SESSION["password"] = $row["adminPassword"];
            $_SESSION["id"] = $row["id"];
        }
        $url = 'index.php';
        echo "<script language='javascript'>";
        echo "location.href='$url'";
        echo "</script>";
    }
    $result->free();
    $connection->close();

?>