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
<div class="center">
<h1>home_team Table</h1>
</div>
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

				// Home Team Variables
	$gameid = $_POST["gameid"];
	$teamabbrev = $_POST["teamabbrev"];
	$teamscore = $_POST["teamscore"];
	$teampace = $_POST["teampace"];
	$teamefg_pct = $_POST["teamefg_pct"];
	$teamoff_rtg = $_POST["teamoff_rtg"];

	// Away Team Variables
	$gameid_away = $_POST["gameid_away"];
	$oppabbrev = $_POST["oppabbrev"];
	$oppscore = $_POST["oppscore"];
	$opppace = $_POST["opppace"];
	$oppefg_pct = $_POST["oppefg_pct"];
	$oppoff_rtg = $_POST["oppoff_rtg"];

	//Player Stats Variable
	$gameid_player = $_POST["gameid_player"];
	$name = $_POST["name"];
	$points = $_POST["points"];
	$minutes = $_POST["minutes"];
	$fga = $_POST["fga"];
	$threefga = $_POST["3fga"];

	$conn = new mysqli("localhost", "root", "root", "nba_stats");

	// Check connection
	if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
	}
	echo "Database Connection Successful";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	$sql_insert_home = "INSERT INTO home_team (game_id, Team_Abbrev, Team_Score, Team_pace, Team_efg_pct, Team_off_rtg)
	VALUES ($gameid, '$teamabbrev', $teamscore, $teampace, $teamefg_pct, $teamoff_rtg)";

if ($conn->query($sql_insert_home) === TRUE) {
	echo "New Record Added to Home Team Table";
	echo "<br>";
	echo "<br>";
  } else {
	echo "Error: " . $sql_insert_home . "<br>" . $conn->error;
  }

  $sql_home = "SELECT * FROM home_team ORDER BY game_id desc limit 10";
  $result = $conn->query($sql_home);

  if (!$result) {
	  die("Invalid query: " . $conn->error);
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
<br>
<div class="center">
<h1>away_team Table</h1>
</div>
<br>
<br>
<table class="table">
<thead>
  <tr>
	  <th>game_id</th>
	  <th>Opp_Abbrev</th>
	  <th>Opp_Score</th>
	  <th>Opp_Pace</th>
	  <th>Opp_efg_pct</th>
	  <th>Opp_off_rtg</th>
  </tr>
</thead>
<tbody>
	  <?php
  $sql_insert_away = "INSERT INTO away_team (game_id, Opp_Abbrev, Opp_Score, Opp_pace, Opp_efg_pct, Opp_off_rtg)
  VALUES ($gameid_away, '$oppabbrev', $oppscore, $opppace, $oppefg_pct, $oppoff_rtg)";

if ($conn->query($sql_insert_away) === TRUE) {
  echo "New Record Added to Away Team Table";
  echo "<br>";
} else {
  echo "Error: " . $sql_insert_away . "<br>" . $conn->error;
}

$sql_away = "SELECT * FROM away_team ORDER BY game_id desc limit 10";
  $result_away = $conn->query($sql_away);

  if (!$result_away) {
	  die("Invalid query: " . $conn->error);
  }

  while($row_away = $result_away->fetch_assoc()) {
	  echo "<tr>
		  <td>" . $row_away['game_id'] . "</td>
		  <td>" . $row_away['Opp_Abbrev'] . "</td>
		  <td>" . $row_away['Opp_Score'] . "</td>
		  <td>" . $row_away['Opp_pace'] . "</td>
		  <td>" . $row_away['Opp_efg_pct'] . "</td>
		  <td>" . $row_away['Opp_off_rtg'] . "</td>
	  </tr>";
	  }
  ?>
</tbody>
</table>

<br>
<div class="center">
<h1>player_stats Table</h1>
</div>
<br>
<br>
<table class="table">
<thead>
  <tr>
	  <th>game_id</th>
	  <th>Player_Name</th>
	  <th>Pts</th>
	  <th>Minutes</th>
	  <th>Fga</th>
	  <th>Fg3a</th>
  </tr>
</thead>
<tbody>
	  <?php
  $sql_player_insert = "INSERT INTO player_stats (game_id, Player_Name, Pts, Minutes, Fga, Fg3a)
  VALUES ($gameid_player, '$name', $points, $minutes, $fga, $threefga)";

if ($conn->query($sql_player_insert) === TRUE) {
	echo "New Record Added to Player Stats Table";
	echo "<br>";
	} else {
	echo "Error: " . $sql_player_insert . "<br>" . $conn->error;
	}

	$sql_player = "SELECT * FROM player_stats ORDER BY game_id desc limit 10";
	$result_player = $conn->query($sql_player);
  
	if (!$result_player) {
		die("Invalid query: " . $conn->error);
	}
  
	while($row_player = $result_player->fetch_assoc()) {
		echo "<tr>
			<td>" . $row_player['game_id'] . "</td>
			<td>" . $row_player['Player_Name'] . "</td>
			<td>" . $row_player['Pts'] . "</td>
			<td>" . $row_player['Minutes'] . "</td>
			<td>" . $row_player['Fga'] . "</td>
			<td>" . $row_player['Fg3a'] . "</td>
		</tr>";
		}
		$conn->close();
		?>
  </tbody>
  </table>	
</body>
</html>
  
