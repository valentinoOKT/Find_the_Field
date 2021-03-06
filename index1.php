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
  </style>
</head>
<body>
<?php 
include "koneksi.php";
$tanggal = date('Y-m-d', time()+60*60*6); //variabel berisi tanggal sekarang
$jam = date('H:i:s', time()+60*60*6); //variabel berisi jam sekarang
$tanggaljam = date('Y-m-d H:i:s', time()+60*60*6); //variabel berisi tanggal dan jam sekarang
//echo $tanggaljam;
//$tanggaljam1 = '2016-12-30 10:00:00';
$tanggal1 = '2017-01-01';
//$jam1 = '10:00:00';
$cektr = mysqli_query($koneksi,"select * from transaksi");
$cek = mysqli_num_rows($cektr);
$les = mysqli_fetch_array($cektr);

if($cek > 0){
  //Dibatalkan jika bayar transfer dan telah melewati batas bayar
  mysqli_query($koneksi, "update transaksi set status='Dibatalkan' where batas_bayar <= '$tanggaljam' && jenis_bayar = 'transfer' && (status!='Telah Dikonfirmasi' && status!='Lunas')");
  //Dibatalkan jika bayar cod , statusnya masih belum transfer dan telah melewati batas bayar
  mysqli_query($koneksi, "update transaksi set status='Dibatalkan' where batas_bayar <= '$tanggaljam' && jenis_bayar = 'cod' && (status='Menunggu Pembayaran')");
  //Selesai jika jam berakhir telah melewati waktu sekarang
  mysqli_query($koneksi, "update transaksi set status='Selesai' where ((tgl_main <='$tanggal' && jam_berakhir <='$jam') || (tgl_main <='$tanggal' && jam_berakhir >='$jam')) && (status!='Dibatalkan' && status!='Lunas')");
    }

?>
  <?php
  include "navbar.php";
    include "member_login.php";
    include "adm_login.php";
     ?>

<div >
    <div class="container w3-content" style="max-width:1500px;margin-top:20px">
      <!-- The Grid -->
      <div class="w3-row">
        
        
        <?php
		$qry = "select * from lapangan";
		$ck = mysqli_query($koneksi,$qry);
		$cek = mysqli_num_rows($ck);
		
		if($cek <> 0){?>
          <!-- Middle Column -->
        <div class="w3-col m9" style="margin-top:-10px; width: 100%; display:grid;grid-template-columns: auto auto; grid-gap: 10px">
         <?php
    $batas = 10;
    $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";

    if ( empty( $pg ) ) {
    $posisi = 0;
    $pg = 1;
    } else {
    $posisi = ( $pg - 1 ) * $batas;
    }

    $sql = mysqli_query($koneksi,"select lapangan.* from lapangan inner join admin on (lapangan.username=admin.username) limit $posisi, $batas");
    $no = 1+$posisi;
    while ( $r = mysqli_fetch_array( $sql ) ) {
    ?>
    
    
      
        
    <div class="w3-container w3-card-2 w3-round" style="margin-top:10px; background-color:#10b542">
      <br>
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
                  <button type="submit" class="w3-margin-bottom" ><i class="glyphicon glyphicon-book" ></i> ??Pesan</button>
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
    $jml_data = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM lapangan"));
    //Jumlah halaman
    $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas


    //Tampilkan navigasi
    //echo $prev . $nmr . $next;
    ?>
    <?php
		} else {
	 ?>
         <h4>Tidak Ada Data</h4>
    
     <?php
    }
     ?>
    </div>
  </div>   
</div>
</body>
<br>
    <?php 
    include ("footer.php"); 
    ?>
  