<div class="container">
    <p class="bg-primary">
        <?php
            /**
             * Created by PhpStorm.
             * User: Ray
             * Date: 16/5/12
             * Time: 18:21
             */
            if(isset($_SESSION["userName"])){
                if($_SESSION["location"]=="index"){
                    echo "首页>信息列表";
                }
                else if($_SESSION["location"] == "addUser"){
                    echo "首页>新增";
                }
                else if($_SESSION["location"] == "query"){
                    echo "首页>查询";
                }
            }
        ?>
    </p>
</div>
