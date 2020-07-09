<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }
    $Iklan = mysqli_query($konek, "SELECT * FROM tb_toko inner JOIN tb_iklan ON tb_toko.CustomerCode=tb_iklan.CustomerCode ORDER BY tb_iklan.id DESC");

?>
<div class="panel-content">
          <div class="main-title-sec">
               <div class="row">
                   <div class="col-md-12 column">
                       <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='insert_sukses'){
                        ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Sukses!</strong> Penambahan data baru berhasil.
                        </div>
                        <?php } else if($alert=='insert_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Penambahan data baru gagal.
                        </div>
                        <?php } else if($alert=='client_kosong'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Toko tidak terdaftar.
                        </div>
                        <?php } else if($alert=='toko_terpasang'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Insert Gagal!</strong> Toko sudah dipasang iklan.
                        </div>
                        
                        <?php } else if($alert=='upload_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Gagal!</strong> Upload cover gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data berhasil.
                        </div>
                        <?php } else if($alert=='update_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Gagal!</strong> Pembaharuan data gagal.
                        </div>
                        <?php } else if($alert=='hapus_sukses'){ ?>
                        <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Hapus Sukses!</strong> Data  berhasil dihapus.
                        </div>
                        <?php } else if($alert=='hapus_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Gagal!</strong> Pembaharuan data  gagal.
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="col-md-3 column">
                         <div class="heading-profile">
                              <h2>Laporan Iklan</h2>
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Laporan Iklan</li>
          </ul>
          <div class="main-content-area">
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table" style="overflow-x:auto;">
                                   <span id="found" class="label label-info"></span>
                                   <table id="laporan" class='table table-responsive table-responsive table-striped table-hover '>
                                     <thead>
                                        <tr>
                                          <th>No</th>
                                          <th width="10%">CustomerCode</th>
                                          <th>CustomerName</th>
                                          <th>Nama Toko</th>
                                          <th>District</th>
                                          <th>City</th>
                                          <th>Brand Fokus</th>
                                          <th>TPTI</th>
                                          <th>COACH</th>
                                          <th>Remark</th>
                                          <th>Type</th>
                                          <th>Tanggal</th>
                                          <th>Team</th>
                                          <th>Befor</th>
                                          <th>After</th>
                                          <th>LinkBefor</th>
                                          <th>LinkAfter</th>
                                          
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <?php
                                            $no = 1; 
                                            while($row=mysqli_fetch_assoc($Iklan)){ 
                                        ?>
                                         <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['CustomerCode']; ?></td>
                                            <td><?php echo $row['CustomerName']; ?></td>
                                            <td><?php echo $row['NamaToko']; ?></td>
                                            <td><?php echo $row['District']; ?></td>
                                            <td><?php echo $row['City']; ?></td>
                                            <td><?php echo $row['BrandFokus']; ?></td>
                                            <td><?php echo $row['TPTI']; ?></td>                                          
                                            <td><?php echo $row['COACH']; ?></td>
                                            <td><?php echo $row['Remark']; ?></td>
                                            <td><?php echo $row['type']; ?></td>
                                            <td><?php $originalDate=$row['tanggal']; $newDate=date("d-m-Y", strtotime($originalDate));echo $newDate; ?></td>
                                            <td><?php echo $row['teampasang']; ?></td>
                                         
                                            <td>
                                                <a data-fancybox="gallery" href="../img/outlet/<?php echo $row['befor']; ?>">
                                                    <img src="../img/outlet/<?php echo $row['befor']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>

                                            <td>
                                                <a data-fancybox="gallery" href="../img/outlet/<?php echo $row['after']; ?>">
                                                    <img src="../img/outlet/<?php echo $row['after']; ?>" class="img-thumbnail img-responsive" alt="img" style="width:50px;">
                                                </a>
                                            </td>
                                            <td><?php echo 'http://'.$_SERVER['HTTP_HOST'].'/karyasatria/img/outlet/'.$row['befor']; ?></td>
                                            <td><?php echo 'http://'.$_SERVER['HTTP_HOST'].'/karyasatria/img/outlet/'.$row['after']; ?></td>
                                           
                                        </tr>
                                         <?php $no++; } ?>
                                     </tbody>
                                   </table>
                                </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div><!-- Panel Content -->
     <div class="modal fade tambah" tabindex="-1" role="dialog">


