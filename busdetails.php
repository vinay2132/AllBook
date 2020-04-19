<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$froms = $_POST['froms'];
$tos = $_POST['tos'];
$busno = $_POST['busno'];
$bustype= $_POST['bustype'];
$outhertype= $_POST['outhertype'];
$busdate= $_POST['busdate'];
$companyname=$_POST['companyname'];
$driverno=$_POST['driverno'];
$emergencyno=$_POST['emergencyno'];
$addresscom=$_POST['addresscom'];
$s ="select * from busdetails where busno = '$busno'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
     echo '<script>alert("Someone already entered using this Bus number")</script>';
     echo "<meta http-equiv='refresh' content='0; url=contact.html' />";
}
else{
     $reg="INSERT Into  busdetails (froms,tos,busno,bustype,outhertype,busdate,companyname,driverno,emergencyno,addresscom) values('$froms','$tos','$busno','$bustype','$outhertype','$busdate','$companyname','$driverno','$emergencyno','$addresscom')";
     mysqli_query($con,$reg);
     echo '<script>alert("Bus details has been inserted sucessfully")</script>';
     echo "<meta http-equiv='refresh' content='0; url=home.html' />";
}
?>
