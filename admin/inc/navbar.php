<!-- Our Website Content Goes Here -->
<?php 
    $client=mysqli_query($konek, "SELECT ClientCode FROM tb_client");
    $toko=mysqli_query($konek, "SELECT CustomerCode FROM tb_toko");
    $iklan=mysqli_query($konek, "SELECT id FROM tb_iklan");?> 
<header class="simple-normal">
     <div class="top-bar">
          <div class="logo">
               <a href="index.php" title="">Menu</a>
          </div>
          <div class="menu-options"><span class="menu-action"><i></i></span></div>
          <div class="top-bar-quick-sec">
               <a href="#" data-toggle="modal" data-target=".logout"><span class="full-screen-btn"><i class="fa fa-sign-out"></i></span></a>
               <span id="toolFullScreen" class="full-screen-btn"><i class="fa fa-arrows-alt fa-spin"></i></span>
          </div>
     </div><!-- Top Bar -->
     <div class="side-menu-sec" id="header-scroll">
         <br>
          <div class="side-menus">
               <span>MENU UTAMA</span>
               <nav>
                    <ul class="parent-menu">
                         <li class="<?php if(!isset($_GET['p'])) echo 'active'; ?>">
                              <!--badge red <i class="badge red-bg">HOT</i>-->
                              <a title="Halaman Utama" href="index.php"><i class="ti-desktop"></i><span>Dashboard</span></a>
                         </li>
                         <li class="menu-item-has-children <?php if(isset($_GET['p'])) if($_GET['p']=='client'||$_GET['p']=='toko'||$_GET['p']=='iklan') echo 'active'; ?>">
                              <a title="Area administrasi"><i class="ti-user"></i><span>Iklan Area</span></a>
                              <ul <?php if(isset($_GET['p'])) if($_GET['p']=='client'||$_GET['p']=='toko'||$_GET['p']=='iklan') { ?> style="display: block;" <?php } ?>>
                                   <li><a href="?p=client">Data Client <i class="badge red-bg"><?php echo mysqli_num_rows($client); ?></i></a></li>
                                   <li><a href="?p=toko">Data Toko/Outlet <i class="badge blue-bg"><?php echo mysqli_num_rows($toko); ?></i></a></li>
                                   <li><a href="?p=iklan">Iklan Terpasang <i class="badge green-bg"><?php echo mysqli_num_rows($iklan); ?></i></a></li>
                              </ul>
                        </li>

                        <li class="">
                              <!--badge red <i class="badge red-bg">HOT</i>-->
                              <a title="Laporan" href="?p=laporan"><i class="glyphicon glyphicon-print"></i><span>Laporan</span></a>
                         </li>

                       


                        <li class="">
                              <a title="Keluar dari Halaman Admin" href="#logout" data-toggle="modal" data-target=".logout"><i class="ti-export"></i><span>Log Out</span></a>
                        </li>
                    </ul>
               </nav>
                <span class="footer-line">&copy; 2020 by Media Computer</span>
          </div>
     </div>
</header>