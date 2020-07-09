<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }

$ft= $_POST['ft'];
if(empty($ft)){$ft= 10;}

    $toko = mysqli_query($konek, "SELECT * FROM tb_toko ORDER BY CustomerCode DESC LIMIT $ft ");
    $client = mysqli_query($konek, "SELECT * FROM tb_client");
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
                        <?php } else if($alert=='upload_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Gagal!</strong> Upload gambar gagal.
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
                              <h2>Data Toko/Outlet</h2>
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Toko/Outlet</li>
          </ul>
          <div class="main-content-area">
              <div class="row">
                 <?php if($_SESSION['level'] == "admin"){ ?>
                  <div class="streaming-table">
                    <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i> Tambah Toko/Outlet</a>
                  </div>
                  
                  <div class="radio" align="right">
                  <form action="index.php?p=toko" method="post" enctype="multipart/form-data">
                    <p>Please select your record:</p>
                    <input type="number" name="ft" id="ft"  value="10">
                    <input type="submit" value="Tampil">
                  </form>
                  </div>
                  <?php } ?>
              </div>
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table" style="overflow-x:auto;">
                                   <span id="found" class="label label-info"></span>
                                   <table id="toko" class='table table-responsive table-responsive table-striped table-hover'>
                                     <thead>
                                        <tr>
                                          <?php if($_SESSION['level'] == "admin"){ ?>
                                          <th>Opsi</th>
                                          <?php } ?>
                                          
                                          <th>No</th>
                                          <th width="10%">CustomerCode</th>
                                          <th>CustomerName</th>
                                          <th>Reg Name</th>
                                          <th>Tinggi</th>
                                          <th>Lebar</th>
                                          <th>Tinggi</th>
                                          <th>Lebar</th>
                                          <th>Nama Toko</th>
                                          <th>District</th>
                                          <th>City</th>
                                          <th>Brand Fokus</th>
                                          <th>Longitude</th>
                                          <th>Latitude</th>
                                          <th>TPTI</th>
                                          <th>COACH</th>
                                          <th>Remark</th>
                                          <th>Type</th>
                                          
                                        </tr>

                                     </thead>
                                     <tbody>
                                        <?php
                                            $no = 1; 
                                            while($row=mysqli_fetch_assoc($toko)){ 
                                        ?>
                                         <tr>
                                          <?php if($_SESSION['level'] == "admin"){ ?>
                                            <td>
                                                <a href="" data-toggle="modal" data-target=".edit" data-id='<?php echo $row['CustomerCode']; ?>' 
                                                  data-nama='<?php echo $row['CustomerName']; ?>' data-reg='<?php echo $row['RegName']; ?>' 
                                                  data-t1='<?php echo $row['Tinggi']; ?>' data-l1='<?php echo $row['Lebar']; ?>'
                                                  data-t2='<?php echo $row['tinggi2']; ?>' data-l2='<?php echo $row['lebar2']; ?>' 
                                                  data-toko='<?php echo $row['NamaToko']; ?>' data-dist='<?php echo $row['District']; ?>' 
                                                  data-city='<?php echo $row['City']; ?>' data-brand='<?php echo $row['BrandFokus']; ?>' 
                                                  data-long='<?php echo $row['Longitude']; ?>' data-lat='<?php echo $row['Latitude']; ?>' 
                                                  data-tpi='<?php echo $row['TPTI']; ?>' data-coa='<?php echo $row['COACH']; ?>' 
                                                  data-remak='<?php echo $row['Remark']; ?>' data-tipe='<?php echo $row['type']; ?>' 

                                                  class="c-btn small green-bg buzz edit_toko"><i class="fa fa-pencil-square"></i></a>

                                                <a href="" data-toggle="modal" data-target=".hapus" data-id='<?php echo $row['CustomerCode']; ?>' data-nama='<?php echo $row['CustomerName']; ?>' class="c-btn small red-bg buzz delete_toko"><i class="fa fa-trash"></i></a>
                                            </td>
                                          <?php } ?>

                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['CustomerCode']; ?></td>
                                            <td><?php echo $row['CustomerName']; ?></td>
                                            <td><?php echo $row['RegName']; ?></td>
                                            <td><?php echo $row['Tinggi'];?></td>
                                            <td><?php echo $row['Lebar']; ?></td>
                                            <td><?php echo $row['tinggi2']; ?></td>
                                            <td><?php echo $row['lebar2']; ?></td>
                                            <td><?php echo $row['NamaToko']; ?></td>
                                            <td><?php echo $row['District']; ?></td>
                                            <td><?php echo $row['City']; ?></td>
                                            <td><?php echo $row['BrandFokus']; ?></td>
                                            <td><?php echo $row['Longitude']; ?></td>
                                            <td><?php echo $row['Latitude']; ?></td>
                                            <td><?php echo $row['TPTI']; ?></td>                                          
                                            <td><?php echo $row['COACH']; ?></td>
                                            <td><?php echo $row['Remark']; ?></td>
                                            <td><?php echo $row['type']; ?></td>
                                            
                                            
                                        </tr>
                                         <?php $no++; } 
                                         ?>
                                     </tbody>
                                   </table>

                                </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div><!-- Panel Content -->

       <div class="modal fade edit" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
             
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Toko / Outlet</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="CustomerCode">Customer Code</label>
                            <input type="text" id="CustomerCode" name="CustomerCode" class="form-control edit_CustomerCode" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CustomerName">Customer Name</label>
                            <input type="text" placeholder="Masukkan Nama" id="CustomerName" name="CustomerName" class="form-control edit_CustomerName" required>
                        </div>
                        <div class="form-group">
                            <label for="RegName">Reg Name </label>
                            <input type="text" placeholder="Masukkan Reg Name" id="RegName" name="RegName" class="form-control edit_RegName" required>
                        </div>
                        <div class="form-group">
                            <label for="Tinggi">Tinggi</label>
                            <input type="text" placeholder="Masukkan Tinggi " id="Tinggi" name="Tinggi" class="form-control edit_Tinggi" required>
                        </div>
                        <div class="form-group">
                            <label for="Lebar">Lebar</label>
                            <input type="text" placeholder="Masukkan Lebar" id="Lebar" name="Lebar" class="form-control edit_Lebar" required>
                        </div>
                         <div class="form-group">
                            <label for="Tinggi">Tinggi</label>
                            <input type="text" placeholder="Masukkan Tinggi " id="Tinggi2" name="Tinggi2" class="form-control edit_Tinggi2" required>
                        </div>
                        <div class="form-group">
                            <label for="Lebar">Lebar</label>
                            <input type="text" placeholder="Masukkan Lebar" id="Lebar2" name="Lebar2" class="form-control edit_Lebar2" required>
                        </div>
                        <div class="form-group">
                            <label for="NamaToko">Nama Toko</label>
                            <input type="text" placeholder="Masukkan Nama Toko" id="NamaToko" name="NamaToko" class="form-control edit_NamaToko" required>
                        </div>
                        <div class="form-group">
                            <label for="District">District</label>
                            <input type="text" placeholder="Masukkan District" id="District" name="District" class="form-control edit_District" required>
                        </div>
                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" placeholder="Masukkan City" id="City" name="City" class="form-control edit_City" required>
                        </div>
                        <div class="form-group">
                            <label for="BrandFokus">Brand Fokus</label>
                            <input type="text"  placeholder="Masukkan Brand Fokus" id="BrandFokus" name="BrandFokus" class="form-control edit_BrandFokus" required>
                        </div>
                        <div class="form-group">
                            <label for="Longitude">Longitude</label>
                            <input type="text"  placeholder="Masukkan Longitude" id="Longitude" name="Longitude" class="form-control edit_Longitude" required>
                        </div>
                        <div class="form-group">
                            <label for="Latitude">Latitude</label>
                            <input type="text" placeholder="Masukkan Latitude" id="Latitude" name="Latitude" class="form-control edit_Latitude" required>
                        </div>
                        <div class="form-group">
                            <label for="TPTI">TPTI</label>
                            <input type="text" placeholder="Masukkan TPTI" id="TPTI" name="TPTI" class="form-control edit_TPTI" required>
                        </div>
                        <div class="form-group">
                            <label for="COACH">COACH</label>
                            <input type="text" placeholder="Masukkan COACH" id="COACH" name="COACH" class="form-control edit_COACH" required>
                        </div>
                        <div class="form-group">
                            <label for="Remark">Remark</label>
                            <input type="text"  placeholder="Masukkan Remark" id="Remark" name="Remark" class="form-control edit_Remark" required>
                        </div>
                        <div class="form-group">
                            <label for="Type">Type</label>
                            <select name="Type" id="Type" class="form-control edit_type " style="font-family:'FontAwesome', Arial; color:#f39c12;">
                                <option value="SRC">SRC</option>
                                <option value="NON SRC">NON SRC</option>
                                
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="update_toko">Update</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div> 

     <div class="modal fade tambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Toko/Outlet</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="ClientCode">ClientCode</label>
                            <select name="ClientCode" id="ClientCode" class="form-control">
                                <?php while($row=mysqli_fetch_assoc($client)){ ?>
                                    <option value="<?php echo $row['ClientCode']; ?>"><?php echo $row['ClientName']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="CustomerCode">CustomerCode </label>
                            <input type="text" placeholder="Masukkan CustomerCode" id="CustomerCode " name="CustomerCode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="CustomerName">CustomerName</label>
                            <input type="text" placeholder="Masukkan CustomerName" id="CustomerName" name="CustomerName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="RegName">Reg Name </label>
                            <input type="text" placeholder="Masukkan Reg Name" id="RegName" name="RegName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Tinggi">Tinggi</label>
                            <input type="text" placeholder="Masukkan Tinggi " id="Tinggi" name="Tinggi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Lebar">Lebar</label>
                            <input type="text" placeholder="Masukkan Lebar" id="Lebar" name="Lebar" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label for="Tinggi">Tinggi</label>
                            <input type="text" placeholder="Masukkan Tinggi " id="Tinggi2" name="Tinggi2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Lebar">Lebar</label>
                            <input type="text" placeholder="Masukkan Lebar" id="Lebar2" name="Lebar2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="NamaToko">Nama Toko</label>
                            <input type="text" placeholder="Masukkan Nama Toko" id="NamaToko" name="NamaToko" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="District">District</label>
                            <input type="text" placeholder="Masukkan District" id="District" name="District" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" placeholder="Masukkan City" id="City" name="City" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="BrandFokus">Brand Fokus</label>
                            <input type="text"  placeholder="Masukkan Brand Fokus" id="BrandFokus" name="BrandFokus" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Longitude">Longitude</label>
                            <input type="text"  placeholder="Masukkan Longitude" id="Longitude" name="Longitude" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Latitude">Latitude</label>
                            <input type="text" placeholder="Masukkan Latitude" id="Latitude" name="Latitude" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="TPTI">TPTI</label>
                            <input type="text" placeholder="Masukkan TPTI" id="TPTI" name="TPTI" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="COACH">COACH</label>
                            <input type="text" placeholder="Masukkan COACH" id="COACH" name="COACH" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Remark">Remark</label>
                            <input type="text"  placeholder="Masukkan Remark" id="Remark" name="Remark" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Type">Type</label>
                            <select name="Type" id="Type" class="form-control" style="font-family:'FontAwesome', Arial; color:#f39c12;">
                                <option value="SRC">SRC</option>
                                <option value="NON SRC">NON SRC</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="tambah_toko">Tambah</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>

   

    <div class="modal fade hapus" tabindex="-3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Data Toko</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="id">CustomerCode</label>
                            <input type="text" id="judul" name="id" class="form-control hapus_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NamaToko">CustomerName</label>
                            <input type="text" placeholder="Masukkan NamaToko" id="NamaToko" name="NamaToko" class="form-control hapus_nama" readonly>
                        </div>
                       
                        <p>Apakah Anda yakin akan menghapus toko dengan data di atas?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="hapus_toko">Hapus</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>