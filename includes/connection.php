<?php
// Database Connection
    function connectDatabase() {
        $host = 'localhost';
        $user = 'your_username';
        $password = 'your_password';
        $dbname = 'your_database';

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
?>