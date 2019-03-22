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
   
    <title> admin kkcyg</title>
    
  </head>
  <body>
    <head>
     <?php include 'includes/nav.html';?>
       
     </head>
     <!-- <div class="container">
         <?php //include 'includes/newpostform.html'; ?>
     </div> -->
    <div class="container">
        <div class=" container-fluid newPost form-group">
             <h2 class="green-text h1 text-center">New Post</h2>
            
            <form action="backend/newPost.php" METHOD="POST" enctype="multipart/form-data">       
                <input type="text" class="form-control mb-3" name="title" placeholder="Post Title" maxlength="50" required>
                <input type="text" class="form-control disabled mb-3" name="author" placeholder="Posting Author" value="<?php echo $_SESSION[ 'username'];?>" required>
                <input type="email" class="form-control mb-3" name="contactsemail" placeholder="Email(exampling@gmail.com)" required>
                <input type="text" class="form-control mb-3" name="contactsphone" placeholder="Phone Number(07...)" maxlength="10" required>
                <textarea class="form-control" name="content" cols="20" rows="4" placeholder="Post Content" required></textarea>
                <label for="" class="black-text">Upload Image</label><br>
                <input type="file" class="black-text" name="p_image"><br>
                <button type="submit" class="btn btn-success" name="post">Publish</button>
            </form>

        </div>
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