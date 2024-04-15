<?php
include_once('../database/connection.php');
session_start();

if(isset($_POST['submit'])){
    $from = $_POST['from'];
    $end = $_POST['end'];

    $stmt=$connection->prepare("INSERT INTO routes (user_id,start_point,end_point) VALUES(?,?,?)");
    $stmt->bind_param("sss",$_SESSION['admin']['id'],$from,$end);
    if($stmt->execute()){
        echo "<script>alert('New Route Added')
        window.location='route-list.php';
        </script>";
    }
}

include_once('include/header.php');
include_once('include/sidebar.php');
?>

<heading>
                <h2>Routes</h2>

            </heading>
            <div class="booking-form">
                <form action="" method="POST">
                        <div class="input-group"> <label for="name">Start Point</label>
                            <input type="text" name="from" placeholder="Start Point" required></div>
                        <div class="input-group"> <label for="Email">End Point</label>
                            <input type="text" name="end" placeholder="End Point" required></div>
                    <div class="submit-btn">
                        <button class="btns" name="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>