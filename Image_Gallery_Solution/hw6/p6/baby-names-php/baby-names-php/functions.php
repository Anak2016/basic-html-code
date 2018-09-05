<?php

function vote4Pedro($db, $name){
  $query = <<<SHIT
  update babynames
  set votes=votes+votes
  where name='$name'
SHIT;

  $query_results = mysqli_query($db, $query);
  return $query_results;
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