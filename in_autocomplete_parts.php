<?php require_once('../../../private/initialize.php');



// Get search part
$searchTerm = $_GET['term'];

// Get matched data from parts table
$query = $db->query("SELECT * FROM PART WHERE PartNum LIKE '".$searchTerm."%' ORDER BY PartNum ASC");

// Generate parts data array
$part_list = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['PartNum'];
        array_push($part_list, $data);
    }
}

// Return results as json encoded array
echo json_encode($part_list);

?>
