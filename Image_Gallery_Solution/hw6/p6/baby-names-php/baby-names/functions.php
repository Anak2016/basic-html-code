<?php

function readCSV($csvFile){
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle) ) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);
    return $line_of_text;
}

function getTop10Boys($db){
  $query = <<<SHIT
  select * from babynames
  where gender='m'
  order by votes desc
  limit 10
SHIT;

  $query_results = mysqli_query($db, $query);
  $response = array();
  if ($query_results->num_rows > 0) {
    while($row = $query_results->fetch_assoc()) {
        $response[] = $row;
    }
  }
  return $response;
}


function getTop10Girls($db){
  $query = <<<SHIT
  select * from babynames
  where gender='f'
  order by votes desc
  limit 10
SHIT;

  $query_results = mysqli_query($db, $query);
  $response = array();
  if ($query_results->num_rows > 0) {
    while($row = $query_results->fetch_assoc()) {
        $response[] = $row;
    }
  }
  return $response;
}

function searchBabyNames($name) {
  echo $name. " does not exist, motherfucker"; 
}

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

function deleteBabyTable($db) {
  /* Create table doesn't return a resultset */
  $drop_query = 'drop table if exists babynames';

  // Perform queries 
  $drop = mysqli_query($db, $drop_query);
  echo print_r($drop);
}

function addBabyName($db, $name, $gender, $votes) {
  $insert_query = <<<SHIT
  insert into babynames (id, name, gender, votes) 
  values(null, '$name', '$gender', $votes)
SHIT;

  $inserted = mysqli_query($db, $insert_query);
}


function seedBabyNamesTable($db) {
  $insert_queries = array(
    "insert into babynames (id, name, gender, votes) values(null, 'shit', 'm', 1)",
    "insert into babynames (id, name, gender, votes) values(null, 'piss', 'm', 2)",
    "insert into babynames (id, name, gender, votes) values(null, 'cock', 'm', 3)",
    "insert into babynames (id, name, gender, votes) values(null, 'bitch', 'f', 1)",
    "insert into babynames (id, name, gender, votes) values(null, 'tits', 'f', 2)",  
    "insert into babynames (id, name, gender, votes) values(null, 'coochy', 'F', 3)"
  );
    
  foreach ($insert_queries as $query) {
    $query_results = mysqli_query($db, $query);
    echo print_r($query_results) . '<br>';
  }
}

function searchBabyName($db, $name) {
  $search_query = "select * from babynames where name like '%$name%'";
  $query_results = mysqli_query($db, $search_query);

  $response = array();
  if ($query_results->num_rows > 0) {
    // output data of each row
    while($row = $query_results->fetch_assoc()) {
        $response[] = $row;
    }
  }
  return $response;
}

?>