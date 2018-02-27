<html>

<head>
  <title>Fruit</title>
<head>

<body>

  <p>

    <?php
    // Store the get parameters in variables for convenience
    $letter = strtoupper($_GET['letter']);
    $number = $_GET['number'];
    $size = $number;
    if ($size > 100) {
      $size = $size / 10;
    }
    // Do what's in the {}, $number times
    $counter = 1;
    while ($counter <= $number) {
      echo "<img src='images/$letter.jpg' width=$size> ";
      $counter++;
    }
    ?>

  </p>

</body>

</html>
