<?php



 class Admin{
    private $conn;

    public function __construct(){
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = "";
         $dbname = 'blog_project';
         $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

         if(! $this->conn){
             die("Database Connection Error");
         }
    } 
    public function adminLogin($data){
         $admin_email = $data['admin_email'];
         $admin_pass = md5($data['admin_password']);

         $query = "SELECT * FROM admin_info WHERE ad_email='$admin_email' AND ad_pass='$admin_pass'";

         if(mysqli_query($this->conn, $query)){
             $admin_info = mysqli_query($this->conn, $query);

             if($admin_info){
                 header("location:dashboard.php");
                 $admin_data = mysqli_fetch_assoc($admin_info);
                 session_start();
                 $_SESSION['adminID'] = $admin_data['id'];
                 $_SESSION['admin_name'] =  $admin_data['ad_name'];

             }
         }

    }

    public function adminLogout(){
        unset($_SESSION['adminID']);
        unset($_SESSION['admin_name']);
        header("location: index.php");
    }

    public function addCatagory($data){
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $quary = "INSERT INTO catagory (cat_name, cat_description) VALUE ('$cat_name', '$cat_des')";

        if(mysqli_query($this->conn, $quary)){
            return "Catagory Add Success";

        }

    }

    public function display_catagory(){
        $query = "SELECT * FROM catagory";
        if(mysqli_query($this->conn, $query)){
            $catagory = mysqli_query($this->conn, $query);
            return $catagory;
        }
    }
    public function delete_catagory($id){
        $query = "DELETE FROM catagory WHERE cat_id=$id";
        if(mysqli_query($this->conn, $query)){
            return "Delete Success";
        }

    }

    public function add_post($data){
        $p_title = $data['post_title'];
        $p_content = $data['post_content'];
        $p_img = $_FILES['post_thumbnail']['name'];
        $p_img_tmp = $_FILES['post_thumbnail']['tmp_name'];
        $p_category = $data['post_category'];
        $p_summery = $data['post_summery'];
        $p_tag = $data['post_tag'];
        $p_status = $data['post_status'];


       $query = "INSERT INTO `posts`( `post_title`, `post_content`, `post_image`, `post_category`, `post_author`, `post_date`, `post_comment`, `post_summery`, `post_tag`, `post_status`) VALUES ('$p_title','$p_content','$p_img',$p_category,'Admin',now(),3,'$p_summery','$p_tag',$p_status)";

       if(mysqli_query($this->conn, $query)){
           move_uploaded_file($p_img_tmp, '../upload/'.$p_img);
           return "Post Added Successfully";
       }

    }

    public function display_post(){
        $query = "SELECT * FROM post_with_cat";

        if(mysqli_query($this->conn, $query)){
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    public function display_post_public(){
        $query = "SELECT * FROM post_with_cat WHERE post_status=1";

        if(mysqli_query($this->conn, $query)){
            $posts = mysqli_query($this->conn, $query);
            return $posts;
        }
    }

    public function displayPostById($id){
        $query = "SELECT * FROM post_with_cat WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
            $postDt = mysqli_query($this->conn, $query);
            $postData = mysqli_fetch_assoc($postDt);
            return $postData;
        }

    }

    public function updatePost($data){
        $up_id =$data['id'];
        $up_title = $data['up_post_title'];
        $up_content = $data['up_post_content'];
        $up_img = $_FILES['up_post_thumbnail']['name'];
        $up_img_tmp = $_FILES['up_post_thumbnail']['tmp_name'];
        $up_category = $data['up_post_category'];
        $up_summery = $data['up_post_summery'];
        $up_tag = $data['up_post_tag'];
        $up_status = $data['up_post_status'];


        $query = "UPDATE `posts` SET `post_title`='$up_title',`post_content`='$up_content',`post_image`='$up_img',`post_category`=$up_category,`post_date`=now(),`post_summery`='$up_summery',`post_tag`='$up_tag',`post_status`=$up_status WHERE `post_id`=$up_id";


       if(mysqli_query($this->conn, $query)){
           move_uploaded_file($up_img_tmp, '../upload/'.$up_img);
           return "Post Update Successfully";
       }
    }

    public function deletePost($id){
        $imgall = "SELECT * FROM posts WHERE post_id=$id";
        $imgdata = mysqli_query($this->conn, $imgall);
        $img = mysqli_fetch_assoc($imgdata);
        @ $image = $img['post_image'];
        $query = "DELETE FROM `posts` WHERE post_id=$id";
        if(mysqli_query($this->conn, $query)){
           @ unlink('../upload'.$image);
           return "Delete success";
        }

    }
    public function desplayCatById($id){
        $query = "SELECT * FROM `catagory` WHERE cat_id=$id";
        if(mysqli_query($this->conn, $query)){
            $returnData = mysqli_query($this->conn, $query);
            $catData = mysqli_fetch_assoc($returnData);
            return $catData;

        }

    }
    public function updateCat($data){
        $up_id = $data['up_id'];
        $up_cat_name = $data['up_cat_name'];
        $up_cat_des = $data['up_cat_des'];

        $query = "UPDATE `catagory` SET `cat_name`='$up_cat_name',`cat_description`='$up_cat_des' WHERE `cat_id`=$up_id";

        if(mysqli_query($this->conn, $query)){
            return "Update Success";
        }
    
    }









 }




?>