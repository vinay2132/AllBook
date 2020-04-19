<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$username = $_POST['username'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$pswrepeatt= $_POST['pswrepeatt'];
$s ="select * from form where email = '$email'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
     echo '<script>alert("Someone already register using this email")</script>';
     echo "<meta http-equiv='refresh' content='0; url=contact.html' />";
}
else{
     $reg="INSERT Into form (username,email, psw,  pswrepeatt) values('$username','$email','$psw','$pswrepeatt')";
     mysqli_query($con,$reg);
     echo '<script>alert("New record inserted sucessfully")</script>';
     echo "<meta http-equiv='refresh' content='0; url=login.html' />";
}
?>
