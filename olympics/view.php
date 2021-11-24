<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="transition.css" />
<style>
html { 
	background: url(WALLPAPER-LONDONOLYMPICS03.jpg) no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
#submit {
	background-color:transparent;
	border: none;
}
.horizontal-center {
  height: 200px;
  position: relative;
  border: 3px solid green;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  right: 35%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  
}

.logo{
    width: 540px ; 
    height: 248px ; 
	
}
.logo:hover {
	transform-origin: center;
	animation: scale 250ms ease-in-out forwards;
}
@keyframes scale {
  to {
    transform: scale(1.5);
  }
}
</style>

</head>
<body>
<div class="transition transition-1 is-active"></div>
		<a href="search.php">
		<div class="center">
			<button id="submit" type="submit"><img class=logo src='LOGO-olympics5ring.png'></button>
		</div>
		</a>
<script src="transition.js"></script>
</body>
</html>





