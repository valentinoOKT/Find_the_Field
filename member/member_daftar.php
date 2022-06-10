<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pendaftaran Member</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <style media="screen">
  	body { padding-top: 70px; }
    h3, h5 {

      color: #424e5e;
    }
    h4{
      color: 	#d34e5b;
    }

  </style>
</head>
<body>
    <?php
    include "navbar.php";
     ?>
  <div class="container">
    <?php
    include "member_login.php";
     ?>
     
     <?php
include ("../koneksi.php");
if(isset($_POST['submit'])){
 $username = $_POST['username'];
 $nama = $_POST['nama'];
 $password = $_POST['password'];

 echo "<script> alert(\"Registarsi Berhasil !! Silahkan login sebagai member dengan akun yang sudah anda buat.\"); window.location = \"member_daftar.php\"; </script>";
 //acak karakter
		$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE username_member ='$username'"));
		if($cek > 0){
			echo "<script>window.alert('Username yang anda masukan sudah ada')
		window.location='member_daftar.php'</script>";
		} elseif($_POST['username'] == ''){
			echo "<script>window.alert('Username belum diisi')
		window.location='member_daftar.php'</script>";
		} else {
			 $sql = "insert into member values ('$username','$nama','$password')";
			 $query = mysqli_query($koneksi,$sql);
    }}
  ?>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3"></div>
      <div class="col-sm-8">

      </div>
    </div>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
          <h3><b>Anda Mendaftar Sebagai Member</b></h3>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="username">Nama Lengkap</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nama" id="pwd" placeholder="Nama Lengkap" required>
        </div>
        <div class="col-sm-4"></div>
      </div>
      
       <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="username">Username</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="username" id="pwd" placeholder="Username" required>
        </div>
        <div class="col-sm-4"></div>
      </div>
          <div class="form-group">
            <div class="col-sm-3"></div>
            <label class="control-label col-sm-1" for="username">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="pwd" placeholder="Password" required>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="control-label col-sm-3" for="username">Konfirmasi Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Konfirmasi Password" required>
            </div>
            <div class="col-sm-4"></div>
          </div>
              <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-danger btn-block" name="submit">Daftar</button>
                </div>
                <div class="col-sm-5"></div>
              </div>
              </br>

    </form>
    
  </div>
  <br><br><br><br><br>
</body>
<!-- jQuery -->
    <script src="../admin/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../admin/assets/vendors/nprogress/nprogress.js"></script>
  <!-- jQuery Smart Wizard -->
    <script src="../admin/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../admin/assets/build/js/custom.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/min/moment.min.js"></script>
<script src="../assets/js/moment.js"></script>
</html>