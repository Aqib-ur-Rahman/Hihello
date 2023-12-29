<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}"> -->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Admin Dashboard</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="images/hihello.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo" onclick="window.location.href='/home'">
                    <img src="images/hihello.png" width="27px" height="27px" alt="HiHello Logo" class="nav_logo-icon">
                    <span class="nav_logo-name">HiHello</span>
                </a>
                <div class="nav_list">
                    <a href="#dashboard" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <a href="#contacts" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Contacts</span>
                    </a>

                    <a href="#bookmarks" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Bookmarks</span>
                    </a>

                    <a href="#help" class="nav_link">
                        <i class='bx bx-question-mark nav_icon'></i>
                        <span class="nav_name">Help Center</span>
                    </a>

                    <a href="#settings" class="nav_link">
                        <i class='bx bx-cog nav_icon'></i>
                        <span class="nav_name">Settings</span>
                    </a>

                </div>
            </div>
            <a href="#signout" class="nav_link" onclick="confirmLogOut()">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="main-content">
        <h4>Welcome Admin,</h4>
    </div>
    <!--Container Main end-->

</body>

</html>

<script src="js/main-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>