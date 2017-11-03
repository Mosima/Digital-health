
app.controller("doctorController", function ($scope, $http,$modal,sharedService,loginService,$window,$dialogs) {
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
      var useId= $scope.sharedData[0].staffID;

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
                               $scope.details= response.data;  
                                 
                  });
                         
       //get doctor information
         $http.post(
                     "getDocCurAssignedTo.php", {
                                 'currentId': useId
                             }
                   ).then(function (response) {
                         $scope.patients= response.data; 
                         var cheee= angular.isObject($scope.patients)
                  
           });
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
         $scope.Done=function(data){

            var dlg = null;
            dlg = $dialogs.confirm("Are you done treating the Patient ?", "");
            dlg.result.then(function (btn) {
             $http.post(
                    "assignDoctor.php", {
                        'idNumber': data.idNumber,'doID':0
                    }
                ).then(function (response) {
                        $scope.details= response.data; 
                                     
               });

            }, function (btn) { });

         }




         $scope.openDModal = function (presd) {
            var modalInstance = $modal.open({
                backdrop: 'static',
                animation: true,
                templateUrl: 'presDModalContent.html',
                controller: 'presDController',
                size: 'md',
                 resolve: {
                         presd: function () {
                             return presd;
                         }
                      }
            });;
                 modalInstance.result.then(function (selectedItem) {
                                 $scope.selected = selectedItem;
                     }, function () {
                 });
             };
                 
    //log out and update logged on as zero
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

app.controller("presRegController", function ($scope, $http, $modalInstance,sharedService, toaster, $dialogs,pres,loginService,$window) {
    
    $scope.updateStatus = pres != undefined ? 'Update' : 'Create';
    //for readonly on update
    if ($scope.updateStatus == 'Update')
        { $scope.truefalse = "true"; }
    //assigning selected patient from modal
    $scope.pres=pres;
    //saving prescription
    $scope.savePrescription=function(press){
            $http.post(
                "writePrescription.php", {
                    'patientID': $scope.pres.patientID,'description':press.description
                }
            ).then(function (response) {
                    $scope.details= response.data; 
                    $modalInstance.dismiss('cancel');                 
        });
    };

       $scope.close = function () {
        
             $modalInstance.dismiss('cancel'); 
        }

})

app.controller("presDController", function ($scope, $http, $modalInstance,sharedService, toaster, $dialogs,presd,loginService,$window) {
    $scope.updateStatus = presd != undefined ? 'Update' : 'Create';
    //for readonly on update
    if ($scope.updateStatus == 'Update')
        { $scope.truefalse = "true"; }
    //assigning selected patient from modal
    $scope.presd=presd;
    $scope.sharedData = sharedService.getData();
    $scope.detail=$scope.sharedData[0];

    if($scope.detail.hospital_Id=="1"){
        $scope.hosp="Chris Hani Baragwana Hospital";
    }else if($scope.detail.hospital_Id=="2"){
        $scope.hosp="Steve Biko Academic Hospital";
    }else if($scope.detail.hospital_Id=="3"){
        $scope.hosp="Tshwane District Hospital";
    }else if($scope.detail.hospital_Id=="4"){
        $scope.hosp="DR Goerge Mukhari Hospital";
    }  
    
        $scope.saveTreatment=function(data){
                $http.post(
                    "writeTreament.php", {
                                'patientID':  $scope.presd.patientID,'doctorID': $scope.presd.assignedTo,'hospital':$scope.hosp,'description':data.description
                            }
                ).then(function (response) {
                        $scope.details= response.data; 
                        $modalInstance.dismiss('cancel');                 
            });
        };


        $scope.close = function () {
            
                 $modalInstance.dismiss('cancel'); 
            }
    
    
    })

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
       
