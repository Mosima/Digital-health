<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">

<head>
    <title>Doctor Site </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body ng-controller="doctorController">
    
    <div class="col-md-12 header">
        <div class="logo"></div>
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
                                            <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#view" data-original-title >View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        </div>    
        

        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Write a Prescription.</h4>
                            </div>
                            <form action="#" method="post" accept-charset="utf-8">
                            <div class="modal-body" style="padding: 5px;">  
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                            <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <textarea style="resize:vertical;" class="form-control" placeholder="Type prescription here..." rows="6" name="comment" required></textarea>
                                        </div>
                                    </div>
                                </div>  
                                <div class="panel-footer" style="margin-bottom:-14px;">
                                    <input type="submit" class="btn btn-success" value="Send"/>
                                        <!--<span class="glyphicon glyphicon-ok"></span>-->
                                    <input type="reset" class="btn btn-danger" value="Clear" />
                                        <!--<span class="glyphicon glyphicon-remove"></span>-->
                                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





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
