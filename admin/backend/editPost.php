<?php
   require_once '../../includes/dbconnection.php';
    class EditPost extends dbconnection{
        private $post_title;
        private $post_id;
        private $author_email;
        private $author_phone;
        private $post_content;
        private $post_img;
        private $author;
        private $temp_image;

        //set parameters
        public function setAuthor($author){
            $this->author= $author;
        }
        public function setPostTitle($post_title){

            $this->post_title = $post_title;
          }
  
          public function setPostID($post_id){
            $this->post_id = $post_id;
          }
  
          public function setEmail($author_email){
            $this->author_email = $author_email;
          }
  
          public function setPhone($author_phone){
            $this->author_phone = $author_phone;
          }
  
          public function setContent($post_content){
            $this->post_content = $post_content;
          }

          public function setImage($post_img){
            $this->post_img = $post_img;
          }

          public function editPost(){

            //get time
            $new_post_time = date('H:i:s');
            //add 3 hours for our time zone
            $new_post_date = date('y/m/d H:i:s', strtotime($new_post_time) + (3600*3));

            $edit_query = "UPDATE groupweb.posts SET author = ?, phone = ?, email =?, dt_tm= ?, title =? ,content = ?,img = ? WHERE post_id = ?";
            try{
                $prepare = $this->connectDb()->prepare($edit_query);
                $prepare->execute([$this->author,$this->author_phone,$this->author_email,$new_post_date,$this->post_title,$this->post_content,$this->post_img,$this->post_id]);
                header("Location: ../view_post.php?msg=Post successfully published");
            }catch(Exception $e){
                echo 'Upadet Error '.$e->getMessage();
            }
          }
    }

    if(isset($_POST['edit'])){
        $post_id = $_GET['edit_form'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $phone = $_POST['contactsphone'];
        $email = $_POST['contactsemail'];

        $edt = new EditPost();

        $edt->setAuthor($author);
        $edt->setContent($content );
        $edt->setEmail($email);
        $edt->setPhone($phone);
        $edt->setPostID($post_id);
        $edt->setPostTitle($title);

        $edt->editPost();
    }
?>