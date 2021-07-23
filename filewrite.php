<?php
$nm = $_POST["bname"];
$no = $_POST["telno"];
$em = $_POST["emailname"];
$sn = $_POST["serialnumber"];
$pr = $_POST["pnumber"];

$txt = $nm . "," . $no . "," . $em . "," . $sn . "," . $pr . "\n";
echo "adding new date =", $txt, "<br>";

$fileopen = false;

echo "listing file content:", "<br>";
if (file_exits("ExpInterest.txt") && ($myfile=fopen("ExpInterest.txt","r")) != FALSE)
{
	$fileopen = true;
	$row = 0;
	while (($data = fgetcsv($myfile, 1000, ",")) !== FALSE)
	{
		$num = count($data);
		echo "$num fields in line $row: ";
		for($c=0; $c<$num; $c++) {echo "(" . $data[$c] .")"; }
		echo "<br>";

		$name[$row] = $data[0];
		$no[$row] = $data[1];
		$email[$row] = $data[2];
		$serialnumber[$row] = $data[3];
		$price[$row] = $data[3];
		$keyval[$name[$row]] = array($no[$row],$email[$row],$serialnumber[$row],$price[$row]);
		$row++;
	}
	fclose($myfile);
}
else
{
	echo "file not there";
}

echo "<h1>read file</h1>";
echo "listing file content:", "<br>";
if (file_exits("ExpInterest.txt") && ($myfile=fopen("ExpInterest.txt", "r")) != FALSE)
{
	while(!feof($myfile))
	{
		echo fgets($myfile) . "<br>"; }
		fclose ($myfile);
		echo "completed listing data", "<br>";
	}
	else
	{
		echo "file not there";
	}

?>