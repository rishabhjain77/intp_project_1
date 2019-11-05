<?php
session_start();
$host="localhost";
$user="root";
$password="";
$dbname="resume";

$conn=new mysqli($host,$user,$password,$dbname);
if($conn){
  #echo "Connection establised";
}
else{
  die(mysqli_error($conn));
}
#mysqli_query($conn,"create database resume");
mysqli_select_db($conn,"resume");
#mysqli_query($conn,"drop table signup");
#mysqli_query($conn,"drop table login");
mysqli_query($conn,"create table personal(email varchar(40),firstname varchar(20),lastname varchar(20),country varchar(10),address varchar(100),contact varchar(10))");
mysqli_query($conn,"create table images (email varchar(40),encoded_image longblob NOT NULL)");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="education.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
    function doPreview()
    {
        form=document.getElementById('idOfForm');
        form.target='_blank';
        form.action='school.php';
        form.submit();
        form.action='education.php';
        form.target='';
    }
</script>
</head>
<body >

<div class="header">
  <h1>CV Generator</h1>
  <i><p>Make your CV Here!</p></i>
</div>

<div class="topnav">
  <a href="first_page(2).php">Home</a>
  <a href="education.php">Design</a>
  <a href="lolwa2.html">About Us</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Personal Details</h2>
      <form action="school.php" method="post" id="idOfForm" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <input type="text" id="country" name="country" placeholder="Your country name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <textarea id="address" name="address" placeholder="Write your address" style="height:200px" cols="100"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="contact">Contact</label>
      </div>
      <div class="col-75">
        <input type="text" id="contact" name="contact" placeholder="Your contact.." required>
      </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label for="image">Add Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="insert" name="uploadFile" accept=".png,.gif,.jpg,.webp"  required>
      </div>
    </div>
    <div class="row">
    <!--  <button type="submit" class="cancelbtn" value="save" name="save" formaction="education.php">Save</button> -->
      <button type="submit" class="signupbtn" value="next" name="next" formaction="school.php">Next</button>
    </div>
  </form>
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a class="active" href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">&raquo;</a>
  </div>
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
