<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT oId, o.pId pName, pDesc, uUsername from orders o INNER JOIN product p on o.pId = p.pId INNER JOIN users u on o.uId = u.uId ");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
	    <td>Order Id</td>
		
		<td>Product Name</td>
		<td>Product Description</td>
		<td>Username</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['oId']."</td>";
		
		echo "<td>".$row['pName']."</td>";
		echo "<td>".$row['pDesc']."</td>";
		echo "<td>".$row['uUsername']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[oId]\">Edit</a> | <a href=\"delete.php?id=$row[oId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
