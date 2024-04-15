<?php
//connection file
include_once('database/connection.php');
session_start();

//redirect user if already login
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}

//login
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt=$connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result=$stmt->get_result();

    if($row=$result->fetch_assoc()){
        $_SESSION['user'] = $row;
        if($_SESSION['user']['status'] == 0){
            echo "<script>alert('Account Is Not-Active Contact Admin')
            window.location='logout.php';
            </script>";            
        }elseif($_SESSION['user']['role'] == "user"){
            echo "<script>alert('Login Successfully')
            window.location='index1.php';
            </script>";
        }
        elseif($_SESSION['user']['role'] == "busoperator"){
            echo "<script>alert('Login Successfully')
            window.location='index.php';
            </script>";}
    }else{
        echo "<script>alert('Invalid Email/Password Try Again');
        </script>";
    }
}

//header
include_once('include/header.php');
?>
<section class="login">
        <div class="container">
            <div class="form-wrap">
                <form action="" method="POST">
                    <h2>User Login</h2>
                    <div class="input-grid">
                        <label for="uername">Email</label>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-grid">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox">
                        <p>Remember Me</p>
                    </div>
                    <div class="form-btn">
                        <button class="btns" name="submit">Login</button>
                    </div>
                    <div class="text">
                        <p>Dont't have an account?
                            <a href="register.php">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>