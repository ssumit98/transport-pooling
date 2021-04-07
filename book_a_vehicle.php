<?php
session_start();
include "config.php";

$name=$_POST['name'];
$email=$_POST['email'];
$place=$_POST['place'];
$destination=$_POST['destination'];
$length=(float)$_POST['length'];
$breadth=(float)$_POST['breadth'];
$height=(float)$_POST['height'];
$product_type=$_POST['product_type'];
$vehicle_id=$_COOKIE['myJavascriptVar'];


$sql="insert into `bookings`(vehicle_id,name,place,destination,product_type,length,breadth,height,email) values('$vehicle_id','$name','$place','$destination','$product_type','$length','$breadth','$height','$email');";
$result=mysqli_query($con,$sql);




if($result)
{
	$sql2="update vehicles set is_booked=1 where id='$vehicle_id'";
$result2=mysqli_query($con,$sql2);
    echo("<b style='color:green'>Vehicle booked Successfully!</b>");
    header('refresh: 0.8; url=index.php');

}
else
{
    echo("<b style='color:red'>Some Error occured, contact administrator</b>");
    header('refresh: 1; url=index.php');

}

?>