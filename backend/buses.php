<?php
include_once('../database/connection.php');
session_start();

//redirect to login if user not login
if(empty($_SESSION['admin'])){
    header('location:login.php');
    exit();
}

//select all users record

$sql = "SELECT * FROM buses";

if($_SESSION['admin']['role'] != 'admin'){
    $sql = $sql .' WHERE added_by = '. $_SESSION['admin']['id']; 
}

$stmt=$connection->prepare($sql);
$stmt->execute();
$result=$stmt->get_result();

//header
include_once('include/header.php');
include_once('include/sidebar.php');
?>
<div class="heading">
    <h2>Buses</h2>
    <?php if($_SESSION['admin']['role'] == 'busoperator'){ ?>
    <a href="add-bus.php" class="btns">Add New Bus</a>
    <?php } ?>
</div>
<div class="table-container">
<table class="table-responsive">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Image</th>
            <th>Bus No</th>
            <th>Seating Capacity</th>
            <th>Status</th>
            <!-- <th>Action</th> -->
        </tr>
    </thead>
    <tbody>
        <?php 
        $sr = 1;
        While($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $sr++; ?></td>
            <td><img src="./busimages/<?php echo $row['image']; ?>" height="200"></td>
            <td><?php echo $row['bus_no']; ?></td>
            <td><?php echo $row['seating_capacity']; ?></td>
            <?php if($row['status'] == 1){ ?>
            <td>
                <a href="user-update.php?inactivebus=<?php echo $row['id']; ?>" onclick="return confirm('Sure To Unavailable Selected Bus ?')" class="pend">Available</a>
            </td>
            <?php } ?>
            <?php if($row['status'] == 0){ ?>
            <td>
            <a href="user-update.php?activebus=<?php echo $row['id']; ?>" onclick="return confirm('Sure To Available Current Bus ?')" class="cancel">Not_Available</a>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>

</div>
</body>

</html>