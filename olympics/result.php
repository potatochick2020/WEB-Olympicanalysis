<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $(".flip").click(function(){
    $(this).next().slideToggle("slow");
  });
});
</script>
<Style>
h1{
    font-size: 100px;
    font-family: arial, sans-serif;
    font-weight: bold;
    margin-top: 0px;
    margin-bottom: 1px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
.panel, .flip {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
  margin:0 200px 0 200px;
}

.panel {
  padding: 40px;
}
</Style>
</head>
<body>

<?php
$country_id="'".$_POST['country_id']."'";

$servername = "localhost";
$username = "coa123cycle";
$password = "bgt87awx";
$dbname = "coa123cdb";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


//Country_id and Country Name
echo "<h1>".strtoupper($_POST['country_id'])."</h1>";
//number of gold medal
    $allDataArray = array();
    $query = "SELECT gold FROM Country WHERE iso_id=$country_id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
    echo '<div class="flip"><h3>Number of gold medal</h3></div>';
    echo '<div class="panel"><h2>'.$row['gold'].'</h2></div>';

//rank
    $allDataArray = array();
    $query = "SELECT (count(*)+1) as 'Rank' FROM Country Where gold > (SELECT gold From Country Where ISO_id=$country_id)";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo '<div class="flip"><h3>Country rank </h3></div>';
    echo '<div class="panel"><h2>'.$row['Rank'].'</h2></div>';
//average BMI
    $allDataArray = array();
    $query = "SELECT AVG(BMI)as AVERAGEBMI From ( Select height,ISO_id, weight, weight/(height/100)/(height/100) As BMI from Cyclist ) AS T Where ISO_id = $country_id GROUP BY ISO_id";
    $result = mysqli_query($conn,$query);
    echo '<div class="flip"><h3>Average BMI of athelete</h3></div>';
    if (mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      echo '<div class="panel"><h2>'.$row['AVERAGEBMI'].'</h2></div>';
    } else {
      echo '<div class="panel"><h2>There is not any cyclist</h2></div>';
    };
//number of female cyclist
    $allDataArray = array();
    $query = "SELECT Count(*) From Cyclist Where gender='F' and ISO_id = $country_id GROUP BY ISO_id";
    $result = mysqli_query($conn,$query); 
    echo '<div class="flip"><h3>Number of female athlete</div>';
    if (mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      echo '<div class="panel"><h2>'.$row['Count(*)'].'</h2></div>';
    } else {
      echo '<div class="panel"><h2>There is not any female cyclist</h2></div>';
    };
//list of cyclist name participated in Cyclist-road sport
    $allDataArray = array();
    $query = "SELECT name FROM `Cyclist` WHERE sport LIKE '%Cycling - Road%' and ISO_id = $country_id";
    $result = mysqli_query($conn,$query);
    echo '<div class="flip"><h3>List of their cyclist name</h3></div>';
    if (mysqli_num_rows($result) > 0){
    echo '<div class="panel">';
    echo "<table border='1' style='position:sticky;margin: 5% auto;left: 0;right: 0;'>
    <tr>
    <th>Name</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
    }
    echo "</table></div>";
  } else {
    echo '<div class="panel"><h2>There is not any cyclist participated in Cyclist-road sport</h2></div>';
  };

    

    

?>

</body>
</html>

