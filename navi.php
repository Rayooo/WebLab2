<!--Created by PhpStorm.-->
<!--User: Ray-->
<!--Date: 16/5/5-->
<!--Time: 17:43-->

<!--Vue.js-->
<script src="js/vue.js"></script>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i>校友通讯录</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION["userName"])) {
                            if ($_SESSION["isAdmin"]) {
                                ?>
                                <a type="button" class="btn btn-primary navbar-btn" href="logout.php"
                                   style="margin-left: 10px">退出</a>
                                <li class="naviButton" v-bind:class="{ 'active': isIndex }"><a href="index.php">主页</a></li>
                                <li class="naviButton" v-bind:class="{ 'active': isAddUser }"><a href="addUser.php">新增</a></li>
                                <li class="naviButton" v-bind:class="{ 'active': isQuery }"><a href="query.php">查询</a></li>
                                <?php
                                $isIndex = "index" == $_SESSION["location"] ? "true" : "false";
                                $isAddUser = "addUser" == $_SESSION["location"] ? "true" : "false";
                                $isQuery = "query" == $_SESSION["location"] ? "true" : "false";
                                echo "<script>
                                    var vue = new Vue({
                                        el: '#bs-example-navbar-collapse-1',
                                        data: {
                                            isIndex: $isIndex,
                                            isAddUser: $isAddUser,
                                            isQuery: $isQuery
                                        }
                                    });
                                </script>";
                            }
                            else{
                                ?>
                                <a type="button" class="btn btn-primary navbar-btn" href="logout.php"
                                   style="margin-left: 10px">退出</a>
                                <li class="naviButton" v-bind:class="{ 'active': isIndex }"><a href="index.php">主页</a></li>
                                <li class="naviButton" v-bind:class="{ 'active': isQuery }"><a href="query.php">查询</a></li>
                                <li class="naviButton" v-bind:class="{ 'active': isEditMyInfo }"><a href="editMyInfo.php">我的信息</a></li>
                                <?php
                                $isIndex = "index" == $_SESSION["location"] ? "true" : "false";
                                $isEditMyInfo = "editMyInfo" == $_SESSION["location"] ? "true" : "false";
                                $isQuery = "query" == $_SESSION["location"] ? "true" : "false";
                                echo "<script>
                                    var vue = new Vue({
                                        el: '#bs-example-navbar-collapse-1',
                                        data: {
                                            isIndex: $isIndex,
                                            isQuery: $isQuery,
                                            isEditMyInfo: $isEditMyInfo
                                        }
                                    });
                                </script>";
                            }
                        }
                        else if($_SESSION["location"] == "login") {
                            echo '<a type="button" class="btn btn-primary navbar-btn" href="register.php">注册</a>';
                        }
                        else if($_SESSION["location"] == "register"){
                            echo '<a type="button" class="btn btn-primary navbar-btn" href="index.php">登陆</a>';
                        }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>

<?php include "bread.php"?>
