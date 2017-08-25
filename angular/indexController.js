
app.controller("indexController", function ($scope, $http,$modal,sharedService,loginService,$window) {
    "use strict"

 $scope.openlogInModal = function ( ) {
        var modalInstance = $modal.open({
            backdrop: 'static',
            animation: true,
            templateUrl: 'logInModalContent.html',
            controller: 'adminlogInController',
            size: 'md'
        });
    };

});

app.controller("adminlogInController", function ($scope, $http, $modalInstance, toaster, $dialogs,sharedService,loginService,$window) {
 "use strict"
    $scope.setDirtyForm = function (form) { angular.forEach(form.$error, function (type) { angular.forEach(type, function (field) { field.$setDirty(); }); }); return form; };
    
    $scope.saveLogIn = function () {
        if ($scope.logInForm.$valid) {
          if($scope.data.forgot=='Y'){
           $http.post(
                "forgotPassword.php", {
                          'username': $scope.data.username
                            }
                        ).then(function (response) {
                            console.log("Data Inserted Successfully. Data:" + response + " " + $scope.data); 
                        })              
           }else{
            loginService.logIn($scope.data).then(function (response) {
            $modalInstance.close();
            if(response.data ==1){
                  toaster.error('Wrong Password Entered',
                                           '', toaster.options = {
                                "positionClass": "toast-top-right",
                                     "closeButton": true
                              });

            }else if(response.data.password==$scope.data.password && response.data.username==$scope.data.username){
                     $scope.dataToShare = [];                                          
                          $scope.dataToShare = response.data;
                         sharedService.addData($scope.dataToShare); 
                             window.location.href='admin.php';                       
                                    
            }else if(response.data ==2){
                 toaster.error('Wrong Username entered',
                                           '', toaster.options = {
                                "positionClass": "toast-top-right",
                                     "closeButton": true
                              });
            }else{

                 toaster.error('The Username and password entered does not match',
                                           '', toaster.options = {
                                "positionClass": "toast-top-right",
                                     "closeButton": true
                              });
            }

       
            }, function (error) {                    
                toaster.error(' Log In Failed.',
                                            'Failed!', toaster.options = {
                                    "positionClass": "toast-top-center",
                                        "closeButton": true
                                });
                console.error(error);
            });
        } 
    };
  }
  
    $scope.close = function () {
        if ($scope.logInForm.$dirty) {
            var dlg = null;
            dlg = $dialogs.confirm("Unsaved changes will be lost. Continue?", "");
            dlg.result.then(function (btn) {
                $modalInstance.dismiss('cancel');
            }, function (btn) { });
        } else { $modalInstance.dismiss('cancel'); }
    }

  
});