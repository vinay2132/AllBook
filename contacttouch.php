<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$usrnm = $_POST['usrnm'];
$email = $_POST['email'];
$problem = $_POST['problem'];
$messages = $_POST['messages'];
$s ="select * from contacttouch where email = '$email'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Someone already register using this email")</script>';
      echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
}
else{
     $reg="INSERT Into contacttouch (usrnm,email, problem,  messages) values('$usrnm','$email','$problem','$messages')";
     mysqli_query($con,$reg);
     echo '<script>alert("New record inserted sucessfully")</script>';
      echo "<meta http-equiv='refresh' content='0; url=feedback.html' />";
}
?>