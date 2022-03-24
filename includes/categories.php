<?php 
  $catagories = $obj->display_catagory();

?>



<div class="col-lg-12">
        <div class="sidebar-item categories">
          <div class="sidebar-heading">
            <h2>Categories</h2>
          </div>
          <div class="content">
            <ul>

            <?php while($cat = mysqli_fetch_assoc($catagories)){ ?>
              
              <li><a href="#"><?php echo $cat['cat_name']; ?></a></li>
              <!-- <li><a href="#">- Awesome Layouts</a></li>
              <li><a href="#">- Creative Ideas</a></li>
              <li><a href="#">- Responsive Templates</a></li>
              <li><a href="#">- HTML5 / CSS3 Templates</a></li>
              <li><a href="#">- Creative &amp; Unique</a></li> -->

              <?php } ?>

            </ul>
          </div>
        </div>
      </div>