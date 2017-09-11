
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <title>User </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body ng-controller="userController">
    <div class="col-md-12 header">
       <div class="logo"></div>  
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">
            <li><a href="#">Home</a></li>
            <li class="selected-nav-item"><a >Reports</a></li>
            <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
        </ul>
    </div>
    <div class="col-md-12 search-and-results-container"> 
        <!-- search results --> 
        <div class="section table-hover-highlight">
            <div class="col-md-12 section-header">
                <div class="concessionID-section">
                    <div class="col-md-2 no-padding-left">
                        <div class="col-md-1 no-padding-left vertical-align-center">                          
                        </div>
                        <div class="col-md-10 no-padding-left">
                            <div class="concession-name">{{details.FirstName}} {{details.Surname}}</div>
                            <div>{{details.idNumber}}</div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="single-print"><i class="fa fa-edit" aria-hidden="true"></i></div>
                    </div>
                    <div class="col-md-10 no-padding-left">
                        <div class="col-md-2 no-padding-left">
                            Gender:{{details.Gender}}
                        </div>
                        <div class="col-md-3">
                           Cell Number: {{details.CellNumber}}
                        </div>
                        <div class="col-md-4">
                          Next of Kin: {{details.kinName}} {{details.kinCell}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="table-container">
                    <table class="table table-bordered table-hover header-fixed table-striped">
                        <thead>
                            <tr>
                                <th>Patient ID </th>
                                <th>Date Created</th>
                                <th>Treated By</th>
                                <th>Prescription</th>
                                <th>Treated Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{patientInfo.patientID}}</td>
                                <td>{{patientInfo.createDate}}</td>
                                <td>{{patientInfo.doctorName}}</td>
                                <td>{{patientInfo.medicalEvent}} </td>
                                <td>{{patientInfo.dateOfEvent}} </td>
                            </tr>
                             <tr ng-if="!patientInfo">
                                  <td colspan="12">You currently dont have medical history </td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- footer-->
    </div>
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
     <script src="angular/userController.js" type="text/javascript"></script>  
     <script src="angular/sharedService.js" type="text/javascript"></script>  
     <script src="angular/loginService.js" type="text/javascript"></script>    
   
</body>

</html>