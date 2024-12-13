<?php

require_once 'php/utils.php'; // Include helper functions
session_start();

// Fetch popular skills
$popularSkills = fetchData("SELECT name FROM skills ORDER BY id DESC LIMIT 5"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'php/header.php'; ?>

    <!-- Main content for the homepage -->
    <h1>Welcome to SkillSwap</h1>
    <p>Discover and connect with experts!</p>
    
    <h2>Popular Skills</h2>
    <ul>
        <?php foreach ($popularSkills as $skill) : ?>
            <li><?php echo $skill['name']; ?></li>
        <?php endforeach; ?>
    </ul>

    <?php include 'php/footer.php'; ?>
</body>
</html>