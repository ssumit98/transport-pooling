<?php
session_start();
include "config.php";

$email=$_POST['email'];
$password=$_POST['psw'];

$password=md5($password);

$sql="select * from logins where email='$email' and password='$password'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{

    $arr=mysqli_fetch_array($result);
    $fname=$arr['fname']; 
    $lname=$arr['lname']; 
    $email=$arr['email']; 
    $id=$arr['id'];

    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['email']=$email;
    $_SESSION['id']=$id;

    echo("<b style='color:green'>Login Successful..</b>");
    header('refresh: 0.8; url=index.php');
}
else
{
    echo("<b style='color:red'>Invalid Username or Password</b>");
    header('refresh: 1; url=index.php');
}

?>