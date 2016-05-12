<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/10
 * Time: 20:00
 */
session_start();
$_SESSION["location"] = "query";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Query</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <form id="searchForm" class="container" action="query.php" method="post">
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <!--显示原来输入的值-->
                    <input type="text" class="form-control" name="condition" placeholder="请输入查询条件" value="<?php echo $searchText = isset($_REQUEST["condition"])?  $_REQUEST["condition"]:""; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">查询</button>
                    </span>
                </div>
                <div class="input-group">
                    <?php $option = isset($_REQUEST["searchOption"])? $_REQUEST["searchOption"]:"realName";
//                        这里代码太垃圾了,Vue用的话有延迟卡
                        if($option == "realName"){
                            echo "<label>
                                    <input type=\"radio\" name=\"searchOption\" value=\"realName\" checked>
                                    姓名
                                    </label>
                                    <label>
                                        <input type=\"radio\" name=\"searchOption\" value=\"enterYear\">
                                        入学年份
                                    </label>
                                    <label>
                                        <input type=\"radio\" name=\"searchOption\" value=\"className\">
                                        班级
                                    </label>";
                        }else if($option == "enterYear"){
                            echo "<label>
                                <input type=\"radio\" name=\"searchOption\" value=\"realName\">
                                姓名
                                </label>
                                <label>
                                    <input type=\"radio\" name=\"searchOption\" value=\"enterYear\" checked>
                                    入学年份
                                </label>
                                <label>
                                    <input type=\"radio\" name=\"searchOption\" value=\"className\">
                                    班级
                                </label>";
                        }else if($option == "className"){
                            echo "<label>
                                <input type=\"radio\" name=\"searchOption\" value=\"realName\">
                                姓名
                                </label>
                                <label>
                                    <input type=\"radio\" name=\"searchOption\" value=\"enterYear\">
                                    入学年份
                                </label>
                                <label>
                                    <input type=\"radio\" name=\"searchOption\" value=\"className\" checked>
                                    班级
                                </label>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>

    <?php
            include "connectDB.php";
            //如果request中有以下内容,不然会报错
            if(isset($_REQUEST["condition"]) && isset($_REQUEST["searchOption"])){
                if($_REQUEST["searchOption"] == "realName"){
                    $sql = "SELECT *,students.id AS studentId FROM students JOIN classes ON (students.classId = classes.id) WHERE students.isUse=1 AND realName='".$_REQUEST["condition"]."'";
                }
                else if($_REQUEST["searchOption"] == "enterYear"){
                    $sql = "SELECT *,students.id AS studentId FROM students JOIN classes ON (students.classId = classes.id) WHERE students.isUse=1 AND enterYear='".$_REQUEST["condition"]."'";
                }
                else if($_REQUEST["searchOption"] == "className"){
                    $sql = "SELECT *,students.id AS studentId FROM students JOIN classes ON (students.classId = classes.id) WHERE students.isUse=1 AND className='".$_REQUEST["condition"]."'";
                }
                $result = $connection -> query($sql);
                if($result->num_rows > 0){
                    echo "<div class='container alert alert-success text-center' role='alert'>查询成功,以下是此次查询到的信息</div>";
                    echo "<div class='container text-center'>";
                    echo "<table class= 'table table-striped table-bordered table-hover'>";
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
                        $studentId = $row["studentId"];
                        echo "<tr>";
                        echo "<td>".$row["studentId"]."</td>";
//                      echo "<td>".$row["userName"]."</td>";
                        echo "<td>".$row["realName"]."</td>";
                        echo "<td>".$row["cardNo"]."</td>";
//                      echo "<td>".$row["business"]."</td>";
                        echo "<td>".$row["enterYear"]."</td>";
                        echo "<td>".$row["mobile"]."</td>";
                        echo "<td>".$row["className"]."</td>";
                        echo "<td>
                            <a href='studentInfo.php?studentId=$studentId' class='editButton'><i class='fa fa-info' aria-hidden='true'></i></a>
                            <a href='editInfo.php?studentId=$studentId' class='editButton'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                            <a href='deleteInfoDeal.php?studentId=$studentId' class='editButton'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                            </td>";
//                      echo "<td>".$row["address"]."</td>";
//                      echo "<td>".$row["zipcode"]."</td>";
//                      echo "<td>".$row["image"]."</td>";
//                      echo "<td>".$row["isUse"]."</td>";
                        echo "</tr>";
                    }
                    echo"</table></div>";
                }
                else{
                    echo "<div class='container alert alert-danger text-center' role='alert'>未查询到信息</div>";
                }
            }
            else{
                echo "<div class='container alert alert-warning text-center' role='alert'>还未输入查询条件</div>";
            }
    ?>




    <?php include "footer.php"?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
