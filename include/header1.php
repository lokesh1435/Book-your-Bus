<?php 

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$parts_url = explode('/', $path);
$current_url = $parts_url[2];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-wrap">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="logo" title="logo">
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <ul>
                        <li>
                            <a <?php if($current_url == "index1.php"){ ?>class="active" <?php } ?> href="index1.php">Home</a>
                        </li>
                        <li>
                            <a <?php if($current_url == "about.php"){ ?>class="active" <?php } ?> href="about.php">About</a>
                        </li>
                        <li>
                            <a <?php if($current_url == "contact.php"){ ?>class="active" <?php } ?> href="contact.php">Contact</a>
                        </li>
                        <?php if(empty($_SESSION['user'])){ ?>
                        <li>
                            <a <?php if($current_url == "login.php"){ ?>class="active" <?php } ?> href="login.php">Login</a>
                        </li>
                        <?php }else{ ?>
                            <li>
                            <a <?php if($current_url == "my-bookings.php"){ ?>class="active" <?php } ?> href="my-bookings.php">My Bookings</a>
                        </li>                            
                            <li>
                            <a <?php if($current_url == "profile.php"){ ?>class="active" <?php } ?> href="profile.php">My Profile</a>
                        </li>           
                      
                            <?php echo $_SESSION['user']['name']; ?>
                                <a href="logout.php">/Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>