<?php
include_once('../database/connection.php');
session_start();

//select buses
$status=1;
$stmt=$connection->prepare("SELECT * FROM buses WHERE added_by = ? AND status = ?");
$stmt->bind_param("ss",$_SESSION['admin']['id'],$status);
$stmt->execute();
$result=$stmt->get_result();

//select routes
$stmt1=$connection->prepare("SELECT * FROM routes WHERE user_id = ?");
$stmt1->bind_param("s",$_SESSION['admin']['id']);
$stmt1->execute();
$result1=$stmt1->get_result();

//new schedule
if(isset($_POST['submit'])){

    $bus_id=$_POST['bus_id'];
    $route_id=$_POST['route_id'];
    $start=$_POST['start'];
    $reached=$_POST['reached'];
    $total_seats=$_POST['total_seats'];
    $cost=$_POST['cost'];
    $description=$_POST['description'];

    $stmt2=$connection->prepare("INSERT INTO schedules (added_by,route_id,bus_id,start_time,reached_time,description,total_seats,available_seats,cost) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt2->bind_param("sssssssss",$_SESSION['admin']['id'],$route_id,$bus_id,$start,$reached,$description,$total_seats,$total_seats,$cost);
    if($stmt2->execute()){
        echo "<script>alert('New Schedule Created')
        window.location='schedules.php';
        </script>";
    }
}

include_once('include/header.php');
include_once('include/sidebar.php');
?>

<heading>
    <h2>Add Schedule</h2>
</heading>
<div class="booking-form">
    <form action="" method="POST">
        <div class="input-wrap">
            <div class="input-group"> <label for="name">Select Bus</label>
            <select name="bus_id" id="busselect" required>
                <option value="">Select Bus</option>
                <?php while($row=$result->fetch_assoc()){ ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['bus_no']; ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="input-group"> <label for="name">Select Route</label>
            <select name="route_id" id="" required>
                <option value="">Select Route</option>
                <?php while($row1=$result1->fetch_assoc()){ ?>
                <option value="<?php echo $row1['id'] ?>"><?php echo $row1['start_point'] ." - ". $row1['end_point'] ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <div class="input-wrap">
            <div class="input-group"> <label for="name">Start Date-Time</label>
                <input type="datetime-local" placeholder="Name" name="start" required>
            </div>
            <div class="input-group"> <label for="name">Reached Date-Time</label>
                <input type="datetime-local" placeholder="Name" name="reached" required>
            </div>
        </div>
        <div class="input-wrap">
            <div class="input-group"> <label for="name">Total Seats</label>
                <input type="number" id="totalseats" placeholder="Total Seats" name="total_seats" min="1" required>
            </div>
            <div class="input-group"> <label for="Email">Cost Per Seat</label>
                <input type="number" placeholder="Cost Per Seat" name="cost" min="1" required>
            </div>
        </div>
        <div class="input-group">
            <label for="Description">Description</label>
            <textarea name="description" placeholder="Description" required></textarea>
        </div>
        <div class="submit-btn">
                    <button class="btns" name="submit">Submit</button>
    </div>
    </form>
</div>
</div>
</div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#busselect').change(function(e){
        e.preventDefault();
        var test = $('#busselect').find(":selected").val();
        $.ajax({
            type: "POST",
            url: "script.php",
            data: {
                "request" : "bus_record",
                "id": test,
            },
            success: function(response){
                response=JSON.parse(response);
                $('#totalseats').val(response.seating_capacity);
                // $('#ad').val(response.added_by);
            }
        });
    });
});
    </script>