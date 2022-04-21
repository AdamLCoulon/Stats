# NBA Stats
NBA Stats Web Application

The NBA Stats Web Application is set up to manage and analyze NBA scoring statistics over the past year. The goal of this project is to understand the changes/adaptation of offensive trends in NBA scoring tactics and offense as a whole. The data is stored in a MySQL database and consists of three separate tables. The three tables include:
home_team
game_id (Primary key that identifies each game)
Team_Abbrev (A three letter identifier for each team)
Team_Score (The overall score obtained by the team)
Team_pace (The number of offensive possessions for the team)
Team_efg_pct (The overall field goal percentage for the team)
Team_off_rtg (The offensive efficiency for the team)

away_team
game_id (Primary key that identifies each game)
Opp_Abbrev (A three letter identifier for each team)
Opp_Score (The overall score obtained by the away team)
Opp_pace (The number of offensive possessions for the away team)
Opp_efg_pct (The overall field goal percentage for the away team)
Opp_off_rtg (The offensive efficiency for the away team)

player_stats
game_id (Primary key that identifies each game)
Player_Name (The name of the highest scorer of that game)
Pts (The number of points the player had)
Minutes (The number of minutes the player played)
Fga (The overall field goal percentage for the player)
Fg3a (The three-point field goal percentage for the player)

The Web Application consists of a home page that talks about the project the analyses that is possible with the data. The next three pages show samples of data from the three pages. There is an input page that allows users to insert data into the data base. This is done my using an HTML form and a PHP page that pulls the users input and runs it through the connected database and returns the results. The results are then displayed in an HTML table for user convenience. The last page includes a query form that allows the users to query the home_team table. This HTML form again attaches to a PHP page that runs the query through the database and either returns results in an HTML table or an error if the query is incorrect.
