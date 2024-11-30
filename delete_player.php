<?php

include('conn.php');

$username = htmlspecialchars($_POST['username']);

$sql = "DELETE FROM players WHERE username = '$username'";
if ($conn->query($sql) === TRUE) {
    echo "Player $username deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}

header("Location: ranking.php");
exit();
?>
