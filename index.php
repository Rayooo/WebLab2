<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/5
 * Time: 17:43
 */
session_start();
$_SESSION["location"] = "index";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/index.css" rel="stylesheet">

</head>
<body>
    <?php  include "navi.php";?>
    <?php
    //    如果没有登陆,跳转
        if(!isset($_SESSION["userName"])){
            $url = 'login.php';
            echo "<script language='javascript'>";
            echo "location.href='$url'";
            echo "</script>";
        }
    ?>

    <?php
        include "connectDB.php";
        $sql = "SELECT * FROM students";
        $result = $connection->query($sql);
        echo "<div class='container'>";
        echo " <table class= 'table table-striped table-bordered table-hover'> ";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["userName"]."</td>";
                echo "<td>".$row["realName"]."</td>";
                echo "<td>".$row["cardNo"]."</td>";
                echo "<td>".$row["business"]."</td>";
                echo "<td>".$row["enterYear"]."</td>";
                echo "<td>".$row["mobile"]."</td>";
                echo "<td>".$row["address"]."</td>";
                echo "<td>".$row["zipcode"]."</td>";
                echo "<td>".$row["image"]."</td>";
                echo "<td>".$row["isUse"]."</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    echo "</div>";
    ?>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>