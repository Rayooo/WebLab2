<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 14:37
 */
session_start();
$_SESSION["breadDetail"] = "edit";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>新增校友</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/editInfo.css" rel="stylesheet">
</head>
<body>
<?php  include "navi.php"; ?>

<?php
//    如果没有登陆,跳转
    if(!isset($_SESSION["userName"]) && !isset($_REQUEST["studentId"]) || !$_SESSION["isAdmin"]){
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
        $studentClassName = $row["className"];
        $imageUrl = $row["image"];
?>
<script>
    function check() {
        var mobile = document.getElementById("mobile").value;
        var cardNo = document.getElementById("cardNo").value;
        var canSubmit = true;
        if(mobile && !/^1[0-9]{10}$/.test(mobile)){
            canSubmit = false;
        }
        if(cardNo && !/^[0-9]{17}([0-9]|x)$/.test(cardNo)){
            canSubmit = false;
        }
        if(!canSubmit){
            alert("身份证或手机号格式错误")
        }
        return canSubmit;
    }
</script>
<div class="container">
    <form class="form-register form-horizontal" onsubmit="return check()" action="editInfoDeal.php" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <h2 class="form-signin-heading">编辑信息</h2>

                <div class="form-group">
                    <label for="studentId" class="col-md-4 control-label">用户编号</label>
                    <div class= "col-md-8">
                        <input type="text" id="studentId" name="studentId" class="form-control" placeholder="用户编号" value="<?php echo $studentId ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userName" class="col-md-4 control-label">用户名(必填)</label>
                    <div class= "col-md-8">
                        <input type="text" id="userName" name="userName" class="form-control" placeholder="用户名" value="<?php echo $row["userName"] ?>" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">密码(必填)</label>
                    <div class= "col-md-8">
                        <input type="text" id="password" name="password" class="form-control" placeholder="密码" value="<?php echo $row["userPassword"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="realName" class="col-md-4 control-label">真实姓名(必填)</label>
                    <div class= "col-md-8">
                        <input type="text" id="realName" name="realName" class="form-control" placeholder="真实姓名" value="<?php echo $row["realName"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile" class="col-md-4 control-label">手机</label>
                    <div class= "col-md-8">
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="手机" value="<?php echo $row["mobile"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="business" class="col-md-4 control-label">工作单位</label>
                    <div class= "col-md-8">
                        <input type="text" id="business" name="business" class="form-control" placeholder="工作单位" value="<?php echo $row["business"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cardNo" class="col-md-4 control-label">身份证号</label>
                    <div class= "col-md-8">
                        <input type="text" id="cardNo" name="cardNo" class="form-control" placeholder="身份证号" value="<?php echo $row["cardNo"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-md-4 control-label">通讯地址</label>
                    <div class= "col-md-8">
                        <input type="text" id="address" name="address" class="form-control" placeholder="通讯地址" value="<?php echo $row["address"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zipcode" class="col-md-4 control-label">邮编</label>
                    <div class= "col-md-8">
                        <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="邮编" value="<?php echo $row["zipcode"] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="enterYear" class="col-md-4 control-label">入学年份(必填)</label>
                    <div class= "col-md-8">
                        <select id="enterYear" name="enterYear" class="form-control" required>
                            <?php
                            echo "<option value=''>请选择入学年份</option>";
                            for($i = 1900;$i <= date("Y");++$i){
                                if($i == $row["enterYear"])
                                    echo "<option value='$i' selected>$i</option>";
                                else
                                    echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="className" class="col-md-4 control-label">班级名称(必填)</label>
                    <div class= "col-md-8">
                        <select id="className" name="classId" class="form-control" required>
                            <?php
                            include "connectDB.php";
                            echo "<option value=''>请选择入校班级</option>";
                            $sql = "SELECT * FROM classes WHERE isUse=1";
                            $result = $connection->query($sql);
                            if($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                                    if($studentClassName == $row["className"])
                                        echo "<option value='".$row["id"]."' selected>".$row["className"]."</option>";
                                    else
                                        echo "<option value='".$row["id"]."'>".$row["className"]."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="thumbnail">
                    <img id="preview" src="<?php echo $imageUrl?>" alt="...">
                    <div class="caption">
                        <input type="file" name="image" id="uploadImage">
                    </div>
                </div>
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">确定</button>
    </form>
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

<script>
    function preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on("change", "#uploadImage", function (){
        preview(this);
    });
</script>
</body>
</html>
