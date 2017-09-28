<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body ng-controller="staffController">
    <div class="col-md-12 header">
       <div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Admin Section</h3></div> 
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">
            <li><a href="admin.php"><i class="fa fa-chevron-circle-left"></i> Back</a></li>
            <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
        </ul>
    </div>
    <div class="col-md-12 search-and-results-container"> 
        <div class="form-group col-sm-6 filter-group">
                <div class="col-sm-3">
                <button class="btn btn-primary" style="color:white" data-toggle="modal" data-backdrop="static" data-target="#siginModal" ng-click="openstaffModal()" >Add Staff Member</button>             
                </div>
                <div class="col-sm-3">                     
                </div>
      </div>
      <div class="form-group col-sm-4 filter-group">
                <div class="col-sm-3">
                <button class="btn btn-primary" style="color:white" >View Staff Members Reports </button>             
                </div>
                <div class="col-sm-3">                     
                </div>
      </div>
      <div class="table-container">             
            <table class="table table-bordered table-hover header-fixed table-striped">
                <thead>
                <tr>
                     <th>Staff ID</th>
                     <th>Name</th>
                     <th>Surname</th>
                     <th>Gender</th>
                     <th>Contact</th>
                     <th>Role</th>                      
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="staff in staffData | filter:filterstaff" ng-click="openstaffModal(staff)" >
                    <td>
                       {{staff.staffID}}
                    </td>
                    <td>{{staff.Firstname}}</td>
                    <td>{{staff.Surname}}</td>
                    <td>
                        {{staff.Gender}}
                    </td>
                    <td>{{staff.Email}}</td>
                    <td> 
                        {{staff.role}}  
                    </td>
                </tr>               
              </tbody>
        </table>
     </div>
    </div>
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
                                <label class="control-label col-sm-3">ID Number:</label>
                                <div class="col-sm-9" ng-keyup="ValidateIdnumber()" ng-class="{'has-error' : registerForm.IDNo.$invalid && !registerForm.IDNo.$pristine }" >
                                    <input type="text" class="form-control" id="id_number" name="id_number"  ng-model="staffData.idNumber" ng-pattern="/^[0-9]{13}$/" ng-readonly="{{truefalse}}" required>                  
                                      <span style="color:red" ng-show="registerForm.id_number.$pristine && registerForm.id_number.$invalid "> ID number is required.</span>
                                     <br /> <span id="errors" style="color:red" ></span>
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
                            <div class="form-group">
                            <label class="control-label col-sm-3">Role:</label>
                            <div class="col-sm-9" >
                                <select style="width:100%;height:30px" name="role" ng-model="staffData.role"  required>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Phamacist">Phamacist</option>
                                     <option value="" selected hidden />
                                </select>
                                <span style="color:red" ng-show="registerForm.role.$pristine && registerForm.role.$invalid"> required</span>
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
     <script src="angular/staffMemberController.js" type="text/javascript"></script>  
     <script src="angular/sharedService.js" type="text/javascript"></script>  
     <script src="angular/loginService.js" type="text/javascript"></script>    

</body>
</html>
<toaster-container></toaster-container>
