<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 14:31
 */
session_start();
$_SESSION["breadDetail"] = "detailInfo";
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

    <link href="css/studentInfo.css" rel="stylesheet">
</head>
<body>
<?php include "navi.php"?>


<?php
    //    如果没有登陆,跳转
    if(!isset($_SESSION["userName"]) && !isset($_REQUEST["studentId"])){
        $url = 'index.php';
        echo "<script language='javascript'>";
        echo "location.href='$url'";
        echo "</script>";
    }
    else {
        $studentId = $_REQUEST["studentId"];
        include "connectDB.php";

        $sql = "SELECT *,students.id AS studentId FROM students JOIN classes ON (students.classId = classes.id) WHERE students.id=$studentId AND students.isUse=1";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <p>用户名:<?php echo $row["userName"] ?></p>
                        <p>真实姓名:<?php echo $row["realName"] ?></p>
                        <p>手机号:<?php echo $row["mobile"] ?></p>
                        <p>工作单位:<?php echo $row["business"] ?></p>
                        <p>身份证:<?php echo $row["cardNo"] ?></p>
                        <p>地址:<?php echo $row["address"] ?></p>
                        <p>邮编:<?php echo $row["zipcode"] ?></p>
                        <p>入学年份:<?php echo $row["enterYear"] ?></p>
                        <p>班级:<?php echo $row["className"] ?></p>
                    </div>

                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img id="preview" src="<?php echo $row["image"]?>" alt="...">
                        </div>
                    </div>
                </div>
            </div>


<?php
        }
    }

?>



<?php include "footer.php"?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

