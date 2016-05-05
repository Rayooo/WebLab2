<?php
/**
 * Created by PhpStorm.
 * User: Ray
 * Date: 16/5/5
 * Time: 20:05
 */
    $connection = mysqli_connect("localhost:8889","root","root","WebLab2");
    $sql = "SELECT * FROM student";
    $result = $connection->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row["Sno"]." ";
            echo $row["Sname"]." ";
            echo $row["Ssex"]." ";
            echo $row["Sage"]." ";
            echo $row["Sdept"]."<br>";
        }
    }
    else{
        echo "0 results";
    }
?>