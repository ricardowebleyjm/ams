<?php 
    class users{
        private $db;

        
        function __construct($connectionObject){
            $this->db = $connectionObject;
        }

        public function getUser($username,$password){
            try{
                $sql = "select * from users_tb where username = :username AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getUserbyUsername($username){
            try{
                $sql = "select count(*) as num from users where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }
        public function getUsers(){
            try{
                $sql = "SELECT * FROM users";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>