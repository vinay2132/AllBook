<?php
session_start();
$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$usern = $_POST['usern'];
$emails = $_POST['emails'];
$psws = $_POST['psws'];
$problems = $_POST['problems'];
$companyname = $_POST['companyname'];
$messag = $_POST['messag'];
$s ="select * from companyregs where emails = '$emails'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1){
     echo '<script>alert("Someone already register using this email")</script>';
     echo "<meta http-equiv='refresh' content='0; url=companyreg.html' />";
}
else{
     $reg="INSERT Into companyregs (usern,emails, psws,problems,companyname,messag ) values('$usern','$emails','$psws','$problems','$companyname','$messag')";
     mysqli_query($con,$reg);
     echo '<script>alert("New record inserted sucessfully")</script>';
     echo "<meta http-equiv='refresh' content='0; url=serviceprovider.html' />";
}
?>