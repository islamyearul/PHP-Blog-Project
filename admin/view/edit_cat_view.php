
<?php 

if(isset($_GET['status'])){
    if($_GET['status']=='edit'){
       $cata = $obj->desplayCatById($_GET['id']);
    }
}

if(isset($_POST['Update_cat'])){
    $updateSMS = $obj->updateCat($_POST);
}

  

?>



<h2 class="py-3">Update Catagory Page </h2>

<?php if(isset($updateSMS)){ echo $updateSMS ;} ?>

<form action="" method="post">
   <div class="form-group">
       <label class="small mb-1" for="cat_name">Add Catagory</label>
       <input name="up_cat_name" class="form-control py-4" id="cat_name" type="text" value="<?php echo $cata['cat_name']?>"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="cat_des">Catagory Description</label>
       <input name="up_cat_des" class="form-control py-4" id="cat_des" type="text" value="<?php echo $cata['cat_description']?>"/>
   </div>
        <input type="hidden" name="up_id" value="<?php echo $_GET['id']; ?>">
       <input class="small mb-1 btn btn-block btn-primary" type="submit" name="Update_cat" value="Update Catagory"/>
  

</form>                              