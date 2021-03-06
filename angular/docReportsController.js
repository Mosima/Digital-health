
app.controller("docReportController", function ($scope, $http, $modal, toaster,sharedService,$window) {

     //here logging in assigning object with the information from DB
     $scope.sharedData = sharedService.getData();
     $scope.detail=$scope.sharedData[0];
      if( $scope.detail==undefined){
        window.location.href='index.php'; 
       }
       $scope.ind=0;
     $scope.username=$scope.sharedData[0].username ;
     $scope.password = $scope.sharedData[0].password;
    var userData= $scope.sharedData[0].staffID;


                    $scope.searchPrescription=function(preData){
                        $http.post(
                        "user-report-Doc.php", {
                                'idNumber': preData
                                }
                        ).then(function (response) {
                                $scope.presDetails= response.data; 
                                $scope.ind=1;

                    });   
                }   

               $http.post(
                        "doctVisit.php", {
                             'pIdNo': userData
                      }
                        ).then(function (response) {
                        $scope.getAppInforms = response.data;                       
               });
               $scope.exportAction = function (option) {
                switch (option) {
                    case 'pdf': $scope.$broadcast('export-pdf', {}); 
                        break; 
                    case 'excel': $scope.$broadcast('export-excel', {});
                        break; 
                    case 'doc': $scope.$broadcast('export-doc', {});
                        break;
                    case 'csv': $scope.$broadcast('export-csv', {});
                        break;
                    default: console.log('no event caught'); 
                }
            }

            $scope.exportActio = function (option) {
                switch (option) {
                    case 'pdf': $scope.$broadcast('export-pdf', {}); 
                        break; 
                    case 'excel': $scope.$broadcast('export-excel', {});
                        break; 
                    case 'doc': $scope.$broadcast('export-doc', {});
                        break;
                    case 'csv': $scope.$broadcast('export-csv', {});
                        break;
                    default: console.log('no event caught'); 
                }
            }
     
           //log out and update logged on as xero
      $scope.logout=function(){               
        $http.post(
            "updateLoggedIn.php", {               
                'logged':"0",'idNumber':$scope.detail.idNumber,'currentUser': $scope.detail.role 
        }).then(function (response) {
                    $window.sessionStorage.clear();
                    window.location.href='index.php';
         });              
    }  

})



