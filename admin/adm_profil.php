<?php
require ("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'];
	$sql = "select * from admin where username = '$username'";
	$query_sel = mysqli_query($koneksi,$sql);
	$sql_sel = mysqli_fetch_array($query_sel);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Admin</title>
  <link rel="shortcut icon" href="../assets/Logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

  <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- <link href="../assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> -->
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
	include ("lap_tambah.php");
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
<!-- Container -->
<div class="container-fluid w3-content" style="max-width:1400px;margin-top:60px">

<!-- Modal Popup untuk Harga--> 
<div id="Modalharga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- Modal Popup untuk bayar offline--> 
<div id="Modalbayar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data lapangan ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">

      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Data </button>
          <div id="Demo1" class="w3-accordion-content w3-container">
            <a href="adm_profil.php">Lapangan</a>
            <a href="adm_profil.php?url=konfirmasi"> Konfirmasi Pesan Online</a>
            <a href="adm_profil.php?url=mBayOff"> Konfirmasi Main Bayar Offline</a>

          </div>

          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-tags fa-fw w3-margin-right"></i> Pembayaran</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
			<a href="adm_profil.php?url=bayaroff"> Bayar Offline</a>
			
          </div>
          
          <div class="w3-accordion-content w3-container">
         <div class="w3-row-padding">
         <br>
         	<?php 
			$z = mysqli_query($koneksi, "select * from lapangan where username='$username'");
			while($c = mysqli_fetch_array($z)){
			?>
            <div class="w3-half">
             <img src="assets/foto_lap/<?php echo $c['foto']; ?>" style="width:100%" class="w3-margin-bottom">
             </div>
            <?php } ?>
           
         </div>
          </div>
        </div>
      </div>
    <!-- Akhir Kolom Kiri-->
    </div>

    <!-- Kolom Tengah -->
    <div class="w3-col m9">
    
    
    <!-- Php Bagian Tengah -->
    <?php
    	if(isset($_GET['url'])){
        	if($_GET['url']=="pesanoff"){
      		//include "opt_pesan_off.php";
	  ?>
       <?php
	   		}elseif($_GET['url']=="bayaroff"){
				include "adm_bayar_offline.php";
      ?>    
      <?php
	   		}elseif($_GET['url']=="mBayOff"){
				include "adm_bayaroff_konfirmasi.php";
      ?>
      
      <?php
      		}elseif($_GET['url']=="konfirmasi"){
      		include "adm_online_konfirmasi.php";
	  ?>
      
      
      <?php
      }
      ?>
      
      <?php 
      		}else{
      ?>
      
      <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
          	<div class="w3-row-padding" style="margin:0 -16px">
            
            <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Lapangan&nbsp;<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>  Tambah</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>ID</th>
                                            <th>No Lapangan</th>
                                            <th>Jenis Lapangan</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     		<?php
											
											$sql_sel = "select * from lapangan where username = '$username'";
											$query_sel = mysqli_query($koneksi,$sql_sel);
											while($sql_res = mysqli_fetch_array($query_sel)){
											?>
                                        <tr>
                                            <td><img src="assets/foto_lap/<?php echo $sql_res['foto']; ?>" width="30" height="30"></td>
                                            <td><?php echo $sql_res['id_lap']; ?></td>
                                            <td><?php echo $sql_res['no_lap']; ?></td>
                                            <td><?php echo $sql_res['jenis_rumput']; ?></td>
                                            <td class="center"><?php
													                  echo $sql_res['harga'];
											                      ?></td>
                                            <td class="center">
                                            <a href="#" class='open_modal btn btn-primary btn-xs' id='<?php echo $sql_res['id_lap']; ?>'><span class="glyphicon glyphicon-edit"></span> Edit</a>&nbsp
                                            <a href="#" onClick="confirm_modal('lap_pro_del.php?&id_lap=<?php echo $sql_res['id_lap']; ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
                                           
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>

                                       
                                            	
                            </div>
                    
        	</div>
      </div>
      
      
      	
      <?php
      }
      ?>
      

    <!-- Akhir Kolom Tengah -->
    </div>
  </div>

<!-- Akhiran halaman container -->
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

// Digunakan untuk mengaktifkan menu pada layar yang lebih kecil saat mengklik tombol menu
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

    <!-- /Data tabel -->

<script>
		$(function() {
			$("#no_lap1").change(function(){
				var no_lap = $("#no_lap1 option:selected").val();
				var username = $("#username1").val();
				

				$.ajax({
					url: 'get_adm.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'no_lap': no_lap
					},
					success: function (lap) {
						$("#id_lap1").val(lap['id_lap']);
						$("#jenis_rumput1").val(lap['jenis_rumput']);
						$("#harga1").val(lap['harga']);
						$("#username1").val(lap['username']);

					}
				});
			});
		});
	</script>
    <script>
    $(function() {
			$("#durasi").change(function(){
				var durasi = $("#durasi option:selected").val();
				var id_lap = $("#id_lap1").val();
				

				$.ajax({
					url: 'trans_get_harga.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'id_lap': id_lap
					},
					success: function (siswa) {
						$("#total").val(siswa['harga']*durasi);
					}
				});
			});
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
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal1").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lap_harga.php",
    			   type: "GET",
    			   data : {id_lap: m,},
    			   success: function (ajaxData){
      			   $("#Modalharga").html(ajaxData);
      			   $("#Modalharga").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_bayar").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "adm_bayar_off.php",
    			   type: "GET",
    			   data : {id_book: m,},
    			   success: function (ajaxData){
      			   $("#Modalbayar").html(ajaxData);
      			   $("#Modalbayar").modal('show',{backdrop: 'true'});
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
    <script src="../admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

		<script src="../assets/js/moment.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
       
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker').datetimepicker({
					format: 'DD MMMM YYYY HH:mm',
                });
				
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				
				$('#timepicker').datetimepicker({
					format: 'HH:mm'
				});
			});
		</script>

<!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

      });
    </script>
    <!-- /jQuery Smart Wizard -->
    <!-- Total Harga -->
    
    
    <!-- Data tabel -->
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
    <script language="javascript">
	function tambahharga() {
    		var idf = document.getElementById("idf").value;
			var stre;
			stre="<div class='row' id='srow" + idf + "'><div class='col-sm-1'></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='hari1[]' id='sel1'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jum'at</option><option>Sabtu</option><option>Minggu</option></select></div></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='hari2[]' id='sel1'><option>Senin</option><option>Selasa</option><option>Rabu</option><option>Kamis</option><option>Jum'at</option><option>Sabtu</option><option>Minggu</option></select></div></div><div class='col-sm-1'></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='jam1[]' id='sel1'><option>00:00</option><option>01:00</option><option>02:00</option><option>03:00</option><option>04:00</option><option>05:00</option><option>06:00</option><option>07:00</option><option>08:00</option><option>09:00</option><option>10:00</option><option>11:00</option><option>12:00</option><option>13:00</option><option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option><option>18:00</option><option>19:00</option><option>20:00</option><option>21:00</option><option>22:00</option><option>23:00</option></select></div></div><div class='col-sm-1'><div class='form-group'><select class='form-control' name='jam2[]' id='sel1'><option>00:00</option><option>01:00</option><option>02:00</option><option>03:00</option><option>04:00</option><option>05:00</option><option>06:00</option><option>07:00</option><option>08:00</option><option>09:00</option><option>10:00</option><option>11:00</option><option>12:00</option><option>13:00</option><option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option><option>18:00</option><option>19:00</option><option>20:00</option><option>21:00</option><option>22:00</option><option>23:00</option></select></div></div><div class='col-sm-1'></div><div class='col-sm-2'><div class='form-group'><input type='text' class='form-control' name='harga[]' id='usr'></div></div><div class='col-sm-1'><button class='btn btn-primary' onclick='hapusElemen(\"#srow" + idf + "\"); return false;'><span class='glyphicon glyphicon-minus'></span></button></div></div>";
    		$("#divHarga").append(stre);	
    		idf = (idf-1) + 2;
    		document.getElementById("idf").value = idf;
		}
	function hapusElemen(idf) {
    		$(idf).remove();
		}
</script>
</body>
</html>
   