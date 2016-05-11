<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/5
 * Time: 17:43
 */
session_start();
$_SESSION["location"] = "login";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>主页</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/login.css" rel="stylesheet">

</head>
<body>
<?php  include "navi.php"; ?>
<?php
//    如果没有登陆,跳转
if(isset($_SESSION["userName"])){
    $url = 'index.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";
}
?>
    <div class="container">
    
        <form class="form-signin" action="loginDeal.php" method="post">
            <h2 class="form-signin-heading">请登陆</h2>

            <?php
                if(isset($_SESSION["error"])){
                    echo "<div id='error' class='container alert alert-danger text-center form-control' role='alert'>账号密码错误</div>";

                }
            ?>

            <label for="userName" class="sr-only">用户名</label>
            <input type="text" id="userName" name="userName" class="form-control" placeholder="用户名" required autofocus>
            <label for="password" class="sr-only">密码</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
            <div class="radio">
                <label>
                    <input type="radio" name="isAdmin" id="isAdmin" value="1" checked>
                    管理员
                </label>
                <label>
                    <input type="radio" name="isAdmin" id="isAdmin" value="0">
                    校友
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        </form>
    </div> <!-- /container -->
    
    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>