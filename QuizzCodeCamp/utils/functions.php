<?php

function nettoyage($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

// function DBconnect(){
//     $bdd = new PDO("mysql:host=localhost;dbname=quizz; charset=utf8mb4",  "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//     return $bdd;
// }

function DBconnect(): PDO{
    // Load environment variables from .env file
    $envFile = __DIR__ . '/../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $_ENV[trim($name)] = trim($value);
            }
        }
    }

    // Check if all required environment variables are set
    $required_vars = ['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME'];
    foreach ($required_vars as $var) {
        if (!isset($_ENV[$var])) {
            throw new Exception("Environment variable $var is not set. Please check your .env file.");
        }
    }

    $conn = new PDO(
        "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4", 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASSWORD'], 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    return $conn;
}

?>