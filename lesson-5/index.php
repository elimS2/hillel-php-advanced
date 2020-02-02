<?php

require_once('Soldier.php');
require_once('Team.php');

$team1 = new Team(6);
$team2 = new Team(10);

echo newline()."team1 Life Points:".newline();
$team1->showLifePoints();
echo newline()."team2 Life Points:".newline();
$team2->showLifePoints();

echo newline()."team1 Damage: {$team1->getDamage()}".newline();
echo "team2 Damage: {$team2->getDamage()}".newline();

$team2->takeHit($team1->getDamage());
$team1->takeHit($team2->getDamage());

echo newline()."____________________________".newline();

echo newline()."team1 Life Points:".newline();
$team1->showLifePoints();
echo newline()."team2 Life Points:".newline();
$team2->showLifePoints();

function newline() {
    return(PHP_SAPI === 'cli') ? PHP_EOL : "<br />";
}
