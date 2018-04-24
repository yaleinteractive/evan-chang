<html>
<head>
  <title>Micro Economy</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <div class=step-one>
    <h2>Add a Request</h2>
    <form method="post">
      <select name="name">
        <option value="" selected>Name</option>
        <option value="Kyla">Kyla</option>
        <option value="Maria">Maria</option>
        <option value="Jinwoo">Jinwoo</option>
        <option value="Zhiyan">Zhiyan</option>
        <option value="Kang">Kang</option>
        <option value="Steven">Steven</option>
        <option value="Wenwen">Wenwen</option>
        <option value="Tania">Tania</option>
        <option value="Micah">Micah</option>
        <option value="Severin">Severin</option>
        <option value="Evan">Evan</option>
        <option value="Hyung">Hyung</option>
        <option value="DhoYee">DhoYee</option>
        <option value="Simone">Simone</option>
        <option value="Rosa">Rosa</option>
        <option value="Emma">Emma</option>
        <option value="Willis">Willis</option>
        <option value="David">David</option>
        <option value="Kai">Kai</option>
        <option value="Zack">Zack</option>
        <option value="Haeok">Haeok</option>
        <option value="Soomin">Soomin</option>
        <option value="Hua">Hua</option>
        <option value="Liyan">Liyan</option>
        <option value="Nilas">Nilas</option>
        <option value="Guillaume">Guillaume</option>
        <option value="Ingrid">Ingrid</option>
        <option value="Hicham">Hicham</option>
        <option value="Muxi">Muxi</option>
        <option value="Pianpian">Pianpian</option>
        <option value="Jo">Jo</option>
        <option value="Nate">Nate</option>
        <option value="Yo-E">Yo-E</option>
        <option value="Hrefna">Hrefna</option>
        <option value="Youngeun">Youngeun</option>
        <option value="Katelyn">Katelyn</option>
        <option value="Dustin">Dustin</option>
        <option value="Bryce">Bryce</option>
        <option value="Matthew">Matthew</option>
        <option value="Christine">Christine</option>
        <option value="Ziwei">Ziwei</option>
      </select><br>
      <label>I have
        <select name="haves">
          <option value="time">time</option>
          <option value="labor">labor</option>
          <option value="gear">gear</option>
          <option value="ideas">ideas</option>
          <option value="paper">paper</option>
          <option value="fonts">fonts</option>
          <option value="talent">talent</option>
          <option value="sweets">sweets</option>
          <option value="bread">bread</option>
          <option value="advice">advice</option>
          <option value="transportation">transportation</option>
          <option value="moral support">moral support</option>
          <option value="caffeine">caffeine</option>
        </select>
      </label><br>
      <textarea name="havesdescription" placeholder="Description" cols="30" rows="5"></textarea></label><br>
      <label>I need
        <select name="needs">
          <option value="time">time</option>
          <option value="labor">labor</option>
          <option value="gear">gear</option>
          <option value="ideas">ideas</option>
          <option value="paper">paper</option>
          <option value="fonts">fonts</option>
          <option value="talent">talent</option>
          <option value="sweets">sweets</option>
          <option value="bread">bread</option>
          <option value="advice">advice</option>
          <option value="transportation">transportation</option>
          <option value="moral support">moral support</option>
          <option value="caffeine">caffeine</option>
        </select>
      </label><br>
      <textarea name="needsdescription" placeholder="Description" cols="30" rows="5"></textarea></label><br>
      <!-- <textarea name="needsdescription"></textarea></label><br> -->
      <input type="submit" value="Add → ">
  </form>
  </div>

<div class="entries">
    <ol class="inquiry">
        <?php

  include "connect.php";

  include "insert.php";

  $sql = "SELECT * FROM request";
  $result = $conn->query($sql);

  $haves = array();
  $needs = array();
  $pairs = array();
  $inverses = array();

  echo "<h2>Requests</h2>";

  if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {

          $h = $row['haves'];
          $n = $row['needs'];
          $id = $row['id'];

          if (!isset($haves[$h])) $haves[$h] = 0;
          $haves[$h] += 1;

          if (!isset($needs[$n])) $needs[$n] = 0;
          $needs[$n] += 1;

          $hn = $h . "_" . $n;
          if (!isset($pairs[$hn])) $pairs[$hn] = array();
          array_push($pairs[$hn], $id);

          echo "<li class='record_$id'>";
          echo "{$row['name']} has ";
          echo "<div class='tooltip'> $h
                  <span class='tooltiptext'>{$row['havesdescription']}</span>
                </div>";
          echo " but needs ";
          echo "<div class='tooltip'> $n
                  <span class='tooltiptext'>{$row['needsdescription']}</span>
                </div>";
          echo "</li>";

      }

  } else {
      echo "No requests";
  }

  $keys = array_keys($pairs);
  foreach ($keys as $hn) {
    $pair = explode('_', $hn);
    $h = $pair[0];
    $n = $pair[1];
    $nh = $n . "_" . $h;
    if (isset($pairs[$nh])) {
      $inverses[$hn] = $pairs[$nh];
    }
  }

  $colors = array('#9DFFE8', '#fe0000', '#fdfe02', '#0bff01', '#fe00f6', '#00ff00', '#5A1FFF');

  echo "<style>";
    $inverse_keys = array_keys($inverses);
    $i = 0;
    // Go through each match
    foreach ($inverse_keys as $hn) {
      $color = $colors[$i];
      // All the pairs and all the inverses should get this color
      foreach ($pairs[$hn] as $id) {
        echo ".record_$id { color: $color; } ";
      }
      foreach ($inverses[$hn] as $id) {
        echo ".record_$id { color: $color; } ";
      }
      $i += 1;
    }
  echo "</style>";

  // echo "<div class='tally'>";
  // echo "<h2>Supply</h2>";
  // echo "<div class='most-haves'>";
  // // Loop through colors array
  // foreach($haves as $key => $value) {
  //   echo "$value $key" . "<br>";
  // }
  // echo "</div>";
  // echo "<h2>Demand</h2>";
  // echo "<div class='most-needs'>";
  // foreach($needs as $key => $value) {
  //   echo "$value $key" . "<br>";
  // }
  // echo "</div>";
  // echo "</div>";
  // echo "<h3>Pairs (key is have_need and values are corresponding record ID's)</h3>";
  // echo "<pre>";
  // print_r($pairs);
  // echo "</pre>";
  // echo "<h3>Inverses (key is have_need and values are the record ID's of the inverse matches for that have_need)</h3>";
  // echo "<pre>";
  // print_r($inverses);
  // echo "</pre>";
 // Close the databse connection
  echo "</ol>";

  echo "<div class='tally'>";
  echo "<h3>Supply</h3>";
  echo "<div class='most-haves'>";
  // Loop through colors array
  foreach($haves as $key => $value) {
    echo "$key — $value" . "<br>";
  }
  echo "</div>";
  echo "<h3>Demand</h3>";
  echo "<div class='most-needs'>";
  foreach($needs as $key => $value) {
    echo "$key — $value" . "<br>";
  }
  echo "</div>";
  echo "</div>";

  $conn->close();


  ?>
  <!-- </ol> -->

</div>



</body>
