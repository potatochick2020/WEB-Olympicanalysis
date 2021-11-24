
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>BMI Task</title>
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
	text-align:right;
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
<h1 class="center">Task 1 - BMI (bmi.php)</h1>

<?php
//obtain user input from atheletes.html 
$min_weight=$_GET['min_weight'];
$max_weight=$_GET['max_weight'];
$min_height=$_GET['min_height'];
$max_height=$_GET['max_height'];
$row=($max_weight-$min_weight)/5+1;
$col=($max_height-$min_height)/5+1;
echo "Input value of Minimum weight:",$min_weight,'<br>';
echo "Input value of Maximum weight:",$max_weight,'<br>';  
echo "Input value of Minimum height:",$min_height,'<br>';  
echo "Input value of Maximum height:",$max_height,'<br>';  
//validation
$validate=True;

if ($min_weight > $max_weight) {
	echo "Error: Input value of minimum weight is larger than maximum weight<br>";
	$validate=False;
  };
if ($min_height > $max_height) {
	echo "Error: Input value of minimum weight is larger than maximum weight<br>";
	$validate=False;
  };
if ($min_weight % 5 != 0) {
	echo "Error: Minimum weight is not multiples of 5<br>";
	$validate=False;
  };
if ($max_weight % 5 != 0) {
	echo "Error: Maximum weight is not multiples of 5<br>";
	$validate=False;
  };
if ($min_height % 5 != 0) {
	echo "Error: Minimum height is not multiples of 5<br>";
	$validate=False;
  };
if ($max_height % 5 != 0) {
	echo "Error: Maximum height is not multiples of 5<br>";
	$validate=False;
  };
if ($min_weight <= 0) {
	echo "Error: Please input valid minimum weight (must be larger than zero)<br>";
	$validate=False;
  };
if ($max_weight <= 0) {
	echo "Error: Please input valid maximum weight (must be larger than zero)<br>";
	$validate=False;
  };
if ($min_height <= 0) {
	echo "Error: Please input valid minimum height (must be larger than zero)<br>";
	$validate=False;
  };
if ($max_height <= 0) {
	echo "Error: Please input valid maximum height (must be larger than zero)<br>";
	$validate=False;
  };
//generate result table
if ($validate==true){
echo "<table border='1'>
<tr>
<th>Height(cm)--><br>Weight(KG)<br>|<br>V</th>";
for ($i = 0; $i < $col; $i ++) {
	echo "<th>",$min_height+5*($i),"</th>";
}
echo "</tr>";

for ($i = 0; $i < $row; $i ++) {
	echo "<tr>";
	echo "<td>",$min_weight+5*($i),"</td>";
	for ($j = 0; $j < $col; $j ++) {	
	echo "<td>",round(($min_weight+5*($i))/(($min_height+5*($j)))/(($min_height+5*($j)))*100*100,3),"</td>";
}
echo "</tr>";
echo '<br>';	
}
echo "</table>";
};
?>
<br/>
<h3 class="center"><a href="bmi.html">Go back to bmi.html</a></h3>
</body>
</html>
