<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }


$ft= $_POST['ft'];
if(empty($ft)){$ft= 10;}

$Iklan = mysqli_query($konek, "SELECT * FROM tb_toko inner JOIN tb_iklan ON tb_toko.CustomerCode=tb_iklan.CustomerCode ORDER BY tb_iklan.id DESC LIMIT $ft");

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
                              <h2>Data Iklan</h2>
                         </div>
                    </div>
               </div>
          </div><!-- Heading Sec -->
          <ul class="breadcrumbs">
               <li><a href="#" title="">Beranda</a></li>
               <li>Data Iklan</li>
          </ul>
          <div class="main-content-area">
              <div class="row">
                  <div class="streaming-table">
                  <a href="#" data-toggle="modal" data-target=".tambah" class="icon-btn pulse-grow"><i class="fa fa-plus-square blue-bg"></i>Tambah Iklan</a>
                  <?php if($_SESSION['level'] == "admin"){ ?>
                  <a href="#" data-toggle="modal" data-target=".empty" class="c-btn small red-bg buzz delete_button">Kosongkan Iklan</a>
                  <?php } ?>
                  </div>
                  <div class="radio" align="right">
                  <form action="index.php?p=iklan" method="post" enctype="multipart/form-data">
                    <p>Please select your record:</p>
                    <input type="number" name="ft" id="ft"  value="10">
                    <input type="submit" value="Tampil">
                  </form>
                  </div>
              </div>

              <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table" style="overflow-x:auto;">
                                   <span id="found" class="label label-info"></span>
                                   <table id="iklan" class='table table-responsive table-responsive table-striped table-hover '>
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
                                           <?php if($_SESSION['level'] == "admin"){ ?>
                                          <th>Operasi</th>
                                            <?php } ?>
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
                                            <td><?php $originalDate = $row['tanggal']; $newDate = date("d-m-Y", strtotime($originalDate));echo $newDate; ?></td>
                                            
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
                                             <?php if($_SESSION['level'] == "admin"){ ?>
                                            <td>

                                                <a href="" data-toggle="modal" data-target=".hapus" data-id='<?php echo $row['CustomerCode']; ?>' data-nama='<?php echo $row['CustomerName']; ?>' class="c-btn small red-bg buzz delete_iklan"><i class="fa fa-trash"></i></a>
                                            </td>
                                        <?php } ?>
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


        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Iklan</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="CustomerCode">CustomerCode</label>
                            <input type="text" placeholder="Masukkan CustomerCode" id="CustomerCode" name="CustomerCode" class="form-control" autocomplete="off" required>
                        </div>
                        <!-- <div class="form-group"> -->

                            <!-- <label for="username">Tanggal</label> -->
                            <input type="hidden" placeholder="Masukkan username " id="username" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>" required>
                        <!-- </div> -->
                        <div class="form-group">
                            <label for="teampasang">Team Pasang</label>
                            <input type="text" placeholder="Masukkan Nama Team " id="teampasang" name="teampasang"  class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="befor">Befpre</label>
                            <input type="file" id="befor" name="befor" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label for="after">After</label>
                            <input type="file" id="after" name="after" class="form-control" required>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="tambah_iklan">Tambah</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>

    <div class="modal fade edit" tabindex="-2" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Iklan</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label for="id">ID Produk</label>
                            <input type="text" id="judul" name="id" class="form-control edit_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul">Nama Produk</label>
                            <input type="text" placeholder="Masukkan Judul Buku" id="judul" name="judul" class="form-control edit_judul" required>
                        </div>
                        <!-- <div class="form-group"> -->
                            <!-- <label for="pengarang">Pengarang</label> -->
                            <input type="hidden" placeholder="Masukkan Pengarang Buku" id="pengarang" name="pengarang" class="form-control edit_pengarang" required>
                        <!-- </div> -->
                        <!-- <div class="form-group"> -->
                            <!-- <label for="penerbit">Penerbit</label> -->
                            <input type="hidden" placeholder="Masukkan Penerbit Buku" id="penerbit" name="penerbit" class="form-control edit_penerbit" required>
                        <!-- </div> -->
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" placeholder="Masukkan Harga" id="harga" name="harga" class="form-control edit_harga" required>
                        </div>
                        <!-- <div class="form-group"> -->
                            <!-- <label for="halaman">Halaman</label> -->
                            <input type="hidden" placeholder="Masukkan Halaman Buku" id="halaman" name="halaman" class="form-control edit_halaman" required>
                        <!-- </div> -->
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <?php 
                                    $kat=mysqli_query($konek, "SELECT * FROM tb_kategori");
                                    while($data=mysqli_fetch_assoc($kat)){ ?>
                                    <option value="<?php echo $data['id_kategori']; ?>" id="<?php echo $data['id_kategori']; ?>"><?php echo $data['judul_kategori']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <textarea name="sinopsis" id="sinopsis" rows="5" cols="20" class="form-control edit_sinopsis"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" placeholder="Masukkan Jumlah Stok Buku" id="stok" name="stok" class="form-control edit_stok" required>
                        </div>
                        <div class="form-group">
                            <label for="cover">Ganti Cover <small>(Biarkan kosong jika tidak ingin cover berganti)</small></label>
                            <input type="file" id="cover" name="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select name="rating" id="rating_edit" class="form-control" style="font-family:'FontAwesome', Arial; color:#f39c12;">
                                <option value="0" id="nol">
                                    &#xf006;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="1" id="satu">
                                    &#xf005;&#xf006;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="2" id="dua">
                                    &#xf005;&#xf005;&#xf006;&#xf006;&#xf006;
                                </option>
                                <option value="3" id="tiga">
                                    &#xf005;&#xf005;&#xf005;&#xf006;&#xf006;
                                </option>
                                <option value="4" id="empat">
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf006;
                                </option>
                                <option value="5" id="lima">
                                    &#xf005;&#xf005;&#xf005;&#xf005;&#xf005;
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="update">Update</button>
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
                <h4 class="modal-title">Hapus Data Iklan</h4>
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
                            <label for="nama">CustomerName</label>
                            <input type="text" placeholder="Masukkan Judul Buku" id="nama" name="nama" class="form-control hapus_nama" readonly>
                        </div>
                        
                        <p>Apakah Anda yakin akan menghapus Iklan dengan data di atas?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn large blue-bg" name="hapus_iklan">Hapus</button>
                        <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
    </div>


        <idv class="modal fade empty" tabindex="-3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Empty Data Iklan</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        
                        <p>Apakah Anda yakin akan menghapus seluruh data iklan ?</p>
                        <div role="alert" class="alert white">
                            <span><i class="ti-trash red-bg"></i></span><strong>Perhatian!</strong> Menghapus data iklan keseluruhan adan menghapus seluruh transaksi yang ada !!
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn medium blue-bg" name="empty_iklan">Hapus</button>
                        <button type="button" class="c-btn medium red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
     </div>
