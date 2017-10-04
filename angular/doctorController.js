app.controller("doctorController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
    "use strict"

        //here logging in assigning object with the information from DB
        $scope.sharedData = sharedService.getData();
        $scope.details=$scope.sharedData[0];
        $scope.username=$scope.sharedData[0].username ;
        $scope.password = $scope.sharedData[0].password;

         //opening sign in modal
        $scope.openSignModal = function (patients) {
        var modalInstance = $modal.open({
            backdrop: 'static',
            animation: true,
            templateUrl: 'doctorSignModalContent.html',
            controller: 'doctorRegController',
            size: 'lg',
             resolve: {
                     doctor: function () {
                         return doctor;
                     }
                  }
        });
         modalInstance.result.then(function (selectedItem) {
                        $scope.selected = selectedItem;
                        $scope.prescription();             
                    }, function () {
            });
        };

        //get patients list
         $scope.prescription=function(){
                    $http({
                        url: "writePrescription.php",
                        method: "POST"
                        }).then(function (results) {
                        $scope.patients= results.data;                
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
