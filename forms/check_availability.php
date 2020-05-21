<?php
require_once("../assets/config.php");

// Code for checking email availabilty
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT email FROM  user_info WHERE email=:email";
    $query = $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        echo "<span style='color:red'>Email-id already exists.</span>";
    } else {
        echo "<span style='color:green'>Email-id available for Registration.</span>";
    }
}
