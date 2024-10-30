<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&family=Sedan+SC&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css folder/login.css">

</head>
<body>
    
    <form class="container" action="backend/logcheck.php" method="post">  

        <div class="container-login">
            <h1>Librarian Login Form</h1>
        </div>

        <div class="user-details">
            <div class="user-container">
                <input type="text" name="username" class="input-box" placeholder="Enter Username" required>
            </div>

            <div class="user-container">
                <input type="password" name="password" class="input-box" placeholder="Enter Password" required>
            </div>
        </div>

        <div class="button">
            <button type="submit" name="login" class="custom-button">Sign in</button>
        </div>


    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>