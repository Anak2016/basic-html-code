<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="">
  <meta name="author" content="http://www.amitpatil.me">
  <meta name="keywords" content="">
  <meta name="description" content="">
  
  <script src="jquery-1.8.3.min.js"></script>
  <script src="script.js"></script>

  <title>SQL and PHP Table</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
  body {
    padding-top: 70px;
    /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
  }
</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>

    <body>

      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project 6</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li>
                <a href="#">About</a>
              </li>
              <li>
                <a href="#">Services</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>

      <!-- Page Content -->
      <div class="container">

       <?php
       require_once './php/db_connect.php';
       ?>

       <html lang="en">
       <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DB Table Test</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
      </head>
      <body>
        <div class="container">
          <div class="page-header">
            <h1>Milestone 1</h1>
          </div>

          <?php
          // Create table with two columns: id and value
          $createStmt = 'CREATE TABLE `TEST` (' . PHP_EOL
          . '  `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
          . '  `value` varchar(50) DEFAULT NULL,' . PHP_EOL
          . '  PRIMARY KEY (`id`)' . PHP_EOL
          . ') ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
          ?>
          <div id="step-one" class="well">
            <h3>Step One <small>Creating the table</small></h3>
            <pre><?php echo $createStmt; ?></pre>
            <?php
            if($db->query($createStmt)) {
            echo '        <div class="alert alert-success">Table creation successful.</div>' . PHP_EOL;
          } else {
          echo '        <div class="alert alert-danger">Table creation failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
          exit(); // Prevents the rest of the file from running
        }
        ?>
      </div>

      <?php
      // Add two rows to the table
      $insertStmt = 'INSERT INTO `TEST` (`id`, `value`)' . PHP_EOL
      . '  VALUES (NULL, \'Test 1\'),' . PHP_EOL
      . '   (NULL, \'Lorem Ipsum\');';
      ?>
      <div id="step-two" class="well">
        <h3>Step Two <small>Inserting into the table</small></h3>
        <pre><?php echo $insertStmt; ?></pre>
        <?php
        if($db->query($insertStmt)) {
        echo '        <div class="alert alert-success">Values inserted successfully.</div>' . PHP_EOL;
      } else {
      echo '        <div class="alert alert-danger">Value insertion failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
      exit();
    }
    ?>
  </div>

  <?php
  // Get the rows from the table
  $selectStmt = 'SELECT * FROM `TEST`;';
  ?>
  <div id="step-three" class="well">
    <h3>Step Three <small>Retrieving the rows</small></h3>
    <pre><?php echo $selectStmt; ?></pre>
    <?php
    $result = $db->query($selectStmt);
    if($result->num_rows > 0) {
    echo '        <div class="alert alert-success">' . PHP_EOL;
      while($row = $result->fetch_assoc()) {
      echo '          <p>id: ' . $row["id"] . ' - value: ' . $row["value"] . '</p>' . PHP_EOL;
    }
  echo '        </div>' . PHP_EOL;
} else {
echo '        <div class="alert alert-success">No Results</div>' . PHP_EOL;
}
?>
</div>

<?php
// Drop the TEST table now that we're done with it
$dropStmt = 'DROP TABLE `TEST`;';
?>
<div id="step-four" class="well">
  <h3>Step Four <small>Dropping the table</small></h3>
  <pre><?php echo $dropStmt; ?></pre>
  <?php
  if($db->query($dropStmt)) {
  echo '        <div class="alert alert-success">Table drop successful.</div>' . PHP_EOL;
} else {
echo '        <div class="alert alert-danger">Table drop failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
exit();
}
?>
</div>

<h1>Milestone 2</h1>		

<form action="index.php" method="post">
  Name:<input type="text" name="name" placeholder="SR"><br>
  <input type="radio" name="sex" value="M"/>Male <br>
  <input type="radio" name="sex" value="F"/>Female <br>
  <input type="submit" name="submit"/></form>

  <table><tr><th>ID</th> <th>Name</th> <th>Gender</th> <th>Count</th></tr><tr><td>1</td><td>Emma</td><td>F</td><td>20799
  </td></tr><tr><td>2</td><td>Olivia</td><td>F</td><td>19674
  </td></tr><tr><td>3</td><td>Sophia</td><td>F</td><td>18490
  </td></tr><tr><td>4</td><td>Isabella</td><td>F</td><td>16950
  </td></tr><tr><td>5</td><td>Ava</td><td>F</td><td>15586
  </td></tr><tr><td>6</td><td>Mia</td><td>F</td><td>13442
  </td></tr><tr><td>7</td><td>Emily</td><td>F</td><td>12562
  </td></tr><tr><td>8</td><td>Abigail</td><td>F</td><td>11985
  </td></tr><tr><td>9</td><td>Madison</td><td>F</td><td>10247
  </td></tr><tr><td>10</td><td>Charlotte</td><td>F</td><td>10048</td></tr></table><div><table><tr><th>ID</th> <th>Name</th> <th>Gender</th> <th>Count</th></tr><tr><td>1</td><td>Noah</td><td>M</td><td>19144
  </td></tr><tr><td>2</td><td>Liam</td><td>M</td><td>18342
  </td></tr><tr><td>3</td><td>Mason</td><td>M</td><td>17092
  </td></tr><tr><td>4</td><td>Jacob</td><td>M</td><td>16712
  </td></tr><tr><td>5</td><td>William</td><td>M</td><td>16687
  </td></tr><tr><td>6</td><td>Ethan</td><td>M</td><td>15619
  </td></tr><tr><td>7</td><td>Michael</td><td>M</td><td>15323
  </td></tr><tr><td>8</td><td>Alexander</td><td>M</td><td>15293
  </td></tr><tr><td>9</td><td>James</td><td>M</td><td>14301
  </td></tr><tr><td>10</td><td>Daniel</td><td>M</td><td>13829</td></tr></table></div><div><table><tr><th>ID</th> <th>Name</th> <th>Gender</th> <th>Votes</th></tr><tr><td>1</td><td>Kim</td><td>F</td><td>1</td></tr><tr><td>2</td><td>Kim</td><td>F</td><td>1</td></tr><tr><td>3</td><td>Kim</td><td>F</td><td>1</td></tr><tr><td>4</td><td>test</td><td>M</td><td>1</td></tr><tr><td>5</td><td>Sergio</td><td>M</td><td>1</td></tr><tr><td>6</td><td>Sergio </td><td>M</td><td>1</td></tr><tr><td>7</td><td>Sergio </td><td>M</td><td>1</td></tr><tr><td>8</td><td>ana</td><td>F</td><td>1</td></tr><tr><td>9</td><td>ana</td><td>F</td><td>1</td></tr><tr><td>10</td><td>dasfsdgf</td><td>M</td><td>1</td></tr><tr><td>11</td><td>dasfsdgf	</td><td>M</td><td>1</td></tr><tr><td>12</td><td>dafw</td><td>M</td><td>1</td></tr><tr><td>13</td><td>awfafwaf</td><td>M</td><td>1</td></tr></table></div>


  <h1>Milestone 3</h1>

  <div class="container">
    <div class="poll">Loading...</div><br>
    <div class="sub">
     <a href="#" class="button">Submit</a>
     <div class="next"><a href="javascript:;" onClick="javascript:get_poll();">Next Question</a></div>
   </div>	
 </div>

 <h1>Milestone 4</h1>

 <script>
  function getVote(int) {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>

<div id="poll">
  <h3>Boy or Girl?</h3>
  <form>
    Boy:
    <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
    <br>Girl:
    <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
  </form>
</div>


</div>
</body>
</html>


</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>