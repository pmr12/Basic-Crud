<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$fname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);	
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE std_info SET std_fname='$fname',std_lname ='$lname',std_address='$address' WHERE std_rowid=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM std_info WHERE std_rowid=$id");

while($res = mysqli_fetch_array($result))
{
	$fname = $res['std_fname'];
	$lname = $res['std_lname'];
	$address = $res['std_address'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>First name</td>
				<td><input type="text" name="firstname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Last name</td>
				<td><input type="text" name="lastname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
