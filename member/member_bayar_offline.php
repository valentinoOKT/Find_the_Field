<div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <h4>Bayar Offline (COD)</h4>
        <hr class="w3-clear">
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Pemesanan Anda
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Main</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Batas Bayar</th>
                                            <th>Nomor Lapngan</th>
                                            <th>Total Bayar</th>
                                            <th>Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     		$sql_sel = "select * from transaksi where ((status='Menunggu Pembayaran' or status='Belum Lunas' or status='Lunas') and jenis_bayar = 'cod') and username_member='$username' ";
                                            $query_sel = mysqli_query($koneksi,$sql_sel);
                                            while($sql_res = mysqli_fetch_array($query_sel)){
                                                                                
                                        ?>
                                              <tr>
                                                
                                                 <td><?php echo $sql_res['tgl_main']; ?></td>
                                                 <td><?php echo $sql_res['jam_mulai']; ?></td>
                                                 <td><?php echo $sql_res['jam_berakhir']; ?></td>
                                                 <td><?php echo $sql_res['batas_bayar']; ?></td>
                                                 <td><?php 
												 $s = mysqli_query($koneksi,"select lapangan.*, admin.* from lapangan inner join admin on lapangan.username=admin.username where id_lap='$sql_res[id_lap]'");
												 $p = mysqli_fetch_array($s);
												 echo "$p[id_lap] ($p[no_lap])"; ?></td>
                                                 <td><?php echo $sql_res['total_harga']; ?></td>
                                                 
                                                  <td>
                                                  <?php
												  $t = mysqli_fetch_array(mysqli_query($koneksi,"select * from bayar_cod where id_book='$sql_res[id_book]'"));
                                                    if( $t > 0){
                                                        echo "$t[bayar]";
                                                        } else {
                                                        echo "0";
															}
                                                   ?>
                                                  </td>
                                                  <td><?php echo $sql_res['status']; ?></td>
                                                 </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
        </div>
      </div>
      </div></div></div>