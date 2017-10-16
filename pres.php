<?php

     require_once 'inc.php';
    
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));

     if (count($data)>0){
    
               $search = @mysqli_real_escape_string($connect, $data->idNumber);  
               $errors = array();
               
               $user_sel= "SELECT a.FirstName, a.Surname , b.treatmentDate, b.hospital, c.description, d.Firstname, d.Surname
               FROM `patient` a, `patienttreatment` b, `prescription` c, `staffmember` d
               WHERE a.patientID = b.patientID
               and b.patientID = c.patientID
               and b.doctorID = d.staffID
               and c.presCode = $search or c.patientID=$search"; 

               $run_query = @mysqli_query($connect,$user_sel);
               $check_user = @mysqli_num_rows($run_query);

              if($check_user>0)
                {                                
                     header('Content-type: application/json');
                      $row=$run_query->fetch_assoc();
                      $data=$row;

                }else{

                  $data=0;
                }
           
           }
   print  json_encode($data);
?>