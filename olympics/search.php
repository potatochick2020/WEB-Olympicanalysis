<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="transition.css" />
<style>
  html { 
  background: url() no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.searchbar {
  
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 580px;
  height: 45px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 30px;
  
}
.search-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}


.searchbar:hover,
.searchbar:focus-within {
  border-color: white;
  box-shadow: 0 1px 6px 0 rgba(32, 33, 36, 0.28);
}
*,
::before,
::after {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
input,button {
  border: none;
  font-family: inherit;
  font-size: inherit;
  outline: none;
}
button {
  cursor: pointer;
}
.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 55vh;
  min-height: 300px;
  margin-top: 50px;
}
#country_id {
	width: 100%;
	height: 100%;
}
.search-button{
	width: 25px;
  height: 25px;


}  
@media (max-width: 660px) {
  .searchbar {
    width: 80%;
  }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>

  
function validateForm(){
  let flag=false;
  let input='{"iso_id":"' + document.forms["inputform"]["country_id"].value + '"}';
  let allcountryid = <?php include 'allcountryid.php' ?>;
  for(var i = 0; i < allcountryid.length; i++) {
    var obj =  JSON.stringify(allcountryid[i]);
    if (obj==input){
      flag=true;
    }
  }
  if (flag==false){
    var x = document.getElementById("alert");
    x.style.display = "none";
    setTimeout(function(){x.style.display = "block";}, 200);
    
  }
  return flag;
}

$(document).ready(function(){
	$("#country_id").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#country_id").css("background","#FFF");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#country_id").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#country_id").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>

<div class="alert alert-danger" id="alert" style="display: none;">
  <strong>Error:</strong> Invalid country id
</div>
<div class="transition transition-1 is-active"></div>
<main class="main">
  <div>
	<form class="searchbar" action="result.php" name='inputform' method="post" onsubmit="return validateForm()">
  			<label for="form-search"></label>
			  <img class="search-icon" src="ICON-search.png"/>
    		<input type="text" name="country_id" id="country_id" placeholder="Country ID" class="Search-input" maxlength="3">
			  <button type='submit'><img class="search-button" src="ICON-2012olympicssquare.png" /></button>
	</form>
 	<div id="suggesstion-box"></div>
  </div>
</main>


<?php

?>


<script src="transition.js"></script>
</body>
</html>
