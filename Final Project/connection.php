<?php
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $hotel = $_POST["Hotel_Name"];
    $stars = $_POST["stars"];
    $description = $_POST["Experience"];

    $con = new mysqli("localhost", "root", "", "finalproject");
    if ($con->connect_error) {
        die("connection failed : ".$con->connect_error);
    }
    else {
        $stmt = $con->prepare("INSERT INTO Comment(name, email, hotel, stars, description) values(?,?,?,?,?)");
        $stmt->bind_param("sssis", $name, $email, $hotel, $stars, $description);
        $stmt->execute();
        echo "Comment published successfully.";
    }

    $stmt->close();
    $con->close();
?>