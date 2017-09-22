<!DOCTYPE html>
<html lang="en">

<head>
    <title>Docter Side </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
   
</head>

<body>
    
    <div class="col-md-12 header">
        <div class="logo"></div>
    </div>
    <div class="col-md-12 nav-pills-container">
        <ul class="nav nav-pills">
            <li><a href="pending-inbox.html">Home</a></li>
            <li><a href="approved-concessions.html">Reports</a></li>
            
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="customerInfo">Mosima</p>
                                        <p class="accInfo">Patient ID No :1123</p>
                                    </td>
                                    <td class="rightAlign">5,0000.0</td>
                                    <td class="rightAlign">23.33535</td>
                                    <td class="rightAlign">60</td>
                                    <td>
                                        <p class="mapInfo">Loaded:1</p>
                                        <p class="mapInfo">Approved:1</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="customerInfo">Mtech Electronic</p>
                                        <p class="accInfo">Patient ID No :1123</p>
                                    </td>
                                    <td class="rightAlign">5,0000.0</td>
                                    <td class="rightAlign">120.33535</td>
                                    <td class="rightAlign">120</td>
                                    <td>
                                        <p class="mapInfo">Loaded:1</p>
                                        <p class="mapInfo">Approved:1</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <!--Second Page-->
        
                
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
                                            <p class="customerInfo">Mosima</p>
                                            <p class="accInfo">Patient ID No :1123</p>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-yes" data-toggle="modal">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="customerInfo">Mtech Electronic</p>
                                            <p class="accInfo">Patient ID No :1123</p>
                                        </td>
                                       
                                        <td>
                                            <button type="button" class="btn btn-yes" data-toggle="modal" >View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                












                    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>