<?php

require_once('WeaponTypes.php');
require_once('EquipmentTypes.php');

class Soldier
{
    protected const DAMAGE_WITHOUT_WEAPON = 5;
    protected const MAX_WEAPON_SET_SIZE = 4;
    protected const LIFE_POINTS_WITHOUT_EQUIPMENT = 100;
    protected $damageWithWeapon;
    protected $lifePointsWithEquipment;
    protected $weaponsSet;
    protected $equipmentSet;
    protected $activedWeapon;

    public function __construct()
    {
        $this->generateWeaponSet();
        $ifNeedGenerateEquipmentSet = (bool)random_int(0, 1);
        if ($ifNeedGenerateEquipmentSet) {
            $this->generateEquipmentSet();
        }
        $this->calcLifePoints();
    }

    public function setActiveWeapon($weaponName)
    {
        $this->activedWeapon = $this->weaponsSet[$weaponName];
        $this->calcDamage();
    }

    public function takeHit($hitPoints)
    {
        $this->lifePointsWithEquipment = floor($this->lifePointsWithEquipment - $hitPoints);
    }

    public function getDamage()
    {
        return $this->damageWithWeapon;
    }

    /**
     * @return array
     */
    public function getWeaponsSet()
    {
        return $this->weaponsSet;
    }

    /**
     * @return int
     */
    public function getLifePoints()
    {
        return $this->lifePointsWithEquipment;
    }

    /**
     * @return array
     */
    public function getEquipmentSet()
    {
        return $this->equipmentSet;
    }

    /**
     * @return mixed
     */
    public function getActivedWeapon()
    {
        return $this->activedWeapon;
    }

    protected function calcDamage()
    {
        $this->damageWithWeapon = self::DAMAGE_WITHOUT_WEAPON + $this->activedWeapon->getDamage();
    }

    protected function calcLifePoints()
    {
        $this->lifePointsWithEquipment = self::LIFE_POINTS_WITHOUT_EQUIPMENT;
        if (is_null($this->equipmentSet)) {
            return;
        }
        foreach ($this->equipmentSet as $equipment) {
            $this->lifePointsWithEquipment = $this->lifePointsWithEquipment + $equipment->getLifePoints();
        }
    }

    protected function generateWeaponSet()
    {
        $weaponTypes = new WeaponTypes();
        $weaponTypesList = $weaponTypes->getTypesOfWeapons();
        $this->weaponsSet = [];
        $sizeOfWeaponsSet = rand(1, self::MAX_WEAPON_SET_SIZE);
        for ($i = 1; $i <= $sizeOfWeaponsSet; $i++) {
            $namesOfSetValues = array_keys($weaponTypesList);
            $randomName = $namesOfSetValues[array_rand($namesOfSetValues)];
            $this->weaponsSet[$randomName] = $weaponTypesList[$randomName];
            unset($weaponTypesList[$randomName]);
            $this->setActiveWeapon($randomName);
        }
    }

    protected function generateEquipmentSet()
    {
        $equipmentSet = [];
        $dressedBodyParts = [];
        $sizeOfEquipmentSet = rand(0, 4);
        $equipmentTypes = new EquipmentTypes();
        $equipmentsList = $equipmentTypes->getTypesOfEquipments();
        while (
            (count($equipmentSet) < $sizeOfEquipmentSet)
            and (count($equipmentsList) > 0)
        ) {
            $namesOfSetValues = array_keys($equipmentsList);
            $randomName = $namesOfSetValues[array_rand($namesOfSetValues)];
            if (!in_array($equipmentsList[$randomName]->getPartOfBody(), $dressedBodyParts)) {
                $dressedBodyParts[] = $equipmentsList[$randomName]->getPartOfBody();
                $equipmentSet[$randomName] = $equipmentsList[$randomName];
                unset($equipmentsList[$randomName]);
            }
        }
        $this->equipmentSet = $equipmentSet;
        $this->calcLifePoints();
    }

    protected function addToWeaponSet($weaponName)
    {
        if (count($this->weaponsSet) == self::MAX_WEAPON_SET_SIZE) {
            unset($this->weaponsSet[1]);
        }
        $weaponTypes = new WeaponTypes();
        $weaponsList = $weaponTypes->getTypesOfWeapons();
        $this->weaponsSet[$weaponName] = $weaponsList[$weaponName];
    }
}