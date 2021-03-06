
app.controller("adminReportController", function ($scope, $http, $modal, toaster,sharedService,$window) {
    
         //here logging in assigning object with the information from DB
         $scope.sharedData = sharedService.getData();
         $scope.detail=$scope.sharedData[0];
         // if( $scope.detail==undefined){
           // window.location.href='index.php'; 
          // }
         $scope.username=$scope.sharedData[0].username ;
         $scope.password = $scope.sharedData[0].password;
        var userData= $scope.sharedData[0].patientID;
         //get patients list
                $scope.patientsList=function(){
                    $http({
                        url: "user-report-admin.php",
                        method: "GET"
                        }).then(function (results) {
                            $scope.getAppInforms = results.data;                  
                    });
            }
            $scope.patientsList();

            $scope.staffList=function(){
                $http({
                    url: "staff-report-admin.php",
                    method: "GET"
                    }).then(function (results) {
                        $scope.getAppInform = results.data;                  
                });
           }
           $scope.staffList();
                            
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
    
    
    
    