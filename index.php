<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/5
 * Time: 17:43
 */
session_start();
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
        if(!isset($_SESSION["userName"])){
            $url = 'login.php';
            echo "<script language='javascript'>";
            echo "location.href='$url'";
            echo "</script>";
        }


    ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>