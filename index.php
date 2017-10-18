<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.3.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/care-medical-logo-400x320.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body ng-controller="indexController">
<section class="menu cid-qxO7MK1OKZ" once="menu" id="menu1-e" data-rv-view="51">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#">
                         <img src="assets/images/care-medical-logo-400x320.jpg" alt="Mobirise" title="" media-simple="true" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="#">Digital Health</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="#">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>&nbsp;Home &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="about.php#header10-l"><span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>&nbsp;About&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a></li></ul>
            
        </div>
    </nav>
</section>

<section class="engine"><a href="#">bootstrap buttons</a></section><section class="cid-qxO7MLiwTf mbr-fullscreen mbr-parallax-background" id="header2-f" data-rv-view="53">

    

    

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Digital Health</h1>
                
                <p class="mbr-text pb-3 mbr-fonts-style display-5">Welcome to Digital Health</p>
                <div class="mbr-section-btn"><a class="btn btn-md btn-secondary display-4 close()" data-toggle="modal" data-backdrop="static" data-target="#logInModalContent.html" ng-click="openPresModal()">Login</a></div>
            </div>
        </div>
    </div>

</section>

	<script type="text/ng-template" id="logInModalContent.html">
    <!-- log in Modal-->
    <form class="form-horizontal" name="presInForm">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
            <h4 class="modal-title">Log In</h4>
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
                    <div ng-if="data.forgot !=='Y'">
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10" ng-class="{'has-error' : logInForm.password.$invalid && !logInForm.password.$pristine }">
                            <input type="password" class="form-control" id="pwd" name="password" ng-model="data.password" placeholder="Enter password" required>
                            <span style="color:red" ng-show="logInForm.password.$pristine && logInForm.password.$invalid"> password is required.</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group" >
                        <div class"col-md-12">
                             <div class="col-md-2">
                                    <label class="radioBtnLabel" style="padding:3px" >Admin</label><input  type="radio" data-ng-model="data.logValue" value="Admin">
                                </div>
                                <div class="col-md-3">
                                    <label class="radioBtnLabel" style="padding:3px">Patient</label><input  type="radio" data-ng-model="data.logValue" value="Patient">
                                </div>
                             <div class="col-md-2">
                                 <label class="radioBtnLabel" style="padding:3px" >Doctor</label><input type="radio"  data-ng-model="data.logValue" value="Doctor"> 
                             </div>
                             <div class="col-md-3">
                                 <label class="radioBtnLabel" style="padding:3px" >Pharmacist</label><input type="radio" data-ng-model="data.logValue" value="Pharmacist">
                             </div>
                         </div>    
                         <br>
                         </div>
                         <div class="form-group" style="padding:20px">
                        <label class="control-label col-md-4" for="pwd">forgot Password ?</label>
                        <div class="col-sm-1" >
                            <input type="checkbox" class="form-control"  ng-model="data.forgot" ng-true-value="'Y'" >
                      
                        </div>
                    </div>
                     <div class="col-md-12">
                             <div class="alert alert-danger alert-dismissible" style="background-color:lightcoral ; color:black" role="alert" ng-if="showError==1">  
                             <strong><span class="glyphicon glyphicon-thumbs-down"></span></strong> {{errors}}
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
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>

      <script src="js/angular.js" type="text/javascript"></script> 
      <script src="app.js" type="text/javascript"></script>
      <script src="js/toaster.min.js" type="text/javascript"></script>
      <script src="js/angular-moment.min.js" type="text/javascript"></script>
      <script src="js/angular-route.min.js" type="text/javascript"></script>
      <script src="js/angular-ui-router.js" type="text/javascript"></script>
      <script src="js/ui-bootstrap-tpls.min.js" type="text/javascript"></script>
      <script src="js/dialogs.min.js" type="text/javascript"></script> 
      <script src="js/idvalidator.js" type="text/javascript"></script> 


<script src="angular/indexController.js" type="text/javascript"></script>  
<script src="angular/sharedService.js" type="text/javascript"></script>  
<script src="angular/loginService.js" type="text/javascript"></script>
<script src="angular/doctorController.js" type="text/javascript"></script>
 
  
    <input name="animation" type="hidden">
  </body>
</html>