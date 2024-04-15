<?php
//connection file
include_once('database/connection.php');
session_start();

//redirect user if already login
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}

//register user
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $role=$_POST['role'];
    if($role == 'user'){
        $status=1;
        $document = NULL;
    }
    if($role == 'busoperator'){
        $status=0;
        if(isset($_FILES['document']['name'])){
            $document = $_FILES['document']['name'];
            $document_tmp = $_FILES['document']['tmp_name'];
            $folder = "./documents/" . $document;
            move_uploaded_file($document_tmp,$folder);
        }
    }


    $stmt=$connection->prepare("INSERT INTO users (name,contact,email,password,role,status,document) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$name,$contact,$email,$password,$role,$status,$document);
    if($stmt->execute()){
        echo "<script>alert('Registered Successfully')
        window.location='login.php';
        </script>";
    }else{
        echo "<script>alert('Something Went Wrong Try Again')</script>";
    }
}

//header
include_once('include/header.php');
?>
    <section class="login register">
        <div class="container">
            <div class="form-wrap">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h2 id="user_reg">Customer Register</h2>
                    <div class="input-grid">
                        <label for="Email">Registered As</label>
                        <select name="role" id="roleid" required>
                            <option value="user">Customer</option>
                            <option value="busoperator">Bus Operator</option>
                        </select>
                    </div>
                    <div class="input-grid" id="doc" style="display:none">
                        <label for="Email">Valid Authorised Document (PDF Format)</label>
                        <input type="file" placeholder="UserName" name="document" accept=".pdf" title="Upload PDF">
                    </div>
                    <div class="input-box">
                    <div class="input-grid">
                        <label for="Email">Name</label>
                        <input type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-grid">
                        <label for="Email">Contact</label>
                        <input type="tel" placeholder="Contact" name="contact" required>
                    </div>
                    </div>
                    <div class="input-box">
                    <div class="input-grid">
                        <label for="Email">Email</label>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-grid">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" name="password" minlength="8" required>
                    </div>
                    </div>
                    <div class="form-btn">
                        <button class="btns" name="submit">Register</button>
                    </div>
                    <br>
                    <div class="text">
                        <p>Already have an account?
                            <a href="login.php">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
include_once('include/footer.php');
?>