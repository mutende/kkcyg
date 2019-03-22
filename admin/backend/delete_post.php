<?php
require_once '../../includes/dbconnection.php';
class DeletePost extends dbconnection{
    private $postID;
    public function setPostID($postID){
        $this->postID = $postID;
    }

    public function delete(){
        $dlt = "DELETE FROM groupweb.posts WHERE post_id = ?";
        $prepare_dlt = $this->connectDb()->prepare($dlt);
        if($prepare_dlt->execute([$this->postID])){
            echo '<script> alert(\'Post Deleted.\')</script>';
            echo '<script> window.open(\'../view_post.php\',\'_self\')</script>'; 
        }else{

            echo '<script> alert(\'Comment Not Deleted. Retry\')</script>';
            echo '<script> window.open(\'../view_post.php\',\'_self\')</script>'; 
        }
      
    }
}
if(isset($_GET['id'])){
    $post_id = $_GET['id'];
    $del = new DeletePost();
    $del->setPostID($post_id);
    $del->delete();
}