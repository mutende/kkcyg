<?php
require_once('../includes/dbconnection.php');

class NewComment extends dbconnection{

    private $nm;
    private $phoneNo;
    private $email;
    private $comment;
    
//setters and getters
       
    public function setNm($nm){
        $this->nm = $nm;
    }
   
    public function setPhoneNo($phoneNo){
        $this->phoneNo = $phoneNo;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setComment($comment){
        $this->comment = $comment;
    }
    

        //pregmatch
    private function authenticateEmail(){

    }

    public function makeComment(){

        //get time
        $comment_time = date('H:i:s');
        //add 3 hours for our time zone
        $comment_date = date('y/m/d H:i:s', strtotime($comment_time) + (3600*3));

        //move to temporary location
       // move_uploaded_file($this->temp_image,"../../images/$this->image");

       $makecomment = "INSERT INTO groupweb.comments (c_dt_tm,nm,email,phoneNo,comments) VALUES ('$comment_date','$this->nm','$this->email','$this->phoneNo','$this->comment')";

       try{
           $this->connectDb()->exec($makecomment);
           header("Location: ../index.php?Thank You for your comment");
       }catch(ErrorException $e){
           echo 'Erro'. $e->getMessage();
       }
    }

}

if(isset($_POST['submitComment'])){
    
    $name = $_POST['name'];
    $cmnt = $_POST['comment'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $comment = new NewComment();
    //set attributes
    $comment->setNm($name);
    $comment->setComment($cmnt);
    $comment->setEmail($email);
    $comment->setPhoneNo($phone);
    
       

    $comment->makeComment();

    
}