<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/myhomestyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <title>HiHello | Leading Business Card Platform</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg mynavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/hihello.png" alt="" width="40" height="40" class="d-inline-block">
                HiHello
            </a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-other-items">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn dark-btn"
                            onclick="window.location.href='login'">Login</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn dark-btn" onclick="window.location.href='/signup'">Sign
                            up</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row row1">
            <div class="col">
                <h1 class="intro-1">The Leading Digital Business Card Platform</h1><br><br>
                <p>Loved by millions worldwide, HiHello helps everyone—from individuals to enterprises—turn each
                    customer touchpoint into a branded, interactive, and measurable opportunity.
                </p><br><br>
                <button type="button" class="btn dark-btn dark-bg-btn" onclick="window.location.href='/signup'">Get
                    Started</button>
            </div>

            <div class="col">
                <img class="img-fluid" src="images/digital-cards.png" alt="">
            </div>
        </div>

        <div class="row row2">
            <div class="col middle-style">
                <img class="img-fluid" src="images/cards.png" alt="">
            </div>

            <div class="col middle-style">
                <h1><b>The Best Digital Business Card</b></h1><br>
                <p>Create a digital business card that includes your brand's most important information. With advanced
                    options for design, sharing, analytics, integrations and more, HiHello can generate more
                    opportunities and insights from your business interactions.
                </p><br>
                <button type="button" class="btn dark-btn">Learn more</button>
            </div>
        </div>

        <div class="row row3">
            <div class="col middle-style">
                <h1><b>Share your card with anyone</b></h1><br>
                <p>You can share your digital business card with anyone, even if they don't have the
                    app. We'll even send you a reminder for you to follow up, so you'll never let a new connection slip
                    away. There are several ways to share your HiHello card, including a QR code, email, text, WhatsApp,
                    social media, copy link, NFC tag, Apple Watch app, iMessage app, and AirDrop.
                </p><br>
                <button type="button" class="btn dark-btn">Learn more</button>
            </div>

            <div class="col middle-style">
                <img class="img-fluid" src="images/connected.png" alt="">
            </div>
        </div>

        <div class="row row4">
            <div class="col col-4">
                <div class="up-title">CONNECT WITH YOUR CUSTOMER, ANYTIME, ANYWHERE
                </div><br>
                <div>
                    <h1 class="dgcard-title"><b>Digital Business Card</b></h1><br>
                </div>

                <div>
                    <p class="subtitle">Create, customize, and share digital business cards with HiHello, the most trusted digital branding platform.
                    </p>
                </div>

                <div class="dg-card-img">
                    <img class="img-fluid" src="images/share-card.png" alt="" width="60%">
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn dark-btn dgcard-btn"
                            onclick="window.location.href='/login'">Create your card</button>

                        <button type="button" class="btn light-btn dgcard-btn"
                            onclick="window.location.href='/signup'">Sign Up</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="row row5">
            <div class="col">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl ac tincidunt
                    consectetur, elit turpis tincidunt est, eu tincidunt nisl turpis eu risus.</p>
            </div>
            <div class="col">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: +1 123 456 7890</p>
                <p>Address: 123 Street, City, Country</p>
            </div>
            <div class="col">
                <h3>Follow Us</h3>
                <ul class="social-media">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</body>

@if (session('logOutError'))
<script>alert('Logout Error: {{ session('logOutError') }}')</script>
@elif (session('logOutSuccess'))
<script>alert('Logout Success: {{ session('logOutSuccess') }}')</script>
@endif

</html>