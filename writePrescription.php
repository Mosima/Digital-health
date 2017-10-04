<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $patientObj=json_decode(file_get_contents("php://input"));

    if (count($patientObj)>0){

        $patientID=mysqli_real_escape_string($connect, $patientObj->pressCode);
        $Subject=mysqli_real_escape_string($connect, $patientObj->$subject);
        $Prescription=mysqli_real_escape_string($connect, $patientObj->prescription);
        $errors = array();

        //inserting
        $sql= "INSERT INTO prescription(presCode,prescription,subject)
        VALUES($presCode,'$Prescription','$Subject)";  
    }

    print  json_encode($data);

?>    