<?php 
  require_once 'db_connect.php';
  require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="row">
      <h1>Baby names</h1>

    </div>

    <div class="row">
      <div class="col">
        <div>
          <h1>boys</h1>
          <ol id="boys-names">
          <?php
          $boys_names = getTop10Boys($db);
          foreach ($boys_names as $index => $babyname) {
            $name = $babyname['name'];
            $votes = $babyname['votes'];

            echo "<li>Name: $name<br>Votes: $votes</li>";
          }
          ?>
          </ol>
        </div>
      </div>
      <div class="col">
          <div>
            <h1>girls</h1>
            <ol id="girls-names">
            <?php
            $girls_names = getTop10Girls($db);
            foreach ($girls_names as $index => $babyname) {
              $name = $babyname['name'];
              $votes = $babyname['votes'];

              echo "<li>Name: $name<br>Votes: $votes</li>";
            }
            ?>  
            </ol>
          </div>
        </div>
    </div>

    <div class="row">
      <h1>VOTE</h1>
      <form action="./index.php" method="POST">
        <input type="text" name="vote-name" id="" placeholder="Create new name">
        <input type="submit" value="VOTE">
      </form>

      <?php
      if (isset($_POST['vote-name'])) {
        $name = $_POST['vote-name'];
        vote4Pedro($db, $name);
      }
      ?>
    </div>

    <div class="row">
      <div class="col">
        <div class="row">
            <h1>SEARCH</h1>
            <form action="./index.php" method="POST">
              <input type="text" name="search-input" id="search-id" placeholder="Search for names to vote">
              <input type="submit" value="SEARCH">
            </form>
  
        </div>
          <div class="row" >
              <h1>SEARCH RESULTS</h1>
              <ol id="searched-names">
              <?php
              if (isset($_POST['search-input'])) {
                $name = $_POST['search-input'];
                $names = searchBabyName($db, $name);
                foreach ($names as $index => $babyname) {
                  $name = $babyname['name'];
                  $votes = $babyname['votes'];
      
                  echo "<li>Name: $name<br>Votes: $votes</li>";
                }
              }
              ?>
              </ol>
          </div>
      </div>

    </div>

    <div class="row">
      <button id="create-table">Create Table</button>
      <button id="seed-file">Read and Seed from File</button>
      <button id="seed-dumb">Seed Dummy Table</button>
      <button id="delete-table">Delete Table</button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>
</html>