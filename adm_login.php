<div id="Modal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masuk sebagai admin</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
            <label class="control-label col-sm-3" for="username">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="username" id="pwd" placeholder="Enter username" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary" name="loginopt"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Masuk</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
    <?php 
	include ("koneksi.php");
	if(isset($_POST['loginopt'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from operator where username = '$username' ";
		$query = mysqli_query($koneksi,$sql);
		
		$cek = mysqli_num_rows($query);
		
		if($cek <> 0 ){
			$sql_sel = mysqli_fetch_array($query);
			$cekuser = $sql_sel['username'];
			$cekpass = $sql_sel['password'];
			
				if($username == $cekuser){
					if($_POST['password'] == $cekpass){
						session_start();
						$_SESSION['operator']=$cekuser;
							echo "<script> window.location = \"operator/adm_profil.php\"; </script>";
						} else {
							echo "<script> alert(\"Password Salah\"); window.location = \"index.php\"; </script>";
						}
					} else {
						echo "<script> alert(\"Username Salah\"); window.location = \"index.php\"; </script>";	
					}
			} else {
				echo "<script> alert(\"Username tidak ditemukan\"); window.location = \"index.php\"; </script>";
				}
	
	}
	?>
    

  </div>
</div>
