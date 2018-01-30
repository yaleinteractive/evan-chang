Greetings!

<?php

$letter = $_GET['letter'];
$number = $_GET['number'];

$counter = 1;
while ($counter <= $number) {
  echo "$letter ";
  $counter++;
  system(escapeshellcmd("say $letter"));
  flush();
}

?>

Goodbye.

