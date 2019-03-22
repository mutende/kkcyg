<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="MDB/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="MDB/css/mdb.min.css" rel="stylesheet">
    <!--  font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <!-- local css -->
    <link rel="stylesheet" href="css/style.css">
    <title>kkcyg</title>
  </head>
  <body>
    <!-- navbar -->
    <head>
        <?php include 'includes/pagesnav.html'; ?>
    </head>
    <!-- full posts -->
    <div class="container">
        <?php
            
            require_once 'includes/dbconnection.php';
            class GetPost extends dbconnection{
                private $id;

                public function setId($post_id){
                    $this->id = $post_id;
                }
            
                public function getPosts(){
                    $getpost = "SELECT * FROM groupweb.posts WHERE post_id=?";
                    $prepareget = $this->connectDb()->prepare($getpost);
                    $prepareget->execute([$this->id]);
                   
                       while($row =$prepareget -> fetch()){
                           
                            $author =  $row['author'];
                            $post_date =  $row['dt_tm'];
                            $post_title =  $row['title'];
                            $post_content =  $row['content'];
                            $post_image =  $row['img'];
                            ?>
                            <div class="container">
                                <div class="container post-titel">
                                    <h2 class='text-center green-text'><?php echo $post_title;?></h2>
                                </div>
                                <div class=" container post-content">
                                <img src="uploads/<?php echo $post_image; ?>"width="150" height="200"/>
                                    <p>
                                        <?php echo $post_content;?>
                                        
                                        <!-- <a href="pages.php?title=<?php echo $post_title;?>" class="blue-text">...Read More</a> -->
                                    </p>
                                    
                                </div>
                                <div class="container">
                                    <p class="grey-text"><i>Published by <?php echo $author;?> on <?php echo $post_date;?> </i></p>
                                </div>
            
                            </div>
                            <hr>
            
                            <?php
                       }          
            
                    
                }
            }
            if (isset($_GET['id'])) {
                # code...
                $the_postID = $_GET['id'];
                $posts = new GetPost();
                $posts->setId($the_postID);
                $posts->getPosts();
            }
            
        ?>
    </div>
            
    <!-- footer -->
    <div->
      <?php include 'includes/footer.html'; ?>
      
    </div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- Jquery -->
    <script src="MDB/js/jquery-3.3.1.min.js"></script>
    <!-- popper js -->
    <script src="MDB/js/popper.min.js"></script>
    
    <!-- bootsrap.js -->
    <script src="MDB/js/bootstrap.min.js"></script>
  </body>
</html>