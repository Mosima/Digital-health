
app.controller("userReportController", function ($scope, $http, $modal, toaster,sharedService) {

     //here logging in assigning object with the information from DB
     $scope.sharedData = sharedService.getData();
     $scope.detail=$scope.sharedData[0];
      if( $scope.detail==undefined){
        window.location.href='index.php'; 
       }
     $scope.username=$scope.sharedData[0].username ;
     $scope.password = $scope.sharedData[0].password;
    var userData= $scope.sharedData[0].patientID;

               $http.post(
                        "getUserReport.php", {
                             'pIdNo': userData
                      }
                        ).then(function (response) {
                        $scope.getAppInforms = response.data;                   
               });

            $scope.exportData = function () {
                var blob = new Blob([document.getElementById('exportable').innerHTML], {
                    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
                    });
                saveAs(blob, "StudentReport.xls");
            };
                    
})


