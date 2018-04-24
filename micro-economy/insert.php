<?php

if (isset($_REQUEST['name']) && isset($_REQUEST['haves']) && isset($_REQUEST['needs'])) {

  $name = $_REQUEST['name'];
  $haves = $_REQUEST['haves'];
  $needs = $_REQUEST['needs'];
  $havesdescription = $_REQUEST['havesdescription'];
  $needsdescription = $_REQUEST['needsdescription'];

  // If a title and a date were specified, insert a new event
  // into the database
  // if ($name && $haves && $needs) {
    // Construct SQL to insert a new row
    $sql = "INSERT INTO request (name, haves, needs, havesdescription, needsdescription) VALUES('$name', '$haves', '$needs', '$havesdescription', '$needsdescription')";

    // Run the SQL
    $result = $conn->query($sql);

    echo "<h2>Request Added</h2>";

  }
