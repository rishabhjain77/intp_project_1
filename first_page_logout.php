<?php
session_start();
session_destroy();
header('Location:first_page(2).php ');
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- <script language="Javascript">
  function validate(){
    var password=document.sign_up.psw.value;
    var repeat_password=document.signup.psw_repeat.value;
    if(password!=repeat_password){
      alert("Passwords do not match");
      document.sign_up.psw.focus();
      return false;
    }
  }
  function alerting(){
    alert("Logged Out");
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
<body onload="alerting()">

<div class="header">
  <h1>CV Generator</h1>
  <i><p>Make your CV Here!</p></i>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Design</a>
  <a href="lolwa2.html">About Us</a>
  <a onclick="document.getElementById('id02').style.display='block'" style="float:right">Login</a>
  <a  style="float:right" target="=_parent" onclick="document.getElementById('id01').style.display='block'">Sign Up</a>
</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content"onsubmit="return validate()" action="http://localhost/project/first_page(2).php" method="post" >
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" autocomplete="off" required>

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

  <form class="modal-content animate" action="http://localhost/project/first_page(2).php" method="post" onsubmit="(return(validate))">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username/Email</b></label>
      <input type="text" placeholder="Enter Email" name="uname"  required>

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
