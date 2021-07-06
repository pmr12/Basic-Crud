<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$fname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$created_by = 1;
		
	// checking empty fields
	if(empty($fname) || empty($lname) || empty($address)) {
				
		if(empty($fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO std_info(std_fname,std_lname,std_address,created_by) VALUES('$fname','$lname','$address',$created_by)");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
