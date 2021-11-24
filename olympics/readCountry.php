<?php

$servername = "localhost";
$username = "coa123cycle";
$password = "bgt87awx";
$dbname = "coa123cdb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM Country WHERE ISO_id like '" . $_POST["keyword"] . "%' ORDER BY ISO_id LIMIT 0,6";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["ISO_id"]; ?>');"><?php echo $country["ISO_id"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>