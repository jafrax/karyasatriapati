<?php
    if(!defined('MyConst')){
            die('Akses langsung tidak diperbolehkan');
        }
    $client=mysqli_query($konek, "SELECT ClientCode FROM tb_client");
    $toko=mysqli_query($konek, "SELECT CustomerCode FROM tb_toko");
    $iklan=mysqli_query($konek, "SELECT id FROM tb_iklan");
    $jmltoko= mysqli_num_rows($toko);
    $jmliklan = mysqli_num_rows($iklan); 
    $dalamproses = $jmltoko - $jmliklan;

?>
<div class="panel-content">
        <div class="main-title-sec">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='sukses_login'){
                    ?>
                    <div role="alert" class="alert color green-bg fade in alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Berhasil login!</strong> selamat, Anda berhasil login sebagai administrator.
                    </div>
                    <?php } } ?>
                </div>
                <div class="col-md-3 column">
                    <div class="heading-profile">
                        <h2>Dashboard</h2>
                        <span>Selamat datang, <?php echo $_SESSION['nama']; ?></span>
                    </div>
                </div>
                
            </div>
        </div><!-- Heading Sec -->
        <ul class="breadcrumbs">
            <li><a href="#" title="">Beranda</a></li>
            <li><a href="index.php" title="">Dashboard</a></li>
        </ul>
        <div class="main-content-area">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Client</span>
                            <h4>
                                <?php echo mysqli_num_rows($client); ?>
                            </h4>
                            <i class="fa  fa-user red-bg"></i>
                            <h5>Total Client : <?php echo mysqli_num_rows($client); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Toko/Outlet</span>
                            <h4>
                                <?php echo mysqli_num_rows($toko); ?>
                            </h4>
                            <i class="fa  fa-users skyblue-bg"></i>
                            <h5>Total Toko/Outlet : <?php echo mysqli_num_rows($toko); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Reklame Installert</span>
                            <h4>
                                <?php echo mysqli_num_rows($iklan); ?>
                            </h4>
                            <i class="fa fa-hourglass-half green-bg"></i>
                            <h5>Total Reklame Installert : <?php echo mysqli_num_rows($iklan); ?></h5>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <div class="quick-report-widget">
                            <span>Advertising on progress </span>
                            <h4 class="number">
                                <?php echo $dalamproses; ?>
                            </h4>
                            <i class="fa fa-hourglass-1 blue-bg"></i>
                            <h5>Total Advertising on progress : <?php echo $dalamproses; ?></h5>
                        </div>
                    </div> <!-- Widget -->
                </div>
            </div>
        </div>
    </div><!-- Panel Content -->