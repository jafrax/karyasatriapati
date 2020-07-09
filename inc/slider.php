<?php
    $slider = "SELECT * FROM tb_slide ORDER BY urutan";
    $result = mysqli_query($konek, $slider);
?>
<!-- Hero Slider -->
    <section class="section-wrap nopadding">
      <div class="container">
        <div class="entry-slider">
          <div class="flexslider" id="flexslider-hero">
            <ul class="slides clearfix">
            <?php
                $i=1; 
                while($row=mysqli_fetch_assoc($result)){ 
            ?>
              <li>
                <img src="img/slider/<?php echo $row['gambar']; ?>" alt="" style="height:100px; width:100%;">
                <div class="img-holder img-<?php echo $row['gambar']; ?>"></div>
                
              </li>
            <?php $i++; } ?>
            </ul>
          </div>
        </div> <!-- end slider -->
      </div>
      <br>
    </section> <!-- end hero slider -->
