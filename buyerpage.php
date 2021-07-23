<!-- Load utils.php file -->
<?php 
require_once('utils.php');
?>

<!-- Nav Bar CSS -->
<link rel="stylesheet" href="static/css/nav.css">
<!-- Buyer CSS -->
<link rel="stylesheet" href="static/css/buyer.css">

<body>
	<!-- Nav Bar -->
	<?php include 'static/headers/nav.php' ?>

	<!-- Start of data -->
	
	<div class="row">
	<?php
		$bikes = array();

		// Read from products.txt and append the data into $bikes array
		$fp = fopen(BIKES_DB, "r+");
			// Read the file line by line
			while (($line = stream_get_line($fp, BUFSIZE, "\n")) !== false) {
				// Split the line data delimiter by ':'
				$temp_data = explode('::', $line);
				array_push($bikes, $temp_data);
			}
		// Close the File Pointer
		fclose($fp);

		// Loop thru every record and place them in respective variable name
		foreach($bikes as $index=>$value) {
    		$serial_no = $bikes[$index][SERIAL_NO] . "<br/>";
			$type = $bikes[$index][TYPE] . "<br/>";
			// TODO Add Detailed Information in the for loop
			$description = $bikes[$index][DESCRIPTION] . "<br/>";
			$bikeimg = $bikes[$index][BIKE_IMAGE];	
		?>

		<div class="column">
			<div class="card">

			  <img src="<?= $bikeimg; ?>" alt="<?= $bikeimg; ?>" width="200" height="200" class="center"/>
			  <div class="container">
			    <h4><b><?= $serial_no; ?></b></h4>
			    <p><?= $type; ?></p>
			    <p><?= $description; ?></p>
			  </div>
			</div>
		</div>
	<?php 
		}
	?>
	</div>
</body>