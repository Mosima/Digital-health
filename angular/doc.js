
app.controller("userController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
    "use strict"
 //here logging in assigning object with the information from DB
      $scope.sharedData = sharedService.getData();
       $scope.detail=$scope.sharedData[0];
        if( $scope.detail==undefined){
          window.location.href='index.php'; 
         }
       $scope.username=$scope.sharedData[0].username ;
       $scope.password = $scope.sharedData[0].password;
      var userData= $scope.sharedData[0].idNumber;

     //get single patient information
             $http.post(
                         "patientUser.php", {
                                     'idNumber': userData
                                 }
                       ).then(function (response) {
                               $scope.details= response.data;            
                  });
                         
       //get patient information
         $http.post(
                     "patient.php", {
                                 'idNumber': userData
                             }
                   ).then(function (response) {
                         $scope.patientInfo= response.data; 
                                                   
               if($scope.patientInfo.hospital_Id=="1"){
                   $scope.patientInfo.Hospital="Chris Hani Baragwana Hospital";
                   }else if($scope.patientInfo.hospital_Id=="2"){
                       $scope.patientInfo.Hospital="Steve Biko Academic Hospital";
                   }else if($scope.patientInfo.hospital_Id=="3"){
                       $scope.patientInfo.Hospital="Tshwane District Hospital";
                   }else if($scope.patientInfo.hospital_Id=="4"){
                       $scope.patientInfo.Hospital="DR Goerge Mukhari Hospital";
                   }          
           });

     //patient edit
                 $scope.openPresModal = function (pres) {
        var modalInstance = $modal.open({
            backdrop: 'static',
            animation: true,
            templateUrl: 'presModalContent.html',
            controller: 'presRegController',
            size: 'md',
             resolve: {
                     pres: function () {
                         return pres;
                     }
                  }
        });;
             modalInstance.result.then(function (selectedItem) {
                             $scope.selected = selectedItem;
                                      
                         }, function () {
             });
         };
                 
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

app.controller("patientUpdateController", function ($scope, $http, $modalInstance, toaster, $dialogs,patients,loginService,$window) {
 //set form dirty angular validation
 $scope.setDirtyForm = function (form) { angular.forEach(form.$error, function (type) { angular.forEach(type, function (field) { field.$setDirty(); }); }); return form; };
$scope.updateStatus = patients != undefined ? 'Update' : 'Create';
//for readonly on update
if ($scope.updateStatus == 'Update')
   { $scope.truefalse = "true"; }
//assigning presccription from modal
$scope.data=pres;

//saving prescription
   $scope.savePrescription(data)=function() 
{

     if ($scope.presForm.$valid) {
       //send data to php file via ajax
           $http.post(
               "writePrescription.php", {
                   'idNo': $scope.data.presCode,'description':$scope.data.description, 'patientID': $scope.data.patientID,'treattID': $scope.data.treattID
                           }
           ) 
        }                                                        
                          
   $scope.close = function () {
   //
        if ($scope.presForm.$dirty) {
           var dlg = null;
           dlg = $dialogs.confirm("Unsaved changes will be lost. Continue?", "");
           dlg.result.then(function (btn) {
               $modalInstance.dismiss('cancel');
           }, function (btn) { });
       } else { $modalInstance.dismiss('cancel'); }
   }

}})
