<?php
//connection
include_once('../database/connection.php');
session_start();

//redirect to homepage if user already login
if(isset($_SESSION['admin'])){
    header('location:index.php');
    exit();
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt=$connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result=$stmt->get_result();

    if($row=$result->fetch_assoc()){
        $_SESSION['admin'] = $row;
        if($_SESSION['admin']['status'] == 0){
            echo "<script>alert('Account Is Disabled, Contact Admin')
            window.location='logout.php';
            </script>";
        }elseif(($_SESSION['admin']['role'] != 'admin' AND $_SESSION['admin']['role'] != 'busoperator')){
            echo "<script>alert('Permission Denied Admin Area')
            window.location='logout.php';
            </script>";
        }
        echo "<script>alert('Login Successfully')
        window.location='index.php';
        </script>";
    }else{
        echo "<script>alert('! Invalid Email/Password Try Again')</script>";
    }
}

//header file
include_once('include/login_header.php');
?>

<div class="login">
        <div class="login-form">
            <form action="" method="POST">
                <h2>Login</h2>
                <p></p>
                <div class="input-group">
                    <label for="username">Email</label>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="login-btn">
                    <button name="submit" class="btns">Login</button>
                    <!-- <a href="#">Login</a> -->
                </div>
            </form>
        </div>
    </div>

<?php
include_once('include/login_footer.php');
?>