<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$email = $_POST['email'];
$pswrepeatt= $_POST['pswrepeatt'];
$s ="select * from form where email = '$email' && pswrepeatt='$pswrepeatt'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Thanks for login")</script>';
   echo "<meta http-equiv='refresh' content='0; url=services.html' />";
}
else{
    echo '<script>alert("Incorrect Mailid (or) Password ")</script>';
    echo "<meta http-equiv='refresh' content='0; url=home.html' />";
}

?>
