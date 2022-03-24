
<?php 
  
  $obj = new Admin();
  if(isset($_POST['add_cat'])){

   $return_massage =  $obj->addCatagory($_POST);

  }
 

?>



<h2 class="py-3">Add Catagory Page </h2>

<?php if(isset($return_massage)){ echo $return_massage ;} ?>

<form action="" method="post">
   <div class="form-group">
       <label class="small mb-1" for="cat_name">Add Catagory</label>
       <input name="cat_name" class="form-control py-4" id="cat_name" type="text"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="cat_des">Catagory Description</label>
       <input name="cat_des" class="form-control py-4" id="cat_des" type="text"/>
   </div>
   <div class="form-group">
       <input class="small mb-1 btn btn-block btn-primary" type="submit" name="add_cat" value="Add Catagory"/>
   </div>

</form>                              