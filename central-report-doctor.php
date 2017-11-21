<?php

     require_once 'inc.php';
  
               $user_sel= "SELECT a.patientID,a.FirstName as Pname, a.Surname as Sname,c.presCode, DATE_FORMAT(b.treatmentDate,  '%d-%M-%Y' ) as treatmentDate, b.hospital, b.description as treatDescrition,c.description as presDescrition, d.Firstname, d.Surname
                            FROM `patient` a , `patienttreatment` b , `prescription` c , `staffmember` d
                            WHERE a.patientID = b.patientID
                            and b.patientID = c.patientID
                            and b.doctorID = d.staffID
                            and d.role <> 'Pharmacist' 
                            and d.role <> 'Admin'";
                             
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
                              
      
      print  json_encode($d);           
             
                 
?>