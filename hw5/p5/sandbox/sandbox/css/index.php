<?php
function currencyConverter($from_Currency,$to_Currency,$amount) {	
	$from_Currency = urlencode($from_Currency);
    
	$to_Currency = urlencode($to_Currency);	
	$get = file_get_contents("https://finance.google.com/finance/converter?a=1&from=$from_Currency&to=$to_Currency");
	$get = explode("<span class=bld>",$get);
	$get = explode("</span>",$get[1]);
	$rate= preg_replace("/[^0-9\.]/", null, $get[0]);
	$converted_amount = $amount*$rate;
	$data = array( 'rate' => $rate, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
	echo json_encode( $data );	
}
?> 

<?php

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

?>



<html>
<head>
<link rel="stylesheet" href="css/style.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
<title>phpzag.com : Demo Currency conversion in PHP Using Google API</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
    </head>
<body>
<div class="container">
		<div class= "jumbotron">
			<h1>Currency Converter</h1>
		</div>
		<form method="post" id="currency-form">
			<div class="form-group">

				<table class="table">
					<tr>
						<td>
							&nbsp;<label>Amount</label>	
							&nbsp;&nbsp;<input type="text" placeholder="Currency" name="amount" id="amount" />	
						</td>
					</tr>
					<tr>
						<td>
							<label>From</label>
							<select name="from_currency" id="form_currency">
								<option value="INR">Indian Rupee</option>
								<option value="USD" selected="1">US Dollar</option>
								<option value="AUD">Australian Dollar</option>
								<option value="EUR">Euro</option>
								<option value="EGP">Egyptian Pound</option>
								<option value="CNY">Chinese Yuan</option>
							</select>	
							&nbsp;<label>To</label>
							<select name="to_currency" id ="to_currency">
								<option value="INR" selected="1">Indian Rupee</option>
								<option value="USD">US Dollar</option>
								<option value="AUD">Australian Dollar</option>
								<option value="EUR">Euro</option>
								<option value="EGP">Egyptian Pound</option>
								<option value="CNY">Chinese Yuan</option>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							&nbsp;&nbsp;<button type="submit" name="convert" id="convert" class="btn btn-primary">CONVERT</button>
						</td>
					</tr>
					
					<tr>
						<td>
							<div id="converted_rate"></div>	
							<div id="converted_amount"></div>
						</td>
						
					</tr>
				</table> 			
			</div>	

		</form>	
	</div>
	</body>
</html>




