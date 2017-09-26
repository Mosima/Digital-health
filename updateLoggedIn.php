
<?Php      
   //opening connection
     require_once 'inc.php';
                   
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){

               $idNumber=mysqli_real_escape_string($connect, $data->idNumber);
               $logged=mysqli_real_escape_string($connect, $data->logged);
               $currentUser=mysqli_real_escape_string($connect, $data->currentUser);

                if($currentUser=="Patient"){
                    $user_sel= "UPDATE `patient` SET logged_On ='$logged' where idNumber ='$idNumber'";
                }else{
                   $user_sel= "UPDATE `staffmember` SET logged_On ='$logged' where idNumber ='$idNumber'";
                }
              
                $run_query = mysqli_query($connect,$user_sel); 
             }
          
mysqli_close($connect)
   
?>