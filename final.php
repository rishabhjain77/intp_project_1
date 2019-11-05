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
if(isset($_POST['finish'])){
$email=$_SESSION['user'];
$company_name1=$_POST['company_name1'];
$years1=$_POST['years1'];
$job_desc1=$_POST['job_desc1'];
$company_name2=$_POST['company_name2'];
$years2=$_POST['years2'];
$job_desc2=$_POST['job_desc2'];
$company_name3=$_POST['company_name3'];
$years3=$_POST['years3'];
$job_desc3=$_POST['job_desc3'];
mysqli_query($conn,"insert into experience (email,company_name1,years1,job_desc1,company_name2,years2,job_desc2,company_name3,years3,job_desc3) values ('$email','$company_name1','$years1','$job_desc1','$company_name2','$years2','$job_desc2','$company_name3','$years3','$job_desc3')");
}
if(isset($_POST['finish'])){
$email=$_SESSION['user'];
$password=$_SESSION['password'];
$result=mysqli_query($conn,"select email,password from login where email='$email' and password='$password'");
$count=mysqli_num_rows($result);
if($count!=0){
  $query1=mysqli_query($conn,"select * from personal where email='$email'");
  $personal=mysqli_fetch_assoc($query1);
  $query2=mysqli_query($conn,"select * from education where email='$email'");
  $education=mysqli_fetch_assoc($query2);
  $query3=mysqli_query($conn,"select * from skills where email='$email'");
  $skills=mysqli_fetch_assoc($query3);
  $query4=mysqli_query($conn,"select * from experience where email='$email'");
  $experience=mysqli_fetch_assoc($query4);
  $query5 = mysqli_query($conn,"select * from images where email='$email'");
  $images = mysqli_fetch_assoc($query5);

  }
}
?>
<!DOCTYPE html>
<html>
<title>CV</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">

      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $personal['firstname'];  ?></h2>
          </div>
        <!--  <img src="aboutme.png" style="width:100%" alt="Avatar"> -->
          <img src="<?php echo $images['encoded_image']; ?>" style="width:100%" alt="Image" />

        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $experience['years1'];?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $personal['country']; ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $email;?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $personal['contact'];?></p>
          <hr>
          <?php
          $skill_1_per=$skills['skill_1_per'];
          $skill_2_per=$skills['skill_2_per'];
          $skill_3_per=$skills['skill_3_per'];

          if($skills['skill_1']!="" && $skill_1_per!=""){
            ?>
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p><?php echo $skills['skill_1'];?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $skill_1_per;?>%"><?php echo $skill_1_per;?>%</div>
          </div>
        <?php }
          if($skills['skill_2']!=""&& $skill_2_per!=""){
          ?>
          <p><?php echo $skills['skill_2'];?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $skill_2_per;?>%"><?php echo $skill_2_per;?>%</div>
            </div>
            <?php}
            if($skills['skill_3']!="" && $skill_3_per!=""){
            ?>
          <p><?php echo $skills['skill_3'];?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:<?php echo $skill_3_per;?>%"><?php echo $skill_3_per;?>%</div>
          </div>
        <?php } ?>
          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <br>
          <div>
           <form  method="post">
              <!--<button type="submit" class="signupbtn" value="next" name="download" formaction="final.php">Download</button>-->
              <button type="submit" class="cancelbtn" value="logout" name="logout" formaction="first_page(1).php">Logout</button>
            </form>
          </div>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $experience['company_name1'];?></b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $experience['years1']; ?> <span class="w3-tag w3-teal w3-round">Current</span></h6>
          <p><?php echo $experience['job_desc1']; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $experience['company_name2'];?></b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $experience['years2']; ?></h6>
          <p><?php echo $experience['job_desc2']; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $experience['company_name3'];?></b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $experience['years3']; ?></h6>
          <p><?php echo $experience['job_desc3']; ?> </p><br>
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $education['collegename'];  ?></b></h5>
          <p></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $education['undergraduation']; ?></b></h5>
          <p><?php echo $education['undergraduation_degree'];  ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $education['postgraduation'];  ?></b></h5>
          <p><?php echo $education['postgraduation_degree'] ; ?></p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
<p>Find me on social media.</p>
  <a href="https://www.facebook.com/"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
  <a href="https://www.instagram.com/blablabluomie/"><i class="fa fa-instagram w3-hover-opacity" ></i></a>
  <a href="https://www.snapchat.com/add/omieblablablu"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <a href="https://twitter.com/login?lang=en"><i class="fa fa-twitter w3-hover-opacity"></i></a>
  <a href="https://www.linkedin.com/in/omkar-b-7375b1189"><i class="fa fa-linkedin w3-hover-opacity" ></i></a>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>
<?php
if(isset($_POST['download'])){
  require 'pdfcrowd.php';

  try
  {
      // create the API client instance
      $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

      // run the conversion and write the result to a file
      $client->convertFileToFile("final.php", "MyCV.pdf");
  }
  catch(\Pdfcrowd\Error $why)
  {
      // report the error
      error_log("Pdfcrowd Error: {$why}\n");

      // handle the exception here or rethrow and handle it at a higher level
      throw $why;
  }

}

?>
