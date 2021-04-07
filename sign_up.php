<?php
session_start();
include "config.php";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['psw'];

$password=md5($password);

$sql_verify="select * from logins where email='$email'";
$result=mysqli_query($con,$sql_verify);
$num=mysqli_num_rows($result);
if($num>0)
{
    echo("<b style='color:red'>Given Email id is already registered</b>");
    header('refresh: 1; url=index.php');
    exit(0);
}

$sql="insert into logins(fname,lname,email,password) values('$fname','$lname','$email','$password')";
$result=mysqli_query($con,$sql);

if($result)
{
    echo("<b style='color:green'>Successfully Signed Up</b>");
    header('refresh: 0.8; url=index.php');

}
else
{
    echo("<b style='color:red'>Signup Error, contact administrator</b>");
    header('refresh: 1; url=index.php');

}

?>