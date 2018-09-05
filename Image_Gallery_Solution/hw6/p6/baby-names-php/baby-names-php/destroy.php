<?php
echo 'destroying...<br>';

function deleteBabyTable($db) {
  /* Create table doesn't return a resultset */
  $drop_query = 'drop table if exists babynames';

  // Perform queries 
  $drop = mysqli_query($db, $drop_query);
  echo print_r($drop);
}

deleteBabyTable($db);
echo 'destroyed!<br>';
?>