<?php
class Customer extends User{


    private $orders;
    private $mobilenumber;

	public function __construct(){
		parent::__construct();
	}
	
    function __construct($address, $mobilenumber)
    {
        $stm = $this->connection->prepare_and_execute('SELECT * from users where id = ?', $_SESSION['user_id']);
        $result = $stm->fetch();

        $stm = $this->db->prepare_and_execute(
            'SELECT * from user_details where user_id = ?', $_SESSION['user_id']
            );
        $result = $stm->fetch();

        $this->orders = $result['orders'];

    }

    public function setorder($dateOfBirth){
        $this->mobilenumber = $mobilenumber;
    }

    
    public function getorder(){
        return $this->address;
    }

}