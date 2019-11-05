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
mysqli_query($conn,"create table skills(email varchar(40),skill_1 varchar(40),skill_1_per varchar(5),skill_2 varchar(40),skill_2_per varchar(5),skill_3 varchar(40),skill_3_per varchar(5))");

if(isset($_POST['next'])){
$email=$_SESSION['user'];
$school=$_POST['school'];
$college=$_POST['college'];
$undergraduation=$_POST['undergraduation'];
$postgraduation=$_POST['postgraduation'];
$undergraduation_degree=$_POST['undergraduation_degree'];
$postgraduation_degree=$_POST['postgraduation_degree'];
mysqli_query($conn,"insert into education (email,schoolname,collegename,undergraduation,postgraduation,
undergraduation_degree,postgraduation_degree) values ('$email','$school','$college','$undergraduation','$postgraduation','$undergraduation_degree','$postgraduation_degree')");
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
      <h2>Top 3 Skills</h2>
      <form action="experience.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="skill_1">Skill 1</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_1" name="skill_1" placeholder="Skill name.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_1_per">Profeciency in %</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_1_per" name="skill_1_per" placeholder="60" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_2">Skill 2</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_2" name="skill_2" placeholder="Skill name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_2_per">Profeciency in %</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_2_per" name="skill_2_per" placeholder="80" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_3">Skill 3</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_3" name="skill_3" placeholder="Skill name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="skill_3_per">Profeciency in %</label>
      </div>
      <div class="col-75">
        <input type="text" id="skill_3_per" name="skill_3_per" placeholder="50" >
      </div>
    </div>
    <div class="row">
    <!--  <button type="submit" class="cancelbtn" value="save" name="save" formaction="skills.php">Save</button> -->
      <button type="submit" class="signupbtn" value="next" name="next" formaction="experience.php">Next</button>
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
