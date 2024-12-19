<?php
    include('includes/connection.php');
    include('includes/alert.php');

    function Create($sql) {
        $conn = connectDatabase();

        if ($conn->query($sql) === TRUE) {
            $insertedId = $conn->insert_id; // Get the last inserted ID
            $conn->close();
            return true;
            //return $insertedId;
        } else {
            //error_log("Error: " . $sql . "\n" . $conn->error);
            ShowError("Error: " . $sql . "\n" . $conn->error);
            $conn->close();
            return false;
        }
    }

    function ReadSingleValue($sql) {
        $conn = connectDatabase();
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $conn->close();
            return $data;
        } else {
            $conn->close();
            return null;
        }
    }

    function ReadMultipleRows($sql) {
        $conn = connectDatabase();
        $result = $conn->query($sql);
    
        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
    
        $conn->close();
        return $data;
    }

    function UpdateData($sql) {
        $conn = connectDatabase();
    
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            ShowError("Error updating record: " . $conn->error);
            $conn->close();
            return false;
        }
    }

    function DeleteData($sql) {
        $conn = connectDatabase();
    
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            ShowError("Error deleting record: " . $conn->error);
            $conn->close();
            return false;
        }
    }
?>
