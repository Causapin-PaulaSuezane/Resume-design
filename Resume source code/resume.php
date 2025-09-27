<?php
session_start(); // Start the session to access session variables

if (!isset($_SESSION['username'])) { // Check if the user is logged in
    header("Location: login.php"); // Redirect to login page if not logged in
    exit(); 
}

$name = "Paula Suezane Z. Causapin";
$title = "College Student";
$email = "23-02644@g.batstate-u.edu.ph";
$phone = "+63 945 6199 708";
$address = "Balayan, Batangas, Philippines";
$github = "github.com/paulacausapin";

$skills = [
    "HTML" => 30,
    "PHP" => 25,
    "Python" => 29,
    "C++" => 40,
    "MySQL" => 58
];

$aboutme = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis est, feugiat sit amet laoreet quis, pulvinar eu tortor. Curabitur at orci enim. Vestibulum porta lacus mi, vitae rutrum massa dapibus sed. Maecenas venenatis pellentesque consequat. Donec ornare bibendum nunc, non elementum justo tempus at. Mauris sed sem aliquam, ornare diam eget, rutrum ligula. Sed placerat augue vitae sem malesuada, eu condimentum ipsum auctor.";

$education = [
    "college" => [
        "level" => "College Level",
        "program" => "Bachelor of Science in Computer Science",
        "school" => "Batangas State University",
        "years" => "2023 - Present"
    ],
    "senior" => [
        "level" => "Senior High School",
        "program" => "Science, Technology, Engineering and Mathematics",
        "school" => "STI College Balayan",
        "years" => "2021-2023"
    ],
    "junior" => [
        "level" => "Junior High School Level",
        "program" => "Junior High School",
        "school" => "Core Science Academy",
        "years" => "2018-2020"
    ],
    "junior2" => [
        "level" => "Junior High School Level",
        "program" => "Junior High School",
        "school" => "Balayan National High School",
        "years" => "2017-2018 & 2020-2021"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - <?= $name ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header-bar">
        <div class="welcome-message">Welcome, <?= $_SESSION['username'] ?>!</div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="content-container">
        <div class="sidebar">
            <div class="profile-section">
                <div class="profile-image">
                    <img src="cinnamoroll.jpg" alt="Profile Image">
                </div>
                <div class="name"><?= $name ?></div>
                <div class="title"><?= $title ?></div>
            </div>
            
            <div class="section">
                <h3>Contact</h3>
                <div class="contact-item"><?= $phone ?></div>
                <div class="contact-item"><?= $email ?></div>
                <div class="contact-item"><?= $address ?></div>
                <div class="contact-item"><?= $github ?></div>
            </div>

            <div class="section">
                <h3>Skills</h3>
                <?php foreach($skills as $skill_name => $level): ?>
                    <div class="skill-item">
                        <div class="skill-name"><?= $skill_name ?></div>
                        <div class="skill-bar">
                            <div class="skill-fill" style="width: <?= $level ?>%"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="main-content">
            <div class="main-section">
                <h2>About Me</h2>
                <div class="summary-text">
                    <p><?= $aboutme ?></p>
                </div>
            </div>

            <div class="main-section">
                <h2>Education</h2>
                <?php foreach($education as $edu): ?>
                    <div class="education-item">
                        <div class="program"><?= $edu['program'] ?></div>
                        <div class="school"><?= $edu['school'] ?></div>
                        <div class="years"><?= $edu['years'] ?></div>
                        <div class="level"><?= $edu['level'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>