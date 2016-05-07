<!--Created by PhpStorm.-->
<!--User: Ray-->
<!--Date: 16/5/5-->
<!--Time: 17:43-->
<nav class="navbar navbar-inverse">
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
                <a class="navbar-brand" href="#">校友通讯录</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(isset($_SESSION["userName"]))
                        {
                            echo '<a type="button" class="btn btn-primary navbar-btn" href="#">'.$_SESSION["userName"].'</a>';
                            echo '<a type="button" class="btn btn-primary navbar-btn" href="logout.php">退出</a>';
                        }
                        else
                        {
                            echo '<a type="button" class="btn btn-primary navbar-btn" href="register.php">注册</a>';
                        }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>
