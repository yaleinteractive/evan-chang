
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
  </head>

<body>

  <?php
    $letter = $_GET[letter];
    $number = $_GET[number];
    $counter = 1;
  ?>

  <p> Hello
      <?php
        echo $letter . ".You are the " . $number . " winner";
        while ($counter < $number) {
          echo " ! ";
          $counter ++;
        }
      ?>
      Congrats!
  </p>

</body>

</html>
