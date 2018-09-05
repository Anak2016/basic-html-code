<?php
require_once './db_connect.php';
require_once './functions.php';


if (isset($_POST['function'])) {
  $response = null;
  if (isset($_POST['name'])) {

    switch ($_POST['function']) {
      case 'searchBabyName':
        $response = searchBabyName($db, $_POST['name']);
        break;
    }
  } else {
    switch ($_POST['function']) {
      case 'goThroughFile':
        $csvFile = __DIR__ . '/txt/yob2014.txt';
        $csv = readCSV($csvFile);
        foreach ($csv as $index => $babyname) {
          addBabyName($db, $babyname[0], $babyname[1], $babyname[2]);
        }
        break;
      case 'getTop10Boys':
        $response = getTop10Boys($db);
        break;
      case 'getTop10Girls':
        $response = getTop10Girls($db);
        break;
      case 'seedBabyNamesTable':
        $response = seedBabyNamesTable($db);
        break;

      case 'createBabyTable':
        $response = createBabyTable($db);
        break;

      case 'deleteBabyTable':
        $response = deleteBabyTable($db);
        break;

      default:
        # code...
        break;
    }
  }
  echo json_encode($response);
}
?>