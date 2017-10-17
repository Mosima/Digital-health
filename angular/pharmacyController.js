
app.controller("pharmacyController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
    "use strict"
 //here logging in assigning object with the information from DB

     /*get single patient information
             $http.post(
                         "patientUser.php", {
                                     'idNumber': userData
                                 }
                       ).then(function (response) {
                               $scope.details= response.data;            
                  });*/

//get pham search
             $scope.searchPrescription=function(preData){
                 $http.post(
                    "pres.php", {
                                'idNumber': preData
                            }
                  ).then(function (response) {
                          $scope.presDetails= response.data;            
             });   
            }   
                         
       
        
                 
         //log out and update logged on as xero
     $scope.logout=function(){               
       $http.post(
           "updateLoggedIn.php", {               
               'logged':"0",'idNumber':$scope.details.idNumber,'currentUser': $scope.details.role 
       }).then(function (response) {
                   $window.sessionStorage.clear();
                   window.location.href='index.php';
        });              
   }

});
