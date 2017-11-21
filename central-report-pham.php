<?php

     require_once 'inc.php';
  
               $user_sel= "SELECT DATE_FORMAT(b.presDate,  '%d-%M-%Y' ) AS presDate,a.Firstname as patientname,a.Surname as patientSurnam,c.Description,b.placeIssued,st.Firstname as Pname,st.Surname as Psmae
                            FROM patient a,patientmedicine b,prescription c,staffmember st
                            Where a.patientID=b.patientID
                              AND b.patientID=c.patientID
                              AND b.presCode=c.presCode
                              AND b.phamId=st.staffID";
                             
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