<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($User) {
        // Insert user into database
        $result = mysql_query("INSERT INTO user(Name) VALUES('$User')");
		
        if ($result) {
			return true;
        } else {			
				// For other errors
				return false;
		}
    }

	

	
    public function sendPurchaserRequest($purchasorName, $type, $standard, $amount) {
        $connection = $this->db->connect();
        $result = mysqli_query($connection, "INSERT INTO purchase_requests(purchasor_name, type, standard, amount) values('$purchasorName', '$type', '$standard', $amount)");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	
	

	 public function biddingRequest($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO bidding_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	
	public function biddingvRequest($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO limited_pro_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }

	
 public function limitedProcurmentRequest($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO limited_procurment_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }

	
 public function sendProformaRequest($purchasorName, $type, $standard, $amount, $remarks) {
        $connection = $this->db->connect();
        $result = mysqli_query($connection, "INSERT INTO proforma_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }


    
    public function signUpUser($fname, $lname, $email, $password, $role) {
        $connection = $this->db->connect();
        $encrypted_password = md5($password);
        $result = mysqli_query($connection, "INSERT INTO users values('$fname', '$lname', '$email', '$encrypted_password', '$role', 0)");
        if($result) {
            return true;
        } else {
            return false;
        }
    }

	 /**
     * Getting all users asking to sign up
     */
    public function getSignUpRequests() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM users where status = 0");
        return $result;
    }
	 /**
     * Getting all users asking to sign up
     */
    public function getBiddingRequests() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM bidding_request");
        return $result;
    }
	
	 public function getLimitedProcurmentRequests() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM limited_pro_request");
        return $result;
    }
	
	 public function getProformaRequests() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM proforma_request");
        return $result;
    }
	/**
	* Getting all request from Purchaser
	*/
	public function getrequestFromPurchaser() {
		$connection = $this->db->connect();
		$result = mysqli_query($connection, "SELECT * FROM purchase_requests where status = 0");
		return $result;
	}
    /**
     * Getting the person trying to login
     */
    public function loginUser($email, $password) {
        $connection = $this->db->connect();    
        $encryptedPassword = md5($password);    
        $result = mysqli_query($connection, "SELECT * FROM users where e_mail = '$email' AND password = '$encryptedPassword' AND status=1");
        return $result;
    }
	/**
     * Get Yet to Sync row Count
     */
    public function declineSignUpRequest($email) {
        $connection = $this->db->connect();            
        $result = mysqli_query($connection, "DELETE FROM users WHERE e_mail = '$email'");
        return $result;
    }
	
	public function acceptSignUpRequest($email){
        $connection = $this->db->connect();            
		$result = mysqli_query($connection, "UPDATE users SET status = 1 WHERE e_mail = '$email'");
		return $result;
	}

	public function declinePurchasorRequest($id) {
        $connection = $this->db->connect();            
        $result = mysqli_query($connection, "DELETE FROM purchase_requests WHERE id = '$id'");
        return $result;
    }
	
	public function acceptPurchasorRequest($id){
        $connection = $this->db->connect();            
		$result = mysqli_query($connection, "UPDATE purchase_requests SET status = 1 WHERE id = '$id'");
		return $result;
	}
}

?>
