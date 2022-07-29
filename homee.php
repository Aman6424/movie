<?php

if(isset($_POST['signup']))
{
    $name1= $_POST['uname1'];
$pass1= $_POST['pwd1'];
    $con=mysqli_connect('localhost','root','','login_sample_db');
    if(!$con)
    {
        echo "you are not connect to the server";
    }
    $sql="INSERT INTO validtable(username, passwordd) VALUES ('$name1','$pass1')";
    if(mysqli_query($con,$sql))
    {
        header("location:loginpage.html");
    }
    
}
if(isset($_POST['login']))
{
$con=mysqli_connect('localhost','root','','login_sample_db');
    if(!$con)
    {
        echo "you are not connect to the server";
    }
    $sql="SELECT username,passwordd FROM validtable";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $name=$row['username'];
        $pass=$row['passwordd'];
    }
    else{
        echo "No login found";
    }
session_start();
if(isset($_SESSION['uname']))
{
    echo "<h1 align = right> Welcome,".$_SESSION['uname']."</h1>";
    //echo "<p> Now scroll down for the multiple working concepts</p>";
    echo "<a href='index.html'>Click Here to view Movies</a> <br>";
    echo "<br> <a href ='logout.php'><input type= button name= logout value=logout></a>";
}
else
{
    if($name==$_POST['uname']  && $pass== $_POST['pwd'])
    {
        $_SESSION['uname']=$name;
        echo "<script> location.href='index.html'</script>";
    }
    else
    {
        echo "<script>alert('Invalid username and password')</script>";
        echo "<script>location.href ='loginpage.html'</script>";
    }
}
}