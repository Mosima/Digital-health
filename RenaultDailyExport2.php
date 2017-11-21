<?Php 
     
 $conn =mysql_connect('targettracker.amhgroup.net','usrtargettracker','tR@ck3r!*321','target_tracker'); 

  
$setSql = "SELECT Dealercode,Dealername,Datesaved,TypePanel, TypePanelTarget, TypeParts, TypePartsTarget, TypeAccessories, TypeAccessoriesTarget FROM renDailyExport";  
$setRec = mysql_query($conn,$setSql);  
// print_r($conn);
// print_r($setRec);
$columnHeader = '';  
$columnHeader = "Dealer Code" . "\t" . "Dealer Name" . "\t" . "Date Saved" . "\t" . "TypePanel" . "\t" . "TypePanelTarget" . "\t" . "TypeParts" . "\t" . "TypePartsTarget" . "\t" . "TypeAccessories" . "\t" . "TypeAccessoriesTarget";
  
$setData = '';  
  //print_r($setRec);
while ($rec =$setRec->fetch_assoc()){  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
   
?>