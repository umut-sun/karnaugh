<?php include_once "include/parser.php";?>

<!-- Copyright (C) 2014 João Rafael.  
João Email: joaoraf[ at ]me.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation; 

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

(The text of the license is at ./LICENSE.txt)-->
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Karnaugh Map</title>
	<link rel="stylesheet" href="assets/less/style.css"> 	    

</head>
<body>
	<div class="sidebar well">
		<div class="fluid container">
			<div class="sixteen columns well add-bottom">
				<label for"variables" class="dark button half-bottom full-width" style="text-align:left">
					<input type="radio" onClick="ChangeVariableNumber(2)" ID="TwoVariableRB" name="variables" class="dark remove-bottom">
					Two Variables
				</label>

				<label for"variables" class="dark button half-bottom full-width" style="text-align:left">
					<input type="radio" onClick="ChangeVariableNumber(3)" ID="ThreeVariableRB" name="variables" class="dark remove-bottom">
					Three Variables
				</label>

				<label for"variables" class="dark button half-bottom full-width" style="text-align:left">
					<input type="radio" onClick="ChangeVariableNumber(4)" ID="FourVariableRB" name="variables" class="dark remove-bottom">
					Four Variables
				</label>

				<label for"care" class="red button half-bottom full-width" style="text-align:left"> 
					<input type="radio" onClick="ToggleDontCare()" ID="AllowDontCareCB" name="care" class="dark remove-bottom">
					Allow Don't Care
				</label>

				<div style="color: white"><?php new Parser; ?></div>
			</div>
		</div>
	</div>

	<!-- main content -->
	<div class="main">

		<div class="fluid container add-bottom">
			

	    	<div class="sixteen columns well add-bottom">    
				<form action="" method="post">
					<div class="fifteen columns">
						<input type="text" class="half-bottom full-width pull-center" name="equation">
					</div>
					<div class="one column">
						<input type="submit" class="small blue button full-width half-bottom" value="Go" style="margin-top: 1px;">
					</div>
				</form>

				<div id="EquationDiv">
				</div>        
			
			</div>

		    <div class="eight columns add-bottom">    
				<p class="pull-center"><b>Truth Table</b></p>
		    	<div id="TruthTableDiv">
				</div>     

			</div>

	    	<div class="eight columns">    
				<p class="pull-center"><b>Karnaugh Map</b></p>
		    	<div id="KarnoMapDiv">
				</div>
			</div>
		</div>
	</div>


	<script src="assets/js/app.js"></script> 	    
</body>
</html>