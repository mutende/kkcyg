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
    <!-- local css -->
    <link rel="stylesheet" href="css/style.css">
    <title>kkcyg</title>
  </head>
  <body>
    <!-- navbar -->
    <head>
        <?php include 'includes/searchnav.html'; ?>
    </head>
    <!-- searched posts -->
    <div class="container">

    <?php
require_once 'includes/dbconnection.php';
class SearchedPost extends dbconnection{
    
    public function getRelatedPost($kw){
        $search_query = "SELECT * FROM groupweb.posts WHERE title LIKE ?";
        $prepare_search = $this->connectDb()->prepare($search_query);
        $prepare_search->execute([$kw]);
        if($prepare_search->rowCount() < 1){

            ?>
                <div class="danger">
                        <h3>
                            There are no posts related to <?php echo $kw;?>
                        </h3>
                </div>
            <?php
        }else{

            while($row = $prepare_search->fetch()){
                $post_Id= $row['post_id'];
                $author =  $row['author'];
                $post_date =  $row['dt_tm'];
                $post_title =  $row['title'];
                $post_content =  substr($row['content'],0,200);
                $post_image =  $row['img'];
                ?>
                <div class="container">
                    <div class="container post-titel">
                        <p class="grey-text"><i>Published on <?php echo $post_date;?></i></p>
                        <h2 class='text-center green-text'><?php echo $post_title;?></h2>
                    </div>
                    <div class=" container post-content">
                    <img src="uploads/<?php echo $post_image; ?>"width="150" height="200"/>
                        <p>
                            <?php echo $post_content;?>
                            
                            <a href="pages.php?id=<?php echo $post_Id;?>" class="blue-text">...Read More</a>
                        </p>
                        
                    </div>
                    <div class="container">
                        <p class="grey-text"><i>Published by <?php echo $author;?></i></p>
                    </div>

                </div>
                <hr>

                <?php   
            }
        }
    }
}

if(isset($_GET['searchbtn'])){
    $keywords = $_GET['search'];
    $search = new SearchedPost();
  
   
    $search->getRelatedPost($keywords);

}
?>
    </div>
            
    <!-- footer -->
    <div>
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