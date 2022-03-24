<?php 
 $catagory = $obj->display_catagory();
if(isset($_GET['status'])){
    if($_GET['status']=='edit'){
       $posts = $obj->displayPostById($_GET['id']);

        
    }
}  

if(isset($_POST['update_post'])){
    $postUpdateSMS = $obj->updatePost($_POST);
}
  

?>


<h2>Edit Post</h2>
 
<?php if(isset($postUpdateSMS)){ echo $postUpdateSMS ;} ?>

<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
       <label class="small mb-1" for="post_title">Post Title</label>
       <input name="up_post_title" class="form-control py-4" id="post-title" type="text" value="<?php echo $posts['post_title']; ?>"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_content">Post Content</label>
       <textarea name="up_post_content" id="post_content" cols="30" rows="10" class="form-control py-4"><?php echo $posts['post_content']; ?></textarea> 
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_thumbnail">Upload Thumbnail</label><br>
       <input name="up_post_thumbnail" class=" py-4" id="post_thumbnail" type="file" value="<?php echo $posts['post_image']; ?>"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_title">Select Post Category</label>
       <select name="up_post_category" id="post_category" class="form-control">

           <?php while($cat = mysqli_fetch_assoc($catagory)){ ?>

            <option  value="<?php echo $cat['cat_id']; ?>" <?php if ($cat['cat_name']==$posts['cat_name']) { echo "SELECTED"; } ?>   ><?php echo $cat['cat_name']; ?> </option>

            <?php } ?>

       </select>
   </div>

   <div class="form-group">
       <label class="small mb-1" for="post_summery">Post Summery</label>
       <input name="up_post_summery" class="form-control py-4" id="post_summery" type="text" value="<?php echo $posts['post_summery']; ?>"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_tag">Post Tag</label>
       <input name="up_post_tag" class="form-control py-4" id="post-tag" type="text" value="<?php echo $posts['post_tag']; ?>"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_status">Post Status</label>
       <select name="up_post_status" id="post_status" class="form-control" >
           <option value="1" <?php if ($posts['post_status']==1) { echo "SELECTED"; } ?>  >Published</option>
           <option value="0" <?php if ($posts['post_status']==0) { echo "SELECTED"; } ?>>Unpublished</option>
       </select>
   </div>
    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" >
   <input type="submit" name="update_post" value="Update Post" class="btn form-control btn-block btn-primary">
   
   

</form>  