<?php
    $conn = new mysqli('db403-mysql','root','P@ssw0rd','midterm_exam');
    if ($conn->connect_error) {
        echo $conn->connect_error;
        die();
    }