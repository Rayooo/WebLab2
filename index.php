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
    <title>Index</title>

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

    <div class='container text-center'>
        <table class= 'table table-striped table-bordered table-hover'>
    <?php
        include "connectDB.php";
        $sql = "SELECT *,students.id AS studentId FROM students JOIN classes ON (students.classId = classes.id) WHERE students.isUse=1";
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            echo "<tr>
                    <td>ID</td>
                    <td>姓名</td>
                    <td>身份证号</td>
                    <td>入学年月</td>
                    <td>手机</td>
                    <td>班级</td>
                    <td>操作</td>
                    </tr>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row["studentId"]."</td>";
                $studentId = $row["studentId"];
//                echo "<td>".$row["userName"]."</td>";
                echo "<td>".$row["realName"]."</td>";
                echo "<td>".$row["cardNo"]."</td>";
//                echo "<td>".$row["business"]."</td>";
                echo "<td>".$row["enterYear"]."</td>";
                echo "<td>".$row["mobile"]."</td>";
                echo "<td>".$row["className"]."</td>";
                if($_SESSION["isAdmin"]){
                    echo "<td>
                        <a href='studentInfo.php?studentId=$studentId' class='editButton'><i class='fa fa-info' aria-hidden='true'></i></a>
                        <a href='editInfo.php?studentId=$studentId' class='editButton'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                        <a href='deleteInfoDeal.php?studentId=$studentId' class='editButton'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                      </td>";
                }else{
                    echo "<td>
                        <a href='studentInfo.php?studentId=$studentId' class='editButton'><i class='fa fa-info' aria-hidden='true'></i></a>
                      </td>";
                }
//                echo "<td>".$row["address"]."</td>";
//                echo "<td>".$row["zipcode"]."</td>";
//                echo "<td>".$row["image"]."</td>";
//                echo "<td>".$row["isUse"]."</td>";
                echo "</tr>";
            }
        }
    ?>
       </table>
    </div>



    <?php include "footer.php"?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>