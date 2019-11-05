<?php
session_start();
$host="localhost";
$user="root";
$password="";
$dbname="";

$conn=new mysqli($host,$user,$password,$dbname);
if($conn){
  #echo "Connection establised";
}
else{
  die(mysqli_error($conn));
}
mysqli_query($conn,"create database resume");
mysqli_select_db($conn,"resume");
#mysqli_query($conn,"drop table signup");
#mysqli_query($conn,"drop table login");
mysqli_query($conn,"create table signup(id int(10) AUTO_INCREMENT PRIMARY KEY ,email varchar(40),password varchar(20))");
mysqli_query($conn,"create table login(id int(10)  AUTO_INCREMENT  PRIMARY KEY,email varchar(40),password varchar(20))");
#$sign_up_button=$_POST['sign_up_button'];
$email="";
$signup_password="";
if(isset($_POST['email'])){
  if(isset($_POST['psw'])){
    $email=$_POST['email'];
    $signup_password=$_POST['psw'];
    $result1=mysqli_query($conn,"select * from signup where email='$email'");
    $is_present=mysqli_num_rows($result1);
    if($is_present==0){
    mysqli_query($conn,"insert into signup (email,password) values('$email','$signup_password')");
    mysqli_query($conn,"insert into login (email,password) values('$email','$signup_password')");
    #header("Location: first_page_logout.html");
    $_SESSION['user']=$email;
    $_SESSION['password']=$signup_password;
  }
  else{
    session_destroy();
    header('Location:first_page(2).php');
  }
}
}
#echo $email.','.$signup_password;
else if(!empty($_POST['uname']) && !empty($_POST['login_psw'])){
  $username=$_POST['uname'];
  $login_password=$_POST['login_psw'];
  $result=mysqli_query($conn,"select email,password from login where email='$username' and password='$login_password'");
  $count=mysqli_num_rows($result);
  if($count==0){
    #echo "Invalid User";
    session_destroy();
    header('Location:first_page(2).php');
  }
  else if($count>1){
    session_destroy();
    header('Location:first_page(2).php');
  }
  else{
    #session_start();
    $_SESSION['user']=$username;
    $_SESSION['password']=$login_password;
  }
}
 ?>

<?php
if(isset($_SESSION['user'])){
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script language="Javascript">
function alerting(){
  alert("Successfully Logged in");
}
 </script>
 </head>
 <body onload="alerting()">

 <div class="header">
   <h1>CV Generator</h1>
   <i><p>Make your CV Here!</p></i>
 </div>

 <div class="topnav">
   <a href="#">Home</a>
   <a href="education.php">Design</a>
   <a href="lolwa2.html">About Us</a>
   <a href="first_page_logout.html" style="float:right">Logout</a>
 </div>

 <div class="row">
   <div class="leftcolumn">
     <div class="card">
       <h2>We Give the best CVs</h2>
       <i><h3>Example 1</h3></i>
       <div class="zoom" style="height:600px;">
         <img src="cv1.png" alt="cv1" height=600px width=400px>
       </div>
       <i><font size="+2"><p>Infographic</p></font></i>
     </div>
     <div class="card">
       <i><h3>Example 2</h3></i>
       <div class="zoom" style="height:600px;">
         <img src="cv2.png" alt="cv2" height=600px width=400px>
       </div>
       <i><font size="+2"><p>Simple Infographic</p></font></i>
     </div>
   </div>
   <div class="rightcolumn">
     <div class="card">
       <h2>About Me</h2>
       <div  style="height:100px;">
         <img src="aboutme.png" alt="about_me" height=100px >
       </div>
       <p>Group of college students started this start up!!</p>
     </div>
     <div class="card">
       <h3>Popular Post</h3>
       <div >
         <img src="popular_post1.png" alt="popular_post" height=100px width=100%>
       </div>
       <div >
         <img src="popular_post2.png" alt="popular_post" height=100px width=100%>
       </div>
       <div>
       <img src="popular_post3.png" alt="popular_post" height=100px width=100%>
     </div>
     </div>

   </div>
 </div>

 <div >
   <footer class="w3-container w3-teal w3-center w3-margin-top">
   <p>Find me on social media.</p>
   <i class="fa fa-facebook-official w3-hover-opacity"></i>
   <i class="fa fa-instagram w3-hover-opacity"></i>
   <i class="fa fa-snapchat w3-hover-opacity"></i>
   <i class="fa fa-pinterest-p w3-hover-opacity"></i>
   <i class="fa fa-twitter w3-hover-opacity"></i>
   <i class="fa fa-linkedin w3-hover-opacity"></i>
   <p>Powered by <a href="first_page(2).html" target="_blank">Cool.|.Guys</a></p>
 </footer>
 </div>

 </body>
 </html>
<?php }
else{?>
  <!DOCTYPE html>
  <html>
  <head>
    <!-- <script language="Javascript">
    function alerting2(){
      alert("Invalid Password or Email id already exsists ");
    }
  var signup_modal = document.getElementById('id01');
  var login_modal = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == signup_modal ) {
      modal.style.display = "none";
    }
    else if(event.target == login_modal){
      modal.style.display = "none";
    }
  }
  </script> -->
  <script type="text/javascript">
  function validate()
      {
        var password1 = document.sign_up.psw.value;
        var password2= document.sign_up.psw_repeat.value;
        if (password1==password2)
        {

          return true;
        }

        else
        {
          alert("Passwords do not match!");
          return false;

        }

        var eid = document.sign_up.email.value;
        var atpos = eid.lastIndexOf("@");
        var dotpos = eid.lastIndexOf(".");
        if( dotpos+2 >= eid.length || atpos< 1 || atpos+2 > dotpos)
        {
          alert("Enter Valid Email Address!!");
          return false;
        }
      }
  </script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body onload="alerting2()">

  <div class="header">
    <h1>CV Generator</h1>
    <i><p>Make your CV Here!</p></i>
  </div>

  <div class="topnav">
    <a href="#">Home</a>
    <a href="first_page_logout.php">Design</a>
    <a href="#">About Us</a>
    <a onclick="document.getElementById('id02').style.display='block'" style="float:right">Login</a>
    <a  style="float:right" target="=_parent" onclick="document.getElementById('id01').style.display='block'">Sign Up</a>
  </div>

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" onsubmit="return validate()" action="http://localhost/project/first_page(2).php" method="post">
      <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw_repeat" required>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <button type="submit" class="signupbtn" value="1" name="sign_up_button">Sign Up</button>
        </div>
      </div>
    </form>
  </div>



  <div id="id02" class="modal">

    <form class="modal-content animate" action="http://localhost/project/first_page(2).php" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="img_avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Username/Email</b></label>
        <input type="text" placeholder="Enter Email" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="login_psw" required>

        <button type="submit" value="1" name="login_button">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="login_remember"> Remember me
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
    </form>
  </div>


  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h2>We Give the best CVs</h2>
        <i><h3>Example 1</h3></i>
        <div class="zoom" style="height:600px;">
          <img src="cv1.png" alt="cv1" height=600px width=400px>
        </div>
        <i><font size="+2"><p>Infographic</p></font></i>
      </div>
      <div class="card">
        <i><h3>Example 2</h3></i>
        <div class="zoom" style="height:600px;">
          <img src="cv2.png" alt="cv2" height=600px width=400px>
        </div>
        <i><font size="+2"><p>Simple Infographic</p></font></i>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2>About Me</h2>
        <div  style="height:100px;">
          <img src="aboutme.png" alt="about_me" height=100px >
        </div>
        <p>Group of college students started this start up!!</p>
      </div>
      <div class="card">
        <h3>Popular Post</h3>
        <div >
          <img src="popular_post1.png" alt="popular_post" height=100px width=100%>
        </div>
        <div >
          <img src="popular_post2.png" alt="popular_post" height=100px width=100%>
        </div>
        <div>
        <img src="popular_post3.png" alt="popular_post" height=100px width=100%>
      </div>
      </div>

    </div>
  </div>

  <div >
    <footer class="w3-container w3-teal w3-center w3-margin-top">
    <p>Find me on social media.</p>
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p>Powered by <a href="first_page(2).html" target="_blank">Cool.|.Guys</a></p>
  </footer>
  </div>

  </body>
  </html>
<?php } ?>
