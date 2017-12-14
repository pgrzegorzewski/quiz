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
	<link rel="StyleSheet" href="../css/side_menu_leaderboard.css" />
	<script type="text/javascript" src="../js/questionnaire.js"></script>
	<script type="text/javascript" src="../js/question.js"></script>
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
					<a href ='quiz.php'>Quizes</a>
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
				<h4>Welcome to Qu¿zzy!</h4> 
				<p>Do You want to learn? Find some interesting facts? Make a contest with your friends? Play and have fun?<br><br>You are in the right place!!!<br><br><br></p>				
			</div>

			<div class ="row">
				<div class="col-sm-6">
					<h4>Question of the day.</h4>
					<?php
					
					session_start();
					
					$_SESSION["used_question_ids"][] =  0;
					
					function checkAnswear($button, $id)
					{
						$check = $button.attr("id");
						$id = id;
					
						$sql = 'SELECT\
									qa.qestion_answear_text,																\
									qa.is_true																				\
								FROM questions.tbl_question_answear qa														\
								INNER JOIN questions.tbl_question q			ON		q.question_id = qa.question_id 			\
								WHERE 																						\
									q.question_id = $id																		\
									AND qa.question_answear_order = $check';
					
						$result = $conn -> query($sqlQuestion);
					
						$row = $result -> fetch_assoc();
						if($row["is_true"] == $check)
						{
							alert("You are right!");
						}
						else{
							alert("You dumbass :(");
						}
					
					};
					
					require 'connect.php';
					//$conn = mysqli_connect($servername, $username, $password, $dbname);
					$conn_string = "host=localhost port=5432 dbname=postgres user=pawel password=aaa";
					$conn= pg_connect($conn_string);
					if(!$conn){
						$error = error_get_last();
						echo "Connection failed. Error was: ". $error['message']. "\n";
					}
					require '../php/class_question.php';	
					$question = new Question();
					$question -> drawRandomQuestion($conn);
					//drawRandomQuestion($conn);
					?>
				</div>
				<div class="col-sm-6">
					<div class = "row">
						<div class = "col-sm-16 answear_header" id ="answearHeader"></div>
					</div>
					<div class = "row">
						<div class = "col-sm-1 "></div>
						<div class = "col-sm-2 answear_img"><p id = "answear_img"></p></div>
						<div class ="col-sm-4 answear"><p id = "answear"></p></div>
					</div>
					<div class = "row">
						<div class = "col-sm-1 "></div>
						<div class = "col-sm-2 answear_img"><p><img id="refresh_img" height=50px; width=50px; src = "../resources/img/refresh.png" hidden = true; onclick = "drawNextQuestion()" ></p></div>
						<div class ="col-sm-4 answear"><p id = "refresh"></div>
					</div>
					
									
				</div>
			</div>	
		</section>
		<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
		</div>
	</div>




</body>
</html>

