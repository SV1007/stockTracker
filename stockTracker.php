<!DOCTYPE html>

<html>

<head>
</head>

<body>
	<?php
	if(!isset($_POST['submit']))
	{?>
		<form method="post" action="stockPrice.php">
		<label for="stockNameText">Enter stock symbol:</label>
		<input type="text" name="stockNameText" id="stockNameText"></input>
		<input type="submit" name="submit">
		</form>
	<?php } 
	if(isset($_POST['submit']))
	{?>
		<form method="post" action="stockPrice.php">
		<label for="stockNameText">Enter stock symbol:</label>
		<input type="text" name="stockNameText" id="stockNameText"></input>
		<input type="submit" name="submit">
		</form>
	<?php	
		$xmlStockData = 'http://dev.markitondemand.com/Api/v2/Quote/xml?symbol='.$_POST['stockNameText'];
		$open = fopen($xmlStockData, 'r');
		$content = stream_get_contents($open);
		$xml = simplexml_load_string($content);
		$price = $xml->LastPrice;
		if($price)
		{ ?>
			<br>
			<div><?php echo $_POST['stockNameText']."'s stock price is ".$price; ?></div>
  <?php }
  		else
  		{ ?>
  			<br>
  			<div><?php echo $_POST['stockNameText']." is not a valid stock symbol!" ?></div>
  <?php }
	
	} ?>


</body>

</html>
