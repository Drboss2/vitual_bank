<?php
require '../config/db.php';
require  'script.php';

$database = new Database;

$db = $database->connect();

$date = new DateTime();

$user = new User($db);


if(isset($_POST['get'])){ // get wallet balance
     echo $user->getWalletBalance('wallet');
}


if(isset($_POST['manageRecode'])){  // getrecode with pagination
    $result = $user->manageRecordsWitnPagination('history',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row->data?></td>
                    <td><?php echo $row->status?></td>
                    <td><?php echo $row->date?></td>
                </tr>
            <?php
            }
        }   
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}  


if(isset($_POST['searchClickDate'])){   /// get filter log on js click event
    $post = filter_var_array($_POST,FILTER_SANITIZE_STRING); 
    $from = $_POST['from'];
    $to = $_POST['to'];
    $result = $user->manageRecordeWithClickEvent($from,$to);
    
    if($result != 'no'){
        $rows = $result['rows'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['time']?></td>
                </tr>
            <?php
            }
        }
        ?>
      
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}

if(isset($_POST['manageUsrs'])){  // getrecode with pagination
    $result = $user->manageUsersWitnPagination('users',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row->user_id?></td>
                    <td><a href="dashboard?single=<?php echo $row->id?>"><?php echo $row->first_name?></a></td>
                    <td><?php echo $row->email?></td>
                    <td><?php echo $row->phone?></td>
                    <td><?php echo $row->address?></td>

                    <td><?php echo $row->status?></td>
                    <td><?php echo $row->acc_type?></td>

                    <td><?php echo $row->date?></td>
                    <td>
                       <a class="ban" ban="<?php echo $row->id?>" href="javscript:void(0)">ban</a>
                       <a class="unban" unban="<?php echo $row->id?>" href="javscript:void(0)">unban</a>
                    </td>
                    <td> <a class="delete" delete="<?php echo $row->id?>" href="javscript:void(0)">Delete</a></td>
                </tr>
            <?php
            }
        }   
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
} 

if(isset($_POST['banUser'])){// ban user
    echo $user->banUser('banned',$_POST['id']);
}
if(isset($_POST['UnbanUser'])){// ban user
    echo $user->banUser('active',$_POST['id']);
}
if(isset($_POST['deleteUser'])){// delete data
    echo $user->deleteTrans('users',$_POST['id']);
}
if(isset($_POST['topup'])){ // credit user balance with id
    echo $user->topUserId('balance',$_POST['id'],$_POST['amount']);
}
if(isset($_POST['editset'])){ // debit user balance with id
    echo $user->reUserId('balance',$_POST['id'],$_POST['amount']);
}

if(isset($_POST['invest'])){ // credit user balance with id
    echo $user->topUserId('investment_bal',$_POST['id'],$_POST['amount']);
}
if(isset($_POST['invest1'])){ // debit user balance with id
    echo $user->reUserId('investment_bal',$_POST['id'],$_POST['amount']);
}



if(isset($_POST['manageDepo'])){  // getrecode with pagination
    $result = $user->manageUsersWitnPagination('deposit',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row->user_id?></td>
                    <td><?php echo $row->name?></td>
                    <td><?php echo $row->email?></td>
                    <td>$<?php echo $row->amount?></td>
                    <td><?php echo $row->method?></td>
                    <td><?php echo $row->status?></td>
                    <td><?php echo $row->date?></td>
                    <td>
                       <a class="approve" approve="<?php echo $row->id?>" href="javscript:void(0)">approve</a>
                    </td>
                    <td> <a class="delete" delete="<?php echo $row->id?>" href="javscript:void(0)">Delete</a></td>
                </tr>
            <?php
            }
        }   
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}

if(isset($_POST['getapprove'])){
    echo $user->approveDepo($_POST['id']);
}

if(isset($_POST['delete'])){// delete data
    echo $user->deleteTrans('deposit',$_POST['id']);
}

if(isset($_POST['transfer'])){  // getrecode with pagination
    $result = $user->manageUsersWitnPagination('transfer_request',$_POST['pageno']);
    if($result !== 'no'){
        $rows = $result['rows'];
        $pagination = $result['pagination'];
        if(($rows) > 0){
            foreach($rows as $key=> $row){?>
                <tr>
                    <td><?php echo $row->user_id?></td>
                    <td><?php echo $row->name?></td>
                    <td><?php echo $row->email?></td>
                    <td>$<?php echo $row->amount?></td>
                    <td><?php echo $row->account_no?></td>
                    <td><?php echo $row->sort_code?></td>
                    <td><?php echo $row->bank_name?></td>
                    <td><?php echo $row->country?></td>
                    <td><?php echo $row->city?></td>
                    <td><?php echo $row->ref?></td>

                    <td><?php echo $row->date?></td>
                    <td>
                       <a class="btn btn-info btn-sm return" return="<?php echo $row->id?>" href="javscript:void(0)">Return</a>
                    </td>
                </tr>
            <?php
            }
        }   
        ?>
            <tr><td colspan="5"><?php echo $pagination?></td></tr>
        <?php

    }else{
        echo "<tr><td colspan='5'>no record found</td></tr>";
    }
}

if(isset($_POST['getreturn'])){
    echo $user->returnTransfer($_POST['id']);
}

if(isset($_POST['deletehs'])){// delete data
    echo $user->deleteTrans('history',$_POST['id']);
}
if(isset($_POST['addadmin'])){
    echo $user->addAdmin($_POST['admin']);
}

if(isset($_POST['removeadmin'])){
    echo $user->removeAdmin($_POST['a']);
}

?>