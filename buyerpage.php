<!-- Load utils.php file -->
<?php 
require_once('utils.php');
?>

<!-- Nav Bar CSS -->
<link rel="stylesheet" href="static/css/nav.css">
<!-- Buyer CSS -->
<link rel="stylesheet" href="static/css/buyerpage.css">
<!-- Modal CSS -->
<link rel="stylesheet" href="static/css/modal.css">

<body>
	<!-- Nav Bar -->
	<?php include 'static/headers/nav.php' ?>

	<!-- Start of data -->
	<div class="container">
		<?php
			$modal_id = 0;

			$bikes = array();
			// Check for number of column inserted
			$col_counter = 0;

			// Read from products.txt and append the data into $bikes array
			$fp = fopen(BIKES_DB, "r+");
			// Read the file line by line
			while (($line = stream_get_line($fp, BUFSIZE, "\n")) !== false) {
				// Split the line data delimiter by '::'
				$temp_data = explode('::', $line);
				array_push($bikes, $temp_data);
			}
			// Close the File Pointer
			fclose($fp);

			// Loop thru every record and place them in respective variable name
			for($index = 0; $index < sizeof($bikes); $index++) {
	    		$serial_no = $bikes[$index][SERIAL_NO];
				$type = $bikes[$index][TYPE];
				$description = $bikes[$index][DESCRIPTION];
				$yom = $bikes[$index][YEAR_OF_MANU];
				$characteristics = $bikes[$index][CHARACTERISTICS];
				$condition = $bikes[$index][CONDITION];
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
				  <div class="card-body">
				    <p>
				    	Serial No: <b><?= $serial_no; ?></b>
				    </p>
				    <p>
				    	<b>Type:</b>
				    	<br/>
				    	<?= $type; ?>		
				    </p>
				    <p>
				    	<b>Description:</b>	
				    	<br/>
				    	<?= $description; ?>
				    </p>
				  </div>
				  <!-- Onclick open Modal -->
				  <button class="button blueBtn" onclick="document.getElementById('myModal#<?= $modal_id; ?>').style.display='block'">More</button>
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
			<!-- The Modal -->
			<div id="myModal#<?= $modal_id; ?>" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
			  	<form action="interestpage.php" method="get">
				    <div class="modal-header">
				      <span onclick="document.getElementById('myModal#<?= $modal_id; ?>').style.display='none'" class="close">&times;</span>
				      <h4><?= $type; ?></h4>
				      <p>
				      	<b>Serial No:</b> <?= $serial_no; ?>
				      	<input type="hidden" value="<?= $serial_no; ?>" name="serial_no" />
				      	<span id="interest">&#9825;<?php echo getBikeInterest($serial_no); ?></span>
				      	<br/>
				      	<b>Year of Manufacture:</b> <?= $yom; ?>
				      	<br/>
				      	<b>Condition:</b> <?= $condition; ?>
				      </p>
				      <hr>
				      <img src="<?= $bikeimg; ?>" alt="<?= $bikeimg; ?>" width="200" height="250" class="center"/>
				      <hr>
				    </div>
				    <div class="modal-body">
				      <p>
				      	<b>Description:</b>	
				    	<br/>
				    	<?= $description; ?>
				      </p>
				      <p>
				      	<b>Characteristics</b>
				      	<br/>
				      	<?= $characteristics ?>
				      </p>
				      <hr>
				    </div>
				    <div class="modal-footer">
				      <button type="submit" class="button blueBtn">Like</button>
				    </div>
				  </div>
			  </form>
			</div>
		<?php 
			// Increment the modal id 
			$modal_id++;
			} // End of for loop
		?>
		
		<!-- Function to find interests in this bike -->
		<?php 
			// Read from Exp Interest File and return the count of serial_no
			function getBikeInterest($sNo) {
				$count_arr = [$sNo => 0];

				$fp = fopen(EXP_INTEREST_FILE, "r+");
				// Read the file line by line
				while (($line = stream_get_line($fp, BUFSIZE, "\n")) !== false) {
					// Split the line data delimiter by ','
					$temp_data = explode(',', $line);
					
					foreach($temp_data as $index=>$field) {
				        if ($index === 3 && array_key_exists($field, $count_arr)) {
				            $count_arr[$field]++;
				        }
				    }
				}
				// Close the File Pointer
				fclose($fp);
				
				return $count_arr[$sNo];
			}
		?>
	</div>
</body>