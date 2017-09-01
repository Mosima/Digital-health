<!DOCTYPE html>
<html lang="en"  data-ng-app="HealthApp">
<head>
    <title>Digital Health System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style2.css">  
	
</head>
<body ng-controller="indexController">
        <div class="col-md-12 header">
			<img class="image" src="img/med/careLogo.svg">
        </div>
                <div class="col-md-12 nav-pills-container">
                    <ul class="nav nav-pills">
                        <li><a href="#">Home</a></li>
                        <li><a href="patient.html">Patient</a></li>
                        <li><a href="doctor.html">Doctor</a></li>
                        <li><a href="pharmacist.html">Pharmacist</a></li>
                        <li><a  data-toggle="modal" data-backdrop="static" data-target="#loginModal" ng-click="openlogInModal()">Admin</a></li>
                    </ul>
                </div>
 
            <footer style="align-content: center">
                    <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; www.digitalhealth.com 2017</p>
                    </div>
                </div>
            </footer>          
<script type="text/ng-template" id="logInModalContent.html">
        <!-- log in Modal-->
        <form class="form-horizontal" name="logInForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">Admin Log in</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" >
                            <label class="control-label col-sm-2">username:</label>
                            <div class="col-sm-10" ng-class="{'has-error' : logInForm.username.$invalid && !logInForm.username.$pristine }">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" ng-model="data.username"   required>
                                <span style="color:red" ng-show="logInForm.username.$pristine && logInForm.username.$invalid"> username is required.</span>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10" ng-class="{'has-error' : logInForm.password.$invalid && !logInForm.password.$pristine }">
                                <input type="password" class="form-control" id="pwd" name="password" ng-model="data.password" placeholder="Enter password" required>
                                <span style="color:red" ng-show="logInForm.password.$pristine && logInForm.password.$invalid"> password is required.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" value="submit" class="btn btn-success" ng-click="saveLogIn(data)">Submit</button>
                <button type="button" class="btn btn-default" ng-click="close()">Close</button>
            </div>
        </form>
    </script>
     <div data-ng-view="" ng-cloak> </div>
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
      <script src="js/slide.js" type="text/javascript"></script> 
        <!-- Load controllers -->
     <script src="angular/indexController.js" type="text/javascript"></script>  
     <script src="angular/sharedService.js" type="text/javascript"></script>  
     <script src="angular/loginService.js" type="text/javascript"></script>          
</body>
</html>
<toaster-container></toaster-container>