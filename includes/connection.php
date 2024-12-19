<?php
// Database Connection
    function connectDatabase() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'dayplanet';

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
?>