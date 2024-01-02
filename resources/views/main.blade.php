<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}"> -->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-BpxGj6GwRip+HLDq5Vtdq4+XHQ9yQJ8GFnz2DqSyHdAgpTziIh2L76g4ti+f4jB1d2+prVwJ+o7pVk5kmGxjZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <title>User Dashboard</title>
</head>

@if (session('authUserNotFound'))
<script>alert("Error: {{ session('authUserNotFound') }}")</script>
@endif

@if (session('cardCreationSuccessful'))
<script>alert("Success: {{ session('cardCreationSuccessful') }}")</script>
@endif

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="{{ session('avatar') }}" alt="User Avatar"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo" onclick="window.location.href='/home'">
                    <img src="images/hihello.png" width="27px" height="27px" alt="HiHello Logo" class="nav_logo-icon">
                    <span class="nav_logo-name">HiHello</span>
                </a>
                <div class="nav_list">
                    <a href="#dashboard" class="nav_link active" id="dashboardNav">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <a href="#cards" class="nav_link" id="cardsNav">
                        <i class='bx bx-credit-card nav_icon'></i>
                        <span class="nav_name">Cards</span>
                    </a>

                    <a href="#contacts" class="nav_link" id="contactsNav">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Contacts</span>
                    </a>

                    <a href="#bookmarks" class="nav_link" id="bookmarksNav">
                        <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Bookmarks</span>
                    </a>

                    <a href="#help" class="nav_link" id="helpNav">
                        <i class='bx bx-question-mark nav_icon'></i>
                        <span class="nav_name">Help Center</span>
                    </a>

                    <a href="#settings" class="nav_link" id="settingsNav">
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

    <!-- <form> -->
    <!--Container Main start-->
    <div class="main-content" id="main-content" data-user-id="{{ Session::get('id') }}">
        <h4>Welcome {{ session('name') }},</h4>
        <button id="retrieve-btn">Retrieve Contacts</button>
        <div id="contacts-div"></div>
    </div>
    <!--Container Main end-->

    <div class="details-modal" id="details-modal">
        <div><button id="close-button" class="bx bx-x"></button></div>
        <h1>Share your card</h1>
        <input type="text" value="Share link" id="text-to-copy" readonly>
        <button id="copy-button" class="bx bx-copy">COPY</button>
        <div id="copy-message-div"></div>
    </div>
    <div class="overlay" id="overlay"></div>

    <!-- </form> -->

</body>

</html>

<script src="js/main-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>