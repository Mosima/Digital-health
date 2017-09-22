app.controller("adminController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
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
            templateUrl: 'patientSignModalContent.html',
            controller: 'patientRegController',
            size: 'lg',
             resolve: {
                     patients: function () {
                         return patients;
                     }
                  }
        });
         modalInstance.result.then(function (selectedItem) {
                        $scope.selected = selectedItem;
                        $scope.patientProfile();             
                    }, function () {
            });
        };

        //get patients list
         $scope.patientProfile=function(){
                    $http({
                        url: "getPatientInfo.php",
                        method: "GET"
                        }).then(function (results) {
                        $scope.patients= results.data;                
                    });
        }

         //log out
        $scope.logout=function(){               
               $window.sessionStorage.clear();
              window.location.href='index.php';  
        }

});
