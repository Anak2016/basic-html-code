

<?php
require_once './php/db_connect.php'; //Connects to the lamp server.
?>

<?php
//A 2D array to store the top SSA babynames from the dataabse.
$top_boy_name_ssa = array(
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"));
$top_girl_name_ssa = array(
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"),
    array("N/A N", "N/A C"));

//Stores a value that tells rather the table exists in the database.
$boy_ssa_table_exist = mysqli_query($db, 'select 1 from `SSA_BOY_BABYNAMES` LIMIT 1');
$girl_ssa_table_exist = mysqli_query($db, 'select 1 from `SSA_GIRL_BABYNAMES` LIMIT 1');

//$name_file = fopen("txt/nameEx.txt", "r") or die("ERROR: File not found!!!"); //Opens file.

if($boy_ssa_table_exist == FALSE)
{
    $boy_ssa_table = "CREATE TABLE `SSA_BOY_BABYNAMES` (" . PHP_EOL
        . "id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY," . PHP_EOL
        . "name VARCHAR(128)," . PHP_EOL
        . "sex VARCHAR(128)," . PHP_EOL
        . "num INT(16)" . PHP_EOL
        . ");";
    $db->query($boy_ssa_table);
    echo '        <div class="alert alert-success">SSA_BOY_BABYNAMES Table has been created.</div>' . PHP_EOL;     
    
    $name_file = fopen("txt/yob2014.txt", "r") or die("ERROR: File not found!!!"); //Opens file.

    //Goes through the entire list of names and stores each name to a table.
    echo "Entering file names. ";
    
    $id = 0;
    $top_boy_name_ssa = array(
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"));
    
    while(!feof($name_file))
    { 
        $line_info = fgets($name_file);

        $name_info = explode(',', $line_info);    


        if($name_info[1] == "M")
        {
            $name_insert = "INSERT INTO `SSA_BOY_BABYNAMES` (`id`, `name`, `sex`, `num`)". PHP_EOL 
                ." VALUES (NULL, '$name_info[0]','$name_info[1]', '$name_info[2]');";

            $db->query($name_insert);  
            
            if($id <= 4)
            {
                $top_boy_name_ssa[$id][0] = $name_info[0];
                $top_boy_name_ssa[$id][1] = $name_info[2];                  
            }          
            $id++;
        }  
    }
    fclose($name_file); //Closes file
}
else
{
    $select_SSA_table = 'SELECT * FROM `SSA_BOY_BABYNAMES`;'; //Retrieves the boy site's table.
    $result = $db->query($select_SSA_table); //Executes SQL code and stores it in a variable.
    if($result->num_rows > 0) //Checks if SITE_BABYNAMES_BOY is empty.
    {
        $id = 0; //Used to help move through the 2D array.
        while($id <= 4) //Goes through the database's table five time to retrieve the database's row and store the needed values in the 2D
        {
            $row = $result->fetch_assoc();
            $top_boy_name_ssa[$id][0] = $row["name"];
            $top_boy_name_ssa[$id][1] = $row["num"];
            $id++;
        }
    }        
}

if($girl_ssa_table_exist == FALSE)
{
    $girl_ssa_table = "CREATE TABLE `SSA_GIRL_BABYNAMES` (" . PHP_EOL
        . "id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY," . PHP_EOL
        . "name VARCHAR(128)," . PHP_EOL
        . "sex VARCHAR(128)," . PHP_EOL
        . "num INT(16)" . PHP_EOL
        . ");";
    $db->query($girl_ssa_table);
    echo '        <div class="alert alert-success">SSA_GIRL_BABYNAMES Table has been created.</div>' . PHP_EOL; 
    
    $name_file = fopen("txt/yob2014.txt", "r") or die("ERROR: File not found!!!"); //Opens file.
    
    $id = 0;
    $top_girl_name_ssa = array(
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"),
        array("N/A N", "N/A C"));        
    
    while(!feof($name_file))
    {
        $line_info = fgets($name_file);

        $name_info = explode(',', $line_info);    


        if($name_info[1] == "F")
        {
            $name_insert = "INSERT INTO `SSA_GIRL_BABYNAMES` (`id`, `name`, `sex`, `num`)". PHP_EOL 
                ." VALUES (NULL, '$name_info[0]','$name_info[1]', '$name_info[2]');";

            $db->query($name_insert);  
            
            if($id <= 4)
            {
                $top_girl_name_ssa[$id][0] = $name_info[0];
                $top_girl_name_ssa[$id][1] = $name_info[2];                  
            }          
            $id++;
        }  
    }
    fclose($name_file); //Closes file
}
else
{   
    $select_SSA_table = 'SELECT * FROM `SSA_GIRL_BABYNAMES`;'; //Retrieves the boy site's table.
    $result = $db->query($select_SSA_table); //Executes SQL code and stores it in a variable.
    if($result->num_rows > 0) //Checks if SITE_BABYNAMES_BOY is empty.
    {
        $id = 0; //Used to help move through the 2D array.
        while($id <= 4) //Goes through the database's table five time to retrieve the database's row and store the needed values in the 2D
        {
            $row = $result->fetch_assoc();
            $top_girl_name_ssa[$id][0] = $row["name"];
            $top_girl_name_ssa[$id][1] = $row["num"];
            $id++;
        }
    }    
}    

//fclose($name_file); //Closes file

?>


<!--- ^ Milestone 2 PHP^ ---- v Milestone 3 PHP v ----------------------------------------------------->


<?php
//Create's the boy form table for the database.
$boy_table_site = "CREATE TABLE `SITE_BABYNAMES_BOY` (" . PHP_EOL
    . "`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY," . PHP_EOL
    . "`name` VARCHAR(128)," . PHP_EOL
    . "`sex` VARCHAR(128)," . PHP_EOL
    . "`num` INT(16)" . PHP_EOL
    . ");"; 
$db->query($boy_table_site);

//Create's the girl form table for the database.
$girl_table_site = "CREATE TABLE `SITE_BABYNAMES_GIRL` (" . PHP_EOL
    . "`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY," . PHP_EOL
    . "`name` VARCHAR(128)," . PHP_EOL
    . "`sex` VARCHAR(128)," . PHP_EOL
    . "`num` INT(16)" . PHP_EOL
    . ");"; 
$db->query($girl_table_site);

//A 2D array to store the top site's babynames from the dataabse.
$top_boy_name_site = array(
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A")); 
$top_girl_name_site = array(
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A"),
    array("N/A", "N/A"));  
    
//Makes sure the user's amount entry is correct then starts the conversion process:
if (isset($_POST['boy_name_input']) && isset($_POST['girl_name_input']))
{
    if($_POST['boy_name_input'] == "" && $_POST['girl_name_input'] == "") //Checks if nothing was entered for boy and girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: A boy and girl name were not entered<!!!/div>";
    }
    else if($_POST['boy_name_input'] == "") //Checks if nothing was entered for a boy's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: A boy name was not entered!!!</div>";
    }
    else if($_POST['girl_name_input'] == "") //Checks if nothing was entered for a girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: A girl name was not entered!!!</div>";
    }
    else if(strpos($entry = $_POST['boy_name_input'], " ", 0) && strpos($entry = $_POST['girl_name_input'], " ", 0)) //Checks if more than one entry was entered for a boy or girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: More than one name was entered for a boy and girl's name!!!</div>";
    }      
    else if(strpos($entry = $_POST['boy_name_input'], " ", 0)) //Checks if more than one entry was entered for a boy or girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: More than one name was entered for a boy!!!</div>";
    }  
    else if(strpos($entry = $_POST['girl_name_input'], " ", 0)) //Checks if more than one entry was entered for a boy's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: More than one name was entered for a girl!!!</div>";
    }
    else if(is_numeric($_POST['boy_name_input']) && is_numeric($_POST['girl_name_input'])) //Checks if a non numerical amount was entered for a boy and girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: Numbers cannot be entered!!!</div>";
    }    
    else if(is_numeric($_POST['boy_name_input'])) //Checks if a non numerical amount was entered for a boy's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: Numbers cannot be entered for a boy's name!!!</div>";
    }
    else if(is_numeric($_POST['girl_name_input'])) //Checks if a non numerical amount was entered for a girl's name.
    {
        $resultText = "<div class=\"alert alert-danger\">ERROR: Numbers cannot be entered for a girl's name!!!</div>";
    }
       
    else //Starts the conversion process:
    {
        //The variables that will store the user's name:
        $boy_name = "";
        $girl_name = "";        
        
        //Gets the values that were selected in the HTML.
        $boy_name = mysqli_real_escape_string($db, $_POST['boy_name_input']);
        $girl_name = mysqli_real_escape_string($db, $_POST['girl_name_input']);
        
        //Lower cases the user's names and then upper cases the first letters.
        $boy_name = ucfirst(strtolower($boy_name));
        $girl_name = ucfirst(strtolower($girl_name));
                 
        //Checks and returns a value depending if the user's name already exists in the database.
        $boy_name_check = db_name_match($boy_name, "M", $db);        
        $girl_name_check = db_name_match($girl_name, "F", $db);
        
        
        if($boy_name_check == 0) //If the user's boy name does not exists in the database.
        {
            db_name_insert($boy_name, "M", $db); //Inserts user's boy name into the database.             
        }
        else //If the user's boy name already exists in the database.
        {                     
            db_increase_name_num($boy_name, "M", $db); //Increases the num for the specified boy name in the database,
        }
        
        if($girl_name_check == 0) //If the user's girl name does not exists in the database.
        {
            db_name_insert($girl_name, "F", $db); //Inserts user's girl name into the database.                      
        }
        else //If the user's girl name already exists in the database.
        {
            db_increase_name_num($girl_name, "F", $db); //Increases the num for the specified girl name in the database,
        }                      
        
        //Sorts/ORDER BY the names in the database based on their num.
        db_sort("M", $db);                
        db_sort("F", $db);

//        $sortNum = 'SELECT * FROM `SITE_BABYNAMES_BOY`' . PHP_EOL 
//            .' ORDER BY num DESC;';
//        $db->query($sortNum);             
        
//        //A 2D array to store the top site's babynames from the dataabse.
//        $top_boy_name_site = array(
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A")); 
//        $top_girl_name_site = array(
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A"),
//            array("N/A", "N/A"));         
        
        $select_SSA_table = 'SELECT * FROM `SITE_BABYNAMES_BOY`;'; //Retrieves the boy site's table.
        $result = $db->query($select_SSA_table); //Executes SQL code and stores it in a variable.
        if($result->num_rows > 0) //Checks if SITE_BABYNAMES_BOY is empty.
        {
            $id = 0; //Used to help move through the 2D array.
            while($id <= 4) //Goes through the database's table five time to retrieve the database's row and store the needed values in the 2D array.
            {
                $row = $result->fetch_assoc(); 
                $top_boy_name_site[$id][0] = $row["name"]; 
                $top_boy_name_site[$id][1] = $row["num"];
                $id++;
            }
        }
        
        $select_SSA_table = 'SELECT * FROM `SITE_BABYNAMES_GIRL`;'; //Retrieves the girl site's table.
        $result = $db->query($select_SSA_table); //Executes SQL code and stores it in a variable.
        if($result->num_rows > 0) //Checks if SITE_BABYNAMES_GIRL is empty.
        {
            $id = 0; //Used to help move through the 2D array.
            while($id <= 4) //Goes through the database's table five time to retrieve the database's row and store the needed values in the 2D array.
            {
                $row = $result->fetch_assoc(); 
                $top_girl_name_site[$id][0] = $row["name"]; 
                $top_girl_name_site[$id][1] = $row["num"];
                $id++;
            }
        }                
        
        //Prints a message in the submission saying that the names were successfully submitted.
        $resultText = "<div class=\"alert alert-success\">Names were succussfully submitted.</div>";
    }

}
else //Says nothing since this should only appear on the user's first visit.
{
    $resultText = " ";
}


//||||||||||||||||||||||||||||||
//|||||||| v FUNCTIONS: v ||||||||||
//||||||||||||||||||||||||||||||||

//Compares the user's names to the database's names if there are any matches: 
function db_name_match($name, $sex, $db)
{
    //echo "Inside db_name_match. ";
    if($sex == "M") //Selects the boy's site table if M was passed.
    {
        $select_SITE_NAMES = 'SELECT * FROM `SITE_BABYNAMES_BOY`;';
    }
    else //Selects the girl's site table if F was passed.
    {
        $select_SITE_NAMES = 'SELECT * FROM `SITE_BABYNAMES_GIRL`;';      
    }
    
    $result = $db->query($select_SITE_NAMES);

    if($result->num_rows > 0) 
    {
        //Goes through loop to check everyname in the table to see if there is a match.
        while($row = $result->fetch_assoc()) 
        {
            $db_site_name = $row["name"]; //Stores the current row's name from the table.

            if($db_site_name == $name) 
            {
                return 1; //Returns True if there was a match.
            }                
        }        
    }
    return 0; //Returns False if there were no matches.
}

//Inserts the user's name(s) into the database:
function db_name_insert($name, $sex, $db)
{
    //echo "Inside db_name_insert. "; 
    if($sex == "M") //Inserts the user's name into the database's boy site's table M was passed.
    {
        $insertBoyTable = 'INSERT INTO `SITE_BABYNAMES_BOY` (`id`, `name`, `sex`, `num`)' . PHP_EOL 
            . '  VALUES (NULL, \''.$name.'\', \'M\', \'1\');';  
        $db->query($insertBoyTable);          
    }
    else //Inserts the user's name into the database's girl site's table F was passed.
    {
        $insertGirlTable = 'INSERT INTO `SITE_BABYNAMES_GIRL` (`id`, `name`, `sex`, `num`)' . PHP_EOL 
            . '  VALUES (NULL, \''.$name.'\', \'M\', \'1\');';  
        $db->query($insertGirlTable);              
    }        
}

//Increases the num amount depending on the user's name(s).
function db_increase_name_num($name, $sex, $db)
{    
    //echo "Inside db_increase_name_num. ";
    if($sex == "M") //Updates the num of a name from the database's boy site's table if a name M was passed.
    {
        $updateNum = 'UPDATE `SITE_BABYNAMES_BOY`' . PHP_EOL 
            . ' SET num=`num`+1 '. PHP_EOL 
            . ' WHERE name=\''.$name.'\';'; 
        $db->query($updateNum);        
    }
    else //Updates the num of a name from the database's girl site's table if a name F was passed.
    {
        $updateNum = 'UPDATE `SITE_BABYNAMES_GIRL`' . PHP_EOL 
            . ' SET num=`num`+1 '. PHP_EOL 
            . ' WHERE name=\''.$name.'\';';  
        $db->query($updateNum);        
    }    
}

//Sorts the functions based on their num. If names have the same num amount, the names will be ordered alphabetically.
function db_sort($sex, $db)
{
    if($sex == "M") //Sorts the names in the database's  boy site's table if M was passed.
    {
        $sortNum = 'SELECT * FROM `SITE_BABYNAMES_BOY`' . PHP_EOL 
            .' ORDER BY `num` DESC;';
        $db->query($sortNum);
    }    
    else //Sorts the names in the database's girl site's table if F was passed.
    {
        $sortNum = 'SELECT * FROM `SITE_BABYNAMES_GIRL`' . PHP_EOL 
            .' ORDER BY `num` DESC;';
        $db->query($sortNum);        
    }
}

?>

<!--- ^ Milestone 3 PHP ^ ---- v HTML v ----------------------------------------------------->


<!--The HTML:-->
<html>
    <head>
		<title>hw6 Popular Baby Names</title>
    
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/scrolling-nav.css" rel="stylesheet">
        
    </head>
    
    <body>
        <section id="Conversion" class="conversion-section">
            <form method="post" action="index.php">
                <div class="container">
                    <div class="row">
                        <!-- -------- Top Panel -------- -->
                        <div class="col-lg-12">
                           <h1>Popular Baby Names</h1>
                            <p>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Mars_symbol.svg"/>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Venus_symbol.svg"/>
                            </p>
                            <hr>                            
                            <div class="row">
                                <div class="bottom-panels">
                                    <!-- -------- Left Panel -------- -->
                                    <div class="col-md-4 col-md-offset-2">
                                        <div class="panel planel-default">
                                            <h2>Favorite Boy Name:</h2>
                                            <small class="label label-danger">*Required</small>
                                            <p>
                                              <input type="text" name="boy_name_input" id="user_boy_name" />
                                            </p>                    
                                        </div>
                                    </div>

                                    <!-- -------- Center Panel -------- -->                
                                    <div class="col-md-4">
                                        <div class="panel planel-default">
                                            <h2>Favorite Girl Name:</h2>
                                            <small class="label label-danger">*Required</small>
                                            <p>
                                               <input type="text" name="girl_name_input" id="user_girl_name" />
                                            </p>          
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bottom-panels">

                                            <!-- -------- Submission Panel -------- -->        
                                            <div class="col-md-4 col-md-offset-4">
                                                <div class="panel planel-default">
                                                    <h2>Submission:</h2>
                                                    <input type="submit" value="Submit Names" />
                                                    <div class="result-panel"></div>
                                                        <p id="result"><?php echo $resultText; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row">
                    <div class="bottom-panels">

                        <!-- -------- Names Table Panels -------- --> 
                        <div class="col-md-4 col-md-offset-2">
                            <div class="panel planel-default">
                                <h2>Popular Boy Names of 2014:</h2>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Count</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $top_boy_name_ssa[0][0]; ?></td>
                                        <td><?php echo $top_boy_name_ssa[0][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $top_boy_name_ssa[1][0]; ?></td>
                                        <td><?php echo $top_boy_name_ssa[1][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo $top_boy_name_ssa[2][0]; ?></td>
                                        <td><?php echo $top_boy_name_ssa[2][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo $top_boy_name_ssa[3][0]; ?></td>
                                        <td><?php echo $top_boy_name_ssa[3][1]; ?></td>
                                    </tr>   
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo $top_boy_name_ssa[4][0]; ?></td>
                                        <td><?php echo $top_boy_name_ssa[4][1]; ?></td>
                                    </tr>                                                                
                                </table>                              
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel planel-default">
                                <h2>Popular Girl Names of 2014:</h2>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Count</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $top_girl_name_ssa[0][0]; ?></td>
                                        <td><?php echo $top_girl_name_ssa[0][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $top_girl_name_ssa[1][0]; ?></td>
                                        <td><?php echo $top_girl_name_ssa[1][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo $top_girl_name_ssa[2][0]; ?></td>
                                        <td><?php echo $top_girl_name_ssa[2][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo $top_girl_name_ssa[3][0]; ?></td>
                                        <td><?php echo $top_girl_name_ssa[3][1]; ?></td>
                                    </tr>   
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo $top_girl_name_ssa[4][0]; ?></td>
                                        <td><?php echo $top_girl_name_ssa[4][1]; ?></td>
                                    </tr>  
                                </table>                              
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="row">
                    <div class="bottom-panels">                                                    

                        <div class="col-md-4 col-md-offset-2">
                            <div class="panel planel-default">
                                <h2>Popular Boy Names on Site:</h2>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th> 
                                        <th>Count</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $top_boy_name_site[0][0]; ?></td>
                                        <td><?php echo $top_boy_name_site[0][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $top_boy_name_site[1][0]; ?></td>
                                        <td><?php echo $top_boy_name_site[1][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo $top_boy_name_site[2][0]; ?></td>
                                        <td><?php echo $top_boy_name_site[2][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo $top_boy_name_site[3][0]; ?></td>
                                        <td><?php echo $top_boy_name_site[3][1]; ?></td>
                                    </tr>                                                                
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo $top_boy_name_site[4][0]; ?></td>
                                        <td><?php echo $top_boy_name_site[4][1]; ?></td>
                                    </tr>                                                                
                                </table>                              
                            </div>
                        </div>                 
                        <div class="col-md-4">
                            <div class="panel planel-default">
                                <h2>Popular Girl Names on Site:</h2>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Count</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $top_girl_name_site[0][0]; ?></td>
                                        <td><?php echo $top_girl_name_site[0][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $top_girl_name_site[1][0]; ?></td>
                                        <td><?php echo $top_girl_name_site[1][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo $top_girl_name_site[2][0]; ?></td>
                                        <td><?php echo $top_girl_name_site[2][1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo $top_girl_name_site[3][0]; ?></td>
                                        <td><?php echo $top_girl_name_site[3][1]; ?></td>
                                    </tr>                                                                
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo $top_girl_name_site[4][0]; ?></td>
                                        <td><?php echo $top_girl_name_site[4][1]; ?></td>
                                    </tr>  
                                </table>                              
                            </div>
                        </div> 

                    </div>
                </div>
            </div>          
        </section>
    </body>  
</html>

<?php
mysqli_close($db);
?>



