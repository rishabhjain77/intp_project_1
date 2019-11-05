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
mysqli_query($conn,"create table education(email varchar(40),schoolname varchar(20),collegename varchar(20),undergraduation varchar(20),postgraduation varchar(20),
undergraduation_degree varchar(20),postgraduation_degree varchar(20))");

if(isset($_POST['next'])){
$email=$_SESSION['user'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$country=$_POST['country'];
$address=$_POST['address'];
$contact=$_POST['contact'];
mysqli_query($conn,"insert into personal (email,firstname,lastname,country,address,contact) values ('$email','$firstname','$lastname','$country','$address','$contact')");
/*if(isset($_FILES['image'])){
#$check = getimagesize($_FILES["image"]["tmp_name"]);
#if($check !== false){
$image = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));
$insert = mysqli_query($conn,"insert into images (email, image) VALUES ('$email','$imgContent')");
}*/
if(isset($_FILES['uploadFile']['name']) && !empty($_FILES['uploadFile']['name'])) {
        //Allowed file type
        $allowed_extensions = array("jpg","jpeg","png","gif");

        //File extension
        $ext = strtolower(pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION));

        //Check extension
        if(in_array($ext, $allowed_extensions)) {
           //Convert image to base64
           $encoded_image = base64_encode(file_get_contents($_FILES['uploadFile']['tmp_name']));
           $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;
           #$query = "insert into `images set `encoded_image` = '".$encoded_image."'";
           mysqli_query($conn, "insert into images(email,encoded_image) values ('$email','$encoded_image')");
          # echo "File name : " . $_FILES['uploadFile']['name'];
           #echo "<br>";
           if(mysqli_affected_rows($conn) > 0) {
              #echo "Status : Uploaded";
              #alert("Uploaded");
              $last_insert_id = mysqli_insert_id($conn);
           } else {
              echo "Status : Failed to upload!";
           }
       } else {
           echo "File not allowed";
       }
  }
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
      <h2>Education Details</h2>
      <form action="skills.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="schoolname">School Name 10th</label>
      </div>
      <div class="col-75">
        <input type="text" id="school" name="school" placeholder="School name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="collegename">College Name 12th</label>
      </div>
      <div class="col-75">
        <input type="text" id="college" name="college" placeholder="College name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="undergraduation">Undergraduation college name</label>
      </div>
      <div class="col-75">
        <input type="text" id="undergraduation" name="undergraduation" placeholder=" Undergraduation College name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="postgraduation">Postgraduation college name</label>
      </div>
      <div class="col-75">
        <input type="text" id="postgraduation" name="postgraduation" placeholder=" Postgraduation College name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="undergraduation_degree">Undergraduation in:</label>
      </div>
      <div class="col-75">
        <input type="text" id="undergraduation_degree" name="undergraduation_degree" placeholder=" Undergraduation Degree name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="postgraduation_degree">Postgraduation In:</label>
      </div>
      <div class="col-75">
        <input type="text" id="postgraduation_degree" name="postgraduation_degree" placeholder=" Postgraduation Degree name..">
      </div>
    </div>
    <div class="row">
    <!--  <button type="submit" class="cancelbtn" value="save" name="save" formaction="school.php">Save</button> -->
      <button type="submit" class="signupbtn" value="next" name="next" formaction="skills.php">Next</button>
    </div>
  </form>
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a class="active" href="#">2</a>
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
