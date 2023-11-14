<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:signin.php');
    exit;
}
require 'connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  </head> 
  <body>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <img class="mb-4" src="image/Activity-3-10-2566-removebg-preview.png" alt="" width="200" height="100"> 
        <span class="fs-4">Simple header</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a id="nav-activity" href="index.php" class="nav-link">Activity</a></li>
        <li class="nav-item"><a id="nav-report" href="report.php" class="nav-link">Report</a></li>
      </ul>
      <div class="dropdown text-end ms-3">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            $sql = "SELECT image 
            FROM student WHERE 
            studentID = '{$_SESSION['user']['studentID']}'";
            $result = $conn -> query($sql);
            $image = $result ->fetch_assoc()['image'];
            if($image) {
              echo "<img src = 'image/profile/$image'class='rounded-cricle' height='42'>";
            } 
            else {
          echo '<span class="material-symbols-outlined" style = "font-size:42px;">
face_5
</span>';
          }
          ?>
           <!--<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> -->
          </a>
          <ul class="dropdown-menu text-small" style="">
            <li><div class="dropdown-item"><?php echo $_SESSION ['user']['studentName'];?></div></li>
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
          </ul>
        </div>
    </header>