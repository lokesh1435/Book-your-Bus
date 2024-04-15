<?php
include_once('database/connection.php');
session_start();


if(isset($_POST['submit'])){
   
    // $start_point=$_POST['start_location'];
    // $end_point=$_POST['end_location'];

    //$added_by=$_POST['AddedBy'];
    $bus_no=$_POST['BusNo'];
    $image=$_POST['Image'];
    $seating_capacity=$_POST['SeatingCapacity'];
    $status=$_POST['Status'];
    $add_at=$_POST['AddDate'];
   
   

    $stmt=$connection->prepare("INSERT INTO buses (added_by,bus_no,image,seating_capacity,status,add_at) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$_SESSION['user']['id'],$bus_no,$image,$seating_capacity,$status,$add_at);
    if($stmt->execute()){
        $last_id=$stmt->insert_id;
        echo "<script>alert(' Your Bus ID:'+'$last_id')
        </script>";
        
    }
}

include_once('include/header.php');
?>

<body>
<form method="post" action="">
			
<!-- <label for="AddedBy">AddedBy:</label>
    <input type="number" name="AddedBy" id="AddedBy" required><br> -->

    <label for="BusNo">BusNo:</label>
    <input type="text" name="BusNo" id="BusNo" required><br>

    <label for="Image">Image:</label>
    <input type="text" name="Image" id="Image" required><br>

    <label for="SeatingCapacity">Seating Capacity:</label>
    <input type="number" name="SeatingCapacity" id="SeatingCapacity" required><br>

    <label for="Status">Status:</label>
    <input type="number" name="Status" id="Status" required><br>

    <label for="AddDate">AddDate:</label>
    <input type="datetime-local" name="AddDate" id="AddDate" required><br>

   


    <input type="submit" name="submit" value="Add Bus">
		</form>
	
</body>

<?php
include_once('include/footer.php');
?>

