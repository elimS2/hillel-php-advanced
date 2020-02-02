<?php

require_once('Weapon.php');

class WeaponTypes
{
    private $typesOfWeapons;

    public function __construct()
    {
        $this->typesOfWeapons = [
            'knife' => new Weapon(5, 0),
            'gun' => new Weapon(50, 1),
            'machineGun' => new Weapon(80, 1),
            'bomb' => new Weapon(80, 0),
            'launcher' => new Weapon(95, 3)
        ];
    }

    public function getTypesOfWeapons()
    {
        return $this->typesOfWeapons;
    }
}