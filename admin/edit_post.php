<?php 
//require_once('backend/login.php');
session_start();

if (!isset($_SESSION['username'])){

  header('location:login.html');

}
else{?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../MDB/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="../MDB/css/mdb.min.css" rel="stylesheet">
    <!--  font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
    <!-- local css -->
    <link rel="stylesheet" href="css/style.css">
   
    <title> admin kkcyg edit Post </title>
    
  </head>
  <body>
    <head>
     <?php include 'includes/nav.html';?>
       
     </head>
    <div class="container editFiels">
    <?php
      require_once '../includes/dbconnection.php';
      class EditPost extends dbconnection{
        private $post_title;
        private $post_id;
        private $author_email;
        private $author_phone;
        private $post_content;

        //set parameters
       
        public function setPostID($post_id){
          $this->post_id = $post_id;
        }

       
        public function getThePostToEdit(){
          $getQuery = "SELECT * FROM groupweb.posts WHERE post_id = ?";
          $prepare = $this->connectDb()->prepare($getQuery);
          $prepare->execute([$this->post_id]);

          while($row=$prepare->fetch()){
            
            
            $author_email =  $row['email'];
            $author_phoneNo =  $row['phone'];
            $post_title = $row['title'];
            $post_content = $row['content'];
            $p_id = $row['post_id'];
            
            
              ?>
              <div class=" container-fluid newPost form-group">
             <h2 class="green-text h1 text-center">Edit Post</h2>
            
            <form action="backend/editPost.php?edit_form=<?php echo $p_id;?>" METHOD="POST">       
                <input type="text" class="form-control mb-3" name="title" placeholder="Post Title" maxlength="50" value= "<?php echo $post_title; ?>" required>
                <input type="text" class="form-control disabled mb-3" name="author" placeholder="Posting Author" value="<?php echo $_SESSION[ 'username'];?>" required>
                <input type="email" class="form-control mb-3" name="contactsemail" placeholder="Email(exampling@gmail.com)" value="<?php echo $author_email;?>" required>
                <input type="text" class="form-control mb-3" name="contactsphone" placeholder="Phone Number(07...)" maxlength="10"  value= "<?php echo $author_phoneNo; ?>"  required>
                <textarea class="form-control" name="content" cols="20" rows="4" placeholder="Post Content"  required> <?php echo $post_content;?></textarea>
                <label for="" class="black-text">Upload Image</label><br>
                <input type="file" class="black-text" name="p_image"><br>
                <button type="submit" class="btn btn-success" name="edit">Edit Post</button>
            </form>
    
        </div>

              <?php
          }
        }
      }

      if(isset($_GET['id'])){
        $p_id = $_GET['id'];
        $edit= new EditPost();
        $edit->setPostID($p_id);
        $edit->getThePostToEdit();
      }
    ?>
        
</div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- Jquery -->
    <script src="../MDB/js/jquery-3.3.1.min.js"></script>
    <!-- popper js -->
    <script src="../MDB/js/popper.min.js"></script>
    
    <!-- bootsrap.js -->
    <script src="../MDB/js/bootstrap.min.js"></script>
  </body>
</html>
   <?php  }?>