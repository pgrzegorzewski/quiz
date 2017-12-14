<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="StyleSheet" href="../css/index.css" />
	<link rel="StyleSheet" href="../css/question.css" />
	<link rel="StyleSheet" href="../css/quiz.css" />
	<link rel="StyleSheet" href="../css/side_menu_leaderboard.css" />
	<script type="text/javascript" src="../js/question.js"></script>
	<script type="text/javascript" src="../js/entertaining_test.js"></script>
	<script type="text/javascript" src="../js/side_menu_leaderboard.js"></script>
</head>

<body>

<div class="container-fluid">
	
	<div class= "sidemenu_2">
	
	</div>
	<div class= "sidemenu">
		<p style="cursor:pointer"><img src = "../resources/img/trophy.png" height = "50px" onmouseover="openLeaderboard()"/></p> <!-- &#9776; -->
	</div>
	<div id = 'leaderboard' class = 'leaderboard' onmouseleave = "closeLeaderboard()" >
		<a href = "javascript:void(0)" class = "closebtn" onclick = "closeLeaderboard()">&times;</a>
		test 1000pts;
	</div>


	<header class ="header">
		<h1 id="title"><a href ="index.php"><b>Q</b>u¿zzy</a></h1>
	</header>
	
	<div class="nav">
		<ol>
			<li>
				<a href ='#' id = "visited">Quizes</a>
			</li>
			<li>
				<a href ='#'>Tests</a>
				<ul>
					<li><a href="#">Personality</a></li>
					<li><a href="#">Cultural</a></li>
					<li><a href="#">Science</a></li>
					<li><a href="entertaining_test.php">Entertaining</a></li>
				</ul>
			</li>
			<li>
				<a href ='add_test.php'>Add own test</a>
			</li>
			<li>
				<a href ='#'>About author</a>
			</li>
		</ol>
	</div>
	
	<section class = "section">
		<div id ="welcome_div">
			<h3>Quizes</h3>
			
		</div>
		<div class = "row">
			<div class="col-sm-12" id="tiles">
				<?php 
				
				echo "
					<table id = \"tile\">
						<tr>
							<td>						
								<button name = '1' id = 'quizButton' class = 'category btn' >Draw quiz!</button>
							</td>
							<td style = \"width:50px\">						
								
							</td>
							<td>
								<button name = '2' id = 'quizButton' class = 'category btn'>Choose category</button>
							</td>
						</tr>
					</table>
				";
				?>
				<br/><br/>

			</div>
		</div>
		<div class ="row">
			<div class="col-sm-12">	
				<h4 id="test_title" hidden = "true">Let's begin with the</h4>
			</div>
		</div>
		<div id = "test_questions">

		</div>
		<div class ='row'>
				<div class='col-sm-12' id = 'result_div'>	
					<h4 id= 'result_text' hidden = 'true'></h4>
				</div>
		</div>
				
	</section>
	<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
	</div>
</div>




</body>
</html>

