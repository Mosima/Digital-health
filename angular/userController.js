
app.controller("userController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
     "use strict"
  //here logging in assigning object with the information from DB
       $scope.sharedData = sharedService.getData();
        $scope.details=$scope.sharedData[0];
         if( $scope.details==undefined){
           window.location.href='index.php'; 
          }
        $scope.username=$scope.sharedData[0].username ;
        $scope.password = $scope.sharedData[0].password;
       var userData= $scope.sharedData[0].idNumber;

      //get patient information
        $http.post(
                    "patient.php", {
                                'idNumber': userData
                            }
                  ).then(function (response) {
                           $scope.patientInfo= response.data;            
                     });
            
          //log out
          $scope.logout=function(){               
               $window.sessionStorage.clear();
              window.location.href='index.php';  
          }

});
