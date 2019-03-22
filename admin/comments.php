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
    <style>
        /* a:hover{
            border: 1px solid red;
            font-color
        } */
    </style>
    <title> admin kkcyg read comments</title>
    
  </head>
  <body>
    <?php include 'includes/nav.html';?>
        <?php
            require_once '../includes/dbconnection.php';
            class Comments extends dbconnection
            {
                public function getComments()
                {
                    $getcomnts = "SELECT * FROM groupweb.comments ORDER BY 1 DESC ";
                    $prepareget = $this->connectDb()->prepare($getcomnts);
                    $prepareget->execute();
                    $the_comments = $prepareget->rowCount();
                    if($the_comments < 1){
                        echo '<div class="alert alert-danger alert-dismissable container text-center text-danger" role="alert">
			            <button class="close" data-dismiss="alert">
			              <small><sup>x</sup></small>
			            </button>
			           No comments Currently
			            
			          	</div>';
                    }else{

                        echo '<div class="alert alert-success alert-dismissable container text-center text-success" role="alert">
                            <button class="close" data-dismiss="alert">
                            <small><sup>x</sup></small>
                            </button>
                            You have some comments listed below.
                          </div>';
                          ?>
                           <div class="container-fluid comments-table bd">
                          <table class="table table-striped table-bordered table-condensed table-sm mt-3">
                            <tr class="green-text text-center">
                                <th scope="col">No</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Client Email</th>
                                <th scope="col">Client Phone</th>
                                <th scope="col">Comment Date</th>
                                <th scope="col">Client Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                          <?php
                          $count = 0;
                          while($row =$prepareget -> fetch()){
                            
                            $comment_date= $row['c_dt_tm'];
                            $cleint_name =  $row['nm'];
                            $cleint_email =  $row['email'];
                            $client_phoneNo =  $row['phoneNo'];
                            $client_comment = $row['comments'];
                            $comment_id = $row['c_id'];

                            $count ++;
                           ?>
                            <tr class ="white-text mb-0">
                                <td><?php echo $count; ?></td>
                                <td><?php echo $cleint_name; ?></td>
                                <td><?php echo $cleint_email; ?></td>
                                <td><?php echo $client_phoneNo; ?></td>
                                <td><?php echo $comment_date; ?></td>
                                <td><?php echo $client_comment; ?></td>
                                <td> <a href="backend/delete_comment.php?id=<?php echo $comment_id;?>" class="blue-text" id="delete_comment">Delete</a></td>
                            </tr>
                            <?php

                    }
                    ?>
                    </div>
                    <?php
                }
            }
        }

            $getcmts = new Comments();
            $getcmts->getComments();
        ?>
    

    
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