<?php
require_once 'includes/dbconnection.php';
class GetRecentPost extends dbconnection{

    public function getPosts(){
        $getpost = "SELECT * FROM groupweb.posts ORDER BY 1 DESC LIMIT 0,5";
        $prepareget = $this->connectDb()->prepare($getpost);
        $prepareget->execute();
        $the_posts = $prepareget->rowCount();
        if($the_posts < 1){
            echo '<div class="alert alert-warning alert-dismissable container text-center text-warning" role="alert">
                            <button class="close" data-dismiss="alert">
                            <small><sup>x</sup></small>
                            </button>
                            We are sorry, we do not have any news and updates currently  but our admin is working on it.
                          </div>';
        }else{
           
           while($row =$prepareget -> fetch()){
                $post_Id= $row['post_id'];
                $author =  $row['author'];
                $post_date =  $row['dt_tm'];
                $post_title =  $row['title'];
                $post_content =  substr($row['content'],0,200);
                $post_image =  $row['img'];
                ?>
                <div class="container">
                <hr>
                    <div class="container post-titel">
                        <p class="grey-text"><i>Published on <?php echo $post_date;?></i></p>
                    </div>
                    <div class=" container post-content">
                        <a href="pages.php?id=<?php echo $post_Id;?>">
                    <h2 class='text-center h3 green-text'><?php echo $post_title;?></h2>
                    <img src="uploads/<?php echo $post_image; ?>"width="150" height="200"/>
                    </a>                       
                    </div>
                    <div class="container">
                        <p class="grey-text"><i>Published by <?php echo $author;?></i></p>
                    </div>

                </div>
               

                <?php
           }
        }

        
    }
}

$posts = new GetRecentPost();
$posts->getPosts();