<?php
if(isset($_GET['vkey'])){
    $vkey =$_GET['vkey'];
    $con =mysqli_connect('localhost','root','');
    mysqli_select_db($con,'allbook');
    $s ="select * from form where varefied=0 && vkey='$vkey'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
       // $update $mysqli->query("update companyregs set varefied=1 where vkey = '$vkey' limit 1");
       $ss="update form set varefied=1 where vkey = '$vkey'";
       mysqli_query($con,$ss);
       if($ss){
            echo'<script>alert("thanks for logiin")</script> ';
            echo "<meta http-equiv='refresh' content='0; url=login.html' />";

        }
        else{
            echo"error";
        }
    }
    else{
        echo"this account is invalied or alredy varified";
    }
}
else{
    die("somthing went wrong");
}
?>
