<?php 

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
   
    <title> admin kkcyg view post</title>
    
  </head>
  <body>
    <?php include 'includes/nav.html';?>
        <?php
            require_once '../includes/dbconnection.php';
            class Post extends dbconnection
            {
                public function getPosts()
                {
                    $getpost = "SELECT * FROM groupweb.posts ORDER BY 1 DESC ";
                    $prepareget = $this->connectDb()->prepare($getpost);
                    $prepareget->execute();
                    $the_post = $prepareget->rowCount();
                    if($the_post < 1){
                        echo '<div class="alert alert-danger alert-dismissable container text-center text-danger" role="alert">
			            <button class="close" data-dismiss="alert">
			              <small><sup>x</sup></small>
			            </button>
			           No post currently
			            
			          	</div>';
                    }else{

                        echo '<div class="alert alert-success alert-dismissable container text-center text-success" role="alert">
                            <button class="close" data-dismiss="alert">
                            <small><sup>x</sup></small>
                            </button>
                            Post are as listed below
                          </div>';
                          ?>
                           <div class="container-fluid comments-table bd">
                          <table class="table table-striped table-bordered table-condensed table-sm mt-3">
                            <tr class="green-text text-center">
                                <th scope="col">No</th>
                                <th scope="col">Author</th>
                                <th scope="col">Author Email</th>
                                <th scope="col">AuthorPost Phone</th>
                                <th scope="col">Post Date</th>
                                <th scope="col">Post Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Content</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                
                            </tr>
                          <?php
                          $count = 0;
                          while($row =$prepareget -> fetch()){
                            
                            $post_date= $row['dt_tm'];
                            $author_name =  $row['author'];
                            $author_email =  $row['email'];
                            $author_phoneNo =  $row['phone'];
                            $post_title = $row['title'];
                            $post_content = substr($row['content'],0,100);
                            $post_image = $row['img'];
                            $post_id = $row['post_id'];

                            $count ++;
                           ?>
                            <tr class ="white-text mb-0">
                                <td><?php echo $count; ?></td>
                                <td><?php echo $author_name; ?></td>
                                <td><?php echo $author_email; ?></td>
                                <td><?php echo $author_phoneNo; ?></td>
                                <td><?php echo $post_date; ?></td>
                                <td><?php echo $post_title; ?></td>
                                <td><img src="../uploads/<?php echo $post_image; ?>" height="70px" width="100px"></td>
                                <td><?php echo  $post_content; ?></td>
                               <td> <a href="edit_post.php?id=<?php echo $post_id;?>" class="blue-text" id="delete_comment">Edit</a></td>
                                <td> <a href="backend/delete_post.php?id=<?php echo $post_id;?>" class="blue-text" id="delete_comment">Delete</a></td>
                            </tr>
                            <?php
                           
                                }
                    ?>
                      </table>
                    </div>
                   
                    <?php
                }
            }
        }

            $getpsts = new Post();
            $getpsts->getPosts();
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