<?php
   //opening connection
     require_once 'inc.php';
       //decode json object         
             $staffObj=json_decode(file_get_contents("php://input"));

              $staff=mysqli_real_escape_string($connect, $staffObj->currentId);
               $errors = array();
          //using view from db
              $user_sel= " SELECT *
                           FROM staffmember
                           WHERE role <> 'Admin'
                            And hospital_Id = '$staff' ";
              
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);

              if($check_user>0)
                {                                
                     header('Content-type: application/json');
                      while(  $row=$run_query->fetch_assoc())
                     {
                       //add to array  
                          $d [] =$row;
                     }

                }else{

                   $d=0;
                }
           
   print  json_encode($d); 
?>