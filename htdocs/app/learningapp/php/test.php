<!DOCTYPE HTML>
<html>

<head>
	<meta charset = "utf-8"/>
</head>
<body>

	<?php
		$ponczal = $_POST['ponczal'];
		$babeczka = $_POST['babeczka'];
		$suma = 2 * $ponczal + 3 * $babeczka;
		
echo<<<END
		
		 "Podsumowanie"
		 <table border="1" cellpadding = "10" cellspacing = "0">
		 	<tr>
		 		<td>
		 				Ponczale(2zl/szt)
		 		</td>
		 		<td>
		 				$ponczal
		 		</td>
		 	</tr>
		 	<tr>
		 		<td>
		 				Babeczki(3zl/szt):
		 		</td>
		 		<td>
		 				$babeczka
		 		</td>
		 	</tr>
		 	<tr>
		 		<td>
		 				Suma piniendzy
		 		</td>
		 		<td>
		 				$suma
		 		</td>
		 	</tr>
		 </table>
		
		 <br /><a href = "../app/login.php">Powrot</a>
END;
	?>

</body>


</html>