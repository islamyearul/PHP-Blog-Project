<?php
   
    $postData = $obj->display_post();

    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
           $dellSMS =  $obj->deletePost($_GET['id']);
        }
    }

   
?>


<h4>Manage To post view</h4>

<?php if(isset($dellSMS)){ echo $dellSMS;} ?>

 <table class="table ">
     <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Summary</th>
             <th>Thumbnail</th>
             <th>Author</th>
             <th>Date</th>
             <th>Category</th>
             <th>Status</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
        <?php while($data = mysqli_fetch_assoc($postData)){ ?>
         <tr>
             <td><?php echo $data['post_id'] ?></td>
             <td><?php echo $data['post_title'] ?></td>
             <td><?php echo $data['post_summery'] ?></td>
             <td><img height="50px" src="../upload/<?php echo $data['post_image'] ?>" alt=""></td>
             <td><?php echo $data['post_author'] ?></td>
             <td><?php echo $data['post_date'] ?></td>
             <td><?php echo $data['cat_name'] ?></td>
             <td><?php if($data['post_status']==1){ echo "Published";} else { echo "Unpublished";} ?></td>
             <td>

                <a href="edit_post.php?status=edit&&id=<?php echo $data['post_id'] ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you Sure')" href="?status=delete&&id=<?php echo $data['post_id'] ?>" class="btn btn-danger">Delete</a>

             </td>
         </tr>
         <?php } ?>
     </tbody>

 </table>