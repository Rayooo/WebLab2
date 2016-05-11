<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/11
 * Time: 14:37
 */
session_start();
$_SESSION["location"] = "editInfo";
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
if(!isset($_SESSION["userName"]) && !isset($_REQUEST["studentId"])){
    $url = 'index.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";
}
?>

<div class="container">
    <form class="form-register" action="addUserDeal.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">

                <h2 class="form-signin-heading">新增校友</h2>
                <input type="text" id="userName" name="userName" class="form-control" placeholder="用户名" required autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
                <input type="text" name="realName" class="form-control" placeholder="真实姓名" required>
                <input type="text" name="mobile" class="form-control" placeholder="手机" required>
                <input type="text" name="business" class="form-control" placeholder="工作单位" required>
                <input type="text" name="cardNo" class="form-control" placeholder="身份证号" required>
                <input type="text" name="address" class="form-control" placeholder="通讯地址" required>
                <input type="text" name="zipcode" class="form-control" placeholder="邮编" required>
                <select name="enterYear" class="form-control" required>
                    <?php
                    echo "<option value=''>请选择入学年份</option>";
                    for($i = 1900;$i <= date("Y");++$i){
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="classId" class="form-control" required>
                    <?php
                    include "connectDB.php";
                    echo "<option value=''>请选择入校班级</option>";
                    $sql = "SELECT * FROM classes WHERE isUse=1";
                    $result = $connection->query($sql);
                    if($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='".$row["id"]."'>".$row["className"]."</option>";
                        }
                    }
                    ?>
                </select>
                <button class="btn btn-lg btn-primary btn-block" type="submit">确定</button>
            </div>

            <div class="col-md-6">
                <div class="thumbnail">
                    <img id="preview" src="image/headImage.png" alt="..." >
                    <div class="caption">
                        <input type="file" name="image" id="uploadImage" required>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

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
