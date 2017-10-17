<?php
    //opening connection
    require_once 'inc.php';
    
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));

     if (count($data)>0){
    
               $staffID = mysqli_real_escape_string($connect, $data->pIdNo);
               $errors = array();
            
              $user_sel= " SELECT a.patientID,a.treatmentDate,a.hospital,b.Firstname,b.Surname, hos.Hospital_Name
                            FROM `patienttreatment` a,`staffmember` b,`hospital` hos
                            Where a.doctorId=b.staffID
                              and b.hospital_Id=hos.Id
                             And a.patientID=$staffID";
              
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