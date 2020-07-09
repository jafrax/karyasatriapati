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

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="admin/css/icons.css">
    <link rel="stylesheet" href="admin/css/main.css">
    <link rel="stylesheet" href="admin/css/responsive.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/apple-touch-icon-114x114.png">
 -->
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Our Website Content Goes Here -->
<div class="account-user-sec">
     <div class="account-sec">
                   <div class="row">
                       <?php 
                            if (isset($_GET['a'])) {
                                $alert=$_GET['a'];
                                if ($alert=='login_required') {
                       ?>
                       <div class="col-md-6 col-md-offset-3">
                            <div role="alert" class="alert color blue-bg fade in alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Maaf!</strong> Anda harus login terlebih dahulu untuk mengakses halaman Admin.
                            </div>
                        </div>
                        <?php 
                            } else if ($alert=='gagal_login') {
                        ?>
                        <div class="col-md-6 col-md-offset-3">
                            <div role="alert" class="alert color red-bg fade in alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Login gagal!</strong> Username atau password yang Anda masukkan salah.
                            </div>
                        </div>
                        <?php } } ?>
                   </div>
          <div class="acount-sec">
               <div class="container">
                    <!-- <div class="row"> -->
                         <div class="col-md-12">
                              <div class="contact-sec">
                                   <!-- <div class="row"> -->
                                        <div class="col-md-8 col-md-offset-2">   
                                             <div class="widget-title">
                                                  <h3>Admin Panel Login</h3>
                                                  <span>Isikan data Anda untuk masuk ke halaman Admin</span>
                                             </div><!-- Widget title -->
                                             <div class="account-form">
                                                  <form action="admin/lib/login_proses.php" method="post">
                                                       <div class="row">
                                                            <div class="feild col-md-6">
                                                                 <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus />
                                                            </div>
                                                            <div class="feild col-md-6">
                                                                 <input type="password" name="password" placeholder="Password" />
                                                            </div>
                                                            <div class="feild col-md-6">
                                                                 <input type="submit" name="login" value="Login Sekarang" />
                                                            </div>
                                                       </div>
                                                  </form>
                                             </div>
                                        </div>
                                        
                                   <!-- </div> -->
                              </div>
                         </div>
                    <!-- </div> -->
               </div>
          </div>
          <footer>
              <div class="container">
                  <p>2020 by Media Computer</p>
              </div>
          </footer>
     </div><!-- Account Sec -->
</div>
<!-- Vendor: Javascripts -->
<script src="js/jquery-2.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyDrlCWSCEGTYat1yFIybvtjXe6v24wXY04" 
        async="" 
        type="text/javascript">
</script>

<!-- Our Website Javascripts -->
<script src="js/app.js"></script>
<script src="js/common.js"></script>
</body>
</html>