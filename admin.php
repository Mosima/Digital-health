
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp" >
<head>
  <title>Digital Health </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
  <link rel="stylesheet" href="css/style2.css">
</head>
<body ng-controller="adminController">
    <div class="col-md-12 header" >
         <div class="logo"></div>   
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">           
            <li><a href="#">Home</a></li>   
            <li><a href="#">Doctors</a></li>   
            <li><a href="#">Reports</a></li>                
            <li class="logout-li"  ng-click="logout()"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
        </ul>      
   </div> 
    <!-- Total widgets -->
    <div class="col-md-12">
         <!-- create user filter-->
        <div class="form-group col-sm-6 filter-group">
            <div class="col-sm-3">
            <button class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-target="#siginModal" ng-click="openSignModal()" >Create Patient</button>             
            </div>
             <div class="col-sm-3">                     
            </div>
        </div>
            <div class="totalsWidget outer " >
                <div class="activeWidget">
                    <div class="cornered"><p>Newly files</p></div>
                    <div class="main"><p>16</p></div>
                </div>
            </div>
            <div class="totalsWidget outer" style="margin-left: 10px;" >
                <div class="cornered"><p></p></div>
                <div class="main"><p></p></div>
            </div>  
            <div class="totalsWidget outer" style="margin-left: 30px;">
                <div class="cornered"><p></p></div>
                <div class="main"><p></p></div>
            </div>
            <div class="totalsWidget outer" style="margin-left: 20px;">
                <div class="cornered"><p> </p></div>
                <div class="main"><p> </p></div>
            </div>     
    </div>
</div>
    <div class="col-md-12 search-and-results-container">
          <!-- Search bar -->
         <div class="input-group add-on">
             <input class="form-control" placeholder="Search Patient" name="srch-term" id="srch-term" type="text"  ng-model="filterUsers">
               <div class="input-group-btn">
                    <button class="btn btn-default-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
             </div>
          </div>
      <!-- Results table -->
     <div class="table-container">             
            <table class="table table-bordered table-hover header-fixed table-striped">
                <thead>
                <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Surname</th>
                     <th>Gender</th>
                     <th>Contact</th>
                     <th>Next OF Kin</th>
                     <th></th>                      
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="patient in patients | filter:filterUsers">
                    <td>
                       {{patient.idNumber}}
                    </td>
                    <td>{{patient.FirstName}}</td>
                    <td>{{patient.Surname}}</td>
                    <td>
                        {{patient.Gender}}
                    </td>
                    <td>{{patient.CellNumber}}</td>
                    <td> 
                        {{patient.kinName}}  {{patient.kinCell}}
                    </td>
                   <td>
                       <button type="button"  value="submit" class="btn btn-warning" ng-click="delete(patient)">Delete</button>  <button class="btn btn-primary"  ng-click="openSignModal(patient)" >Edit</button>
                   </td>
                </tr>               
              </tbody>
        </table>
     </div>
  </div>
 <script type="text/ng-template" id="patientSignModalContent.html">
    <!-- Patient Registration Modal -->
        <form class="form-horizontal" name="registerForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">{{updateStatus}} File</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-6">                      
                            <div class="form-group" >
                                <label class="control-label col-sm-3">Patient ID:</label>
                                <div class="col-sm-9" ng-keyup="ValidateIdnumber()" ng-class="{'has-error' : registerForm.IDNo.$invalid && !registerForm.IDNo.$pristine }" >
                                    <input type="text" class="form-control" id="id_number" name="id_number"  ng-model="patientData.idNumber" ng-pattern="/^[0-9]{13}$/" ng-readonly="{{truefalse}}" required>                  
                                      <span style="color:red" ng-show="registerForm.id_number.$pristine && registerForm.id_number.$invalid "> ID number is required.</span>
                                     <br /> <span id="errors" style="color:red" ></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name">Name:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.FirstName.$invalid && !registerForm.FirstName.$pristine }" >
                                    <input type="text" class="form-control" id="FirstName" name="FirstName"  ng-model="patientData.FirstName" maxLength='25' ng-pattern="/^[a-zA-Z_-]*$/" required>
                                     <span style="color:red" ng-show="registerForm.FirstName.$pristine && registerForm.FirstName.$invalid"> name is required.</span>
                                     <span style="color:red" ng-show="registerForm.FirstName.$error.pattern">incorrect name format</span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Surname:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.Surname.$invalid && !registerForm.Surname.$pristine }">
                                    <input type="text" class="form-control" name="Surname"  data-ng-model="patientData.Surname" ng-pattern="/^[a-zA-Z_-]*$/" maxLength='25' required >
                                     <span style="color:red" ng-show="registerForm.Surname.$pristine && registerForm.Surname.$invalid"> surname is required.</span>
                                    <span style="color:red" ng-show="registerForm.Surname.$error.pattern">incorrect surname format</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Cell no:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.CellNumber.$invalid && !registerForm.CellNumber.$pristine }">
                                    <input type="text" class="form-control" name="CellNumber"  ng-model="patientData.CellNumber" ng-pattern="/^[0-0][6-8][0-9]{8}$/" maxLength='10' required>                     
                                      <span style="color:red" ng-show="registerForm.CellNumber.$pristine && registerForm.CellNumber.$invalid"> cell number is required.</span>
                                    <span style="color:red" ng-show="registerForm.CellNumber.$error.pattern">cell number is incorrect</span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" > 
                            <div class="form-group">
                                <label class="control-label col-sm-3">Email:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.Email.$invalid && !registerForm.Email.$pristine }">
                                    <input type="email" class="form-control" name="email"  ng-model="patientData.Email" ng-pattern="/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{1,3})$/" required>
                                    <span style="color:red" ng-show="registerForm.email.$pristine && registerForm.email.$invalid"> email required.</span>
                                    <span style="color:red" ng-show="registerForm.email.$error.pattern"></span>
                                </div>
                            </div>                           
                            <div class="form-group" >
                                  <label class="control-label col-sm-3">Address:</label>
                                <div class="col-sm-9" ng-class="{'has-error' : registerForm.HomeAddress.$invalid && !registerForm.HomeAddress.$pristine }">
                                     <textarea class="comment-text" id="HomeAddress" name ="HomeAddress"  ng-model="patientData.HomeAddress" required ></textarea> 
                                     <span style="color:red" ng-show="registerForm.HomeAddress.$pristine && registerForm.HomeAddress.$invalid">  required.</span>
                                </div>                               
                            </div>
                            <div >
                                <div class="col-md-12" 
                                    <label class="control-label col-md-9" style="color:blue;text-align: center;">Next Of Kin </label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Name:</label>
                                    <div class="col-sm-9" ng-class="{'has-error' : registerForm.kinName.$invalid && !registerForm.kinName.$pristine }">
                                        <input type="text" class="form-control" name="kinName" id="kinName" ng-model="patientData.kinName" ng-readonly="{{truefalse}}" maxLength='25' ng-pattern="/^[a-zA-Z_-]*$/" required>    
                                        <span style="color:red" ng-show="registerForm.kinName.$pristine && registerForm.kinName.$invalid"> name required.</span>
                                        <span style="color:red" ng-show="registerForm.kinName.$error.pattern">invalid name!</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-3">Cell:</label>
                                    <div class="col-sm-9" ng-class="{'has-error' : registerForm.kinCell.$invalid && !registerForm.kinCell.$pristine }">
                                        <input type="text" class="form-control" id="kinCell" name="kinCell"  ng-model="patientData.kinCell"ng-pattern="/^[0-0][6-8][0-9]{8}$/" maxLength='10' required>                  
                                      <span style="color:red" ng-show="registerForm.kinCell.$pristine && registerForm.kinCell.$invalid" > cell no is required.</span>
                                    <span style="color:red" ng-show="registerForm.kinCell.$error.pattern">invalid cell number!</span>
                                    </div>
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
     <script src="angular/adminController.js" type="text/javascript"></script>   
      <script src="angular/sharedService.js" type="text/javascript"></script>  
     <script src="angular/loginService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>