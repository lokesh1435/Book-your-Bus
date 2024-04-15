<?php
include_once('database/connection.php');
session_start();

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
}

//select all schedule
$sql = "SELECT b.bus_no,b.image,r.start_point,r.end_point,s.*
FROM schedules s
INNER JOIN buses b ON b.id = s.bus_id
INNER JOIN routes r ON r.id = s.route_id
WHERE s.id = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows < 1) {
    header('location:index.php');
}
$row = $result->fetch_assoc();

//bookings
if (isset($_POST['submit'])) {
    $tickets = $_POST['tickets'];
    $status=1;

    $stmt1 = $connection->prepare("INSERT INTO bookings (user_id,schedule_id,total_tickets,status) VALUES (?,?,?,?)");
    $stmt1->bind_param("ssss", $_SESSION['user']['id'], $id, $tickets,$status);
    if ($stmt1->execute()) {
        $last_id=$stmt1->insert_id;
        header('location:payment.php?id='.$last_id);
    }
}
if (isset($_POST['submitt'])) {
    $tickets = $_POST['tickets'];
    $status=1;

    $stmt1 = $connection->prepare("INSERT INTO bookings (user_id,schedule_id,total_tickets,status) VALUES (?,?,?,?)");
    $stmt1->bind_param("ssss", $_SESSION['user']['id'], $id, $tickets,$status);
    if ($stmt1->execute()) {
        $last_id=$stmt1->insert_id;
        header('location:paymentdisabbility.php?id='.$last_id);
    }
}

include_once('include/header.php');
?>

<section class="contact1 detail1">
    <div class="container">
        <h1>Schedule Detail</h1>
    </div>
</section>
<section class="detail2">
    <div class="container">
        <div class="record">
            <h2>Bus Route: <?php echo $row['start_point'] .' TO '. $row['end_point'] ?></h2>
            <h2>Departure Time: <?php echo date("d/M/y h:i A",strtotime($row['start_time'])); ?></h2>
            <h2>Arrival Time: <?php echo date("d/M/y h:i A",strtotime($row['reached_time'])) ?></h2>
        </div>
        <div class="row">
            <div class="col8">
                <div class="detail-right">
                    <div class="image">
                        <img src="backend/busimages/<?php echo $row['image']; ?>" alt="bus" title="bus">
                    </div>
                    <div class="info">
                        <div class="name">
                            <h2>
                                <?php echo $row['bus_no'] ?>
                            </h2>
                        </div>
                        <div class="price">
                            <span>$
                                <?php echo $row['cost'] ?>
                            </span>
                            <p>/Per Seat</p>
                        </div>
                    </div>
                    <div class="facility">
                        <h2>Modern Bus Facilities</h2>
                        <div class="facility-wrap">
                            <div class="facility-box">
                                <i class="fa fa-wifi"></i>
                                <p>
                                    Internet Connection </p>
                            </div>
                            <div class="facility-box">
                                <i class="fa fa-desktop"></i>
                                <p>
                                    Onboard entertainment systems </p>
                            </div>
                            <div class="facility-box">
                                <i class="fa fa-wheelchair-alt"></i>
                                <p>
                                    Wheelchair accessibility</p>
                            </div>
                            <div class="facility-box">
                                <i class="fa fa-volume-up"></i>
                                <p>
                                    Audio system </p>
                            </div>
                            <div class="facility-box">
                                <i class="fa fa-snowflake-o"></i>
                                <p>
                                    Full AC </p>
                            </div>
                            <div class="facility-box">
                                <i class="fa fa-plug"></i>
                                <p>
                                    240V Socket</p>
                            </div>
                        </div>
                    </div>
                    <div class="facility facility2">
                        <h2>Travel in Comfort and Style</h2>
                        <!-- <p>At our bus booking website, we partner with only the best bus operators who provide modern
                            and comfortable bus facilities. Our buses are equipped with amenities such as air
                            conditioning, reclining seats, spacious legroom, and
                            onboard entertainment systems. We understand that long journeys can be tiring, which is why
                            we prioritize the comfort of our passengers. Our buses also adhere to strict safety
                            standards, with regular maintenance checks
                            and trained drivers. Trust us for a hassle-free and enjoyable travel experience, with the
                            comfort and safety of our passengers being our top priority.</p> -->
                            <p><?php echo $row['description'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col4">
                <div class="booking-form">
                    <form action="" method="POST">
                        <h2>Booking Form</h2>
                        <input type="hidden" id="schedule" value="<?php echo $row['id'] ?>">
                        <div class="input-grid"> <label for="pick date">Total Tickets</label>
                            <input type="number" id="ticket" min="1" max="10" name="tickets" placeholder="Total Tickets"
                                required>
                        </div>
                        <div class="input-grid"> <label for="pick date">Total Amount</label>
                            <input type="number" id="amount" placeholder="Total Amount" readonly>
                        </div>
                        <button class="btns" name="submit">Book Now</button>
                        <button class="btns" name="submitt">Book Now Disable</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once('include/footer.php');
?>