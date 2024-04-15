
<?php
include_once('database/connection.php');
session_start();

// SQL query to select data from database

$sql = " SELECT b.id,b.added_by,b.bus_no,b.seating_capacity
FROM buses b
WHERE b.added_by = '".$_SESSION['user']['id']."' ORDER BY b.id DESC";

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();
include_once('include/header.php');
?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Bus Data</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
            padding: auto;
            margin-bottom: 100px;
		}

		h1 {
			text-align: center;
			color: orange;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #daa520;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>Bus Details</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Id</th>
				<th>Bus Number</th>
				<th>Seating Capacity</th>
				
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['bus_no'];?></td>
				<td><?php echo $rows['seating_capacity'];?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
<?php
include_once('include/footer.php');
?>
