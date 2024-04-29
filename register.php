<?php

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</head>
<body>
    <div id="container">
        <h1 class="text-center mt-5 mb-5">Zarejestruj konto:</h1>
        <div id="loginForm" class="col-4 offset-4 mt-5">
            <form action="register.php" method="post">
                <label for="emailInput" class="form-label">Adres e-mail:</label>
                <input type="email" class="form-control mb-3" name="email" id="emailInput">

                <label for="passwordInput" class="form-label">Hasło:</label>
                <input type="password" class="form-control mb-3" name="password" id="passwordInput">

                <button type="submit" class="btn btn-primary w-100 mt-3">Zarejestruj</button>
            </form> 
        </div>
    </div>
</body>
</html>