<?php

require_once('Soldier.php');
require_once('Commander.php');

class Team
{
    protected const MAX_SOLDIERS_COUNT = 10;
    protected $teamMembers;

    public function __construct($teamSize)
    {
        $this->generateTeam($teamSize);
    }

    public function showLifePoints()
    {
        foreach ($this->teamMembers as $teamMemberName => $teamMember) {
            echo "{$teamMemberName} LifePoints: {$teamMember->getLifePoints()}".$this->newline();
        }
    }

    protected function newline() 
    {
        return (PHP_SAPI === 'cli') ? PHP_EOL : "<br />";
    }

    public function getDamage()
    {
        $damage = 0;
        foreach ($this->teamMembers as $teamMember) {
            $damage = $damage + $teamMember->getDamage();
        }
        return $damage;
    }

    public function takeHit($damage)
    {
        $hitPointsForTeamMember = $damage / count($this->teamMembers);
        foreach ($this->teamMembers as $teamMemberName => $teamMember) {
            $teamMember->takeHit($hitPointsForTeamMember);
            if ($teamMember->getLifePoints() <= 0) {
                unset($this->teamMembers[$teamMemberName]);
            }
        }
    }

    protected function generateTeam($teamSize)
    {
        $this->teamMembers = [];
        for ($i = 1; $i <= $teamSize; $i++) {
            $this->addSoldier();
        }
        $this->teamMembers['commander'] = new Commander();
    }

    protected function addSoldier()
    {
        if (count($this->teamMembers) <= self::MAX_SOLDIERS_COUNT) {
            $soldierNum = count($this->teamMembers) + 1;
            $this->teamMembers["soldier {$soldierNum}"] = new Soldier();
        }
    }

}
