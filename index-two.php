<html>
<head>
<title>Bat</title>
</head>
<body>



	<?php
		$letter = strtoupper($_GET['letter']);
		$number = $_GET['number'];
		$skewX = $number . "deg";
		$counter = 1;
    $test = "D";
		echo $_POST["letter"];
		while ($counter <= $number) {
      echo "<img style='transform: skew($skewX);' src='$letter.jpg'> ";
			$counter++;
			// $rotation = $rotation + 20;
			$rotation++;
			// $size++;
		}
	 ?>

	</script>
</body>
</html>
