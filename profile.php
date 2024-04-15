<?php
//connection file
include_once('database/connection.php');
session_start();

//redirect user if already login
if(empty($_SESSION['user'])){
    header('location:login.php');
    exit();
}

    
$stmt=$connection->prepare("SELECT name,contact,email FROM users WHERE id = ?");
$stmt->bind_param("s",$_SESSION['user']['id']);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();


//update profile
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];

    $stmt=$connection->prepare("UPDATE users SET name = ?,contact = ? WHERE id = ?");
    $stmt->bind_param("sss",$name,$contact,$_SESSION['user']['id']);
    if($stmt->execute()){
        echo "<script>alert('Profile Updated Successfully')
        window.location='profile.php';
        </script>";
    }else{
        echo "<script>alert('Something Went Wrong Try Again')</script>";
    }
}
    // $stmt=$connection->prepare("SELECT * FROM users WHERE id = ?");
    // $stmt->bind_param("s",$_SESSION[]);
    // if($stmt->execute()){
    //     echo "<script>alert('Registered Successfully')
    //     window.location='login.php';
    //     </script>";
    // }else{
    //     echo "<script>alert('Something Went Wrong Try Again')</script>";
    // }

//header
include_once('include/header1.php');
?>
    <section class="login register">
        <div class="container">
            <div class="form-wrap">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h2>Update Profile</h2>
                    <div class="input-grid">
                        <label for="Email">Email</label>
                        <input type="email" placeholder="Email" value=<?php echo $row['email'] ?> name="email" readonly>
                    </div>
                    <div class="input-box">
                    <div class="input-grid">
                        <label for="Email">Name</label>
                        <input type="text" placeholder="Name" value="<?php echo $row['name'] ?>" name="name" required>
                    </div>
                    <div class="input-grid">
                        <label for="Email">Contact</label>
                        <input type="tel" placeholder="Contact" value="<?php echo $row['contact'] ?>" name="contact" required>
                    </div>
                    </div>
                    <div class="form-btn">
                        <button class="btns" name="update">Update</button>
                    </div>
                    <br>
                    <!-- <div class="text">
                        <p>Already have an account?
                            <a href="login.php">Login</a>
                        </p>
                    </div> -->
                </form>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>