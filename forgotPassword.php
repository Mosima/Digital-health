<?php

     require_once 'inc.php'; 
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));
     
     if (count($data)>0){

            $username = mysqli_real_escape_string($connect, $data->username); 
            $userValue= mysqli_real_escape_string($connect, $data->logValue);     
            $errors = array();
            if($userValue=="Patient"){
                  $user_sel= "select password,Email from Patient where username='$username'"; 
            }else{
                   $user_sel= "select password,email from staffmember where username='$username' and role='$userValue'";
            }            
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);

              if($check_user>0)
                {    
                     $row=$run_query->fetch_assoc();
                      $datas=$row;
                          
                      print  json_encode($datas);
                      $to = $datas->$email;
                      $subject = "Forgot Password";
                      $message = "Your password is "." ".$datas->$password;
                      $headers = "From: Sosha Hospital"; 
                      mail($to,$subject,$message,$headers);

                   $data=1;
                }else{
                  $data=2;
                    
                }    
            } 
            
            print  json_encode($data);
    
?>