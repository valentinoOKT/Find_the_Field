<?php
require ("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['member'])){
	$username = $_SESSION['member'];
	$sql = "select * from member where username_member = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Other tags -->
  <meta name="dicoding:email" content="valentinookt45@gmail.com">
    <!-- Other tags -->
  <title>Halaman Member</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../assets/Logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="../assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
    <link href="../admin/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <style>
    body {
		background-color:#CCC;
		}
    </style>
</head>
<body>
 <!-- edit atau delete lapangan maupun tambah -->
  <?php 
	include ("navbar.php");
	?>
    <?php 
if(isset($_GET['lap'])){
if($_GET['lap']=="delete"){
	$data = mysqli_query($koneksi, "select * from lapangan where id_lap = '$_GET[id_lap]'");
	$isi = mysqli_fetch_array($data);
	
	$nama = $isi['foto'];
	unlink('assets/foto/'.$nama);
	mysqli_query($koneksi,"delete from lapangan where id_lap = '$_GET[id_lap]'") or die (mysqli_error());
	echo "<script language='javascript'>
                    window.location='adm_profil.php';
                    </script>";
}}?>
<!-- Page Container -->
<div class="container-fluid w3-content" style="max-width:1400px;margin-top:60px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
        <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-tags fa-fw w3-margin-right"></i> My Booking Schedule</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
      			<a href="member_profil.php?url=konfirmasi"> Bayar Online (Transfer)</a>
            <a href="member_profil.php?url=bay_offline"> Bayar Offline (COD)</a>
          </div>
        
          <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Riwayat Booking</button>
          <div id="Demo2" class="w3-accordion-content w3-container">
			      <a href="member_profil.php?url=history"> Riwayat Booking</a>
          </div>
          
        </div>
      </div>
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m9">
    
    
    <!-- PHP MIDDLE VIEW -->
    <?php
    	if(isset($_GET['url'])){
        	if($_GET['url']=="history"){
				include "member_riwayat_booking.php";
      ?> 
      
      <?php
      		}elseif($_GET['url']=="konfirmasi"){
				include "member_bayar_online.php";
      ?>
      
      <?php
      		}elseif($_GET['url']=="bay_offline"){
				include "member_bayar_offline.php";
      ?>
      
      <?php
      }
      ?>
      
      <?php 
      		}else{
				include "member_riwayat_booking.php";
      ?>
       
      	
      <?php
      }
      ?>
      

    <!-- End Middle Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div></div>
</div>
<br>

<!-- Footer -->

<?php  
}else {
    echo "<script> alert(\"Silakan Login Terlebih Dahulu\"); window.location = \"../index.php\" </script>";
  }
     ?>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!-- Page-Level Plugin Scripts-->
    <script src="../assets/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/dataTables/dataTables.bootstrap.js"></script>
    <script src="../admin/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../admin/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../admin/assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    
    <script>
	
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lap_edit.php",
    			   type: "GET",
    			   data : {id_lap: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

</body>
</html>
   