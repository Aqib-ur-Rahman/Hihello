<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/mysignupstyle.css">
    <link rel="icon" href="images/hihello.png" type="image/x-icon">
    <title>Create Card | HiHello</title>
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
                Please enter the details of new work card 
            </div>

            <div>
                <label class="name-label">Fullname</label><br>
                <input type="text" name="fullname-input" required>
            </div>

            <div>
                <label class="email-label">Email</label><br>
                <input type="email" name="email-input" required>
            </div>

            <div>
                <label class="contact-label">Contact Number (03XX-XXXXXXX)</label><br>
                <input type="text" name="contact-input" id="contact" pattern="^03[0-9]{2}-[0-9]{7}$" required>
            </div>

            <div>
                <label class="designation-label">Designation</label><br>
                <input type="text" name="designation-name" id="designation-name" required>
            </div>

            <div>
                <label class="organization-name-label">Organization name</label><br>
                <input type="text" name="organization-name" id="organization-name" required>
            </div>
            
            <div>
                <label class="organization-address-label">Organization address</label><br>
                <input type="text" name="organization-address" id="organization-address" required>
            </div>

            <div>
                <button type="submit" id="create-card-btn" class="btn dark-bg-btn">Create</button>
            </div>

        </div>
    </form>

</body>

</html>