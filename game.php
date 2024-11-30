<?php
session_start();

// Check if the 'username' is set in the POST request
if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
} else {
    // Redirect to index.php if the username is not set
    header("Location: index.php");
    exit();
}

$correctNumber = rand(1, 50);

$_SESSION['correctNumber'] = $correctNumber;

echo "<h2>Welcome to the Game, $username!</h2>";
echo "<p>Guess a number between 1 and 50:</p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guessing Game</title>
    <style>
        body, h2, label, button, input {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            color: #333;
        }

        h2 {
            font-size: 32px;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <form action="check_guess.php" method="POST">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="number" name="guess" min="1" max="50" required>
        <button type="submit">Submit Guess</button>
    </form>
</body>
</html>