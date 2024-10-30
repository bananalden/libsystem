<?php 
//require 'backend/adminauthcheck.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&family=Sedan+SC&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css folder/registration.css">

</head>
<body>
    
    <form class="container" action="backend/logcheck.php" method="post">  

        <div class="container-login">
            <h1>User Request Form</h1>
        </div>

        <div class="user-details">
            <div class="user-container">
                <input type="text" class="input-box" placeholder="Enter First Name">
            </div>

            <div class="user-container">
                <input type="text" class="input-box" placeholder="Enter User Name">
            </div>

            <div class="user-container">
                <input type="password" class="input-box" placeholder="Enter Password">
            </div>

        </div>

        <div id="terms-condition" class="d-flex text-align-center justify-content-center ">
            <div class="form-check w-25 mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3" style="color: whitesmoke; font-size: 15px; cursor: pointer;">
                    I accept all terms & conditions
                </label>
            </div>
        </div>


        <div class="button">
            <button class="custom-button">Sign in</button>
        </div>

        <p id="login-now" class="small fw-bold mt-2 pt-1 mb-0 text-light"> Already have an account? <a href="#!"
                class="link-dange ms-1" style="color:#e85c29">Login now</a></p>


    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>