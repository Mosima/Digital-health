<?php

  
   //opening connection
    $connect= mysqli_connect('localhost','root','root','digital_health');

               $errors = array();
          //using view from db
              $user_sel= " SELECT *
                           from allpatient_view";
              
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);

              if($check_user>0)
                {                                
                     header('Content-type: application/json');
                      while(  $row=$run_query->fetch_assoc())
                     {
                       //add to array
                          $d [] =$row;
                     }

                }else{

                   $d=0;
                }
           
        

   print  json_encode($d);
  
?>