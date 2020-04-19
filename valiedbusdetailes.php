<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="url=home.html">
    <title>Valied bus detailes page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="handle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <meta name="google-signin-client_id" content="395673274757-i0m8kqh7eir7n1fb6jvafinf962jn57p.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
	background-color: #f6f6ff;
	font-family: Calibri, Myriad;
}

#main {
	width: 98%;
	padding: 20px;
	margin: auto;
}

table.timecard {
	margin: auto;
	width: 98%;
	border-collapse: collapse;
	border: 1px solid #fff; /*for older IE*/
	border-style: hidden;
}

table.timecard caption {
	background-color: transperent;
	color: gray;
	font-size: x-large;
	font-weight: bold;
	letter-spacing: .3em;
}

table {
  border-collapse: collapse;
  width: 98%;
  
}

th, td {
  text-align: left;
  padding: 14px;
  bottom: 131px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #1b9bff;
  color: white;
}
</style>
</head>

<body>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <!--<i class="far fa-clock" style="font-size:120px;color:#2196F3"></i>-->
       <i class="fas fa-chevron-circle-down"style="font-size:40px;color:#2196F3" ></i> 
      </label>
        <label class="logo">allbook</label>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a  href="about.html">About</a></li>
            <li><a class="active" href="login.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li><a button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log In</a></li>

        </ul>
        
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="form.php" method="POST">

                <div class="container">
                    <h1>Log In</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>
                    <label for="username"><b>UserName</b></label>
                    <input type="text" placeholder="Enter UserName" name="username" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <label for="pswrepeatt"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="pswrepeatt" required>

                    <label>
                  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                    <p>By creating an account you agree to our <a href="terms_andcon.html" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Log In</button>


                    </div>
                    <div class="g-signin2" data-onsuccess="SignIn with Google"></div>

                </div>
            </form>
        </div>

        <div class="chat">
        <a href="AI.html">
            <div class="chaticon" style="background-image: url(215226424Untitled-3-512.png) ;"></div>
        </a>
    </div>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </nav>
    <center>

</div>

<div id="main">
<h1 style="font: size 100;">Hi!Some busses are on your service.</h1>

<br>
        <h3>
           There are some busses avaliable on this Root.  </p>
    </h3>
    <br>

<table class="timecard">

	<caption>Click the on FROM to book the bus</caption>
	<thead>
        

            <tr>
            <th>FROM</th>
            <th>TO</th>
            <th>BUSDATE</th>
            <th>Travalers name</th>
            <th>BUSTYPE</th>
            
</tr>
</thead>

<?php

$con =mysqli_connect('localhost','root','');
mysqli_select_db($con,'allbook');
$froms = $_POST['froms'];
$tos = $_POST['tos'];
$busdate= $_POST['busdate'];
$s ="select * from busdetails where froms = '$froms' && tos = '$tos' && busdate = '$busdate'";
$ss ="select * from busdetails where  aa ='$froms'";
$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num>=1){
 //  $_SESSION['from'] = $froms;
    echo '<script>alert("We have found some bus services for you.")</script>';
    while($row =$result-> fetch_assoc()){
        echo "<tr><td>".$row["froms"]."</td>"."<td>".$row["tos"]."</td>"."<td>".$row["busdate"]."</td>"."<td>".$row["companyname"]."</td>"."<td>".$row["bustype"]."</td></tr>";
        
      
            ?>
        <td>  <a href="seatbook.html" class="busbutton busbutton1"> More >></a> </td>
        
        <?php
        
    }
    echo "</table>";

}
else{
    echo '<script>alert("Sorry we have no bus services to this Root (or) on this date. ")</script>';
    echo "<meta http-equiv='refresh' content='0; url=nobusservice.html' />";
}   

?>
</center>
</body>
</html>


