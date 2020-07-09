<?php
    include "koneksi.php";
    include "CRUD.php";
    if(isset($_POST['tambah'])){
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $pengarang=mysqli_real_escape_string($konek, $_POST['pengarang']);
        $penerbit=mysqli_real_escape_string($konek, $_POST['penerbit']);
        $harga=$_POST['harga'];
        $halaman=$_POST['halaman'];
        $kategori=$_POST['kategori'];
        $sinopsis= htmlspecialchars(mysqli_real_escape_string($konek, $_POST['sinopsis']));
        $stok=$_POST['stok'];
        $rating=$_POST['rating'];
        $cover = $_FILES["cover"]["name"];
        $tmp_cover = $_FILES["cover"]["tmp_name"];
        $target = "../../img/book/";
        $upload = upload_img($tmp_cover, $cover, $target);
        $form_data = array(
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'harga' => $harga,
            'halaman' => $halaman,
            'id_kategori' => $kategori,
            'sinopsis' => $sinopsis,
            'stok' => $stok,
            'cover' => $cover,
            'rating' => $rating,
            'best' => 0
        );
        if ($upload==true) {
            $query = insert('tb_buku', $form_data);
            $hasil = mysqli_query($konek, $query);
            if ($hasil)
                header('location: ../index.php?p=data&a=insert_sukses');
            else
                header('location: ../index.php?p=data&a=insert_gagal');
        } else header("location: ../index.php?p=data&a=upload_gagal");
    }


//ClientCode,CustomerCode,CustomerName ,RegName,Tinggi,Lebar,tinggi2,lebar2,NamaToko,District,City,BrandFokus,Longitude,Latitude,TPTI,COACH,Remark,Type

    if(isset($_POST['tambah_toko'])){
        $ClientCode=mysqli_real_escape_string($konek, $_POST['ClientCode']);
        $CustomerCode=mysqli_real_escape_string($konek, $_POST['CustomerCode']);
        $CustomerName=mysqli_real_escape_string($konek, $_POST['CustomerName']);
        
        $RegName=mysqli_real_escape_string($konek, $_POST['RegName']);
        $Tinggi=mysqli_real_escape_string($konek, $_POST['Tinggi']);
        $Lebar=mysqli_real_escape_string($konek, $_POST['Lebar']);
        $tinggi2=mysqli_real_escape_string($konek, $_POST['tinggi2']);
        $lebar2=mysqli_real_escape_string($konek, $_POST['lebar2']);
        $NamaToko=mysqli_real_escape_string($konek, $_POST['NamaToko']);
        $District=mysqli_real_escape_string($konek, $_POST['District']);
        $City=mysqli_real_escape_string($konek, $_POST['City']);
        $BrandFokus=mysqli_real_escape_string($konek, $_POST['BrandFokus']);
        $Longitude=mysqli_real_escape_string($konek, $_POST['Longitude']);
        $Latitude=mysqli_real_escape_string($konek, $_POST['Latitude']);
        $TPTI=mysqli_real_escape_string($konek, $_POST['TPTI']);
        $COACH=mysqli_real_escape_string($konek, $_POST['COACH']);
        $Remark=mysqli_real_escape_string($konek, $_POST['Remark']);
        $Type=mysqli_real_escape_string($konek, $_POST['Type']);
        
        $form_data = array(
            'ClientCode' => $ClientCode,
            'CustomerCode' => $CustomerCode,
            'CustomerName' => $CustomerName,
            'RegName' => $RegName,
            'Tinggi' => $Tinggi,
            'Lebar' => $Lebar,
            'tinggi2' => $tinggi2,
            'lebar2' => $lebar2,
            'NamaToko' => $NamaToko,
            'District' => $District,
            'City' => $City,
            'BrandFokus' => $BrandFokus,
            'Longitude' => $Longitude,
            'Latitude' => $Latitude,
            'TPTI' => $TPTI,
            'COACH' => $COACH,
            'Remark' => $Remark,
            'Type' => $Type
        );
        
            $query = insert('tb_toko', $form_data);
            $hasil = mysqli_query($konek, $query);
            if ($hasil)
                header('location: ../index.php?p=toko&a=insert_sukses');
            else
                header('location: ../index.php?p=toko&a=insert_gagal');
        
    }


    if(isset($_POST['tambah_iklan'])){
        
        $CustomerCode=$_POST['CustomerCode'];
        $teampasang=$_POST['teampasang'];
        $username=$_POST['username'];
        $crclient = mysqli_query($konek, "SELECT ClientCode,CustomerCode FROM tb_toko WHERE CustomerCode='$CustomerCode'");
        $row = mysqli_fetch_assoc($crclient);
        
        if(!empty($row)){
            $kode_client = $row['ClientCode'];

            $crtoko = mysqli_query($konek, "SELECT ClientCode,CustomerCode FROM tb_iklan WHERE CustomerCode='$CustomerCode' AND ClientCode='$kode_client' ");
            $row2 = mysqli_fetch_assoc($crtoko);

            if(empty($row2)){

                    $tanggal =  date("Y-m-d") ;
                    $befor = $_FILES["befor"]["name"];
                    $after = $_FILES["after"]["name"];
                    $beforNew = $kode_client.'-'.$CustomerCode.'-'.$befor;
                    $afterNew = $kode_client.'-'.$CustomerCode.'-'.$after;
                    // var_dump($beforNew);
                    $tmp_befor = $_FILES["befor"]["tmp_name"];
                    $tmp_after = $_FILES["after"]["tmp_name"];
                    $target = "../../img/outlet/";
                    $upload1 = upload_img($tmp_befor, $beforNew, $target);
                    $upload2 = upload_img($tmp_after, $afterNew, $target);
                    

                    $form_data = array(
                        'ClientCode' => $kode_client,
                        'CustomerCode' => $CustomerCode,
                        
                        'tanggal' => $tanggal,
                        'teampasang' => $teampasang,
                        'befor' => $beforNew,
                        'after' => $afterNew,
                        'user' => $username
                       
                    );
                    
                        $query = insert('tb_iklan', $form_data);
                        $hasil = mysqli_query($konek, $query);

                        // var_dump($hasil);
                        if ($hasil){
                            header('location: ../index.php?p=iklan&a=insert_sukses');
                        }else{
                            header('location: ../index.php?p=iklan&a=insert_gagal');
                        }
            }else{

                header('location: ../index.php?p=iklan&a=toko_terpasang');
            }

        }else{

            
            header('location: ../index.php?p=iklan&a=client_kosong');
        }
        
    }

    // dbRowUpdate('my_table', $form_data, "WHERE id = '$id'");
    if (isset($_POST['update'])) {
        $id=$_POST['id'];
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $pengarang=mysqli_real_escape_string($konek, $_POST['pengarang']);
        $penerbit=mysqli_real_escape_string($konek, $_POST['penerbit']);
        $harga=$_POST['harga'];
        $halaman=$_POST['halaman'];
        $kategori=$_POST['kategori'];
        $sinopsis=htmlspecialchars(mysqli_real_escape_string($konek, $_POST['sinopsis']));
        $stok=$_POST['stok'];
        $rating=$_POST['rating'];
        if(empty($_FILES['cover']['name'])){
            $form_data = array(
                'judul_buku' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'harga' => $harga,
                'halaman' => $halaman,
                'id_kategori' => $kategori,
                'sinopsis' => $sinopsis,
                'stok' => $stok,
                'rating' => $rating
            );
        } else {
            $cover = $_FILES["cover"]["name"];
            $tmp_cover = $_FILES["cover"]["tmp_name"];
            $target = "../../img/book/";
            $upload = upload_img($tmp_cover, $cover, $target);
            $form_data = array(
                'judul_buku' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'harga' => $harga,
                'halaman' => $halaman,
                'id_kategori' => $kategori,
                'sinopsis' => $sinopsis,
                'stok' => $stok,
                'cover' => $cover,
                'rating' => $rating
            );
            if ($upload==true) {
                $get_cover = mysqli_query($konek, "SELECT cover FROM tb_buku WHERE id_buku=$id");
                $row = mysqli_fetch_assoc($get_cover);
                $cover_url = "../../img/book/{$row['cover']}";
                unlink($cover_url);
            } else header("location: ../index.php?p=data&a=upload_gagal");
        }
        $query = update('tb_buku', $form_data, "WHERE id_buku=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=data&a=update_sukses');
        else
            header('location: ../index.php?p=data&a=update_gagal');        
    }

    if (isset($_POST['update_toko'])) {

            $CustomerCode = mysqli_real_escape_string($konek, $_POST['CustomerCode']);
            $CustomerName = mysqli_real_escape_string($konek, $_POST['CustomerName']);

            $RegName = mysqli_real_escape_string($konek, $_POST['RegName']);
            $Tinggi = mysqli_real_escape_string($konek, $_POST['Tinggi']);
            $Lebar = mysqli_real_escape_string($konek, $_POST['Lebar']);
            $tinggi2 = mysqli_real_escape_string($konek, $_POST['Tinggi2']);
            $lebar2 = mysqli_real_escape_string($konek, $_POST['Lebar2']);
            $NamaToko = mysqli_real_escape_string($konek, $_POST['NamaToko']);
            $District = mysqli_real_escape_string($konek, $_POST['District']);

            $City = mysqli_real_escape_string($konek, $_POST['City']);
            $BrandFokus = mysqli_real_escape_string($konek, $_POST['BrandFokus']);
            $Longitude = mysqli_real_escape_string($konek, $_POST['Longitude']);
            $Latitude = mysqli_real_escape_string($konek, $_POST['Latitude']);
            $TPTI = mysqli_real_escape_string($konek, $_POST['TPTI']);
            $COACH = mysqli_real_escape_string($konek, $_POST['COACH']);
            $Remark = mysqli_real_escape_string($konek, $_POST['Remark']);
            $type = mysqli_real_escape_string($konek, $_POST['Type']);


            $form_data = array(
                'CustomerName' => $CustomerName,
                'RegName' => $RegName,
                'Tinggi' => $Tinggi,
                'Lebar' => $Lebar,
                'tinggi2' => $tinggi2,
                'lebar2' => $lebar2,
                'NamaToko' => $NamaToko,
                'District' => $District,
                'City' => $City,
                'BrandFokus' => $BrandFokus,
                'Longitude' => $Longitude,
                'Latitude' => $Latitude,
                'TPTI' => $TPTI,
                'COACH' => $COACH,
                'Remark' => $Remark,
                'type' => $type
            );
      
        $query = update('tb_toko', $form_data, "WHERE CustomerCode='$CustomerCode' ");
        // var_dump($query);

        $hasil = mysqli_query($konek, $query);
        // var_dump($hasil);
        if ($hasil){
            header('location: ../index.php?p=toko&a=update_sukses');
        }else{
            header('location: ../index.php?p=toko&a=update_gagal');        
        }
    }

    if (isset($_POST['hapus_toko'])) {
        $id=mysqli_real_escape_string($konek,$_POST['id']);
        $sqliklan = mysqli_query($konek, "SELECT * FROM tb_iklan WHERE CustomerCode='$id'");
        $row = mysqli_fetch_assoc($sqliklan);
        $url_befor = "../../img/outlet/{$row['befor']}";
        $url_after = "../../img/outlet/{$row['after']}";
        $hapus_gambar1 = unlink($url_befor);
        $hapus_gambar2 = unlink($url_after);
        $query1 = delete('tb_iklan', "WHERE CustomerCode='$id'");
        $query2 = delete('tb_toko', "WHERE CustomerCode='$id'");
        $hasil1 = mysqli_query($konek, $query1);
        $hasil2 = mysqli_query($konek, $query2);
        
        // var_dump($row);
        if ($hasil1&&$hasil2&&$hapus_gambar1&&$hapus_gambar2){
            header('location: ../index.php?p=toko&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=toko&a=hapus_gagal');
    }

     if (isset($_POST['hapus_iklan'])) {
        $id=mysqli_real_escape_string($konek,$_POST['id']);
        $sqliklan = mysqli_query($konek, "SELECT * FROM tb_iklan WHERE CustomerCode='$id'");
        $row = mysqli_fetch_assoc($sqliklan);
        $url_befor = "../../img/outlet/{$row['befor']}";
        $url_after = "../../img/outlet/{$row['after']}";
        $hapus_gambar1 = unlink($url_befor);
        $hapus_gambar2 = unlink($url_after);
        $query = delete('tb_iklan', "WHERE CustomerCode='$id'");
        $hasil = mysqli_query($konek, $query);
        
        // var_dump($row);
        if ($hasil&&$hapus_gambar1&&$hapus_gambar2){
            header('location: ../index.php?p=iklan&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=iklan&a=hapus_gagal');
    }

     if (isset($_POST['hapus'])) {
        $id=$_POST['id'];
        $cover = mysqli_query($konek, "SELECT cover FROM tb_buku WHERE id_buku=$id");
        $row = mysqli_fetch_assoc($cover);
        $url_cover = "../../img/book/{$row['cover']}";
        $hapus_gambar = unlink($url_cover);
        $query1 = delete('tb_buku', "WHERE id_buku=$id");
        $query2 = delete('tb_komentar', "WHERE id_buku=$id");
        $hasil1 = mysqli_query($konek, $query1);
        $hasil2 = mysqli_query($konek, $query2);
        if ($hasil1&&$hasil2&&$hapus_gambar){
            header('location: ../index.php?p=data&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=data&a=hapus_gagal');
    }

    if (isset($_POST['hapus_best'])) {
        $id = $_POST['id'];
        $form_data = array(
                'best' => 0
        );
        $query = update('tb_buku', $form_data, "WHERE id_buku=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=data&a=hapus_best_sukses');
        else
            header('location: ../index.php?p=data&a=hapus_best_gagal');
    }

    if (isset($_POST['tambah_best'])) {
        $id = $_POST['id'];
        $form_data = array(
                'best' => 1
        );
        $query = update('tb_buku', $form_data, "WHERE id_buku=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=data&a=tambah_best_sukses');
        else
            header('location: ../index.php?p=data&a=tambah_best_gagal');
    }

    if(isset($_POST['tambah_kat'])){
        $kategori=mysqli_real_escape_string($konek, $_POST['kategori']);
        $form_data = array(
            'judul_kategori' => $kategori
        );
        $query = insert('tb_kategori', $form_data);
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
                header('location: ../index.php?p=kategori&a=insert_sukses');
            else
                header('location: ../index.php?p=kategori&a=insert_gagal');
    }


    if(isset($_POST['tambah_client'])){
        $kode=mysqli_real_escape_string($konek, $_POST['kode']);
        $nama=mysqli_real_escape_string($konek, $_POST['nama']);
        
        $form_data = array(
            'ClientCode' => $kode,
            'ClientName' => $nama
        );

        $query = insert('tb_client', $form_data);
        $hasil = mysqli_query($konek, $query);
       // var_dump($hasil);
        if ($hasil)
                header('location: ../index.php?p=client&a=insert_sukses');
            else
                header('location: ../index.php?p=client&a=insert_gagal');
    }

    if (isset($_POST['update_kat'])) {
        $id = $_POST['id'];
        $kategori = mysqli_real_escape_string($konek, $_POST['kategori']);
        $form_data = array(
                'judul_kategori' => $kategori
        );
        $query = update('tb_kategori', $form_data, "WHERE id_kategori=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=kategori&a=update_sukses');
        else
            header('location: ../index.php?p=kategori&a=update_gagal');
    }


    if (isset($_POST['update_client'])) {
        $kode = $_POST['kode'];
        $nama = mysqli_real_escape_string($konek, $_POST['nama']);
        $form_data = array(
                'ClientName' => $nama
        );
        $query = update('tb_client', $form_data, "WHERE ClientCode=$kode");
        $hasil = mysqli_query($konek, $query);

        // var_dump($hasil);

        if ($hasil)
            header('location: ../index.php?p=client&a=update_sukses');
        else
            header('location: ../index.php?p=client&a=update_gagal');
    }

    if (isset($_POST['hapus_kat'])) {
        $id=$_POST['id'];
        $cover = mysqli_query($konek, "SELECT cover FROM tb_buku WHERE id_kategori=$id");
        while($row = mysqli_fetch_assoc($cover)){
            $url_cover = "../../img/book/{$row['cover']}";
            $hapus_gambar = unlink($url_cover);
        }
        $query1 = delete('tb_buku', "WHERE id_kategori=$id");
        $query2 = delete('tb_kategori', "WHERE id_kategori=$id");
        $hasil1 = mysqli_query($konek, $query1);
        $hasil2 = mysqli_query($konek, $query2);
        if ($hasil1&&$hasil2){
            header('location: ../index.php?p=kategori&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=kategori&a=hapus_gagal');
    }


    if (isset($_POST['hapus_client'])) {
        $kode=$_POST['kode'];
        $cover = mysqli_query($konek, "SELECT after,befor FROM tb_iklan WHERE CustomerCode=$kode");
        while($row = mysqli_fetch_assoc($cover)){
            $url_befor = "../../img/outlet/{$row['befor']}";
            $url_after = "../../img/outlet/{$row['after']}";
            $hapus_gambar1 = unlink($url_befor);
            $hapus_gambar2 = unlink($url_after);
        }
       // var_dump($kode);
        $query1 = delete('tb_iklan', "WHERE ClientCode=$kode");
        $query2 = delete('tb_toko', "WHERE ClientCode=$kode");
        $query3 = delete('tb_client', "WHERE ClientCode=$kode");
        $hasil1 = mysqli_query($konek, $query1);
        $hasil2 = mysqli_query($konek, $query2);
        $hasil3 = mysqli_query($konek, $query3);
        // var_dump($hasil2);

        if ($hasil1&&$hasil2&&$hasil3){
            header('location: ../index.php?p=client&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=client&a=hapus_gagal');
    }

    if(isset($_POST['tambah_slider'])){
        $get_gambar = mysqli_query($konek, "SELECT id_slide FROM tb_slide");
        $get_urutan = mysqli_num_rows($get_gambar);
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $keterangan=mysqli_real_escape_string($konek, $_POST['keterangan']);
        $gambar = $_FILES["gambar"]["name"];
        $tmp_gambar = $_FILES["gambar"]["tmp_name"];
        $target = "../../img/slider/";
        $upload = upload_img($tmp_gambar, $gambar, $target);
        $form_data = array(
            'judul_slide' => $judul,
            'keterangan' => $keterangan,
            'gambar' => $gambar,
            'urutan' => $get_urutan+1
        );
        if ($upload==true) {
            $query = insert('tb_slide', $form_data);
            $hasil = mysqli_query($konek, $query);
            if ($hasil)
                header('location: ../index.php?p=slider&a=insert_sukses');
            else
                header('location: ../index.php?p=slider&a=insert_gagal');
        } else 
            echo "Gagal upload";
            // header("location: ../index.php?p=slider&a=upload_gagal");
    }

    if (isset($_POST['hapus_slider'])) {
        $id=$_POST['id'];
        $gambar = mysqli_query($konek, "SELECT gambar FROM tb_slide WHERE id_slide=$id");
        $row = mysqli_fetch_assoc($gambar);
        $url_gambar = "../../img/slider/{$row['gambar']}";
        $hapus_gambar = unlink($url_gambar);
        $query = delete('tb_slide', "WHERE id_slide=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil&&$hapus_gambar){
            header('location: ../index.php?p=slider&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=slider&a=hapus_gagal');
    }

    if (isset($_POST['update_slider'])) {
        $id=$_POST['id'];
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $keterangan=mysqli_real_escape_string($konek, $_POST['keterangan']);
        $urutan=$_POST['urutan'];
        $form_data = array(
                'judul_slide' => $judul,
                'keterangan' => $keterangan,
                'urutan' => $urutan
        );
        $query = update('tb_slide', $form_data, "WHERE id_slide=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=slider&a=update_sukses');
        else
            header('location: ../index.php?p=slider&a=update_gagal');
    }

    if (isset($_POST['restore_comment'])) {
        $id = $_POST['id'];
        $form_data = array(
                'hapus' => 0
        );
        $query = update('tb_komentar', $form_data, "WHERE id_komentar=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=comment&a=restore_sukses');
        else
            header('location: ../index.php?p=comment&a=restore_gagal');
    }

    if (isset($_POST['delete_comment'])) {
        $id = $_POST['id'];
        $form_data = array(
                'hapus' => 1
        );
        $query = update('tb_komentar', $form_data, "WHERE id_komentar=$id");
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=comment&a=hapus_sukses');
        else
            header('location: ../index.php?p=comment&a=hapus_gagal');
    }


 if (isset($_POST['empty_iklan'])) {
      
        $files = glob('../../img/outlet/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file
        }

        
        $hasil = mysqli_query($konek,"TRUNCATE TABLE tb_iklan"); //empty table
        
        // var_dump($hasil);
        if ($hasil){
            header('location: ../index.php?p=iklan&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=iklan&a=hapus_gagal');
    }


