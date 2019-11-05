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
mysqli_query($conn,"create table experience(email varchar(40),company_name1 varchar(20),years1 varchar(20),job_desc1 varchar(100),company_name2 varchar(20),years2 varchar(20),job_desc2 varchar(100),company_name3 varchar(20),years3 varchar(20),job_desc3 varchar(100))");

if(isset($_POST['next'])){
$email=$_SESSION['user'];
$skill_1=$_POST['skill_1'];
$skill_2=$_POST['skill_2'];
$skill_3=$_POST['skill_3'];
$skill_1_per=$_POST['skill_1_per'];
$skill_2_per=$_POST['skill_2_per'];
$skill_3_per=$_POST['skill_3_per'];

mysqli_query($conn,"insert into skills (email,skill_1,skill_1_per,skill_2,skill_2_per,skill_3,skill_3_per) values ('$email','$skill_1','$skill_1_per','$skill_2','$skill_2_per','$skill_3','$skill_3_per')");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="education.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >

<div class="header">
  <h1>CV Generator</h1>
  <i><p>Make your CV Here!</p></i>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Design</a>
  <a href="lolwa2.html">About Us</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Experience/Internship</h2>
      <form action="final.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="skill_1">Company Name 1</label>
      </div>
      <div class="col-75">
        <input type="text" id="company_name" name="company_name1" placeholder="Company name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_2">Years/Months of experience</label>
      </div>
      <div class="col-75">
        <input type="text" id="years" name="years1" placeholder="No of years.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <label for="address">Job description</label>
      </div>
      <div class="col-75">
        <textarea id="job_desc" name="job_desc1" placeholder="Write about your job" style="height:200px" cols="100"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_1">Company Name 2</label>
      </div>
      <div class="col-75">
        <input type="text" id="company_name" name="company_name2" placeholder="Company name(optional)..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_2">Years/Months of experience </label>
      </div>
      <div class="col-75">
        <input type="text" id="years" name="years2" placeholder="No of years.." >
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <label for="address">Job description</label>
      </div>
      <div class="col-75">
        <textarea id="job_desc" name="job_desc2" placeholder="Write about your job" style="height:200px" cols="100"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_1">Company Name 3</label>
      </div>
      <div class="col-75">
        <input type="text" id="company_name" name="company_name3" placeholder="Company name(optional)..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_2">Years/Months of experience </label>
      </div>
      <div class="col-75">
        <input type="text" id="years" name="years3" placeholder="No of years.." >
      </div>
    </div>
    <div class="row">
      <div class="col-75">
        <label for="address">Job description</label>
      </div>
      <div class="col-75">
        <textarea id="job_desc" name="job_desc3" placeholder="Write about your job" style="height:200px" cols="100"></textarea>
      </div>
    </div>
    <div class="row">
      <!--<button type="submit" class="signupbtn" value="save" name="save" formaction="final.php">Save</button> -->
      <button type="submit" class="cancelbtn" value="finish" name="finish" formaction="final.php">Submit</button>
    </div>
  </form>
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a class="active" href="#">4</a>
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
