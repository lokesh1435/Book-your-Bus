<?php
include_once('../database/connection.php');
session_start();

//add buses
if(isset($_POST['submit'])){
    $busno = $_POST['busno'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $folder = "./busimages/" . $image;
    move_uploaded_file($image_tmp,$folder);

    $stmt=$connection->prepare("INSERT INTO buses (added_by,bus_no,image,seating_capacity,status) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss",$_SESSION['admin']['id'],$busno,$image,$capacity,$status);
    if($stmt->execute()){
        echo "<script>alert('New Bus Added To The Fleet')
        window.location='buses.php';
        </script>";
    }
    
}

include_once('include/header.php');
include_once('include/sidebar.php');
?>

<heading>
    <h2>Add New Bus</h2>

</heading>
<div class="booking-form">
    <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-group"> <label for="name">Bus No</label>
                <input type="text" name="busno" placeholder="Bus No" required>
            </div>
            <div class="input-group"> <label for="Email">Seating Capacity</label>
                <input type="number" placeholder="Seating Capacity" name="capacity" min="32" max="72" required>
            </div>
            <div class="input-group"> <label for="name">Image</label>
                <input type="file" name="image" placeholder="Image" required>
            </div>
            <div class="input-group"> <label for="Email">Status</label>
            <select name="status" id="">
                <option value="">Select Current Status</option>
                <option value="1">Active</option>
                <option value="0">In-Active</option>
            </select>
            </div>
        <div class="submit-btn"> 
            <button class="btns" name="submit">Submit</button></div>
    </form>
</div>
</div>
</div>
</body>

</html>