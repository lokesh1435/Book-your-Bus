<?php
include_once('../database/connection.php');
session_start();

//redirect to login if user not login
if(empty($_SESSION['admin']) OR $_SESSION['admin']['role'] != 'admin' ){
    header('location:login.php');
    exit();
}

//select all users record
$stmt=$connection->prepare("SELECT * FROM users ORDER BY role ASC");
$stmt->execute();
$result=$stmt->get_result();

//header
include_once('include/header.php');
include_once('include/sidebar.php');
?>
<div class="heading">
    <h2>Users</h2>
</div>
<div class="table-container">
<table class="table-responsive">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Role</th>
            <th>Document</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sr = 1;
        While($row=$result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $sr++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo strtoupper($row['role']); ?></td>
            <td><?php echo $row['document']; ?></td>
            <?php if($row['status'] == 1){ ?>
            <td>
                <a href="user-update.php?inactive=<?php echo $row['id']; ?>" onclick="return confirm('Sure To Inactive Current User Account ?')" class="pend">Active</a>
            </td>
            <?php } ?>
            <?php if($row['status'] == 0){ ?>
            <td>
            <a href="user-update.php?active=<?php echo $row['id']; ?>" onclick="return confirm('Sure To Active Current User Account ?')" class="cancel">In-Active</a>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- <div class="pages">
                <div class="pagination-list">
                    <a href="bookings.html">Prev</a>


                    <a class="active" href=" bookings.html ">1</a>


                    <a href="bookings.html ">2</a>
                    <a href="bookings.html ">3</a>

                    <a href="bookings.html ">Next</a>

                </div>
            </div> -->
</div>
</div>

</div>
</body>

</html>