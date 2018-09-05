<?php
echo 'setup...<br>';

function createBabyTable($db) {
  /* Create table doesn't return a resultset */
$create_query = <<< EOT
  create table if not exists babynames (
    id int(11) not null auto_increment,
    name varchar(20) not null,
    gender varchar(1) not null,
    votes int(11) default null,
    primary key (id)
  )
EOT;

  // Perform queries 
  $exist = mysqli_query($db, $create_query);
  echo print_r($exist);
}


function readCSV($csvFile){
  $file_handle = fopen($csvFile, 'r');
  while (!feof($file_handle) ) {
      $line_of_text[] = fgetcsv($file_handle, 1024);
  }
  fclose($file_handle);
  return $line_of_text;
}


function addBabyName($db, $name, $gender, $votes) {
  $insert_query = <<<SHIT
  insert into babynames (id, name, gender, votes) 
  values(null, '$name', '$gender', $votes)
SHIT;

  $inserted = mysqli_query($db, $insert_query);
}


createBabyTable($db);

$csvFile = __DIR__ . '/txt/yob2014.txt';
$csv = readCSV($csvFile);
foreach ($csv as $index => $babyname) {
  addBabyName($db, $babyname[0], $babyname[1], $babyname[2]);
}
echo 'complete!<br>';

?>