<!-- Load utils.php file -->
<?php 
require_once('utils.php');
?>

<!-- Nav Bar CSS -->
<link rel="stylesheet" href="static/css/nav.css">
<!-- Buyer CSS -->
<link rel="stylesheet" href="static/css/buyerpage.css">

<body>
	<!-- Nav Bar -->
	<?php include 'static/headers/nav.php' ?>

	<!-- Start of data -->
	<div class="container">
		<?php
			$bikes = array();
			// Check for number of column inserted
			$col_counter = 0;

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
			for($index = 0; $index < sizeof($bikes); $index++) {
	    		$serial_no = $bikes[$index][SERIAL_NO] . "<br/>";
				$type = $bikes[$index][TYPE] . "<br/>";
				// TODO Add Detailed Information in the for loop
				$description = $bikes[$index][DESCRIPTION] . "<br/>";
				$bikeimg = BIKES_IMG . $bikes[$index][BIKE_IMAGE];

				// Multiples of 3
				if($index % 3 != 0) {
		?> 
		<!-- Start a new row -->
		<div class="row">
			<?php 
				} // End of if loop
			?>
			<!-- Start of column -->
			<div class="column">
				<div class="card">
				  <img src="<?= $bikeimg; ?>" alt="<?= $bikeimg; ?>" width="200" height="200" class="center"/>
				  <div class="card-body">
				    <h4><b><?= $serial_no; ?></b></h4>
				    <p><?= $type; ?></p>
				    <p><?= $description; ?></p>
				  </div>
				</div>
			</div> <!-- End of column -->
			<?php 
				// Restrict to 3 columns per row
				$col_counter++;
				if($col_counter === 3) { 
			?>
		</div> <!-- End of row -->
			<?php 
				} // End of if loop
			?>
		<?php 
			} // End of for loop
		?>
	</div>
</body>