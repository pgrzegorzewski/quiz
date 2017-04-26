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
	<script type="text/javascript" src="../js/questionnaire.js"></script>
	<script type="text/javascript" src="../js/question.js"></script>

</head>

<body>

<div class="container-fluid">
	<header class ="header">
		<h1 id="title"><a href ="index.php"><b>Q</b>u¿zzy</a></h1>
	</header>

		<div class="nav">
			<ol>
				<li>
					<a href ='#'>Quizes</a>
				</li>
				<li>
					<a href ='#'>Tests</a>
					<ul>
						<li><a href="#">Personality</a></li>
						<li><a href="#">Cultural</a></li>
						<li><a href="#">Science</a></li>
						<li><a href="#">Entertaining</a></li>
					</ul>
				</li>
				<li>
					<a href ='#'>Add own test</a>
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
					
					
						$servername = "localhost";
						$username = "pawelg";
						$password = "aaa";
						$dbname = "questions";
						
						$conn;
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						if($conn -> connect_error){
							die("Connection failed".$conn -> connect_error);	
						}
	
						$sqlQuestion = "SELECT 
  											q.question_id,
  											q.question_text, 
											qa.is_true,
  											qa.answear_text, 
  											qa.question_answear_order, 
  											qa.question_answear_label 
  										FROM 
  											questions.tbl_question q
										INNER JOIN (
								
														SELECT COALESCE(t.question_id, 1) AS question_id FROM questions.tbl_question t
														LEFT JOIN	
														(
										    				SELECT question_id FROM questions.tbl_question
															WHERE question_id NOT IN (SELECT " .implode(' UNION SELECT ', $_SESSION["used_question_ids"]). ") 
														)xx
														ON xx.question_id = t.question_id
										    			ORDER BY RAND()
										    			LIMIT 1
										    		)x
										ON x.question_id = q.question_id
										INNER JOIN questions.tbl_question_answear qa			ON				qa.question_id = x.question_id
										WHERE qa.question_id = q.question_id
										";
						
						$result = $conn -> query($sqlQuestion);
						
						$row = $result -> fetch_assoc();
						if($row["question_text"])
						{
							//array_push($_SESSION["used_question_ids"], $row["question_id"]);
							$_SESSION["used_question_ids"][] =  $row["question_id"];
							echo "<table class =\"table\" id =\"question\" align = center >
										<tr>
											<th>Question</th>
										</tr>";
							echo "<tr>
									<td>".$row["question_text"]."</td>
								  </tr>
								  </table>";
						}
						
						$result->data_seek(0);
						if($result -> num_rows > 0){
							echo "<table id = \"question\" align = center >
									<tr>";
							while ($row = $result -> fetch_assoc()){
								echo "<th><button type=\"button\" class=\"btn btn-info\" id =\" ".$row["is_true"]. "\"onclick =\"checkAnswear(this)\" >".$row["question_answear_label"]."</button></th>";
							}
							echo"</tr><tr>"	;
							$result->data_seek(0);
							while ($row = $result -> fetch_assoc()){
								echo "<td>".$row["answear_text"]."</td>";
							}
							echo "</tr></table>";
						}
						else{
							echo "sth went wrong:(";
						}
						
						$conn -> close();
						
						
					?>
				</div>
				<div class="col-sm-6">
					<div class = "row">
						<div class = "col-sm-16 answear_header"></div>
					</div>
					<div class = "row">
						<div class = "col-sm-1 "></div>
						<div class = "col-sm-2 answear_img"><p id = "answear_img"></p></div>
						<div class ="col-sm-4 answear"><p id = "answear"></p></div>
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

