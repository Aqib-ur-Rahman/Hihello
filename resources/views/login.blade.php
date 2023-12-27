<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/myloginstyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <title>Login | HiHello</title>
</head>

<body>

    <form method="post">
        @csrf

        <div class="container">
            <div class="logo-container">
                <img class="home-redirect" src="images/hihello.png" width="70px" height="70px" alt="image" onclick="window.location.href='/home'">
                <h1 class="logo-text home-redirect" onclick="window.location.href='/home'">HiHello</h1>
            </div>
            <div>
                <label class="email-label">Enter your email</label><br>
                <input type="email" name="email-input" required>
            </div>

            <div>
                <label class="password-label">Enter your password</label><br>
                <input type="password" name="password-input" required>
            </div>

            <div>
                <button type="submit" class="btn dark-bg-btn">Submit</button>
                <p>By continuing, you acknowledge that you have read, understood, and agree to our terms and conditions.
                </p>
            </div>

            <div>
                <p class="forgot-password">Forgot password?</p>
                <p class="create-account" onclick="window.location.href='/signup'">No account? Create one.</p>
            </div>

        </div>
    </form>

</body>

@if (session('accountCreationSuccess'))
<script>alert("Success: {{ session('accountCreationSuccess') }}");</script>
@elseif (session('accountCreationError'))
<script>alert("Error: {{ session('accountCreationError') }}");</script>
@elseif (session('loginError'))
<script>alert("Error: {{ session('loginError') }}");</script>
@elseif (session('loggedOut'))
<script>alert("Success: {{ session('loggedOut') }}");</script>
@endif

</html>