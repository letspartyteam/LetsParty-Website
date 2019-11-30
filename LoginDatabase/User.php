<?php
include_once('DbConnection.php');
 
class User extends DbConnection{
	
	    private $username;
		private $password;
		private $email;
 
    public function __construct(){
 
        parent::__construct();
    }
 
    public function check_login($username, $password){ 
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
	
	public function reg_user($email,$username,$password,$name){
            $sql="SELECT * FROM users WHERE username='$username' OR email='$email'";

            //checking if the username or email is available in db
            $check =  $this->connection->query($sql) ;
            $count_row = $check->num_rows;
            //if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET username='$username', password='$password', name='$name', email='$email', type=1";
				$result = $this->connection->query($sql1);
			return $result; }
			else { return false;}
	}
 

 
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}
?>