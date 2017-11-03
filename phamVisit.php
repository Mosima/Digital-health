<?php
    //opening connection
    require_once 'inc.php';
    
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));

     if (count($data)>0){
    
               $staffID = mysqli_real_escape_string($connect, $data->pIdNo);
               $errors = array();
            
              $user_sel= " SELECT DATE_FORMAT(b.presDate,  '%d-%M-%Y' ) AS presDate,a.Firstname,a.Surname,c.Description
                            FROM patient a,patientmedicine b,prescription c
                            Where a.patientID=b.patientID
                             AND b.presCode=c.presCode
                             AND b.phamId='$staffID'";
              
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);

              if($check_user>0)
                {                                
                     header('Content-type: application/json');
                      while(  $row=$run_query->fetch_assoc())
                     {
                          $d [] =$row;
                     }

                }else{

                  $d=0;
                }
           
           }

   print  json_encode($d);
  
?>