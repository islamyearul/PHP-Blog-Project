
<?php 
 include("admin/class/function.php");
 $obj = new Admin();

    if(isset($_GET['view'])){
        if($_GET['view']=='postview'){
            $id = $_GET['id'];
            $singlePost = $obj->displayPostById($id);
        }
    }

?>



<?php include_once("includes/head.php"); ?>

<body>

  <!-- ***** Preloader Start ***** -->
  <?php include_once("includes/preload.php"); ?>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <?php include_once("includes/header.php"); ?>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <?php include_once("includes/banner.php"); ?>
  <!-- Banner Ends Here -->

  <?php include_once("includes/cta.php"); ?>

  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <h2 class="text-center"><?php echo $singlePost['post_title']?></h2>
            <div class="text-center py-3">
                <img class="iimg-fluid mx-auto w-5" style="height: 400px; width: 600px"  src="upload/<?php echo $singlePost['post_image']?>" alt="">
            </div>
            <p><?php echo $singlePost['post_content']?></p>
            <ul style="display: inline;" class="post-info">
              <li><a href="#"><?php echo $singlePost['post_author'] ?></a></li>
              <li><a href="#"><?php echo $singlePost['post_date'] ?></a></li>
              <li><a href="#"><?php echo $singlePost['post_comment'] ?></a></li>
            </ul>
        </div>
        <?php include_once("includes/sidebar.php"); ?>

      </div>
    </div>
  </section>

  <?php include_once("includes/footer.php"); ?>

  <!-- Bootstrap core JavaScript -->

  <?php include_once("includes/script.php"); ?>


</body>

</html>