<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use classes as cl; 
use traits as tr;
use routes as ro;

$router = new ro\Router();

// Define GET routes
$router->get('/', function () {
    echo '
    
    <form action="/" method="post" enctype="multipart/form-data">
        <label for="file">Select file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload File">
    </form>
    ';

    echo "User Name: " . $_GET["fname"] . "<br>";
    echo "User LastName: " . $_GET["lname"];
})
->post('/', function () {
    echo '
    
    <form action="/" method="post" enctype="multipart/form-data">
        <label for="file">Select file:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload File">
    </form>

    ';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $fileUploader = new cl\uploadFiles();
        $fileUploader->uploadFile($_FILES["file"]);
    }
})
->get('/about', function () {
    echo "about";
})
->get('/contact', function () {
    echo "contact";
});

// Define POST route
$router->post('/submit', function () {
    // Handle form submission logic here
    echo "User Name: " . $_POST["fname"] . "<br>";
    echo "User LastName: " . $_POST["lname"];
});

// // Get the requested URI and method
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($requestMethod, $requestUri);