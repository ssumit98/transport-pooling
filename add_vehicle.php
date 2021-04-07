<?php
session_start();
include "config.php";

$vehicle_name=$_POST['vehicle_name'];
$vehicle_type=$_POST['vehicle_type'];
$vehicle_from=$_POST['vehicle_from'];
$vehicle_to=$_POST['vehicle_to'];
$length=(float)$_POST['length'];
$breadth=(float)$_POST['breadth'];
$height=(float)$_POST['height'];
// $fileToUpload=$_POST['fileToUpload'];
$volume=$length*$breadth*$height;
$r=explode(".",$_FILES["afile"]["name"]);
$exte=end($r);
$iname="images/".$_POST['vehicle_name'].".".$exte;
move_uploaded_file($_FILES["afile"]["tmp_name"], $iname);

$owner_email=$_SESSION['email'];
$owner_id=$_SESSION['id'];

$file_url=$iname;
$sql="insert into vehicles(vehicle_name,vehicle_type,vehicle_from,vehicle_to,length,breadth,height,file,owner_email,owner_id) values('$vehicle_name','$vehicle_type','$vehicle_from','$vehicle_to','$length','$breadth','$height','$file_url','$owner_email','$owner_id')";
$result=mysqli_query($con,$sql);

if($result)
{
    echo("<b style='color:green'>Vehicle added Successfully!</b>");
    header('refresh: 0.8; url=index.php');

}
else
{
    echo("<b style='color:red'>Some Error occured, contact administrator</b>");
    header('refresh: 1; url=index.php');

}

?>