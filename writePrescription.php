<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $presObj=json_decode(file_get_contents("php://input"));

    if (count($patientObj)>0){

        $description=mysqli_real_escape_string($connect, $presObj->$description);
        $errors = array();

        //inserting
        $sql= "INSERT INTO prescription(presCode,description)
        VALUES($presCode,$description)";  
    }

    print  json_encode($data);

?>    