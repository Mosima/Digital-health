<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Health App</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/style.css">
    <!--CSS-->  
</head> 
<body ng-controller="indexController">  
   <div class="col-md-12 header">
         <div class="logo"></div>    
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">
             <li ><a href="pending-inbox.html">Home</a></li>
            <li><a href="admin"  data-toggle="modal" data-backdrop="static" data-target="#loginModal" ng-click="openlogInModal()">Admin</a></li>   
            <li><a href="conditions.html">Conditions</a></li>   
            <li><a href="pricing.html">Pricing</a></li>                 
            <li class="logout-li"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> 
        </ul>      
   </div> 
    <script type="text/ng-template" id="logInModalContent.html">
        <!-- log in Modal-->
        <form class="form-horizontal" name="logInForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">Log in</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="col-md-6" >
                                <div class="form-group">
                                    <label="name">Username: </label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label="name">Password: </label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                     <div>
                        <footer style="align-content: center">
                                <div class="row">
                                <div class="col-lg-12">
                                    <p>Copyright &copy; www.digitalhealth.com 2017</p>
                                </div>
                            </div>
                        </footer>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" value="submit" class="btn btn-default" ng-click="saveLogIn(data)">Submit</button>
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
        <!-- Load controllers -->
     <script src="angular/indexController.js" type="text/javascript"></script>      
</body>
</html>