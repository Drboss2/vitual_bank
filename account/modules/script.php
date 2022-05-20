 <?php
   class User{
      private $con;
      public $email;

      public $password;
      public $first_name;
      public $sex;

      public $dob;
      public $image;
      public $country;
      public $acc_type;
      public $acc_mode;

      public $phone;
      public $address;


    
    public function __construct($db){
        $this->con = $db;
    }

    public function CreateAccount(){
        $user_id = random_int(000000,999999);
        $status = 'active';
        $acc =  random_int(1111111111,9999999999);
        $code =  random_int(11111,99999);
        try{
            $stmt = $this->con->prepare('insert into users(user_id,email,account_no,sort_code,password,first_name,acc_type,sex,country,acc_mode,phone,address,status)values(:user_id,:email,:account_no,:sort_code,:password,:first_name,:acc_type,:sex,:country,:acc_mode,:phone,:address,:status)');
            $stmt->bindParam(':user_id',$user_id);
            $stmt->bindParam('email',$this->email);
            $stmt->bindParam(':account_no',$acc);
            $stmt->bindParam(':sort_code',$code);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':first_name',$this->first_name);
            $stmt->bindParam(':acc_type',$this->acc_type);
            $stmt->bindParam(':sex',$this->sex);
            $stmt->bindParam(':country',$this->country);
            $stmt->bindParam(':acc_mode',$this->acc_mode);
            $stmt->bindParam(':phone',$this->phone);

            $stmt->bindParam(':address',$this->address);

            $stmt->bindParam(':status',$status);

            $stmt->execute();

            $id = $this->con->lastinsertId();
        //    print_r($this->getUseId($id));

            $this->sendRegEmail($this->email,$this->password, $id);

            $this->balance('investment_bal',$id);
            $this->balance('balance',$id);

            return true;

        }catch(PDOException $e){
            echo "error1 ". $e->getMessage();
        }
    }

      // check whether email exist
    public function emailExist($email){
        try{
        $stmt = $this->con->prepare("select email from users where email =:email");
        $stmt->bindParam(":email",$email);
        $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo 'error has occured '. $e->getMessage();
        }
    }

    public function getUseId($id){ // get userid from db
        try{
        $stmt = $this->con->prepare("select user_id from users where id =:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->user_id;
        
        }catch(PD0Execption $e){
            echo 'error '. $e->getMessage();
        }
    }

    public function sendRegEmail($email,$password,$id){
        $subject = "Registration Successful";
        $htmlContent = "
        <html> 
            <head> 
                <title>Quick link</title> 
            </head> 
            <body>
             <p> Welcome to  Affinity Bank</p>


                <p>Our online banking service allows you to access your account history and transactions from anywhere. This is the quickest way to see whether a transaction has cleared your account. It also enables you to find out about any unauthorized transactions more quickly, so you can dispute them right away.</p>

                <p>With Affinity Bank you can quickly transfer money between accounts when you do it online. It's more convenient than going to a bank in person or using an automated phone service, which requires you to provide information when prompted. </p>

                <p>Our services are highly secured, we use encryption devices to ensure that all client information is protected and there is no security breach. This ultimately provides you security from online frauds and account hacking.</p>

                <h3> Below are your login credentials</h3>
                <p>User ID: ".$this->getUseId($id)."</p>

                <p>Login PIN:$password  </p>
                
                
                <p> Affinity Bank Bank</p>
               <p>E-mail: support@AffinityBank.com</p>
               </p>Toll Free: ±1-888-8111-770</p>
                </p>Website: https://affinityotb.com/</p>
            </body> 
        </html>";
        
        // $headers  = "MIME-Version: 1.0" . "\r\n";
         
        $headers = "Content-type: text/html";
        
        // // More headers
        // $headers .= "From: SFCInvestmentBankTeam . <contact@affinityotb.com>" . "\r\n";

        mail($email,$subject,$htmlContent,$headers);
    }
    public function getByEmail($email){
        try{
          $stmt = $this->con->prepare("select * from users where email = '$email'");
          $stmt->execute();
          if($stmt->rowCount() > 0){
               $r  = $stmt->fetch(PDO::FETCH_OBJ);
               return $r;
          }
        }catch(PDOException $e){
             echo 'error '. $e->getMessage();
        }
    }
    public function sendRegForgot($email){
        $subject = "Forgot Password/Login ID";
        $htmlContent = "
        <html> 
            <head> 
                <title>Quick link</title> 
            </head> 
            <body> 
                <p> Below are your login credentials .</p>
                <p><strong>Your User ID is </strong>" .$this->getByEmail($email)->user_id."<br>
                 <strong>Your Login Password is </strong> " .$this->getByEmail($email)->password.  "  
                </p>  

                <p>Happy Banking</p>
                <p>The  Affinity Bank</p>
            </body> 
        </html>";

        $headers = "Content-type: text/html" ."\r\n";
        
        // More headers
          $headers .= "From: AffinityOTBank . <service@affinityotb.com>" . "\r\n";
          
        mail($email,$subject,$htmlContent,$headers);

    }

    public function sendOTP($email){ // send otp
      
        $subject = "OTP Required";
        $htmlContent = "
        <html> 
            <head> 
                <title>Quick link</title> 
            </head> 
            <body> 
                <p>Enter the code to authorize your transfer.</p>
                <p>".$this->setOtp()."</p>
                <p>Happy Banking</p>
                <p>The Affinity Bank Team</p>
            </body> 
        </html>";
        
            $headers = "Content-type: text/html" ."\r\n";
        
        // More headers
          $headers .= "From: AffinityOTBank . <service@affinityotb.com>" . "\r\n";
        
    

        mail($email,$subject,$htmlContent,$headers);
    }

    // login script
     public function login($id){
        try{
            $stmt = $this->con->prepare("select * from users where user_id=:user_id");
            $stmt->bindParam(":user_id",$id);
            $stmt->execute();

            if($stmt->rowCount() < 1){ 
                return "not";
                
            }else{
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                if($this->password == $row->password){ 

                    if($row->isadmin == '1' ||  $row->isadmin == '2'){

                        $_SESSION['fname']     = $row->first_name;

                        $_SESSION['user_id']   = $row->user_id;
                        $_SESSION['id']        = $row->id;

                        $_SESSION['email']      = $row->email;
                        $_SESSION['country']    = $row->country;
                        $_SESSION['phone']      = $row->phone;
                        $_SESSION['img']        = $row->image;
                        $_SESSION['account']    = $row->account_no;
                        $_SESSION['sort']       = $row->sort_code;
                        $_SESSION['admin']     =  $row->isadmin;

                        return 'admin';
                    }else{
                        $_SESSION['fname']     = $row->first_name;

                        $_SESSION['user_id']   = $row->user_id;
                        $_SESSION['id']        = $row->id;

                        $_SESSION['email']      = $row->email;
                        $_SESSION['country']    = $row->country;
                        $_SESSION['phone']      = $row->phone;
                        $_SESSION['img']        = $row->image;
                        $_SESSION['account']    = $row->account_no;
                        $_SESSION['sort']       = $row->sort_code;



                        return 'user';
                    }
                }else{
                    return false;
                }
            }
        }catch(PDOException $e){
            echo 'login error '. $e->getMessage();
        }
    }
    public function balance($table,$id){// create balance
        $balance = 0;
        try{
            $stmt = $this->con->prepare("insert into $table(user_id,balance)values(:user_id,:balance)");
            $stmt->bindParam(':user_id',$id);
            $stmt->bindParam(':balance',$balance);
            $stmt->execute();

        }catch(PDOException $e){
            echo "error1 ". $e->getMessage();
        }
    }

    public function getBalance($table,$id){ // get account balance
         try{
            $stmt = $this->con->prepare("select balance from $table where user_id =$id");
            $stmt->execute();
            $data  = $stmt->fetch(PDO::FETCH_OBJ);

            return $data->balance;

        }catch(PDOException $e){
            echo "error balance ". $e->getMessage();
        }
    }

  public function fundTransfer($amount){ // transfer balance
        $id = $_SESSION['id'];
         try{
            $stmt = $this->con->prepare("update balance set balance = (balance - $amount) where user_id =:user_id");
            $stmt->bindParam(':user_id',$id);
            $stmt->execute();

            return true;

        }catch(PDOException $e){
            echo "error balance ". $e->getMessage();
        }
    }
    public function CreateTransfer($name,$sort,$account,$amount,$bank,$country,$city,$ref,$date){ // create transfer recodes
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        try{
            $stmt = $this->con->prepare('insert into transfer_request(user_id,name,email,sort_code,account_no,amount,bank_name,country,city,ref,date)values(:user_id,:name,:email,:sort_code,:account_no,:amount,:bank_name,:country,:city,:ref,:date)');
            $stmt->bindParam(':user_id',$id);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':email',$email);

            $stmt->bindParam('sort_code',$sort);
            $stmt->bindParam(':account_no',$account);
            $stmt->bindParam(':amount',$amount);
            $stmt->bindParam(':bank_name',$bank);
            $stmt->bindParam(':country',$country);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':ref',$ref);
            $stmt->bindParam(':date',$date);

            $stmt->execute();

            $this->activities('Your transaction has been successfully processed. Thank you for banking with us. Note, all transactions are subject to Affinity Overseas Trust Bank confirmation and fraud proof verification.','Success',$id);

            return true;

            // $id = $this->con->lastinsertId();

            return true;
        }catch(PDOException $e){
            echo "error1 ". $e->getMessage();
        }
    }
    public function activities($data,$status,$id){
        $date = date('y-m-d:h:i:s');
        try{
            $stmt = $this->con->prepare('insert into history(user_id,data,status,date)values(:user_id,:data,:status,:date)');
            $stmt->bindParam(':user_id',$id);
            $stmt->bindParam(':data',$data);
            $stmt->bindParam(':status',$status);
            $stmt->bindParam(':date',$date);

            $stmt->execute();

            return true;
        }catch(PDOException $e){
            echo "error 2 ". $e->getMessage();
        }
    }

    public function setOtp(){ // set otp
        $otp = random_int(00000,99999);

        $_SESSION['otp'] = $otp;

        return $otp;
    }

    public function deposit($amount,$method){
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $name = $_SESSION['fname'];

        $status = "Pending";
        $date =  new DateTime;
        $time = $date->format("Y:m:d:H:m:s A");  // current time
    
        $stmt = $this->con->prepare("insert into deposit(user_id,amount,method,email,name,status,date)values(:user_id,:amount,:method,:email,:name,:status,:date)");
        $stmt->bindParam(':user_id',$id);
        $stmt->bindParam(':amount',$amount);
        $stmt->bindParam(':method',$method);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':name',$name);

        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':date',$time);

        $stmt->execute();

        $this->activities('Made a Deposit of $' .$amount." Through " .$method,$status,$id) ;// account history

        return true;     
    }


     public function manageRecordsWitnPagination($table,$page_no){ // records with pagination
        $a =  $this->pagination($table,$page_no,10);
        $id = $_SESSION['id'];

        $stmt = $this->con->prepare("select * from  ".$table." where user_id = $id order by 1 desc " .$a['limit']);
        $stmt->execute();

        $row = array();

        if($stmt->rowCount() > 0){
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
               
            return['rows'=>$rows,'pagination'=>$a['pagination']];
        }else{
            return 'no';
        }
    }
    
     public function manageUsersWitnPagination($table,$page_no){ // records with pagination
        $a =  $this->pagination($table,$page_no,10);
        $id = $_SESSION['id'];

        $stmt = $this->con->prepare("select * from  ".$table." order by 1 desc " .$a['limit']);
        $stmt->execute();

        $row = array();

        if($stmt->rowCount() > 0){
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
               
            return['rows'=>$rows,'pagination'=>$a['pagination']];
        }else{
            return 'no';
        }
    }
     function pagination($table,$page_no,$nun_per_page){
        $stmt = $this->con->prepare("select * from " . $table);
        $stmt->execute();
        $rows = $stmt->rowCount();

        $last = ceil($rows/$nun_per_page);

        $pagination = "<ul class='pagination'>";
         if($last != 1){
             if($page_no > 1){
                 $prev = $page_no -1 ;
                 $pagination .="<li class='page-item'><a class='page-link' n='".$prev."' href='#'>Previous</a></li>";
             }
         }
         if($page_no < 1){
                $pagination .= "<li class='page-item'><a href='#'>$page_no Of  $last pages </a></li>";
         }else{
             $next  = $page_no + 1;
           //  $last = $last -1;
             $pagination .="<li class='page-item'><a class='page-link' n='".$next."' href='#'>Next</a></li>";
             $pagination .= "<li class='page-item'><a href='#'>$page_no Of $last pages </a></li>";
         }
             
         $pagination .= '</ul>';

        
        $limit = "LIMIT ".($page_no - 1) * $nun_per_page.",".$nun_per_page;
        return ['pagination'=>$pagination,'limit'=>$limit];
    }

    public function changepassword($pass){ // change password
        $id = $_SESSION['id'];
         try{
            $stmt = $this->con->prepare("update users set password = $pass where id =:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            return true;

        }catch(PDOException $e){
            echo "error updating password ". $e->getMessage();
        }
    }
    
    /// admin starting//////
    
     public function countAdmin(){ // count admin users
         try{
            $stmt = $this->con->prepare("select * from users where isadmin = 1");
            $stmt->execute();
            $data  = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $data;

        }catch(PDOException $e){
            echo "error admin count ". $e->getMessage();
        }
    }
     public function getAdmin(){ // get admin users
         try{
            $stmt = $this->con->prepare("select * from users where isadmin = 1");
            $stmt->execute();
            $data  = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $data;

        }catch(PDOException $e){
            echo "error admin count ". $e->getMessage();
        }
    }
    public function addAdmin($email){ // get admin users
         try{
            $stmt = $this->con->prepare("update users set isadmin ='1' where email ='$email'");
            $stmt->execute();
            return 'added';

        }catch(PDOException $e){
            echo "error admin count ". $e->getMessage();
        }
    }
    public function removeAdmin($id){ // get admin users
         try{
            $stmt = $this->con->prepare("update users set isadmin ='0' where id ='$id'");
            $stmt->execute();
            return 'remove';
        }catch(PDOException $e){
            echo "error admin count ". $e->getMessage();
        }
    }
    public function getAllUsers(){ // all users
         try{
            $stmt = $this->con->prepare('select * from users order by 1 desc limit 10');
            $stmt->execute();
            $data  = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $data;

        }catch(PDOException $e){
            echo "error balance ". $e->getMessage();
        }
    }

    // ban user
    public function banUser($status,$id){
        $stmt = $this->con->prepare("update users set status='$status' where id =$id");
        $stmt->execute();
    }
     public function unbanUser($status,$id){
        $stmt = $this->con->prepare("update users set status='$status' where id =$id");
        $stmt->execute();
    }
    public function deleteTrans($table,$id){ // delete data
        $stmt = $this->con->prepare("delete from $table where id =$id");
        $stmt->execute();
    }
    
    public function getUserNameById($id){ // for admin username by id
        $stmt = $this->con->prepare("select first_name from users where id =$id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        return $row->first_name;
    }
    public function depoRequest($id,$table){ // for admin username by id
        $stmt = $this->con->prepare("select count(*) as total from $table where user_id = $id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        return $row->total;
    }
     public function topUserId($table,$id,$amount){ // top user with id
        $stmt = $this->con->prepare("update $table set balance = (balance + $amount) where user_id = $id");
        $stmt->execute();
        
        $stmt1 = $this->con->prepare("select balance from  $table where user_id = $id");
        $stmt1->execute();
        $row = $stmt1->fetch(PDO::FETCH_OBJ);

        $this->activities("Your Account $table has been credited with $$amount","Success",$id);


        return $row->balance;
    }
     public function reUserId($table,$id,$amount){ // top user with id
        $stmt = $this->con->prepare("update $table set balance = (balance - $amount) where user_id = $id");
        $stmt->execute();
        
        $stmt1 = $this->con->prepare("select balance from  $table where user_id =$id");
        $stmt1->execute();
        $row = $stmt1->fetch(PDO::FETCH_OBJ);

        $this->activities("Your Account $table has been debited with $$amount","Success",$id);


        return $row->balance;
    }
    public function approveDepo($id){ // activate email after clicking on mail
        $status = 'success';
        $stmt = $this->con->prepare("update deposit set status = '$status' where id=$id");

        $stmt->execute();

        $stmt1 = $this->con->prepare("select user_id, amount from deposit where id =$id");
        $stmt1->execute();
        $row = $stmt1->fetch(PDO::FETCH_OBJ);

        $user_id = $row->user_id;
        $amount = $row->amount;

        $stmt = $this->con->prepare("update balance set balance = (balance + $amount) where user_id = $user_id");
        $stmt->execute();

        $this->activities('Your Deposit of $' .$amount.' has been approved','Success',$user_id);
    }

    public function returnTransfer($id){ // return transfer from transfer request
        $stmt1 = $this->con->prepare("select user_id, amount from transfer_request where id =$id");
        $stmt1->execute();
        $row = $stmt1->fetch(PDO::FETCH_OBJ);

        $user_id = $row->user_id;
        $amount = $row->amount;

        $stmt = $this->con->prepare("update balance set balance = (balance + $amount) where user_id = $user_id");
        $stmt->execute();

        $stmt = $this->con->prepare("delete from transfer_request where id = $id");
        $stmt->execute();

        $this->activities('Your Transfer of $' .$amount.' was return because of none compliance with government regulations on international transfer','Success',$user_id);
    }

    public function UserTransferActivities($id){ // return transfer from transfer request
        $stmt1 = $this->con->prepare("select * from history where user_id =$id order by 1 desc limit 20");
        $stmt1->execute();
        $row = $stmt1->fetchAll(PDO::FETCH_OBJ);

        return $row;
    }

    public function getAll($table){
        $stmt1 = $this->con->prepare("select * from $table");
        $stmt1->execute();
        $row = $stmt1->fetchAll(PDO::FETCH_OBJ);

        return $row;
    }


    public function __destruct(){
        $this->con = null;
    }


}



?>