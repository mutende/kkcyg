<?php
 require_once('../../includes/dbconnection.php');

 class Authenticate extends dbconnection{
     private $username;
     private $userpass;

     //constructor
     public function __construct(){

     }

     //setters and getters
     public function setUserName($user){
        $this->username = $user;
     }

     public function setUserPass($pass){
         $this->userpass = $pass;
     }

     public function authenticate(){
        $search="SELECT * FROM groupweb.admin WHERE u_name= ?";
        $pre=$this->connectDb()->prepare($search);
        $pre->execute([$this->username]);
        $rows=$pre->rowCount();

        //no user 
        if($rows<1){
            echo '<script> alert(\'User does not exist.\')</script>';
             echo '<script> window.open(\'../login.html\',\'_self\')</script>'; 
        }else{
            
            //get the password
                if($row = $pre->fetch(PDO::FETCH_ASSOC)){

                    $verifiedPass = password_verify($this->userpass,$row['pass']);

                    //password do not match
                    if(!$verifiedPass){

                        echo '<script> alert(\'Incorrect Password.\')</script>';
                        echo '<script> window.open(\'../login.html\',\'_self\')</script>'; 
                    }else{
                        try {
                            //get user into the system
                            session_start();
                            $_SESSION['username']= $row['u_name'];
                            header("Location: ../index.php?msg=logged in Successfully");
                        }catch(Exception $e){
                                echo 'Error Can not Acces the Index page'.$e->getMessage();
                        }
                    }
                }else{
                    echo '<script> alert(\'Cant Get The Password.\')</script>';
                    echo '<script> window.open(\'../login.html\',\'_self\')</script>'; 
                }
        }
     }
 }

 if(isset($_POST['login'])){
     $username = $_POST['username'];
     $password = $_POST['password'];

     $login=new Authenticate();
     $login->setUserName($username);
     $login->setUserPass($password);


     $login->authenticate();
 }

if(isset($_GET['toregister'])){
   
    header("Location: ../signup.html?register");
}