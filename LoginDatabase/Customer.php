<?php
class Customer extends User{


    private $address;
    private $mobilenumber;

	public function __construct(){
		parent::__construct();
	}
	
    function __construct($player_id, DB $db)
    {
        $stm = $this->connection->prepare_and_execute('SELECT * from users where id = ?', $_SESSION['user_id']);
        $result = $stm->fetch();
        $this->email = $result['email'];

        $stm = $this->db->prepare_and_execute(
            'SELECT * from user_details
             where user_id = ?',
             $_SESSION['user_id']
            );
        $resul
		t = $stm->fetch();

        $this->name = $result['name'];
        $this->age = $result['age'];
        $this->photo = $result['photo'];

    }

    public function setDateOfBirth($dateOfBirth){
        $this->dateOfBirth = $dateOfBirth;
    }
    
    //Get the person's name.
    public function getName(){
        return $this->name;
    }
}