<?php
if(isset($_POST['name'])){  // submit merchant profile details
   $post = filter_var_array($_POST,FILTER_SANITIZE_STRING); 
   $name = $post['name'];
   $phone = $post['phone'];
   $address = $post['address'];
   $state = $post['state'];
   $type =  $post['type'];
   $reg = $post['reg'] ? $post['reg'] : 'nill';
   $website = $post['web'] ? $post['web'] : "nill";

    $logo = $_FILES['logo']['name'];
    $temp          = $_FILES['logo']['tmp_name'];
    $img_size      = $_FILES['logo']['size'];
    
    $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

    $ext = strtolower(pathinfo($logo, PATHINFO_EXTENSION));

    if(!empty($logo)){
        $img = getimagesize($temp);
        $width   = $img[0];
        $height  = $img[1];
        if(!file_exists($temp)){
            $error ="<p class='text-danger'>Logo image not selected</p>";

        }elseif(!in_array($ext,$valid_extensions)){
                $error ="<p class='text-danger'>Invalid image format Only jpeg, jpg, png, are allowed </p>";
        }else if(!file_exists($temp)){
            $error ="<p class='text-danger'>Logo image not selected</p>";
        }else if($img_size > 2000000){
                $error ="<p class='text-danger'>image size should not be more than 2mb</p>";
                
        }else if($width > '500' || $height > '400'){
                $error ="<p class='text-danger'>Image dimension should be within 500X300</p>";
        }else{
            
            $final_image = time().'.'.$ext;

            $path = '../images/'.$final_image; // upload directory
    
            move_uploaded_file($temp,$path);
            if($data->updateMerchant($name,$type,$final_image,$phone,$address,$reg,$website,$state)){
                $error = "<p class='text-success'>Business infomation updated</p>";
            }else{
                $error ="<p class='text-danger'>You can not edit Business Information at this moment</p>";
            }
        }
    }else{
        if($data->updateMerchant($name,$type,$final_image=null,$phone,$address,$reg,$website,$state)){
            $error = "<p class='text-success'>Business infomation updated</p>";
        }else{
            $error ="<p class='text-danger'>You can not edit Business Information at this moment</p>";
        }
    }
}




?>