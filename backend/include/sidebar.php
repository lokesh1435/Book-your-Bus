<body>
    <div class="side-bar">
        <div class="logo">
            <a href="index.php">
                <img src="image/logo.png" alt="logo" title="logo">
            </a>
        </div>
        <nav>
            <ul>
                <li>
                <i class="fa fa-home"></i> <a href="index.php">Dashboard</a>
                </li>
                <?php if ($_SESSION['admin']['role'] == 'admin') { ?>
                    <li>
                    <i class="fa fa-users"></i>   <a href="userslist.php">User List</a>
                    </li>
                <?php } ?>
                <li>
                <i class="fa fa-bus"></i>  <a href="buses.php">Buses</a>
                </li>
                <li>
                <i class="fa fa-road"></i> <a href="route-list.php">Routes</a>
                </li>
                <li>
                <i class="fa fa-list"></i> <a href="schedules.php">Schedules</a>
                </li>
                <li>
                <i class="fa fa-book"></i> <a href="bookings.php">Bookings</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="dashboard">

        <div class="dashboard-info">
            <nav>
                <div class="user">
                    <?php echo $_SESSION['admin']['name'] ?><a href="logout.php">,Logout</a>
                </div>
            </nav>