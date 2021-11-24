<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Details Task</title>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: bisque;
}
.center {
	text-align:center;
}
body,td,th {
	color: brown; 
}
.larger {
	font-size:larger;
	text-align:left;
}
table {
	margin-left:auto;
	margin-right:auto;
}
.fixed {
	font-family: Courier, monospace;
	white-space: pre;
	background-color:cornsilk;
}
</style>
</head>
<body>
<h3 class="center">COA123 - Web Programming</h3>
<h2 class="center">Individual Coursework - Olympic Cyclists</h2>
<h1 class="center">Task 3 - Details (details.php)</h1>
  <table>
  <tr>
  <td>
<div class="fixed">~  __0
 _-\<,_
(*)/ (*)
</div>
</div>
  </td>
  </tr>
  </table>
  <br />
<?php


//function to convert the user input date (DD/MM/YYYY) to SQL Format ('YYYY-MM-DD')
function formatdate($oldDate)
{
    $arr = explode('/', $oldDate);
	$newDate = '"'.$arr[2].'-'.$arr[1].'-'.$arr[0].'"';
    return $newDate;
}

////obtain user input from atheletes.html and convert it to searching keyword for SQL
$validation = True;
$date_1=$_GET['date_1'];
$date_2=$_GET['date_2'];
if (($date_1[2] != '/') or ($date_1[5]!= '/') ) {
	$validation = False;
	echo "Please enter Correct format for Date_1";
}
if (($date_2[2] != '/') or ($date_2[5]!= '/'))  {
	$validation = False;
	echo "Please enter Correct format for Date_2";
}
if (strlen($date_1)!=10 or strlen($date_2)!=10){
	$validation = False;
	echo "Please enter Date with correct length";
} else {
	$num_validation=true;
	if (is_numeric($date_1[0]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[1]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[3]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[4]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[6]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[7]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[8]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_1[9]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[0]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[1]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[3]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[4]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[6]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[7]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[8]) != 1 ) {$num_validation = False;};
	if (is_numeric($date_2[9]) != 1 ) {$num_validation = False;};
	if ($num_validation = false){
		$validation = False;
		echo "Please enter Date with correct numbering";
	}
};
if ($validation == True){
$servername = "localhost";
$username = "coa123cycle";
$password = "bgt87awx";
$dbname = "coa123cdb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$count=0;
$date_1=formatdate($_GET['date_1']);
$date_2=formatdate($_GET['date_2']);
$allDataArray = array();
$query = "SELECT Cyclist.name,Cyclist.ISO_id,Country.ISO_id,Country.country_name,Country.gdp,Country.population FROM Cyclist join Country on Country.iso_id=Cyclist.iso_id WHERE Cyclist.dob>$date_1 and Cyclist.dob<$date_2";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
$allDataArray[] = $row;
$count=$count+1;
//append $row to the end of the $allDataArray array
}
}
$allDataArray[] = $count;
// Encoding array in JSON format
echo json_encode($allDataArray);
mysqli_close($conn);
}
?>


</body>
</html>

