<?php
session_start();
require("config.php");

if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['username'])) {
        die("Please enter a username.");
    } else if (empty($_POST['password'])) {
        die("Please enter a password.");
    }


    $query = "SELECT username FROM users WHERE USERNAME = ?";


    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('s', $_POST['username']);

        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($username);


        while ($stmt->fetch()) {
            if ($username != $_POST['username']) die('Incorrect username');


        }


    } else die('Username fetch failed');


    $query = "SELECT salt, password FROM users WHERE USERNAME = '$username'";


    if ($stmt = $mysqli->prepare($query)) {

        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($salt, $dbpassword);
        $stmt->fetch();

    } else die("Password fetch failed");


    $password = $_POST['password'];
    $password = hash('sha256', $password . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }


    $stmt->close();
    if ($password == $dbpassword) $_SESSION['username'] = $username;
    else {
        session_destroy();
        header("Location: ../index.html");

    }
}
?>