<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $presObj=json_decode(file_get_contents("php://input"));

    if (count($presObj)>0){

        $Description=mysqli_real_escape_string($connect, $presObj->description);
        $patientID=mysqli_real_escape_string($connect, $presObj->patientID);
        $hospital=mysqli_real_escape_string($connect, $presObj->hospital);
        $doctorID=mysqli_real_escape_string($connect, $presObj->doctorID);
        $errors = array();

        //inserting
        $sql= "INSERT INTO patienttreatment(patientID,doctorID,hospital,Description)
                VALUES('$patientID','$doctorID','$hospital','$Description')";  
                 
                 if (mysqli_query($connect,$sql)) {
                  $data= 1;
                  } else {
                    $data= 2;
                  }
    }

   

?>    