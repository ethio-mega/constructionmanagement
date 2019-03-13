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
    
     /*
        select list of materials which is not approved
       
      */   
      public function requiredMaterial(){
          $connection = $this->db->connect();
          $result = mysqli_query($connection,"SELECT * from purchase_requests");
          return $result;
      }

     public function acceptRequest($material_desc,$quantity,$name,$unit,$unit_price,$total_price,$remark,$sub_date){

        $dt = new DateTime();
        $dt = $dt->format('Y-m-d');

         $connection = $this->db->connect(); 
         mysqli_query($connection,"INSERT into approved_pr values('','$material_desc','$quantity','$dt','$sub_date','$name','$unit','$unit_price','$total_price','$remark')");
         mysqli_query($connection,"DELETE FROM purchase_requests WHERE material_description = '$material_desc'"); 

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
         $result = mysqli_query($connection,"DELETE FROM purchase_requests Where type = '$type'");
        }  

     public function store(){
         $connection = $this->db->connect();
         $result = mysqli_query($connection,"SELECT * FROM store");
         return $result;
     } 
     
     //draw inventory
     public function drawInventory($type,$standard,$currentAmount){
        $connection = $this->db->connect();
        mysqli_query($connection,"UPDATE purchase_requests SET amount = $currentAmount WHERE type = '$type' ");    
      
      }

     //to notify inventory manager
     public function numInventory(){
        $connection = $this->db->connect();
        $result = mysqli_query($connection,"SELECT * from purchase_requests WHERE acceptance_status = 0");
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

  }  


?>
