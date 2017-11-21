
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <title>Staff report</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body ng-controller="adminReportController">
    <div class="col-md-12 header">
      <div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Staff Report</h3></div> 
 </div>
 <div class="col-md-12 nav-pills-container">
     <ul class="nav nav-pills">
         <li><a href="admin.php">Home</a></li>
         <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
     </ul>
 </div>
 <div class="col-md-12">
 {{detail.Firstname}} {{detail.Surname}}
 </div>

<div class="col-md-10">
       <div id="exportable">
        <div class="col-md-9 " style="text-align: center;"> Staff Summary Report</div>
            <div class= "row">
            <div class="col-md-10">  
                        <!-- Search bar -->
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Search Patient" name="srch-term" id="srch-term" type="text"  ng-model="filterUsers">
                        <div class="input-group-btn">
                                <button class="btn btn-default-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>             
                    <table class="table export-table table-bordered table-hover header-fixed table-striped" >
                        <thead >
                                <tr class="table-header">  
                                   <th>Staff Details</th>  
                                   <th>Email</th> 
                                   <th>Gender</th> 
                                   <th>Hospital</th>  
                                   <th>Number Of Patients Treated</th>                                  
                                </tr>
                            </thead>                       
                            <tbody>
                                    <tr ng-repeat="appInf in getAppInform | filter:filterUsers">                                     
                                           <td>{{appInf.FirstName}} {{appInf.Surname}}</td>  
                                           <td>{{appInf.Email}}</td> 
                                           <td>{{appInf.Gender}}</td> 
                                           <td> {{appInf.hospital}}</td> 
                                           <td>{{appInf.numberOf}}</td>           
                                    </tr>
                            </tbody>           
                    </table>                    
                </div>
                </div>
            </div>
    <div class="col-md-2">    
     <select class="form-control"  name="appointment_time"  ng-model="selectedExport"  required>
     <option value="csv">CSV</option>
     <option value="pdf">PDF</option>
     <option value='doc'>WORD</option>
     <option value='excel'>EXCEL</option>
      <option value="" selected hidden />
   </select>   
   </div>
   <button  class="btn btn-success" ng-click=exportAction(selectedExport)>Export</button>
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
<script src="js/tableExport.js" type="text/javascript">></script> 
<script src="js/jquery.base64.js" type="text/javascript">></script>
<script src="js/sprintf.js" type="text/javascript">></script>
<script src="js/jspdf.js" type="text/javascript">></script>
<script src="js/base64.js" type="text/javascript">></script>
  <!-- Load controllers -->
<script src="angular/adminReportController.js" type="text/javascript"></script>  
<script src="angular/sharedService.js" type="text/javascript"></script>  
<script src="angular/loginService.js" type="text/javascript"></script> 

</body>
</html>
<toaster-container></toaster-container>