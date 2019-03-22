<?php
 require_once('../../includes/dbconnection.php');
    class createUser extends dbconnection{
        private $userName;
        private $fullName;
        private $password;
        private $confirmPassword;

        //constructor
        public function __construct(){

        }

        //setters and getters

        public function setUserName($uname){
                $this->userName = $uname;
        }

        public function setFullName($fname){
            $this->fullName = $fname;
        }

        public function setPassword($pass){
                $this->password = $pass;
        }

        public function setConfirmPassword($uname){
            $this->confirmPassword = $uname;
        }

        
        //duplicate data
        private function duplicateUsers($username){
            
            $search="SELECT * FROM groupweb.admin WHERE u_name= ?";
            $pre=$this->connectDb()->prepare($search);
            $pre->execute([$username]);
            $rows=$pre->rowCount();
            
            if ($rows>0) {
            
            return true;
            }else{

            return false;
            }
            }

        private function verification($usernm, $fullnames, $password, $confirmpassword){
            $state;
            if($usernm == '' || $fullnames == '' || $password == '' || $confirmpassword== ''){

                $state = true;
                
            }else{
                    $state =false;
            }
            
            return $state;
        }

        public  function addUser(){

            //instantiate the class
                $checkUserErrors = new createUser();

            //check if the passwords match
            if($this->password != $this->confirmPassword){
                echo '<script> alert(\'Password Do not match.\')</script>';
                echo '<script> window.open(\'../signup.html\',\'_self\')</script>';
            }
            //check the length of the password
            else
            if(strlen($this->password )< 6){

                echo '<script> alert(\'Password too short.\')</script>';
                echo '<script> window.open(\'../signup.html\',\'_self\')</script>';

            }else
            
            if($checkUserErrors-> verification($this->userName, $this->fullName,$this->password , $this->confirmPassword)){
                
                echo '<script> alert(\'Some Fields are Empty.\')</script>';
                echo '<script> window.open(\'../signup.html\',\'_self\')</script>';
            }
            else
            if($checkUserErrors->duplicateUsers($this->userName)){

                echo '<script> alert(\'Username has been taken.\')</script>';
                echo '<script> window.open(\'../signup.html\',\'_self\')</script>';
            }
            else{
               
                $hashedpass = password_hash($this->password,PASSWORD_DEFAULT);
                $inseruser = "INSERT INTO  groupweb.admin (u_name, f_name, pass, date)  VALUES ('$this->userName','$this->fullName','$hashedpass',NOW()) ";
                try{
                    $this->connectDb()->exec($inseruser);
                    header("Location: ../login.html?msg=Account Created Successfully");
                }catch(Exception $e){
                    echo "ERROR: ". $e->getMessage();
                }
            }

        }
    }

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $fullnames = $_POST['fullnames'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirmpassword'];

        $newUser =  new createUser();

        $newUser->setUserName($username);
        $newUser->setFullName($fullnames);
        $newUser->setPassword($password);
        $newUser->setConfirmPassword($confirm_pass);
        
        $newUser->addUser();

    }

    if(isset($_GET['tologin'])){
       
       header("Location: ../login.html?login");
    }