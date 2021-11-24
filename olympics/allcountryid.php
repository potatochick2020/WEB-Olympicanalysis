<?php 
  //pass a JSON format data which hold all country ID to the script
  $servername = "localhost";
  $username = "coa123cycle";
  $password = "bgt87awx";
  $dbname = "coa123cdb";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,$dbname);

  //validation
  $validate=True;
  $allDataArray = array();
  $query = "SELECT iso_id FROM Country";
  $result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $allDataArray[] = $row;
  }
  echo json_encode($allDataArray);
  mysqli_close($conn);
  ?>;