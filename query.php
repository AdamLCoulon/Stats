<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Team Table Query</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>Home Team Table Query</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>game_id</th>
                <th>Team_Abbrev</th>
                <th>Team_Score</th>
                <th>Team_Pace</th>
                <th>Team_efg_pct</th>
                <th>Team_off_rtg</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = $_POST["query"];
            $conn_query = new mysqli("localhost", "root", "root", "nba_stats");

            if ($conn_query->connect_error) {
                die("Connection failed: " . $conn_query->connect_error);
            }

            $sql_query = $query;
            $result = $conn_query->query($sql_query);

            if (!$result) {
                die("Invalid query: " . $conn_query->error);
            }

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['game_id'] . "</td>
                    <td>" . $row['Team_Abbrev'] . "</td>
                    <td>" . $row['Team_Score'] . "</td>
                    <td>" . $row['Team_pace'] . "</td>
                    <td>" . $row['Team_efg_pct'] . "</td>
                    <td>" . $row['Team_off_rtg'] . "</td>
                </tr>";
                
            }
            ?>
        </tbody>
    </table>
</body>
</html>