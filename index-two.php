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

    $size = $number;
    if ($size > 100) {
      $size = $size /10;
    }

		while ($counter <= $number) {
      echo "<img style='transform: skew($skewX);' src='$letter.png' ";
			$counter++;
			$rotation++;
		}

	?>

	</script>
</body>
</html>
