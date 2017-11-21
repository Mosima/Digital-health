<?php

     require_once 'inc.php';
  
               $user_sel= "SELECT a.FirstName,a.Surname,a.HomeAddress,a.Gender,a.idNumber,a.kinName,a.kinCell,a.hospital,a.createDate,COUNT(b.patientID) as prescription
                            From patient a,prescription b
                            where a.patientID=b.patientID
                            Group by  a.FirstName,a.Surname,a.HomeAddress,a.Gender,a.idNumber,a.kinName,a.kinCell,a.hospital,a.createDate";
                             
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