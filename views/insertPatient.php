<?Php  
     //opening connection
    $connect= mysqli_connect('localhost','root','root','digital_health');
      //decode json object         
    $patientObj=json_decode(file_get_contents("php://input"));

    if (count($patientObj)>0){
             //assign Variables with json information
              $patientID=mysqli_real_escape_string($connect, $patientObj->idNo);
              $FirstName=mysqli_real_escape_string($connect, $patientObj->name);
              $Surname=mysqli_real_escape_string($connect, $patientObj->surname);
              $CellNumber=mysqli_real_escape_string($connect, $patientObj->cellNo);
              $Email=mysqli_real_escape_string($connect, $patientObj->email);
              $Gender=mysqli_real_escape_string($connect, $patientObj->gender);
              $HomeAddress=mysqli_real_escape_string($connect, $patientObj->address);          
              $createDate=mysqli_real_escape_string($connect, $patientObj->createDate); 
              $userState=mysqli_real_escape_string($connect, $patientObj->state);  
              $kinName=mysqli_real_escape_string($connect, $patientObj->kinName); 
              $kinCell=mysqli_real_escape_string($connect, $patientObj->kinCellNo); 
              $errors = array();

              if($userState=='Create'){
                        //checking if the patient already exist
                        $user_sel= "SELECT * FROM `patient` where patientID ='$patientID'";
                        $run_query = mysqli_query($connect,$user_sel);
                        //ccheck/counting number of rows for the same use if the exist from database
                        $check_user = mysqli_num_rows($run_query);
                        if($check_user>0)
                          { 
                              //use for error msg on controlller
                              $data= 0;
                          }else{
                            //insert to DB
                                  $sql= "INSERT INTO patient(patientID,FirstName,Surname,CellNumber, Email,Gender,HomeAddress,createDate,kinName,kinCell)
                                  VALUES($patientID,'$FirstName','$Surname',$CellNumber,'$Email','$Gender','$HomeAddress','$createDate','$kinName','$kinCell')";             
                                $data= 1;
                          }
                    
                        if (mysqli_query($connect, $sql)) {

                              $to = $Email;
                              $subject = "Registration Confirmation";
                              $message = "You have Been registered To Our Digital App" ;
                              $headers = "From: Sosha Hospital"; 
                            mail($to,$subject,$message,$headers);
                            
                          } else {
                            
                          }
                   }else{
                       $update= "UPDATE `patient` 
                                SET `FirstName` = '$FirstName',
                                     `Surname` = '$Surname',
                                     `CellNumber`='$CellNumber',
                                     `Email` = '$Email',
                                      `HomeAddress`='$HomeAddress'
                                      'kinCell'='$kinCell'
                                WHERE `patientID` = '$patientID'";
                       $run_query =  mysqli_query($connect,$update);
                        $data= 3;
                   }

                  print  json_encode($data);
    } 
mysqli_close($connect)
    
?>