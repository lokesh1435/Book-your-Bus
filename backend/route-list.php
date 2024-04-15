<?php
include_once('../database/connection.php');
session_start();

$sql = "SELECT * FROM routes";

if($_SESSION['admin']['role'] != 'admin'){
    $sql = $sql .' WHERE user_id = '. $_SESSION['admin']['id']; 
}

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

include_once('include/header.php');
include_once('include/sidebar.php');
?>

<div class="heading">
    <h2>Routes</h2>
    <?php if($_SESSION['admin']['role'] == 'busoperator'){ ?>
    <a href="add-routes.php" class="btns">Add New Route</a>
    <?php } ?>
</div>
<div class="table-container">
<table class="table-responsive">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Start Point</th>
            <th>End Point</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sr = 1;
        While($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $sr++; ?></td>
            <td><?php echo $row['start_point']; ?></td>
            <td><?php echo $row['end_point']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>

</div>
</body>

</html>