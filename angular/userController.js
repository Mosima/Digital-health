
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
          $scope.openUpdateModal = function (patients) {
              var modalInstance = $modal.open({
                  backdrop: 'static',
                  animation: true,
                  templateUrl: 'patientUpdateModalContent.html',
                  controller: 'patientUpdateController',
                  size: 'lg',
                  resolve: {
                          patients: function () {
                              return patients;
                          }
                        }
              });
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
//assigning selected patient from modal
$scope.patientData=patients;
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
//saving patient file
    $scope.save =function() {

      if ($scope.registerForm.$valid) {
        //extract gender from IDnumber
            var saIds =$scope.patientData.idNumber;
            var saId=(saIds.substr ( 6  , 4));
            if ((saId > 4999) & (saId < 10000)){
				 $scope.patientData.gender='Male';
			}else
            {
                $scope.patientData.gender='Female'; 
            }
            //get current date 
            var todayDate =new Date();
           var selDate = todayDate.toISOString();
            $scope.patientData.createDate=selDate.substring(0,10);
            $scope.patientData.pID=saIds.substring(7,13);
        //send data to php file via ajax
            $http.post(
                "insertPatient.php", {
                    'idNo': $scope.patientData.idNumber,'pId':$scope.patientData.pID,'name': $scope.patientData.FirstName, 'surname': $scope.patientData.Surname, 'cellNo': $scope.patientData.CellNumber, 'email': $scope.patientData.Email, 'address': $scope.patientData.HomeAddress,'gender':$scope.patientData.gender,'createDate':$scope.patientData.createDate,'state':$scope.updateStatus,'kinCellNo':$scope.patientData.kinCell,'kinName':$scope.patientData.kinName 
                            }
            ) .then(function (response) {
                if(response.data== 1){
                         toaster.success($scope.patientData.FirstName,'Patient Registered.', ' ',
                                    toaster.options = {
                                        "positionClass": "toast-top-center",
                                        "closeButton": true
                                    });
                        $modalInstance.close();
                 }else if((response.data== 3)){
                     $modalInstance.close();
                     toaster.success('Patient Updated.', ' ',
                                    toaster.options = {
                                        "positionClass": "toast-top-center",
                                        "closeButton": true
                                    });
                        
               }else{
                     toaster.error('Patient Already Exist.', ' ',
                                    toaster.options = {
                                        "positionClass": "toast-top-center",
                                        "closeButton": true
                                    });
                        $modalInstance.close();
               };
             }); 
           } else {
                    toaster.error(' Please complete all required fields.',
                                                ' ', toaster.options = {
                                                        "positionClass": "toast-top-left",
                                                        "closeButton": true
                                                    });
                        $scope.setDirtyForm($scope.registerForm);
                        $('input.ng-invalid').first().focus();
                    };              
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
