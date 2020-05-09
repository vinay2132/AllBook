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
if($psw == $pswrepeatt ){
   if($num==1){
       echo '<script>alert("Someone already register using this email")</script>';
       echo "<meta http-equiv='refresh' content='0; url=contact.html' />";
     }
     else{
         $vkey =md5(time().$email);
         $psw = md5($psw);
         $reg="INSERT Into form (username,email, psw, pswrepeatt,vkey) values('$username','$email','$psw','$pswrepeatt','$vkey')";
         mysqli_query($con,$reg);
         echo '<script>alert("New record inserted sucessfully")</script>';
          if($reg){
             
            $to = $email;
            $subject ="email varification";
            $message = "<a href='http://localhost/pp/a1/varified.php?vkey=$vkey'>register account</a>";
            $headers ="from:vinayd.vef@gmail.com\r\n";
            $headers .="MIME-Version:1.0"."\r\n";
            $headers .="Content-type:text/html;charset=UTF-8"."\r\n";
            mail($to,$subject,$message,$headers);
            header('location:thanks.html');
          }
          
//          echo "<meta http-equiv='refresh' content='0; url=login.html' />";
     }
}
else{
     echo'<script>alert("pasword and repeart pasword where not same. Please try again!")</script>';
     echo "<meta http-equiv='refresh' content='0; url=home.html' />";
}     
?>


