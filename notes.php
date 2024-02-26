<?php
session_start();   

include('connection.php');

if (isset($_SESSION['hasLog'])){
    $haslog = $_SESSION['hasLog'];
} else {
    $haslog = 0;
}

if (empty($haslog)){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
        /* Add your CSS styles here */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        textarea {
            width: 100%; /* Take full width */
            height: calc(100vh - 250px); /* Adjust height as needed */
            padding: 10px;
            font-size: 16px;
            resize: none;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div id="wrapper">
        <?php include ('menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column" style="background-color: #eeeeee;">
            <div id="content">
                <?php include('navbar.php'); ?>
                <div class="container">
                    <form action="save_notes.php" method="post">
                        <textarea name="notes" placeholder="Enter your notes here..." rows="10"></textarea>
                        <br>
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
