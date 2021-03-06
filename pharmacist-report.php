
<!DOCTYPE html>
<html lang="en" data-ng-app="HealthApp">
<head>
    <title>Pharmacist report</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/angular-toastr.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body ng-controller="phamReportController">
    <div class="col-md-12 header">
      <div class="logo"><h3 style="color:white;font-size:1.8em;text-align:right;">Pharmacist Report</h3></div> 
 </div>
 <div class="col-md-12 nav-pills-container">
     <ul class="nav nav-pills">
         <li><a href="pharmacist.php">Home</a></li>
         <li class="logout-li"><a ng-click="logout()"><div class="glyphicon glyphicon-log-out"></div> Logout</a></li>
     </ul>
 </div>

<div class="col-md-6">
       <div id="exportable">
        <div class="col-md-8 " style="text-align: center;"> Patient Who Previously Visited  {{detail.Firstname}} {{detail.Surname}}  Report</div>
            <div class= "row">
            <div class="col-md-11">               
                    <table class="table export-table" >
                        <thead >
                                <tr class="table-header">  
                                   <th><th/>                                    
                                </tr>
                            </thead>                       
                            <tbody>
                                    <tr ng-repeat="appInfo in getAppInforms">                                     
                                            <td>On The {{appInfo.presDate}} Pharmacist {{detail.Firstname}} {{detail.Surname}} Gave Out Medicine To Patient {{appInfo.Firstname}} {{appInfo.Surname}} for {{appInfo.Description}}
 
                                           </td>            
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
<div class="col-md-6">
<div id="exportable">
<div class="col-md-8 " style="text-align: center;"> Visiting Patient History Report</div>
	<div class="row">
        <div class="col-sm-6">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control"  placeholder="Search Patient ID" ng-model="filterUsers" >
                    <span class="input-group-addon">
                        <button type="button" ng-click="searchPrescription(filterUsers)">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
	</div>
    <div class= "row">
    <div class="col-md-11">               
            <table class="table export-table" >
                <thead >
                        <tr class="table-header">  
                           <th><th/>                                    
                        </tr>
                    </thead>                       
                    <tbody>
                            <tr ng-repeat="appy in presDetails">                                     
                                    <td>On The Date Of  {{appy.treatmentDate}} Patient {{filterUsers}}  Recieved Medication From Pharmacist {{appy.Firstname}} {{appy.Surname}} For {{appy.Description}} 
                                      At {{appy.placeIssued}} 
                                   </td> 
                                              
                            </tr >
                            <tr ng-if="ind==0">
                            <td>
                                 No Patient History Available Yet
                             </td>
                         </tr>
                    </tbody>           
            </table>                    
        </div>
        </div>
    </div>
<div class="col-md-2">    
</div>  
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
<script src="angular/phamReportsController.js" type="text/javascript"></script>  
<script src="angular/sharedService.js" type="text/javascript"></script>  
<script src="angular/loginService.js" type="text/javascript"></script> 

</body>
</html>
<toaster-container></toaster-container>