<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Other tags -->
  <meta name="dicoding:email" content="valentinookt45@gmail.com">
    <!-- Other tags -->
  <title>Find the Field</title>
  <link rel="shortcut icon" href="assets/Logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    
    <style>
  	body { 
			padding-top: 50px;
			background-color:white;	
	 }
    .modal-title {
      color: #424e5e;
    }
    a {
      color: #870000;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #0a942f;
      padding: 25px;
      color: white;
    }
    .bg-video {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 50%;
      min-height: 50%;
      width: auto;
      height: autvideoo;
      transform: translateX(-50%) translateY(-50%);
      z-index: 0;
    }

    .masthead {
      position: relative;
      overflow: hidden;
      z-index: 2;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white; 
      
    }
    .masthead:before {
      content: "";
      position: absolute;
      top: 0;
      bottom: 0;
      right: 0;
      left: 0;
      height: 70%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.85);
    }
    .masthead .masthead-content {
      position: relative;
      max-width: 40rem;
      padding-top: 3rem;
      padding-bottom: 5rem;
    }
    .masthead .masthead-content h1, .masthead .masthead-content .h1 {
      font-size: 2rem;
      text-align: center;
    }
    .masthead .masthead-content p {
      font-size: 1.2rem;
      text-align: center;
    }
    .masthead .masthead-content p strong {
      font-weight: 700;
    }
    .masthead .masthead-content .input-group-newsletter input {
      height: auto;
      width: 100%;
      font-size: 1rem;
      padding: 1rem;
    }
    .masthead .masthead-content .input-group-newsletter button {
      font-size: 0.85rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: calc(1rem + 2px);
    }
    img {
      display: block;
      margin-left: auto;
      margin-right:  auto;
    }
    @media (min-width: 992px) {
    .masthead {
      height: 100%;
      width: 80%;
      min-height: 0;
      padding-bottom: 120px;
      margin: 0px 120px 0px 120px;
    }
    .masthead:before {
      transform: skewX(-9deg);
      transform-origin: top right;
    }
  }
  </style>
</head>
<body>
<?php 
  include ("navbar1.php");
    include "member_login.php";
    include "adm_login.php"
?>
  <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="assets/bola.mp4" type="video/mp4" /></video>
  <div class="masthead">
    <div class="masthead-content text-white">
      <div class="container-fluid px-4 px-lg-0">
        <img src="assets/Logo.png" alt="" width="80" height="80"><br>
        <h1 class="fst-italic lh-1 mb-4"><b>Welcome to Find the Field</b></h1>
        <p class="mb-5">Web ini berfungsi sebagai Web Booking Lapangan Futsal</p>
        <p class="mb-5"><i>Silahkan pesan lapangan yang anda sukai di web ini!</i></p>
      </div>
    </div>
  </div>
</body>
</html>
