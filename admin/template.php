

<?php
 
 include("class/function.php");
 $obj = new Admin;
  
 session_start();
 $id = $_SESSION['sessionID'];

  
 if($id == null){
     header("location:index.php");
 }

  if(isset($_GET['adminLogout'])){
      if($_GET['adminLogout']=='logout'){

        $obj->adminLogout();
      }
  }


 
?>




<?php include_once("includes/head.php") ?>
    <body class="sb-nav-fixed">
       <?php include_once("includes/topnav.php") ?>
        <div id="layoutSidenav">
           <?php include_once("includes/sidenav.php") ?>
            <div id="layoutSidenav_content">
                <main>

                <div class="container-fluid">

                    <?php if(isset($view)){
                        if($view == "dashboard"){
                            include("view/dash_view.php");
                        } 
                        elseif ($view == "add_post") {
                            include("view/add_postview.php");
                        } 
                        elseif ($view == "manage_post") {
                            include("view/manage_postview.php");
                        } 
                        elseif ($view == "add_catagory") {
                            include("view/add_catview.php");
                        } 
                        elseif ($view == "manage_catagory") {
                            include("view/manage_catview.php");
                        }
                        elseif ($view == "edit_post") {
                            include("view/edit_post_view.php");
                        }
                        elseif ($view == "edit_cat") {
                            include("view/edit_cat_view.php");
                        }
                    } 
                    
                    
                    ?>

                </div>

                </main>
       <?php include_once("includes/footer.php") ?>
            </div>
        </div>
   <?php include_once("includes/script.php") ?>
    </body>
</html>
