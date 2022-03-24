
<?php
    $catData = $obj->display_catagory();

    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
            $dell_id = $_GET['id'];
          $dellMassage =   $obj->delete_catagory($dell_id);

        }
    }

?>

<h3>Manage to cat view</h3>
<?php if(isset($dellMassage)){
    echo $dellMassage;
} ?>

<table class="table">
    <thead>
       <tr>
       <th>ID</th>
        <th>Catagory Name</th>
        <th>Catagory Description</th>
        <th>Action</th>
       </tr>
    </thead>
    <tbody>
        <?php while($cat = mysqli_fetch_assoc($catData)){ ?>
        <tr>
            <td><?php echo $cat['cat_id']; ?></td>
            <td><?php echo $cat['cat_name']; ?></td>
            <td><?php echo $cat['cat_description']; ?></td>
            <td>
            <a class="btn btn-primary" href="edit_cat.php?status=edit&&id=<?php echo $cat['cat_id']; ?>">Edit</a>
            <a onclick="return confirm('Are you Sure')" class="btn btn-danger" href="?status=delete&&id=<?php echo $cat['cat_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>