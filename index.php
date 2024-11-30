<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start New Game</title>
    <style>
        body, h1, h3, label, button {
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

        form {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 320px;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        input[type="text"]::placeholder {
            color: #aaa;
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

        form label {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Welcome to the Guessing Game</h2>
    <form action="game.php" method="POST">
        <label for="username">Enter your Username:</label>
        <input type="text" name="username" id="username" required placeholder="Enter username">
        <button type="submit">Start Game</button>
    </form>
</body>
</html>
