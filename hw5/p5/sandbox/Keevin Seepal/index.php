<?php
function currencyConverter($currency_from,$currency_to,$currency_input){    
    $amount = urlencode($currency_input);
    $from_Currency = urlencode($currency_from);
    $to_Currency = urlencode($currency_to);
    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[1]);  
    $currency_output = preg_replace("/[^0-9\.]/", null, $get[0]);
    return $currency_output;
}
if(isset($_POST['convert'])) {
$from_currency = trim($_POST['from_currency']);
$to_currency = trim($_POST['to_currency']);
$amount = trim($_POST['amount']);	
if($from_currency == $to_currency) {
 	$data = array('error' => '1');
	echo json_encode( $data );	
	exit;
}
$converted_currency=currencyConverter($from_currency, $to_currency, $amount);
// Print outout
echo $converted_currency;
}

$display_result = false;
$currency_to = "GBP";
$currency_from = "USD";
$currency_input = 1;
if (isset($_POST['currency_from']))
	$currency_from = $_POST['currency_from'];
if (isset($_POST['currency_to']))
	$currency_to = $_POST['currency_to'];
if (isset($_POST['currency_input']))
	$currency_input = $_POST['currency_input']; 
$currency = currencyConverter($currency_from,$currency_to,$currency_input);
$display_result = true;
echo <<<_END
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kevin Seepaul Currency Converter</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<center>
<body  background="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text center">
                </br>
                </br>
                <h1 id="header">International Currency Converter</h1></br>
                <form method="post" action="index.php">
                    <label>Enter amount:</label>
                    <input type="text" name="currency_input" />
                    <label>Convert From</label>
                    <select name="currency_from">
                        <option value="USD">US Dollar</option>
                        <option value="EUR">Euro</option>
                        <option value="INR">Indian Rupee</option>
                        <option value="GBP">British Pound</option>
                        <option value="CAD">Canadian Dollar</option>
                    </select>
                    <br>
                    <br>
                    <label>Select currency (to):</label>
                    <select name="currency_to">
                        <option value="USD">US Dollar</option>
                        <option value="EUR">Euro</option>
                        <option value="INR">Indian Rupee</option>
                        <option value="GBP">British Pound</option>
                        <option value="CAD">Canadian Dollar</option>
                    </select>
                    <input type="submit" value="Commence Conversion!" />
                </form>
                <h1 id="result">$currency_input $currency_from = $currency $currency_to</h1>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</center>
<br>
<br>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <hr class="small">
                <span class="copyright">Copyright &copy; Kevin Seepaul 2016 - Powered by <a href="https://startbootstrap.com"><em>Start Bootstrap</em></a></span>
            </div>
        </div>
    </div>
    <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
</footer>
</html>
_END;
if($display_result) {
    echo $currency_input.' '.$currency_from.' = '.$currency.' '.$currency_to;
}
?>