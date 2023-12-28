<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/mysignupstyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <title>SignUp | HiHello</title>
</head>

<body>

    <form id="myform" method="POST">
        @csrf

        <div class="container">
            <div class="logo-container">
                <img class="home-redirect" src="images/hihello.png" width="70px" height="70px" alt="image"
                    onclick="window.location.href='/home'">
                <h1 class="logo-text home-redirect" onclick="window.location.href='/home'">HiHello</h1>
            </div>
            <div class="description">
                Create an account to get started
            </div>

            <div>
                <label class="name-label">Enter your fullname</label><br>
                <input type="text" name="fullname-input" required>
            </div>

            <div>
                <label class="email-label">Enter your email</label><br>
                <input type="email" name="email-input" required>
            </div>

            <div>
                <label class="password-label">Enter your password</label><br>
                <input type="password" name="password-input" id="password" required>
            </div>

            <div>
                <label class="password-label">Confirm your password</label><br>
                <input type="password" id="confirmPassword" required>
            </div>

            <div>
                <div class="ack">
                    <input type="checkbox" required>
                    <p>I acknowledge that I have read, understood, and agree to our terms and conditions.</p>
                </div>

                <button type="submit" id="create-account-btn" class="btn dark-bg-btn">Create account</button>
            </div>

            <div>
                <p class="already-account" onclick="window.location.href='/login'">Already have an account? Login here.
                </p>
            </div>

            <div class="con-google" onclick="window.location.href='{{ route('google.signup') }}'">
                <img src="images/google.png" alt="Google" width="50px" height="50px">
                <label class="google-label">Continue with Google</label>
            </div>


        </div>
    </form>


</body>

</html>