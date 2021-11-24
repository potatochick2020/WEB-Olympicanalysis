

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Athletes Task</title>
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

<h1 class="center">Task 2 - Athletes (athletes.php)</h1>
  <table>
  <tr>
  <td>
<div class="fixed">
</div>
  </td>
  </tr>
  </table>
  <br />
<?php
//obtain user input from atheletes.html and convert it to searching keyword for SQL
$country_id="'".$_GET['country_id']."'";
$part_name="'%".$_GET['part_name']."%'";
echo "Input value of country id:",$_GET['country_id'],'<br>';
echo "Input value of part name:",$_GET['part_name'],'<br>';

$servername = "localhost";
$username = "coa123cycle";
$password = "bgt87awx";
$dbname = "coa123cdb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

//validation
$validate=True;
$allDataArray = array();
$query = "SELECT iso_id FROM Cyclist WHERE iso_id=$country_id";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) == 0){
echo "Error: There is no such country id";
$validate=False;
};

//generate result table
if ($validate==true) {
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
};
$allDataArray = array();
$query = "SELECT Cyclist.name,Cyclist.gender,Country.country_name,Country.total FROM Country join Cyclist on Country.iso_id=Cyclist.iso_id WHERE Cyclist.iso_id=$country_id and Cyclist.name Like $part_name";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0){
echo "<table border='1'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Country Name</th>
<th>Total Medal</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['country_name'] . "</td>";
echo "<td>" . $row['total'] . "</td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "There is not any result";
};
};
mysqli_close($conn);

?>


<h3 class="center"><a href="athletes.html">Go back to athletes.html</a></h3>
</body>
</html>