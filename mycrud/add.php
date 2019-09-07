<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['oId'];
	$age = $_POST['pName'];
	$email = $_POST['pDesc'];
	$email = $_POST['uUsername'];
		
	// checking empty fields
	if(empty($oId) || empty($pName) || empty($pDesc) || empty($uUsername)) {
				
		if(empty($oId)) {
			echo "<font color='red'>oId field is empty.</font><br/>";
		}
		
		if(empty($pName)) {
			echo "<font color='red'>pName field is empty.</font><br/>";
		}
		
		if(empty($pDesc)) {
			echo "<font color='red'>pDesc field is empty.</font><br/>";
		}
		if(empty($uUsername)) {
			echo "<font color='red'>uUsername field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO gerson_db(oId, pName, pDesc, uUsername) VALUES(:oId, :pName, :pDesc, :uUsername)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':oId', $oId);
		$query->bindparam(':pName', $pName);
		$query->bindparam(':pDesc', $pDesc);
		$query->bindparam(':uUsername', $uUsername);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
