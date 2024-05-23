<head>
    <link rel="stylesheet" type="text/css" href="web.CSS">
</head>

<?php
$di=$_GET['id'];
$con=mysqli_connect("localhost","root","","donators");
$q=mysqli_query($con,"select*from people=$di");

while($f=mysqli_fetch_array($q)){
?>
<head>
    <link rel="stylesheet" type="text/css" href="web.CSS">
</head>
<form method="post">
            <label for="username">Domator's Name</label><br>
            <input type="text" id="username" name="username" value="<?php echo $f['name'];?>" required><br>
            <label for="password">telephone number</label><br>
            <input type="text" id="password" name="password" value="<?php echo $f['price'];?>"required><br>
            <label for="password">telephone number</label><br>
            <input type="text" id="password" name="password" value="<?php echo $f['price'];?>"required><br>
            <label for="username">Date of donation</label><br>
            <input type="date" id="" name="dat"value="<?php echo $f['date of donation'];?>"required><br>
            <input type="submit" value="Update" name="subo">
        </form>
    </div><center>
    <?php
}
    if(isset($_POST['subo'])){
    $a=$_POST['name'];
    $b=$_POST['telephone'];
    $b=$_POST['password'];
    $c=$_POST['dat'];
    $con=mysqli_connect("localhost","root","","donators");
    $q=mysqli_query($con,"update people set name='$a',name='$b',telephone='$c' where id=$di");
    if($q){
        header("location:manage donators.php");
    }
    else
    echo"failed";
    }
    ?>