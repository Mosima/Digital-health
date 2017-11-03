
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp" >
<head>
  <title>Pharmacy </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body ng-controller="pharmacyController">
<div class="col-md-12 header">
<div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Pharmacist Section</h3></div> 
</div>
<div class="col-md-12 nav-pills-container">
 <ul class="nav nav-pills">
     <li><a href="#">Home</a></li>
     <li class="selected-nav-item"><a href="pharmacist-report.php">Reports</a></li>
     <li ><a style="text-align:center;padding-left:200px;color:black">{{hosp}}</a></li> 
     <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
 </ul>
</div> 
</div>
    <div class="col-md-12 search-and-results-container">
    <div class="section table-hover-highlight">
            <div class="col-md-12 section-header">
                <div class="concessionID-section">
                    <div class="col-md-2 no-padding-left">
                        <div class="col-md-1 no-padding-left vertical-align-center">                          
                        </div>
                        <div class="col-md-10 no-padding-left">
                            <div class="concession-name">{{detailss.Firstname}} {{detailss.Surname}}</div>
                            <div>{{detailss.idNumber}}</div>
                        </div>
                    </div>
                    <div class="col-md-10">
                      <div class="single-print"><i class="fa fa-edit" aria-hidden="true"></i></div>
                   </div>
                    <div class="col-md-10 no-padding-left">
                        <div class="col-md-2 no-padding-left">
                           Email:{{detailss.Email}}
                        </div>
                        <div class="col-md-3">
                          Staff ID: {{detailss.staffID}}
                        </div>
                        <div class="col-md-6">
                         <button tyrpe="button"  class="btn btn-success" ng-click="openstaffModal(detailss)" > Edit</button>
                        </div>
                        
                  </div> 
            </div>       
        </div>   
 </div> 
 <p></p>  
 <div class="col-md-">
        <!-- Search bar -->
         <div class="input-group add-on">
             <input class="form-control" placeholder="Search Pres code" name="srch-term" id="srch-term" type="text"  ng-model="filterUsers">
               <div class="input-group-btn">
                    <button class="btn btn-default-search" type="button" ng-click="searchPrescription(filterUsers)"><i class="glyphicon glyphicon-search"></i></button>
               </div>
          </div>
 </div>
      <!-- Results table -->
     <div class="table-container">             
            <table class="table table-bordered table-hover header-fixed table-striped">
                <thead>
                <tr>
                     <th>Patient Details</th>
                     <th>Prescription Date</th>
                     <th>Hospital</th>
                     <th>Doctors Details</th>
                     <th>Description</th>                      
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="presDetail in presDetails" >
                    <td>
                       {{presDetail.FirstName}} {{presDetail.Surname}}
                    </td>
                    <td>{{presDetail.treatmentDate}}</td>
                    <td>{{presDetail.hospital}}</td>
                    <td>
                        {{presDetail.Firstname}} {{presDetail.Surname}}
                    </td>
                    <td>{{presDetail.description}}</td>
                    <td>
                        <button class="btn btn-primary" ng-click="offerMedication(presDetail)">Offer Med</button>
                   </td>
                </tr>
                             
              </tbody>
        </table>
     </div>
  </div>
  <script type="text/ng-template" id="presDModalContent.html">  
        <form class="form-horizontal" name="presForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">Treatment Information</h4>
            </div>
            <div class="modal-body">
            <div class="form-group" >
            <label class="control-label col-sm-2">Description:</label>
            <div class="col-sm-10" >
            <textarea name="" id="" cols="30" rows="10" type="text" class="form-control" id="prescription" name="prescription"  ng-model="data.description" required></textarea>               
            </div>
        </div>   
            <div class="modal-footer row">
                <button type="button" value="submit" class="btn btn-success" ng-click="saveTreatment(data)">Submit</button>
            </div>
        </form>
    </script>
  <script type="text/ng-template" id="staffModalContent.html">
    <!-- Patient Registration Modal -->
        <form class="form-horizontal" name="registerForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">{{updateStatus}} Member</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6">                      
                            <div class="form-group" >
                                <label class="control-label col-sm-3">Staff No:</label>
                                <div class="col-sm-9" >
                                    <input type="text" class="form-control" id="id_number" name="id_number"  ng-model="staffData.staffID" ng-pattern="/^[0-9]{13}$/" ng-readonly="{{truefalse}}" >                 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name">Name:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.FirstName.$invalid && !registerForm.FirstName.$pristine }" >
                                    <input type="text" class="form-control" id="FirstName" name="FirstName"  ng-model="staffData.Firstname" maxLength='25' ng-pattern="/^[a-zA-Z_-]*$/"  ng-readonly="{{truefalse}}" required>
                                     <span style="color:red" ng-show="registerForm.FirstName.$pristine && registerForm.FirstName.$invalid"> name is required.</span>
                                     <span style="color:red" ng-show="registerForm.FirstName.$error.pattern">incorrect name format</span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Surname:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.Surname.$invalid && !registerForm.Surname.$pristine }">
                                    <input type="text" class="form-control" name="Surname"  data-ng-model="staffData.Surname" ng-pattern="/^[a-zA-Z_-]*$/" maxLength='25'  ng-readonly="{{truefalse}}" required >
                                     <span style="color:red" ng-show="registerForm.Surname.$pristine && registerForm.Surname.$invalid"> surname is required.</span>
                                    <span style="color:red" ng-show="registerForm.Surname.$error.pattern">incorrect surname format</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" > 
                         <div class="form-group">
                                <label class="control-label col-sm-3">Email:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.email.$invalid && !registerForm.email.$pristine }">
                                    <input type="email" class="form-control" name="email" placeholder=" " ng-model="staffData.Email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                                    <span style="color:red" ng-show="registerForm.email.$pristine && registerForm.email.$invalid"> email is required.</span>
                                    <span style="color:red" ng-show="registerForm.email.$error.pattern">invalid email!</span>
                                </div>
                           </div>                           
                           <div class="form-group" >
                           <label class="control-label col-sm-3">Gender:</label>
                           <div class="col-sm-9" >
                               <input type="text" class="form-control" id="gender" name="gender"  ng-model="staffData.Gender" ng-pattern="/^[0-9]{13}$/" ng-readonly="{{truefalse}}" >                 
                           </div>                         
                        </div>
                        <div class="form-group" >
                           <label class="control-label col-sm-3">passWord:</label>
                           <div class="col-sm-9" >
                               <input type="text" class="form-control" id="password" name="password"  ng-model="staffData.password" >                 
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" value="submit"  data-ng-click="save()">{{updateStatus}}</button>
                <button type="button" class="btn btn-default" ng-click="close()">Close</button>
            </div>
        </form>
      </script>

     <script src="js/jquery.js" type="text/javascript"></script>
     <script src="js/bootstrap.js" type="text/javascript"></script>
        <!-- angular extentions-->
      <script src="js/angular.js" type="text/javascript"></script> 
      <script src="app.js" type="text/javascript"></script>
      <script src="js/toaster.min.js" type="text/javascript"></script>
      <script src="js/angular-moment.min.js" type="text/javascript"></script>
      <script src="js/angular-route.min.js" type="text/javascript"></script>
      <script src="js/angular-ui-router.js" type="text/javascript"></script>
      <script src="js/ui-bootstrap-tpls.min.js" type="text/javascript"></script> 
      <script src="js/dialogs.min.js" type="text/javascript"></script> 
      <script src="js/idvalidator.js" type="text/javascript"></script> 
        <!-- Load controllers -->
     <script src="angular/pharmacyController.js" type="text/javascript"></script>   
      <script src="angular/sharedService.js" type="text/javascript"></script>  
     <script src="angular/loginService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>