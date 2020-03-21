<?php

include 'db.php';

// Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

// Search
$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (firstname like '%".$searchValue."%' or 
        lastname like '%".$searchValue."%' or 
        middlename like'%".$searchValue."%' ) ";
}

// Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from datatables_demo");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

// Total number of record with filtering
$sel = mysqli_query($con,"select count(*) as allcount from datatables_demo WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

// Fetch records
$empQuery = "select * from datatables_demo WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
        "firstname"=>$row['firstname'],
        "lastname"=>$row['lastname'],
        "middlename"=>$row['middlename']
    );
}

// Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);

?>
