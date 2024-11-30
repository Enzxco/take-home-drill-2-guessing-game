<?php

include('conn.php');

session_start();

$username = htmlspecialchars($_POST['username']);
$guess = intval($_POST['guess']);

$correctNumber = $_SESSION['correctNumber'];

$sql = "SELECT tries, wins, loses FROM players WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!$row) {
    $sql = "INSERT INTO players (username, tries, wins, loses) VALUES ('$username', 0, 0, 0)";
    $conn->query($sql);
    $row = ['tries' => 0, 'wins' => 0, 'loses' => 0];
}

$currentTries = $row['tries'] + 1;

if ($guess === $correctNumber) {

    $currentWins = $row['wins'] + 1;
    $sql = "UPDATE players SET wins = $currentWins, tries = $currentTries WHERE username = '$username'";
    $conn->query($sql);
    echo "<h2>Congratulations, $username! You guessed the correct number: $correctNumber.</h2>";
} else {
    $currentLoses = $row['loses'] + 1;
    $sql = "UPDATE players SET loses = $currentLoses, tries = $currentTries WHERE username = '$username'";
    $conn->query($sql);
    echo "<h2>Sorry, $username. That was incorrect. The correct number was $correctNumber.</h2>";
}

header("Location: ranking.php?username=$username");
exit();
?>
