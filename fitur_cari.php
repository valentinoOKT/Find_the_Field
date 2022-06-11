<!DOCTYPE html>
<html lang="en">
<head>
  <title>Searching</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="assets/images/Goputsalgaji.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <style>
  	body{ 
			padding-top: 40px;
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

  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
	  margin-top:50px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
    }
  }
  </style>
</head>
<body>
  <?php
  include "navbar.php";
    include "member_login.php";
    include "adm_login.php";
     ?>

        <!-- Page Container -->
        <div class="container w3-content" style="max-width:800px;margin-top:20px">
      <!-- The Grid -->

          <!-- Middle Column -->
        <div class="w3-col m9" style="margin-top:-10px; width: 100%">
           
        <?php 
		include ("koneksi.php");
		$batas = 3;
		$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
	
		if ( empty( $pg ) ) {
		$posisi = 0;
		$pg = 1;
		} else {
		$posisi = ( $pg - 1 ) * $batas;
		}
		
		
    if(isset($_POST['cari'])){ //jika search dilakukan maka menjalankan query bagian ini
			if(!($_REQUEST['mencari'] == '')){ // jika form cari tidak kosong
				$cari = $_REQUEST['mencari']; //variabel berisi inputan dari search
			  $sql = "select lapangan.* from lapangan inner join admin on (lapangan.username=admin.username) where no_lap like '%$cari%' limit $posisi, $batas"; //query memilih data dari tabel lapangan dan admin yang memiliki nomor tempat futsal mirip dengan yang dicari 
			}else{ // jika form cari kosong
				$sql = "select lapangan.* from lapangan inner join admin on (lapangan.username=admin.username) where no_lap like '%%' limit $posisi, $batas"; //query memilih data dari tabel lapangan dan admin yang memiliki nomor tempat futsal mirip dengan yang dicari
			}
		} 
			$mencari = mysqli_query($koneksi,$sql);
			$no = 1+$posisi;
			while($r = mysqli_fetch_array($mencari)){ 
		?>
        
        
   
    
        <div class="w3-container w3-card-2 w3-round" style="margin-top:10px; background-color:#076921"><br>
         
         <div class="w3-row-padding" style="margin:0 -16px">
           <div class="w3-half">
             <img src="admin/assets/foto_lap/<?php echo $r['foto']; ?>" style="width:100%; min-height:100%;" alt="Gambar Lapangan" class="w3-margin-bottom">
           </div>
           <form action="transaksi.php" method="post">
           <input type="hidden" name="id_lap" value="<?php echo $r['id_lap']; ?>">
           <div class="w3-half" style="color:white;">
             <i class="fa fa-list-alt" aria-hidden="true"></i> Lapangan Nomor&nbsp;<?php echo $r['no_lap']; ?><br><br>
             <i class="fa fa-life-ring" aria-hidden="true"></i> Lapangan <?php echo $r['jenis_rumput']; ?><br><br>
             <i class="fa fa-tags" aria-hidden="true"></i> Rp. <?php echo $r['harga']; ?> per jam<br><br><br><br>
             
           </div>
           <div class="w3-right">
             <button type="submit" class="w3-margin-bottom"><i class="glyphicon glyphicon-book" ></i>  Pesan</button>
           </form>
           </div>
           </div>
       
       
     </div>
			
        
        <?php
    $no++;
    }
    ?>
    <?php
    //hitung jumlah data
    $jml_data = mysqli_num_rows(mysqli_query($koneksi,$sql));
	if($jml_data == 0 ){
		echo "<h4 align='center'>Data tidak ditemukan..</h4>";
		}else{
    //Jumlah halaman
    $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas

    //Navigasi ke sebelumnya
    if ( $pg > 1 ) {
    $link = $pg-1;
    $prev = "<li><a href='?pg=$link' aria-label='previous'>
            <span aria-hidden='true'>&laquo;</span>
          </a></li>";
    } else {
    $prev = "<li class='disabled'><a href='' aria-label='previous'>
            <span aria-hidden='true'>&laquo;</span>
          </a></li>";
    }

    //Navigasi nomor
    $nmr = '';
    for ( $i = 1; $i<= $JmlHalaman; $i++ ){

    if ( $i == $pg ) {
    $nmr .= "<li class='active'><a href='#'>$i <span class='sr-only'>(current)</span></a></li>";
    } else {
    $nmr .= "<li><a href='?pg=$i'>$i</a></li>";
    }
    }

    //Navigasi ke selanjutnya
    if ( $pg < $JmlHalaman ) {
    $link = $pg + 1;
    $next = "<li><a href='?pg=$link' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
          </a></li>";
    } else {
    $next = "<li class='disabled'><a href='' aria-label='Next'>
            <span aria-hidden='true'>&raquo;</span>
          </a></li>";
    } ?> 
	<nav aria-label="Page navigation" class="w3-center">
      <ul class="pagination">
        <?php echo $prev; ?>
        
         <?php echo $nmr; ?>
       
          <?php echo $next; ?>
        
      </ul>
    </nav>
	<?php
		}
    //Tampilkan navigasi
    //echo $prev . $nmr . $next;
    ?>
    
    
    
    	<!-- End Middle Column -->
        </div>
      <!-- End Grid -->
      </div>
    
    <!-- End Page Container -->
    </div>
    <br>
       
           </div>
         </div><br><br>

<?php include ("footer.php"); ?>
</body>
</html>
