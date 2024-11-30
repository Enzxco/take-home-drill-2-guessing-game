<?php
include('conn.php');

$guessResultMessage = '';
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'correct') {
        $guessResultMessage = "<p class='correct-message'>Congratulations! You guessed the correct number!</p>";
    } else if ($_GET['result'] == 'incorrect') {
        $guessResultMessage = "<p class='incorrect-message'>Oops! Incorrect guess!</p>";
    }
}

$sql = "SELECT * FROM players ORDER BY tries ASC";
$result = $conn->query($sql);

?>

<div class="container">
    <h1>Leaderboard</h1>

    <?php if ($guessResultMessage != '') {
        echo $guessResultMessage;
    } ?>

    <table class="leaderboard">
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Tries</th>
            <th>Wins</th>
            <th>Loses</th>
            <th>Action</th>
        </tr>

        <?php
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            $username = isset($row['username']) ? htmlspecialchars($row['username']) : 'Unknown';
            $tries = isset($row['tries']) ? $row['tries'] : 0;
            $wins = isset($row['wins']) ? $row['wins'] : 0;
            $loses = isset($row['loses']) ? $row['loses'] : 0;

            echo "<tr>
                    <td>" . $rank++ . "</td>
                    <td>" . $username . "</td>
                    <td>" . $tries . "</td>
                    <td>" . $wins . "</td>
                    <td>" . $loses . "</td>
                    <td>
                        <form action='delete_player.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this player?\")'>
                            <input type='hidden' name='username' value='" . $username . "'>
                            <button type='submit' class='delete-link'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }
        ?>

    </table>

    <h3>What would you like to do next?</h3>

    <a href="game.php?username=<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" class="retry-link">Try Again</a>

    <a href="index.php" class="retry-link">New Player</a>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        text-align: center;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #4CAF50;
        font-size: 2em;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 1.5em;
        margin-bottom: 20px;
        color: #333;
    }

    .score, .rank {
        font-size: 1.2em;
        margin: 10px 0;
    }

    table.leaderboard {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    table.leaderboard th, table.leaderboard td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    table.leaderboard th {
        background-color: #4CAF50;
        color: #fff;
    }

    table.leaderboard tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table.leaderboard tr:hover {
        background-color: #f1f1f1;
    }

    a.delete-link {
        color: #e63946 /* Red color for delete link */
        text-decoration: none;
    }

    a.delete-link:hover {
        text-decoration: underline;
    }

    a.retry-link {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1em;
    }

    a.retry-link:hover {
        background-color: #45a049;
    }

    .correct-message {
        color: #4CAF50;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .incorrect-message {
        color: #f44336;
        font-size: 18px;
        margin-bottom: 20px;
    }
</style>