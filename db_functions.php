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

	

	
    public function sendPurchaserRequest($purchasorName, $type, $standard, $amount, $remark) {
        $connection = $this->db->connect();
        $result = mysqli_query($connection, "INSERT INTO purchasing_request(requestor_name, material_description, unit, quantity, remark) values('$purchasorName', '$type', '$standard', $amount, '$remark')");
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
        $result = mysqli_query($connection, "SELECT * FROM purchasing_request where accept_by_finance=1 AND accept_by_inventory = 1 AND accept_by_pm = 1");
        return $result;
    }
	
    
	public function getApprovedMaterial() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM purchasing_request where accept_by_finance = 1 and accept_by_inventory = 1 and accept_by_pm =1");
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
	public function getrequestFromPurchaser_inventory() {
		$connection = $this->db->connect();
		$result = mysqli_query($connection, "SELECT * FROM purchasing_request where accept_by_inventory = 0");
		return $result;
	}
	public function getrequestFromPurchaser_casher() {
		$connection = $this->db->connect();
		$result = mysqli_query($connection, "SELECT * FROM purchasing_request where accept_by_finance = 0");
		return $result;
	}
	public function getrequestFromPurchaser_proManeger() {
		$connection = $this->db->connect();
		$result = mysqli_query($connection, "SELECT * FROM purchasing_request where accept_by_pm = 0");
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
	/* 		
		approve purchasing request by three actors

	*/
	public function declinePurchasorRequest_inventory($id) {
        $connection = $this->db->connect();            
        $result = mysqli_query($connection, "DELETE FROM purchasing_request WHERE id = '$id'");
        return $result;
    }
	
	public function acceptPurchasorRequest_inventory($id){
        $connection = $this->db->connect();            
		$result = mysqli_query($connection, "UPDATE purchasing_request SET accept_by_inventory = 1 WHERE id = '$id'");
		return $result;
    }
	public function declinePurchasorRequest_casher($id) {
        $connection = $this->db->connect();            
        $result = mysqli_query($connection, "DELETE FROM purchasing_request WHERE id = '$id'");
        return $result;
    }
	
	public function acceptPurchasorRequest_casher($id){
        $connection = $this->db->connect();            
		$result = mysqli_query($connection, "UPDATE purchasing_request SET accept_by_finance = 1 WHERE id = '$id'");
		return $result;
    }
	public function declinePurchasorRequest_proManeger($id) {
        $connection = $this->db->connect();            
        $result = mysqli_query($connection, "DELETE FROM purchasing_request WHERE id = '$id'");
        return $result;
    }
	
	public function acceptPurchasorRequest_proManeger($id){
        $connection = $this->db->connect();            
		$result = mysqli_query($connection, "UPDATE purchasing_request SET accept_by_pm = 1 WHERE id = '$id'");
		return $result;
    }
	/*end of approval*/
    
     /*
        select list of materials which is not approved
       
      */   
      public function requiredMaterial(){
          $connection = $this->db->connect();
          $result = mysqli_query($connection,"SELECT * from purchasing_request");
          return $result;
      }

     public function acceptRequest($material_desc,$quantity,$name,$unit,$unit_price,$total_price,$remark,$sub_date){

        $dt = new DateTime();
        $dt = $dt->format('Y-m-d');

         $connection = $this->db->connect(); 
         mysqli_query($connection,"INSERT into approved_pr values('','$material_desc','$quantity','$dt','$sub_date','$name','$unit','$unit_price','$total_price','$remark')");
         mysqli_query($connection,"DELETE FROM purchasing_request WHERE material_description = '$material_desc'"); 

        }

      public function inserttoStore($material_desc,$unit,$quantity,$unit_price,$total_price,$remark){
          $dt = new DateTime();
          $delivered_date = $dt->format('Y-m-d');
          $connection = $this->db->connect();
          $result = mysqli_query($connection,"SELECT * FROM store WHERE material_description='$material_desc'");
          $num_of_rows=mysqli_num_rows($result);
          if($num_of_rows == 0){
          mysqli_query($connection,"INSERT into store values('','$material_desc','$unit','$quantity','$unit_price','$total_price','$remark')");
          }else{
            while($row = mysqli_fetch_object($result)){
                $quant=$row->quantity;
                $quant=intval($quant);
                $quantity=intval($quantity);
                $currentQuantity=$quant+$quantity;                
               mysqli_query($connection,"UPDATE store SET quantity='$currentQuantity' where material_description='$material_desc'");
               mysqli_query($connection,"DELETE FROM requested_materials WHERE material_description = '$material_desc'");

          }
        }

         }
         
        //record of inventory 
        public function inserttoInventoryRec($material_desc,$quantity,$delivered_by,$unit,$unit_price,$total_price,$remark){
            $dt = new DateTime();
            $delivered_date = $dt->format('Y-m-d');
            $connection = $this->db->connect();
            mysqli_query($connection,"INSERT into inventory_record values('','$material_desc','$delivered_date','$delivered_by','$unit','$quantity','$unit_price','$total_price','$remark')");
            mysqli_query($connection,"DELETE FROM approved_pr WHERE material_description = '$material_desc'"); 

        }
      //draw material from store
      
      public function drawmaterialfromStore($material_desc,$quantity){
          $connection = $this->db->connect();
          $result = mysqli_query($connection,"SELECT * from store WHERE material_description='$material_desc'");
          $num_of_rows=mysqli_num_rows($result);

          if($num_of_rows !=0){
            $res=mysqli_query($connection,"SELECT * FROM store where material_description = '$material_desc'");
            while($row = mysqli_fetch_object($res)){
              $quant=$row->quantity;
              $quant=intval($quant);
              $quantity=intval($quantity);
              $currentQuantity=$quant-$quantity; 
              mysqli_query($connection,"UPDATE store SET quantity ='$currentQuantity' where material_description='$material_desc'");
              mysqli_query($connection,"DELETE FROM requested_materials WHERE material_description = '$material_desc'");
             } 
    
          }
        }


     public function declineRequest($type){
         $connection = $this->db->connect();
         $result = mysqli_query($connection,"DELETE FROM purchasing_request Where type = '$type'");
        }  

     public function store(){
         $connection = $this->db->connect();
         $result = mysqli_query($connection,"SELECT * FROM store");
         return $result;
     } 
     
     //draw inventory
     public function drawInventory($type,$standard,$currentAmount){
        $connection = $this->db->connect();
        mysqli_query($connection,"UPDATE purchasing_request SET amount = $currentAmount WHERE type = '$type' ");    
      
      }

     //to notify inventory manager
     public function numInventory(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * from purchasing_request WHERE acceptance_status = 0");
        return $result;
    }
   
    //approved purchasing request

    public function numApr(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * FROM approved_pr");
        return $result;
    }
    
    //number of material request

    public function no_of_mRequest(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * FROM requested_materials");
        return $result;
    }
    //inventory record

    public function inventoryRecord(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * FROM inventory_record");
        return $result;
    }
    //requested material

    public function requestedMaterial(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * FROM requested_materials");
        return $result;
    }
   //approved purchasing request

   public function approvedPr(){
       $connection = $this->db->connect();
       $result = mysqli_query($connection,"SELECT * FROM approved_pr");
       return $result;
   }
   public function getofficer() {
        $connection = $this->db->connect();    
        $result = mysqli_query($connection, "SELECT * FROM attendance_pw");
        return $result;
    }
	
	 public function addofficer($fname, $position) {
        $connection = $this->db->connect();
        $result = mysqli_query($connection, "INSERT INTO attendance_pw(name, position) values('$fname', '$position')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	
	//catagorize approved materail in to different purchasing methods
	public function assign_direct_biding($id, $purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO bidding_request(id, purchasor_name, type, standard, amount, remarks) values('$id', '$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	public function assign_limited_pro($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO bidding_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	public function assign_open_pro($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO bidding_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	public function assign_proforma($purchasorName, $type, $standard, $amount, $remarks) {
			$connection = $this->db->connect();
			$result = mysqli_query($connection, "INSERT INTO bidding_request(purchasor_name, type, standard, amount, remarks) values('$purchasorName', '$type', '$standard', '$amount','$remarks')");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
	

  } ?>
