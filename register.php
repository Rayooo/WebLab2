<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/5
 * Time: 19:38
 */
session_start();
$_SESSION["location"] = "register";
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

    <link href="css/register.css" rel="stylesheet">
</head>
<body>
<?php  include "navi.php"; ?>

<div class="container">

    <form class="form-signin" action="registerDeal.php" method="post">
        <h2 class="form-signin-heading">欢迎加入我们</h2>
        <label for="userName" class="sr-only">用户名</label>
        <input type="text" id="userName" class="form-control" name="userName" placeholder="用户名" required autofocus>
        <label for="password" class="sr-only">密码</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="密码" required>
        <div class="radio">
            <label>
                <input type="radio" name="isManager" id="isManager" value="1" checked>
                管理员(现在只能注册管理员)
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
    </form>
</div> <!-- /container -->






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
