<?php

class Commander extends Soldier
{
    protected const LIFE_POINTS_WITHOUT_EQUIPMENT = 110;

    public function __construct()
    {
        $this->weaponsSet = [];
        $this->addToWeaponSet('gun');
        $this->setActiveWeapon('gun');
        $this->generateEquipmentSet();
        foreach ($this->equipmentSet as $equipment) {
            $this->lifePointsWithEquipment = self::LIFE_POINTS_WITHOUT_EQUIPMENT + $equipment->getLifePoints();
        }
    }

}