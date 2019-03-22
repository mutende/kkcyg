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
    <script>
      function openSlideMenu(){
        document.getElementById('menu').style.width = '250px';
        document.getElementById('content').style.marginLeft = '250px';
      }
      function closeSideMenu(){
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
      }
    </script>
  </head>
  <body>
    <?php include 'includes/nav.html';?>
     <div class= "container">
     <div id="content">
    <span class="slide">
          <a href="#" onclick="openSlideMenu()">
        <i class=" fa fa-bars"></i>
        </a>
        <div class="container">
        <p class="h3 green-text">

      The administrative panel to perform some administrative tasks. Take care of what is posted here.
         
        </p>
       </div>
     </div>
      </span>
   
    <div id="menu" class="nav">
        <a href="#" class="close" onclick="closeSideMenu()">
            <i class=" fa fa-times"></i>
        </a>
        <ul>
        <h2 class='green-text'>
        <i id="icons" class=" fa fa-user"></i>
            <?php echo ($_SESSION['username']);?>
        </h2>
            
            <li>
            <i id="icons" class="fa fa-pencil-square-o" aria-hidden="true"></i>
              <a href="newpost.php">New Post</a>
            </li>
            <li>
            <i id="icons" class=" fa fa-comments" aria-hidden="true"></i>
              <a href="comments.php" >Comments</a>
            </li>
            <li>
            <i id="icons" class="fa fa-file-text-o" aria-hidden="true"></i>
              <a href="view_post.php" id="editPostLink" onclick="toggleEditPost()">View Posts</a>
            </li>
            <!-- <li><a href="">Contact</a></li> -->
            <li>
            <i id="icons" class=" fa fa-power-off mt-auto"></i>
              <a href="backend/logout.php">Logout</a>
              </li>

        </ul>

    </div>
   

</div>       
     </div>
    <script type="text/javascript" src="js/formtoggler.js"></script>

    
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