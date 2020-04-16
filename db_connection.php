<?php
    function openCon() {
        $dbhost = "localhost:3306";
        $dbuser = "root";
        $dbpass = "";
        $db = "bookdb";

        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
        return $conn;
    }

    function CloseCon($conn) {
        $conn -> close();
    }
?>