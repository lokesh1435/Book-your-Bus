<?php
include_once('database/connection.php');
session_start();

if(isset($_GET['submit'])){
    $from = $_GET['from'];
    $to = $_GET['to'];
    $date=$_GET['date'];

    $sql = "SELECT s.*,b.bus_no,r.start_point,r.end_point
    FROM schedules s
    INNER JOIN routes r ON r.id = s.route_id
    INNER JOIN buses b ON s.bus_id = b.id
    WHERE r.start_point LIKE '%$from%' OR r.end_point LIKE '%$to%' OR s.start_time LIKE '%$date%' OR s.reached_time LIKE '%$date%' ";

    $stmt=$connection->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    $count = $result->num_rows;
}

include_once('include/header1.php');
?>

<section class="search1">
        <div class="container">
            <h1>Search</h1>
        </div>
    </section>
    <section class="search2">
        <div class="container">
            <div class="row">
                <div class="col4">
                    <div class="search-left">
                        <div class="serach-wrap">
                            <input type="text" placeholder="Search">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="filters">
                            <h3>Departure Time</h3>
                            <div class="filter-info">
                                <div class="box"> <input type="checkbox">
                                    <p>Before 6 am (4)</p>
                                </div>

                                <div class="box"><input type="checkbox">
                                    <p>6 am to 12 pm (10)</p>
                                </div>
                                <div class="box"> <input type="checkbox">
                                    <p>12 pm to 6 pm (12)</p>
                                </div>
                                <div class="box"> <input type="checkbox">
                                    <p>After 6 pm (9)</p>
                                </div>
                            </div>

                        </div>
                        <div class="filters">
                            <h3>Bus Types</h3>
                            <div class="filter-info">
                                <div class="box"> <input type="checkbox">
                                    <p>Seater(30)</p>
                                </div>

                                <div class="box"><input type="checkbox">
                                    <p>Sleepers (5)</p>
                                </div>
                                <div class="box"> <input type="checkbox">
                                    <p>AC (30)</p>
                                </div>

                            </div>

                        </div>
                        <div class="filters">
                            <h3>Arrival Time</h3>
                            <div class="filter-info">
                                <div class="box"> <input type="checkbox">
                                    <p>Before 6 am (8)</p>
                                </div>

                                <div class="box"><input type="checkbox">
                                    <p>6 am to 12 pm (13)</p>
                                </div>
                                <div class="box"> <input type="checkbox">
                                    <p>12 pm to 6 pm (16)</p>
                                </div>
                                <div class="box"> <input type="checkbox">
                                    <p>After 6 pm (9)</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col8">
                    <div class="search-right">
                        <div class="search-info">
                            <div class="row">
                                <div class="col4">
                                    <h3><?php echo $count ?> Buses found</h3>
                                </div>
                                <div class="col2">
                                    <h4>Departure</h4>
                                </div>
                                <div class="col2">
                                    <h4>Arrival</h4>
                                </div>
                                <div class="col2">
                                    <h4> Route
                                    </h4>
                                </div>

                                <div class="col2">
                                    <h4>Fare </h4>
                                </div>
                                <div class="col3">
                                    <h4>Seats Available</h4>
                                </div>
                            </div>
                        </div>
                        <?php while($row=$result->fetch_assoc()){ ?>
                        <div class="search-detail">
                            <div class="row">
                                <div class="col4">
                                    <h3><?php echo $row['bus_no'] ?></h3>
                                    <h4>Mercedes Benz A/C (2+2)</h4>
                                </div>
                                <div class="col2">
                                    <h4><?php echo date("d-M-y h:i A") ?></h4>
                                </div>
                                <div class="col2">
                                    <h4><?php echo date("d-M-y h:i A", strtotime("+1 days")) ?></h4>

                                </div>
                                <div class="col2">
                                    <h4><?php echo $row['start_point'] ." -TO- ". $row['end_point'] ?>
                                    </h4>
                                </div>

                                <div class="col2">
                                    <h4>$<?php echo $row['cost'] ?></h4>
                                </div>
                                <div class="col3">
                                    <h4>Total Seats: <?php echo $row['total_seats'] ?></h4>
                                    <h4>Available: <?php echo $row['available_seats'] ?></h4>
                                    <h4>Handicapped Accesible: <?php echo round($row['handicap_seats']) ?></h4>
                                    <?php if(isset($_SESSION['user'])){ ?>
                                    <a href="booking.php?id=<?php echo base64_encode($row['id']) ?>&_id=<?php $str=rand(); echo md5($str); ?>" class="btns">Book Now</a>
                                    <?php }else{ ?>
                                        <a href="login.php" class="btns">Book Now</a>
                                        <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="search-detail">
                            <div class="row">
                                <div class="col4">
                                    <h3>Etiquette 101</h3>
                                    <h4>Mercedes Benz A/C (2+2)</h4>
                                </div>
                                <div class="col2">
                                    <h4>13:10</h4>

                                </div>
                                <div class="col2">
                                    <h4> 02h 05m
                                    </h4>
                                </div>
                                <div class="col2">
                                    <h4>15:15</h4>
                                </div>

                                <div class="col2">
                                    <h4>$180</h4>
                                </div>
                                <div class="col3">
                                    <h4>41 Seats</h4>
                                    <h4>20 Window</h4>
                                </div>
                            </div>
                        </div>
                        <div class="search-detail">
                            <div class="row">
                                <div class="col4">
                                    <h3>Etiquette 101</h3>
                                    <h4>Mercedes Benz A/C (2+2)</h4>
                                </div>
                                <div class="col2">
                                    <h4>13:10</h4>

                                </div>
                                <div class="col2">
                                    <h4> 02h 05m
                                    </h4>
                                </div>
                                <div class="col2">
                                    <h4>15:15</h4>
                                </div>

                                <div class="col2">
                                    <h4>$180</h4>
                                </div>
                                <div class="col3">
                                    <h4>41 Seats</h4>
                                    <h4>20 Window</h4>
                                </div>
                            </div>
                        </div>

                        <div class="search-detail">
                            <div class="row">
                                <div class="col4">
                                    <h3>Etiquette 101</h3>
                                    <h4>Mercedes Benz A/C (2+2)</h4>
                                </div>
                                <div class="col2">
                                    <h4>13:10</h4>

                                </div>
                                <div class="col2">
                                    <h4> 02h 05m
                                    </h4>
                                </div>
                                <div class="col2">
                                    <h4>15:15</h4>
                                </div>

                                <div class="col2">
                                    <h4>$180</h4>
                                </div>
                                <div class="col3">
                                    <h4>41 Seats</h4>
                                    <h4>20 Window</h4>
                                </div>
                            </div>
                        </div>
                        <div class="search-detail">
                            <div class="row">
                                <div class="col4">
                                    <h3>Etiquette 101</h3>
                                    <h4>Mercedes Benz A/C (2+2)</h4>
                                </div>
                                <div class="col2">
                                    <h4>13:10</h4>

                                </div>
                                <div class="col2">
                                    <h4> 02h 05m
                                    </h4>
                                </div>
                                <div class="col2">
                                    <h4>15:15</h4>
                                </div>

                                <div class="col2">
                                    <h4>$180</h4>
                                </div>
                                <div class="col3">
                                    <h4>41 Seats</h4>
                                    <h4>20 Window</h4>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('include/footer.php');
?>