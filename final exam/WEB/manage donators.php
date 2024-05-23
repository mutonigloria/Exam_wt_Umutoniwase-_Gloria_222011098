<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Tutoring Services</title>
    <link rel="stylesheet" href="webS.css">
</head>
<body>
    <header>
        <!-- Horizontal Navigation Bar -->
        <nav class="horizontal-nav">
            <ul>
           
            <a href="Home.html">Home</a>
    <a href="About Us.html">About Us</a>
    <a href="Contact Us.html">Contact Us</a>
    <a href="Donate.html">Donate</a>
    <a href="Logout.php">Logout</a>
    <a href="manage donators.php"></a>
              
            </ul>
             <!-- Search Form -->
             
        </nav>
    </header>


</head>
<body bgcolor="lightblue">
    <div class="container">
        <h2>Registration of Donators</h2>
        <form method="post">
            <label for="username">Donator's Name</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">telephone</label><br>
            <input type="text" id="password" name="password"required><br>
            <label for="username"> Date of donation</label><br>
            <input type="date" id="" name="dat"required><br>
            <input type="submit" value="Register" name="subo">
        </form>
    </div><center>
    <?php
    if(isset($_POST['subo'])){
    $a=$_POST['username'];
    $b=$_POST['password'];
    $c=$_POST['dat'];
  $con=mysqli_connect("localhost","root","","donators");
    $q=mysqli_query($con,"insert into manage donators values('','$a','$c','$b')");
    if($q){
echo "$a  well done";

    }
    else
    echo "failed";
    }
    ?>



<table border="1">
    <tr><th>Donator's Name</th><th>telephone number</th><th>Password</th><th>Actions</th></tr>

    <?php
    $con=mysqli_connect("localhost","root","","donators");
    $q=mysqli_query($con,"select*from people");

    while($f=mysqli_fetch_array($q)){

        ?>
<tr>
<td><?php echo $f['name'];?></td>
<td><?php echo $f['telephone'];?></td>
<td><?php echo $f['date of donation'];?></td>
<td><?php echo $f['password'];?></td>
<td><a href="delete.php?id=<?php echo $f['id'];?>">Delete</a>
<a href="update.php?id=<?php echo $f['id'];?>">Update</a>

</td>

</tr>

        <?php
    }
    ?>
</table>