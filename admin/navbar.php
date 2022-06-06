<?php 
include ("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
	$sql = "select * from admin where username = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
    
      <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0a942f;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color: white;">Find The Field</a>
          </div>



          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="w3-hide-small w3-dropdown-hover">
              <a href="#" class="w3-padding-large w3-hover-white" style="color: white;">&nbsp;&nbsp;Hi, <?php echo $sql_sel['nama_adm']; ?> &nbsp;<i class="fa fa-caret-down"></i></a>
                <div class="w3-dropdown-content w3-white w3-card-4">
                  <a href="adm_profil.php"><i class="fa fa-user"></i>&nbsp;Accounts</a>
                  <!--<a href="#"><i class="fa fa-cog"></i>&nbsp;Settings</a>-->
                  <a href="../logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                </div>
               </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    <?php
	} else {
		?>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Find the Field</a>
          </div>



          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" action="../fitur_cari.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="mencari">
              </div>
              <button type="submit" name="cari" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>

            

            <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-right">
                &nbsp;&nbsp;&nbsp;&nbsp;Masuk sebagai &nbsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Member</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal2">admin</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </form> 
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<?php
		}
?>