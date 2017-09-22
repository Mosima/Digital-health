<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $patientObj=json_decode(file_get_contents("php://input"));

    if (count($patientObj)>0){
             //assign Variables with json information
              $staffID=mysqli_real_escape_string($connect, $patientObj->pId);
              $role =mysqli_real_escape_string($connect, $patientObj->role);
              $idNumber=mysqli_real_escape_string($connect, $patientObj->idNo);
              $FirstName=mysqli_real_escape_string($connect, $patientObj->name);
              $Surname=mysqli_real_escape_string($connect, $patientObj->surname);
              $Email=mysqli_real_escape_string($connect, $patientObj->email);
              $Gender=mysqli_real_escape_string($connect, $patientObj->gender);
              $userState=mysqli_real_escape_string($connect, $patientObj->state);  
              $username=substr($idNumber,3,6);
              $password=substr($idNumber,7,5); 
              $errors = array();

              if($userState=='Create'){
                        //checking if already exist
                        $user_sel= "SELECT * FROM `staffmember` where idNumber ='$idNumber'";
                        $run_query = mysqli_query($connect,$user_sel);
                        //ccheck/counting number of rows for the same use if the exist from database
                        $check_user = mysqli_num_rows($run_query);
                        if($check_user>0)
                          { 
                              //use for error msg on controlller
                              $data= 0;
                          }else{
                            //insert to DB
                            $sql= "INSERT INTO staffmember(staffID,idNumber,Firstname,Surname,Email,Gender,username,password,role)
                                    VALUES ('$staffID','$idNumber','$FirstName','$Surname','$Email','$Gender','$username','$password','$role')";          
                                $data= 1;
                          }
                    
                        if (mysqli_query($connect, $sql)) {
                              $to = $Email;
                              $subject = "Registration Confirmation";
                              $message = "Your Username is". " " . $username . " " ."Passwors is " . $password ;
                              $headers = "From:Sosha Hospital"; 
                              mail($to,$subject,$message,$headers);
                          
                            
                          } else {
                            
                          }
                   }else{
                       $update= "UPDATE `staffmember` 
                                 SET  `Email` = '$Email',
                                     'role'='$role'
                                WHERE `staffID` = '$staffID'";
                       $run_query =  mysqli_query($connect,$update);
                        $data= 3;
                   }

                  print  json_encode($data);
    } 
mysqli_close($connect)
    
?>