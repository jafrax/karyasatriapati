<?php
    include "lib/koneksi.php";
    session_start();
    define('MyConst', TRUE);
    if(!isset($_SESSION['username'])){
        header("location:../index.php");
    } else {
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <!-- Meta-Information -->
    <title>Karya Satria</title>
    <meta charset="utf-8">
    <meta name="description" content="Glade is a clean and powerful ready to use responsive AngularJs Admin Template based on Latest Bootstrap version and powered by jQuery, Glade comes with 3 amazing Dashboard layouts. Glade is completely flexible and user friendly admin template as it supports all the browsers and looks awesome on any device.">
    <meta name="keywords" content="admin, admin dashboard, angular admin, bootstrap admin, dashboard, modern admin, responsive admin, web admin, web app, bitlers">
    <meta name="author" content="bitlers">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="css/fancybox/jquery.fancybox.min.css" />

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- data table -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->

   
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php include "inc/navbar.php"; ?>

<div class="main-content">
    <?php
        if(isset($_GET["p"])) {
            $page = "pages/".$_GET["p"].".php";
            if(is_file($page)) {
                include($page);
            } else {
                include "pages/404.php";
            }
        } else {
            include "pages/dashboard.php";
        }
    ?>
</div>

<div class="modal fade logout" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Keluar</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Akan Keluar?</p>
      </div>
      <div class="modal-footer">
        <div class="col-md-4 col-md-offset-4">
                <a href="lib/logout.php" class="c-btn large blue-bg">Ya</a>
                <button type="button" class="c-btn large red-bg" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Memanggil jQuery.js -->
<!-- <script src="jquery-3.2.1.min.js"></script> -->

<!-- Memanggil Autocomplete.js -->
<!-- <script src="jquery.autocomplete.min.js"></script> -->
<!-- Vendor: Javascripts -->

<script src="js/jquery-2.1.3.js"></script>
<!-- <script src="js/jquery-3.5.0.js"></script> -->
<script src="js/bootstrap.min.js"></script>

<!-- Our Website Javascripts -->
<script src="js/app.js"></script>
<script src="js/common.js"></script>
<?php if(!isset($_GET['p'])) { ?>
    <script src="js/home1.js"></script>
<?php } ?>
<?php
    if(isset($_GET['p'])){
        $hal = $_GET['p'];
        if($hal=='data'){
?>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">

            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
			$(document).ready(function() {
				var table = $('#buku').DataTable({
                "lengthMenu": [[10,25, 50, -1], [ 25, 50, "All"]],
                responsive: true             
               
                });
			});


            $(document).on( "click", '.edit_button',function(e) {
                var judul = $(this).data('judul');
                var id = $(this).data('id');
                var pengarang = $(this).data('pengarang');
                var penerbit = $(this).data('penerbit');
                var sinopsis = $(this).data('sinopsis');
                var harga = $(this).data('harga');
                var stok = $(this).data('stok');
                var kategori= $(this).data('kategori');
                var halaman = $(this).data('halaman');
                var rating = $(this).data('rating');

                $("#rating_edit").val(rating);
                $("#"+kategori).attr({"selected": true});
                $(".edit_id").val(id);
                $(".edit_judul").val(judul);
                $(".edit_pengarang").val(pengarang);
                $(".edit_penerbit").val(penerbit);
                // $(".edit_sinopsis").val(sinopsis);
                tinyMCE.activeEditor.setContent(sinopsis);
                $(".edit_harga").val(harga);
                $(".edit_stok").val(stok);
                $(".edit_halaman").val(halaman);
                // $(".edit_rating").val(rating);
                // $(".edit_kategori").val(kategori);
            });
            $(document).on( "click", '.delete_button',function(e) {
                var judul = $(this).data('judul');
                var id = $(this).data('id');
                var pengarang = $(this).data('pengarang');
                var penerbit = $(this).data('penerbit');

                $(".hapus_id").val(id);
                $(".hapus_judul").val(judul);
                $(".hapus_pengarang").val(pengarang);
                $(".hapus_penerbit").val(penerbit);
            });
        </script>
<?php } else if($hal=='toko'){?>
     <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
             tinymce.init({ 
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
               
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

            });
            $(document).ready(function() {
                var table = $('#toko').DataTable({
                // "pageLength": 50,
                "lengthMenu": [[ 10,25, 50, -1], [10, 25, 50, "All"]],
                responsive: true
                });

                // // var jml = 0;
                // // var jml = $(this).data('toko_length');
                // var jml = document.getElementById("toko").value ;

                // console.log("123");
                // console.log(jml);
               
            } );


             $(document).on( "click", '.edit_toko',function(e) {
                
                var CustomerCode = $(this).data('id');
                var CustomerName = $(this).data('nama');
                var RegName = $(this).data('reg');
                var Tinggi = $(this).data('t1');
                var Lebar = $(this).data('l1');
                var tinggi2 = $(this).data('t2');
                var lebar2 = $(this).data('l2');
                var NamaToko= $(this).data('toko');
                var District = $(this).data('dist');
                var City = $(this).data('city');
                var BrandFokus = $(this).data('brand');
                var Longitude= $(this).data('long');
                var Latitude = $(this).data('lat');
                var TPTI = $(this).data('tpi');
                var COACH = $(this).data('coa');
                var Remark= $(this).data('remak');
                var type = $(this).data('tipe');


               
                $(".edit_CustomerCode").val(CustomerCode);
                $(".edit_CustomerName").val(CustomerName);
                $(".edit_RegName").val(RegName);
                $(".edit_Tinggi").val(Tinggi);
                $(".edit_Lebar").val(Lebar);
                $(".edit_Tinggi2").val(tinggi2);
                $(".edit_Lebar2").val(lebar2);
                $(".edit_NamaToko").val(NamaToko);
                $(".edit_District").val(District);
                $(".edit_City").val(City);
                $(".edit_BrandFokus").val(BrandFokus);
                $(".edit_Longitude").val(Longitude);
                $(".edit_Latitude").val(Latitude);
                $(".edit_TPTI").val(TPTI);
                $(".edit_COACH").val(COACH);
                $(".edit_Remark").val(Remark);
                $(".edit_type").val(type);

                 // $("#rating_edit").val(rating);
                // $("#"+kategori).attr({"selected": true});
                // tinyMCE.activeEditor.setContent(sinopsis);
                // $(".edit_harga").val(harga);
                // $(".edit_stok").val(stok);
                // $(".edit_halaman").val(halaman);
                // $(".edit_rating").val(rating);
                // $(".edit_kategori").val(kategori);
            });


            $(document).on( "click", '.delete_toko',function(e) {
                var nama = $(this).data('nama');
                var id = $(this).data('id');
               

                $(".hapus_id").val(id);
                $(".hapus_nama").val(nama);
                
            });
        </script>

<?php } else if($hal=='iklan'){?>
     <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            });
            
            
            $(document).ready(function() {
                var table = $('#iklan').DataTable({
                "lengthMenu": [[ 10,25, 50, -1], [ 25, 50, "All"]],
                responsive: true
                });
                
            } );                      

            $(document).on( "click", '.delete_iklan',function(e) {
                var nama = $(this).data('nama');
                var id = $(this).data('id');
               

                $(".hapus_id").val(id);
                $(".hapus_nama").val(nama);
                
            });
        </script>

<?php } else if($hal=='laporan'){?>
     <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>





        <script type="text/javascript" class="init">
            tinymce.init({
                selector: 'textarea',
                height: 200,
                branding: false,
                menubar: false,
                plugins: [
                    'advlist autolink lists link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            });
            
            
            // $(document).ready(function() {
            //     var table = $('#laporan').DataTable({
            //     "lengthMenu": [[ 25, 50, -1], [ 25, 50, "All"]],
            //     responsive: true
            //     });
                
            // } );    

            $(document).ready(function() {
                $('#laporan').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
             
                            // Loop over the cells in column `C`
                            $('row c[r^="C"]', sheet).each( function () {
                                // Get the value
                                if ( $('is t', this).text() == 'New York' ) {
                                    $(this).attr( 's', '20' );
                                }
                            });
                        }
                    }]
                });
            });
                         

            $(document).on( "click", '.export',function(e) {
                var nama = $(this).data('nama');
                var id = $(this).data('id');
               

                $(".hapus_id").val(id);
                $(".hapus_nama").val(nama);
                
            });
        </script>

<?php } else if($hal=='kategori'){?>
    <script type="text/javascript" class="init">

        $(document).on( "click", '.edit_button',function(e) {
                var kategori = $(this).data('kategori');
                var id = $(this).data('id');

                $(".edit_id").val(id);
                $(".edit_kategori").val(kategori);
        });

        $(document).on( "click", '.delete_button',function(e) {
                var kategori = $(this).data('kategori');
                var id = $(this).data('id');

                $(".hapus_id").val(id);
                $(".hapus_kategori").val(kategori);
        });
    </script>

<?php } else if($hal=='client'){?>
    <script type="text/javascript" class="init">

        $(document).on( "click", '.edit_button',function(e) {
                var kode = $(this).data('kode');
                var nama = $(this).data('nama');

                $(".edit_kode").val(kode);
                $(".edit_nama").val(nama);
        });

        $(document).on( "click", '.delete_button',function(e) {
                var kode = $(this).data('kode');
                var nama = $(this).data('nama');

                $(".hapus_kode").val(kode);
                $(".hapus_nama").val(nama);
        });
    </script>    


<?php } else if($hal=='slider'){  ?>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).on( "click", '.edit_button',function(e) {
                var judul = $(this).data('judul');
                var id = $(this).data('id');
                var keterangan = $(this).data('keterangan');
                var urutan = $(this).data('urutan');

                $(".edit_id").val(id);
                $(".edit_judul").val(judul);
                $(".edit_keterangan").val(keterangan);
                $(".edit_urutan").val(urutan);
        });
        $(document).on( "click", '.delete_button',function(e) {
                var judul = $(this).data('judul');
                var id = $(this).data('id');
                var urutan = $(this).data('urutan');

                $(".hapus_id").val(id);
                $(".hapus_judul").val(judul);
                $(".hapus_urutan").val(urutan);
        });
    </script>



<?php } else if($hal=='comment'){?>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
				$('#komentar').DataTable({
                responsive: true,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
                });
                $('#komentar_deleted').DataTable({
                responesive: true,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
                });
		} );
        $(document).on( "click", '.delete_button',function(e) {
                var judul = $(this).data('judul');
                var id = $(this).data('id');
                var komentar = $(this).data('komentar');
                var nama = $(this).data('nama');

                $(".hapus_id").val(id);
                $(".hapus_judul").val(judul);
                $(".hapus_komentar").val(komentar);
                $(".hapus_nama").val(nama);
        });
    </script>
<?php } } ?>
</body>

 
</html>
<?php } ?>
