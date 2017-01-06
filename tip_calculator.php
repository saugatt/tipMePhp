

<! DOCTYPE html>
<html>
<head>
	<style>
		.centered
		{
			text-align: center;			
		}
	</style>
	<title> Tip Calculator </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="row centered">
	<div class="col-sm-offset-5 col-sm-4">
		<div class="panel panel-default">
		<h1> Tip Calculator </h1>
		<form action="tip_calculator.php" method="post">

			<p > <span class="text-warning">Bill subtotal: $</span><input type="text" name="subtotal" value="" /> </p>
			<p> Tip Percentage </p>

		<?php
			$percent = [10, 15, 20];
			for ($i = 0; $i < 3; $i++) {
		?>
		<input type="radio" name="tip" value="<?php echo $percent[$i]; ?>" > <?php echo $percent[$i]."% <br />"; ?>
		<?php
			}
		?>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
		  </form>
	  </div>			
	</div>
	<div class="col-sm-offset-5 col-sm-4 text-info">
			<div class="panel panel-default">

			<?php
				//checking if there the value for tip has been submitted
				if (isset($_POST["submit"])) {
					if (!is_numeric($_POST["subtotal"])) {
						echo "Please submit positive numeric subtotal. <br />";
					} 
					if (!isset($_POST["tip"])) {
						echo "Please submit the tip. ";
					} 
					if (isset($_POST["tip"]) && is_numeric($_POST["subtotal"]) ) {
						if ($_POST["subtotal"] > 0) {
							$subtotal = floatval($_POST["subtotal"]);
							$tip_perc = floatval($_POST['tip']); // tip percentage
							$tip = ($subtotal) * ($tip_perc/100);
							$total = $tip + $subtotal;
							echo "Sub Total: $";
							echo  number_format($subtotal, 2). "<br />";
							echo "Tip: $";
							echo number_format($tip, 2) . "<br />";
							echo "Total: $" ;
							echo number_format($total, 2) . "<br />" ;
						}
					}

				}
			?>
	</div>
</div>	

</pre>
</body>
</html>