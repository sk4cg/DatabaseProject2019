<?php
//include database configuration file
require "dbutil.php";
$db = DbUtil::loginConnection('ram8yx_b');


//get records from database
$query = $db->query("SELECT name, hours_of_op, rating, street, city, state FROM place");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "places_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Name', 'Hours of Operation', 'Rating', 'Street', 'City','State');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['name'], $row['hours_of_op'], $row['rating'], $row['street'], $row['city'], $row['state']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>