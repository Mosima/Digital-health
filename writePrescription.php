<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $presObj=json_decode(file_get_contents("php://input"));

    if (count($presObj)>0){

        $description=mysqli_real_escape_string($connect, $presObj->description);
        $patientID=mysqli_real_escape_string($connect, $presObj->patientID);
        $errors = array();

        //inserting
        $sql= "INSERT INTO prescription(patientID,description)
                VALUES('$patientID','$description')";  
                 
            if (mysqli_query($connect,$sql)) {
                     $data= 1;
                } else {
                  $data= 2;
                }
    }

   

?>    