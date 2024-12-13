<?php 

session_start(); // Start session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>SkillSwap</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="skills.php">Find Skills</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li><