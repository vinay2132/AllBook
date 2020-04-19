<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$emails = $_POST['emails'];
$psws = $_POST['psws'];
$companyname = $_POST['companyname'];
$s ="select * from companyregs where emails = '$emails' &&  psws = '$psws' && companyname = '$companyname'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
    echo '<script>alert("Thanks for login")</script>';
    echo "<meta http-equiv='refresh' content='0; url=companyservices.html' />";
}
else{
    echo '<script>alert("Incorrect Mailid (or) Password ")</script>';
    echo "<meta http-equiv='refresh' content='0; url=home.html' />";
}

?>
