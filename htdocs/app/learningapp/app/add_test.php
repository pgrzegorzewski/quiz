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
	<link rel="StyleSheet" href="../css/add_test.css" />
	<link rel="StyleSheet" href="../css/side_menu_leaderboard.css" />
	<script type="text/javascript" src="../js/question.js"></script>
	<script type="text/javascript" src="../js/add_test.js"></script>
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
				<a href="#" id = "visited">Add own test</a>
			</li>
			<li>
				<a href ='#'>About author</a>
			</li>
		</ol>
	</div>
	
	<section class = "section">
		<div id ="welcome_div">
			<h4>Add your own test</h4>
			<div id = "add_test_container">
				<p>Fill following information and create your own test. All required information are marked with the '*'.</p>
				<br>
				<form>
				  <span class="questionTitle">Test name*:</span><br>
				  <input class = "testGeneralInformation" id = "testName" type ="text" name ="test_name"><br><br>
				  <span class="questionTitle">Test type*:</span><br>
				  <input type ="radio" name ="testTypeChoose" value = "quiz">Quiz
				  <input type ="radio" name ="testTypeChoose" value ="test"> Test				  
				</form><br>
				<div id = "question_container">
					<div class = 'new_question_div'>
						<form class = "newQuestion" id = '1'>
						<span class="questionTitle">1. Question:</span><br><br>
						Add your question*:<br>
						<input class = "testGeneralInformation" type = "text" name = "question"><br><br>
						Choose amount of answears*:
						<select id = "selectAnswears1" name="answears_amount"  onchange="addAnswears(this)">
							  <option selected hidden = "true" value ="2">2</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
						</select>
						<div id = "question_answears_container_1"></div><br>
						<table>
							<tr>
								<td>
									<input class = "nextQuestionAdd" id = '1' type = "button" value = "Add new question" onclick = "addNewQuestion(this)">
								</td>
								<td>
									<input id = "testSubmit" type = "button" onclick = "submit()" value = "Submit">
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
							
	</section>
	<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
	</div>
</div>


<script type="text/template" id="questionTemplate">
    <br>
	<div class = 'new_question_div'>
		<form class = "newQuestion" id = "{{id}}">
		<span class="questionTitle">{{id}} . Question:</span><br><br>
		Add your question*:<br>
		<input class = "testGeneralInformation" type = "text" name = "question"><br><br>
			Choose amount of answears*:
			<select id = 'selectAnswears{{id}}' name="answears_amount" onchange="addAnswears(this)">
				  <option selected hidden = "true" value ="2">2</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
			</select>
			<div id = "question_answears_container_{{id}}"></div><br>
				<input class = "nextQuestionAdd" id = "{{id}}" type = "button" value = "Add new question" onclick = "addNewQuestion(this)">
				<input id = "testSubmit" type = "button" onclick = "submit()" value = "Submit">
		</form>
	</div>
</script>


<script type="text/template" id="questionAnswearsTemplate">
    <br>
	<table>
		<tr>
			<td class = 'questionAnswear{{id}}' id = 'answear{{id}}A' hidden = true><span class="questionTitle">A</span><br/><input class = "question_answear_input" type = "text" name = "answear{{id}}A"></td>
			<td class = 'questionAnswear{{id}}' id = 'answear{{id}}B' hidden = true><span class="questionTitle">B</span><br/><input class = "question_answear_input" type = "text" name = "answear{{id}}B"></td>
			<td class = 'questionAnswear{{id}}' id = 'answear{{id}}C' hidden = true><span class="questionTitle">C</span><br/><input class = "question_answear_input" type = "text" name = "answear{{id}}C"></td>
			<td class = 'questionAnswear{{id}}' id = 'answear{{id}}D' hidden = true><span class="questionTitle">D</span><br/><input class = "question_answear_input" type = "text" name = "answear{{id}}D"></td>
		</tr>
	</table>
</script>


</body>
</html>


<?php 
	$answearAmount = 2;
	
	function setAnswearAmount($value){
		$answearAmount = $value;
	}
?>
