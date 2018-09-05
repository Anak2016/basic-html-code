
<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter</title>
	<link rel="stylesheet" href="css/style.css">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
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
							<input type="text" id="convert_amount">
							<div class="form-group" id="converted_rate"></div>	
							<div id="converted_amount"></div>
						</td>
						
					</tr>
				</table> 			
			</div>	

		</form>	
	</div>
</body>
</html>