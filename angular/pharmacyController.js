
app.controller("pharmacyController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
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

if($scope.detail.hospital_Id=="1"){
    $scope.hosp="Chris Hani Baragwana Hospital";
}else if($scope.detail.hospital_Id=="2"){
    $scope.hosp="Steve Biko Academic Hospital";
}else if($scope.detail.hospital_Id=="3"){
    $scope.hosp="Tshwane District Hospital";
}else if($scope.detail.hospital_Id=="4"){
    $scope.hosp="DR Goerge Mukhari Hospital";
}  

//get single patient information
       $http.post(
                   "staffmemberUser.php", {
                               'idNumber': userData
                           }
                 ).then(function (response) {
                         $scope.detailss= response.data;            
            });
            

             $scope.searchPrescription=function(preData){
                 $http.post(
                    "pres.php", {
                           'idNumber': preData
                            }
                  ).then(function (response) {
                          $scope.presDetails= response.data; 

              });   
            }   
//staff modal 
$scope.openstaffModal = function (staffData) {
    var modalInstance = $modal.open({
        backdrop: 'static',
        animation: true,
        templateUrl: 'staffModalContent.html',
        controller: 'staffModalController',
        size: 'lg',
        resolve: {
          staffData: function () {
                    return staffData;
                }
              }
    });
    modalInstance.result.then(function (selectedItem) {
                    $scope.selected = selectedItem;
                    $scope.staffList();   
                }, function () {
    });
};
            $scope.offerMedication=function(presDetail){
                var dlg = null;
                dlg = $dialogs.confirm("Are you sure correct medicine is given to a Patient?", "");
                dlg.result.then(function (btn) {
                $http.post(
                    "giveMedicine.php", {
                            'patientID': presDetail.patientID,'presCode': presDetail.presCode,'phamId':  $scope.detail.staffID,'placeIssued': $scope.hosp
                            }
                  ).then(function (response) {
                    $http.post(
                        "updatePrescription.php", {
                                'patientID': presDetail.patientID,'presCode': presDetail.presCode
                                });             
              }); 
              window.location.reload();
            }, function (btn) { });
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

});
app.controller("staffModalController", function ($scope, $http,sharedService, $modalInstance, toaster, $dialogs,staffData,loginService,$window) {
    
       $scope.sharedData = sharedService.getData();
          //set form dirty angular validation
     $scope.setDirtyForm = function (form) { angular.forEach(form.$error, function (type) { angular.forEach(type, function (field) { field.$setDirty(); }); }); return form; };
   $scope.updateStatus = staffData != undefined ? 'Update' : 'Create';
   //for readonly on update
   if ($scope.updateStatus == 'Update')
       { $scope.truefalse = "true"; }
   //assigning selected patient from modal
   $scope.staffData=staffData;
   //ID validation
      $scope.ValidateIdnumber = function(){
          var resultArray =  ValidateID($('#id_number').val());
          if(resultArray[0] === 0){
               var msg ="";
              $.each(resultArray[2], function(index,row){
               msg = row +"<br/>";
              })
             $("#errors").html(msg);
          }
          else{
                $("#errors").html('');
          }
       }
   //saving staff
       $scope.save =function() {
   
     
           //extract gender from IDnumber
               var saIds =$scope.staffData.idNumber;
               var saId=(saIds.substr ( 6  , 4));
               if ((saId > 4999) & (saId < 10000)){
                    $scope.staffData.gender='Male';
               }else
               {
                   $scope.staffData.gender='Female'; 
               }
               //get current date 
               var todayDate =new Date();
               var selDate = todayDate.toISOString();
               $scope.staffData.createDate=selDate.substring(0,10);
              if($scope.staffData.role=="Doctor"){
                 var roleVal="DR";
              }else{
                 var roleVal="Pham";
              }
   
               var reT=saIds.substring(5,12);
               $scope.staffData.pID=roleVal + reT;
             //hospital created
                $scope.staffData.createdHospital=$scope.sharedData[0].hospital_Id;
               //send data to php file via ajax
               $http.post(
                   "updateStaff.php", {
                       'idNumber': $scope.staffData.idNumber, 'Email': $scope.staffData.Email,'password':$scope.staffData.password
                               }
               ).then(function (response) {
                $modalInstance.dismiss('cancel');
                toaster.success('Staff Updated.', ' ',
                  toaster.options = {
                    "positionClass": "toast-top-center",
                    "closeButton": true
                   });
                });            
       }     
       $scope.close = function () {
       //
            if ($scope.registerForm.$dirty) {
               var dlg = null;
               dlg = $dialogs.confirm("Unsaved changes will be lost. Continue?", "");
               dlg.result.then(function (btn) {
                   $modalInstance.dismiss('cancel');
               }, function (btn) { });
           } else { $modalInstance.dismiss('cancel'); }
       }
   
   });
   

