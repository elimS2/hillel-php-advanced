<?php

class Weapon
{
    private $damage;
    private $reloadTime;

    public function __construct($damage, $reloadTime)
    {
        $this->damage = $damage;
        $this->reloadTime = $reloadTime;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function getReloadTime()
    {
        return $this->reloadTime;
    }
}