<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
    <header class="container text-center mt-5">
        <h1 class="display-4 border-bottom pb-1">Standard Manager</h1>
        <nav class="nav">
            <a class="nav-link" href= "index.php">Home</a>
            <a class="nav-link" href= "register.php">Register a new product</a>
            <div class="dropdown">
            <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Products
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item nav-link" href="books.php">Books</a></li>
                <li><a class="dropdown-item nav-link" href="dvds.php">DVDs</a></li>
                <li><a class="dropdown-item nav-link" href="furnitures.php">Furnitures</a></li>
            </ul>
        </div>
        </nav>
        
       
    </header>

</body>

</html>