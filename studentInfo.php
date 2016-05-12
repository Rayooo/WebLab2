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
                <form class="form-register form-horizontal col-md-6">
                <div class="form-group">
                    <label for="realName" class="col-md-4 control-label">真实姓名</label>
                    <div class= "col-md-8">
                        <input type="text" id="realName" name="realName" class="form-control" value="<?php echo $row["realName"] ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="col-md-4 control-label">手机</label>
                    <div class= "col-md-8">
                        <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $row["mobile"] ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business" class="col-md-4 control-label">工作单位</label>
                    <div class= "col-md-8">
                        <input type="text" id="business" name="business" class="form-control"  value="<?php echo $row["business"] ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cardNo" class="col-md-4 control-label">身份证号</label>
                    <div class= "col-md-8">
                        <input type="text" id="cardNo" name="cardNo" class="form-control"  value="<?php echo $row["cardNo"] ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-md-4 control-label">通讯地址</label>
                    <div class= "col-md-8">
                        <input type="text" id="address" name="address" class="form-control"  value="<?php echo $row["address"] ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="col-md-4 control-label">邮编</label>
                    <div class= "col-md-8">
                        <input type="text" id="zipcode" name="zipcode" class="form-control"  value="<?php echo $row["zipcode"] ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="enterYear" class="col-md-4 control-label">入学年份</label>
                    <div class= "col-md-8">
                        <input type="text" id="enterYear" name="enterYear" class="form-control"  value="<?php echo $row["enterYear"] ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="className" class="col-md-4 control-label">班级名称</label>
                    <div class= "col-md-8">
                        <input type="text" id="className" name="className" class="form-control" value="<?php echo $row["className"] ?>" readonly>
                    </div>
                </div>
                </form>

                <div class="col-md-6">
                    <div class="thumbnail">
                        <img id="preview" src="<?php echo $row["image"]?>" alt="...">
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

