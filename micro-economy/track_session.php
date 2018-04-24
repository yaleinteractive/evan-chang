<?php

  if ($visited_before) {

    // If we the browser sent us back our visited_before cookie, welcome the user back
    echo "<h2>Welcome back</h2>";

  }

  else {

    // If not, we already told the browser to create the cookie at the top
    // of index.php. Now store the new session in the database.
    echo "<h2>Welcome new user</h2>";

    $sql = "INSERT INTO sessions (first_visit) VALUES(NOW())";
    $result = $conn->query($sql);

  }


?>
