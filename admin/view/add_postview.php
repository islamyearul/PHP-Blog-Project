<?php 
  $catagory = $obj->display_catagory();
  if(isset($_POST['add_post'])){
      $postMessage = $obj->add_post($_POST);
  }

?>


<h2>Add Post</h2>
 
  <?php if(isset($postMessage)){ echo $postMessage; } ?>

<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
       <label class="small mb-1" for="post_title">Post Title</label>
       <input name="post_title" class="form-control py-4" id="post-title" type="text"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_content">Post Content</label>
       <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control py-4" ></textarea> 
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_thumbnail">Upload Thumbnail</label><br>
       <input name="post_thumbnail" class=" py-4" id="post_thumbnail" type="file"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_title">Select Post Category</label>
       <select name="post_category" id="post_category" class="form-control">

           <?php while($cat = mysqli_fetch_assoc($catagory)){ ?>

            <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>

            <?php } ?>

       </select>
   </div>

   <div class="form-group">
       <label class="small mb-1" for="post_summery">Post Summery</label>
       <input name="post_summery" class="form-control py-4" id="post_summery" type="text"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_tag">Post Tag</label>
       <input name="post_tag" class="form-control py-4" id="post-tag" type="text"/>
   </div>
   <div class="form-group">
       <label class="small mb-1" for="post_status">Post Status</label>
       <select name="post_status" id="post_status" class="form-control" >
           <option value="1">Published</option>
           <option value="0">Unpublished</option>
       </select>
   </div>

   <input type="submit" name="add_post" value="Add Post" class="btn form-control btn-block btn-primary">
   
   

</form>  