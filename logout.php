<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/7
 * Time: 19:29
 */
    session_start();
    session_destroy();
    $url = 'login.php';
    echo "<script language='javascript'>";
    echo "location.href='$url'";
    echo "</script>";
?>