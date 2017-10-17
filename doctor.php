<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">

<head>
    <title>Doctor Site </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
   
    <link rel="stylesheet" href="css/style.css">
</head>

<body ng-controller="doctorController">
    <div class="col-md-12 header">
       <div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Doctor Section</h3></div> 
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">
            <li><a href="home#">Home</a></li>
            <li><a href="Reports.php">Reports</a></li>
            
            <li class="logout-li"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>

    <!-- headings-->
    <div class="lending-headings col-md-12">
        <div class="col-md-5">
            <h2 class="resultsHeading"></h2>
        </div>
        <div class="col-md-5">
            <h2 class="resultsHeading">Waiting list</h2>
        </div>

    </div>
    <!-- lending concessions and products-->
    <div class="col-md-12">
        <div class="col-md-5">
            <div class="section">
                
            </div>
        </div>
        <div class="col-md-7">
            <div class="input-group add-on">
                <input class="form-control" placeholder="Patient ID" name="srch-term" id="srch-term" type="text">
                <div class="input-group-btn">
                    <button class="btn btn-default-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            
            <div class="section">
                <div class="section-header">
                    <div class="consessionID-section"> Waiting Patients</div>
                </div>
                <div class="section-body">
                    <div class="table-container">
                        <table class="table table-bordered table-hover header-fixed table-striped">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                 
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="customerInfo">{{patient.FirstName}} {{patient.Surname}}</p>
                                        <p class="accInfo">Patient ID No :{{patient.patientID}}</p>
                                    </td>
                                   
                                    <td>
                                        <p class="mapInfo">{{patient.status}}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>
        </div>
    </div>

    <div class=" col-md-8 section1">
                    <div class="section-header">
                        <div class="consessionID-section"> Assigned Patients</div>
                    </div>
                    <div class="section-body">
                        <div class="product-table-container">
                            <table class="table table-bordered table-hover header-fixed table-striped">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                       
                                        <th>View File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="customerInfo">{{patient.FirstName}} {{patient.Surname}}</p>
                                            <p class="accInfo">Patient ID No :{{patient.patientID}}</p>
                                        </td>
                                        <td>
                                            <a class="btn" type="button" data-toggle="modal" data-backdrop="static" data-target="#presModalContent.html" ng-click="openPresModal()" >View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        </div>    
        

     <script type="text/ng-template" id="presModalContent.html">
        
        <form class="form-horizontal" name="presForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title">Write Prescription</h4>
            </div>
            <div class="modal-body">
            <div class="form-group" >
            <label class="control-label col-sm-2">Prescription:</label>
            <div class="col-sm-10" ng-class="{'has-error' : logInForm.username.$invalid && !logInForm.username.$pristine }">
                <input type="text" class="form-control" id="prescription" name="username" placeholder="Enter prescription" ng-model="data.description"   required>
                
            </div>
        </div>   
            <div class="modal-footer row">
                <button type="button" value="submit" class="btn btn-success" ng-click="savePrescription(data)">Submit</button>
                <button type="button" class="btn btn-default" ng-click="close()">Close</button>
            </div>
        </form>
    </script>



        <script>
            
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
       <script src="angular/doctorController.js" type="text/javascript"></script>  
       <script src="angular/sharedService.js" type="text/javascript"></script>  
       <script src="angular/loginService.js" type="text/javascript"></script>    
 </body>
</html>
