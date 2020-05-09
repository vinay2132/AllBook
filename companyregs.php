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
    $vkey =md5(time().$emails);
   // $psws = md5($psws);
     $reg="INSERT Into companyregs (usern,emails, psws,problems,companyname,messag,vkey ) values('$usern','$emails','$psws','$problems','$companyname','$messag','$vkey')";
     mysqli_query($con,$reg);
     if($reg){
        echo '<script>alert("New record inserted sucessfully")</script>';
        $to = $emails;
        $subject ="email varification";
        $message = "<a href='http://localhost/pp/a1/companyvarified.php?vkey=$vkey'>register account</a>";
        $headers ="from:vinayd.vef@gmail.com\r\n";
        $headers .="MIME-Version:1.0"."\r\n";
        $headers .="Content-type:text/html;charset=UTF-8"."\r\n";
        mail($to,$subject,$message,$headers);
        header('location:thanks.html');
     }
     
    
}
?>
