<?php
include_once('database/connection.php');
session_start();


if(isset($_POST['submit'])){
   
    $start_point=$_POST['start_location'];
    $end_point=$_POST['end_location'];
   

    $stmt=$connection->prepare("INSERT INTO routes (user_id,start_point,end_point) VALUES(?,?,?)");
    $stmt->bind_param("sss",$_SESSION['user']['id'],$start_point,$end_point);
    if($stmt->execute()){
       $last_id=$stmt->insert_id;
        echo "<script>alert(' Your Route ID:'+'$last_id')
        </script>";
    }
}

include_once('include/header.php');
?>

<body>
<form method="post" action="">
			
<label for="start_location">Start Location:</label>
    <input type="text" name="start_location" id="start_location" required><br>

    <label for="end_location">End Location:</label>
    <input type="text" name="end_location" id="end_location" required><br>


    <input type="submit" name="submit" value="Add Bus">
		</form>
	
</body>

<?php
include_once('include/footer.php');
?>

