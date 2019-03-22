<?php
require_once '../../includes/dbconnection.php';
class DeleteComment extends dbconnection{
    private $commentId;
    public function setCommentID($commentId){
        $this->commentId = $commentId;
    }

    public function delete(){
        $dlt = "DELETE FROM groupweb.comments WHERE c_id = ?";
        $prepare_dlt = $this->connectDb()->prepare($dlt);
        if($prepare_dlt->execute([$this->commentId])){
            echo '<script> alert(\'Comment Deleted.\')</script>';
            echo '<script> window.open(\'../comments.php\',\'_self\')</script>'; 
        }else{

            echo '<script> alert(\'Comment Not Deleted. Retry\')</script>';
            echo '<script> window.open(\'../comments.php\',\'_self\')</script>'; 
        }
      
    }
}
if(isset($_GET['id'])){
    $comment_id = $_GET['id'];
    $del = new DeleteComment();
    $del->setCommentID($comment_id);
    $del->delete();
}