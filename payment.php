<?php
//connection file
include_once('database/connection.php');
session_start();

//booking id for payments
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT b.total_tickets,s.cost,s.available_seats,s.id AS s_id
    FROM bookings b
    INNER JOIN schedules s ON s.id = b.schedule_id
    WHERE b.id = ?";

    $stmt=$connection->prepare($sql);
    $stmt->bind_param("s",$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
}

//update bookings with payment
if(isset($_POST['submit'])){
    $status = 1;

    $stmt1=$connection->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt1->bind_param("ss",$status,$id);
    if($stmt1->execute()){

        //seats records
        $seats = $row['available_seats'] - $row['total_tickets'];

        //update available seats
        $stmt2=$connection->prepare("UPDATE schedules SET available_seats = ? WHERE id = ?");
        $stmt2->bind_param("ss",$seats,$row['s_id']);
        $stmt2->execute();
        echo "<script>alert('Thanx For Booking With Us!')
        window.location='my-bookings.php';
        </script>";
    }
}

//header
include_once('include/header1.php');
?>
<section class="login payment">
        <div class="container">
            <div class="form-wrap">
                <form action="" method="POST">
                    <h2>Payments</h2>
                    <div class="input-grid">
                        <label for="uername">Amount To Paid</label>
                        <input type="email" placeholder="Email" name="email" value="<?php echo $row['cost']*$row['total_tickets'] ?>" readonly>
                    </div>
                    <div class="form-btn">
                        <button class="btns" name="submit">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>