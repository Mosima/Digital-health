
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <title>user report</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body ng-controller="userReportController">
    <div class="col-md-12 header">
      <div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Patient Report</h3></div> 
 </div>
 <div class="col-md-12 nav-pills-container">
     <ul class="nav nav-pills">
         <li><a href="user.php">Home</a></li>
         <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
     </ul>
 </div>
<div class="col-md-9">
       <div id="exportable">
        <div class="col-md-8" style="text-align: center;">Information Report</div>
            <div class= "row">
            <div class="col-md-11">               
                    <table class="table" >
                        <thead >
                                <tr class="table-header">  
                                   <th>Student Number<th/> 
                                        <th>Name<th/> 
                                        <th>Surname<th/>  
                                        <th>Status<th/> 
                                        <th >Outstanding Fees<th/>
                                        <th >Appointment Information<th/>  
                                </tr>
                            </thead>                       
                            <tbody>
                                    <tr ng-repeat="appInfo in getAppInforms"> 
                                     
                                       <td>{{appInfo.student_no}}</td>  
                                           <td></td>
                                            <td>{{appInfo.first_name}}</td>  
                                            <td></td>
                                            <td>{{appInfo.last_name}}</td>
                                            <td></td>  
                                            <td >{{appInfo.status}}</td>
                                            <td></td> 
                                            <td>R{{appInfo.amount_due}}</td> 
                                            <td></td>
                                            <td>{{appInfo.appointment_date}} {{appInfo.appointment_time}} </td>            
                                    </tr>
                            </tbody>           
                    </table>
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-happy-face"></span> You can use this report to register if you are already unblocked by an Advisor <a class="alert-link"></a>.
                    </div>
                </div>
                </div>
            </div>

     <button  class="btn btn-success" ng-click="exportData()">Export</button>
     <select>
     </select>
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
<script src="angular/userReportsController.js" type="text/javascript"></script>  
<script src="angular/sharedService.js" type="text/javascript"></script>  
<script src="angular/loginService.js" type="text/javascript"></script> 

</body>
</html>
<toaster-container></toaster-container>