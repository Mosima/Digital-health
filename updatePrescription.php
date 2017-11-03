<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $presObj=json_decode(file_get_contents("php://input"));

    if (count($presObj)>0){

        $presCode=mysqli_real_escape_string($connect, $presObj->presCode);
        $patientID=mysqli_real_escape_string($connect, $presObj->patientID);
        $errors = array();
        //inserting
        $sql= "UPDATE prescription Set active = 0  Where presCode='$presCode' And patientID='$patientID' ";          
            if (mysqli_query($connect,$sql)) {
                     $data= 1;
                } else {
                  $data= 2;
                }

                print  json_encode($data);
    } 

   

?>    