<?php
$di=$_GET['id'];
$con=mysqli_connect("localhost","root","","donators");
$q=mysqli_query($con,"delete from peolple where donator's name=$di");
if($q){
    header("location:manage donators.php");

}
else
echo"failed";
?>