<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masuk sebagai member</h4>
      </div>
        <form class="form-horizontal" action="../index1.php" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3" for="username">Username</label>
            <div class="col-sm-8">
              <input type="text" name="username" class="form-control" id="pwd" placeholder="Enter username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Password</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary" name="loginmember"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Masuk</button>
              &nbsp;&nbsp;&nbsp;  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
	include ("../koneksi.php");

	if(isset($_POST['loginmember'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from member where username_member = '$username' ";
		$query = mysqli_query($koneksi,$sql);
		
		$cek = mysqli_num_rows($query);
		
		if($cek <> 0 ){
			$sql_sel = mysqli_fetch_array($query);
			$cekuser = $sql_sel['username_member'];
			$cekpass = $sql_sel['password'];

				if($username == $cekuser){
					if($_POST['password'] == $cekpass){
						session_start();
						$_SESSION['member']=$cekuser;
							echo "<script> window.location = \"../index1.php\"; </script>";
						} else {
							echo "<script> alert(\"Password salah\"); window.location = \"../index.php\"; </script>";
						}
					} else {
						echo "<script> alert(\"Username salah\"); window.location = \"../index.php\"; </script>";	
					}
			} else {
				echo "<script> alert(\"Username tidak ditemukan\"); window.location = \"../index.php\"; </script>";
				}
		
		}
	?>
  </div>
</div>
