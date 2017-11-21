<?php

     require_once 'inc.php';
    
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));

     if (count($data)>0){
    
               
               $user_sel= "SELECT a.FirstName,a.Surname,a.Gender,a.idNumber,a.hospital,a.createDate,COUNT(b.patientID) as prescription
                                      From patient a,prescription b
                                      where a.patientID=b.patientID";
                             
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