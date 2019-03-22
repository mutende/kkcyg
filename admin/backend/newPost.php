<?php
require_once('../../includes/dbconnection.php');

class newPost extends dbconnection{
    private $p_title;
    private $author;
    private $phoneNo;
    private $email;
    private $p_content;
    //private $image;
   

//setters and getters
    public function setTitle($title){
        $this->p_title = $title;
    }
    
    public function setAuthor($author){
        $this->author = $author;
    }
    
    public function setPhoneNo($phoneNo){
        $this->phoneNo = $phoneNo;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
   
    public function setContent($p_content){
        $this->p_content = $p_content;
    }
   
    // public function setImage($image){
    //     $this->image = $image;
    // }
    
    public function setTemImage($temp_image){
            $this->temp_image = $temp_image;
    }
   

        //pregnatch
    private function authenticateEmail(){

    }

    public function makeNewPost($fileName,$fileTmpName, $fileSize, $fileError, $fileType){

        $fileActualExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        $allowedExt = array('jpg','jpeg','png','gif');

        if(in_array($fileActualExt,$allowedExt)){
            try{
                if($fileError === 0){
                    if($fileSize < 500000){
                            $fileNameNew = rand(1,100000000).".".$fileActualExt;
    
                            $fileDestination ='../../uploads/';
                            
                            move_uploaded_file( $fileTmpName,$fileDestination.$fileNameNew);
    
                             //get time
                            $post_time = date('H:i:s');
                            //add 3 hours for our time zone
                            $post_date = date('y/m/d H:i:s', strtotime($post_time) + (3600*3));
    
                               
                        $makepost = "INSERT INTO groupweb.posts (author,phone,email,dt_tm,title,content,img) VALUES ('$this->author','$this->phoneNo','$this->email','$post_date','$this->p_title','$this->p_content','$fileNameNew')";
    
                        try{
                            $this->connectDb()->exec($makepost);
                            header("Location: ../view_post.php?msg=Post successfully published");
                        }catch(ErrorException $e){
                            echo 'Erro'. $e->getMessage();
                        }
                    }else{
                        echo '<script> alert(\'Image size too big. use less than 500MB\')</script>';
                        echo '<script> window.open(\'../newpost.php\',\'_self\')</script>'; 
                    }
                }else{
                    echo '<script> alert(\'There was an error during image Upload. Retry\')</script>';
                    echo '<script> window.open(\'../newpost.php\',\'_self\')</script>';   
                }

            }catch(Exception $e){
                echo 'Error for image upload '.$e->getMessage();
            }
            
        }else{
            echo '<script> alert(\'Only jpeg, jpg, png and gif image types allowed. Retry\')</script>';
            echo '<script> window.open(\'../newpost.php\',\'_self\')</script>'; 
        }
       
       
    }

}

if(isset($_POST['post'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $phone = $_POST['contactsphone'];
    $email = $_POST['contactsemail'];
    $file = $_FILES['p_image'];

    $fileName = $_FILES['p_image']['name'];
    $fileTmpName = $_FILES['p_image']['tmp_name'];
    $fileSize = $_FILES['p_image']['size'];
    $fileError = $_FILES['p_image']['error'];
    $fileType = $_FILES['p_image']['type'];

  
    $post = new newPost();
    //set attributes
    $post->setAuthor($author);
    $post->setContent($content);
    $post->setEmail($email);
    $post->setPhoneNo($phone);
    $post->setTitle($title);
    // $post->setImage($img);
   

    

    $post->makeNewPost($fileName,$fileTmpName, $fileSize, $fileError, $fileType);

    
}